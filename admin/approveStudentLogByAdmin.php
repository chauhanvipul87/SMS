<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        $schedule_id  = $_GET['schedule_id'];
        if(!empty($schedule_id)){
            $returnVal= approveStudentLogByAdmin($schedule_id,array());
            if($returnVal){
                showSuccessMessage("Data approved successfully.");
                exit();
            }else{
                showErrorMessage("Something went wrong while approving student log.");
                exit();
            }
        }else{
            showErrorMessage("Please send request with proper parameters.");
            exit();
        } 
       
  ?>