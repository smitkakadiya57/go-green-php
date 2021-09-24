<?php


session_start();

session_unset();
session_destroy();

require 'parts/_dbconnect.php';

$shalert=false;
$showerror=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
   

    $fullname=$_POST['fname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $mobileno=$_POST['mno'];


// $exists=false;


//check whether username exist or note 
$exitsql="SELECT * FROM `users` WHERE mobileno='$mobileno'";
$result=mysqli_query($conn,$exitsql);
$numExistRows=mysqli_num_rows($result);

if($numExistRows>0){
    // $exists=true;
    $showerror=" Username Alredy Exist";
    
}else{
    // $exists=false;

    if($password==$cpassword){
    $hash=password_hash($password,PASSWORD_DEFAULT);

    $sql="INSERT INTO `users` ( `fullname`, `mobileno`, `email`, `password`, `time`) VALUES ('$fullname', '$mobileno', '$email', '$hash', current_timestamp())";
    $result=mysqli_query($conn,$sql);

    if($result){
        $shalert="success";
    }else{
        $showerror="Password do not match ";
    }
                            }
    }


}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Da+2&family=Courgette&family=Delius&family=Merienda&family=Roboto+Slab&display=swap"
        rel="stylesheet">

        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">


    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/alert.css">

</head>

<body>
    

    <div class="register_form">
        <div class="register_left">

            <img src="img/logo.png" alt="logo">
            <h1>GO Green </h1>
            <p>Towards the growth of indian Agriculture</p>

        </div>
        <div class="register_right">
            <form action="/gogreen/signup.php" method="POST">

                <h2>Registeration Form</h2>
                <hr>
                <div class="form_field">
                    <label for="fname">Full Name<span>*</span></label>
                    <input type="text" id="fname" name="fname" required>
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
                    <label for="password">Password<span>*</span></label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form_field">
                    <label for="cpassword">Confirm Password<span>*</span></label>
                    <input type="password" id="cpassword" name="cpassword" required>
                </div>
                <div class="form_check">
                    <input type="checkbox">
                    <span>Agreed <a href="#">Terms & Condition</a> </span>
                </div>

                <button type="submit">Register</button>
                <h3>Alredy have an Account ? <a href="index.php">login</a> </h3>
                <h3><a href="index.php">Back to Home</a> </h3>
            </form>


        </div>
    </div>

    <script src="js/alert.js"></script>
    <?php


if($shalert){
    echo"<script>
    alertwindow.openalert({
        title: 'Congratulation',
        content: 'YOUR ACCOUNT IS CREATED SUCCESSFULLY',
        type:'success'
    });
    </script>
    ";
}


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