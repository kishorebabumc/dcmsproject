<?php
	include("bm_session.php");
	include("bm_sidebar.php");
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		$user = $_SESSION['login_user'];
		$empid = $_GET['empid'];
		$offid = $_GET['offid'];
		$today = date("Y-m-d");		
		$sql = "UPDATE allot SET DOC='$today', Status = 0 WHERE EmpID = '$empid' AND OffID = '$offid' AND Status = 1"; 
		$sql = mysql_query($sql) or die(mysql_error());		
		$sql = "INSERT INTO `allot` (`ID`, `EmpID`, `OffID`,`EntryBy`,`DOE`,`DOC`,`Status`) 
		         VALUES (NULL,'$empid', '','$user','$today','',0)";
		$result = mysql_query($sql) or die(mysql_error());
		header("location:bm_office_det.php?offid=$offid");
	}	
?>