<?php
if (isset($_POST["submit"])) {
    include 'dbconnect.php';
    $email = $_POST["email"];
    $pass = sha1($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$pass'");
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();
    if ($number_of_rows  > 0) {
        session_start();
        $_SESSION["sessionid"] = session_id();
        echo "<script>alert('Login Success');</script>";
        echo "<script> window.location.replace('kiwimart.php')</script>";
    } else {
        echo "<script>alert('Login Failed');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
  height: 100%;
  color: #777;
  line-height: 1.8;
}
/* Create a Parallax Effect */
.bgimg-1 {
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* First image (Logo. Full height) */
.bgimg-1 {
  background-image: url('https://github.com/ndzirr/Lab-2/blob/main/tshirt.jpg?raw=true');
  min-height: 100%;
}

.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (min-device-width: 1600px) {
  .bgimg-1 {
    background-attachment: scroll;
    min-height: 500px;
  }

@media screen and (min-width: 601px) {
        .size{
            max-width: 700px;
            margin: auto;
        }
    }

}

</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="javascript/script.js"></script>
    <title>login</title>
</head>

<body onload="loadCookies()">
    <div class="w3-header w3-container w3-black w3-padding-32 w3-center">
    <div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">KIWI <span class="w3-hide-small">MART</span> 
  </div>
    </div>
    <div class="w3-container w3-padding-64 form-container">
        <div class="w3-card-4 size w3-container w3-white w3-padding-32 w3-centerw3-round">
            <div class="w3-container w3-red ">
                <h2>LOGIN</h2>
            </div>
            <form name="loginForm" class="w3-container" action="login.php" method="post">
                <p>
                    <label class="w3-text-black"><b>Email</b></label>
                    <input class="w3-input w3-border w3-round" name="email" type="email" id="idemail" required>
                </p>
                <p>
                    <label class="w3-text-black"><b>Password</b></label>
                    <input class="w3-input w3-border w3-round" name="password" type="password" id="idpass" required>
                </p>
                <p>
                    <input class="w3-check" type="checkbox" id="idremember" name="remember" onclick="rememberMe()">
                    <label>Remember Me</label>
                </p>
                <p>
                    <button class="w3-btn w3-round w3-red w3-block" name="submit">SIGN IN</button>
                    <p>
                    <a href="register.php" class="w3-bar-item w3-round w3-button w3-red w3-block">REGISTER</a></p>
                </p>
            </form>
        </div>
    </div>

<footer class="w3-container w3-black w3-center">
  <p>Copyright: KIWIMART</p>
</footer>

<div id="cookieNotice" class="w3-right w3-block" style="display: none;">
        <div class="w3-blue">
            <h4>Cookie Consent</h4>
            <p>This website uses cookies or similar technologies, to enhance your
                browsing experience and provide personalized recommendations.
                By continuing to use our website, you agree to our
                <a style="color:#115cfa;" href="/privacy-policy">Privacy Policy</a>
            </p>
            <div class="w3-button">
                <button onclick="acceptCookieConsent();">Accept</button>
            </div>
        </div>
        <script>
            let cookie_consent = getCookie("user_cookie_consent");
            if (cookie_consent != "") {
                document.getElementById("cookieNotice").style.display = "none";
            } else {
                document.getElementById("cookieNotice").style.display = "block";
            }
        </script>

</body>

</html>
