<?php
$login=false;
$showerror=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    require 'parts/_dbconnect.php';

    $mobileno=$_POST['mno'];
    $password=$_POST['password'];
  

    
    $sql="Select * From users where mobileno='$mobileno'";
    $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
    if($num==1){
      while($row=mysqli_fetch_assoc($result)){
if(password_verify($password,$row['password'])){


        $login=true;

         // starting login session 
         session_start();
         $_SESSION['mobile']=$mobileno;
         $_SESSION['loggedin']=true;
 
       // redirect the user to welcome.php
       header("location: /gogreen/users.php"); 
      }else{
        $showerror="Invalid login credential";
        
    }
       
  }

    }else{
        $showerror="Invalid login credential";
    }



}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Green</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/alert.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Da+2&family=Courgette&family=Delius&family=Merienda&family=Roboto+Slab&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">





</head>

<body>



    <?php include "parts/_header.php" ?>

    <div class="slide-container">


        <div class="slide">
            <img src="img/Slide1.JPG" alt="">
            <div class="caption">
            Modern Equipments
            </div>
        </div>

        <div class="slide">
            <img src="img/Slide2.JPG" alt="">
            <div class="caption">
            Amazing Technology
            </div>
        </div>

        <div class="slide">
            <img src="img/Slide3.JPG" alt="">
            <div class="caption">
            Better farming
            </div>
        </div>

        <div class="slide">
            <img src="img/Slide4.JPG" alt="">
            <div class="caption">
            New Age of Agriculture
            </div>
        </div>

        <div class="slide">
            <img src="img/Slide5.JPG" alt="">
            <div class="caption">
            High Production
            </div>
        </div>

        <span class="arrow prev" onclick="controller(-1);">&#10094;</span>
        <span class="arrow next" onclick="controller(1);">&#10095;</span>

        <div id="indicator">

        </div>

    </div>


    <div class="card_wrapper intro">
        <div class="card">
            <div class="card_img">
                <img src="img/intro1.png" alt="">
            </div>
            <div class="card_title">
                What is Go Green ?
            </div>
            <div class="card_desc">
                GO Green is a Biggest Commercial Farming Company in Asia with more than 200+crore net worth and 1000+
                acres farming capital and biggest farming equipment manufacture.
            </div>
        </div>
        <div class="card">
            <div class="card_img">
                <img src="img/intro2.png" alt="">
            </div>
            <div class="card_title">
                Our Mission
            </div>
            <div class="card_desc">
                Our mission to make india no1 exporter of farming products and biggest food processing sector and also
                invent new farming technology for better yield.
            </div>
        </div>
        <div class="card">
            <div class="card_img">
                <img src="img/intro3.png" alt="">
            </div>
            <div class="card_title">
                What we Do?
            </div>
            <div class="card_desc">
                We Grow Cotton, Wheat, Rice and Fruits. Harvest it and processing it and make food products and sell in
                india as well as abroad.we also manufacture farming equipments.
            </div>
        </div>

    </div>





    <?php include "parts/_footer.php" ?>

    <!-- // javascript files // -->
    <script src="js/navbar.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/login.js"></script>
    <script src="js/alert.js"></script>
    <?php
if($showerror!=false){
echo "
<script>
alertwindow.openalert({
    title: 'Alert',
    content: '".$showerror."',
    type:'danger'
});
</script>

";
}
?>
</body>

</html>