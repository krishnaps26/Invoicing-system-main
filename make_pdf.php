<?php
require('connection.php');
include_once('TCPDF-main/tcpdf.php');
$cid=$_GET['cid'];
$sql="SELECT T1.cid, T1.inv_no, T1.name, T1.contact, T1.address, T1.mail FROM customer T1 WHERE T1.cid='".$cid."' ";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
if($count>0){
    $data_row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $pdf= new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('helvetica', '', 12);  
	$pdf->AddPage();
    $tbl='
    <style type="text/css">
	body{
	font-size:12px;
	line-height:24px;
	font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	color:#000;
	}
	</style>  
    <table cellpadding="0" cellspacing="0" style="border:1px solid #ddc;width:100%;">
	<table style="width:100%;" >
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center"><b>SHINERWEB TECHNOLOGIES</b></td></tr>
	<tr><td colspan="2" align="center"><b>CONTACT: +91 97979  97979</b></td></tr>
	<tr><td colspan="2" align="center"><b>WEBSITE: WWW.SHINERWEB.COM</b></td></tr>  
    <tr><td colspan="2"><b>CUST.NAME: '.$data_row['name'].' </b></td></tr>
    <tr><td><b>MOB.NO: '.$data_row['contact'].' </b></td><td align="right"><b>BILL DT.: '.date("d-m-Y").'</b> </td></tr>
    <tr><td colspan="2" align="center"><b>INVOICE</b></td></tr>
    <tr class="heading" style="background:#eee;border-bottom:1px solid #ddd;font-weight:bold;">
		<td>
			Product purchased
		</td>
		<td align="right">
			Amount
		</td>
	</tr>';
    EOD;
        $total=0;
		$squery = "SELECT T2.pname, T2.price FROM product T2 WHERE T2.cid='".$cid."' ";
		$sres = mysqli_query($conn,$squery);    
        //if($sres) echo "helli";
        $pdf->writeHTML($tbl,true,false,false,false,'');
        $pdf->Output('example.pdf','I');
?>