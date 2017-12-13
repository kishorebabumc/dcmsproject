<?php
include("bm_session.php");
include("bm_sidebar.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$user = $_SESSION['login_user'];
	$productid = $_POST['productid'];
	$saleprice = $_POST['saleprice'];
	$price = $_POST['presentprice'];
	$today = date("Y-m-d");		
	$sql = mysql_query("UPDATE acc_inv_saleprice SET SalePriceStatus = 0 WHERE ProductID = '$productid' AND SalePriceStatus = 1");	
	$sql = "INSERT INTO `acc_inv_saleprice` (`SalePriceID`, `ProductID`, `PriceDate`, `SalePrice`, `SalePriceEmpID`,`SalePriceStatus`) 
		         VALUES (NULL, '$productid', '$today', '$saleprice', '$user',  1)";
	$result = mysql_query($sql) or die(mysql_error());
	$sql = mysql_query("SELECT 
							acc_inv_product.ProductID,
							acc_inv_product.ProductName,
							acc_inv_product.ProductUnitQuantity,
							inv_productunits.UnitsSymbol
						FROM
						  acc_inv_product
						  INNER JOIN inv_productunits ON acc_inv_product.ProductUnits = inv_productunits.UnitsID						  
							
						WHERE acc_inv_product.ProductID = '$productid'"); 
	$result = mysql_fetch_assoc($sql);
}
	
else {
	header("location:sessionexpire.php");
}
?>

        <div class="content">
            <div class="container-fluid"> 
				<div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Changed Sale Price for <?php echo $result['ProductName'] ?> Succesfully</h4>
                            </div>
							<div class="content">												
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Product Name </label>
												<input type="text" class="form-control"  name="productname" value="<?php echo $result['ProductName']; ?>" disabled>													
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Product Units </label>
												<input type="text" class="form-control"  value="<?php echo $result['ProductUnitQuantity']." ".$result['UnitsSymbol']; ?>" disabled>	
											</div>
										</div>										
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Present Sale Price</label>
												<input type="text" class="form-control"  value="<?php echo $price; ?>" disabled>	
											</div>
										</div>                
										<div class="col-md-6">
											<div class="form-group">
												<label>Changed Sale Price</label>
												<input type="text" class="form-control" value="<?php echo $saleprice; ?>" disabled>
											</div>
										</div>										
									</div>									
									<div class="row">   
										<div class="col-md-12">
											<div class="form-group label-floating">
												<a href="bm_inv.php"><button class="btn btn-info btn-fill pull-right">Back</button></a>												
											</div>
										</div>                            
									</div>
								
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

        	demo.initChartist();
        	

    	});
	</script>

</html>
