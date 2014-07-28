<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';

        $deptName       = trim($_GET["txtDeptName"]);
        
        if(!empty($deptName)){
                $returnVal= isDepartmentExist($deptName);
                 if($returnVal){
                     showErrorMessage('Department already exist, Please enter another name');
                     exit();
                 }
		
                //insert query
                $trasactionDB =  new DataBase();
                $trasactionDB->setAutoCommitFalseTrasaction();
                // insert query....
                $query ="INSERT INTO department (dept_name,created_datetime)VALUES ('".$deptName."','".getCreatedDateTime()."')";
                $affectedRows = $trasactionDB ->executeQuery($query);
                if($affectedRows >0){
                         $trasactionDB ->commitTrasaction(); 
                         showSuccessMessage('Department added successfully.');
                         exit();
                }
                $trasactionDB ->rollBackTransaction(); 
                showErrorMessage('Something went wrong while adding new department.');
                exit();
        }else {
            // Error Msessage.
            showErrorMessage("Please fill up all the fields.");
            exit();
        } 

?>
        
       