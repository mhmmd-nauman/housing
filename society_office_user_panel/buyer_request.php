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
      <th>CNIC#</th>
      <th>Buyer Name</th>
      <th>Location</th>
      <th>Price</th>
      <th>Action</th>
     
        </tr>
    </thead>
    <tbody id="myTable">
      
    <?php
$sql = 

" SELECT property_detail.property_unit,property_detail.property_location,property_detail.unit_qty,plot_request.id,plot_request.login_id,
property_detail.price,plot_request.user_name,plot_request.plot_no,plot_request.user_cnic,plot_request.status ,plot_request.transfer_to,property_detail.status as property_status
FROM property_detail
INNER JOIN plot_request ON plot_request.plot_no = property_detail.plot_no

";
$result = $conn->query($sql);
if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    // output data of each row
    
?>
   
      <tr>
    <td><?=$row['plot_no']?></td>
    <td><?=$row['unit_qty']?> <?=$row['property_unit']?></td>
  <td><?=$row['user_cnic']?></td>
  <td><?=$row['user_name']?></td>
    <td><?=$row['property_location']?></td>
         
         <td><?=$row['price']?></td>
         <td>
          <?php
          if($row['property_status']=='active' && $row['status']=='pending'){
            ?>
<div class="btn-group-vertical">
                    <button type="button" id="<?= $row['id'];?>" plot_no="<?=$row['plot_no']?>" user_id="<?=$row['login_id']?>" user_cnic="<?=$row['user_cnic']?>" login_id="<?=$login_id?>" class="btn btn-primary transfer" >Transfer</button>

                
            </div>

            <?php
          }
          elseif($row['property_status']=='deactive' && $row['status']=='success')
                    {
                        echo '<button type="button" id="" class="btn w3-red w3-opacity delete">Alot to others</button>';
                    }
          else
                {
                    ?>
        <button type="button" id="<?= $row['id'];?>" plot_no="<?=$row['plot_no']?>" user_id="<?=$row['login_id']?>" user_cnic="<?=$row['user_cnic']?>" login_id="<?=$login_id?>" class="btn w3-green transfer" ><i class="fa w3-text-orange fa-print"></i> Print reciept</button>
                    <?php
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

            $(document).on('click', '.delete', function(){
        var id = $(this).attr("id");
        $('#myModal').modal('show');
        $.ajax({
            url:"./buyer_request_process.php",
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



             $(document).on('click', '.transfer', function(){
        var plot_no = $(this).attr("plot_no");
        var plot_id = $(this).attr("id");
        var login_id = $(this).attr("login_id");
        var user_id = $(this).attr("user_id");
         var user_cnic = $(this).attr("user_cnic");
        swal({
  title: "You Sure transfer PlotNo# "+plot_no+" to CNIC:"+ user_cnic,
  text: "Are you sure transfer this plot?",
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
                url: "./buyer_request_process.php",
                type: "POST",
                data: {plot_no:plot_no,login_id:login_id,user_id:user_id,plot_id:plot_id},
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

  