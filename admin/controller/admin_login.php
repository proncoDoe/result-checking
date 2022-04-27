<?php

$msg1 = '';  $msg2 = '';  
//$msg3 = '';//
 $msg7 = '';

    if(isset($_POST['Login']))
    {
    $uname=$_POST['username'];
    // $password=md5($_POST['password']);
    
    $password=$_POST['password'];

    $checkbox = isset($_POST['remember']);

if(empty($uname)){

        $msg1 = "<div class='text text-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
        Username is required.
        </div>";

    }
 
    else if(empty(trim($password))){


        $msg2 = "<div class='alert text-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
        Password is required.
        </div>";

    }else{



        $sql ="SELECT username,password FROM admin WHERE username=:uname and password=:pass";
        $query= $conn -> prepare($sql);
        $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
        $query-> bindParam(':pass', $password, PDO::PARAM_STR);
        $query-> execute();
      
        if($query->rowCount() >= 1)
        {
    
            $results=$query->fetchAll(PDO::FETCH_ASSOC);
    
            if($results = $uname){
    
                // $results = $conn ->lastInsertId();
                $_SESSION['admin_id'] = $results;
                $_SESSION['username'] = $results;
                $_SESSION['roll'] = $results;
    
                if($checkbox ==  "on"){
     
                    setcookie("username",$username,time()+3600);
            
                   }
            
                   $msg7 = "<div class='alert' style='width: 320px; height: 30px; padding-bottom: 10rem; margin-bottom: 6px;'>
                   
                    <span style='color: #4b7f80;'> <img src='img/loading.gif' all=''> </span> 
                    
                    <meta http-equiv='refresh' content='4; dashboard.php'>
                    
                    </div>";
                    
                // echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                
            }
    
    
        } 
        
        // else{
        
        //     echo "<script>alert('Invalid Details');</script>";
        
        // }

    }

    // if($uname || $password){

    //     $msg3 = "<div class='text text-danger' style='width: 351px; height: auto; padding-top: 0.5rem; margin-top: 6px;'>
    //     Admin username! or password is required.
    //     </div>";


    // }
    
    }


  
    
    ?>