<?php
include("bm_session.php");
include("bm_sidebar.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = $_SESSION['login_user'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$sname = $_POST['sname'];
		$dob = $_POST['dob'];
		$qualification = $_POST['qualification'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$mobile = $_POST['mobile'];
		$desig = $_POST['desig'];
		$sql = mysql_query("SELECT * FROM employees");
		$count = mysql_num_rows($sql);
		$count = $count + 1;
		$empid = "DCMS".$count;
		$today = date("Y-m-d");
		$sql = "INSERT INTO `employees` (`EmpID`, `Fname`, `Lname`,`Sname`,`DOB`,`EntryBy`,`DOE`,`DOC`,`Status`) 
		         VALUES ('$empid', '$fname', '$lname','$sname','$dob','$user','$today','',1)";
		$result = mysql_query($sql) or die(mysql_error());
		$sql = "INSERT INTO `employeespersonal` (`ID`,`EmpID`, `Education`, `Address`,`City`,`Mobile`,`EntryBy`,`DOE`,`DOC`,`Status`) 
		         VALUES (NULL, '$empid', '$qualification', '$address','$city','$mobile','$user','$today','',1)";
		$result = mysql_query($sql) or die(mysql_error());
		$sql = "INSERT INTO `employeesprof` (`ID`,`EmpID`, `Desig`, `EntryBy`,`DOE`,`DOC`,`Status`) 
		         VALUES (NULL, '$empid', '$desig','$user','$today','',1)";
		$result = mysql_query($sql) or die(mysql_error());
		$sql = "INSERT INTO `users` (`user`, `pwd`, `Desig`,`Status`) 
		         VALUES ('$empid', 123456 ,'$desig',1)";
		$result = mysql_query($sql) or die(mysql_error());
		$sql = "INSERT INTO `allot` (`ID`, `EmpID`, `OffID`,`EntryBy`,`DOE`,`DOC`,`Status`) 
		         VALUES (NULL,'$empid', '','$user','$today','',0)";
		$result = mysql_query($sql) or die(mysql_error());
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
                                <label style = "color:green"><h4 class="title">Employee Added Sucessfully</h4></label>
                            </div>
                            <div class="content">
                                
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control"  value = "<?php echo $fname; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control"  value = "<?php echo $lname; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Surname</label>
                                                <input type="text" class="form-control"  value = "<?php echo $sname; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="date" class="form-control"  value = "<?php echo $dob; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Education Qualification</label>
                                                <input type="text" class="form-control"  value = "<?php echo $qualification; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control"  value = "<?php echo $address; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control"  value = "<?php echo $city; ?>" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control"  value = "<?php echo $mobile; ?>" disabled >
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control"  value = "<?php echo $result['Desig']; ?>" disabled>
                                            </div>
                                        </div>	
                                    </div>                                    

                                    <a href="bm.php"><button class="btn btn-info btn-fill pull-right">Home</button></a>
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
