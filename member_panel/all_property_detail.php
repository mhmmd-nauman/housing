<?php
include "user_header.php";
require_once "../db.php";

 $d=$_SESSION['uid'];
 $login_id =  $d['login_id'];
 $user_name =  $d['name'];
if(isset($_REQUEST['action'])){
    switch($_REQUEST['action']){
        case"block":
           $sql = " update `login` set status = 'blocked' where login_id = '".$_REQUEST['id']."';";
           $conn->query($sql);
           break;
      
        case"delete":
            
            $sql = "delete from `property_detail` where plot_no = '".$_REQUEST['plot_no']."';";
            $conn->query($sql);
           break;
    }
}      
        
   
?>
<!-- Header -->
<div class="w3-container" style="margin-top:20px" id="showcase">
    <h1 class="w3-jumbo"><b>My Plots</b></h1>
  </div>
<div class="container mt-3" style="border-top:1px solid; border-style:inset; padding-top: 50px;">
  
  <table class="w3-table-all w3-hoverable" id="Table">
    <thead>
      <tr>
    
      <th>PlotNo#</th>
        <th>Unit</th>
        <th>Desc</th>
        
        
        <th>Owner</th>
        
        
        <th>Price</th>
        <th>Booking Request</th>
        
      </tr>
    </thead>
    <tbody id="myTable">
      
    <?php

$sql = "SELECT * from property_detail "
        . " LEFT JOIN users_details ON property_detail.owner = users_details.login_id "
        . " LEFT JOIN login ON users_details.login_id = login.login_id"
        
        . " where 1";
$result = $conn->query($sql);
if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    // output data of each row
     
?>
   
      <tr>
       
      <td><?=$row['plot_no']?></td>
        <td><?=$row['unit_qty']?> <?=$row['property_unit']?></td>
        <td><?=$row['property_desc']?></td>
       
         <td><?=$row['name']?><br><?=$row['cnic']?></td>
         
         <td>PKR <?=$row['price']?></td>
        
        <td>
        <a type="button" id="request" name="<?=$user_name?>" plot_no="<?=$row['plot_no']?>" login_id="<?=$login_id?>" class="btn request w3-red btn-default">Send Booking Request</a>
        </td>
        

      </tr>
  <?php endwhile;endif;?>
    </tbody>
  </table>
  
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

<script>
    function confirmAction(){
        if(confirm("Are you sure to complete the action?")){
            return true;
        }else{
            return false;
        }
    }
$(document).ready(function(){
    var orderdataTable = $('#Table').DataTable({
				"columnDefs":[],
			});

      $(document).on('click', '.request', function(){
        var plot_no = $(this).attr("plot_no");
        var login_id = $(this).attr("login_id");
        var user_name = $(this).attr("name");
        swal({
  title: "PlotNo# "+plot_no,
  text: "Are you sure send this plot buying request?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Send Request",
  cancelButtonText: "No, cancel please!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    $.ajax({
                url: "../plot_req.php",
                type: "POST",
                data: {plot_no:plot_no,login_id:login_id,user_name:user_name},
                dataType: "html",
                success: function (data) {
                    swal("Done!",data,"success");
                }
            });
        // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your request not proceed:)", "error");
  }
});
      
      });
      
});
</script>
  