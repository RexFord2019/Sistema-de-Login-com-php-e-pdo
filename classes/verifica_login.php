<?php
if(!$_SESSION['id']) {
	session_start();
	header('Location: index.php');
	exit();
}