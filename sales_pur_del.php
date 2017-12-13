<?php
	include('sales_session.php');
    if($_SESSION['role']==4){
        
    }
    else{
       header("location:sessionexpire.php");
    }
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		$stockid = $_GET['stockid'];
		$sql = "DELETE FROM acc_inv_dummy_stock WHERE StockID = '$stockid'";
		$sql = mysql_query($sql);
		header("location:sales_pur.php");
	}
	
	?>