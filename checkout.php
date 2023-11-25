<?php
require_once 'connection.php';
$userName=$_SESSION['userName'];
$sql="SELECT * FROM USERS where userName='$userName';";
$all_product = $conn->query($sql);
$row = mysqli_fetch_assoc($all_product);

$sql1 = "SELECT * FROM cart WHERE userName=?";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("s", $userName);
$stmt->execute();
$all_product1 = $stmt->get_result();
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="images/logoo1.jpg" height="50px" width="50px"/>
    <title>Check Out</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling/nav.css">
    <link rel="stylesheet" href="styling/checkout.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- == google font == -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
    <link rel="stylesheet" href="styling/bag.css">
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
          <li><a href="kids_clothingsets.php">Clothing Sets</a></li>
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
    <?php if (!$showLogout): ?>
        <li><a href="bag.php"><i class="fa-solid fa-bag-shopping" style="color:whitesmoke;padding-right:5px;"></i>Bag</a></li>
    <?php endif; ?>
    </ul>
  </div>
</nav>

<div class="project">

    <div class="shop">
        <?php
        while($row1 = mysqli_fetch_assoc($all_product1)){

        ?>
            <div class="box">
                <img src="<?php echo $row1["productImage"]; ?>">
                <div class="content">
                    <h3><?php echo $row1["productName"]; ?></h3>
                    <h4>Price: ₹<?php echo $row1["productPrice"]; ?></h4>
                    <p class="unit">Quantity: <input name="" value="<?php echo $row1["productCount"]; ?>"></p>
                </div>
            </div> 
            <?php 
        }
        ?> 
    </div>
</div>
<div class="container">

    <form action="checkoutBg.php" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">Billing Address</h3>

                <div class="inputBox">
                    <span>Full Name :</span>
                    <input type="text" name="checkoutUserName" placeholder="<?php echo $row["userName"]; ?>">
                </div>
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" name="checkoutUserMail" placeholder="<?php echo $row["eMail"]; ?>">
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <input type="text" name="checkoutUserAddress" placeholder="Door No - street - locality" required>
                </div>
                <div class="inputBox">
                        <span>State :</span>
                        <select id="state" name="checkoutUserState" required>
                            <option value="" disabled selected>Select an option</option>
                            <option value="AP">Andhra Pradesh</option>
                            <option value="AR">Arunachal Pradesh</option>
                            <option value="AS">Assam</option>
                            <option value="BR">Bihar</option>
                            <option value="CG">Chhattisgarh</option>
                            <option value="GA">Goa</option>
                            <option value="GJ">Gujarat</option>
                            <option value="HR">Haryana</option>
                            <option value="HP">Himachal Pradesh</option>
                            <option value="JH">Jharkhand</option>
                            <option value="KA">Karnataka</option>
                            <option value="KL">Kerala</option>
                            <option value="MP">Madhya Pradesh</option>
                            <option value="MH">Maharashtra</option>
                            <option value="MN">Manipur</option>
                            <option value="ML">Meghalaya</option>
                            <option value="MZ">Mizoram</option>
                            <option value="NL">Nagaland</option>
                            <option value="OR">Odisha</option>
                            <option value="PB">Punjab</option>
                            <option value="RJ">Rajasthan</option>
                            <option value="SK">Sikkim</option>
                            <option value="TN">Tamil Nadu</option>
                            <option value="TG">Telangana</option>
                            <option value="TR">Tripura</option>
                            <option value="UP">Uttar Pradesh</option>
                            <option value="UT">Uttarakhand</option>
                            <option value="WB">West Bengal</option>
                            <option value="AN">Andaman and Nicobar Islands</option>
                            <option value="CH">Chandigarh</option>
                            <option value="DN">Dadra and Nagar Haveli and Daman and Diu</option>
                            <option value="DL">Delhi</option>
                            <option value="JK">Jammu and Kashmir</option>
                            <option value="LA">Ladakh</option>
                            <option value="LD">Lakshadweep</option>
                            <option value="PY">Puducherry</option>
                        </select>
                    </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>City :</span>
                        <select id="city" name="checkoutUserCity" required>
                            <!-- This will initially be empty, and JavaScript will populate it. -->
                            <option value="" disabled selected>Select </option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Pin Code :</span>
                        <input type="text" name="checkoutUserPincode" placeholder="123 456" required>
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">Payment</h3>

                <div class="inputBox">
                    <span>Cards Accepted :</span>
                    <img src="images/checkout_cards.png" alt="">
                </div>
                <div class="inputBox">
                    <span>Name On Card :</span>
                    <input type="text" placeholder="Fashion Urself" required>
                </div>
                <div class="inputBox">
                    <span>Credit Card Number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" required>
                </div>
                <div class="inputBox">
                    <span>Exp Month :</span>
                    <input type="text" placeholder="MM" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Exp Year :</span>
                        <input type="number" placeholder="YYYY" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234" required>
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" name="orderConfirmButton" value="Place Your Order" class="submit-btn">

    </form>

