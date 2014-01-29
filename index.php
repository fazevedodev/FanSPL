<?php
    session_start();

    require("classes/MySqlConnector.class.php");
    require("libs/Smarty.class.php");
    
    $smarty = new Smarty();
    
    $db = new MySqlConnector("localhost", "proleague", "root", "");
    $db->connect();
    
    $menu = $db->execSql("SELECT * FROM menu");
    $menu_list = array();
    foreach($menu as $item) {
        array_push($menu_list, array('name' => $item['display_text'],
                                     'link' => $item['link']));
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

    $smarty->display("index.tpl");
?>