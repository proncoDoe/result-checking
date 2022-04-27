<?php


     
$statement = 'SELECT * FROM `regno_abbr`';

$stmt = $conn->prepare($statement);
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    $reg_id  = $row['reg_id'];
    $regNumber = $row['regNumber'];    
    


   $letter = $regNumber;
  $rannumber=mt_rand(11111, 99999);
  $date = date("s");

  $res = $letter.$rannumber.$date;

   $_SESSION['randomnumber']=$res;

}



// card serial number



$rannumber=mt_rand(11100, 99999);
$date = date("s");

$res = $rannumber.$date;

 $_SESSION['cardNumber']=$res;

   ?>