<?php
require_once "../db.php";
  $login_id =  $_POST['login_id'];
  $user_id =  $_POST['user_id'];
 $plot_no =  $_POST['plot_no'];
  $plot_id =  $_POST['plot_id'];
$date = date("Y-m-d");
$sql = "UPDATE plot_request SET `transfer_to`='$user_id', `process_transfer_id`='$login_id',
`status`='success',`update_date`='$date' WHERE `plot_no`='$plot_no' AND `login_id`='$user_id'";

 if ($conn->query($sql) === TRUE){

 	$sql1 = "UPDATE property_detail SET `status`='deactive' where `plot_no`='$plot_no'";
 	if ($conn->query($sql1) === TRUE){
 		echo "Property Transfer Successfully";
 	}
 }
 else
 {
 	echo "**Some Internal Errror";
 }
?>