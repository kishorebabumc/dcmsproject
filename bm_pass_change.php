<?php
include("bm_session.php");
include("bm_sidebar.php");
	$error = "";
	$error1 = ""; 
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = $_SESSION['login_user'];
		$pass = $_POST['cpass'];
		$npass = $_POST['npass'];
		$rpass = $_POST['rpass'];
		$sql = "SELECT * FROM users WHERE user='$user' AND pwd = '$pass'";
		$result = mysql_query($sql);
		$count = mysql_num_rows ($result);
		if($count == 1){
			if($npass == $rpass){
				$sql = "UPDATE users SET pwd='$npass' WHERE user='$user'";
				$result = mysql_query($sql) or die(mysql_error());
				$error1 = "Passwords Succesfully updated";
			}
			else{
				$error = "Passwords not matched";
			}
		}
		else {
			$error = "Invalid Current Password";
		}		
	}

?>

        <div class="content">
            <div class="container-fluid">
				<div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
							<div class="content">				
								<form action="" method="post">
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<label>Current Password </label>
												<input type="password" class="form-control" name="cpass" required >
											</div>
										</div>                            
									</div>

									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<label>New Password</label>
												<input type="password" class="form-control" name="npass" required>
											</div>
										</div>                            
									</div>
									<div class="row">   
										<div class="col-md-5">
											<div class="form-group">
												<label>Reapete Password</label>
												<input type="password" class="form-control" name="rpass" required>
											</div>
										</div>                            
									</div>
									<div class="row">   
										<div class="col-md-5">
											<div class="form-group label-floating">
												<button type="submit" class="btn btn-info btn-fill pull-right">Change Password</button>   
												<label style = "color:red"><?php echo $error;  ?></label>
												<label style = "color:green"><?php echo $error1;  ?></label>
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
