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
		$subid	= $_POST['subid'];
		$sql = mysql_query("UPDATE acc_inv_dummy_stock SET DebitorCreditorID = '$subid'") or die(mysql_error());
		$sql = mysql_query("SELECT CreditorDebtor FROM acc_creditordebtor WHERE SubID = '$subid'");
		$row = mysql_fetch_assoc($sql);
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
							<div class="header center">                                
								<h3 class="title">Sale Invoice - Krishna District Marketing Society</h3>
								<h5 class="title">Pantakalava Road, Near NTR Circle, Vijayawada</h5>
							</div>
							<div class="content table-responsive table-full-width">
                                <table class="table " border="0">                                  
                                    <tbody>
										<tr> 
											<td>Name of the Customer</td>
											<td></td>
											<td>GST No.</td>
											<td></td>
										 </tr>
										<tr> 
											<td>Address</td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr> 
											<td>Mobile</td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr> 
											<td>Aadhaar</td>
											<td></td>
											<td></td>
											<td></td>
										</tr>                                        	
                                    </tbody>
                                </table>
                            </div>						
							<div class="header pull-left">                                
								<h4 class="title">Cart</h4>                                									
							</div>
                            <div class="content table-responsive table-full-width">
                                <table class="table ">
                                    <thead>
                                        <th>Sl.No</th>
										<th>Product Name</th>										
										<th>Product Units</th>
                                    	<th>Product Quantity</th>
										<th>HSN Code</th>
										<th>GST %</th>
										<th>SGST</th>
										<th>CGST</th>
										<th>IGST</th>
                                    	<th>Sale Price</th>
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
											
                        </div>
                    </div>
                </div>
                     
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    
                </nav>
                
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
