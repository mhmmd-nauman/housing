<?php 

include "vendor_header.php";
require_once "../db.php";
   
$d=$_SESSION['uid'];

if(isset($_REQUEST['action'])){
    switch($_REQUEST['action']){
        case"block":
           $sql = " update `login` set status = 'blocked' where login_id = '".$_REQUEST['id']."';";
           $conn->query($sql);
           break;
        case"approve":
           $sql = " update `login` set status = 'Active' where login_id = '".$_REQUEST['id']."';";
           $conn->query($sql);
           break;
        case"delete":
            $sql = " delete from `login` where login_id = '".$_REQUEST['id']."';"
                . " ";
            $conn->query($sql);
            $sql = "delete from `users_details` where login_id = '".$_REQUEST['id']."';";
            $conn->query($sql);
           break;
    }
}      
        
   
?>
<!-- Header -->
<div class="w3-container" style="margin-top:20px" id="showcase">
    <h1 class="w3-jumbo"><b>Plot Transfer History</b></h1>
    
  </div>
<div class="container mt-3">
  <table class="table table-bordered" id="Table">
    <thead>
      <tr>
        <th>No#</th>
        <th>Owner</th>
        <th>Plot No</th>
        <th>Transfer By</th>
        
       
        <th>Date</th>
      </tr>
    </thead>
    <tbody id="myTable">
      
    <?php
// $sql = "SELECT login.name as officer_name, plot_request.plot_no,plot_request.status,plot_request.user_cnic,plot_request.user_name,plot_request.update_date as date,property_detail.unit_qty,property_detail.property_unit,property_detail.price,property_detail.property_location
// FROM ((plot_request
// INNER JOIN login ON login.login_id = plot_request.process_transfer_id)
// INNER JOIN property_detail ) WHERE plot_request.status='success'";

$sql = "SELECT * from plot_history "
        . " LEFT JOIN users_details ON plot_history.owner = users_details.login_id "
        . " LEFT JOIN login ON users_details.login_id = login.login_id "
        . " WHERE 1 ";
$result = $conn->query($sql);
$count = 1;
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()):
    // output data of each row
     
?>
   
      <tr>
        <td><?=$count++?></td>
        <td><?=$row['name']?><br><?=$row['cnic']?></td>
        <td><?=$row['plot_no']?></td>
        <td><?=$row['user_name']?></td>
        
        
        <td><?=$row['date']?></td>

      </tr>
  <?php endwhile;}else{
    echo "<tr>
    <td colspan=4>Sorry No Transfer History Found:</td>
    </tr>";
  }

  ?>
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