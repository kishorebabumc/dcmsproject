<?php
include("bm_session.php");
include("bm_sidebar.php");
if(isset($_GET['empid'])){
	$empid = $_GET['empid'];
	$sql = "SELECT
			  employees.Fname,
			  employees.Lname,
			  employees.Sname,
			  designations.ID,
			  designations.Desig,
			  employeesprof.EmpID
			FROM
			  employees			  
			  INNER JOIN employeesprof ON employees.EmpID = employeesprof.EmpID
			  INNER JOIN designations ON employeesprof.Desig = designations.ID
			WHERE
			   employeesprof.Status = 1 AND employees.Status = 1 AND employees.EmpID='$empid'";
			  
	$sql = mysql_query($sql);
	$result = mysql_fetch_array($sql);	
	$sql = "select * from designations";
	$sql = mysql_query($sql);
	$sql1 = "SELECT
				  employees.EmpID,				  
				  allot.EmpID
				FROM
				  allot
				  INNER JOIN employees ON allot.EmpID = employees.EmpID
				WHERE
					employees.Status = 1 AND allot.OffID = '' AND allot.Status = 0 AND allot.EmpID = '$empid'";
	$sql1 = mysql_query($sql1);
	$count = mysql_num_rows($sql1);	
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
                                <label style = "color:green"><h4 class="title">Change Employee Designation</h4></label>
                            </div>
                            <div class="content">
								<form action="bm_employees_edit_pro_suc.php" method = "post">		
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Employee Name</label>
												<input type="hidden" value = "<?php echo $result['EmpID']; ?>" class="form-control" name = "empid" >
												<input type="hidden" value = "<?php echo $result['Fname']; ?>" class="form-control" name = "fname" >
												<input type="hidden" value = "<?php echo $result['Lname']; ?>" class="form-control" name = "lname" >
												<input type="hidden" value = "<?php echo $result['Sname']; ?>" class="form-control" name = "sname" >
                                                <input type="text" class="form-control"  value = "<?php echo $result['Fname']." ".$result['Lname']." ".$result['Sname']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <select name="desig" class="form-control">	
														<option value = "<?php echo $result['ID']; ?>"><?php echo $result['Desig'];?> </option>
													<?php 
														if($count>0){
															while ($row = mysql_fetch_assoc($sql)) 
																echo "<option value ='".$row['ID']."'>".$row["Desig"]."</option>";								
														}
														else{
															echo "<option value =''>"."Relieve Employee First"."</option>";								
														}
													 ?>
												</select>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <?php
										if($count>0){
											echo "<button type = 'submit' class='btn btn-info btn-fill pull-right' >Update Details</button>";									
										}
										else {
											echo "<button type = 'submit' class='btn btn-info btn-fill pull-right' disabled >Update Details</button>";
										}
									?>	
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
