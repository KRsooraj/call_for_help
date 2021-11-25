<?php

session_start();

if(isset($_SESSION['user_token']))
{
	unset($_SESSION['user_token']);

}

header("Location: signin.php");
die;