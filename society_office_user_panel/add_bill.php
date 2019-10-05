<?php
include "vendor_header.php";
require_once "../db.php";
$d=$_SESSION['uid'];

 $login_id = $d['login_id'];
 if(isset($_REQUEST['action'])){
  switch($_REQUEST['action']){
      case"update":
         $sql = " update `bill` set payment_status = 'success' where id = '".$_REQUEST['id']."' AND plot_no = '".$_REQUEST['plot_no']."';";
         $conn->query($sql);
         break;
    
      case"delete":
          
          $sql = "update `bill` set status = 'blocked' where login_id = '".$_REQUEST['id']."';";
          $conn->query($sql);
         break;
  }
}  
 

?>


<!-- 

Start  Modal of add Bill 

-->




<div class="w3-container" style="margin-top:20px" id="showcase">
    <h1 class="w3-jumbo"><b>Plot Bills</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Detail</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <div class="w3-row-padding">
  <button class="btn btn-primary w3-green" data-toggle="modal" data-target="#myModal">
  <span class="fa fa-plus-circle"></span>
  Add Bill
  </button>
 
</div>
  </div>

  <!-- The Modal -->
<div class="modal w3-animate-zoom" id="myModal">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h1 class="modal-title">Add Bill </h1>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="w3-panel bg-info  w3-card-4">
          Plot Type and Location
        </div>
        <br>
        <br>
        <form action="bill_submit.php" method="POST"  accept-charset="utf-8" class="was-validated">
          <div class="col">
            <input type="hidden" name="society_officer_id" value="<?= $login_id;?>">
          
            <!-- Second Row -->
            <!-- Property Detail -->
            <?php
            $sql = "SELECT * FROM plot_request where status='success' OR status ='process'";
            $result = $conn->query($sql);
            $count = 1;
         
            ?>
            <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                  <label for="property_title">Plot No#</label>
                  <div class="form-group">
                      
                      <select class="form-control" id="plot_no" name="plot_no">
                     
              <?php
              while($row = $result->fetch_assoc()){
              ?>
              <option value="<?=$row['plot_no']?>"><?=$row['plot_no']?> </option>
                       
              <?php }?>
                      </select>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Your Plot No#.</div>
                </div>
                </div>
                <!-- propert Description -->
                <div class="form-group">
                  <label for="property_desc">Desc</label>
                  <textarea class="form-control" rows="3" cols="25" name="desc" required id="desc"></textarea>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Plot Description</div>
                </div>
  
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Bill Type</label>
                  <select name="bill_type" class="form-control" id="bill_type">
                  <option value="sui gas">Wapda</option>
                  <option value="ptcl">Ptcl</option>
                  <option value="water">water</option>
                  <option value="severage">Severage</option>
                  

                  </select>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Your Area. XYZ road, near xyz.</div>
                </div>

               
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="property_title">Total All Inclusinve (taxes):</label>
                  <input type="number" class="form-control" id="total" placeholder="Total Bill" name="total" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Price in (pkr).</div>
                </div>
                
                <div class="form-group">
                  <label for="property_title">BIll Ref no#</label>
                  <input type="text" class="form-control" id="ref_no" placeholder="Ref no#" name="ref_no" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Ref no#</div>
                </div>
              </div>
              
            </div>
        
            <br>
           </div>
          <button type="submit" name="submit" class="w3-button w3-block w3-center w3-green"> <div class="spinner-grow text-danger"></div> <b> Add Bill</b></button>
        </form>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>



<!-- 

end  Modal of add Bill 

-->

 
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
INNER JOIN bill ON login.login_id=  bill.society_officer_id ORDER BY bill.id DESC

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