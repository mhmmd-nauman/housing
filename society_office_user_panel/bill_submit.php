<?php
session_start();
require_once "../db.php";
    $society_officer_id =  $_POST['society_officer_id'];
   $plot_no =  $_POST['plot_no'];
    $desc =  $_POST['desc'];
    $bill_type =  $_POST['bill_type'];
    $total = $_POST['total'];
    $ref_no = $_POST['ref_no'];

    list($plot_no ,$user_id) = explode(",", $plot_no);



    

   $sql = "
                
            INSERT INTO `bill` (`society_officer_id`, `plot_no`, `bill_type`, `total_amount`, `ref_no`, `descrip`,`user_id`) 
            VALUES ('$society_officer_id', '$plot_no', '$bill_type', '$total', '$ref_no','$desc',$user_id);";




            if ($conn->query($sql) === TRUE){

                $last_id = $conn->insert_id;
                 $sql2 = "
                
                INSERT INTO `bill_track` (`bill_id`, `ref_no`, `total`,`user_id`) 
                VALUES ('$last_id', '$ref_no', '$total',$user_id);";
                if($conn->query($sql2) === TRUE){
                    ?>
                        <script>
                        alert('Bill Added Successfully');
                        window.open('add_bill.php');
                        </script>
                    <?php
                }

            }


?>