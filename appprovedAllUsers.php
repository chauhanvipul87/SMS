<?php
        include_once 'com/sms/common/request/commonRequestHandler.php';
        $action       = trim($_GET["action"]);
        if(isset($action)){
          if(!empty($action)){    
             $retMsg = false; 
            if($action =='admin'){
                $retMsg= approvedAllUsers(USERTYPE_ADMIN);  
            }else if($action =='head'){
                $retMsg= approvedAllUsers(USERTYPE_HEAD);  
            } else if($action =='faculty'){
                $retMsg= approvedAllUsers(USERTYPE_FACULTY);  
            }else if($action =='student'){
                $retMsg= approvedAllUsers(USERTYPE_STUDENT);  
            }  
            
            if($retMsg){
                showSuccessMessage("All records have been approved."); 
                exit();
            }else{
                showErrorMessage("Something went wrong while approving all records"); 
                exit();
            }
          }        
        }else {
        // Error Msessage.
        showErrorMessage("Please send request with proper parameters.");
        exit();
        } 

  ?>
        