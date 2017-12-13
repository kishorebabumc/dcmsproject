<?php
	include("bm_session.php");
	include("bm_sidebar.php");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = $_SESSION['login_user'];
		$empid = $_POST['empid'];
		$offid = $_POST['offid'];
		$today = date("Y-m-d");
		$sql = "UPDATE allot SET OffID = '$offid', EntryBy = '$user', DOE='$today', Status = 1 WHERE EmpID = '$empid' AND OffID = '' AND Status = 0"; 
		$sql = mysql_query($sql) or die(mysql_error());		
		header("location:bm_office_det.php?offid=$offid");
	}	

?>