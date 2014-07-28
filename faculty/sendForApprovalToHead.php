<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$fm_id      = $_SESSION['sessionUserId'];
        $schedule_id  = $_GET['schedule_id'];
        
        if(!empty($fm_id) && !empty($schedule_id)){
            $returnVal= sendScheduleDataToHead($schedule_id);
            if($returnVal){
                showSuccessMessage("Data sent to head successfully.Now you no longer edit any details for this schedule.");
                exit();
            }else{
                showErrorMessage("Something went wrong while sending data to head.");
                exit();
            }
                
       
        }else{
            showErrorMessage("Please send request with proper parameters.");
            exit();
        } 
       
  ?>