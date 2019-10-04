<?php
include "vendor_header.php";
require_once "../db.php";
$d=$_SESSION['uid'];

 $login_id = $d['login_id'];

 

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
            $sql = "SELECT * FROM plot_request where status='success' and status = 'process'";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0): 
            ?>
            <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                  <label for="property_title">Plot Title:</label>
                  <input type="text" class="form-control" id="property_title" placeholder="Plot Title" name="property_title" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Your Plot Title.</div>
                </div>
                <!-- propert Description -->
                <div class="form-group">
                  <label for="property_desc">Plot Description:</label>
                  <textarea class="form-control" rows="3" cols="25" name="property_desc" required id="property_desc"></textarea>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Plot Description</div>
                </div>
                
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="location">Location:</label>
                  <input type="text" class="form-control" id="location" placeholder="1A, Avenue 3rd, xyz Road" name="property_location" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Your Area. XYZ road, near xyz.</div>
                </div>

                <div class="form-group">
                <label for="property_desc">Land Area :</label>
                <div class="input-group mt-3 mb-3">
                  <div class="input-group-prepend">
                    <div class="form-group">
                      
                      <select class="form-control" name="unit" required id="unit">
                        <option></option>
                        <option value="marla">Marla</option>
                        <option value="acer">Acer</option>
                        <option value="kanal">Kanal</option>
                      </select>
                    </div>
                  </div>
                  <input type="number" class="form-control" placeholder="2 marla ,2 kanal" name="unit_qty" id="unit_qty" required>
                </div>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="property_title">All Inclusinve price (pkr):</label>
                  <input type="number" class="form-control" id="price" placeholder="Price (pkr)" name="price" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Price in (pkr).</div>
                </div>

                <div class="form-group">
                  <label for="property_title">Plot no#</label>
                  <input type="text" class="form-control" id="plot_no" placeholder="plot no#" name="plot_no" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Plot no#</div>
                </div>
              </div>
              
            </div>
            <?php endif; ?>
            <br>
           </div>
          <button type="submit" name="submit" class="w3-button w3-block w3-center w3-green"> <div class="spinner-grow text-danger"></div> <b> Add Plot</b></button>
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
      <th>User Name</th>
      <th>Bill Type</th>
      <th>Payment Status</th>
      <th>Amount</th>
      <th>Status</th>
      <th>Action</th>
     
        </tr>
    </thead>
    <tbody id="myTable">
      
    <?php
$sql = 

" SELECT property_detail.property_unit,property_detail.property_location,property_detail.unit_qty,
plot_request.id,plot_request.login_id, property_detail.price,plot_request.user_name,plot_request.plot_no,plot_request.process_transfer_id,
plot_request.user_cnic,plot_request.status ,plot_request.transfer_to,plot_request.id,property_detail.status as property_status
FROM property_detail
INNER JOIN plot_request ON plot_request.plot_no = property_detail.plot_no ORDER BY plot_request.id DESC

";
$result = $conn->query($sql);
if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    // output data of each row
    
?>
   
      <tr>
      <td style="display: none;"><?=$row['id']?></td>
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
                      echo ' <a type="button" target="_blank" href="print_reciept.php?id='.$row['id'].'&cnic='.$row['user_cnic'].'&plot_no='.$row['plot_no'].'&login_user='.$d['name'].'" class="btn w3-green" ><i class="fa w3-text-orange fa-print"></i> Print</a>';  
                    }
          else
                {
       
        echo '<button type="button"  class="btn w3-red w3-opacity delete">Alot to others</button>';
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