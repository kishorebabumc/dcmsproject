<?php
	include("bm_session.php");
	include("bm_sidebar.php");
	$sql = "SELECT
			  offices.OfficeName,
			  offices.OffID,
			  officemonitor.Address,
			  officemonitor.City,
			  officemonitor.Phone
			FROM
			  offices
			  INNER JOIN officemonitor ON offices.OffID = officemonitor.OffID
			Where
			  officemonitor.Status = 1"; 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		
		$name = $_POST['search'];	
		
		$sql .= " AND (offices.OfficeName LIKE '%$name%')";		
			
	}		  
	$sql = mysql_query($sql);
	$count = mysql_num_rows($sql);			  
?>

        <div class="content">
            <div class="container-fluid">                
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">
							<form action="" method="post">	
								<div class="header pull-left">                                
									<h4 class="title">Offices / Sale Points</h4>                                
									<p class="category"><input class ="form_group" type="text" name="search" autocomplete="off" ><i type = "submit" class="fa fa-search"></i></p>
								</div>
							</form>	
							<div class="header pull-right">
                                <a href="bm_office_add.php"><h4 class="title"><button class="btn btn-info btn-fill">Add New Office</button></h4></a>                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table ">
                                    <thead>
                                        <th>Sl.No</th>
										<th>Office Name</th>
                                    	<th>Address</th>
                                    	<th>City</th>
                                    	<th>Phone No</th>
                                    	<th>Modify</th>
										<th>Close</th>
                                    </thead>
                                    <tbody>
                                        <?php if($count>0){
											$slno=1;
											while($result = mysql_fetch_assoc($sql))
											{ 	
												echo "<tr><td>".$slno."</td>";	
												echo "<td><a href='bm_office_det.php?offid=".$result['OffID']."'>".$result['OfficeName']."</td>";					
												echo "<td>".$result['Address']."</td>";					
												echo "<td>".$result['City']."</td>";
												echo "<td>".$result['Phone']."</td>";												
												echo "<td>
														  <a href='bm_office_edit.php?offid=".$result['OffID']."'><i class='fa fa-pencil'></i></a>							  
													  </td>";
												echo "<td>
														  <a href='bm_office_close.php?offid=".$result['OffID']."'><i class='fa fa-close'></i></a>							  
													  </td></tr>";
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
