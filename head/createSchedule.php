<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        
        $head_id         = trim($_GET["head_id"]);
        $faculty_id      = trim($_GET["facultySelect"]);
        $txtScheduleDate = trim($_GET["txtScheduleDate"]);
        $sem_id          = trim($_GET["semSelect"]);
        $sub_id          = trim($_GET["subjectSelect"]);
        $seq_id          = trim($_GET["sequenceSelect"]);
        $scheduleType    = trim($_GET["scheduleType"]);
        $sessionAbout    = trim($_GET["sessionAbout"]);
        
        if(!empty($head_id) && !empty($faculty_id) && !empty($txtScheduleDate) &&
                !empty($sem_id) && !empty($sub_id) && !empty($seq_id) &&
                !empty($scheduleType)){

                $returnVal= isScheduleExist($head_id,$txtScheduleDate,$sem_id,$seq_id);
                 if($returnVal){
                     showErrorMessage('Schedule is already exist having same paramters.');
                     exit();
                 }
                //insert query
                 $isScheduleAdded = createScheduleEntry($head_id,$faculty_id,$txtScheduleDate,$sem_id,$sub_id,$seq_id,$scheduleType,$sessionAbout);
                 if($isScheduleAdded){
                     showSuccessMessage('Schedule added successfully.');
                     exit();
                 }else{
                    showErrorMessage('Something went wrong while adding head master.');
                    exit();
                 }
        }else {
            // Error Msessage.
            showErrorMessage("Please fill up all the fields.");
            exit();
        } 

?>
        
       