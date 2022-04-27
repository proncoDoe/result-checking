<?php 

function user_acessing_wrongentry()
{

global $conn;

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    header('location: index.php');
   

}


}