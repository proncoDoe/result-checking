<?php session_destroy(); ?>
<?php session_start(); ?>
<?php

unset($_SESSION['student_id']);
unset ($_SESSION['username']);

// setcookie("username", " ", time() - 3600);

header('location:index.php');



?>