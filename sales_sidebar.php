<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>District Cooperative Marketing Society</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    DCMS, VJA - SALES <?php echo $result['OfficeName'];?>
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="sales.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
				<li>
                    <a href="sales_pur.php">
                        <i class="fa fa-plus"></i>
                        <p>Purchase</p>
                    </a>
                </li>
				<li>
                    <a href="sales_sale.php">
                        <i class="fa fa-minus"></i>
                        <p>Sales</p>
                    </a>
                </li>
				<li>
                    <a href="sales_exp.php">
                        <i class="fa fa-reply"></i>
                        <p>Expenditure</p>
                    </a>
                </li>
				<li>
                    <a href="sales_inc.php">
                        <i class="fa fa-share"></i>
                        <p>Income</p>
                    </a>
                </li>
				<li>
                    <a href="sales_bank.php">
                        <i class="fa fa-bank"></i>
                        <p>Bank Transactions</p>
                    </a>
                </li>
				<li>
                    <a href="sales_reports.php">
                        <i class="fa fa-bar-chart"></i>
                        <p>Reports</p>
                    </a>
                </li>	
            </ul>
    	</div>
    </div>
    <div class="main-panel">
			<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Sale Point</a>
                </div>
                <div class="collapse navbar-collapse"> 					
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p><?php echo $result['Fname']." ".$result['Lname']." ".$result['Sname']; ?></p>
                            </a>
                        </li>                       
                        <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Profile
										<b class="caret"></b>
									</p>
                            </a>
							<ul class = "dropdown-menu">
								<li><a href="">Change Password</a></li>
								<li><a href="logout.php">Log out</a></li>
							</ul>	
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>