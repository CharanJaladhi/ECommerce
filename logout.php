<?php
session_start();

// Destroy all user-related sessions
session_unset();
session_destroy();
touch('logout_flag.txt');//used to navigate to login page automatically once loggedout in another redirect.php page
// Redirect to the login page
header("Location: login.php");
exit;
?>
