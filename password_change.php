<?php
session_start();
$email=$_SESSION['mail'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logoo1.jpg" height="50px" width="50px"/>
    <title>Password Change</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
    <link href="styling/style.css" rel="stylesheet">
    <link rel="stylesheet" href="styling/nav.css">
    <style>
      .err{
          color:rgb(206, 110, 110);
          font-size: 9px;
          line-height: 1px;
      }
      .sent_mssg{
        color:#07001f;
        background-color: #cdffcd ;
        border-radius: 10px;
        font-size: 12px;
        padding:6px;
        text-align: left;
        width:300px;
        margin-right:5px;
        margin-bottom: 10px;
        border: 1px solid #90ee90;
      }
    </style>
</head>
<body >
<nav>
    <div class="left-container">
    <img src="images/logoo.png" alt="Fashion Urself"  height="50px" width="50px">
    <ul>
      <li class="left-nav-items"><a href="home.php">Home</a></li>
      <li>
        <a href="#">Men</a>
        <ul>
          <li><a href="ethnic_wear_men.php">Ethnic Wear</a></li>
          <li><a href="men_t_shirts.php">T-Shirts&Jeans</a></li>
          <li><a href="casuals_men.php">Casuals</a></li>
          <li><a href="active_wear_men.php">Active Wear</a></li>
          <li><a href="sports_wear.php">Sports Wear</a></li>
          <li><a href="foot_wear.php">Foot Wear</a></li>
        </ul>
      </li>
      <li>
        <a  href="#">Women</a>
        <ul>
          <li><a href="sarees.php">Sarees</a></li>
          <li><a href="ethnic_wear_women.php">Kurtas</a></li>
          <li><a href="ethnic_wear_women.php">Ethnic Wear</a></li>
          <li><a href="sports_wear.php">Sports Wear</a></li>
          <li><a href="foot_wear.php">Foot Wear</a></li>
        </ul>
      </li>
      <li>
        <a  href="#" style="width:100%;">Kids</a>
      <ul>
        <li>
          <a href="#">Boys
          </a>
          <ul>
            <li><a href="kids_t_shirts.php">T-shirts&Jeans</a></li>
            <li><a href="kids_ethnic_wear.php">Ethnic Wear</a></li>
            <li><a href="kids_clothing_sets.php">Clothing Sets</a></li>
            <li><a href="foot_wear.php">Foot Wear</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Girls</a>
          <ul>
            <li><a href="kids_t_shirts.php">T-shirts&Jeans</a></li>
            <li><a href="kids_ethnic_wear.php">Ethnic Wear</a></li>
            <li><a href="kids_clothing_sets.php">Clothing Sets</a></li>
            <li><a href="foot_wear.php">Foot Wear</a></li>
          </ul>
        </li>
      </ul>
      </li>
    </ul>
  </div>
  <div class="right-container">
    <ul style="float:right;">
      <li><a href="bag.php"><i class="fa-solid fa-bag-shopping" style="color:whitesmoke;padding-right:5px;"></i>Bag</a></li>
  </ul>
  </div>
</nav>
      
    <div class="wrapper">
        <h1>Change Password</h1>
        <div class="sent_mssg">
          <p>Change password for the user registered<br>with mail <span style="color:rgb(206, 110, 110);">"<?php echo $email;?>"</span></p>
        </div>
        <form action="password_change1.php" method="post">
            <input type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" oninput="validate_password()" required>
            <span class="err" id="error1"></span>
            <input type="password" placeholder="Re-Enter Confirm Password" id="confirmRePassword" name="confirmRePassword" oninput="validate_reenter_password()" required>
            <span class="err" id="error2"></span>
            <button>Change Password</button>
      </form>
    </div>
<script>
      // Password contains at least 1 uppercase letter, 1 lowercase letter, and 1 special character (excluding . , ; :)
      function validate_password() {
          let password = document.getElementById('confirmPassword').value;
          if (password.length == 0) {
              document.getElementById('error1').innerHTML = "";
          }
          let uppercaseFlag = false;
          let lowercaseFlag = false;
          let specialCharFlag = false;
          let excludedChars = ",.;:";
          let specialChars = "!@#$%^&*()-_=+{}[]|'\"<>";
      
          if (password.length < 8) {
              document.getElementById('error1').innerHTML = "*Password must be at least 8 characters long";
              return false;
          }
      
          for (let i = 0; i < password.length; i++) {
              if (password[i] >= 'A' && password[i] <= 'Z') {
                  uppercaseFlag = true;
              } else if (password[i] >= 'a' && password[i] <= 'z') {
                  lowercaseFlag = true;
              } else if (specialChars.indexOf(password[i]) !== -1) {
                  specialCharFlag = true;
              } else if (excludedChars.indexOf(password[i]) !== -1) {
                  document.getElementById('error1').innerHTML = "*Password must not contain , . ; :";
                  return false;
              }
          }
      
          if (uppercaseFlag && lowercaseFlag && specialCharFlag) {
              document.getElementById('error1').innerHTML = "";
              return true;
          } else {
              document.getElementById('error1').innerHTML = "*Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 special character";
              return false;
          }
      }
      function validate_reenter_password(){
          let re_password=document.getElementById('confirmRePassword').value;
          if(document.getElementById('confirmPassword').value != re_password){
              document.getElementById('error2').innerHTML = "*Password doesn't matches";
              return false;
          }
          else{
              document.getElementById('error2').innerHTML = "";
              return true;
          }
      }
</script>
</body>
</html>