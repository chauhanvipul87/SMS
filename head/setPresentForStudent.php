<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$head_id      = $_SESSION['sessionUserId'];
        $ids          = trim($_GET['ids']);
        $ids          = substr($ids, 1); 
        $schedule_id  = trim($_GET['schedule_id']);
        
        if(!empty($head_id) && !empty($schedule_id) && !empty($ids)){
            $returnVal= setPresentForSelectedStudent($schedule_id,$ids);
            if($returnVal){
                showSuccessMessage("All selected student mark as present.");
                exit();
            }else{
                showErrorMessage("Something went wrong while processing your request.");
                exit();
            }
        }else{
            showErrorMessage("Please send request with proper parameters.");
            exit();
        } 
       
  ?>