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
            }
            td{
                border-right: 1px solid black;
                border-collapse: collapse;
                text-align:center;
            }
        </style>
    </head>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sheh";
            $conn = mysqli_connect($servername, $username, $password,$dbname);

           
           $cid=$_POST['cid'];
           $name=$_POST['name'];
           $address=$_POST['address'];
           $contact=$_POST['contact'];
           $mail=$_POST['mail'];
           $sql="INSERT INTO customer VALUES ('$cid','$cid','$name','$address','$contact','$mail')";
           if($conn->query($sql) === TRUE){
            echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none; opacity: 0.2;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
      </svg>
      <div class="alert alert-success d-flex align-items-center" role="alert" style="opacity:0.8;">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
        "Request has been made on the name of '.$name.'. Click here to order:<a href=" http://localhost/dashboard/Invoicing-system-main/order.php?pid=0&cid='.$cid.'&oid=0">Order</a>
        </div>
      </div>' ;
           }
           else {
            echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none; opacity: 0.8;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
     </svg>
        <div class="alert alert-danger d-flex align-items-center" role="alert" style="opacity:0.6;">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          "Oops!!!Customer id taken and try again. Tip: Avoid using '."' ".'character in the input" 
        </div>
      </div>';
           }
           
           $conn->close();
          }
    ?>
    <body>
   
        <div class="container col-md-6" style="margin-top: 5%; background-color: whitesmoke; opacity: 0.8; padding: 3%; border-radius: 25px;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <h2><center>Enter Info</center></h2>
            <div class="mb-3">
                <label for="randomNumber" class="form-label">Customer id:</label>
        
                <input type="text" class="form-control" id="randomNumber" name="cid" readonly>
                <button type="button" id="generateButton" style="align: right;">Generate</button>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter full name" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter address" name="address">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contact no.</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter your contact number" name="contact">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter your email address" name="mail">
            </div>  
            <center>
              <button type="submit" name="update" class="btn btn-primary" style="background-color: #5d2a42; border: 0; margin-bottom: 20px;">Submit</button>
            </center>
          </form>  

          <script>
        function generateRandomNumber() {
            const randomNumber = Math.floor(Math.random() * 90000) + 10000; // Generates a 5-digit random number
            document.getElementById('randomNumber').value = randomNumber;
        }

        document.getElementById('generateButton').addEventListener('click', generateRandomNumber);
    </script>
        <script src="" async defer></script>
    </body>
</html>