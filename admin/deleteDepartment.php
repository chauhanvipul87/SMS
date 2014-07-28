<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
     $dept_id       = trim($_GET["dept_id"]);
     if(!empty($dept_id)){
                
			 //insert query
                $trasactionDB =  new DataBase();
                $trasactionDB->setAutoCommitFalseTrasaction();
                // insert query....
                $query ="UPDATE department SET delete_flag =".DELETE_FLAG_1." WHERE dept_id =".$dept_id;
                $affectedRows = $trasactionDB ->executeQuery($query);
                if($affectedRows >0){
                         $trasactionDB ->commitTrasaction(); 
                         showSuccessMessage('Record deleted successfully');
                         exit();
                }
                $trasactionDB ->rollBackTransaction(); 
                showErrorMessage('Something went wrong while deleting record.');	
	            exit();
    }else {
        // Error Msessage.
      showErrorMessage("Please send request with proper parameters.");
      exit();
    } 

?>
        
       