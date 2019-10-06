<?php
require_once "../db.php";

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
    $query_db2="SELECT * FROM users_details WHERE `cnic`='$new_cnic'";
    $query=$conn->query($query_db2);
    $numrow=$query->num_rows;



    if($numrow > 0){

        
        $query1=$conn->query($query_db);
        while($row = $query1->fetch_assoc()){
        $login_id = $row['login_id'];
        $user_name = $row['name'];

        $first_upd = "UPDATE plot_request SET `transfer_to`='0',
        `status`='process' WHERE `plot_no`='$plot_no' AND `login_id`='$login_id'";

        $check = "SELECT *
        FROM plot_request WHERE `plot_no`='$plot_no' AND `login_id`='$login_id' ";

            if($query->num_rows > 0){
                echo "true";
            }else{
                
            }

        //    if($conn->query($first_upd)){
        //        echo "true";
        //    }else{

        //     echo "fl;ase";


        //    }

        }

         $login_id;
         $user_name;


    }
    else{
        echo "
     <script>
     alert('Reciver CNIC not Register');
     </script>
     ";
    }

 }
 else{
     echo "
     <script>
     alert('Sender CNIC not Register currently');
     </script>
     ";
 }
    

 
//  $query  = "UPDATE plot_request SET `status`='process' ,`transfer_to`='0' where `user_cnic`='$old_cnic' AND 'plot_no'=$plot_no";

//     if($conn->query($query)===TRUE){
//         $sql = "INSERT "
//     }



?>