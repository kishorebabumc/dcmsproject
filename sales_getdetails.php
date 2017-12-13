<?php 
	include('sales_session.php');	
	if(isset($_POST['productid'])){
		$productid = $_POST['productid'];
		$sql = mysql_query("SELECT
				  acc_inv_stockregister.StockCB,
				  acc_inv_saleprice.SalePrice
				FROM
				  acc_inv_stockregister
				  INNER JOIN acc_inv_saleprice ON acc_inv_stockregister.ProductID = acc_inv_saleprice.ProductID
				WHERE 
					acc_inv_stockregister.ProductID = '$productid' AND acc_inv_stockregister.StockStatus = 1 AND acc_inv_saleprice.SalePriceStatus = 1");				
		$result = mysql_fetch_assoc($sql);
			
		echo json_encode($result);	
	}	
		
?>