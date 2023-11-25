<?php
require_once 'connection.php';
$userName=$_SESSION['userName'];

if (!isset($userName)) {
  echo '<script type="text/javascript">';
  echo 'alert("You need to login first!");';
  echo 'window.location.href = "login.php";'; // Redirect to another_page
  echo '</script>';
  exit;
}

$sql="SELECT * FROM USERS where userName='$userName';";
$all_product = $conn->query($sql);

if (isset($_SESSION['userName'])) {
  $userName = $_SESSION['userName']; 
  $userNameWithName="Hi $userName";
  $link ='#';
  $showLogout = true;
} else {
  $userNameWithName = '<i class="fa-solid fa-arrow-right-to-bracket"></i> Register'; // Set a default value if the session variable is not set
  $showLogout = false;
  $link = 'signup.php';
}

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logoo1.jpg" height="50px" width="50px"/>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styling/nav.css">
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
    <style>
      label{
        float:left;
        padding-left:20px;
        color:rgb(17,107,143);
        font-size:18px;

      }
      .err{
          color:rgb(206, 110, 110);
          font-size: 9px;
          line-height: 1px;
      }
    </style>
</head>
<body>
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
        <li>
        <a href="#"><i class="fa-regular fa-user" style="padding-right:5px;"></i>Profile</a>
        <ul>
          <li><a id ="myLink" href="<?php echo $link;?>" ><?php echo $userNameWithName; ?></a></li>
          <li><a href="coupon.php"><i class="fa-solid fa-gift" style="padding-right:5px;"></i>Coupons</a></li>
          <li><a href="orders.php"><i class="fa-solid fa-box-open" style="padding-right:5px;"></i>Orders</a></li>
          <li><a href="editProfile.php"><i class="fa-solid fa-user-gear" style="padding-right:5px;"></i>Edit Profile</a></li>
          <?php if ($showLogout): ?>
            <li><a href="logout.php" id="myLogoutLink"><i class="fa-solid fa-arrow-right-from-bracket" style="padding-right:5px;"></i>Logout</a></li>
          <?php endif; ?>
        </ul>
      </li>
      <li><a href="bag.php"><i class="fa-solid fa-bag-shopping" style="color:whitesmoke;padding-right:5px;"></i>Bag</a></li>
  </ul>
  </div>
</nav>


<div class="wrapper">
<?php
    while($row = mysqli_fetch_assoc($all_product)){

    ?>
        <h1>Update Details</h1>
        <form action="connection.php" method="post">
            <label for="text">Username :</label>
            <input type="text" placeholder="<?php echo $row["userName"]; ?>" name="myInput1" id="username" oninput="validate_username()">
            <span class="err" id="error1"></span>
            <label for="email">E - Mail :</label>
            <input type="email" placeholder="<?php echo $row["eMail"]; ?>" name="myInput2" id="email" oninput="validate_email()">
            <center><span class="err" id="error2"></span></center>
            <label for="password">Password :</label>
            <input type="password" placeholder="<?php echo $row["userPassword"]; ?>" name="myInput3" id="password" oninput="validate_password()">
            <span class="err" id="error3"></span>
        <button >Save Details</button>
      </form>
      <?php 
    }
    ?> 
    </div>

    <?php include 'footer.php'; ?>
</body>
    <script>
      // Username starts with a capital letter and must contain at least one digit
      function validate_username() {
          let username = document.getElementById('username').value;
          let usernamePattern = /^[A-Z][A-Za-z0-9]*\d.*$/;
      
          if (usernamePattern.test(username)) {
              document.getElementById('error1').innerHTML = "";
              return true;
          } else {
              document.getElementById('error1').innerHTML = "*Password must start with capital letter and contain a digit";
              return false;
          }
      }
      
      
      // Password contains at least 1 uppercase letter, 1 lowercase letter, and 1 special character (excluding . , ; :)
      function validate_password() {
          let password = document.getElementById('password').value;
          if (password.length == 0) {
              document.getElementById('error3').innerHTML = "";
          }
          let uppercaseFlag = false;
          let lowercaseFlag = false;
          let specialCharFlag = false;
          let excludedChars = ",.;:";
          let specialChars = "!@#$%^&*()-_=+{}[]|'\"<>";
      
          if (password.length < 8) {
              document.getElementById('error3').innerHTML = "*Password must be at least 8 characters long";
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
                  document.getElementById('error3').innerHTML = "*Password must not contain , . ; :";
                  return false;
              }
          }
      
          if (uppercaseFlag && lowercaseFlag && specialCharFlag) {
              document.getElementById('error3').innerHTML = "";
              return true;
          } else {
              document.getElementById('error3').innerHTML = "*Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 special character";
              return false;
          }
      }
      
      
      
      // Email contains @, ., 1-20 characters
      function validate_email() {
          let email = document.getElementById('email').value;
          let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,20}$/;
      
          if (emailPattern.test(email)) {
              document.getElementById('error2').innerHTML = "";
              return true;
          } else {
              document.getElementById('error2').innerHTML = "*Invalid email format";
              return false;
          }
      
      }
      </script>
</html>