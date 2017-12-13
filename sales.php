<?php
    include('sales_session.php');
    if($_SESSION['role']==4){
        
    }
    else{
       header("location:sessionexpire.php");
    }
	$user = $_SESSION['login_user'];
	$sql = "SELECT
			  employees.Fname,
			  employees.Lname,
			  employees.Sname,
			  offices.OffID,
			  offices.OfficeName
			FROM
			  allot
			  INNER JOIN employees ON allot.EmpID = employees.EmpID
			  INNER JOIN offices ON allot.OffID = offices.OffID
			WHERE
			  allot.EmpID = '$user' and allot.Status = 1";		
	$sql = mysql_query($sql);
	$result = mysql_fetch_assoc($sql);	
	$offid = $result['OffID'];
include("sales_sidebar.php");
	$sql = "SELECT
			  acc_inv_stockregister.StockCB,
			  acc_inv_product.ProductName,
			  acc_inv_product.ProductUnitQuantity,
			  inv_productunits.UnitsSymbol
			FROM
			  acc_inv_stockregister
			  INNER JOIN acc_inv_product ON acc_inv_stockregister.ProductID = acc_inv_product.ProductID
			  INNER JOIN inv_productunits ON acc_inv_product.ProductUnits = inv_productunits.UnitsID
			WHERE 
			  StockOfficeID = '$offid' AND StockStatus = 1";
	$sql = mysql_query($sql);
	$count = mysql_num_rows($sql);	
	$today = date("Y-m-d");
	$sql1 = mysql_query("SELECT
						  acc_generalledger.GLCB
						FROM
						  acc_generalledger
						  INNER JOIN acc_subhead ON acc_generalledger.GLSubID = acc_subhead.SubID
						  INNER JOIN acc_majorhead ON acc_subhead.MajorID = acc_majorhead.MajorID
						WHERE  acc_majorhead.MajorID= 22 AND acc_generalledger.GLOffID = '$offid' AND acc_generalledger.GLStatus = 1");
	$cou = mysql_num_rows($sql1);
	if ($cou >0){
		$cash = mysql_fetch_assoc($sql1);
		$cashcb = $cash['GLCB'];
	}
	else{
		$cashcb = 0;
	}
	$sql2 = mysql_query("SELECT
						  acc_cashbook.CashBookCredit,
						  acc_subhead.SubHead
						FROM
						  acc_cashbook
						  INNER JOIN acc_subhead ON acc_cashbook.CashBookSubID = acc_subhead.SubID
						WHERE  acc_cashbook.CashBookOffID = '$offid' AND acc_cashbook.CashBookDate = '$today' AND acc_cashbook.CashBookCredit>0 ");
	$count2 = mysql_num_rows($sql2);					
?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Present Stock Position</h4>                                
                            </div>
                            <div class="content table-responsive table-full-width">
								<table class="table ">	
									<thead>
										<th>Sl.No</th>
										<th>Product Name</th>																				                                    	
                                    	<th>Available Quantity</th>                                    	
									</thead>	
									<tbody>
										<?php if($count>0){
											$slno=1;											
											while($row1 = mysql_fetch_assoc($sql))
											{ 	
												echo "<tr><td>".$slno."</td>";
												echo "<td>".$row1['ProductName']."-".$row1['ProductUnitQuantity'].$row1['UnitsSymbol']."</td>";												
												echo "<td align='center'>".$row1['StockCB']."</td></tr>";
												$slno = $slno +1;												
											}				
										}
										?>
									
									</tbody>
								</table>
							</div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Cash Book on <?php echo $today;?></h4>                                
                            </div>
                            <div class="content">
								<div class="row">		
									<div class="col-md-6"> 
										<div class="content table-responsive table-full-width">
											<table class="table ">	
												<thead>
													<th>Sl.No</th>
													<th>Head</th>																				                                    	
													<th>Receipt Amount</th>                                    	
												</thead>	
												<tbody>
													<tr>
														<td></td>
														<td>Opening Balance</td>
														<td></td>
													</tr>
													<?php if($count2>0){
														$slno=1;											
														while($row1 = mysql_fetch_assoc($sql2))
														{ 	
															echo "<tr><td>".$slno."</td>";
															echo "<td>".$row1['SubHead']."</td>";												
															echo "<td align='left'>".$row1['CashBookCredit']."</td></tr>";
															$slno = $slno +1;												
														}				
													}
													?>
												
												</tbody>
											</table>
										</div>										 
									</div>
									<div class="col-md-6">  </div>
								</div>
								<div class="row">		
									<div class="col-md-6"> 
										
									</div>
									<div class="col-md-6">  
									
									</div>
								</div>	
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">2014 Sales</h4>
                                <p class="category">All products including Taxes</p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Tesla Model S
                                        <i class="fa fa-circle text-danger"></i> BMW 5 Series
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Tasks</h4>
                                <p class="category">Backend development</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                    </label>
                                                </td>
                                                <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                    </label>
                                                </td>
                                                <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Read "Following makes Medium better"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Unfollow 5 enemies from twitter</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
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

        	

    	});
	</script>

</html>
