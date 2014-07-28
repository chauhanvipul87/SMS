<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        $sub_id       = trim($_GET["sub_id"]);
        if(!empty($sub_id)){

                   //insert query
                   $trasactionDB =  new DataBase();
                   $trasactionDB->setAutoCommitFalseTrasaction();
                   // insert query....
                   $query ="UPDATE subject SET delete_flag =".DELETE_FLAG_1." WHERE sub_id =".$sub_id;
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
      