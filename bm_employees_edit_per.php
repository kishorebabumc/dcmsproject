<?php
include("bm_session.php");
include("bm_sidebar.php");
if(isset($_GET['empid'])){
	$empid = $_GET['empid'];
	$sql = "SELECT
			  employees.EmpID,
			  employees.Fname,
			  employees.Lname,
			  employees.Sname,			  
			  employeespersonal.Education,
			  employeespersonal.Address,
			  employeespersonal.City,
			  employeespersonal.Mobile			  
			FROM
			  employees
			  INNER JOIN employeespersonal ON employees.EmpID = employeespersonal.EmpID 
			WHERE
			  employeespersonal.Status = 1 AND			  
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
                                <label style = "color:green"><h4 class="title">Update Employee Personal Details</h4></label>
                            </div>
                            <div class="content">
								<form action="bm_employees_edit_per_suc.php" method = "post">		
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Employee Name</label>
												<input type="hidden" value = "<?php echo $result['EmpID']; ?>" class="form-control" name = "empid" >
												<input type="hidden" value = "<?php echo $result['Fname']; ?>" class="form-control" name = "fname" >
												<input type="hidden" value = "<?php echo $result['Lname']; ?>" class="form-control" name = "lname" >
												<input type="hidden" value = "<?php echo $result['Sname']; ?>" class="form-control" name = "sname" >
                                                <input type="text" class="form-control"  value = "<?php echo $result['Fname']." ".$result['Lname']." ".$result['Sname']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Education</label>
                                                <input type="text" name = "education" class="form-control"  value = "<?php echo $result['Education']; ?>" >
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" value = "<?php echo $result['Address']; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city"  value = "<?php echo $result['City']; ?>" >
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" name="mobile" value = "<?php echo $result['Mobile']; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <button type = "submit" class="btn btn-info btn-fill pull-right">Update Details</button>									
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
