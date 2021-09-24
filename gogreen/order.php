<?php 
session_start();

if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true){
  header("location:index.php");
  exit;
}


?>


<?php

include "parts/_dbconnect.php";

$showerror=false;


$id=$_POST['id'];

$sql1= "SELECT * FROM `products` WHERE `products`.`id` = $id";
$result1=mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_assoc($result1);
  if($row1){
   
  }else{
$showerror="we are facing some issue ";
  }






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLACE ORDER </title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Da+2&family=Courgette&family=Delius&family=Merienda&family=Roboto+Slab&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/alert.css">

    

</head>

<body>
    <a class="back_btn" href="product.php">Back to Products</a>
    <div class="product_details">
        <div class="product_img">
            <img src="img/<?php echo $row1['pimg'] ?>" alt="">
        </div>
        <div class="product_desc">
            <h3><?php echo $row1['pname'] ?></h3>
            <h4><?php echo $row1['pprice'] ?> Rs</h4>
            <ul>
                <li><i class="fas fa-check-circle"></i>2 year manufacture Warrenty </li>
                <li><i class="fas fa-check-circle"></i> Hight Carbon steel </li>
                <li> <i class="fas fa-check-circle"></i>High Grade color </li>
                <li> <i class="fas fa-check-circle"></i>ISI Certified </li>
            </ul>
        </div>
    </div>

    <div class="warn">
        <h3>* Fill out this form for placing order</h3>
    </div>

    <form action="finalplace.php" method="POST">
        <h2>Order Form </h2>
        <hr>
        <div class="form_field">
            <label for="fname">Full Name<span>*</span></label>
            <input type="text" id="fname" name="fname"  required>
        </div>
        <div class="form_field">
            <label for="email">Email<span>*</span></label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form_field">
            <label for="mno">Mobile No<span>*</span></label>
            <input type="text" id="mno" name="mno" maxlength="10" required>
        </div>
        <div class="form_field">
            <label for="address">Address<span>*</span></label>
            <input type="text" id="address" name="address" required>
        </div>
        <hr>
        <div class="form_field">
            <label for="p_name">Product Name<span>*</span></label>
            <input type="text" id="p_name" value="<?php echo $row1['pname'] ?>" name="p_name" required>
        </div>
        <div class="form_field">
            <label for="p_price">Product Price<span>*</span></label>
            <input type="text" id="p_price" value="<?php echo $row1['pprice'] ?>" name="p_price" required>
        </div>
        <div class="form_field">
            <label for="p_qty">Product Qty<span>*</span></label>
            <input type="number" id="p_qty" name="p_qty" required>
        </div>
        <hr>
        <button type="submit" name="place">Place Order</button>
    </form>

    <script src="js/alert.js"></script>

    <?php
if($showerror){
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