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
<div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Plot Transfer History</b></h1>
    
  </div>
<div class="container mt-3">
  
  <table class="table table-bordered" id="Table">
    <thead>
      <tr>
        <th> Id</th>
        <th>Sender CNIC</th>
        <th>Reciver CNIC</th>
        <th>Plot No</th>
       
        
      </tr>
    </thead>
    <tbody id="myTable">
      
    <?php
$sql = "SELECT * FROM `transfer_history` INNER JOIN users_details ON users_details.login_id = transfer_history.reciver_id"
        . ";";
$result = $conn->query($sql);
if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    // output data of each row
     
?>
   
      <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['sender_id']?></td>
        <td><?=$row['reciver_id']?></td>
        <td><?=$row['plot_no']?></td>
        
       
        

      </tr>
  <?php endwhile;endif;?>
    </tbody>
  </table>
  
  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
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
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>