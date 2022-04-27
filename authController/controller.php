<?php 

$msg1 = '';  $msg2 = '';  $msg3 = '';  $msg4 = '';  $msg5 = ''; $msg6 = '';  $msg7 = ''; $username = ''; $register_no = '';


if(isset($_POST['Login'])){


    $username = trim($_POST['username']);

    $register_no = trim($_POST['register_no']);

    $Phone = trim($_POST['phone_number']);

    $how_would_like_to_be_contacted = $_POST['how_would_like_to_be_contacted'];

    $checkbox = isset($_POST['checkbox']);

    if(empty($username)){

        $msg1 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
        Username is required.
        </div>";

    }else if(!exist_username($conn,$username)){

        
        $msg1 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
        Username does not Exist.
        </div>";
       
        
    }else if(empty($register_no)){

        $msg2 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
        Registration number is required.
        </div>";
        
        
    }else if(empty($Phone)){

        $msg3 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
        Registration number is required.
        </div>";
        
     }else if(!existing_phone_number($conn, $Phone)){

        $msg3 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
        Phone number does not Exist.
        </div>";
        
    }else if(empty($how_would_like_to_be_contacted)){

        $msg4 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
        Contact address information required.
        </div>";
        
    }else if(empty($checkbox)){

        $msg5 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
       Accept Academy's terms and conditions.
        </div>";
        
    }else{

        // check the student password matching the database

        
        $statement = "SELECT * FROM `student` WHERE username = :userName";

        $query = $conn->prepare($statement);
        $query->bindParam(':userName',$username,PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() >= 1){

            $result = $query->fetch(PDO::FETCH_ASSOC);

            $dbregno = $result['register_no'];
            $dbusername = $result['username'];
            $dbPhone = $result['phone_number'];
            $dbhow_would_like_to_be_contacted = $result['how_would_like_to_be_contacted'];

            if($dbusername == $username  && $dbregno == $register_no && $dbPhone == $Phone && $dbhow_would_like_to_be_contacted == $how_would_like_to_be_contacted){

                // generate a pin for the student

                $generate_pin = rand(1000, 99999);


                $sql = "UPDATE student SET exam_pin = :generate_pin WHERE username = :userName ";

                $query = $conn->prepare($sql);
                $query->bindParam(':generate_pin',$generate_pin,PDO::PARAM_STR);
                $query->bindParam(':userName',$username,PDO::PARAM_STR);
                $query->execute();

                if($query){


                    $results=$query->fetchAll(PDO::FETCH_ASSOC);

                    if($results = $username){

                    $_SESSION['student_id'] = $results;
                    $_SESSION['username'] = $results;
                    $_SESSION['register_no'] = $results;
                    $_SESSION['phone_number'] = $results;

                    $msg7 = "<div class='alert' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
                   
                    <span style='color: #4b7f80;'> <img src='img/loader.gif' all=''> </span> 
                    
                    <meta http-equiv='refresh' content='4; proceed.php'>
                    
                    </div>";
                    }
                    
                }else{


                    $msg6 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
                   Error occured, please try again.
                     </div>";
                    
                }


            }else{

                $msg6 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
                Double check your details.
                 </div>";
                
            }
            
        }


    }
    
    
}








?>