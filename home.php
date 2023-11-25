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
    <title>Fashion Urself</title>
    <link rel="stylesheet" href="file:///E:/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- == google font == -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
    <link rel="stylesheet" href="styling/slidebar.css">
    <link rel="stylesheet" href="styling/nav.css">
    <style>
      .gifts-container{
        display:flex;
        flex: column;
      }
      .shop-category-container{
          background-color:rgb(151, 150, 150);
      }
      .set-container{
          display:flex;
          flex:column;
          align-items: center;
          justify-content: center;
      }
      .inside-category{
          background-color: white;
          padding-top:10px;
          padding-left:30px;
          padding-right:30px;
          padding-bottom:10px;
          margin:5px;
          margin-top:20px;
          margin-right:20px;
          transition: transform 1.5s;
      }
      .inside-category:hover{
          transform: scale(0.9);
      }
      .see_more{
          text-decoration-line: none;
          color:#007185;
          
      }
      #submenu{
          left:0;
          right:0;
          position:absolute;
          top:35px;
          visibility:hidden;
          z-index:1;
      }
      #submenu li{
        float:none;
        width:100%; 
      }

      #submenu a:hover{
          background:#fff;
      }


      li:hover ul#submenu{
          opacity:1;
          top:80px;
          visibility:visible;
      }

      .men-indianware a{
          text-decoration: none;
      }


      .err{
          color:rgb(206, 110, 110);
          font-size: 9px;
          line-height: 1px;
      }
      .suggestions{
        display:flex;
        flex: column;
        background-color: #e0ffff ;
        border-radius: 5px;
        border: 1px solid #83c6d2;
      }
      .suggestions_container{
        width: 200px;
        height:330px;
        padding:5px;
        margin:8px ;
        background-color: #fff;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 20px 35px rgba(0,0,0,0.1);
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
        <li><a href="sport_swear.php">Sports Wear</a></li>
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

<div class="slideshow-container">
<div class="mySlides fade">
  <a href="ethnic_wear_men.php">
    <img src="images/slidebar1.jpg" style="width:100%">
  </a>
</div>

<div class="mySlides fade">
  <a href="sarees.php">
    <img src="images/slidebar2.jpg" style="width:100%">
  </a>
</div>

<div class="mySlides fade">
  <a href="gadgets.php">
    <img src="images/slidebar3.jpg" style="width:100%">
  </a>
</div>

<div class="mySlides fade">
  <a href="footwear.php">
    <img src="images/slidebar4.jpg" style="width:100%">
  </a>
  </div>

<div class="mySlides fade">
  <a href="ethnicwear.php">
    <img src="images/slidebar5.jpg" style="width:100%">
  </a>
  </div>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span> 
</div>


<h1 style="font-family:'Poppins','sans-serif';padding-left:20px;">GIFT YOUR FAVOURITE PERSON</h1>
<h3 style="font-family:'Poppins','sans-serif';padding-left:20px;padding-bottom:20px;">With their Favourite Gift</h3>
<div class="gifts-container">
  <a href="ethnic_wear_men.php" style="text-decoration:none;color:black;"> 
    <div class="men-indianware">
      <img src="images/indianwearmen.jpg" height="300px" width="300px">
      <h2 style="font-family:'Poppins','sans-serif';padding-left:20px;color:black">India Ware</h2>
      <h1 style="font-family:'Poppins','sans-serif';padding-left:20px;font-weight:bold;">UPTO 60% OFF</h1>
    </div>
  </a>
    <a href="ethnic_wear_women.php" style="text-decoration:none;color:black;">
      <div class="ethnicware">
        <img src="images/ethinicware.jpg" height="300px" width="300px">
        <h2 style="font-family:'Poppins','sans-serif';padding-left:20px;">Ethnic Ware</h2>
        <h1 style="font-family:'Poppins','sans-serif';padding-left:20px;font-weight:bold;">UPTO 70% OFF</h1>
      </div>
    </a>

  <a href="gadgets.php" style="text-decoration:none;color:black;">
    <div class="watches">
      <img src="images/watch.jpg" height="300px" width="300px">
      <h2 style="font-family:'Poppins','sans-serif';padding-left:20px;">Timeless Watches</h2>
      <h1 style="font-family:'Poppins','sans-serif';padding-left:20px;font-weight:bold;">STARTING ₹999</h1>
    </div>
  </a>
  <a href="handbags.php" style="text-decoration:none;color:black;">
    <div class="shoppingbags">
      <img src="images/handbags.jpg" height="300px" width="300px">
      <h2 style="font-family:'Poppins','sans-serif';padding-left:20px;">Prettiest<br>Hand Bags</h2>
      <h1 style="font-family:'Poppins','sans-serif';padding-left:20px;font-weight:bold;">UPTO 50% OFF</h1>
    </div>
    </a>
    <a href="beautify.php" style="text-decoration:none;color:black;">
    <div class="makeup">
      <img src="images/makeup.jpg" height="300px" width="300px">
      <h2 style="font-family:'Poppins','sans-serif';padding-left:20px;">Make Up<br>Must-Haves</h2>
      <h1 style="font-family:'Poppins','sans-serif';padding-left:20px;font-weight:bold;">UPTO 40% OFF</h1>
    </div>
  </a>
</div>


<!--Below container is used for suggestions-->

<?php if ($showLogout): 
  $servername = "localhost:3306";
  $username = "root";
  $password = "charan@462";
  $dbname = "EcommerceWebsite";
  
  // Create a database connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  // Check the connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT * FROM searches WHERE userName='$userName' ORDER BY createdAt DESC LIMIT 7;";
  $all_product = $conn->query($sql);
  if(mysqli_num_rows($all_product) > 0){?>
    <h1>Suggestions</h1>
    <div class="suggestions">
      <?php
      while($row = mysqli_fetch_assoc($all_product)){

      ?>
          <a href="<?php echo $row["categoryFileLink"]; ?>" style="text-decoration:none;color:black;">
            <div class="suggestions_container">
              <h4>Keep Shopping</br><?php echo $row["categoryName"]; ?></h4>  
              <img src="<?php echo $row["categoryImage"]; ?>" style="height:270px;width:100%;border-radius:10px;">  
            </div>
      <?php
        } 
    }
    ?>
    </div>
  <?php endif; ?>

<h1 style="font-family:'Poppins','sans-serif';padding-left:20px;padding-bottom:20px;">SHOP BY CATEGORY</h1>


<div class="shop-category-container">
  <div class="set-container">
    <a href="ethnic_wear_men.php" style="text-decoration:none;color:black;">
      <div class="inside-category" onmouseenter="change_seemore_color1()" onmouseleave="change_seemore_color2()">
        <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Ethnic Wear</h3>
        <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 50% Off</h2>
        <img src="images/ethnicware1.jpg"  height="350px" width="250px"><br>
        <a class="see_more" style="padding:10px;"  id="see_more_anchor1" href="ethnic_wear_men.php">See More</a>
      </div>
    </a>
    <a href="active_wear_men.php" style="text-decoration:none;color:black;">
      <div class="inside-category" onmouseenter="change_seemore_color3()" onmouseleave="change_seemore_color4()">
        <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Active Wear</h3>
        <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 30% Off</h2>
        <img src="images/activeware1.jpg"  height="350px" width="250px"><br>
        <a class="see_more" style="padding:10px;" id="see_more_anchor2" href="active_wear_men.php">See More</a>
      </div>
    </a>
    <a href="casuals_men.php" style="text-decoration:none;color:black;">
      <div class="inside-category" onmouseenter="change_seemore_color5()" onmouseleave="change_seemore_color6()">
        <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Casual Wear</h3>
        <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 20% Off</h2>
        <img src="images/t-shirt1.jpg"  height="350px" width="250px"><br>
        <a class="see_more" style="padding:10px;"  id="see_more_anchor3" href="casuals_men.php">See More</a>
      </div>
    </a> 
    <a href="ethnic_wear_women.php" style="text-decoration:none;color:black;">
      <div class="inside-category" onmouseenter="change_seemore_color7()" onmouseleave="change_seemore_color8()">
        <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Western Wear</h3>
        <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 40% Off</h2>
        <img src="images/westernwear1.jpg"  height="350px" width="250px"><br>
        <a class="see_more" style="padding:10px;"  id="see_more_anchor4" href="ethnicwear.php">See More</a>
      </div>
    </a>
  </div>

<div class="set-container">

  <a href="sports_wear.php" style="text-decoration:none;color:black;">
    
      <div class="inside-category" onmouseenter="change_seemore_color9()" onmouseleave="change_seemore_color10()">
        <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Sports Wear</h3>
        <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 10% Off</h2>
        <img src="images/sportswear1.jpg"  height="350px" width="250px"><br>
        <a class="see_more" style="padding:10px;"  id="see_more_anchor5" href="sportswear.php">See More</a>
      </div>
  </a>
  
  <a href="ethnic_wear_men.php" style="text-decoration:none;color:black;">
    <div class="inside-category" onmouseenter="change_seemore_color11()" onmouseleave="change_seemore_color12()">
      <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Traditional Wear</h3>
      <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 30% Off</h2>
      <img src="images/traditional_wear.png"  height="350px" width="250px"><br>
      <a class="see_more" style="padding:10px;"  id="see_more_anchor6" href="ethnic_wear_men.php">See More</a>
    </div>
  </a>

      

      <a href="night_wear.php" style="text-decoration:none;color:black;">
        <div class="inside-category" onmouseenter="change_seemore_color13()" onmouseleave="change_seemore_color14()">
          <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Night Wear</h3>
          <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 20% Off</h2>
          <img src="images/innerwear1.jpg"  height="350px" width="250px"><br>
          <a class="see_more" style="padding:10px;"  id="see_more_anchor7" href="nightwear.php">See More</a>
        </div>
      </a>
      
      <a href="kids_clothing_sets.php" style="text-decoration:none;color:black;">
        <div class="inside-category" onmouseenter="change_seemore_color15()" onmouseleave="change_seemore_color16()">
          <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Kids Wear</h3>
          <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 40% Off</h2>
          <img src="images/kidswear1.jpg"  height="350px" width="250px"><br>
          <a class="see_more" style="padding:10px;"  id="see_more_anchor8" href="kids_clothingsets.php">See More</a>
        </div>
      </a>
      
  </div>

  <div class="set-container">

  <a href="foot_wear.php" style="text-decoration:none;color:black;">
    
      <div class="inside-category" onmouseenter="change_seemore_color17()" onmouseleave="change_seemore_color18()">
        <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Foot Wear</h3>
        <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 60% Off</h2>
        <img src="images/footwear1.jpg"  height="350px" width="250px"><br>
        <a class="see_more" style="padding:10px;"  id="see_more_anchor9"href="footwear.php">See More</a>
      </div>
  </a>

  <a href="grooming.php" style="text-decoration:none;color:black;">
    <div class="inside-category" onmouseenter="change_seemore_color19()" onmouseleave="change_seemore_color20()">
      <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Grooming</h3>
      <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 15% Off</h2>
      <img src="images/groomingimage.jpg"  height="350px" width="250px"><br>
      <a class="see_more" style="padding:10px;"  id="see_more_anchor10"href="grooming.php">See More</a>
    </div>

  </a>  
    

  <a href="eye_wear.php" style="text-decoration:none;color:black;">
    <div class="inside-category" onmouseenter="change_seemore_color21()" onmouseleave="change_seemore_color22()">
      <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Eye Wear</h3>
      <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 20% Off</h2>
      <img src="images/eyewear1.jpg"  height="350px" width="250px"><br>
      <a class="see_more" style="padding:10px;" id="see_more_anchor11" href="eyewear.php">See More</a>
    </div>

  </a>
  <a href="gadgets.php" style="text-decoration:none;color:black;"> 
    <div class="inside-category" onmouseenter="change_seemore_color23()" onmouseleave="change_seemore_color24()">
      <h3 style="font-family:'Poppins','sans-serif';padding: 5px;justify-content:center;">Headphones And Speakers</h3>
      <h2 style="font-family:'Times New Roman', Times, serif;padding:5px;">Flat 70% Off</h2>
      <img src="images/headphones.jpg"  height="350px" width="250px"><br>
      <a class="see_more" style="padding:10px;" id="see_more_anchor12"  href="gadgets.php">See More</a>
    </div>
  </a> 
</div>
</div>


<?php include 'footer.php'; ?>


<script src="slidebar.js">
</script>




</body>
</html>