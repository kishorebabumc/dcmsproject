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
	$sql = mysql_query("SELECT 
							acc_inv_product.ProductID, 
							acc_inv_product.ProductName, 
							acc_inv_product.ProductUnitQuantity, 
							inv_productunits.UnitsSymbol
						FROM 
							acc_inv_product
							INNER JOIN inv_productunits ON acc_inv_product.ProductUnits = inv_productunits.UnitsID
						WHERE
							acc_inv_product.ProductStatus = 1") or die(mysql_error());
	
	$sql1 = "SELECT
			  acc_inv_dummy_sales.StockID,	
			  acc_inv_dummy_sales.StockSale,
			  acc_inv_dummy_sales.SalePrice,
			  acc_inv_dummy_sales.ValueSale,
			  acc_inv_product.ProductName,
			  acc_inv_product.ProductUnitQuantity,
			  inv_productunits.UnitsSymbol
			FROM
			  acc_inv_dummy_sales
			  INNER JOIN acc_inv_product ON acc_inv_dummy_sales.ProductID = acc_inv_product.ProductID
			  INNER JOIN inv_productunits ON acc_inv_product.ProductUnits = inv_productunits.UnitsID			
			WHERE 
			  acc_inv_dummy_sales.StockOfficeID = '$offid' ";
			
	$result1 = mysql_query($sql1);
	$count = mysql_num_rows($result1);
	$sql2="SELECT * FROM acc_creditordebtor WHERE Type = 21 AND SupplyStatus = 'Yes'";
	$sql2=mysql_query($sql2);		
						
?>

        <div class="content">
            <div class="container-fluid">
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">							
							<div class="header pull-left">                                
								<h4 class="title">Sales</h4>                                									
							</div>		
								
							<div class="content table-responsive table-full-width">
								<table class="table ">	
									<thead>
										<th>Sl.No</th>
										<th>Product Name</th>
										<th>Product Available</th>	
                                    	<th>Product Quantity</th>
                                    	<th>Sale Price</th>
                                    	<th>Total Amount</th>
										<th></th>
									</thead>	
									<tbody>
										<tr> <form action="sales_sale_add.php" method ="post">
											<td align="center"> 1 </td>
											<td>												
												<select name="productid" id="productid" class="form-control">	
													<option>Select Product</option>
													<?php while ($row = mysql_fetch_assoc($sql)) 												
														echo "<option value ='".$row['ProductID']."'>".$row["ProductName"]." - ".$row["ProductUnitQuantity"].$row["UnitsSymbol"]."</option>";								
													 ?>
												</select>												
											</td>											
											<td><input type="text" class="form-control" name ="availquantity"  id="availquantity" disabled></td>
											<td><input type="text" class="form-control" name ="quantity"  id="quantity" autocomplete="off" required>
												<input type="hidden" name ="offid" value="<?php echo $offid;?>"> </td>											
											<td><input type="text" class="form-control" name ="sale"  id="saleprice" disabled>
											    <input type="hidden" class="form-control" name ="saleprice" id="saleprice1"></td>											
											<td><input type="text" class="form-control" name ="totalprice" id="totalprice" disabled></td>
											<td><button type="submit" class="btn btn-info btn-fill">Add</button></td>													
											</form>
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
                                    	<th>Sale Price</th>
                                    	<th>Total Amount</th>
										<th>Delete</th>                                    	
                                    </thead>
                                    <tbody>
                                        <?php if($count>0){
											$slno=1;											
											while($row1 = mysql_fetch_assoc($result1))
											{ 	
												echo "<tr><td>".$slno."</td>";
												echo "<td>".$row1['ProductName']."</td>";
												echo "<td>".$row1['ProductUnitQuantity'].$row1['UnitsSymbol']."</td>";
												echo "<td>".$row1['StockSale']."</td>";					
												echo "<td>".$row1['SalePrice']."</td>";
												echo "<td>".$row1['ValueSale']."</td>";																																				
												echo "<td>
														  <a href='sales_sale_del.php?stockid=".$row1['StockID']."'><i class='fa fa-close'></i></a>							  
													  </td></tr>";
												$slno = $slno +1;	
												$totvalue = $totvalue+ $row1['ValueSale'];
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
							<div class="header pull-right">                                
								<h4 class="title">Mode of Payment</h4>
									<select name="payment" id = "payment" class="form-control">								
										<option value=0>Select</option>
										<option value=1>Cash</option>
										<option value=2>Credit</option>
									</select>								
							</div>							
							
							<div class="content table-responsive table-full-width" id="credit">
								<table class="table ">	
									<thead>										
										<th>Name of the Customer</th>																				                                    	
									</thead>	
									<tbody>
										<tr>
										<form action="sales_sale_suc.php" method ="post">
											<td><select name="subid" class="form-control">								
													<?php while ($row = mysql_fetch_assoc($sql2)) 												
														echo "<option value ='".$row['SubID']."'>".$row["CreditorDebtor"]."</option>";
													 ?>
												</select>
											</td>
											<td><?php
												if($totvalue == 0){
													echo "<button class='btn btn-info btn-fill' disabled>Proceed</button>";
												}
												else {
													echo "<button type='submit' class='btn btn-info btn-fill'>Proceed</button>";                                									
												}
												
											?></td>
										</form>	
										</tr>
									</tbody>
								</table>
							</div>

							<div class="content table-responsive table-full-width" id="cash">
								<table class="table ">	
									<thead>										
										<th>Name of the Customer</th>
										<th>Address</th>
										<th>Mobile Number</th>	
										<th>Aadhaar Number</th>	
										<th></th>
									</thead>	
									<tbody>
										<tr>
										<form action="sales_sale_suc.php" method ="post">
											<td><input type="text" class="form-control" name ="name"  required ></td>
											<td><input type="text" class="form-control" name ="address"  required ></td>
											<td><input type="text" class="form-control" name ="cell"></td>
											<td><input type="text" class="form-control" name ="aadhaar"></td>
											<td><?php
												if($totvalue == 0){
													echo "<button class='btn btn-info btn-fill' disabled>Proceed</button>";
												}
												else {
													echo "<button type='submit' class='btn btn-info btn-fill'>Proceed</button>";                                									
												}
												
											?></td>
										</form>	
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

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>    

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript"> 
		$(document).ready(function(){
			$("#credit").hide();
			$("#cash").hide();
			$("#productid").change(function(){			  
				var productid = $("#productid").val();										
				
					$.ajax({  
						type: "POST",  
						url: "sales_getdetails.php",  
						data: "productid="+ productid,	
						dataType : "JSON",	
						success: function(result){ 														
							$('#availquantity').val(result.StockCB);
							$('#saleprice').val(result.SalePrice);
							$('#saleprice1').val(result.SalePrice);
						} 
					}); 									
				
			return false;
			});
			$('#quantity').keyup(function(){
				var textone;
				var texttwo;
				var availquantity;
				availquantity = parseFloat($('#availquantity').val());
				textone = parseFloat($('#quantity').val());				
				texttwo = parseFloat($('#saleprice').val());
				if (availquantity < textone){
					alert("Entered Stock more than Available Stock");
					$('#quantity').val("");
				}
				var result = textone * texttwo;
				$('#totalprice').val(result);
			});	
			$("#payment").change(function(){ 
				$("#credit").hide();
				$("#cash").hide();
				var payment = $("#payment").val();
				if(payment == 1){
					$("#cash").show();
					$("#credit").hide();										
				}
				else if(payment == 2){
					$("#cash").hide();
					$("#credit").show();						
				}
			});
		});
	</script>
</html>