<?php
session_start();
if (!isset($_SESSION['sessionid'])) {
    echo "<script>alert('Session not available. Please login');</script>";
    echo "<script> window.location.replace('login.php')</script>";
}
if (isset($_POST["submit"])) {
    include_once("dbconnect.php");
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = sha1($_POST["password"]);
    $sqlregister = "INSERT INTO `tbl_admin`(`name`, `email`, `password`) VALUES( '$name', '$email', '$pass')";
    try {
        $conn->exec($sqlregister);
        if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) 
        {
            
        }
        echo "<script>alert('Registration successful')</script>";
        echo "<script>window.location.replace('login.php')</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Registration failed')</script>";
        echo "<script>window.location.replace('register.php')</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="../javascript/script.js"></script>
    <title>KiwiMart</title>
</head>

<style>

@media screen and (min-width: 601px) {
        .size{
            max-width: 700px;
            margin: auto;
        }
    }
</style>

<body>
    <div class="w3-header w3-container w3-black w3-padding-32 w3-center">
        <h1 style="font-size:calc(8px + 4vw);">KIWIMART</h1>
        <p style="font-size:calc(8px + 1vw);;">Stay Home & Shop Online</p>
    </div>

    <div class="w3-bar w3-red">
        <a href="#contact" class="w3-bar-item w3-button w3-right">Logout</a>
        <a href="kiwimart.php" class="w3-bar-item w3-button w3-left">Home</a>
    </div>

    <div class="w3-container w3-padding-64 form-container">
        <div class="w3-card size">
            <div class="w3-container w3-black">
                <p>Customer Registration
                <p>
            </div>
            <form class="w3-container w3-padding" name="registerForm" action="register.php" method="post" enctype="multipart/form-data" onsubmit="return confirmDialog()" >
                <p>
                    <label>Name</label>
                    <input class="w3-input w3-border w3-round" name="name" id="idname" type="text" required>
                </p>
                <p>
                    <label>Email</label>
                    <input class="w3-input w3-border w3-round" name="email" id="idemail" type="email" required>
                </p>
                <p>
                    <label>Password</label>
                    <input class="w3-input w3-border w3-round" name="password" id="password" type="password" required>
                </p>
                
                <div class="row">
                    <input class="w3-input w3-border w3-block w3-black w3-round" type="submit" name="submit" value="Submit">
                </div>

            </form>


        </div>
    </div>

    <footer class="w3-footer w3-center w3-red">
        <p>KIWI MART</p>
    </footer>

</body>

</html>