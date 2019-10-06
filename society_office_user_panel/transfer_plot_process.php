<?php
require_once "../db.php";
$date = date("Y-m-d");
$old_cnic = $_POST['old_cnic'];
 $new_cnic = $_POST['new_cnic'];
$plot_no = $_POST['plot_no'];
 $sofficer_id = $_POST['soffocer_id'];

 $query_db="SELECT *
 FROM users_details
 INNER JOIN login ON login.login_id = users_details.login_id WHERE users_details.cnic = '$old_cnic'";
 $query1=$conn->query($query_db);
 $numrow=$query1->num_rows;


 if($numrow > 0)
 {
    $query_db2="SELECT *
    FROM users_details
    INNER JOIN login ON login.login_id = users_details.login_id WHERE users_details.cnic = '$new_cnic'";
    $query=$conn->query($query_db2);
    $numrow=$query->num_rows;



    if($numrow > 0){

        
        $que=$conn->query($query_db2);
        while($row = $que->fetch_assoc()){
        $login_id = $row['login_id'];
        $user_name = $row['name'];

       echo $first_upd = "UPDATE plot_request SET `transfer_to`='0',
        `status`='process' WHERE `plot_no`='$plot_no' AND `login_id`='$login_id'";
        echo "<br>";

       echo $second_upd = "INSERT INTO `plot_request` (`plot_no`, `login_id`, `user_name`, `user_cnic`,`status`,`transfer_to`,`process_transfer_id`,`update_date`) 
        VALUES ('$plot_no', '$login_id', '$user_name', '$new_cnic','success','$login_id','$sofficer_id','$date');";


        $check = "SELECT *
        FROM plot_request WHERE `plot_no`='$plot_no' AND `login_id`='$login_id' ";
            
            if($conn->query($check)->num_rows > 0){
                if($conn->query($first_upd)){
                    
                        if($conn->query($second_upd)){
                            echo "
                <script>
                alert('Property Transfer Success');
                window.location.href = 'transfer_plot.php';
                </script>
                ";
                        }
                       }


            }else{
                echo "
                <script>
                alert('Wrong Detail! Plot no or CNIC not match');
                window.location.href = 'transfer_plot.php';
                </script>
                ";
            }

       

        }

         $login_id;
         $user_name;


    }
    else{
        echo "
     <script>
     alert('Reciver CNIC not Register');
     window.location.href = 'transfer_plot.php';
     </script>
     ";
    }

 }
 else{
     echo "
     <script>
     alert('Sender CNIC not Register currently');
     window.location.href = 'transfer_plot.php';
     </script>
     ";
 }
    

 
//  $query  = "UPDATE plot_request SET `status`='process' ,`transfer_to`='0' where `user_cnic`='$old_cnic' AND 'plot_no'=$plot_no";

//     if($conn->query($query)===TRUE){
//         $sql = "INSERT "
//     }



?>