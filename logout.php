<?php
require 'config.php';
require 'config/function.php';

// Start session

// Check if the session variable is set and not null
if(isset($_SESSION['loggedIn'])) {
    logoutSession();
    redirect('../index.php', 'Successfully logged out'); // Assuming 'redirect' is defined in function.php
} else {
    // Handle the case when $_SESSION['loggedIn'] is not set
    echo "Session variable 'loggedIn' is not set.";
}

?>
