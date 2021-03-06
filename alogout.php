<?php
    session_start();
    include 'conn.php';
    unset($_SESSION['superadmin_username']);
    unset($_SESSION['superadmin_name']);
    session_destroy();
    header("Location:superadmin.php")
?>