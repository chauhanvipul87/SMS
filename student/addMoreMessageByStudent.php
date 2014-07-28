<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';

        $txtMsg           = trim($_GET["txtMsg"]);
        $fb_id            = trim($_GET["fb_id"]);
        $sm_id            = trim($_SESSION['sessionUserId']);
         
        if(!empty($txtMsg) && !empty($fb_id) && !empty($sm_id)){
             $trasactionDB = new DataBase();
             $trasactionDB->setAutoCommitFalseTrasaction();
             $returnVal= createFeedBackDetails($trasactionDB,$fb_id,$txtMsg,REQUESTTYPE_REQUEST);
             if($returnVal){
                 showSuccessMessage('Your feedback message added successfully.');
                 exit();
             }else{
                  $trasactionDB ->rollBackTransaction(); 
                  showErrorMessage('Something went wrong while creating feedback.');
                  exit();
             }
        }else {
            // Error Msessage.
            showErrorMessage("Please fill up all the fields.");
            exit();
        } 

?>
        
       