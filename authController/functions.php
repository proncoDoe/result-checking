<?php 
   // check if username already exists
   function exist_username($conn,$username){
    
   $sql = "SELECT `username` FROM `student` WHERE username=:userName LIMIT 1";
   $query = $conn->prepare($sql);
   $query->bindParam(':userName',$username,PDO::PARAM_STR);
   $query->execute();
  
   if($query->rowCount() >= 1){

    $student = $query->fetch(PDO::FETCH_ASSOC);

    $studentName = $student['username'];

    if($username = $studentName){

    return TRUE;
        
    }else{


        return FALSE;
        
    }


} else {

return FALSE;
}
    
   }
   
      // check if username already exists
      function existing_phone_number($conn,$Phone){
    
        $sql = "SELECT `phone_number` FROM `student` WHERE phone_number=:phoneNumber LIMIT 1";
        $query = $conn->prepare($sql);
        $query->bindParam(':phoneNumber',$Phone,PDO::PARAM_STR);
        $query->execute();
       
        if($query->rowCount() >= 1){
     
         $phoneP = $query->fetch(PDO::FETCH_ASSOC);
     
         $studentPhone = $phoneP['phone_number'];
     
         if($Phone = $studentPhone){
     
         return TRUE;
             
         }else{
     
     
             return FALSE;
             
         }
     
     
     } else {
     
     return FALSE;
     }
         
        }


?>