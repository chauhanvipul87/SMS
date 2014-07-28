<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';

        $username       = strtolower(trim($_GET["txtUserName"]));
        $password       = trim($_GET["txtPassword"]);
        $userTypeId     = trim($_GET["userTypeId"]);
        $firstName      = ucfirst(trim($_GET["txtFname"]));
        $middleName     = ucfirst(trim($_GET["txtmname"]));
        $lastName       = ucfirst(trim($_GET["txtlname"]));
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
        
        if(!empty($username) && !empty($password) && !empty($userTypeId) &&
                !empty($firstName) && !empty($middleName) && !empty($lastName) &&
                !empty($phoneNo) && !empty($email) && !empty($dob) && 
                !empty($doj) && !empty($pAddress) && !empty($pState) &&
                !empty($pCity) && !empty($perAddress) && !empty($perState) && 
                !empty($perCity)){
            
		
                $returnVal= isUserExist($username,$userTypeId);
                 if($returnVal){
                     showErrorMessage('Username is already exist, Please enter another username');
					 exit();
                 }
		
                //insert query
                $trasactionDB =  new DataBase();
                $trasactionDB->setAutoCommitFalseTrasaction();
                // insert query....
                $query ="INSERT INTO md (fname,mname,lname,phone_no,email,user_name,user_pass,paddress,peraddress,pstate,perstate,pcity,percity,usertype_id,
                         dob,doj)VALUES('".$firstName."','".$middleName."','".$lastName."','".$phoneNo."',
                         '".$email."','".$username."',MD5('".$password."'),'".$pAddress."','".$perAddress."','".$pState."','".$perState."',
                         '".$pCity."','".$perCity."',".$userTypeId.",'".$dob."','".$doj."')";
                $affectedRows = $trasactionDB ->executeQuery($query);
                if($affectedRows >0){
                     $m_id = $trasactionDB ->getLastInsertedId();
                     $query ="INSERT INTO am (md_id,approved_status,created_by,created_datetime) 
                         VALUES($m_id,".STATUS_PENDING.",".$_SESSION['sessionUserId'].",'".getCreatedDateTime()."');";
                     $affectedRows = $trasactionDB ->executeQuery($query);
                     if($affectedRows>0){
                         $trasactionDB ->commitTrasaction(); 
                         showSuccessMessage('Admin user added successfully.');
                         exit();
                     }
                }
                $trasactionDB ->rollBackTransaction(); 
                showErrorMessage('Something went wrong while adding admin user.');
                exit();
        }else {
            // Error Msessage.
            showErrorMessage("Please fill up all the fields.");
            exit();
        } 

?>
        
       