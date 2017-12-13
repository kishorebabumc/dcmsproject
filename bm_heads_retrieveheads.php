<?php 
include("bm_session.php");
if(isset($_POST["mainid"])&& !empty($_POST["mainid"])){
	$mainid = $_POST["mainid"];
	$sql = mysql_query("select * from acc_majorhead where MainID='$$mainid' and Status = 1");
	$count = mysql_num_rows($sql);
	if($count > 0){
		echo '<option value=""> Select Major Head </option>';
		while ($row = mysql_fetch_assoc($sql)){
			echo "<option value ='".$row['MajorID']."'>".$row["MajorHead"]."</option>";
		}
	}else {
		echo '<option value="">Major Head not available </option>';
	}	
}
?>