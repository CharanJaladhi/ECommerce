<?php
  require_once 'connection.php';

  $sql="SELECT * FROM night_wear;";
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
  
    

  $currentFile = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME); // Get the current file name without extension
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logoo1.jpg" height="50px" width="50px"/>
    <title>Night Wear</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- == google font == -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
</head>
<body>

<?php include 'nav.php'; ?>
<?php include 'product.php'; ?>


<?php include 'footer.php'; ?>
</body>
</html>