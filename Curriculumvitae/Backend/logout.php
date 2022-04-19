<?php
session_start();
session_destroy();
header('location: /Curriculumvitae/backend/login.php');
?>