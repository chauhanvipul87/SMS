<?php
        include_once 'com/sms/common/request/commonRequestHandler.php';
        $userName      = trim($_POST["txtUserName"]);
        $dob           = trim($_POST["txtDOB"]);
        $phoneNo       = trim($_POST["txtPhoneNo"]);
        $userTypeId    = trim($_POST["userTypeSelect"]);
        
         if(!empty($userName) && !empty($dob) && !empty($phoneNo) &&
                !empty($userTypeId)){
                $returnVal= isUserExistForPasswordReset($userName, $dob, $phoneNo, $userTypeId);
                 if($returnVal){
                     $_SESSION['requestedUserName'] = $userName;
                     $_SESSION['requestedUserType'] = $userTypeId;
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
        
  ?>
        
