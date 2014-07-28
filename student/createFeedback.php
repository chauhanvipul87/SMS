<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';

        $txtSubject       = trim($_GET["txtSubject"]);
        $txtMsg           = trim($_GET["txtMsg"]);
        $sm_id            = trim($_SESSION['sessionUserId']);
         
        if(!empty($txtSubject) && !empty($txtMsg) && !empty($sm_id)){
             $returnVal= createFeedBack($sm_id,$txtSubject,$txtMsg);
             if($returnVal){
                 showSuccessMessage('Your feedback created successfully.');
                 exit();
             }else{
                 showErrorMessage('Something went wrong while creating feedback.');
                 exit();
             }
        }else {
            // Error Msessage.
            showErrorMessage("Please fill up all the fields.");
            exit();
        } 

?>
        
       