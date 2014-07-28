<?php
        include_once 'com/sms/common/request/commonRequestHandler.php';
        $action       = trim($_GET["action"]);
        $md_id       = trim($_GET["md_id"]);
        if(isset($action)){
          if(!empty($action)){    
             $retMsg = false; 
            if($action =='admin'){
                $retMsg= rejectUserById($md_id,USERTYPE_ADMIN);  
            }else if($action =='head'){
                $retMsg= rejectUserById($md_id,USERTYPE_HEAD);  
            } else if($action =='faculty'){
                $retMsg= rejectUserById($md_id,USERTYPE_FACULTY);  
            }else if($action =='student'){
                $retMsg= rejectUserById($md_id,USERTYPE_STUDENT);  
            }  
            
            if($retMsg){
                showSuccessMessage("Record has been  rejected."); 
                exit();
            }else{
                showErrorMessage("Something went wrong while updating record"); 
                exit();
            }
          }        
        }else {
        // Error Msessage.
        showErrorMessage("Please send request with proper parameters.");
        exit();
        } 

  ?>
        