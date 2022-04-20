<?php
require_once 'includes/header.php';

    if (isset($_SESSION['userID'])) {
        echo '<div class="alert alert-success d-flex align-items-center col-md-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>You are logged in!</div>
            </div>';
    } else {
        echo "Access denied";
    }

?>