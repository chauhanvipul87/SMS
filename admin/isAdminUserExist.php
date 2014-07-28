<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';

        $username       = $_GET["userName"];
        
        if(!empty($username)){
                $returnVal= isUserExist($username,USERTYPE_ADMIN);
                 if($returnVal){
                     showErrorMessage('Username is already exist, Please enter another username');
                  }else{
                      showSuccessMessage('Username is available.');
                  }
                exit();
        }else {
            // Error Msessage.
            showErrorMessage("Please enter username.");
            exit();
        } 

?>
        
       