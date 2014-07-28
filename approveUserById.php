<?php
        include_once 'com/sms/common/request/commonRequestHandler.php';
        $action       = trim($_GET["action"]);
        $md_id       = trim($_GET["md_id"]);
        if(isset($action)){
          if(!empty($action)){    
             $retMsg = false; 
            if($action =='admin'){
                $retMsg= approvedUserById($md_id,USERTYPE_ADMIN);  
            }else if($action =='head'){
                $retMsg= approvedUserById($md_id,USERTYPE_HEAD);  
            } else if($action =='faculty'){
                $retMsg= approvedUserById($md_id,USERTYPE_FACULTY);  
            }else if($action =='student'){
                $retMsg= approvedUserById($md_id,USERTYPE_STUDENT);  
            }  
            
            if($retMsg){
                showSuccessMessage("Record has been approved."); 
                exit();
            }else{
                showErrorMessage("Something went wrong while approving records"); 
                exit();
            }
          }        
        }else {
        // Error Msessage.
        showErrorMessage("Please send request with proper parameters.");
        exit();
        } 

  ?>
        
