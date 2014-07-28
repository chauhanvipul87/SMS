<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$head_id       = $_SESSION['sessionUserId'];
        $schedule_id   = $_GET['schedule_id'];
        $dept_id       = $_GET['dept_id'];
        $facultySelect = $_GET['facultySelect'];
        
        if(!empty($head_id) && !empty($schedule_id) && !empty($facultySelect)){
                
            $isFacultyChanged= assignScheduleToOtherFaculty($schedule_id, $facultySelect);
            if($isFacultyChanged){
                showSuccessMessage("Faculty changed successfully.");
                exit();
            }else{
                showErrorMessage("Something went wrong while assigning schedule to other faculty.");
                exit();
            }

    }else{
        showErrorMessage("Please send request with proper parameters.");
        exit();
  } 
       
  ?>