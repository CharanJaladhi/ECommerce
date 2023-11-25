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
//Adds items or remove items to the cart...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['userName'])) {
        if (isset($_POST['addToCart'])) {
            // Your existing code for adding items to the cart here
            $productId = $_POST['productId'];
            $tableName = $_POST['tableName'];
            $userName = $_SESSION['userName'];
            $productPrice = $_POST['productPrice'];
            $productName = $_POST['productName'];
            $productImage = $_POST['productImage'];

            //checking if the product is already present or not
            $sql = "SELECT COUNT(*) as count
            FROM cart
            WHERE userName = '$userName' and productId = '$productId' and productCount >= 1";
            $result = $conn->query($sql);
            // Check if the query was successful
            if ($result) {
                // Fetch the result
                $row = $result->fetch_assoc();
                // Get the count
                $count = $row['count'];
                if ($count >= 1){ //if the product is exists then updating the value
                    $sql = "UPDATE cart
                    SET productCount = productCount + 1
                    WHERE productId = '$productId' AND userName = '$userName'";
                    // Execute the query
                    if ($conn->query($sql) === TRUE) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Item updated in bag!");';
                        echo 'window.history.back();'; // Redirect to previous_page
                        echo '</script>';
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }
                else{
                    // if not product exists then we are newly inserting data into the "cart" table
                    $sql = "INSERT INTO cart (productId, userName, productCount, productPrice, productName, productImage) VALUES ('$productId', '$userName', 1, '$productPrice', '$productName', '$productImage')";
                    if (mysqli_query($conn, $sql)) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Item added to bag!");';
                        echo 'window.history.back();'; // Redirect to previous_page
                        echo '</script>';
                    } else {
                        echo "Error adding record: " . mysqli_error($conn);
                    }
                }
            } else {
                echo "Error: " . $conn->error;
            }
        }

        if (isset($_POST['removeCart'])) {
            // Your existing code for removing items from the cart here
            $productId = $_POST['productId'];
            $userName = $_SESSION['userName'];
            // Construct the SQL DELETE query
            $sql = "DELETE FROM cart WHERE productId = '$productId' and userName = '$userName'";
            // Execute the DELETE query
            if ($conn->query($sql) === TRUE) {
                echo '<script type="text/javascript">';
                echo 'alert("Item deleted from bag!");';
                echo 'window.history.back();'; // Redirect to previous_page
                echo '</script>';
            } else {
                echo "Error deleting row: " . $conn->error;
            }
        }
    } else {
        // User is not logged in, display a message to register or log in
        echo '<script type="text/javascript">';
        echo 'alert("Please register or log in to add items to your cart.");';
        echo 'window.location.href = "login.php";'; // Redirect to your login/registration page
        echo '</script>';
    }
    //Updating the values of Users in edit Profile page
    $flag1 = 0;
    $flag2 = 0;
    $flag3 = 0;
    $userName = $_SESSION['userName'];

    function updateTable($conn, $table, $column, $newValue, $userName) { //FUNCTION-DEFNITION:used to update values in table
        $sql = "UPDATE $table
                SET $column = '$newValue'
                WHERE userName = '$userName'";
        
        if ($conn->query($sql) === TRUE) {
            // Updated successfully
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    if (isset($_POST['myInput1'])) { // Updating the userName
        $updatedUserName = $_POST['myInput1'];
        if (!empty($updatedUserName)) {
            updateTable($conn, "USERS", "userName", $updatedUserName, $userName);
            updateTable($conn, "cart", "userName", $updatedUserName, $userName);
            $flag1 = 1;
            $_SESSION['userName'] = $updatedUserName;
        }
    }

    $userName = $_SESSION['userName'];

    if (isset($_POST['myInput2'])) { // Updating eMail
        $updatedMail = $_POST['myInput2'];
        if (!empty($updatedMail)) {
            updateTable($conn, "USERS", "eMail", $updatedMail, $userName);
            $flag2 = 1;
        }
    }

    if (isset($_POST['myInput3'])) { // Updating userPassword
        $updatedPassword = $_POST['myInput3'];
        if (!empty($updatedPassword)) {
            updateTable($conn, "USERS", "userPassword", $updatedPassword, $userName);
            updateTable($conn, "USERS", "reEnterUserPassword", $updatedPassword, $userName);
            $flag3 = 1;
        }
    }

    if ($flag1 == 1 || $flag2 == 1 || $flag3 == 1) {
        echo '<script type="text/javascript">';
        echo 'alert("Profile Updated!");';
        echo 'window.location.href = "home.php";'; // Redirect to home page
        echo '</script>';
    }
}






?>
