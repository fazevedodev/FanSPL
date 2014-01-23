<?php
    require("utils.php");
    require("../libs/Smarty.class.php");
    require("../classes/Team.class.php");
    require("../classes/Map.class.php");
    require("../classes/MySqlConnector.class.php");
    
    $smarty = new Smarty();
    
    $smarty->addTemplateDir("./templates");
    
    if(!isset($_POST['step'])) {
        $_POST['step'] = 1;
    }
    
    switch($_POST['step']) {
        case 1:
            $smarty->display("step1.tpl");
            break;
        case 2:
            if(isset($_POST['teams'])) {
                if($_POST['teams'] == '') {
                    $array = array();
                } else {
                    $array = unserialize(base64_decode($_POST['teams']));
                }
                
                $t = new Team();
                $t->set_name($_POST['name']);
                $t->set_tag($_POST['tag']);
                $t->set_logo($_POST['logo']);
                
                array_push($array, $t);
                
                $smarty->assign('teams', base64_encode(serialize($array)));
            } else {
                $smarty->assign('teams', '');
            }
        
            $smarty->assign('db_address', $_POST['db_address']);
            $smarty->assign('db_name', $_POST['db_name']);
            $smarty->assign('db_user', $_POST['db_user']);
            $smarty->assign('db_password', $_POST['db_password']);
            
            $smarty->display("step2.tpl");
            break;
        case 3:
            $db = new MySqlConnector($_POST['db_address'], $_POST['db_name'], $_POST['db_user'], $_POST['db_password']);
            $db->createDatabase();
            
            $create_script = file_get_contents('scripts/create.sql');
            $create_script = str_replace('$', $_POST['db_name'], $create_script);
            $insert_script = file_get_contents('scripts/insert.sql');
            $insert_script = str_replace('$', $_POST['db_name'], $insert_script);
            
            $db->execScript(htmlspecialchars($create_script));
            $db->execScript(htmlspecialchars($insert_script));
            
            $available_maps = $db->execSql('SELECT * FROM map ORDER BY name');
            
            $map_array = array();
            
            foreach($available_maps as $map) {
                $m = new Map();
                $m->set_id($map['id']);
                $m->set_name($map['name']);
                
                array_push($map_array, $m);
            }
            
            $smarty->assign('db_address', $_POST['db_address']);
            $smarty->assign('db_name', $_POST['db_name']);
            $smarty->assign('db_user', $_POST['db_user']);
            $smarty->assign('db_password', $_POST['db_password']);
            $smarty->assign('available_maps', $map_array);
            $smarty->assign('teams', htmlspecialchars($_POST['teams']));
        
            $smarty->display("step3.tpl");
            break;
        case 4:
            $smarty->assign('db_address', $_POST['db_address']);
            $smarty->assign('db_name', $_POST['db_name']);
            $smarty->assign('db_user', $_POST['db_user']);
            $smarty->assign('db_password', $_POST['db_password']);
            $smarty->assign('maps', $_POST['available_maps']);
            $smarty->assign('serialized_maps', htmlspecialchars(serialize($_POST['available_maps'])));
            $smarty->assign('unserialized_teams', unserialize(base64_decode($_POST['teams'])));
            $smarty->assign('teams', htmlspecialchars($_POST['teams']));
        
            $smarty->display("step4.tpl");
            break;
        case 5:
            $db = new MySqlConnector($_POST['db_address'], $_POST['db_name'], $_POST['db_user'], $_POST['db_password']);
            if(!$db->connect()) {
                die("Unable to connect to database.");
            }
            
            $smarty->assign('db_address', $_POST['db_address']);
            $smarty->assign('db_name', $_POST['db_name']);
            $smarty->assign('db_user', $_POST['db_user']);
            $smarty->assign('db_password', $_POST['db_password']);
            $smarty->assign('maps', (isset($_POST['maps']) ? $_POST['maps']:null));
            
            $teams = unserialize(base64_decode($_POST['teams']));
            $smarty->assign('unserialized_teams', $teams);
            
            $maps = unserialize($_POST['maps']);
            
            foreach($teams as $team) {
                $db->execSql("INSERT INTO team (name, tag, logo) VALUES ('".$team->get_name()."', '".$team->get_tag()."', '".$team->get_logo()."')");
            }
            
            $match_state_data = $db->execSql("SELECT * FROM match_state WHERE state = 'Pending'");
            $game_state_data = $db->execSql("SELECT * FROM game_state WHERE state = 'Pending'");
            
            $rounds = createPairings($teams);
            $i = 1; $debug = 0;
            foreach($rounds as $round) {
                //Cria o round
                $db->execSql("INSERT INTO round (name) VALUES ('Round $i')");
                $round_id = $db->getLastInsertId();
                
                //Cria a map pool desse round
                $map_pool = getRandomSubArray($maps, 5);
                foreach($map_pool as $map_id) {
                    $db->execSql("INSERT INTO map_pool (map_id, round_id) VALUES (".$map_id.", ".$round_id.")");
                }
                
                //Cria as matches desse round
                foreach($round as $match) {
                    $db->execSql("INSERT INTO `match` (match_day, round_id, match_state_id) VALUES ('2014-01-23', ".$round_id.", ".$match_state_data[0]['id'].")");
                    $match_data = $db->execSql("SELECT * FROM `match` WHERE id=".$db->getLastInsertId());
                    
                    $team1_data = $db->execSql("SELECT * FROM team WHERE name='".$match['team_1']->get_name()."'");
                    $team2_data = $db->execSql("SELECT * FROM team WHERE name='".$match['team_2']->get_name()."'");
                    
                    $db->execSql("INSERT INTO team_match (team_id, match_id) VALUES (".$team1_data[0]['id'].", ".$match_data[0]['id'].")");
                    $db->execSql("INSERT INTO team_match (team_id, match_id) VALUES (".$team2_data[0]['id'].", ".$match_data[0]['id'].")");
                    
                    foreach($map_pool as $map_id) {
                        $db->execSql(
                        "INSERT INTO game (map_id,
                                           match_id,
                                           match_round_id,
                                           match_match_state_id,
                                           game_state_id)
                         VALUES (".$map_id.",
                                 ".$match_data[0]['id'].",
                                 ".$round_id.",
                                 ".$match_data[0]['match_state_id'].",
                                 ".$game_state_data[0]['id'].")");
                    }
                }
                
                $i++;
            }
            
            $smarty->display("step5.tpl");
            break;
    }
?>