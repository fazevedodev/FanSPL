<?php
	require("init.php");
	
	$team_data = $db->execSql("SELECT * FROM team WHERE id=".$_REQUEST['id']);
	
	$smarty->assign('team', $team_data[0]);
	
	$smarty->display("team.tpl");
?>