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
<div class="w3-container" style="margin-top:20px" id="showcase">
    <h1 class="w3-jumbo"><b>All Plot Detail</b></h1>
    
  </div>
<div class="container mt-3" style="border-top:1px solid; border-style:inset; padding-top: 50px;">
  <table class="w3-table-all w3-hoverable" id="Table">
    <thead>
      <tr>
      <th>PlotNo#</th>
      <th>Owner</th>
        <th>Unit</th>
        <th>Desc</th>
        
        <th>Location</th>
        <th>Price</th>
        <th>Action</th>
        
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
       <td><?=$row['name']?><br><?=$row['cnic']?></td>
      
        <td><?=$row['unit_qty']?> <?=$row['property_unit']?></td>
        <td><?=$row['property_desc']?></td>
        
   
        <td><?=$row['property_location']?></td>
         <td><?=$row['price']?></td>
        
        <td>
        
            <div class = "dropdown">
   
   <button type = "button" class = "btn dropdown-toggle" id = "dropdownMenu1" data-toggle = "dropdown">
      Action
      <span class = "caret"></span>
   </button>

   <ul class = "dropdown-menu" role = "menu" aria-labelledby = "dropdownMenu1">
      <li role = "presentation">
         <a role = "menuitem" class="btn btn-warning" data-toggle="modal"  data-target="#myModal<?=$row['plot_no']?>" tabindex = "-1" >Transfer Plot</a>
      </li>
      <li role = "presentation" class = "divider"></li>
     
      
      
      <li role = "presentation" class = "divider"></li>
      <li role = "presentation">
         <a role = "menuitem" class="btn btn-danger" tabindex = "-1" href = "?action=delete&plot_no=<?=$row['plot_no']?>&id=<?=$row['id']?>" onclick="return confirmAction();">
            Delete
         </a>
      </li> 
   </ul>

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
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php 
$sql = "SELECT * from property_detail where `login_id` = '$login_id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()):?>
 <!-- The Modal -->
 <div class="modal fade" id="myModal<?=$row['plot_no']?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Transfer Plot</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="col">

              <form action="transfer_plot_process.php?b_url=sofficer_property_detail.php" method="POST">
              <div class="row">
              
              <div class="col-sm-5">
              <div class="w3-panel w3-blue w3-card-4"> Transfer Plot no#</div>
              <input  value="<?=$row['plot_no']?>" type="text" name="plot_no" autocomplete="off" class="w3-input w3-animate-input w3-text-red"  id="plotno"  placeholder="Your Plot No#" style="width:70%">
              </div>
              <div class="col-sm-2">
              <br>
              <br>
              <a class=" w3-circle fa-2x w3-orange"><span class="fa fa-exchange"></span></a>
              </div>
              <div class="col-sm-5">
              <div class="w3-panel w3-green w3-card-4"> Transfer to</div>
             
                <select class="form-control" id="reciver_id" name="reciver_id">
                <?php                    
    
    $sql = "SELECT * FROM `login` "
            . " LEFT JOIN users_details ON users_details.login_id = login.login_id "
            . " where `status` ='Active' and type = 'member'";
    $result_m = $conn->query($sql);
    while($row_m = $result_m->fetch_assoc())
    {
        ?><option value="<?php echo $row_m['login_id']; ?>">  <?php echo $row_m['name'];?> / <?php echo $row_m['cnic'];?></option> 
    <?php }?>
                </select>
              </div>
              </div>

              
              <br>
              <button type="submit" name="submit" id="submit" class="w3-btn w3-orange">Transfer plot</button>
              </form>
              </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
 <?php endwhile;?>
    <script>

</script>

  