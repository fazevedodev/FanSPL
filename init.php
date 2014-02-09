<?php
    session_start();

    require("classes/MySqlConnector.class.php");
    require("libs/Smarty.class.php");
    
    $smarty = new Smarty();
    
    $db = new MySqlConnector("localhost", "proleague", "root", "");
    $db->connect();
    
    $menu = $db->execSql("SELECT * FROM menu WHERE parent_id is null");
    $menu_list = array();
    foreach($menu as $item) {
        $tmp_menu = array();
        $tmp_menu['name'] = $item['display_text'];
        $tmp_menu['link'] = $item['link'];
        $tmp_menu['itens'] = array();
        
        $itens = $db->execSql("SELECT * FROM menu WHERE parent_id = ".$item['id']." ORDER BY display_text");
        
        foreach($itens as $item) {
            array_push($tmp_menu['itens'], array('name' => $item['display_text'],
                                                 'link' => $item['link']));
        }
    
        array_push($menu_list, $tmp_menu);
    }
    
    $smarty->assign('menu_item_list', $menu_list);
    $smarty->assign('title', 'images/title.png');
    
    if(isset($_POST['name']) && isset($_POST['password'])) {
        $user_data = $db->execSql("SELECT * FROM user WHERE username='".$_POST['name']."' AND password='".sha1($_POST['password'])."'");
        
        if(isset($user_data[0])) {
            $_SESSION['user']['username'] = $user_data[0]['username'];
            $smarty->assign('user_username', $_SESSION['user']['username']);
        }
    } else if(isset($_SESSION['user'])) {
        $smarty->assign('user_username', $_SESSION['user']['username']);
    }
?>