<?php require 'controller/db.php' ?>

<?php

$string_to_encrypt = mt_rand(11111, 99999).mt_rand(00000, 99999);
$date = date("s");
$pin =  $string_to_encrypt.$date;
$encrypted_string =  $pin;
$status='New';
$created_at = date('F, d y h:i:s');
$stmt = $conn->prepare("INSERT INTO `result_pin`(pin, status,created_at) VALUES(?, ?,?)");
$stmt->execute([$encrypted_string,$status,$created_at]);

// echo $encrypted_string."<br>";
echo $encrypted_string;


?>