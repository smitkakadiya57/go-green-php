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
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/form.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Da+2&family=Courgette&family=Delius&family=Merienda&family=Roboto+Slab&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">


</head>

<body>



    <?php include "parts/_header.php" ?>

    <div class="container">
        <div class="ab_img">
            <img src="img/ab.jpg" alt="">
        </div>
        <div class="ab_dec">
            <h1>SMIT KAKADIYA</h1>
            <h3>Founder & CEO</h3>
<p>Hii.. I am Smit Kakadiya.The owner of Indian's Biggest Agriculture based start-up.A alumini of Goverment Engineering College, Gandhinagar.The member of Indian Chember of Commerce.</p>
        </div>
    </div>

    <?php include "parts/_footer.php" ?>

    <!-- // javascript files // -->
    <script src="js/navbar.js"></script>
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