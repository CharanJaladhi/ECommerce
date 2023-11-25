<?php 
session_start();

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
    <title>Login and Sign Up form</title>
    <link href="styling/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- == google font == -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
    <link rel="stylesheet" href="styling/nav.css">
    <link rel="stylesheet" href="styling/slidebar.css">
    <style>
      .err{
          color:rgb(206, 110, 110);
          font-size: 10px;
          line-height: 1px;
      }
      .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Light background color with opacity */
            z-index: 1;
        }
      .modal ol li{
        margin-left:20px;
        color:#636363;
      }
      .modal p{
        color:#636363;
      }
      /* Style for the modal */
      .modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: whitesmoke; /* Bright background color for the modal */
        border: 1px solid #ddd;
        border-radius: 5px;
        max-height: 80%; /* Adjust the maximum height as needed */
        overflow-y: auto; /* Enable vertical scrolling if the content exceeds the height */
        z-index: 2; /* Higher z-index than the overlay */
        text-align:left;
      }

      /* Style for the close button */
      .close {
          position: absolute;
          top: 10px;
          right: 10px;
          cursor: pointer;
          font-size:25px;
      }
    </style>
</head>
<body ng-app="myApp" ng-controller="UserController">
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
      
    <div class="wrapper" >
        <h1>Sign Up</h1>
        <form action="SIGN_UP1.php" method="post" ng-submit="submitForm()" id="myForm">
            <input type="text" placeholder="Username" name="username" ng-model="name" ng-model-options="{ updateOn: 'default blur', debounce: { default: 300, blur: 0 } }" ng-change="validateName()" required>
            <span class="err" ng-show="error1">{{error1}}</span>
            <input type="email" placeholder="E-Mail" name="email" ng-model="email" ng-model-options="{ updateOn: 'default blur', debounce: { default: 300, blur: 0 } }" ng-change="validateEmail()" required>
            <span class="err" ng-show="error3">{{error3}}</span>
            <input type="password" placeholder="Password" name="password" ng-model="password" ng-model-options="{ updateOn: 'default blur', debounce: { default: 300, blur: 0 } }" ng-change="validatePassword()" required>
            <span class="err" ng-show="error2">{{error2}}</span>
            <input type="password" placeholder="Re-enter Password" name="reEnterPassword" ng-model="confirmPassword" ng-change="confpassword()" required>
            <span class="err" ng-show="error4">{{error4}}</span><br>
        <div class="terms">
            <input type="checkbox" id="checkbox" required>
            <label for="checkbox" onclick="openModal()">I agree to these<a href="#">
                Terms & Conditions</a></label>
        </div>
        <button type="submit" >Sign Up</button>
      </form>
        <div class="member">
            Already a member?<a href="login.php">Login Here</a>
        </div>
        <div id="termsModal" class="modal">
          <span class="close" onclick="closeModal()">&times;</span>
            <!-- Your terms and conditions content goes here -->
            <h3>1.Acceptance of Terms</h3>
            <p>By accessing and using the FashionUrself website, you agree to comply with and 
              be bound by these Terms and Conditions. If you do not agree with any part of these terms, 
              please do not use our Website.</p>
            <h3>2.Website Usage</h3>
            <ol>
              <li>You must be at least 18 years old or have parental consent to use our Website.</li>
              <li>You are responsible for maintaining the confidentiality of your account and password.</li>
              <li>FashionUrself reserves the right to refuse service, terminate accounts, or cancel orders at its sole discretion.</li>
            </ol>
            <h3>3.Product Information</h3>
            <ol>
              <li>FashionUrself strives to provide accurate product information, including images and descriptions, but does not guarantee the accuracy, completeness, or reliability of any information on the Website.</li>
              <li>Colors may vary based on your screen settings; we cannot guarantee that your device's display accurately represents the product colors.</li>
            </ol>
            <h3>4.Orders and Payments</h3>
            <ol>
              <li>By placing an order on FashionUrself, you agree to pay the full amount for the products and any applicable taxes and shipping fees.</li>
              <li> FashionUrself reserves the right to refuse or cancel any order for any reason.</li>
            </ol>
            <h3>5.Intellectual Property</h3>
            <ol>
              <li>All content on the Website, including text, graphics, logos, images, and software, is the property of FashionUrself and is protected by copyright and other intellectual property laws.</li>
              <li>You may not use, reproduce, modify, distribute, or display any portion of the Website without the prior written consent of FashionUrself.</li>
            </ol>
            <h3>6.Termination</h3>
            <p>FashionUrself may terminate or suspend your access to the Website, without prior notice, for any reason, including, without limitation, a breach of these Terms and Conditions.</p>
            <h3>7.Governing Law</h3>
            <p>These Terms and Conditions are governed by and construed in accordance with the laws of Indian Constituition.</p>
            <h3>8.Changes to Terms and Conditions</h3>
            <p>FashionUrself reserves the right to update, change, or replace any part of these Terms and Conditions at its discretion. It is your responsibility to check this page periodically for changes.</p>
            <h3>9.Privacy Policy</h3>
            <ol>
              <li>We collect your personal information for transactions and to enhance your experience on our website. This includes names, emails, addresses, and payment details.</li>
              <li>Your information is used to provide and improve our services, process transactions, and send promotional communications.</li>
              <li>We use cookies to improve your online experience.</li>
              <li>We prioritize the security of your information but cannot guarantee complete security.</li>
              <li>Our website may contain links to third-party sites, and we are not responsible for their privacy practices.</li>
              <li>You can opt-out of promotional communications and manage cookies in your browser settings.</li>
              <li>We may update this Privacy Policy, and changes are effective upon posting on our website.</li>
            </ol>
        </div>

        <div id="overlay" class="overlay"></div>
    </div>
<script src="signup.js">
</script>
<script>
  function openModal() {
    document.getElementById('termsModal').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeModal() {
    document.getElementById('termsModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}
</script>
</body>


</html>