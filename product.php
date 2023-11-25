<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styling/menwear.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- == google font == -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
</head>
<body>
<div class="gallery">
    <?php
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
                <input type="hidden" name="tableName" value="kids_t_shirts">
                <input type="hidden" name="productPrice" value="<?php echo $row["productPrice"]; ?>">
                <input type="hidden" name="productName" value="<?php echo $row["productName"]; ?>">
                <input type="hidden" name="productImage" value="<?php echo $row["productImage"]; ?>">
                <button  name="addToCart" style="background:<?php echo $row["productButtonColor"]; ?>">Add To Cart</button>
            </form>
        </div>
    
    <?php 
    }
    ?>
    </div>
</body>
</html>