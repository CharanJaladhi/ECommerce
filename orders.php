<?php
require_once 'connection.php';
$userName = $_SESSION['userName'];
if (!isset($userName)) {
    echo '<script type="text/javascript">';
    echo 'alert("You need to login first!");';
    echo 'window.location.href = "login.php";'; // Redirect to another_page
    echo '</script>';
    exit;
}
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

  $sql = "SELECT * FROM orders WHERE userName='$userName'";
  $all_product =  mysqli_query($conn,$sql);
  
?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logoo1.jpg" height="50px" width="50px"/>
    <title>Orders</title>
    <link rel="stylesheet" href="file:///E:/fontawesome/css/all.css">
    <link rel="stylesheet" href="styling/nav.css">
    <link rel="stylesheet" href="styling/bag.css">
    <link rel="stylesheet" href="styling/footer1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- == google font == -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
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
      <form action="search.php" method="GET">
          <input type="search" name="query" placeholder="Search Here..." style="width: 240px; padding:5px;border: 1px solid rgb(192, 192, 192);border-radius: 50px;font-size: 15px;color:rgb(126, 126, 126);">
          <input type="submit" value="Search" style="padding:5px;border-radius:50px;background:white;color:#339b9b;border:none;font-size: 15px;transition: background-color,color 0.3s;" onmouseover="this.style.backgroundColor='#339b9b',this.style.color='white';" onmouseout="this.style.backgroundColor='white',this.style.color='#339b9b';">
      </form>
    </li>
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

<?php
    if (!mysqli_num_rows($all_product) > 0) {
        echo '<h1 style="text-align:center;margin-bottom:365px;">OOPS!! You have not ordered any item.</h1>';
    }
?>
<div class="project">

    <div class="shop">
        <?php
        while($row = mysqli_fetch_assoc($all_product)){

        ?>
            <div class="box">
                <img src="<?php echo $row["orderedProductImage"]; ?>">
                <div class="content">
                    <h3><?php echo $row["orderedProductName"]; ?></h3>
                    <p class="unit"><span style="font-weight:bold;">Quantity: </span><input name="" value="<?php echo $row["orderedProductCount"]; ?>"></p>
                    <p><span style="font-weight:bold;">Ordered By : </span><?php echo $row["orderedUserName"]; ?>(<?php echo $row["orderedMail"]; ?>).</hp>
                    <p><span style="font-weight:bold;">Price: </span>₹<?php echo $row["orderedProductPrice"]; ?></p>
                    <p><span style="font-weight:bold;">Ordered At: </span><?php echo $row["orderedTime"]; ?>.</p>
                    <p><span style="font-weight:bold;">Delivery Address: </span><?php echo $row["orderedAddress"];?>,<br><?php echo $row["orderedCity"];?>,<?php echo $row["orderedState"]; ?>,<?php echo $row["orderedPincode"]; ?>.</p>
                </div>
            </div> 
            <?php 
        }
        ?> 
    </div>
   
</div>
<?php mysqli_close($conn); ?>

<footer class="footer">
  <div class="container">
    <div class="col1">
      <a href="#" class="brand"><img src="images/logoo.png" style="height:65px;width:65px;">Fashion Urself</a>
      <ul class="media-icons">
        <li>
          <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-discord"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-github"></i></a>
        </li>
      </ul>
    </div>
    <div class="col2">
      <ul class="menu">
        <li><a href="home.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">Skills</a></li>
        <li><a href="contactUs.php">Contact</a></li>
        <p>"Elevate your style with Fashion Urself. Discover quality fashion, shop hassle-free, and stay in the fashion loop. Connect with us for the latest trends and personalized service."</p>
      </ul>
    </div>
    <div class="col3">
      <p>Subscribe to our newslatter</p>
      <form>
        <div class="input-wraaap">
          <input style="border-radius:0px;width:200px;height:40px;" type="email" placeholder="ex@gmail.com" />
        </div>
      </form>
      <ul class="services-icons">
        <li>
          <a href="#"><i class="fa-brands fa-cc-paypal"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-cc-apple-pay"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-google-pay"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-cc-amazon-pay"></i></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="mekk">
      <p>@favUrslf - All Rights Reserved</p>
    </div>
  </div>
</footer>
</body>
</html>