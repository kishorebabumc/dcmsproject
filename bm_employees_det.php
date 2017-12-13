<?php
	include("bm_session.php");
	include("bm_sidebar.php");
	if(isset($_GET['empid'])){
		$empid = $_GET['empid'];
		$sql = "SELECT * FROM employees WHERE EmpID = '$empid' AND Status = 1"; 
		$sql = mysql_query($sql) or die(mysql_error());
		$result = mysql_fetch_array($sql);	
	}
	else {
		header("location:sessionexpire.php");
	}
?>

        <div class="content">
            <div class="container-fluid">                
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">					
							<div class="header pull-left">                                
								<h4 class="title"><?php echo $result['Fname']." ".$result['Lname']." ".$result['Sname']; ?> Employee Details</h4>                                									
							</div>
							<div class = "content">								
								<div class="container">
									<h2>   </h2>
									
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
										<li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
										<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
										<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
									</ul>
									<div class="tab-content">
										<div id="home" class="tab-pane fade in active">
										  <h3>HOME</h3>
										  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
										<div id="menu1" class="tab-pane fade">
										  <h3>Menu 1</h3>
										  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										</div>
										<div id="menu2" class="tab-pane fade">
										  <h3>Menu 2</h3>
										  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
										</div>
										<div id="menu3" class="tab-pane fade">
										  <h3>Menu 3</h3>
										  <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
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
