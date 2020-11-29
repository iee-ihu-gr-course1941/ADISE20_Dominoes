<?php
if (session_status() !== PHP_SESSION_ACTIVE) 
{
	session_start();
}
unset($_SESSION["id"]);
unset($_SESSION["pass"]);
unset($_SESSION["uname"]);

session_write_close();
header("Location:/ADISE2020_Dominoes/login.html");
exit;
?>