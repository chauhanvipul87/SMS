<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        
         $deptName       = trim($_GET["deptName"]);
        if(!empty($deptName)){
                $returnVal= isDepartmentExist($deptName);
                 if($returnVal){
                     showErrorMessage('Department already exist, Please enter another name');
                  }else{
                      showSuccessMessage('Department name is available.');
                  }
                exit();
        }else {
            // Error Msessage.
            showErrorMessage("Please enter department name.");
            exit();
        } 

?>
        
       