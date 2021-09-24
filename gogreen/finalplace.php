
<?php 
session_start();

if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true){
  header("location:product.php");
  exit;
}


?>






<?php 

include "parts/_dbconnect.php";

$sh=false;
  $showerror=false;

  $fname=$_POST['fname'];
  $email=$_POST['email'];
  $mno=$_POST['mno'];
  $adress=$_POST['address'];
  $pname=$_POST['p_name'];
  $pprice=$_POST['p_price'];
  $pqty=$_POST['p_qty'];
  
  $sql="INSERT INTO `order` ( `fname`, `email`, `mno`, `address`, `pname`, `pprice`, `pqty`) VALUES ( '$fname', '$email', '$mno', '$adress', '$pname', '$pprice', '$pqty')";
  
  $result= mysqli_query($conn,$sql);
  
  
  if($result){
    $sh="success";
  }else{
    $showerror="error";
  }
  
  
  
 
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    .msg {

        max-width: 70%;
        margin: auto;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: 0 0 0.2rem black;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-top: 10%;
    }

    .success {
        color: green;
    }

    .danger {
        color: red;
    }

    .msg a {
        border: 0.1rem solid green;
        width: 10rem;
        font-size: 1.2rem;
        padding: 0.5rem;
        text-decoration: none;
        color: green;
    }

    .msg a:hover {
        border: 0.17rem solid green;
        background: white;
        box-shadow: none;
    }
    </style>
</head>

<body>
    <?php  



    if($sh){
echo'<div class="msg">
<h1 class="success">
    Your Order Placed Successfully
</h1>
<h2>
    Order will be delivered at your Address within 5 Working days.
</h2>
<h3>Thanks...</h3>
<a href="product.php">Back to Product</a>
</div>
';
    }
    
    if($showerror){

echo'
<div class="msg">
    <h1 class="danger">
        Sorry... we are facing some technical issue
    </h1>
    <h2>
        Try after servel time.
    </h2>
    <h3>We feel sad for your unconvinience </h3>
    <a href="product.php">Back to Product</a>
</div>';


    }


    ?>




</body>

</html>