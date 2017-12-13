<!DOCTYPE html>
<?php
   include("config.php");
   session_start();
   $error = " ";   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {     
      
      $myusername = $_POST['user'];
      $mypassword = $_POST['pass']; 
      
      $sql = "SELECT * FROM users WHERE user = '$myusername' and pwd = '$mypassword'";
      $result = mysql_query($sql);     	  
      $count = mysql_num_rows($result);      
      
      if($count == 1) {  
	     $row = mysql_fetch_assoc($result);		 	
         $_SESSION['login_user'] = $myusername;
		 $_SESSION['role']= $row['Desig']; 
         $_SESSION['start'] = time();
         $_SESSION['expire'] = $_SESSION['start'] + (30*60);
         if($row['Status']==1){ 
            if($row['Desig'] == 1) {
                header("location: bm.php");	     
            }
            else if($row['Desig'] == 2 || $row['Desig'] == 3) {
                header("location: acc.php");	     
            }
            else if($row['Desig'] == 4) {
                header("location: sales.php");	                 
            }
			else {
				$error = "Not Authorised to Login";
			}
         }
         else {
             $error = "Employee Terminated/Suspended/Hold from Services";
         } 
       }
      else {
          $error = "Your Login Name or Password is invalid";
      } 
       
   }
?>
<html >
<head>
  <meta charset="UTF-8">
  <title>DCMS, VJA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>

      <link rel="stylesheet" href="assets/css/style.css">

  
</head>

<body>
  <div class="cont">
  <div class="demo">
    <div class="login">
      <p class="app__hello">District Cooperative Marketing Society, Vijayawada</p>
	  <form class="form-horizontal" method="post">
      <div class="login__form">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" name="user" placeholder="Username" autocomplete="off">
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input pass" name="pass" placeholder="Password" >		 
        </div>
        <button type="submit" class="login__submit">Sign in</button>
		<p class="login__signup"><?php echo $error; ?></p>
      </div>
	  </form>
    </div>    
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="assets/js/index.js"></script>

</body>
</html>
