<?php
	require("init.php");
	
	$team_data = $db->execSql("SELECT * FROM team WHERE id=".$_REQUEST['id']);
    $roster = $db->execSql("SELECT * FROM player WHERE team_id=".$_REQUEST['id']." ORDER BY name");
    
    $players = array();
    
    foreach($roster as $player) {
        $race_data = $db->execSql("SELECT * FROM race WHERE id=".$player['race_id']);
        
        array_push($players, array('name' => $player['name'],
                                   'race' => $race_data[0]));
    }
	
	$smarty->assign('team', $team_data[0]);
    $smarty->assign('roster', $players);
	
	$smarty->display("team.tpl");
?>