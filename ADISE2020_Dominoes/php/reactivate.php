<?php
	if(!isset($connected)||$connected == false){
		require "dbconnect.php";
	}

	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	$player1 = $_SESSION['player1'];
	$player2 = $_SESSION['player2'];
	$query = "INSERT INTO Active_players (username) VALUES ('$player1', '$player2')";
	$dbcon->query($query);	
	
	header('Location:end.php');
?>