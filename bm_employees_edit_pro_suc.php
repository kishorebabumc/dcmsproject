<?php
include("bm_session.php");
include("bm_sidebar.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$user = $_SESSION['login_user'];
	$empid = $_POST['empid'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$sname = $_POST['sname'];
	$desig = $_POST['desig'];	
	$today = date("Y-m-d");
	$sql = "UPDATE users SET Desig = '$desig' WHERE user='$empid'";
	$result = mysql_query($sql) or die(mysql_error());
	$sql = "UPDATE employeesprof SET DOC = '$today', Status = 0 WHERE EmpID = '$empid' AND Status = 1";
	$sql = mysql_query($sql) or die(mysql_error());
	$sql = "INSERT INTO `employeesprof` (`ID`,`EmpID`, `Desig`, `EntryBy`,`DOE`,`DOC`,`Status`) 
		         VALUES (NULL, '$empid', '$desig','$user','$today','',1)";				 
	$sql = mysql_query($sql) or die(mysql_error());	
	$sql = mysql_query("SELECT * FROM designations WHERE ID = '$desig'") or die (mysql_error());
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
                                <label style = "color:green"><h4 class="title">Changed Employee Designation Succesfully</h4></label>
                            </div>
                            <div class="content">								
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Employee Name</label>												
                                                <input type="text" class="form-control"  value = "<?php echo $fname." ".$lname." ".$sname; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control"  value = "<?php echo $result['Desig']; ?>" disabled>
                                            </div>
                                        </div>                                        
                                    </div>
                                    
                                    <a href="bm_employees.php"><button type = "submit" class="btn btn-info btn-fill pull-right">Back</button></a>									
                                    <div class="clearfix"></div>
								
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
