<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        $deptName       = trim($_GET["txtDeptName"]);
        $dept_id       = trim($_GET["dept_id"]);
        
        if(!empty($deptName) && !empty($dept_id) ){
            
                 $returnVal= isDepartmentExist($deptName);
                 if($returnVal){
                        showErrorMessage('Department already exist, Please enter another name');
                 }else{
                    //insert query
                    $trasactionDB =  new DataBase();
                    $trasactionDB->setAutoCommitFalseTrasaction();
                    // insert query....
                    $query ="UPDATE department SET dept_name='".$deptName."' WHERE dept_id =".$dept_id;
                    $affectedRows = $trasactionDB ->executeQuery($query);
                    if($affectedRows >0){
                             $trasactionDB ->commitTrasaction(); 
                             showSuccessMessage('Record updated successfully.');
                             exit();
                    }
                    $trasactionDB ->rollBackTransaction(); 
                    showErrorMessage('Something went wrong while updating details.');
                    exit();     
                 }
        }else {
            // Error Msessage.
            showErrorMessage("Please fill up all the fields.");
            exit();
        } 

?>
        
       