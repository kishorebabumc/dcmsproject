<?php
include("bm_session.php");
include("bm_sidebar.php");
$sql = mysql_query("SELECT * FROM acc_subhead WHERE SubHeadModule = 2");
$sql1 = mysql_query("SELECT * FROM inv_productunits");
$sql2 = mysql_query("SELECT * FROM inv_taxslabs");

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
								<form action="bm_inv_add_suc.php" method="post">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Product Name </label>
												<input type="text" class="form-control" name="productname" required >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Product Type </label>
												<select name="productsubid" class="form-control">								
													<?php while ($row = mysql_fetch_assoc($sql)) 												
														echo "<option value ='".$row['SubID']."'>".$row["SubHead"]."</option>";								
													 ?>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Product Description </label>
												<input type="text" class="form-control" name="productdesc" required >
											</div>
										</div>	
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Product Units</label>
												<select name="productunits" class="form-control">								
													<?php while ($row = mysql_fetch_assoc($sql1)) 												
														echo "<option value ='".$row['UnitsID']."'>".$row["Units"]."-".$row["UnitsSymbol"]."</option>";								
													 ?>
												</select>
											</div>
										</div>                
										<div class="col-md-4">
											<div class="form-group">
												<label>Unit per Quantity</label>
												<input type="text" class="form-control" name="unitquantity" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Product GST</label>
												<select name="producttax" class="form-control">								
													<?php while ($row = mysql_fetch_assoc($sql2)) 												
														echo "<option value ='".$row['Slab']."'>".$row["Slab"]."%"."</option>";								
													 ?>
												</select>
											</div>
										</div>	
									</div>									
									<div class="row">   
										<div class="col-md-12">
											<div class="form-group label-floating">
												<button type="submit" class="btn btn-info btn-fill pull-right">Add Product</button>												
											</div>
										</div>                            
									</div>
								</form> 
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
