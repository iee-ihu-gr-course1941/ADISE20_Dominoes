<?php
	if(!isset($connected)||$connected == false){
	require "dbconnect.php";
	}		
	require 'domino-function-library.php';
	require 'state-sql.php';
	
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	//brings the active users from the DB to find a second player
	$query = "SELECT username FROM Active_players WHERE username <> $_SESSION['user'] ";
	$activeP_check = $dbcon->query($query);
	
	if ($activeP_check == true) {
		$activeP_numrows = $activeP_check->num_rows;
	}
	else {
		echo $dbcon->error();
	}
	if ($activeP_numrows > 1) {
		$activeP_row = $activeP_check->fetch_assoc();
		
		if(!empty($activeP_row)){
		
			$_SESSION['player'] = $activeP_row['username'];
			$state = dominoState([$_SESSION['user'],$_SESSION['player']);
			$JSONstate = stateToJSON($state);
			insertTableFromStateWithoutGameID([$_SESSION['user'],$_SESSION['player'],$JSONstate);
			
			$query = "DELETE FROM Active_players WHERE username = $_SESSION['user'] AND username = $_SESSION['player']";
			$dbcon->query($query);
		}
	}
	elseif ($activeP_numrows <= 1) {
		$_SESSION['loginMessage'] = 'Not enought players online.';
	}
	else {
		$_SESSION['loginMessage'] = 'Connection error.';
	}
	
	//takes the ganeID from the DB and adds it to session.
	$player1 = $_SESSION['user'];
	$player2 = $_SESSION['player'];
	
	$query = "SELECT gameID FROM state WHERE player1 = $player1 AND player2 = $player2";
	$game_check = $dbcon->query($query);
	
	if ($game_check == true) {
		$game_numrows = $game_check->num_rows;
	}
	else {
		echo $dbcon->error();
	}
	if ($game_numrows == 1) {
		$game_row = $game_check->fetch_assoc();
		//id should not be empty
		if (!empty($game_row)) {
				$_SESSION['gameID'] = $game_row['gameID'];
			}
		}
	}
	elseif ($game_numrows == 0) {
		$_SESSION['loginMessage'] = 'Game has not been set.';
	}
	else {
		$_SESSION['loginMessage'] = 'Connection error.';
	}
	session_write_close();
	
	die;
?>