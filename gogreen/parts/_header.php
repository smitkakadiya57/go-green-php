<?php 

include "parts/_login.php";

?>



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
        <button id="trigger">LOGIN</button>
        <button onclick="window.location.href='signup.php';">REGISTER</button>

    </div>

</nav>