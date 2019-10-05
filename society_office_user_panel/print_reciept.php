<?php 
require_once("../db.php");
$id =$_GET['id'];
$cnic =$_GET['cnic'];
$plot_no =$_GET['plot_no'];
$gname = $_GET['login_user'];
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */



// Include the main TCPDF library (search for installation path).
require_once('../assets/TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// // set document information
// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Nicola Asuni');
// $pdf->SetTitle('Plot Reciept');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// // set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 12);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content

$sql = "SELECT plot_request.user_cnic,plot_request.plot_no,plot_request.user_name,
plot_request.update_date,property_detail.property_unit,property_detail.unit_qty,
property_detail.property_location,property_detail.price,property_detail.buyer_name 
FROM property_detail INNER JOIN plot_request ON plot_request.plot_no = property_detail.plot_no 
WHERE plot_request.plot_no='$plot_no' && plot_request.status='success' && 
plot_request.user_cnic='$cnic' && plot_request.id = '$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()):
$html = '
<div style="font-family:Courier;">
<div style="text-align:center"><br />
<img src="../assets/img/logo.png" alt="test alt attribute" width="70" height="70" border="0" />

<h1 style="font-size:30px;">Housing System</h1>
<h3>Plot Reciept#</h3>
<div align="left" style="font-size:10px">
<p>Generated By: '.$gname.'</p>
<p>Society Officer</p>
<p>Genereate Date: '.$date = date('Y-m-d H:i:s').'</p>
</div>
</div>
<div style ="padding-top:250px;">
<table style="width:50%;" cellspacing="20">
<tr>
    <th>Owner Name</th>
    <td>'.$row['user_name'].'</td> 
   
    
  </tr>  
<tr>
    <th>Plot No#</th>
    <td>'.$row['plot_no'].'</td> 
   
    
  </tr>
  <tr>
    <th>CNIC#</th>
    <td>'.$row['user_cnic'].'</td> 
    
  </tr>
  
  <tr>
    <th>Transfer Date</th>
    <td>'.$row['update_date'].'</td> 
    
  </tr>

  <tr>
  <th>Area: </th>
  <td>'.$row['unit_qty'].' '.$row['property_unit'].'</td>
  </tr>
  <tr>
  <th>Location: </th>
  <td>'.$row['property_location'].'</td>
  </tr>

  <tr>
  <th>Price: </th>
    <td>'.$row['price'].' PKR </td>
    
  </tr>


</table>
</div>
</div>

';
endwhile;
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();


//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+?>