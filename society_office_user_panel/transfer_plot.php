<?php

include "vendor_header.php";
require_once "../db.php";
$d=$_SESSION['uid'];


?>

<div class="w3-container" style="margin-top:20px" id="showcase">
    <h1 class="w3-jumbo"><b>Plot Transfer</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Detail</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <div class="w3-row-padding">
  <button class="btn btn-primary w3-green" data-toggle="modal" data-target="#myModal">
  <span class="fa fa-plus-circle"></span>
Transfer Plot  
</button>
 
</div>
  </div>

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
        <form action="transfer_plot_process.php" method="POST"  accept-charset="utf-8" class="was-validated">
          <div class="row">
            <div class="col-sm-5">
            <div class="w3-panel bg-info  w3-card-4">
          Transfer From
        </div>
        <br>
            <div class="form-group">
                  <label >Old CNIC</label>
                  <div class="form-group">
                      <input type="number" name="old_cnic" required class="form-control">
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Enter Old Cnic</div>
                </div>
                </div>

                <div class="form-group">
                  
                  <div class="form-group">
                  <label for="property_title">Plot No#</label>
                  <div class="form-group">
                      
                      <select class="form-control" id="plot_no" name="plot_no">
                     
              <?php
               $sql = "SELECT * FROM plot_request where status='success' OR status ='process'";
               $result = $conn->query($sql);
              while($row = $result->fetch_assoc()){
             
              ?>
              
              <option  value="<?=$row['plot_no'];?>"><?=$row['plot_no']?> </option>
                       
              <?php }?>
                      </select>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Your Plot No#.</div>
                </div>
                </div>
                </div>
            </div>
            <div class="col-sm-5">
            <div class="w3-panel w3-green bg-info  w3-card-4">
          Transfer To
        </div>
        <br>
            <div class="form-group">
                  <label >New CNIC</label>
                  <div class="form-group">
                      <input type="number" name="new_cnic" required class="form-control">
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Enter New Cnic</div>
                </div>
                <input type="hidden" name="soffocer_id" value="<?= $d['login_id']?>">
                </div>
            </div>
          </div>
          <button type="submit" name="submit" class="w3-button w3-block w3-center w3-green"> <div class="spinner-grow text-danger"></div> <b> Transfer</b></button>
        </form>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>