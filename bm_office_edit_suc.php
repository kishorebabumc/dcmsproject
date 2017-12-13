<?php
include("bm_session.php");
include("bm_sidebar.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = $_SESSION['login_user'];
		$offid = $_POST['offid'];		
		$officename = $_POST['officename'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$phone = $_POST['phone'];				
		$sql = "UPDATE `officemonitor` SET Status = 0 WHERE OffID = '$offid'";
		$result = mysql_query($sql) or die(mysql_error());	
		$sql = "INSERT INTO `officemonitor` (`ID`, `OffID`, `Address`, `City`, `Phone`, `EmpID`, `Status`) 
		         VALUES (NULL, '$offid', '$address', '$city','$phone', '$user',1)";
		$result = mysql_query($sql) or die(mysql_error());	
		
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
                                <h4 class="title">Office Details Modified Succesfully</h4>
                            </div>
							<div class="content">												
									<div class="row">
										<div class="col-md-3">	
											<div class = "form-group">
												<label>Office Name </label>												
											</div>	
										</div>
										<div class="col-md-3">	
											<div class = "form-group">												
												<?php echo $officename; ?>											
											</div>	
										</div>
										<div class="col-md-3">
											<div class = "form-group">
												<label>Address </label>										
											</div>	
										</div>
										<div class="col-md-3">
											<div class = "form-group">												
												<?php echo $address; ?>
											</div>	
										</div>										
									</div>
									<div class="row">
										<div class="col-md-3">											
											<div class = "form-group">
												<label>City</label>												
											</div>		
										</div> 
										<div class="col-md-3">											
											<div class = "form-group">												
												<?php echo $city; ?>	
											</div>		
										</div> 	
										<div class="col-md-3">											
											<div class = "form-group">
												<label>Phone No.</label>												
											</div>		
										</div>
										<div class="col-md-3">											
											<div class = "form-group">												
												<?php echo $phone; ?>
											</div>		
										</div>		
									</div>									
									<div class="row">   
										<div class="col-md-12">
											<div class="form-group label-floating">
												<a href="bm.php"><button class="btn btn-info btn-fill pull-right">Home</button></a>												
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
