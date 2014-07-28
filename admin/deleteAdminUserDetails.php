<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
     $md_id       = trim($_GET["md_id"]);
     if(!empty($md_id)){
                
			 //insert query
                $trasactionDB =  new DataBase();
                $trasactionDB->setAutoCommitFalseTrasaction();
                // insert query....
                $query ="UPDATE am SET delete_flag =".DELETE_FLAG_1." WHERE md_id =".$md_id;
                $affectedRows = $trasactionDB ->executeQuery($query);
                if($affectedRows >0){
                         $trasactionDB ->commitTrasaction(); 
                         showSuccessMessage('Admin user deleted successfully');
                         exit();
                }
                $trasactionDB ->rollBackTransaction(); 
                showErrorMessage('Something went wrong while deleting admin user.');	
	            exit();
    }else {
        // Error Msessage.
      showErrorMessage("Please send request with proper parameters.");
      exit();
    } 

?>
        
       