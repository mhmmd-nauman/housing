<?php
require_once "../db.php";
include "user_header.php";
$d=$_SESSION['uid'];
$login_id = $d['login_id']

?>
<div class="w3-container" style="margin-top:20px" id="showcase">
    <h1 class="w3-jumbo"><b>Utility Bills</b></h1>
    
    
  </div>

<div class="container mt-3" style="border-top:1px solid; border-style:inset; padding-top: 50px;">
  <table class="w3-table-all w3-hoverable" id="Table" data-order='[[ 0, "desc" ]]' data-page-length='25'>
    <thead>
      <tr>
      <th style="display: none;">ID</th>
      <th>PlotNo#</th>
      <th>Ref NO#</th>
      <th>Bill Type</th>
      <th>Payment Status</th>
      <th>Amount</th>
      <th>Gen BY</th>
      <th>Action</th>
     
        </tr>
    </thead>
    <tbody id="myTable">
      
    <?php
$sql = 

" SELECT *
FROM login
INNER JOIN bill ON login.login_id=  bill.society_officer_id where  bill.user_id = '$login_id' ORDER BY bill.id DESC 

";
$result = $conn->query($sql);
if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    // output data of each row
    
?>
   
      <tr>
      <td style="display: none;"><?=$row['id']?></td>
    <td><?=$row['plot_no']?></td>
    <td><?=$row['ref_no']?></td>
  <td><?=$row['bill_type']?></td>
  <td><?=$row['payment_status']?></td>
    <td><?=$row['total_amount']?></td>
         
         <td><?=$row['name']?></td>
         <td>
         <?php
          if($row['payment_status']=='pending'){
            ?>
  <a role = "menuitem" class="btn btn-success" tabindex = "-1" href = "?action=update&plot_no=<?=$row['plot_no']?>&id=<?=$row['id']?>" onclick="return confirmAction();">
            Paid Bill
         </a>
            <?php
          }else{
            echo '
              <button disabled class="fa fa-check w3-btn w3-green ">Paid</button>
            ';
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