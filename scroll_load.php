<?php
require_once 'db.php';
require_once "base_url.php";
if(isset($_POST["limit"], $_POST["start"]))
{

 $query = "SELECT * FROM property_detail INNER JOIN login ON login.login_id = property_detail.login_id ORDER BY property_detail.id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($conn, $query);
 while($row = mysqli_fetch_array($result))
 {
  echo '
 
 <!-- Blog entry -->
 <div class="w3-third w3-container w3-margin-bottom">
 <img src="'.$base_url.'/assets/img/img.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
 <div class="w3-container w3-white">
   <p><b class="w3-wide">'.$row['property_title'].'</b></p>
   <p class="w3-wide w3-opacity"><b class="w3-text-orange">Desc: </b> '.$row['property_desc'].'</p>
   <p>'.$row['unit_qty'].' '.$row['property_unit'].'</p>
   <p>
    <address><b>Location: </b>  '.$row['property_location'].'</address>
   </p>
   <p>PKR '.$row['price'].'</p>
 </div>
</div> 

  
  ';
 }
}
?>