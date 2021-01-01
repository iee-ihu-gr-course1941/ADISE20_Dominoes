<?php
require "domino-function-library.php";

if(!isset($connected)||$connected == false){
	require "dbconnect.php";
}
if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
}

	$JSONstate = selectState($_SESSION['gameID']);
	$state = jsonToState($JSONstate);

if (isset($_GET['button'])) {
	
	$json_output = array();
	if ($_GET['button'] == "start"){
		$json_output['hand'] = getPlayerHandToJSON($state,$_SESSION['player1']);
	}
	else if ($_GET['button'] == "play"){
		playDomino($state, $_GET['front'] , $_GET['back']);
		$json_output['board'] = getBoardToJSON($state);
		$json_output['hand'] = getPlayerHandToJSON($state,$_SESSION['player1']);
	}
	else if ($_GET['button'] == "flip"){
		flipDominoInMyHand($state, $_GET['front'] , $_GET['back'])
		$json_output['hand'] = getPlayerHandToJSON($state,$_SESSION['player1']);
	}
	else if ($_GET['button'] == "draw"){
		takeFromPile($state)
		$json_output['hand'] = getPlayerHandToJSON($state,$_SESSION['player1']);
	}
	$JSONstate = stateToJSON($state);
	updateTableFromState($JSONstate,$_SESSION['gameID']);
	
	session_write_close();
	
	echo $json_output;
}
die;
?>