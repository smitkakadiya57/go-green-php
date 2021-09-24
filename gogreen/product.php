<?php include "parts/_dbconnect.php"  ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Green | Products</title>


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/product.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Da+2&family=Courgette&family=Delius&family=Merienda&family=Roboto+Slab&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">



</head>

<body>
    <?php include "parts/_header.php"  ?>

    <h1 class="pt">OUR PRODUCTS</h1>
    <div class="product_container">

        <?php
                    $sql= "SELECT * FROM `products`";
                    $result=mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                    echo '
                    <div class="product">
                    <div class="product_img">
                        <img src="img/'.$row["pimg"].'">
                    </div>
                    <div class="product_desc">
                        <h3>'.$row["pname"].'</h3>
                        <h4>'.$row["pprice"].' Rs</h4>
                        <form action="order.php" method="POST">
                            <input type="number" name="id" hidden value='.$row["id"].'>
                            <button type="submit">BUY NOW</button>
                        </form>
                    </div>
                </div>';
                    
                    }
                    ?>


    </div>





    <?php include "parts/_footer.php" ?>

    <!-- // javascript files // -->
    <script src="js/navbar.js"></script>
    <script src="js/login.js"></script>
    <script src="js/alert.js"></script>



</body>

</html>