</div>    



<script>
        // JavaScript to populate the city dropdown based on the selected state
        const stateCityMap = {
            "AP": ["Tirupathi", "Visakhapatnam", "Vijayawada", "Guntur"],
            "AR": ["Itanagar", "Naharlagun", "Pasighat"],
            "AS": ["Guwahati", "Dibrugarh", "Silchar", "Jorhat"],
            "BR": ["Patna", "Gaya", "Bhagalpur", "Muzaffarpur"],
            "CG": ["Raipur", "Bhilai", "Bilaspur", "Korba"],
            "GA": ["Panaji", "Margaon", "Vasco Da Gama"],
            "GJ": ["Ahmedabad", "Surat", "Vadodara", "Rajkot"],
            "HR": ["Chandigarh", "Faridabad", "Gurgaon", "Rohtak"],
            "HP": ["Shimla", "Mandi", "Dharamshala", "Solan"],
            "JH": ["Ranchi", "Dhanbad", "Jamshedpur", "Bokaro Steel City"],
            "KA": ["Bangalore", "Mysore", "Hubli", "Mangalore"],
            "KL": ["Thiruvananthapuram", "Kochi", "Kozhikode", "Thrissur"],
            "MP": ["Bhopal", "Indore", "Jabalpur", "Gwalior"],
            "MH": ["Mumbai", "Pune", "Nagpur", "Nashik"],
            "MN": ["Imphal", "Bishnupur", "Thoubal", "Churachandpur"],
            "ML": ["Shillong", "Tura", "Jowai", "Nongpoh"],
            "MZ": ["Aizawl", "Lunglei", "Saiha", "Champhai"],
            "NL": ["Kohima", "Dimapur", "Mokokchung", "Tuensang"],
            "OR": ["Bhubaneswar", "Cuttack", "Rourkela", "Sambalpur"],
            "PB": ["Chandigarh", "Ludhiana", "Amritsar", "Jalandhar"],
            "RJ": ["Jaipur", "Jodhpur", "Udaipur", "Kota"],
            "SK": ["Gangtok", "Namchi", "Mangan", "Singtam"],
            "TN": ["Chennai", "Coimbatore", "Madurai", "Salem"],
            "TG": ["Hyderabad", "Warangal", "Nizamabad", "Karimnagar"],
            "TR": ["Agartala", "Udaipur", "Dharmanagar", "Kailasahar"],
            "UP": ["Lucknow", "Kanpur", "Agra", "Varanasi"],
            "UT": ["Dehradun", "Haridwar", "Rishikesh", "Haldwani"],
            "WB": ["Kolkata", "Asansol", "Siliguri", "Durgapur"],
            "AN": ["Port Blair", "Diglipur", "Mayabunder", "Rangat"],
            "CH": ["Chandigarh", "Panchkula", "Mohali", "Zirakpur"],
            "DN": ["Daman", "Diu", "Dadra", "Silvassa"],
            "DL": ["New Delhi", "Delhi", "Noida", "Gurgaon"],
            "JK": ["Srinagar", "Jammu", "Anantnag", "Udhampur"],
            "LA": ["Leh", "Kargil"],
            "LD": ["Kavaratti", "Agatti", "Amini", "Andrott"],
            "PY": ["Puducherry", "Karaikal", "Mahe", "Yanam"],
        };

        const stateSelect = document.getElementById("state");
        const citySelect = document.getElementById("city");

        // Add an event listener to the state dropdown
        stateSelect.addEventListener("change", function() {
            const selectedState = stateSelect.value;
            const cities = stateCityMap[selectedState] || [];
            
            // Clear the current city options
            citySelect.innerHTML = "";

            // Add the new city options based on the selected state
            cities.forEach(city => {
                const option = document.createElement("option");
                option.value = city;
                option.text = city;
                citySelect.appendChild(option);
            });
        });
    </script>
</body>
</html>