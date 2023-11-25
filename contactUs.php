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

    // Include PHPMailer library
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $userEmail = $_POST['mail'];
        $username = $_POST['username'];
        $mssg = $_POST['message'];

        // Create and send an email with the Problem details
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'fashionurself10@gmail.com';
        $mail->Password = 'dvjyofifykcgzysc'; // Use the App Password here
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($userEmail, $username);
        $mail->addAddress('fashionurself10@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Problem from ' . $username;
        $email_template = '
            <h2>Hey Developer</h2>
            </br>
            <h3>This is his/her message <br>' . $mssg . '</h3>';

        $mail->Body = $email_template;
        if (!$mail->send()) {
          echo '<script type="text/javascript">';
          echo 'alert("Email could not be sent. Please try again later.");'; 
          echo '</script>';
          // echo "Email could not be sent. Please try again later. Error: " . $mail->ErrorInfo;
      } else{
        echo '<script type="text/javascript">';
          echo 'alert("Mail sent!");'; 
          echo '</script>';
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logoo1.jpg" height="50px" width="50px"/>
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- == google font == -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- == css == -->
    <link rel="stylesheet" href="styling/nav.css">
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:"Poppins",sans-serif;
        }

        body{
            background-color:white;
            background-size: 100% 100%;
        }
        .wrapper{
            width:330px;
            padding:2rem 1rem;
            margin:80px auto;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 20px 35px rgba(0,0,0,0.1);
            background-image: url('images/contactbg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 450px; /* Set the height of the container to the full viewport height */
            color: #ffffff; /* Set text color to be visible against the background */
        }
        form{
            position:relative;
        }
        form input{
            width: 97%;
            padding: 10px;
            border: 1px solid white;
            border-radius: 5px;
            outline: none;
            font-size: 1rem;
            transition: 0.6s;
            margin-bottom: 10px;
            background:transparent;
        }
        form textarea {
            width: 97%;
            height: 95px;
            padding: 8px;
            border: 1px solid white;
            border-radius: 5px;
            outline: none;
            font-size: 1rem;
            transition: 0.6s;
            margin-bottom: 10px;
            background:transparent;
            }

        form span{
            position: absolute;
            left: 0;
            padding: 10px;
            font-size: 1rem;
            color: #7f8fa6;
            pointer-events: none;
            transition: 0.6s;
        }
        form .name-span,
        form .email-span,form .textarea-span {
            position: absolute;
            left: 0;
            padding: 10px;
            font-size: 1rem;
            color: #7f8fa6;
            pointer-events: none;
            transition: 0.6s;
        }

        input[name="username"]:valid ~ .name-span,
        input[name="username"]:focus ~ .name-span {
            color: #07001f;
            transform: translateX(10px) translateY(-7px);
            font-size: 0.65rem;
            font-weight: 600;
            padding: 0 10px;
            background: #fff;
            letter-spacing: 0.1rem;
        }

        input[name="mail"]:valid ~ .email-span,
        input[name="mail"]:focus ~ .email-span {
            color: #07001f;
            transform: translateX(10px) translateY(-7px);
            font-size: 0.65rem;
            font-weight: 600;
            padding: 0 10px;
            background: #fff;
            letter-spacing: 0.1rem;
        }

        textarea[name="message"]:valid ~ .textarea-span,
        textarea[name="message"]:focus ~ .textarea-span {
            color: #07001f;
            transform: translateX(10px) translateY(-7px);
            font-size: 0.65rem;
            font-weight: 600;
            padding: 0 10px;
            background: #fff;
            letter-spacing: 0.1rem;
        }

        textarea:valid,
        textarea:focus {
            color: white;
            font-weight: 400;
            border: 2px solid white;
            background:transparent;
        }


        input:valid,
        input:focus{
            color: white;
            font-weight:400px;
            border: 2px solid white;
            background:transparent;
        }

        h1{
            font-size: 2rem;
            font-weight:bold;
            color:white;
            margin-bottom: 1.2rem;
        }
        
        button{
            font-size: 1rem;
            margin-top: 1.8rem;
            padding:10px 0;
            border-radius: 10px;
            outline:none;
            border:none;
            width:90%;
            cursor:pointer;
            background: #38d6bc;
            color:white;
        }
        button:hover{
            background: white;
            color: #38d6bc;
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
    <div class="wrapper">
        <h1>Contact Us</h1>
        <form action="contactUs.php" method="post">
            <input type="text" name="username" required>
            <span class="name-span">Name</span>
            <input type="email" name="mail" required>
            <span class="email-span">EMail</span>
            <textarea name="message" cols="30" rows="5" required></textarea>
            <span class="textarea-span">Enter Message</span>
        <button>Send Message</button>
    </div>

</body>
</html>