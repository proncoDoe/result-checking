<?php session_destroy(); ?>
<?php session_start(); ?>
<?php

unset($_SESSION['admin_id']);
unset ($_SESSION['username']);

setcookie("username", " ", time() - 3600);

header('location:admin_login.php');



?>