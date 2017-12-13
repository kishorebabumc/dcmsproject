<?php
	include('sales_session.php');
    if($_SESSION['role']==4){
        
    }
    else{
       header("location:sessionexpire.php");
    }
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = $_SESSION['login_user'];
		$productid = $_POST['productid'];
		$offid = $_POST['offid'];
		$quantity = $_POST['quantity'];
		$saleprice = $_POST['saleprice'];
		$totalprice = $quantity * $saleprice;
		$today = date("Y-m-d");
		$sql = mysql_query("SELECT * FROM acc_inv_stockregister WHERE StockOfficeID = '$offid' AND ProductID = '$productid' AND StockStatus =1");
		$count = mysql_num_rows($sql);
		if($count > 0){
			$result = mysql_fetch_assoc($sql);
			$stockob = $result['StockCB'];
			$valueob = $result['ValueCB'];
			$purprice = $result['PurPrice'];
		}
		
		$stockcb = $stockob - $quantity;
		$totpurprice = $quantity * $purprice;
		$valuecb = $valueob - $totpurprice;
		$sql = mysql_query("SELECT * FROM acc_inv_dummy_sales WHERE ProductID = '$productid'");
		$rows = mysql_num_rows($sql);
		if($rows < 1){		
			$sql = "INSERT INTO `acc_inv_dummy_sales` (`StockOfficeID`, `ProductID`,`StockDate`, 
					`StockOB`, `ValueOB`, `StockSale`, `SalePrice`, `ValueSale`, `SaleValuePurPrice`,`StockCB`, `ValueCB`, `StockEmpID`, `StockStatus`)
					VALUES ('$offid', '$productid', '$today', '$stockob', '$valueob', '$quantity','$saleprice', '$totalprice','$totpurprice','$stockcb','$valuecb','$user',1)";      
			$sql = mysql_query($sql) or die (mysql_error());	
		header("location:sales_sale.php");	
		} else {
			echo '<script language="javascript" type="text/javascript"> 
                alert("Product already in the Cart");                
				</script>';
			header("location:sales_sale.php");
		}
	}
	?>