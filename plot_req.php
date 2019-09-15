<?php
require_once "./db.php";
$login_id =  $_POST['login_id'];
$plot_no = $_POST['plot_no'];
$user_name = $_POST['user_name'];

//QUERY TO GET CNIC FROM Users_DETAIL
        $sql = "SELECT `cnic` FROM users_details WHERE `login_id`='$login_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

      $sql1 = "
                
            INSERT INTO `plot_request` (`plot_no`, `login_id`, `user_name`, `user_cnic`) 
            VALUES ('$plot_no', '$login_id', '$user_name', '".$row['cnic']."');

            ";

            if ($conn->query($sql1) === TRUE){

                echo "Plot Request Submitted";

            }else{
                echo "**SOME INTERNAL ERROR**";
            }
?>