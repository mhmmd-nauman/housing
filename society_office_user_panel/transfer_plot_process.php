<?php
session_start();
require_once "../db.php";
$date = date("Y-m-d");

$reciver_id = $_POST['reciver_id'];
$plot_no = $_POST['plot_no'];
$b_url = $_GET['b_url'];
 $query_db="SELECT *
 FROM users_details
 INNER JOIN login ON login.login_id = users_details.login_id WHERE login.login_id = '$reciver_id'";
 $query1=$conn->query($query_db);
 $numrow=$query1->num_rows;


 if($numrow > 0)
 {
    
        
        $d=$_SESSION['uid'];
        $login_id =  $d['login_id'];
        $user_name =  $d['name'];
       echo $first_upd = "UPDATE property_detail SET `owner`='$reciver_id' "
               . " WHERE `plot_no`='$plot_no' ";
        echo "<br>";

       echo $second_upd = "INSERT INTO `plot_history` 
           (`plot_no`,`owner`, `login_id`, `user_name`, `user_cnic`,`status`,`transfer_to`,`process_transfer_id`,`update_date`) 
            VALUES 
            ('$plot_no','$reciver_id', '$login_id', '$user_name', '','success','','','$date');";


       echo $check = "SELECT *
        FROM property_detail WHERE `plot_no`='$plot_no'; ";
            
            if($conn->query($check)->num_rows > 0){
                if($conn->query($first_upd)){
                    
                        if($conn->query($second_upd)){
                            echo "
                <script>
                alert('Property Transfer Success');
                window.location.href = '$b_url';
                </script>
                ";
                        }
                       }


            }else{
                echo "
                <script>
                alert('Wrong Detail! Plot no or CNIC not match');
                window.location.href = '$b_url';
                </script>
                ";
            }

       

        

         $login_id;
         $user_name;


   // }
    

 }
 else{
     echo "
     <script>
     alert('Sender CNIC not Register currently');
    // window.location.href = '$b_url';
     </script>
     ";
 }
    

 
//  $query  = "UPDATE plot_request SET `status`='process' ,`transfer_to`='0' where `user_cnic`='$old_cnic' AND 'plot_no'=$plot_no";

//     if($conn->query($query)===TRUE){
//         $sql = "INSERT "
//     }



?>