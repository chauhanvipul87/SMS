<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        $subjectName   = $_GET["subjectName"];
        $dept_id      = $_GET["deptSelect"];
        $sem_id       = $_GET["semSelect"];
        
        if(!empty($subjectName) && !empty($dept_id) && !empty($sem_id)){
                $returnVal= isSubjectExist($subjectName,$dept_id,$sem_id);
                 if($returnVal){
                     showErrorMessage('Subject is already exist, Please enter another subject name');
                  }else{
                      showSuccessMessage('Subject Name is available.');
                  }
                exit();
        }else {
            // Error Msessage.
            showErrorMessage("Please send request with all parameters.");
            exit();
        } 

?>
        
       