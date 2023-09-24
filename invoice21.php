<?php
            error_reporting(E_ALL ^ E_NOTICE);
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sheh";
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            require("TCPDF-main/tcpdf.php");


            $cid=$_GET['cid'];
            //echo $cid;
            $sqlc="SELECT *
            FROM orders
            JOIN customer ON orders.cid=customer.cid
            JOIN pricing ON orders.pid=pricing.pid
            WHERE orders.cid=$cid";

            $resc=mysqli_query($conn,$sqlc);
            $count = mysqli_num_rows($resc);
            
            if($resc){
                $i=1;
                while($rowc=mysqli_fetch_assoc($resc)){
                    if(isset($rowc['name'])) $name=$rowc['name'];
                    if(isset($rowc['contact'])) $contact=$rowc['contact'];
                    if(isset($rowc['inv_no'])) $inv_no=$rowc['inv_no'];
                    if(isset($rowc['address'])) $address=$rowc['address'];
                    if(isset($rowc['mail'])) $mail=$rowc['mail'];



                    $pdf= new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
                    $pdf->setPrintHeader(false);
                    $pdf->setPrintFooter(false);
                    $pdf->AddPage();
                   // $pdf->SetAutoPageBreak(TRUE, 50);
                    $pdf->ln(5);
                    $pdf->SetFont('helvetica', 'B', 36);
                    $pdf->Cell(0,25,'Epsilon Healthcare',0,1,'C',0,'',false,'M','M');
                    $pdf->SetFont('helvetica', 'B', 14);
                    $pdf->Cell(0,15,'Civil lines, Delhi',0,1,'C',0,'',false,'M','M');
                    $pdf->SetFont('helvetica', '', 11);
                    $pdf->Cell(70,15,'Email: epsilonhealthcare@gmail.com',0,0,'',0,'',false,'M','M');
                    $pdf->Cell(45,15,'Telephone: 1234-5678',0,0,'',0,'',false,'M','M');
                    $pdf->Cell(50,15,'Website: https://www.epsilonhealthcare.com/',0,1,'',0,'',false,'M','M');
                    $pdf->line(10,40,200,40);
                    $pdf->line(10,41,200,41);
                    $pdf->SetFont('times','BI',12);
                   // $pdf->ln(15);
                    $pdf->ln(3);




            $tbl=<<<EOD
            <table>
            <tr>
            <td colspan="2">Invoice id: INV_$inv_no</td>
            <td colspan="1">Date: 
            EOD
            .date("d-m-Y").
            
            $tbl=<<<EOD
              </td>
            </tr>
            <tr>
            <td colspan="2">Costumer Name: $name</td>
            <td colspan="1">Contact: $contact</td>
            </tr>
            <tr>
            <td colspan="2">Address: $address</td>
            <td colspan="1">Email: $mail</td>
            </tr>
            </table>
            <table border="0px" border-collapse="collapse" cellpadding="2" cellspacing="2" margin-top="5%">
            <tr>
              <th colspan="16" align="center"> INVOICE </th>
            </tr>
            <tr style="background-color: #FFF9C9">
              <th colspan="1" style="text-align: center;">Sr.no.</th>
              <th colspan="4" style="text-align: center;">Product Name</th>             
              <th colspan="2" style="text-align: center;">Price</th>
              <th colspan="1" style="text-align: center;">Units</th>
              <th colspan="2" style="text-align: center;">Amt.</th>
              <th colspan="1" style="text-align: center;">cgst%</th>
              <th colspan="1" style="text-align: center;">utst%</th>
              <th colspan="1" style="text-align: center;">sgst%</th>
              <th colspan="1" style="text-align: center;">igst%</th>
              <th colspan="2" style="text-align: center;">Net Amt.</th>
            </tr>
            EOD;

            $sql="SELECT orders.oid , orders.cid, pricing.pname, pricing.price, orders.pid, COUNT(orders.pid),pricing.cgst,pricing.sgst ,pricing.utgst,pricing.igst
            FROM orders JOIN pricing ON orders.pid=pricing.pid
            WHERE cid=$cid
            GROUP BY pid
            ";
            if($res=mysqli_query($conn,$sql)){
                $i=1;
                while($row=mysqli_fetch_assoc($res)){
                    if(isset($row['price'])) $price=$row['price'];
                    if(isset($row['pname'])) $pname=$row['pname'];
                    if(isset($row['cgst'])) $cgst=$row['cgst'];
                    if(isset($row['sgst'])) $sgst=$row['sgst'];
                    if(isset($row['utgst'])) $utgst=$row['utgst'];
                    if(isset($row['igst'])) $igst=$row['igst'];
                    if(isset($row['COUNT(orders.pid)'])) $units=$row['COUNT(orders.pid)'];
                $amt=(float)$price*$units;
                $amtt=$amtt+$amt;
                $net=number_format((float)$amt, 2, '.', ''); 
                $foo=(float)$amt + (float)$amt*(((float)$cgst+(float)$sgst+(float)$igst+(float)$utgst)/100);
                $net=number_format((float)$foo, 2, '.', '');    
                $total=$total + $net;
                $tbl .=<<<EOD
            <tr>
            <th colspan="1" style="background-color: #FFFAD7; text-align: center;">$i</th>
              <th colspan="4"style="background-color: #F5F5F5;">$pname</th>             
              <th colspan="2" style="background-color: #FFFAD7; text-align: center;">Rs. $price</th>
              <th colspan="1" style="background-color: #F5F5F5; text-align: center;">$units</th>
              <th colspan="2" style="background-color: #FFFAD7; text-align: center;">Rs.$amt</th>
              <th colspan="1" style="background-color: #F5F5F5; text-align: center;">$cgst%</th>
              <th colspan="1" style="background-color: #FFFAD7; text-align: center;">$utgst%</th>
              <th colspan="1" style="background-color: #F5F5F5; text-align: center;">$sgst%</th>
              <th colspan="1" style="background-color: #FFFAD7; text-align: center;">$igst%</th>
              <th colspan="2" style="background-color: #F5F5F5; text-align: center;">Rs. $net</th>


            </tr>
            EOD;
            $i++;
          /*  if($i%10==0){
              $dis=$amtt*(0.1);
              // $diss=number_format((float)$dis, 2, '.', ''); 
               $nett=$total-$dis;
               $diss=number_format((float)$nett, 2, '.', ''); 
               $tbl .=<<<EOD
               <tr>
               <td colspan="13" style="text-align:right;">Total: </td>
               <td colspan="1" style="text-align:right;"></td>
               <td  colspan="2" style="text-align:center; background-color: #F5F5F5">Rs. $total</td>
               </tr>
               <tr>
               <td colspan="13" style="text-align:right;">Amount discountable: </td>
               <td colspan="1" style="text-align:right;"></td>
               <td  colspan="2" style="text-align:center; background-color: #F5F5F5 ">Rs. $amtt</td>
               </tr>
               <tr>
               <td colspan="13" style="text-align:right;">10% discount: </td>
               <td colspan="1" style="text-align:right;"></td>
               <td  colspan="2" style="text-align:center; background-color: #F5F5F5 ">-Rs. $dis</td>
               </tr>
               <tr>
               <td colspan="13" style="text-align:right;">Net amount payable: </td>
               <td colspan="1" style="text-align:right;"></td>
               <td  colspan="2" style="text-align:center; background-color: #FFFAD7;">Rs. $diss</td>
               </tr>
               </table>
               EOD;
            }
            */
            }
        }
            $dis=$amtt*(0.1);
           // $diss=number_format((float)$dis, 2, '.', ''); 
            $nett=$total-$dis;
            $diss=number_format((float)$nett, 2, '.', ''); 
            $tbl .=<<<EOD
            <tr>
            <td colspan="13" style="text-align:right;">Total: </td>
            <td colspan="1" style="text-align:right;"></td>
            <td  colspan="2" style="text-align:center; background-color: #F5F5F5">Rs. $total</td>
            </tr>
            <tr>
            <td colspan="13" style="text-align:right;">Amount discountable: </td>
            <td colspan="1" style="text-align:right;"></td>
            <td  colspan="2" style="text-align:center; background-color: #F5F5F5 ">Rs. $amtt</td>
            </tr>
            <tr>
            <td colspan="13" style="text-align:right;">10% discount: </td>
            <td colspan="1" style="text-align:right;"></td>
            <td  colspan="2" style="text-align:center; background-color: #F5F5F5 ">-Rs. $dis</td>
            </tr>
            <tr>
            <td colspan="13" style="text-align:right;">Net amount payable: </td>
            <td colspan="1" style="text-align:right;"></td>
            <td  colspan="2" style="text-align:center; background-color: #FFFAD7;">Rs. $diss</td>
            </tr>
            </table>
            EOD;




            $pdf->ln(3);
            
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
   $number = $diss;
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  $finalwords= $result . "rupees  " . $points . " paise only";


  $tbl .=<<<EOD
  <tr>
  <td colspan="13" style="text-align:left;">Amount payable:Rs. $diss/-</td>
  </tr><tr>
  <td colspan="13" style="text-align:left;">In words: $finalwords</td>
  </tr>
  <tr>
  <td colspan="13" style="text-align:left;">Payment Mode: Cash/Online</td>
  </tr>
  </table>
  EOD;





 // $pdf->line(3);
 // $pdf->Cell(0,15,'Civil lines, Delhi',0,1,'C',0,'',false,'M','M');
 

            $pdf->writeHTML($tbl,true,false,false,false,'');

            $pdf->Cell(0,15,'Thanks for joining us!',0,1,'C',0,'',false,'M','M');
            $pdf->Output('example.pdf','I');
          }
        }


      
else  echo "Sorry no record found.";

?>