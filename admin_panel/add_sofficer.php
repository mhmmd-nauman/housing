<?php
include "admin_header.php";
require_once "../db.php";
$msg = "";
if(isset($_POST['submit'])){
   
   $sql = "
                
            INSERT INTO `login` (`name`, `password`, `email`, `type`, `status`) 
            VALUES ('".$_POST['name']."','".$_POST['password']."','".$_POST['email']."','".$_POST['role']."','Active');

                ";
                
            if ($conn->query($sql) === TRUE)
            {
              $msg = '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Data INserted Successfully</strong>
            </div>';   
            }
};

?>

<div class="container">
<?=$msg;?>
<div class="row">
<div class="col-sm-6">
<div class="w3-container">
 
  <div class="w3-card-4">
    <div class="w3-container w3-green">
      <h2>Input Form</h2>
    </div>

    <form class="w3-container" action="add_sofficer.php" method="POST">
      <p>
      <label>Full Name</label>
      <input type="text" required class="w3-input" name="name">
</p>
      <p>     
      <label>Email</label>
      <input type="email" required class="w3-input" name="email">
      </p>

      <p>     
      <label>Password</label>
      <input type="password" required class="w3-input" name="password">
      </p>

      <div class="form-group">
  <label for="sel1">Role:</label>
  <select class="form-control" name="role" required >
    <option value="society_officer">Society Officer</option>
    <option value="admin">Admin</option>
    <option value="member">Member</option>
    
  </select>
</div>
<p>
<input class="w3-btn btn-block w3-black" name="submit" type="submit" value="+ Add">
</p>
    </form>
  </div>
</div>
</div>
<div class="col-sm-6">

</div>
</div>

</div>

<?php

?>
