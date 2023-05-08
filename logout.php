<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['fullname']);
unset($_SESSION['email']);
unset($_SESSION['is_block']);
unset($_SESSION['permision']);
header('location: dang-nhap.php');
?>