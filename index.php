<?php
session_start();
if (!isset($_GET['hal'])) 
{
	echo "<script>window.location = '?hal=main';</script>";
}
   include 'include/config.php';
   include 'include/db.php';
// if (!isset($_SESSION['uname'])) 
// {
// 	include 'login.php';
// }
// else
// {
	include 'page.php';
// }
