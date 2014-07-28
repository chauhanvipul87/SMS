<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        $subjectName  = $_GET["txtSubjectName"];
        $dept_id      = $_GET["deptSelect"];
        $sem_id       = $_GET["semSelect"];
        if(!empty($subjectName) && !empty($dept_id) && !empty($sem_id)){
            
            $returnVal= isSubjectExist($subjectName,$dept_id,$sem_id);
            if($returnVal){
                  showErrorMessage('Subject is already exist, Please enter another subject name');

             }else{
                 $createdBy = $_SESSION['sessionUserId'];
                 $returnVal= addSubject($subjectName,$dept_id,$sem_id,$createdBy);
                 if($returnVal){
                      showSuccessMessage('Subject added successfully.');
                 }else{
                       showErrorMessage('Something went wrong while adding subject.');
                 }   
            }
            exit();
        }else {
            // Error Msessage.
            showErrorMessage("Please send request with all parameters.");
            exit();
        } 

?>
        
       