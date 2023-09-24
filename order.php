
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style type="text/css" media="screen">
            th{
                 border: 1px solid black;
                 border-collapse: collapse;
                 padding-right: 20px;
                 padding-left: 20px;
              }
            table{
                border-left: 1px solid black;
                border-right: 1px solid black;
                border-bottom: 1px solid black;
                border-collapse: collapse;
                margin-top: 100px;
            }
            td{
                border-right: 1px solid black;
                border-collapse: collapse;
                text-align:center;
            }
        </style>
    </head>
    <body>

        
        <script src="" async defer></script>
    </body>
</html>
<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "sheh";
     $connik = mysqli_connect($servername, $username, $password,$dbname);
          if(isset($_GET['oid'])){
            $oid=$_GET['oid'];
            if($oid){
                $sqlquery="DELETE FROM orders WHERE `orders`.`oid` = '$oid'";
                $delete=mysqli_query($connik,$sqlquery);
                if($delete){
                    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none; opacity: 0.8;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </symbol>
        </svg>
            <div class="alert alert-danger d-flex align-items-center" role="alert" style="opacity:0.6;">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              "Item has been removed." 
            </div>
          </div></scrip>';
                }
            }
          } 
    ?>

<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sheh";
        $conni = mysqli_connect($servername, $username, $password,$dbname);

       $cid=$_GET['cid'];




        $sqlget="SELECT * FROM pricing";
       // JOIN pricing ON pid.product=pid.pricing";
        $sqldata=mysqli_query($conni,$sqlget) or die('error getting data');
       // $cid=$_POST['cid'];
        echo '<center><table style="margin-top: 75px;">';
        echo "<tr style='border: 1px solid black;
        border-collapse: collapse;'><th>Product_id</th><th>Product Name</th><th>Price</th></tr>";
        while($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
        // $cid=$_GET['cid'];
         echo "<tr><td>";
         echo $row['pid'];
         echo "</td><td>";
         echo $row['pname'];
         echo "</td><td>";
         echo $row['price'];
         echo "</td><td>";
         echo '<a href="order.php?pid='.$row['pid'].'&cid='.$cid.'&oid=0" class="btn btn-primary" style="background-color: #5d2a42;  border: 0; margin-left: 5px;  padding-right: 30px; padding-left: 30px;  margin-right: 5px; " id="myAnchor">Add</a>
         </td></tr>';
         $pid=$row['pid'];
         //href='index.php?id=".$row['id']."cid=".$row['cid']."'
        }
       echo "</table></center>";
       $pid=$_GET['pid'];
       if($pid){
        $sql="INSERT INTO orders VALUES ('','$cid','$pid')";
       $sqldata=mysqli_query($conni,$sql) or die('NOT SENT!');
       }
    
       echo '     <center>
       <form action="invoice.php?cid='.$cid.'" method="GET">
             <label for="break">Preferred pagebreak rows:</label>
             <input type="number" id="break" name="break" value="10" min="0" max="20">
              <button type="submit" name="cid" class="btn btn-primary" value='.$cid.' style="background-color: #5d2a42; border: 0; margin-bottom: 20px; margin-top: 10px; margin-left: 5px;  padding-right: 30px; padding-left: 30px;  margin-right: 5px;">
              Print Invoice</button>
            </center>
        </form>
          ';
// <a href="invoice.php?cid='.$cid.'" class="btn btn-primary" style="background-color: #5d2a42;  border: 0; margin-left: 5px;  padding-right: 30px; padding-left: 30px;  margin-right: 5px; " id="myAnchor">
//Print Invoice</a>
    ?>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sheh";
        $conni = mysqli_connect($servername, $username, $password,$dbname);
        $cid=$_GET['cid'];
        $sqlget="SELECT orders.oid , orders.cid, pricing.pname, pricing.price, orders.pid, COUNT(orders.pid)
        FROM orders JOIN pricing ON orders.pid=pricing.pid
        WHERE cid=$cid
        GROUP BY pid
        ORDER BY orders.oid
        ";
        $sqldata=mysqli_query($conni,$sqlget) or die('error getting data');
        echo '<center><table style="margin-top: 15px; margin-bottom: 55px;">';
        echo "<tr style='border: 1px solid black;
        border-collapse: collapse;'><th>order_id</th><th>product_id</th><th>Pname</th><th>Price</th><th>Amt</th></tr>";
        while($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
         echo "<tr><td>";
         echo $row['oid'];
         echo "</td><td>";
         echo $row['pid'];
         echo "</td><td>";
         echo $row['pname'];
         echo "</td><td>";
         echo $row['price'];
         echo "</td><td>";
         echo $row['COUNT(orders.pid)'];
         echo "</td><td>";
         echo "<a href='order.php?pid=0&cid=".$cid."&oid=".$row['oid']."' class='btn' onclick='return myFunction()' style='background-color: #5d2a42; color:white;  padding: 5px 20px;  
         border-radius: 3px;'>Remove</a>
         </td></tr>
         ";
         echo ' <script>
            function myFunction(){
                return confirm("Are you surely wanting to remove the item?");
            }
            </script>
            ';
        }
       echo "</table></center>";
    ?>
    