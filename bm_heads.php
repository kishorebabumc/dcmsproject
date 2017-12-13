<?php
	include("bm_session.php");
	include("bm_sidebar.php");
	$sql = "SELECT
			  acc_mainhead.MainHead,
			  acc_majorhead.MajorHead,
			  acc_subhead.SubHead,
			  acc_subhead_module.ModuleType
			FROM
			  acc_subhead
			  INNER JOIN acc_majorhead ON acc_subhead.MajorID = acc_majorhead.MajorID
			  INNER JOIN acc_mainhead ON acc_mainhead.MainID = acc_majorhead.MainID
			  INNER JOIN acc_subhead_module ON acc_subhead.SubHeadModule = acc_subhead_module.ModuleID
			where  acc_mainhead.MainID = 1 OR acc_mainhead.MainID = 3 OR acc_mainhead.MainID = 5 ORDER by acc_mainhead.MainID";
	$liabilities = mysql_query($sql);
	$count = mysql_num_rows($liabilities);
	$sql = "SELECT
			  acc_mainhead.MainHead,
			  acc_majorhead.MajorHead,
			  acc_subhead.SubHead,
			  acc_subhead_module.ModuleType
			FROM
			  acc_subhead
			  INNER JOIN acc_majorhead ON acc_subhead.MajorID = acc_majorhead.MajorID
			  INNER JOIN acc_mainhead ON acc_mainhead.MainID = acc_majorhead.MainID
			  INNER JOIN acc_subhead_module ON acc_subhead.SubHeadModule = acc_subhead_module.ModuleID
			where  acc_mainhead.MainID = 2 OR acc_mainhead.MainID = 4 OR acc_mainhead.MainID = 6 ORDER by acc_mainhead.MainID";
	$assets = mysql_query($sql);
	$count1 = mysql_num_rows($assets);
	
?>

        <div class="content">
            <div class="container-fluid">                
				<div class="row">
                    <div class="col-md-6">
                        <div class="card">								
							<div class="header pull-right">
                                <a href="bm_heads_add.php?head=1"><h4 class="title">Liabilities and Income  <button class="btn btn-info btn-fill">Add New Head</button></h4></a>                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table ">
                                    <thead>
										<th>Sl.No.</th>
                                        <th>Sub Head</th>
										<th>Module Type</th>
                                    	<th>Major Head</th>                                    	
										<th>Main Head</th>                                    	
                                    </thead>
                                    <tbody>
                                        <?php if($count>0){											
											$slno=1;
											while($result = mysql_fetch_assoc($liabilities))
											{ 	
												echo "<tr><td>".$slno."</td>";
												echo "<td>".$result['SubHead']."</td>";
												echo "<td>".$result['ModuleType']."</td>";															
												echo "<td>".$result['MajorHead']."</td>";
												echo "<td>".$result['MainHead']."</td></tr>";												
												$slno = $slno +1;					
											}				
										}
										?>                   
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="card">								
							<div class="header pull-right">
                                <a href="bm_heads_add.php?head=2"><h4 class="title">Assets and Expenditure  <button class="btn btn-info btn-fill">Add New Head</button></h4></a>                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table ">
                                    <thead>
                                        <th>Sl.No.</th>
                                        <th>Sub Head</th>
										<th>Module Type</th>
                                    	<th>Major Head</th>                                    	
										<th>Main Head</th>                               	
                                    </thead>
                                    <tbody>
										<?php if($count1>0){	
											$slno=1;
											while($result = mysql_fetch_assoc($assets))
											{ 	
												echo "<tr><td>".$slno."</td>";
												echo "<td>".$result['SubHead']."</td>";
												echo "<td>".$result['ModuleType']."</td>";															
												echo "<td>".$result['MajorHead']."</td>";
												echo "<td>".$result['MainHead']."</td></tr>";												
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
