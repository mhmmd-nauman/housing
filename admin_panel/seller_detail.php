<?php 

include "admin_header.php";
require_once "../db.php";
   
$d=$_SESSION['uid'];

        
        
   
?>
<!-- Header -->
<div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Seller</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Detail</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
<div class="container mt-3">
  <h2>Custom Search</h2>
  <p>Type something in the input field</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered" id="Table">
    <thead>
      <tr>
        <th>Seller id</th>
        <th>Name</th>
        <th>Cont#</th>
        <th>City</th>
        <th>Prd.Name</th>
        <th>qlty/Brand</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody id="myTable">
      
    <?php
$sql = "SELECT * FROM `boutique_post`  order by `id` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    // output data of each row
     
?>
   
      <tr>
        <td><?=$row['vendor_id']?></td>
        <td><?=$row['vendor_name']?></td>
        <td><?=$row['vendor_contact']?></td>
        <td><?=$row['vendor_city']?></td>
        <td><?=$row['prd_name']?></td>
        <td><?=$row['prd_quality']?></td>
        <td><?=$row['prd_qty']?></td>
        <td><?=$row['prd_price']?></td>
        <td><?=$row['prd_qty']*$row['prd_price']?></td>
        <td><?=$row['date']?></td>

      </tr>
  <?php endwhile;endif;?>
    </tbody>
  </table>
  
  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

<script>
$(document).ready(function(){
    var orderdataTable = $('#Table').DataTable({
				"columnDefs":[],
			});
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>