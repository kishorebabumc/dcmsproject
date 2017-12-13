<?php
    include('sales_session.php');
    if($_SESSION['role']==4){
        
    }
    else{
       header("location:sessionexpire.php");
    }
	$totvalue = 0;
	$user = $_SESSION['login_user'];
	$sql = "SELECT
			  employees.Fname,
			  employees.Lname,
			  employees.Sname,
			  offices.OffID,
			  offices.OfficeName
			FROM
			  allot
			  INNER JOIN employees ON allot.EmpID = employees.EmpID
			  INNER JOIN offices ON allot.OffID = offices.OffID
			WHERE
			  allot.EmpID = '$user' and allot.Status = 1";		
	$sql = mysql_query($sql);
	$result = mysql_fetch_assoc($sql);	
	$offid = $result['OffID'];
	include("sales_sidebar.php");	
	
	$sql1 = "SELECT
			  acc_inv_dummy_stock.StockID,			  
			  acc_inv_dummy_stock.StockPurchase,
			  acc_inv_dummy_stock.PurPrice,
			  acc_inv_dummy_stock.ValuePur,
			  acc_inv_product.ProductName,
			  acc_inv_product.ProductUnitQuantity,
			  inv_productunits.UnitsSymbol
			FROM
			  acc_inv_dummy_stock
			  INNER JOIN acc_inv_product ON acc_inv_dummy_stock.ProductID = acc_inv_product.ProductID
			  INNER JOIN inv_productunits ON acc_inv_product.ProductUnits = inv_productunits.UnitsID			
			WHERE 
			  acc_inv_dummy_stock.StockOfficeID = '$offid' ";			
	$result1 = mysql_query($sql1);
	$count = mysql_num_rows($result1);	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = $_SESSION['login_user'];
		$subidcredit = $_POST['subid'];
		$totalvalue	 = $_POST['totalvalue'];
		$sql = mysql_query("SELECT CreditorDebtor FROM acc_creditordebtor WHERE SubID = '$subidcredit'");
		$row = mysql_fetch_assoc($sql);
		$sql = mysql_query("SELECT * FROM acc_inv_dummy_stock");
		$product = mysql_fetch_assoc($sql);
		$product = $product['ProductID'];		
		$sql = mysql_query("SELECT
				  b.SubID,
				  b.SubHead
				FROM
				  acc_subhead a
				  INNER JOIN acc_inv_product ON acc_inv_product.ProductSubID = a.SubID,
				  acc_subhead b
				WHERE
				  b.InventoryLink = a.SubID AND acc_inv_product.ProductID = '$product' AND b.MajorID =	 29");
		$out = mysql_fetch_assoc($sql);
		$subiddebit = $out['SubID'];
		$today = date("Y-m-d");
		$sql = mysql_query("INSERT INTO acc_cashbook (`CashBookDate`, `CashBookOffID`,`CashBookSubID`,`CashBookCredit`,`CashBookStatus`)
							VALUES('$today','$offid','$subidcredit','$totalvalue',1)");
		$sql = mysql_query("INSERT INTO acc_cashbook (`CashBookDate`, `CashBookOffID`,`CashBookSubID`,`CashBookDebit`,`CashBookStatus`)
							VALUES('$today','$offid','$subiddebit','$totalvalue',1)");		
		
		$sql = mysql_query("UPDATE acc_inv_stockregister SET StockStatus = 0 WHERE StockOfficeID = '$offid' AND ProductID = '$product' AND StockStatus = 1");	
		$sql = mysql_query("INSERT INTO acc_inv_stockregister SELECT * FROM acc_inv_dummy_stock") or die(mysql_error());
		$sql = mysql_query("DELETE FROM acc_inv_dummy_stock");
		
		$sql = mysql_query("SELECT GLCB FROM acc_generalledger WHERE GLSubID = '$subidcredit' AND GLOffID = '$offid' AND GLStatus = 1");
		$cou = mysql_num_rows($sql);
		if($cou > 0){
			$glcredit = mysql_fetch_assoc($sql);
			$glcreditob = $glcredit['GLCB'];
			$sql = mysql_query("UPDATE acc_generalledger SET GLStatus = 0 WHERE GLSubID = '$subidcredit' AND GLOffID = '$offid' AND GLStatus = 1");
		}
		else {
			$glcreditob = 0;
		}
		$glcb = $glcreditob + $totalvalue;
		$sql = mysql_query("INSERT INTO acc_generalledger (`GLSubID`, `GLOffID`,`GLDate`,`GLOB`,`GLCredit`,`GLCB`,`GLStatus`)
							VALUES('$subidcredit','$offid','$today','$glcreditob','$totalvalue','$glcb',1)");

		$sql = mysql_query("SELECT GLCB FROM acc_generalledger WHERE GLSubID = '$subiddebit' AND GLOffID = '$offid' AND GLStatus = 1");
		$cou = mysql_num_rows($sql);
		if($cou > 0){
			$gldebit = mysql_fetch_assoc($sql);
			$gldebitob = $gldebit['GLCB'];
			$sql = mysql_query("UPDATE acc_generalledger SET GLStatus = 0 WHERE GLSubID = '$subiddebit' AND GLOffID = '$offid' AND GLStatus = 1");
		}
		else {
			$gldebitob = 0;
		}
		$glcb = $gldebitob + $totalvalue;
		$sql = mysql_query("INSERT INTO acc_generalledger (`GLSubID`, `GLOffID`,`GLDate`,`GLOB`,`GLDebit`,`GLCB`,`GLStatus`)
							VALUES('$subiddebit','$offid','$today','$gldebitob','$totalvalue','$glcb',1)");
	}
	else{
		header("location:sessionexpire.php");
	}
?>

        <div class="content">
            <div class="container-fluid">
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">														
							<div class="header pull-left">                                
								<h4 class="title">Purchase of Cart (Debit)</h4>                                									
							</div>
                            <div class="content table-responsive table-full-width">
                                <table class="table ">
                                    <thead>
                                        <th>Sl.No</th>
										<th>Product Name</th>										
										<th>Product Units</th>
                                    	<th>Product Quantity</th>
                                    	<th>Purchase Price</th>
                                    	<th>Total Amount</th>										
                                    </thead>
                                    <tbody>
                                        <?php if($count>0){
											$slno=1;											
											while($row1 = mysql_fetch_assoc($result1))
											{ 	
												echo "<tr><td>".$slno."</td>";
												echo "<td>".$row1['ProductName']."</td>";
												echo "<td>".$row1['ProductUnitQuantity'].$row1['UnitsSymbol']."</td>";
												echo "<td>".$row1['StockPurchase']."</td>";					
												echo "<td>".$row1['PurPrice']."</td>";
												echo "<td>".$row1['ValuePur']."</td>";																																															
												$slno = $slno +1;	
												$totvalue = $totvalue+ $row1['ValuePur'];
											}				
										}
										?> 
										<tr>
											<td></td>
											<td></td>
											<td>Total Amount</td>
											<td></td>
											<td></td>
											<td><?php echo $totvalue; ?></td>
											<td></td>
										</tr>	
                                    </tbody>
                                </table>
                            </div>
							<div class="header pull-left">                                
								<h4 class="title">Suppler (Credit)</h4>
							</div>
							<div class="content table-responsive table-full-width">
                                <table class="table ">
                                    <thead>                                        
										<th>Supplier</th>										
										<th>Amount</th>
                                    	<th></th>                                    										
                                    </thead>
                                    <tbody>
										<tr> 
											<td><?php echo $row['CreditorDebtor']; ?></td>
											<td><?php echo $totvalue; ?></td>											
											<td><a href = "sales.php"><button type="submit" class='btn btn-info btn-fill'>Back</button><a></td>
											
										</tr>
                                        	
                                    </tbody>
                                </table>
                            </div>								
                        </div>
                    </div>
                </div>
                     
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Designed and Developed by V Kishore Babu
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript"> 
			$(document).ready(function(){
				$('#quantity').keyup(function(){
					var textone;
					var texttwo;
					textone = parseFloat($('#quantity').val());
					texttwo = parseFloat($('#purprice').val());
					var result = textone * texttwo;
					$('#totalprice').val(result);
				});
				$('#purprice').keyup(function(){
					var textone;
					var texttwo;
					textone = parseFloat($('#quantity').val());
					texttwo = parseFloat($('#purprice').val());
					var result = textone * texttwo;
					$('#totalprice').val(result);
				});
			});
	</script>

</html>
