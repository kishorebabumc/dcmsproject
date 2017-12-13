<?php
    include("config.php");
    session_start();
    $user_check = $_SESSION['login_user'];
    $role= $_SESSION['role'];
    $sql = "select * from users where user='$user_check' and Desig ='$role'";
    $result = mysql_query($sql);
    $count = mysql_num_rows($result);
    if($count == 1){
        $now = time();
        if ($now > $_SESSION['expire']){
            session_destroy();
            header("location:sessionexpire.php");
            exit();
        }
    }
    else {
        header("location:sessionexpire.php");
    }
?>