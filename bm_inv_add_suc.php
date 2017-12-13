<?php
include("bm_session.php");
include("bm_sidebar.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$user = $_SESSION['login_user'];
	$productname = $_POST['productname'];
	$productsubid = $_POST['productsubid'];
	$productdesc = $_POST['productdesc'];
	$productunits = $_POST['productunits'];
	$unitquantity = $_POST['unitquantity'];
	$producttax = $_POST['producttax'];	
	$sql = "INSERT INTO `acc_inv_product` (`ProductID`, `ProductSubID`, `ProductName`, `ProductUnits`, `ProductUnitQuantity`, `ProductDesc`, `ProductGST`, `ProductEmpID`,`ProductStatus`) 
		         VALUES (NULL, '$productsubid', '$productname', '$productunits', '$unitquantity', '$productdesc', '$producttax','$user',  1)";
	$result = mysql_query($sql) or die(mysql_error());						
	$sql = mysql_query("SELECT * FROM acc_subhead WHERE SubID = '$productsubid'");
	$row = mysql_fetch_assoc($sql);
	$sql = mysql_query("SELECT * FROM inv_productunits WHERE UnitsID = '$productunits'");	
	$row1 = mysql_fetch_assoc($sql);
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
                                <h4 class="title">Add New Product</h4>
                            </div>
							<div class="content">												
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Product Name </label>
												<input type="text" class="form-control"  value="<?php echo $productname; ?>" disabled>	
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Product Type </label>
												<input type="text" class="form-control"  value="<?php echo $row['SubHead']; ?>" disabled>	
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Product Description </label>
												<input type="text" class="form-control"  value="<?php echo $productdesc; ?>" disabled>	
											</div>
										</div>	
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Product Units</label>
												<input type="text" class="form-control"  value="<?php echo $row1['Units'].'-'.$row1['UnitsSymbol']; ?>" disabled>	
											</div>
										</div>                
										<div class="col-md-4">
											<div class="form-group">
												<label>Unit per Quantity</label>
												<input type="text" class="form-control"  value="<?php echo $unitquantity; ?>" disabled>	
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Product GST</label>
												<input type="text" class="form-control"  value="<?php echo $producttax."%"; ?>" disabled>	
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
