<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logoo1.jpg" height="50px" width="50px"/>
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
    <link href="styling/style.css" rel="stylesheet">
    <link rel="stylesheet" href="styling/nav.css">
    <style>
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

    <!--this content in wrapper container changes dynamically --> 
    <div class="wrapper">
        <?php if (isset($_SESSION['status'])) :?> <!--this $_SESSION['status'] is set only if it navigates atleast once to password_reset_link.php-->
            <?php if ($_SESSION['status'] !=="Email not found, please enter a valid email") : ?> <!--checks whether mail sent or not if sent the heading changes -->
                <h1>Verify OTP</h1>
            <?php else : ?><!--checks whether mail sent or not if not sent the heading remains same -->
                <h1>Password Reset</h1>
            <?php endif; ?>
            <div class="sent_mssg"><!--this container displays to the user whether mail sent or not -->
                <p><?php echo $_SESSION['status']; ?></p>
            </div>
            <?php if ($_SESSION['status'] !=="Email not found, please enter a valid email") : ?><!--checks whether mail sent or not if sent the form elements changes -->
                <form action="otp_validation1.php" method="post"><!--redirects to otp_validation1.php-->
                    <input type="text" name="entered_otp1" placeholder="Enter OTP" required>
                    <button type="submit">Verify OTP</button>
                </form>
            <?php else : ?><!--checks whether mail sent or not if not sent the form elements remains same -->
                <form action="password_reset_link.php" method="post"><!--redirects to password_reset_link.php-->
                    <input type="text" name="entered_reset_mail" placeholder="Enter Email" required>
                    <button type="submit">Send Link</button>
                </form>
            <?php endif; ?>
            <?php unset($_SESSION['status']); ?>
        <?php else : ?><!--this is used to display the data for the first time when the password_reset.php -->
        <h1>Password Reset</h1>
        <form action="password_reset_link.php" method="post"><!--redirects to password_reset_link.php-->
            <input type="text" name="entered_reset_mail" placeholder="Enter Email" required>
            <button type="submit">Send Link</button>
        </form>
        <?php endif; ?>
    </div>

</body>
</html>