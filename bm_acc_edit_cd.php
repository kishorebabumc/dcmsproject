<?php
include("bm_session.php");
include("bm_sidebar.php");
if(isset($_GET['cdid'])){	
	$creditordebtorid = $_GET['cdid'];	
	$sql = mysql_query("SELECT * FROM acc_creditordebtor WHERE CreditorDebtorID = '$creditordebtorid'");
	$result = mysql_fetch_assoc($sql);
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
                                <h4 class="title">Change Sale Price</h4>
                            </div>
							<div class="content">				
								<form action="bm_acc_edit_cd_suc.php" method="post">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Creditor/Debtor Name </label>
												<input type="text" class="form-control"  name="name" value="<?php echo $result['CreditorDebtor']; ?>" disabled>
												<input type="hidden" name="name" value="<?php echo $result['CreditorDebtor']; ?>" >
												<input type="hidden" name="cdid" value="<?php echo $result['CreditorDebtorID']; ?>" >	
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Address </label>
												<input type="text" class="form-control" name="creditordebtoradd" value="<?php echo $result['CreditorDebtorAddress']; ?>" >	
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>City </label>
												<input type="text" class="form-control" name="creditordebtorcity" value="<?php echo $result['CreditorDebtorCity']; ?>" >	
											</div>
										</div>	
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Mobile</label>
												<input type="text" class="form-control" name="creditordebtorcell" value="<?php echo $result['CreditorDebtorCell']; ?>" >													
											</div>
										</div>                
										<div class="col-md-4">
											<div class="form-group">
												<label>GST No</label>
												<input type="text" class="form-control" name="creditordebtorgst" value="<?php echo $result['GSTNo']; ?>" >	
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Supplier/ Purchaser Status</label>
												<select name="supplystatus" class="form-control">																					
													<option value ="<?php echo $result['SupplyStatus']; ?>"><?php echo $result['SupplyStatus']; ?></option>													
													<option value ="Yes">Yes</option>
													<option value ="No">No</option>		
												</select>												
											</div>
										</div>	
									</div>									
									<div class="row">   
										<div class="col-md-12">
											<div class="form-group label-floating">
												<button type="submit" class="btn btn-info btn-fill pull-right">Update Details</button>												
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
