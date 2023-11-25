<?php
require_once 'connection.php';

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

  


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['filter'])) {
    $filter = $_GET['filter'];
    $table_name = $_GET['file'];
    $sql = "SELECT * FROM $table_name";

    if ($filter == "lowToHigh") {
        $sql .= " ORDER BY productPrice ASC";
    } elseif ($filter == "highToLow") {
        $sql .= " ORDER BY productPrice DESC";
    }

    // Execute the SQL query
    $all_product = $conn->query($sql);
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logoo1.jpg" height="50px" width="50px"/>
    <title><?php echo "$table_name";?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styling/nav.css">
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
          <a  href="#"><i class="fa-solid fa-sort" style="padding-right:5px;"></i>Filter</a>
          <ul>
            <li><a href="filter_products.php?file=<?php echo $table_name; ?>&filter=default"><i class="fa-solid fa-bars" style="padding-right:5px;"></i>Default</a></li>
            <li><a href="filter_products.php?file=<?php echo $table_name; ?>&filter=lowToHigh"><i class="fa-solid fa-arrow-down-short-wide" style="padding-right:5px;"></i>Low to High</a></li>
            <li><a href="filter_products.php?file=<?php echo $table_name; ?>&filter=highToLow"><i class="fa-solid fa-arrow-down-wide-short" style="padding-right:5px;"></i>High to Low</a></li>
          </ul>
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

<?php include 'product.php'; ?>


<?php include 'footer.php'; ?>
    
     
</body>
</html>