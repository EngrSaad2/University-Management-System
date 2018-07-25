<?php
require_once('functions/dbconfig.php');        
  require_once('functions/functions.php');
	$obj = new cls_func();

	include('session.php');

	session_start();
	session_destroy();
	header('location:../admin/std_log.php');
?>