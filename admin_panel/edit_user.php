<?php
include "admin_header.php";
require_once "../db.php";
$msg = "";
$id = $_REQUEST['id'];
if(isset($_POST['submit'])){
   
   $sql = " UPDATE `login` SET `name` = '".$_POST['name']."', "
           . " `email` = '".$_POST['email']."', 
               `type` = '".$_POST['role']."' WHERE 
               `login`.`login_id` = '$id' ;
             ";
            $conn->query($sql);    
        $sql = " UPDATE `users_details` "
                . " SET `cnic` = '".$_POST['cnic']."', "
                //. " `address` = 'Trust Colony Bahawalpur1', "
                . " `mobile_number` = '".$_POST['mobile_number']."' "
                . " WHERE `login_id` = '$id' ;
             ";
            $conn->query($sql);   
            
              $msg = '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Data Updated Successfully</strong>
            </div>';   
            
}

 $sql = "SELECT *, login.login_id as id FROM `login` "
      . " LEFT JOIN users_details ON users_details.login_id = login.login_id"
      . " where "
      . " type in ('admin')"
      . " and login.login_id = '$id' "
      . ";";
      $result = $conn->query($sql);
     
      $row = $result->fetch_assoc();

?>

<div class="container">
<?=$msg;?>
<div class="row">
<div class="col-sm-12">
<div class="w3-container">
 
  <div class="w3-card-4">
    <div class="w3-container w3-green">
      <h2>Edit User</h2>
    </div>

      <form class="w3-container" action="?action=edit&id=<?php echo $id;?>" method="POST">
      <p class="col-sm-6">
      <label>Full Name</label>
      <input type="text" required class="w3-input" name="name" value="<?php echo $row['name'];?>">
      </p>
      <p class="col-sm-6">     
      <label>Email</label>
      <input type="email" required class="w3-input" name="email" value="<?php echo $row['email'];?>">
      </p>

      <p class="col-sm-6">     
      <label>CNIC</label>
      <input type="TEXT" required class="w3-input" name="cnic" value="<?php echo $row['cnic'];?>">
      </p>
      <p class="col-sm-6">     
      <label>Contact</label>
      <input type="TEXT" required class="w3-input" name="mobile_number" value="<?php echo $row['mobile_number'];?>">
      </p>
      <div class="form-group col-sm-6">
  <label for="sel1">Role:</label>
  <select class="form-control" name="role" required >
      <option value="society_officer" <?php if($row['type'] == "society_officer")echo"selected";?>>Society Officer</option>
    <option value="admin"  <?php if($row['type'] == "admin")echo"selected";?>>Admin</option>
    <option value="member" <?php if($row['type'] == "member")echo"selected";?>>Member</option>
    
  </select>
</div>
<p>
<input class="w3-btn btn-block w3-black col-sm-6" name="submit" type="submit" value="Update">
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
