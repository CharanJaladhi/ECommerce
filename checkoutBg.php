<?php
session_start();

// Database connection parameters
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

//Here we checking first is user logged in or not 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['userName'])) {
        if (isset($_POST['orderConfirmButton'])){
            $userName = $_SESSION['userName'];
            //query that gets product details form the cart table 
            $sql="SELECT * FROM cart where  userName = '$userName';";
            $all_product = $conn->query($sql);
            //Checking whether user changed his name in checkoutpage
            if (isset($_POST['checkoutUserName'])) { 
                $checkoutUserName = $_POST['checkoutUserName'];
                if(!empty($checkoutUserName)){
                    $updatedCheckoutUserName = $checkoutUserName;
                }
                else{
                    $updatedCheckoutUserName = $_SESSION['userName'];
                }
            }
            //Checking whether user changed his mail in checkoutpage
            if (isset($_POST['checkoutUserMail'])) {
                $checkoutUserMail = $_POST['checkoutUserMail'];
                if(!empty($checkoutUserMail)){
                    $updatedCheckoutUserMail = $checkoutUserMail;
                }
                else{
                    $updatedCheckoutUserMail = $_SESSION['userMail'];
                } 
            }
            $checkoutUserAddress = $_POST['checkoutUserAddress'];
            $checkoutUserState = $_POST['checkoutUserState'];
            $checkoutUserCity = $_POST['checkoutUserCity'];
            $checkoutUserPincode = $_POST['checkoutUserPincode'];
            $flag=0;
            //getting individual product details
            while($row = mysqli_fetch_assoc($all_product)){
                $productImage = $row["productImage"];
                $productName = $row["productName"];
                $productPrice = $row["productPrice"];
                $productCount = $row["productCount"];
                $productId = $row["productId"];
                //inserting into orders table
                $insertSql = "INSERT INTO orders (userName, orderedUserName, orderedMail, orderedAddress, orderedState, orderedCity, orderedPincode, orderedProductPrice, orderedProductCount, orderedProductName, orderedProductImage, orderedProductId)
                        VALUES ('$userName', '$updatedCheckoutUserName', '$updatedCheckoutUserMail', '$checkoutUserAddress', '$checkoutUserState', '$checkoutUserCity', '$checkoutUserPincode', '$productPrice', '$productCount', '$productName', '$productImage', '$productId');";
                $insertResult = mysqli_query($conn,$insertSql);
                //delete from cart table
                $deleteSql = "DELETE FROM cart WHERE productId = '$productId' and userName = '$userName';";
                $deleteResult = mysqli_query($conn,$deleteSql);
                if($insertResult && $deleteResult){
                    $flag=1;
                }
                else{
                    $flag=0;
                    echo "Error: " . $conn->error;
                }
            }
            if( $flag == 1){
                echo '<script type="text/javascript">';
                echo 'window.location.href = "orderConfirmed.html";'; // Redirect to another_page
                echo '</script>';
            }
        }
    }
    mysqli_close($conn);
} ?>