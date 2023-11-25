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
  
    
  

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query=$_GET['query'];
    if (isset($query)) {
      $sql="SELECT 'kids_t_shirts' AS source_table, kids_t_shirts.*
            FROM kids_t_shirts
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'sarees' AS source_table, sarees.*
            FROM sarees
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'sports_wear' AS source_table, sports_wear.*
            FROM sports_wear
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'night_wear' AS source_table, night_wear.*
            FROM night_wear
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'men_t_shirts' AS source_table, men_t_shirts.*
            FROM men_t_shirts
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'kids_ethnic_wear' AS source_table, kids_ethnic_wear.*
            FROM kids_ethnic_wear
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'kids_clothing_sets' AS source_table, kids_clothing_sets.*
            FROM kids_clothing_sets
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'grooming' AS source_table, grooming.*
            FROM grooming
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'foot_wear' AS source_table, foot_wear.*
            FROM foot_wear
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'eye_wear' AS source_table, eye_wear.*
            FROM eye_wear
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'ethnic_wear_women' AS source_table, ethnic_wear_women.*
            FROM ethnic_wear_women
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'ethnic_wear_men' AS source_table, ethnic_wear_men.*
            FROM ethnic_wear_men
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'casuals_men' AS source_table, casuals_men.*
            FROM casuals_men
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'active_wear_men' AS source_table, active_wear_men.*
            FROM active_wear_men
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'gadgets' AS source_table, gadgets.*
            FROM gadgets
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'handbags' AS source_table, handbags.*
            FROM handbags
            WHERE productDescription LIKE '%$query%'
            UNION ALL
            SELECT 'beautify' AS source_table, beautify.*
            FROM beautify
            WHERE productDescription LIKE '%$query%';";
    }
    $all_product = $conn->query($sql);
    $numRows = mysqli_num_rows($all_product);

  if($showLogout && $numRows > 0){
      $userName=$_SESSION['userName'];
      // Step 1: Insert the search query
      $sqlInsertSearch = "INSERT INTO searches (userName, searchQuery) VALUES ('$userName', '$query');";

      // Execute the SQL query to insert the search record
      $resultInsertSearch = $conn->query($sqlInsertSearch);

      // Check for errors in the insertion
      if (!$resultInsertSearch) {
          die("Error inserting search: " . $conn->error);
      }

      // Get the search ID
      $searchId = $conn->insert_id;

      // Step 2: Determine the category information (you need to implement this function)
      // Your determineCategoryInfo function might look something like this
      function determineCategoryInfo($conn, $query) {
        // Sanitize the input to prevent SQL injection
        $sanitizedSearchQuery = $conn->real_escape_string($query);
    
        // Query to get all categories
        $sql = "SELECT categoryId, categoryName, categoryImage, categoryProducts, categoryFileLink FROM category";
    
        // Execute the SQL query
        $result = $conn->query($sql);
    
        // Check if a result is found
        if ($result && $result->num_rows > 0) {
            $bestMatch = null;
            $minDistance = PHP_INT_MAX;
    
            while ($row = $result->fetch_assoc()) {
                // Iterate through each category's products and find the minimum Levenshtein distance
                $productsArray = json_decode($row['categoryProducts'], true);
                foreach ($productsArray as $product) {
                    $distance = levenshtein($sanitizedSearchQuery, $product);
                    if ($distance < $minDistance) {
                        $minDistance = $distance;
                        $bestMatch = $row;
                    }
                }
            }
    
            // Return the best-matching row
            return $bestMatch;
        }
    
        // If no match is found, you may return default values or handle it as needed
        // For example, you can return an array with default values or handle it as an error.
        return array('categoryId' => 0, 'categoryName' => 'Default Category', 'categoryImage' => 'null', 'categoryFileLink' => 'null');
    }

      $categoryInfo = determineCategoryInfo($conn, $query);
      //checking whether the item is already present in searches table or not
      $sql = "SELECT categoryName from searches where categoryName = '{$categoryInfo['categoryName']}' and userName = '$userName';";
      $category = $conn->query($sql);
      $numRows1 = mysqli_num_rows($category);
      if($numRows1 == 0){
        // Step 3: Update the search record with the category information
        $sqlUpdateCategory = "UPDATE searches SET categoryId = '{$categoryInfo['categoryId']}', categoryName = '{$categoryInfo['categoryName']}', categoryImage = '{$categoryInfo['categoryImage']}', categoryFileLink = '{$categoryInfo['categoryFileLink']}' WHERE searchId = '$searchId';";

        // Execute the SQL query to update the search record with the category information
        $resultUpdateCategory = $conn->query($sqlUpdateCategory);

        // Check for errors in the update
        if (!$resultUpdateCategory) {
            die("Error updating category information: " . $conn->error);
        }
      }else{
        //retrieving last inserted record to delete becoz it is already present
        $sqlRetrieve = "SELECT *FROM searches ORDER BY createdAt DESC LIMIT 1;";
        $resultRetrieve = mysqli_query($conn, $sqlRetrieve);
        // Check for errors in the insertion
        if ($resultRetrieve) {
          if (mysqli_num_rows($resultRetrieve) == 1) {//if the result is true
            $row = mysqli_fetch_assoc($resultRetrieve);//getting the details of the column time of specified row
            $time = $row['createdAt'];
            $sqlDelete = "DELETE FROM searches WHERE createdAt = '$time';";//deleting it
            $resultDelete = $conn->query($sqlDelete);
            if(!$resultDelete){
              die("Error inserting search: " . $conn->error);
            }
          }
        }
        else{
          die("Error inserting search: " . $conn->error);
        }
      }
    }
  }
        
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logoo1.jpg" height="50px" width="50px"/>
    <title> Search </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styling/menwear.css">
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
  
  <div class="gallery">
    <?php
    if($numRows > 0){
    while($row = mysqli_fetch_assoc($all_product)){

    ?>
        <div class="content">
            <img src="<?php echo $row["productImage"]; ?>">
            <h3><?php echo $row["productName"]; ?></h3>
            <p><?php echo $row["productDescription"]; ?></p>
            <h6>₹<?php echo $row["productPrice"]; ?></h6>
            <ul>
                <li><i class="fa fa-star checked"></i></li>
                <li><i class="fa fa-star checked"></i></li>
                <li><i class="fa fa-star checked"></i></li>
                <li><i class="fa fa-star checked"></i></li>
                <li><i class="fa fa-star "></i></li>
            </ul>
            <form action="connection.php" method="post">
                <input type="hidden" name="productId" value="<?php echo $row["productId"]; ?>">
                <input type="hidden" name="tableName" value="source_table">
                <input type="hidden" name="productPrice" value="<?php echo $row["productPrice"]; ?>">
                <input type="hidden" name="productName" value="<?php echo $row["productName"]; ?>">
                <input type="hidden" name="productImage" value="<?php echo $row["productImage"]; ?>">
                <button  name="addToCart" style="background:<?php echo $row["productButtonColor"]; ?>">Add To Cart</button>
            </form>
        </div>
    
    <?php 
    }
    }else{
      echo "<h1 style='text-align:center;'>There are no items found related to $query.</h1>";
    }
    mysqli_close($conn);
    ?>
    </div>


    <?php include 'footer.php'; ?>
</body>
</html>