<?php 

include "user_header.php";
require_once "../db.php";
   
$d=$_SESSION['uid'];

        
        
   
?>

<!-- Header -->
<div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Cart</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Items</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
<!-- First Photo Grid-->

<div class="w3-row-padding">
<?php
$sql = "SELECT * FROM `cart` where `user_id`= '".$d['id']."' order by `id` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    // output data of each row
     
?>
    <div class="w3-mobile w3-half	 w3-container w3-margin-bottom">
      <img src="http://localhost/front-site/assets/prd_images/<?=$row['prd_image'];?>" alt="Norway" style="width:100%" class="w3-hover-opacity ">
      <div class="w3-container w3-white">
      <h3><b><?= $row['prd_name']?></b></h3>
        <div class="w3-container w3-border">
        <h6 class="w3-opacity w3-red">Price <i class="fa fa-dollar" aria-hidden="true"></i>  <?=$row['prd_price']?></h6>
        <h6 class="w3-opacity w3-teal">Quantity <?=$row['prd_qty']?></h6>
        <h6 class=" w3-black w3-text-red">Total:  <?=$row['total']?> Rs</h6>
       </div>
       
        <p class=""><i class="fa w3-text-orange fa-location-arrow" aria-hidden="true"></i> <?=$row['address']?></p>
        <p class="w3-wide w3-opacity"><i class="fa fa-phone w3-text-green" aria-hidden="true"> seller:</i> <?=$row['vendor_contact']?></p>
        <p class="w3-wide w3-opacity"><i class="fa fa-phone w3-text-red" aria-hidden="true"> Own:</i> <?=$row['user_contact']?></p>
        
        
        <span><i class="fa fa-book" aria-hidden="true"> <h5>  Description:</h5></i></span>
        <p><?=$row['prd_desc']?></p>
        <h5><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Order Date:  <?=($row['date'])?></h5>
      </div>
    </div>
   
    <?php endwhile; endif?>
  </div>
