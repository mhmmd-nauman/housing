<?php

require_once "../db.php";
include "user_header.php";
$d=$_SESSION['uid'];

$status= $d['status'];
if($status=="Active"){
 
  







$login_id =  $d['login_id'];
if(isset($_REQUEST['action'])){
    switch($_REQUEST['action']){
        case"block":
           $sql = " update `login` set status = 'blocked' where login_id = '".$_REQUEST['id']."';";
           $conn->query($sql);
           break;
      
        case"delete":
            
            $sql = "delete from `property_detail` where plot_no = '".$_REQUEST['plot_no']."' AND id = '".$_REQUEST['id']."';";
            $conn->query($sql);
           break;
    }
}      
        
   
?>
<!-- Header -->
<div class="w3-container" style="margin-top:20px" id="showcase">
    <h1 class="w3-jumbo"><b>Plot Booking Requests</b></h1>
    
  </div>
<div class="container mt-3" style="border-top:1px solid; border-style:inset; padding-top: 50px;">
  <table class="w3-table-all w3-hoverable" id="Table">
    <thead>
      <tr>
      <th>PlotNo#</th>
      <th>Unit</th>
      <th>Description</th>
      <th>Price</th>
      <th>Status</th>
     
        </tr>
    </thead>
    <tbody id="myTable">
      
    <?php
$sql = 

" SELECT property_detail.property_unit,property_detail.property_location,property_detail.unit_qty,
property_detail.price,plot_request.user_name,plot_request.plot_no,plot_request.user_cnic,plot_request.status ,plot_request.transfer_to
FROM property_detail
INNER JOIN plot_request ON plot_request.plot_no = property_detail.plot_no 
WHERE plot_request.login_id = '$login_id' and plot_request.status!='process'


";
$result = $conn->query($sql);
if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    // output data of each row
    
?>
   
      <tr>
    <td><?=$row['plot_no']?></td>
    <td><?=$row['unit_qty']?> <?=$row['property_unit']?></td>
  
    <td><?=$row['property_location']?></td>
         
         <td><?=$row['price']?></td>
         <td>
         <?php 
         if($row['transfer_to']==''){
           echo "<b class='w3-orange'>Under Review</b>";
         }elseif($row['transfer_to']==$login_id  AND $row['status']=='success'){
          echo "<b class='w3-green'>Congrats! Meet Society Officer</b>";
         }
         else{
          echo "<b class='w3-red'>sorry now this plot own by other.</b>";
         }
         
         ?>
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
  
});
</script>

  <?php
  
}else{
  echo '<div class="container w3-padding-64">
            <div class=" w3-panel w3-orange w3-opacity w3-card-4">
            <h4 class="w3-wide"> * once your <strong>account has been approved</strong> you can book you plot.</h4>
          </div>
      </div>';
}
  
  ?>