<?php
include "vendor_header.php";
require_once "../db.php";
$d=$_SESSION['uid'];

 $login_id = $d['login_id'];


?>
<!-- Header -->
<div class="w3-container" style="margin-top:80px" id="showcase">
  <h1 class="w3-jumbo"><b>Society Officer Panel</b></h1> 
  
  <hr style="width:50px;border:5px solid red" class="w3-round">
</div>
<!-- First Photo Grid-->
<div class="w3-row-padding">
  <button class="btn btn-primary w3-green" data-toggle="modal" data-target="#myModal">
  <span class="fa fa-plus-circle"></span>
  Add New Plot
  </button>
 
</div>
<!-- The Modal -->
<div class="modal w3-animate-zoom" id="myModal">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h1 class="modal-title">Add Plot </h1>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="w3-panel bg-info  w3-card-4">
          Plot Type and Location
        </div>
        <br>
        <br>
        <form action="../property_submit.php" method="POST" enctype="multipart/form-data" accept-charset="utf-8" class="was-validated">
          <div class="col">
            <input type="hidden" name="login_id" value="<?= $login_id;?>">
          
            <!-- Second Row -->
            <!-- Property Detail -->
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