<?php
	include_once 'com/sms/common/request/commonRequestHandler.php';
        function validateLoginForm($userName,$password,$userTypeId){
		if(!empty($userName) && !empty($password) && !empty($userTypeId)){
                    return 0;
                }else {
                    return 1;
                } 
	}
        
         $username = strtolower($_POST["txtUsername"]);
         $password = $_POST["txtPassword"];
         $userTypeId = $_POST["userTypeSelect"];
         $returnVal= validateLoginForm($username, $password,$userTypeId);
         if($returnVal == 0){
              
               echo 'Admin panel'.$username;
               echo '<br/>Admin panel'.$password;
               echo '<br/>Admin panel'.$userTypeId;
               
             
             $userMapDetails = validatLogin($username, $password, $userTypeId);
            
             if($userMapDetails != null && count($userMapDetails) > 0){
                 
                 $_SESSION['userDisplayName']= $userMapDetails['fname'].' '.$userMapDetails['lname'];
                 
                 //based on request go to approprivate page
                 if($userTypeId ==USERTYPE_ADMIN){
                    // Admin Section.....
                       $_SESSION['sessionUserId']= 
                       $_SESSION['userTypeId']= USERTYPE_ADMIN;
                       header("Location:adminIndex.php");
                }else if ($userTypeId ==USERTYPE_HEAD){
                    // Head sections...
                    $_SESSION['sessionUserId']= $userMapDetails['md_id'];
                    $_SESSION['userTypeId']= USERTYPE_HEAD;
                    $_SESSION['sessionDeptId']= $userMapDetails['dept_id'];;
                    header("Location:headIndex.php");
                    
                }else if ($userTypeId == USERTYPE_FACULTY){
                    //Faculty Sections...
                     $_SESSION['sessionUserId']= $userMapDetails['md_id'];
                     $_SESSION['userTypeId']= USERTYPE_FACULTY;
                     $_SESSION['sessionDeptId']= $userMapDetails['dept_id'];;
                     header("Location:facultyIndex.php");
                }else{
                    //Student Sections...
                     $_SESSION['sessionUserId']= $userMapDetails['md_id'];
                     $_SESSION['userTypeId']= USERTYPE_STUDENT;
                     $_SESSION['sessionDeptId']= $userMapDetails['dept_id'];;
                     header("Location:studentIndex.php");
                       
                  } 
             }else{
                 $_SESSION['errorMsg']= "Please enter valid username & password.";
                 header("Location:login.php");
             }
             
         }else{
            $_SESSION['errorMsg']= "Please enter all mandatory fields.";
            header("Location:login.php");
         }  
        
?>
