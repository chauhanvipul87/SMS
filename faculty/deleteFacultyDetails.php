<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        $md_id       = trim($_GET["md_id"]);
        if(!empty($md_id)){

                   //insert query
                   $trasactionDB =  new DataBase();
                   $trasactionDB->setAutoCommitFalseTrasaction();
                   // insert query....
                   $query ="UPDATE fm SET delete_flag =".DELETE_FLAG_1." WHERE md_id =".$md_id;
                   $affectedRows = $trasactionDB ->executeQuery($query);
                   if($affectedRows >0){
                            $trasactionDB ->commitTrasaction(); 
                            showSuccessMessage('user deleted successfully');
                            exit();
                   }
                   $trasactionDB ->rollBackTransaction(); 
                   showErrorMessage('Something went wrong while deleting user details.');	
                       exit();
       }else {
           // Error Msessage.
         showErrorMessage("Please send request with proper parameters.");
         exit();
       } 
?>
       