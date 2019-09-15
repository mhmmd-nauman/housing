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
                    <button type="button" id="<?= $row['id'];?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Transfer</button>
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

<!-- The Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="student_form">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Add Data</h4>
                </div>
                <div class="modal-body">
                   
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Enter Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                     <input type="hidden" name="student_id" id="student_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
  

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
        $('#myModal').modal('show');
        $.ajax({
            url:"./buyer_request_process.php",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                console.log(data);
                // $('#first_name').val(data.first_name);
                // $('#last_name').val(data.last_name);
                // $('#student_id').val(id);
                // $('#studentModal').modal('show');
                // $('#action').val('Edit');
                // $('.modal-title').text('Edit Data');
                // $('#button_action').val('update');
            }
        })
      
    });
  
});
</script>

  