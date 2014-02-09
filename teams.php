<?php
	require("init.php");
	
	$team_data = $db->execSql("SELECT * FROM team WHERE id=".$_REQUEST['id']);
    $roster = $db->execSql("SELECT * FROM player WHERE team_id=".$_REQUEST['id']);
	
	$smarty->assign('team', $team_data[0]);
    $smarty->assign('roster', $roster);
	
	$smarty->display("team.tpl");
?>