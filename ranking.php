<?php
	require("init.php");
    
    $ranking = array();
    
    for($i=0;$i<10;$i++) {
        $ranking[$i]['rank'] = $i+1;
        $ranking[$i]['team'] = "Team $i";
        $ranking[$i]['wins'] = 10-$i;
        $ranking[$i]['losses'] = $i;
        $ranking[$i]['map_wins'] = (10-$i)*5;
        $ranking[$i]['map_losses'] = $i*5;
        $ranking[$i]['penalties'] = $i;
    }
    
    $smarty->assign('ranking', $ranking);
    
    $smarty->display("ranking.tpl");
?>