<?php
include("bm_session.php");
include("bm_sidebar.php");
$sql1 = mysql_query("SELECT * FROM acc_subhead_module"); 
if(isset($_GET['head'])){
	$head = $_GET['head'];
	if($head == 1){
		$sql = mysql_query("SELECT * FROM `acc_majorhead` WHERE MainID = 1 OR MainID = 3 OR MainID = 5");		
	}
	else if ($head == 2){
		$sql = mysql_query("SELECT * FROM `acc_majorhead` WHERE MainID = 2 OR MainID = 4 OR MainID = 6");
	}
	else {
		header("location:sessionexpire.php");
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
                                <h4 class="title">Add New <?php if($head == 1 ) { echo "Liabilities and Income"; } else { echo "Assets and Expenditure";  }?> Head of Account</h4>
                            </div>
							<div class="content">				
								<form action="bm_heads_add_suc.php" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
                                                <label>Major Head</label>
                                                <select name="majorid" class="form-control">								
													<?php while ($row = mysql_fetch_assoc($sql)) 												
														echo "<option value ='".$row['MajorID']."'>".$row["MajorHead"]."</option>";								
													 ?>
												</select>
                                            </div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Name of the Sub Head  </label>
												<input type="text" class="form-control" name="subhead" required>
											</div>
										</div>										
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Sub Head Descritpion</label>
												<input type="text" class="form-control" name="subheaddesc">
											</div>
										</div>                
										<div class="col-md-6">
											<div class="form-group">
												<label>Sub Head Module</label>
												<select name="moduleid" class="form-control">								
													<?php while ($row = mysql_fetch_assoc($sql1)) 												
														echo "<option value ='".$row['ModuleID']."'>".$row["ModuleType"]."</option>";								
													 ?>
												</select>
											</div>
										</div>                										
									</div>									
									<div class="row">   
										<div class="col-md-12">
											<div class="form-group label-floating">												
												<button type="submit" class="btn btn-info btn-fill pull-right">Add Head of Account</button>												
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
	

</html>
