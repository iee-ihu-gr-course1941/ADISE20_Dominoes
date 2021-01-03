<?php
require "domino-function-library.php";


$json_output = array();


if(!isset($connected)||$connected == false){
	require "dbconnect.php";
}
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
/*
	$JSONstate = selectState($_SESSION['gameID']);
	$state = jsonToState($JSONstate);
*/
$player1 = $_SESSION['player1'];
if (isset($_GET['button'])) {
	

	if ($_GET['button'] == "start"){
		$json_output['hand'] = ('on load');
		//$json_output['hand'] = getPlayerHandToJSON($state,$player1);
	}
	else if ($_GET['button'] == "play"){
		$json_output['hand'] = ('play button');
		/*
		playDomino($state, $_GET['front'] , $_GET['back']);
		$json_output['board'] = getBoardToJSON($state);
		$json_output['hand'] = getPlayerHandToJSON($state,$player1);
		*/
	}
	else if ($_GET['button'] == "flip"){
		$json_output['hand'] = ("flip button");/*
		flipDominoInMyHand($state, $_GET['front'] , $_GET['back']);
		$json_output['hand'] = getPlayerHandToJSON($state,$player1);
		*/
	}

	else if ($_GET['button'] == "draw"){
		$json_output['hand'] = ("flip button");
		/*takeFromPile($state);
		$json_output['hand'] = getPlayerHandToJSON($state,$player1);*/
	}/*
	$JSONstate = stateToJSON($state);
	updateTableFromState($JSONstate,$_SESSION['gameID']);
	*/
	session_write_close();


/*
	if($state["end"]==True){
		header('Location:');
	}
	*/
	echo json_encode($json_output);	
}
die;
?>
