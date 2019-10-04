<?php
include "header/header.php";?>

<div class="container" >
  
  <div class="card">
    <div class="card-header"></div>
    <div class="card-body">
      <form name="form1" action="process_register.php" role="form"  method="post" class="was-validated" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-6" style="">
            
            <div class="form-group">
              <label for="fullname">Full Name:</label>
              <input type="text" class="form-control" id="fullname" placeholder="Enter username" name="fullname" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="example@someone.com" name="email" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            
            
          </div>
          <div class="col-sm-6" style="">
            
            
            <div class="form-group">
              <label for="cnic">CNIC:</label>
              <input type="number" class="form-control" maxlength="15" minlength="13" id="cnic" placeholder="CNIC#" name="cnic" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="type">Select Role:</label>
              <select class="form-control" name="type" id="type" required>
               
                <option value="member">Member</option>
                <option value="society_officer">Society Officer</option> 
              </select>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6" style="">
            
            <div class="form-group">
              <label for="contact">Contact:</label>
              <input type="text" class="form-control" max="13" min="11" id="contact" placeholder="Cell#" name="contact" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="********" name="password" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            
            
          </div>
          <div class="col-sm-6" style="">
            
            
            
            <div class="form-group">
              <label for="address">Address:</label>
              <textarea class="form-control" rows="3" cols="25" name="address" required id="address"></textarea>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            
          </div>
        </div>
        <div class="row">
          
          <div class="col-sm-6">
          <div class="form-group">
              <label for="city">City:</label>
              <input type="text" class="form-control" id="city" placeholder="city" name="city" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
          </div>
          <div class="col-sm-6">

          </div>
          
        </div>
        <div class="form-group w3-center w3-padding-16">
        <button class="w3-button w3-center w3-bar w3-black" name="submit" type="submit">Register</button>
           <a  href="<?=$base_url?>login.php" class="w3-button w3-center w3-bar w3-theme-d2" name="submit" type="submit">Login</a>
        </div>
        
      </form>
      
    </div>
    
  </div>
</div>
<!--
</div>
</body>
</html> -->
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
