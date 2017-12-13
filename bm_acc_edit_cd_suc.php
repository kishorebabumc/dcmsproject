<?php
include("bm_session.php");
include("bm_sidebar.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$user = $_SESSION['login_user'];
	$cdid = $_POST['cdid'];
	$name = $_POST['name'];
	$add = $_POST['creditordebtoradd'];
	$city = $_POST['creditordebtorcity'];
	$cell = $_POST['creditordebtorcell'];
	$gst = $_POST['creditordebtorgst'];
	$supplystatus = $_POST['supplystatus'];
	$sql = "UPDATE `acc_creditordebtor` SET CreditorDebtorAddress = '$add', CreditorDebtorCity = '$city', CreditorDebtorCell = '$cell', GSTNo = '$gst', SupplyStatus = '$supplystatus'  WHERE CreditorDebtorID = '$cdid' AND CreditorDebtorStatus = 1";		
	$sql = mysql_query($sql) or die(mysql_error());
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
                                <h4 class="title">Change Sale Price</h4>
                            </div>
							<div class="content">				
								
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Creditor/Debtor Name </label>
												<input type="text" class="form-control"  value="<?php echo $name; ?>" disabled>												
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Address </label>
												<input type="text" class="form-control"  value="<?php echo $add; ?>" disabled>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>City </label>
												<input type="text" class="form-control"  value="<?php echo $city; ?>" disabled>
											</div>
										</div>	
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Mobile</label>
												<input type="text" class="form-control"  value="<?php echo $cell; ?>" disabled>
											</div>
										</div>                
										<div class="col-md-4">
											<div class="form-group">
												<label>GST No</label>
												<input type="text" class="form-control"  value="<?php echo $gst; ?>" disabled>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Supply Status</label>
												<input type="text" class="form-control"  value="<?php echo $supplystatus; ?>" disabled>
											</div>
										</div>	
									</div>									
									<div class="row">   
										<div class="col-md-12">
											<div class="form-group label-floating">
												<a href = "bm_acc_creditordebtor.php"><button class="btn btn-info btn-fill pull-right">Back</button></a>												
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
