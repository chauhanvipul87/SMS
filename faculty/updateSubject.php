<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        $sub_id       = $_GET["sub_id"];
        $subjectName  = $_GET["txtSubjectName"];
        $dept_id      = $_GET["deptSelect"];
        $sem_id       = $_GET["semSelect"];
        if(!empty($sub_id) && !empty($subjectName) && !empty($dept_id) && !empty($sem_id)){
            $returnVal= isSubjectExist($subjectName,$dept_id,$sem_id,$sub_id);
            if($returnVal){
                  showErrorMessage('Subject is already exist, Please enter another subject name');
             }else{
                //update subject details
                $returnVal= updateSubject($subjectName, $dept_id, $sem_id, $sub_id);
                if($returnVal){
                    showSuccessMessage('Record updated successfully.');
                }else{
                  showErrorMessage('Something went wrong while updating record.');  
                } 
            }
            exit();
        }else {
            // Error Msessage.
            showErrorMessage("Please send request with all parameters.");
            exit();
        } 

?>
      