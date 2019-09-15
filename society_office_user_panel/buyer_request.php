<?php
include "vendor_header.php";
require_once "../db.php";

$d=$_SESSION['uid'];
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
<div class="w3-container" style="margin-top:10px" id="showcase">
    <h1 class="w3-jumbo"><b>Buyer Requests</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Detail</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
<div class="container mt-3" style="border-top:1px solid; border-style:inset; padding-top: 50px;">
  <table class="w3-table-all w3-hoverable" id="Table">
    <thead>
      <tr>
      <th>PlotNo#</th>
      <th>Unit</th>
      <th>Location</th>
      <th>Price</th>
      <th>Action</th>
     
        </tr>
    </thead>
    <tbody id="myTable">
      
    <?php
$sql = 

" SELECT property_detail.property_unit,property_detail.property_location,property_detail.unit_qty,plot_request.id,
property_detail.price,plot_request.user_name,plot_request.plot_no,plot_request.user_cnic,plot_request.status ,plot_request.transfer_to
FROM property_detail
INNER JOIN plot_request ON plot_request.plot_no = property_detail.plot_no
AND plot_request.status='pending' 
AND property_detail.status='active'

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
            <div class="btn-group-vertical">
                    <button type="button" id="<?= $row['id'];?>" class="btn btn-primary transfer">Transfer</button>
                    <button type="button" id="<?= $row['id'];?>" class="btn w3-red w3-opacity delete">Delete</button>
                
            </div>
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

            $(document).on('click', '.transfer', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:"{{route('ajaxdata.fetchdata')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#student_id').val(id);
                $('#studentModal').modal('show');
                $('#action').val('Edit');
                $('.modal-title').text('Edit Data');
                $('#button_action').val('update');
            }
        })
      
    });
  
});
</script>

  