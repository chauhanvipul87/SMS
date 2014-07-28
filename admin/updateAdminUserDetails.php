<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';

 		$md_id       = trim($_GET["md_id"]);
        $username       = trim($_GET["txtUserName"]);
        $userTypeId     = trim($_GET["userTypeId"]);
        $firstName      = trim($_GET["txtFname"]);
        $middleName     = trim($_GET["txtmname"]);
        $lastName       = trim($_GET["txtlname"]);
        $phoneNo        = trim($_GET["txtPhoneNo"]);
        $email          = trim($_GET["txtEmail"]);
        $dob            = trim($_GET["txtDOB"]);
        $doj            = trim($_GET["txtDOJ"]);
        $pAddress       = trim($_GET["txtPAddress"]);
        $pState         = trim($_GET["txtPState"]);
        $pCity          = trim($_GET["txtPCity"]);
        $perAddress     = trim($_GET["txtPerAddress"]);
        $perState       = trim($_GET["txtPerState"]);
        $perCity        = trim($_GET["txtPerCity"]);
        
        if(!empty($username) && !empty($userTypeId) && !empty($md_id) && 
                !empty($firstName) && !empty($middleName) && !empty($lastName) &&
                !empty($phoneNo) && !empty($email) && !empty($dob) && 
                !empty($doj) && !empty($pAddress) && !empty($pState) &&
                !empty($pCity) && !empty($perAddress) && !empty($perState) && 
                !empty($perCity)){
            
                //insert query
                $trasactionDB =  new DataBase();
                $trasactionDB->setAutoCommitFalseTrasaction();
                // insert query....
                $query ="UPDATE md SET fname='".$firstName."',mname ='".$middleName."',
                							lname='".$lastName."',phone_no='".$phoneNo."',
                							email='".$email."',user_name = '".$username."',
                							paddress= '".$pAddress."',peraddress ='".$perAddress."',
                							pstate ='".$pState."',perstate ='".$perState."',
                							pcity ='".$pCity."',percity = '".$perCity."',
                							dob = '".$dob."',doj= '".$doj."' WHERE md_id =".$md_id;
														
                $affectedRows = $trasactionDB ->executeQuery($query);
                if($affectedRows >0){
                         $trasactionDB ->commitTrasaction(); 
                         showSuccessMessage('Record updated successfully.');
                         exit();
                }
                $trasactionDB ->rollBackTransaction(); 
                showErrorMessage('Something went wrong while updating details.');
                exit();
        }else {
            // Error Msessage.
            showErrorMessage("Please fill up all the fields.");
            exit();
        } 

?>
        
       