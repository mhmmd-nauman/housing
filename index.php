<?php

require_once "db.php";
include "header/header.php";

if(isset($_SESSION['uid'])){
    $d=$_SESSION['uid'];
 
  }
    else{
      echo "<marquee><span class='w3-red w3-wide'>Notice! You are Not Login. You are Visitor </span></marquee>";
    }
?>
<br><br>
<!-- Project Section -->
<div class="w3-container w3-padding-32" id="projects">
  <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Casuals</h3>
</div>
<!-- Product grid -->
<div class="w3-row">
<?php
$sql = "SELECT * FROM `boutique_post` order by `id` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    // output data of each row
     
?>
  <div class="w3-col l3 s6">
    <div class="w3-container">
      <div class="w3-display-container">
      <input type="hidden" class="prd_img" name="prd_img" id="prd_img" value="<?=$row['prd_image']?>">
        <img src="http://localhost/front-site/assets/prd_images/<?=$row['prd_image']?>" style="width:100%">
        <span class="w3-tag w3-display-topleft"></span>
        <div class="w3-display-middle w3-display-hover">
          <button class="w3-button w3-black btn_cart" img="<?=$row['prd_image']?>"  id="<?=$row['id']?>">Buy now <i class="fa fa-shopping-cart"></i></button>
        </div>
      </div>
      <p><?=$row['prd_name']?><br><b>pkr <?=$row['prd_price']?></b></p>
      <h6 class="w3-opacity">Quality <i class="w3-text-red fa-2x fa fa-pied-piper-alt" aria-hidden="true"></i>  <?=$row['prd_quality']?></h6>
      <p class="w3-wide"><i class="fa w3-text-blue fa fa-reddit-alien" aria-hidden="true"></i> <?=$row['vendor_name']?></p>
      <p class="w3-wide"><i class="fa w3-text-orange fa-location-arrow" aria-hidden="true"></i> <?=$row['vendor_city']?></p>
        <p class="w3-wide w3-opacity"><i class="fa fa-phone w3-text-green" aria-hidden="true"></i> <?=$row['vendor_contact']?></p>
    </div>
    
    
  </div>
  <?php endwhile; endif?>
 
</div>

<!-- The Modal -->
<div  class="modal fade " id="Modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">Modal Heading</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div id="result">

          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<script>
 $(document).ready(function(){
  $('.btn_cart').click(function(){
    var id = $(this).attr('id');
    var prd_img = $(this).attr('img');
   
    $.ajax({
                url: "http://localhost/front-site/cart.php",
                method: "POST",
                data: {id:id,prd_img:prd_img},
                success: function(data)
                {
                
                $('#result').html(data);
                // Display the Bootstrap modal
                $('#Modal').modal('show');
                }
        });
  });
   
 });
</script>



<?php
include "header/footer.php";