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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="images/logoo1.jpg" height="50px" width="50px"/>
    <title>Coupons</title>
    <!--Google Fonts and Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Libre+Barcode+128&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styling/nav.css">
    <style>
      body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        font-family:"Poppins",sans-serif;
      }
      .center {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        background: white;
       
      }
      .align{
        display: flex;
        flex-direction: column;
        margin:20px;
      }
      .coupon {
        width: 350px;
        height: 200px;
        box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16),
          0px 3px 6px rgba(0, 0, 0, 0.23);
        transform-style: preserve-3d;
        position:relative;
        margin: 10px;
        transition: 5s;
      }
      .front,
      .back {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        backface-visibility: hidden;
        flex-direction: column;
      }
      .front {
        background: url("images/coupon_bg.svg");
        background-size: cover;
      }
      .front span {
        background: #3ebfbf;
        width: fit-content;
        height: fit-content;
        padding: 10px;
        color: white;
        font-size: 26px;
        font-weight: 600;
        text-shadow: 2px 2px rgba(0, 0, 0, 0.16);
      }
      .back {
        transform: rotateY(180deg);
        background: white;
      }
      .top {
        flex-basis: 60%;
        width: 100%;
        height: 100%;
        border-bottom: 0.7mm solid rgba(0, 0, 0, 0.5);
        padding: 20px;
        padding-bottom: 0;
        box-sizing: border-box;
      }
      .title {
        font-size: 36px;
        font-family: "Abril Fatface";
      }
      .subtitle {
        font-size: 12px;
        letter-spacing: 2px;
      }
      .code-copy {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: right;
        margin: 10px 0;
      }
      .code {
        font-size: 13px;
        background: #3ebfbf;
        border: 0.4mm dashed rgb(17,107,143);
        letter-spacing: 1px;
        padding: 0 10px;
      }
      .icon {
        font-size: 20px;
        cursor: pointer;
      }
      .bottom {
        flex-basis: 40%;
        width: 100%;
        height: 100%;
        padding: 0 20px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .left {
        font-size: 8px;
      }
      .right {
        font-family: "Libre Barcode 128";
        font-size: 55px;
        height: 35px;
      }
      .coupon:hover {
        transform: rotateY(180deg);
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

    <div class="center">
      <div class="align">
        <div class="coupon">
          <div class="front"><span>₹449 Off</span></div>
          <div class="back">
            <div class="top">
              <div class="title">Get 449Rs Off</div>
              <div class="subtitle">On your first purchase</div>
              <div class="code-copy">
                <span class="material-icons-round icon">content_copy</span>
                <span class="code">APPARELGETMORE</span>
              </div>
            </div>
            <div class="bottom">
              <div class="left">
                This coupon can be used only once, when it's your first order.
                Terms and Conditions apply
              </div>
              <div class="right">Barcode</div>
            </div>
          </div>
        </div>
        <div class="coupon">
          <div class="front"><span>₹300 Off</span></div>
          <div class="back">
            <div class="top">
              <div class="title">Get 300Rs Off</div>
              <div class="subtitle">Rs. 300 off on minimum purchase of Rs. 1599</div>
              <div class="code-copy">
                <span class="material-icons-round icon">content_copy</span>
                <span class="code">LOUNGEGETMORE</span>
              </div>
            </div>
            <div class="bottom">
              <div class="left">
                This coupon can be used only once, with purchase above 1599Rs only.
                Terms and Conditions apply
              </div>
              <div class="right">Barcode</div>
            </div>
          </div>
        </div>
        <div class="coupon">
          <div class="front"><span>40% Off</span></div>
          <div class="back">
            <div class="top">
              <div class="title">Get 40% Off</div>
              <div class="subtitle">On minimum purchase of Rs. 0</div>
              <div class="code-copy">
                <span class="material-icons-round icon">content_copy</span>
                <span class="code">SAVEMOREUNIQUE</span>
              </div>
            </div>
            <div class="bottom">
              <div class="left">
                This coupon can be used only once, with purchase above 0Rs only.
                Terms and Conditions apply
              </div>
              <div class="right">Barcode</div>
            </div>
          </div>
        </div>
        <div class="coupon">
          <div class="front"><span>₹49 Off</span></div>
          <div class="back">
            <div class="top">
              <div class="title">Get 49Rs Off</div>
              <div class="subtitle">On minimum purchase of Rs. 499</div>
              <div class="code-copy">
                <span class="material-icons-round icon">content_copy</span>
                <span class="code">HOMEGETMORE</span>
              </div>
            </div>
            <div class="bottom">
              <div class="left">
                This coupon can be used only once, with purchase above 499Rs only.
                Terms and Conditions apply
              </div>
              <div class="right">Barcode</div>
            </div>
          </div>
        </div>
      </div>
      <div class="align">
        <div class="coupon">
          <div class="front"><span>48% Off</span></div>
          <div class="back">
            <div class="top">
              <div class="title">Get 48% Off</div>
              <div class="subtitle">On minimum purchase of Rs. 0</div>
              <div class="code-copy">
                <span class="material-icons-round icon">content_copy</span>
                <span class="code">TIMEPIECE48</span>
              </div>
            </div>
            <div class="bottom">
              <div class="left">
                This coupon can be used only once, with purchase above 0Rs only.
                Terms and Conditions apply
              </div>
              <div class="right">Barcode</div>
            </div>
          </div>
        </div>
        <div class="coupon">
          <div class="front"><span>₹399 Off</span></div>
          <div class="back">
            <div class="top">
              <div class="title">Get 399Rs Off</div>
              <div class="subtitle">On minimum purchase of Rs. 1,899</div>
              <div class="code-copy">
                <span class="material-icons-round icon">content_copy</span>
                <span class="code">POWERPLAY399</span>
              </div>
            </div>
            <div class="bottom">
              <div class="left">
                This coupon can be used only once, with purchase above 1899Rs only.
                Terms and Conditions apply
              </div>
              <div class="right">Barcode</div>
            </div>
          </div>
        </div>
        <div class="coupon">
          <div class="front"><span>25% Off</span></div>
          <div class="back">
            <div class="top">
              <div class="title">Get 25% Off</div>
              <div class="subtitle">On minimum purchase of Rs. 799</div>
              <div class="code-copy">
                <span class="material-icons-round icon">content_copy</span>
                <span class="code">SUGAROFF</span>
              </div>
            </div>
            <div class="bottom">
              <div class="left">
                This coupon can be used only once, with purchase above 799Rs only.
                Terms and Conditions apply
              </div>
              <div class="right">Barcode</div>
            </div>
          </div>
        </div>
        <div class="coupon">
          <div class="front"><span>₹499 Off</span></div>
          <div class="back">
            <div class="top">
              <div class="title">Get 499 Off</div>
              <div class="subtitle">Only on gadgets</div>
              <div class="code-copy">
                <span class="material-icons-round icon">content_copy</span>
                <span class="code">WEARABLES499</span>
              </div>
            </div>
            <div class="bottom">
              <div class="left">
                This coupon can be used only once, when you purchase gadgets only.
                Terms and Conditions apply
              </div>
              <div class="right">Barcode</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>
    
  </body>
</html>