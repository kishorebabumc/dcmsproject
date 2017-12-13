<?php
include("bm_session.php");
include("bm_sidebar.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$user = $_SESSION['login_user'];
	$majorid = $_POST['majorid'];
	$subhead = $_POST['subhead'];
	$subheaddesc = $_POST['subheaddesc'];
	$moduleid = $_POST['moduleid'];
	$sql = "INSERT INTO `acc_subhead` (`SubID`, `SubHead`, `SubHeadDesc`, `SubHeadModule`, `MajorID`, `SubHeadEmpID`,`Status`) 
		         VALUES (NULL, '$subhead', '$subheaddesc', '$moduleid', '$majorid', '$user',  1)";
	$result = mysql_query($sql) or die(mysql_error());	
	$lastid = mysql_insert_id();
	if($moduleid == 6){
		$sql = "INSERT INTO `acc_creditordebtor` (`CreditorDebtorID`,`SubID`, `CreditorDebtor`, `Type`, `CreditorDebtorAddress`, `CreditorDebtorCity`, `CreditorDebtorCell`, `GSTNo`, `CreditorDebtorEmpID`,`CreditorDebtorStatus`) 
		         VALUES (NULL, '$lastid', '$subhead', '$majorid', '', '','', '','$user',  1)";
		$result = mysql_query($sql) or die(mysql_error());	
	}
	
	$sql = mysql_query("SELECT * FROM acc_majorhead WHERE MajorID = '$majorid'");	
	$row = mysql_fetch_assoc($sql);
	$sql = mysql_query("SELECT * FROM acc_subhead_module WHERE ModuleID = '$moduleid'");	
	$row1 = mysql_fetch_assoc($sql);		
	if($moduleid == 2){
		$moduleid = 1;
		$subheadpur = "Purchase of ".$subhead;
		$subheaddescpur = "Purchase of ".$subheaddesc;
		$majorid = 29;
		$sql = "INSERT INTO `acc_subhead` (`SubID`, `SubHead`, `SubHeadDesc`, `SubHeadModule`, `MajorID`, `SubHeadEmpID`,`Status`,`InventoryLink`) 
		         VALUES (NULL, '$subheadpur', '$subheaddescpur', '$moduleid', '$majorid', '$user',  1, '$lastid')";
		$result = mysql_query($sql) or die(mysql_error());		
		$subheadsal = "Sale of ".$subhead;
		$subheaddescsal = "Sale of ".$subheaddesc;
		$majorid = 13;
		$sql = "INSERT INTO `acc_subhead` (`SubID`, `SubHead`, `SubHeadDesc`, `SubHeadModule`, `MajorID`, `SubHeadEmpID`,`Status`,`InventoryLink`) 
		         VALUES (NULL, '$subheadsal', '$subheaddescsal', '$moduleid', '$majorid', '$user',  1, '$lastid')";
		$result = mysql_query($sql) or die(mysql_error());		
	}
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
                                <h4 class="title">Add New Head Added Sucessfully</h4>
                            </div>
							<div class="content">				
								
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
                                                <label>Major Head</label>
                                                <input type="text" class="form-control"  value="<?php echo $row['MajorHead']; ?>" disabled>	
                                            </div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Name of the Sub Head  </label>
												<input type="text" class="form-control"  value="<?php echo $subhead; ?>" disabled>	
											</div>
										</div>										
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Sub Head Descritpion</label>
												<input type="text" class="form-control"  value="<?php echo $subheaddesc; ?>" disabled>	
											</div>
										</div>                
										<div class="col-md-6">
											<div class="form-group">
												<label>Sub Head Module</label>
												<input type="text" class="form-control"  value="<?php echo $row1['ModuleType']; ?>" disabled>	
											</div>
										</div>                										
									</div>									
									<div class="row">   
										<div class="col-md-12">
											<div class="form-group label-floating">												
												<a href="bm_heads.php"><button class="btn btn-info btn-fill pull-right">Back</button></a>												
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
	

</html>
