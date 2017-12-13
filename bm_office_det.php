<?php
	include("bm_session.php");
	include("bm_sidebar.php");
	if(isset($_GET['offid'])){
		$offid = $_GET['offid'];
		$sql = "SELECT * FROM offices WHERE OffID = '$offid' AND Status = 1"; 
		$sql = mysql_query($sql) or die(mysql_error());
		$result = mysql_fetch_array($sql);	
		$sql = "SELECT * FROM officemonitor WHERE OffID='$offid' AND Status = 1";
		$sql = mysql_query($sql) or die(mysql_error());
		$result1 = mysql_fetch_array($sql);	
		$sql = "SELECT * FROM officemonitor WHERE OffID='$offid' AND Status = 0";
		$sql = mysql_query($sql) or die(mysql_error());		
		$sql1 = "SELECT
				  employees.Fname,
				  employees.Lname,
				  employees.Sname,
				  designations.Desig,
				  allot.EmpID
				FROM
				  allot
				  INNER JOIN employees ON allot.EmpID = employees.EmpID
				  INNER JOIN employeesprof ON employees.EmpID = employeesprof.EmpID
				  INNER JOIN designations ON employeesprof.Desig = designations.ID
				WHERE
					employees.Status = 1 AND allot.OffID = '' AND allot.Status = 0 AND employeesprof.Status = 1";
		$sql1 = mysql_query($sql1) or die(mysql_error());
		$sql2 = mysql_query("SELECT
							  employees.Fname,
							  employees.Lname,
							  employees.Sname,
							  designations.Desig,
							  allot.EmpID,
							  allot.DOE							  
							FROM
							  allot
							  INNER JOIN employees ON allot.EmpID = employees.EmpID
							  INNER JOIN employeesprof ON employees.EmpID = employeesprof.EmpID
							  INNER JOIN designations ON employeesprof.Desig = designations.ID
							WHERE allot.OffID = '$offid' AND allot.Status = 1 AND employees.Status = 1 AND employeesprof.Status = 1");
		$sql3 = mysql_query("SELECT
							  employees.Fname,
							  employees.Lname,
							  employees.Sname,
							  designations.Desig,
							  allot.EmpID,
							  allot.DOE,
							  allot.DOC
							FROM
							  allot
							  INNER JOIN employees ON allot.EmpID = employees.EmpID
							  INNER JOIN employeesprof ON employees.EmpID = employeesprof.EmpID
							  INNER JOIN designations ON employeesprof.Desig = designations.ID
							WHERE allot.OffID = '$offid' AND allot.Status = 0 AND employees.Status = 1 AND employeesprof.Status = 1") or die(mysql_error());
	}
	else {
		header("location:sessionexpire.php");
	}
?>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><?php echo $result['OfficeName'];?></h4>
                        <p class="category">Office Details</p>

                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Present Office Address</h5>
								<p>Address: <?php echo $result1['Address'].", ".$result1['City']; ?></p>
								<p>Phone No.: <?php echo $result1['Phone'];?></p>                                        
                            </div>                            
                        </div>                        						
                        <div class="container">						  
							<div class="row">
								<div class="col-md-10">	
								  <ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#menu1">Employees</a></li>									
									<li><a data-toggle="tab" href="#home">Previous Addresses</a></li>									
								  </ul>
								  <div class="tab-content">									
									<div id="menu1" class="tab-pane fade in active">
									  <h5>Presently Working Employees</h5>
									  <div class="content table-responsive table-full-width">
										<table class="table ">
											<thead>
												<th>Sl.No</th>
												<th>Emp ID</th>										
												<th>Name of the Employee</th>
												<th>Designation</th>
												<th>From</th>												
												<th>Leave</th>
											</thead>
											<tbody>
												<?php 
													$count = mysql_num_rows($sql2);
													if($count>0){
													$slno=1;
													while($row2 = mysql_fetch_assoc($sql2))
													{ 	
														echo "<tr><td>".$slno."</td>";
														echo "<td>".$row2['EmpID']."</td>";					
														echo "<td>".$row2['Fname']." ".$row2['Lname']." ".$row2['Sname']."</td>";					
														echo "<td>".$row2['Desig']."</td>";					
														echo "<td>".$row2['DOE']."</td>";
														echo "<td>
																  <a href='bm_allotment_close.php?empid=".$row2['EmpID']."&&offid=".$offid."'><i class='fa fa-close'></i></a>							  
															  </td></tr>";
														$slno = $slno +1;					
													}				
												}
												?>                 
											</tbody>
										</table>
									  </div>
									  <h5>Assign Employees</h5>
									  <div class="content table-responsive table-full-width">
										<table class="table ">											
											<tbody>
												<tr> <form action="bm_allotment_office.php" method ="post">
													<td>
														<select name="empid" class="form-control">								
															<?php while ($row = mysql_fetch_assoc($sql1)) 
																echo "<option value ='".$row['EmpID']."'>".$row["Fname"]." ".$row["Lname"]." ".$row["Sname"]."-".$row["Desig"]."</option>";
															?>
														</select>
														<input type="hidden" name="offid" value="<?php echo $offid;?>"> 
													</td>
													<td><button type="submit" class="btn btn-info btn-fill">Assign Employee</button></td>													
													</form>
												</tr>
											</tbody>
										</table>
									  </div>
									  <h5>Previous Worked Employees</h5>
									  <div class="content table-responsive table-full-width">
										<table class="table ">
											<thead>
												<th>Sl.No</th>
												<th>Emp ID</th>										
												<th>Name of the Employee</th>
												<th>Designation</th>
												<th>From</th>
												<th>To</th>
											</thead>
											<tbody>
												<?php 
													$count = mysql_num_rows($sql3);
													if($count>0){
													$slno=1;
													while($row3 = mysql_fetch_assoc($sql3))
													{ 	
														echo "<tr><td>".$slno."</td>";
														echo "<td>".$row3['EmpID']."</td>";					
														echo "<td>".$row3['Fname']." ".$row3['Lname']." ".$row3['Sname']."</td>";					
														echo "<td>".$row3['Desig']."</td>";					
														echo "<td>".$row3['DOE']."</td>";
														echo "<td>".$row3['DOC']."</td></tr>";
														$slno = $slno +1;					
													}				
												}
												?>                 
											</tbody>
										</table>
									  </div>	
									</div>
									<div id="home" class="tab-pane fade">
									  <h3>Address</h3>
									  <div class="content table-responsive table-full-width">
										<table class="table ">
											<thead>
												<th>Sl.No.</th>
												<th>Address</th>
												<th>City</th>										
												<th>Phone No.</th>												
											</thead>
											<tbody>
												<?php 
													$count = mysql_num_rows($sql);
													if($count>0){
													$slno=1;
													while($row = mysql_fetch_assoc($sql))
													{ 	
														echo "<tr><td>".$slno."</td>";
														echo "<td>".$row['Address']."</td>";					
														echo "<td>".$row['City']."</td>";					
														echo "<td>".$row['Phone']."</td>";
														$slno = $slno +1;					
													}				
												}
												?>                 
											</tbody>
										</table>
									  </div>	
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
