<?php
        include_once 'com/sms/common/request/commonRequestHandler.php';
        if(isset($_SESSION['requestedUserName'])){
           //continue process
             $userName = $_SESSION['requestedUserName'];
             $userTypeId = $_SESSION['requestedUserType'];  
             $txtPassword    = trim($_POST["txtPassword"]);
               if(!empty($txtPassword)){
                $returnVal= resetPassword($userName, $txtPassword, $userTypeId);
                 if($returnVal){
                     $_SESSION['errorMsg']= "Your password is now updated.";
                     echo "success";
                     exit();
                 }else{
                     echo "fail";
                     exit();
                 }
         }else{
             echo "Please fill up all the fields.";
             exit();
         }
      }else{
            //redirect to login page.
            header("Location:login.php");
            exit();        
      }
      
         
        
  ?>
        