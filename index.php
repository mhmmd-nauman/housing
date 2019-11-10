<?php
require_once "db.php";
include "header/header.php";
require_once "base_url.php";

if(isset($_SESSION['uid'])){
    $d=$_SESSION['uid'];

  }
    
?>
<!-- //Image Sliding -->
<div id="img_slider" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#img_slider" data-slide-to="0" class="active"></li>
    <li data-target="#img_slider" data-slide-to="1"></li>
    <li data-target="#img_slider" data-slide-to="2"></li>
    <li data-target="#img_slider" data-slide-to="3"></li>
    <li data-target="#img_slider" data-slide-to="4"></li>
    <li data-target="#img_slider" data-slide-to="5"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?=$base_url?>assets/img/banner10.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        
        <h2></h2>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?=$base_url?>assets/img/banner2.jpg" alt="slideshow" width="1100" height="500">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?=$base_url?>assets/img/banner3.jpg" alt="Your Own home" width="1100" height="500">
      <div class="carousel-caption">
        <h1>your Future</h1>
        <p>We love the Big Apple!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?=$base_url?>assets/img/banner6.jpg" alt="Your Own home" width="1100" height="500">
      <div class="carousel-caption">
        <h1>your Future</h1>
        <p>We love the Big Apple!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?=$base_url?>assets/img/banner7.jpg" alt="Your Own home" width="1100" height="500">
      <div class="carousel-caption">
        <h1>your Future</h1>
        <p>We love the Big Apple!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?=$base_url?>assets/img/banner1.jpg" alt="Your Own home" width="1100" height="500">
      <div class="carousel-caption">
        <h1>your Future</h1>
        <p>We love the Big Apple!</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#img_slider" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#img_slider" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
  
    
    <!-- Middle Column -->
    <div class="w3-col m10">
       <!-- Project Section -->
  
    <div class="w3-row-padding">
      
      
      
      <div id="load_data"></div>
      <div id="load_data_message"></div>
      
      <!-- End Middle Column -->
      </div>
    </div>
    
    <!-- Right Column -->
   
    
    <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>
<br>
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

 $(document).ready(function(){
 
 var limit = 7;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {

    $.ajax({
       url:"scroll_load.php",
       method:"POST",
       data:{limit:limit, start:start},
       cache:false,

       success:function(data)
       {
          $('#load_data').append(data);
          if(data == '')
          {
             $('#load_data_message').html("");
             action = 'active';
          }
          else
          {
             $('#load_data_message').html("<button class='w3-btn  w3-wide  w3-blue w3-block'>Load More Post.........</button>");
             action = "inactive";
          }
       }
    });
 }

 if(action == 'inactive')
 {

  action = 'active';
  load_country_data(limit, start);

 }
 
$(window).scroll(function(){

  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {

   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 3000);
   
  }
 });
 
});
</script>



<?php
include "header/footer.php"; ?>