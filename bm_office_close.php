<?php
include("bm_session.php");
include("bm_sidebar.php");
$error = " ";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$offid = $_POST['offid'];
	$sql = "UPDATE officemonitor SET Status = 0 WHERE OffID = '$offid' AND Status = 1";
	$sql = mysql_query($sql) or die (mysql_error());
	$sql = "UPDATE offices SET Status = 0 WHERE OffID = '$offid'";
	$sql = mysql_query($sql) or die (mysql_error());	
	$error = "Office Closed Permanently";
}
if(isset($_GET['offid'])){
	$offid = $_GET['offid'];
	$sql = "SELECT
			  offices.OfficeName,
			  offices.OffID,
			  officemonitor.Address,
			  officemonitor.City,
			  officemonitor.Phone
			FROM
			  offices
			  INNER JOIN officemonitor ON offices.OffID = officemonitor.OffID
			Where
			  officemonitor.Status = 1 AND officemonitor.OffID = '$offid'";
	$sql = mysql_query($sql) or die (mysql_error());
	$result = mysql_fetch_array($sql);	
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
                                <h4 class="title">Close Office </h4>
                            </div>
							<div class="content">				
								<form action="" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Office Name </label>
												<input type="hidden" value = "<?php echo $result['OffID']; ?>" class="form-control" name = "offid" >	
												<input type="text" value = "<?php echo $result['OfficeName']; ?>" class="form-control" disabled >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Address </label>
												<input type="text" value = "<?php echo $result['Address']; ?>"class="form-control" name="address" disabled >
											</div>
										</div>										
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>City</label>
												<input type="text" value = "<?php echo $result['City']; ?>" class="form-control" name="city" disabled>
											</div>
										</div>                
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone No.</label>
												<input type="text" value = "<?php echo $result['Phone']; ?>" class="form-control" name="phone" disabled>
											</div>
										</div>                										
									</div>									
									<div class="row">   
										<div class="col-md-12">
											<div class="form-group label-floating">
												<button type="submit" class="btn btn-info btn-fill pull-right" disabled>Permanently Close Office</button>												
												<label style = "color:red"><?php echo $error;  ?></label>
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
