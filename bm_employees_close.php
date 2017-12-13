<?php
include("bm_session.php");
include("bm_sidebar.php");
$error = " ";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$empid = $_POST['empid'];
	$user = $_SESSION['login_user'];
	$today = date("Y-m-d");
	$sql = "UPDATE employees SET EntryBy = '$user', DOC = '$today', Status = 0 WHERE EmpID = '$empid' AND Status = 1";
	$sql = mysql_query($sql) or die (mysql_error());
	$sql = "UPDATE employeespersonal SET EntryBy = '$user', DOC = '$today', Status = 0 WHERE EmpID = '$empid' AND Status = 1";
	$sql = mysql_query($sql) or die (mysql_error());
	$sql = "UPDATE employeesprof SET EntryBy = '$user', DOC = '$today', Status = 0 WHERE EmpID = '$empid' AND Status = 1";
	$sql = mysql_query($sql) or die (mysql_error());	
	$sql = "UPDATE users SET Status = 0 WHERE user = '$empid' AND Status = 1";
	$sql = mysql_query($sql) or die (mysql_error());		
	$error = "Employee Terminated from Services";
	
}
if(isset($_GET['empid'])){
	$empid = $_GET['empid'];
	$sql = "SELECT
			  employees.EmpID,
			  employees.Fname,
			  employees.Lname,
			  employees.Sname,
			  employees.DOB,
			  employeespersonal.Education,
			  employeespersonal.Address,
			  employeespersonal.City,
			  employeespersonal.Mobile,
			  designations.Desig
			FROM
			  employees
			  INNER JOIN employeespersonal ON employees.EmpID = employeespersonal.EmpID
			  INNER JOIN employeesprof ON employees.EmpID = employeesprof.EmpID
			  INNER JOIN designations ON employeesprof.Desig = designations.ID
			WHERE
			  employeespersonal.Status = 1 AND
			  employeesprof.Status = 1 AND
			  employees.Status = 1 AND
			  employees.EmpID='$empid'";
	$sql = mysql_query($sql);
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
                                <label style = "color:green"><h4 class="title">Termination of Serivces of Employee</h4></label>
                            </div>
                            <div class="content">
								<form action="" method = "post">		
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name</label>
												<input type="hidden" value = "<?php echo $result['EmpID']; ?>" class="form-control" name = "empid" >
                                                <input type="text" class="form-control"  value = "<?php echo $result['Fname']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control"  value = "<?php echo $result['Lname']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Surname</label>
                                                <input type="text" class="form-control"  value = "<?php echo $result['Sname']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="date" class="form-control"  value = "<?php echo $result['DOB']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Education Qualification</label>
                                                <input type="text" class="form-control"  value = "<?php echo $result['Education']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control"  value = "<?php echo $result['Address']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control"  value = "<?php echo $result['City']; ?>" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control"  value = "<?php echo $result['Mobile']; ?>" disabled >
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control"  value = "<?php echo $result['Desig']; ?>" disabled>
                                            </div>
                                        </div>	
                                    </div>                                    

                                    <button type = "submit" class="btn btn-info btn-fill pull-right">Terminate Employee</button>
									<label style = "color:red"><?php echo $error;  ?></label>
                                    <div class="clearfix"></div>
								<form>	
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
