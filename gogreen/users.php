<?php 


session_start();

if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}


$ruff= $_SESSION['mobile'];

require 'parts/_dbconnect.php';

$sql="Select * From users where mobileno='$ruff'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);



$_SESSION['fname']=$row['fullname'];

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME -<?php echo  $_SESSION['fname'] ?></title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/users.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Da+2&family=Courgette&family=Delius&family=Merienda&family=Roboto+Slab&display=swap"
        rel="stylesheet">




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">


</head>

<body>


    <header class="header">
        <div class="img">
            <img src="img/logo.png" alt="logo">
        </div>
        <div class="title">
            <h1>Go Green</h1>
        </div>
        <div class="slogan">
            <h4>Towards the growth of indian Agriculture</h4>
        </div>
    </header>
    <nav class="nav_bar">
        <i class="fas  hamburger"></i>

        <div class="nav_menu open ">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="users.php">Account</a></li>
                <li><a href="#">Application</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="about.php">About</a></li>
                
            </ul>
        </div>
        <div class="nav_btn open ">

            <button onclick="window.location.href='parts/logout.php';">LOG OUT</button>
            <button onclick="window.location.href='signup.php';">REGISTER</button>

        </div>

    </nav>

    <div class="user_inter">

        <p class="user_title">Welcome you to Go Green Private ltd. official Website.this is your account portal. </p>
        <div class="user_details">
            <li> <i class="fas fa-user"></i><p><?php echo  $_SESSION['fname']?> </p></li>
            <li><i class="fas fa-phone-alt"></i> <p><?php echo  $row['mobileno']?></p> </li>
            <li><i class="fas fa-envelope"></i><p> <?php echo  $row['email']?> </p></li>
        </div>


        <ul class="user_acccess">
            <li>Now you can ..</li>
            <li><i class="fas fa-check-circle"></i>Access our website</li>
            <li><i class="fas fa-check-circle"></i>Purchase Our products</li>
            <li><i class="fas fa-check-circle"></i>Ask your Doubt with Experts</li>
            <li><i class="fas fa-check-circle"></i>Send us your Enquiry </li>
        </ul>
    </div>






    <?php include "parts/_footer.php" ?>

    <!-- // javascript files // -->
    <script src="js/navbar.js"></script>
</body>

</html>