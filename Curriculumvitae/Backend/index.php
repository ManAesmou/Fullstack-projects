<?php
require_once 'includes/header.php';
?>

<?php
    if (isset($_SESSION['userId'])) {
        echo "You are logged in!";
    } else {
        echo "Access denied";
    }

?>