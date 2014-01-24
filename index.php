<?php
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

    $smarty->display("index.tpl");
?>