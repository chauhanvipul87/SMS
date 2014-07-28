<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$head_id      = $_SESSION['sessionUserId'];
        $schedule_id  = $_GET['schedule_id'];
        
        if(!empty($head_id) && !empty($schedule_id)){
            $returnVal= sendScheduleDataToAdmin($schedule_id);
            if($returnVal){
                showSuccessMessage("Data sent to admin successfully.Now you no longer edit any details for this schedule.");
                exit();
            }else{
                showErrorMessage("Something went wrong while sending data to admin.");
                exit();
            }
        }else{
            showErrorMessage("Please send request with proper parameters.");
            exit();
        } 
       
  ?>