<?php
    
    function getUniqueScheduleSemesterByFaculty($filterValues=array()){
       $semesterList = array();
       $db = new DataBase();
       $q1 = "SELECT DISTINCT s.sem_id,sem.sem_name FROM  schedule s,sem 
              WHERE s.sem_id = sem.sem_id AND s.delete_flag = ".DELETE_FLAG_0." ";
	   if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['fm_id'])){
		 	 	$q1 = $q1." AND s.fm_id = ".$filterValues['fm_id'];	
		 	 }
                         if(isset($filterValues['session_date'])){
		 	 	$q1 = $q1." AND s.session_date = '".$filterValues['session_date']."'";	
		 	 }
		 }
	   }
        $q1 = $q1." ORDER BY s.session_sequence "; 
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $semesterList[$i]["sem_id"]   = $v['sem_id'];
                    $semesterList[$i]["sem_name"]   = $v['sem_name'];
                   $i++; 
              }
              unset($a);
              return $semesterList;
           }else{
               return null;
           }
         
     }
    function getUniqueScheduleSubjectByFaculty($filterValues=array()){
       $subList = array();
       $db = new DataBase();
       $q1 = "SELECT distinct subject.sub_id,subject.sub_title FROM schedule s,subject WHERE s.sub_id = subject.sub_id 
              AND s.delete_flag = ".DELETE_FLAG_0."  ";
	   if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['fm_id'])){
		 	 	$q1 = $q1." AND s.fm_id = ".$filterValues['fm_id'];	
		 	 }
                         if(isset($filterValues['session_date'])){
		 	 	$q1 = $q1." AND s.session_date = '".$filterValues['session_date']."'";	
		 	 }
                          if(isset($filterValues['sem_id'])){
		 	 	$q1 = $q1." AND s.sem_id = ".$filterValues['sem_id']."";	
		 	 }
		 }
	   }
        $q1 = $q1." ORDER BY s.session_sequence "; 
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $subList[$i]["sub_id"]   = $v['sub_id'];
                    $subList[$i]["sub_title"]   = $v['sub_title'];
                   $i++; 
              }
              unset($a);
              return $subList;
           }else{
               return null;
           }
     }
    function getUniqueSessionTypeForFacultySchedule($filterValues=array()){
       $sessionList = array();
       $db = new DataBase();
       $q1 = "SELECT distinct s.sessiontype_id,IF(s.sessiontype_id = '1','Lecture','Lab') sessionType FROM schedule s,subject
              WHERE s.sub_id = subject.sub_id AND s.delete_flag = ".DELETE_FLAG_0." ";
	   if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['fm_id'])){
		 	 	$q1 = $q1." AND s.fm_id = ".$filterValues['fm_id'];	
		 	 }
                         if(isset($filterValues['session_date'])){
		 	 	$q1 = $q1." AND s.session_date = '".$filterValues['session_date']."'";	
		 	 }
                         if(isset($filterValues['sem_id'])){
		 	 	$q1 = $q1." AND s.sem_id = ".$filterValues['sem_id']."";	
		 	 }
                         if(isset($filterValues['sub_id'])){
		 	 	$q1 = $q1." AND s.sub_id = ".$filterValues['sub_id']." ";	
		 	 }
		 }
	   }
        $q1 = $q1." ORDER BY s.session_sequence "; 
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $sessionList[$i]["id"]     = $v['sessiontype_id'];
                    $sessionList[$i]["name"]   = $v['sessionType'];
                   $i++; 
              }
              unset($a);
              return $sessionList;
           }else{
               return null;
           }
     }
    function getUniqueSessionSequence($filterValues=array()){
       $sessionSequence = array();
       $db = new DataBase();
       $q1 = "SELECT distinct session_sequence FROM schedule s,subject
              WHERE s.sub_id = subject.sub_id AND s.delete_flag = ".DELETE_FLAG_0." ";
	   if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['fm_id'])){
		 	 	$q1 = $q1." AND s.fm_id = ".$filterValues['fm_id'];	
		 	 }
                         if(isset($filterValues['session_date'])){
		 	 	$q1 = $q1." AND s.session_date = '".$filterValues['session_date']."'";	
		 	 }
                         if(isset($filterValues['sem_id'])){
		 	 	$q1 = $q1." AND s.sem_id = ".$filterValues['sem_id']." ";	
		 	 }
                         if(isset($filterValues['sub_id'])){
		 	 	$q1 = $q1." AND s.sub_id = ".$filterValues['sub_id']."";	
		 	 }
                          if(isset($filterValues['sessiontype_id'])){
		 	 	$q1 = $q1." AND s.sessiontype_id = ".$filterValues['sessiontype_id']." ";	
		 	 }
		 }
	   }
        $q1 = $q1." ORDER BY s.session_sequence "; 
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $sessionSequence[$i]["id"]     = $v['session_sequence'];
                   $i++; 
              }
              unset($a);
              return $sessionSequence;
           }else{
               return null;
           }
     }
    function getAllUserType(){
        $userType = array();
        $db = new DataBase();
        $q1 = "SELECT userType_id,userType_name FROM ut WHERE delete_flag =".DELETE_FLAG_0." " ;
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                   $userType[$i]["id"]   = $v['userType_id'];
                   $userType[$i]["name"] = $v['userType_name'];    
                   $i++; 
              }
              unset($a);
              return $userType;
           }else{
               return null;
           }
    }
    function getAllDepartment($filterValues=array()){
        $deptList = array();
        $db = new DataBase();
        $q1 = "SELECT dept_id,dept_name FROM department WHERE delete_flag =".DELETE_FLAG_0."";
        if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['dept_id'])){
		 	 	$q1 = $q1." AND dept_id = ".$filterValues['dept_id'];	
		 	 }
		 }
	}
        
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                   $deptList[$i]["id"]   = $v['dept_id'];
                   $deptList[$i]["name"] = $v['dept_name'];    
                   $i++; 
              }
              unset($a);
              return $deptList;
           }else{
               return null;
           }
    }
    function getAllSemester($filterValues=array()){
        $semList = array();
        $db = new DataBase();
        $q1 = "SELECT sem_id,sem_name FROM sem WHERE delete_flag =".DELETE_FLAG_0." ";
        if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['sem_id'])){
		 	 	$q1 = $q1." AND sem_id = ".$filterValues['sem_id'];	
		 	 }
		 }
	}        
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                   $semList[$i]["id"]   = $v['sem_id'];
                   $semList[$i]["name"] = $v['sem_name'];    
                   $i++; 
              }
              unset($a);
              return $semList;
           }else{
               return null;
           }
    }
    function validatLogin($username,$password,$userTypeId= USERTYPE_STUDENT){
         $userMapDetails = array();
         $tableName ="";
         
         if($userTypeId ==USERTYPE_ADMIN){
             // Admin Section.....
               $tableName ="am";
         }else if ($userTypeId ==USERTYPE_HEAD){
             // Head sections...
             $tableName ="hm";
         }else if ($userTypeId == USERTYPE_FACULTY){
             //Faculty Sections...
             $tableName ="fm";
         }else{
             //Student Sections...
             $tableName ="sm";
         } 
        $db = new DataBase();
        if($tableName =="am"){
           $query ="SELECT md.md_id,md.fname,md.mname,md.lname FROM md,".$tableName." WHERE md.md_id =".$tableName.".md_id AND md.user_name ='".$username."' AND 
                md.user_pass = MD5('".$password."') AND ".$tableName.".approved_status = ".STATUS_APPROVED." AND ".$tableName.".delete_flag =".DELETE_FLAG_0." ";    

        }else{
            $query ="SELECT md.md_id,md.fname,md.mname,md.lname,".$tableName.".dept_id FROM md,".$tableName." WHERE md.md_id =".$tableName.".md_id AND md.user_name ='".$username."' AND 
                 md.user_pass = MD5('".$password."') AND ".$tableName.".approved_status = ".STATUS_APPROVED." AND ".$tableName.".delete_flag =".DELETE_FLAG_0." ";    
        }
        $rs1 = $db->executeQuery($query);
        
        unset($query);
        if($db->getTotalRows($rs1) > 0){
            while($v = $db->fetchArrayQuery($rs1)){
                    $userMapDetails['md_id']= $v['md_id'];
                    $userMapDetails['fname']= $v['fname'];
                    $userMapDetails['mname']= $v['mname'];
                    $userMapDetails['lname']= $v['lname'];
                    $userMapDetails['dept_id']= $v['dept_id'];
                    
                }
        }
        $db->freeResultSet($rs1);
        return $userMapDetails;
    }
    function isUserExist($username,$userTypeId= USERTYPE_STUDENT){
        $db = new DataBase();
        $query ="SELECT md_id  FROM md WHERE user_name ='".$username."'  AND  usertype_id = ".$userTypeId." ";
        $rs1 = $db->executeQuery($query);
        unset($query);
        if($db->getTotalRows($rs1) > 0){
              return true;
        }
        $db->freeResultSet($rs1);
        return false;
     }
     function isStudentExist($schedule_id,$sm_id){
        $db = new DataBase();
        $query ="SELECT at_id  FROM attendance WHERE schedule_id = ".$schedule_id." AND sm_id = ".$sm_id." "; 
        $rs1 = $db->executeQuery($query);
        unset($query);
        if($db->getTotalRows($rs1) > 0){
              return true;
        }
        $db->freeResultSet($rs1);
        return false;
     }
     
     
    function isUserExistForPasswordReset($username,$dob,$phoneNo,$userTypeId= USERTYPE_STUDENT){
        $db = new DataBase();
        $query ="SELECT md_id  FROM md WHERE user_name ='".$username."'  AND  usertype_id = ".$userTypeId."
            AND  dob = '".$dob."' AND phone_no = '".$phoneNo."'  ";
        $rs1 = $db->executeQuery($query);
        unset($query);
        if($db->getTotalRows($rs1) > 0){
              return true;
        }
        $db->freeResultSet($rs1);
        return false;
     }
    function isDepartmentExist($deptName){
        $db = new DataBase();
        $query ="SELECT dept_id  FROM department WHERE dept_name ='".$deptName."' ";
        $rs1 = $db->executeQuery($query);
        unset($query);
        if($db->getTotalRows($rs1) > 0){
              return true;
        }
        $db->freeResultSet($rs1);
        return false;
     }
    function getAdminUserListByStatus($userTypeId= USERTYPE_ADMIN,$filterValues=array()){
       $userList = array();
       $tableName ="am";
       $db = new DataBase();
       $q1 = "select md.*,".$tableName.".* from md,".$tableName." WHERE ".$tableName.".md_id = md.md_id AND ".$tableName.".delete_flag =".DELETE_FLAG_0." ";
	   if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['md_id'])){
		 	 	$q1 = $q1." AND md.md_id = ".$filterValues['md_id'];	
		 	 }
                         if(isset($filterValues['approved_status'])){
		 	 	$q1 = $q1." AND .$tableName.approved_status = ".$filterValues['approved_status'];	
		 	 }
		 }
	   }
        $q1 = $q1." order by ".$tableName.".approved_by "; 
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
               		 
               	   $userList[$i]["md_id"]     = $v['md_id'];
                   $userList[$i]["fname"]     = $v['fname'];
                   $userList[$i]["mname"] 	  = $v['mname'];
				   $userList[$i]["lname"] 	  = $v['lname'];
				   $userList[$i]["phone_no"]  = $v['phone_no'];
				   $userList[$i]["email"]     = $v['email'];
				   $userList[$i]["user_name"] = $v['user_name'];
				   
				   $userList[$i]["paddress"] = $v['paddress'];
				   $userList[$i]["peraddress"] = $v['peraddress'];
				   $userList[$i]["pstate"]   = $v['pstate'];
				   $userList[$i]["perstate"] = $v['perstate'];
				   $userList[$i]["pcity"]    = $v['pcity'];
				   $userList[$i]["percity"]  = $v['percity'];
				   
				   $userList[$i]["dob"]	     = $v['dob'];
				   $userList[$i]["doj"]      = $v['doj'];
				   $userList[$i]["approved_status"] = $v['approved_status'];

                   $i++; 
              }
              unset($a);
              return $userList;
           }else{
               return null;
           }
     }
    function getHeadMasterListByStatus($userTypeId= USERTYPE_HEAD,$filterValues=array()){
       $userList = array();
       $tableName ="hm";
       $db = new DataBase();
       $q1 = "select md.*,".$tableName.".*,dp.dept_name from md,".$tableName.",department dp WHERE ".$tableName.".md_id = md.md_id AND ".$tableName.".delete_flag =".DELETE_FLAG_0." AND dp.dept_id = hm.dept_id ";
	   if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['md_id'])){
		 	 	$q1 = $q1." AND md.md_id = ".$filterValues['md_id'];	
		 	 }
                         if(isset($filterValues['dept_id'])){
		 	 	$q1 = $q1." AND hm.dept_id = ".$filterValues['dept_id'];	
		 	 }
                         if(isset($filterValues['approved_status'])){
		 	 	$q1 = $q1." AND hm.approved_status = ".$filterValues['approved_status'];	
		 	 }
		 }
	   }
	   $q1 = $q1." order by ".$tableName.".approved_by "; 
	   
	   
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
               		 
               	    $userList[$i]["md_id"]     = $v['md_id'];
                    $userList[$i]["fname"]     = $v['fname'];
                    $userList[$i]["mname"]     = $v['mname'];
                    $userList[$i]["lname"]     = $v['lname'];
                    $userList[$i]["phone_no"]  = $v['phone_no'];
                    $userList[$i]["email"]     = $v['email'];
                    $userList[$i]["user_name"] = $v['user_name'];

                    $userList[$i]["paddress"] = $v['paddress'];
                    $userList[$i]["peraddress"] = $v['peraddress'];
                    $userList[$i]["pstate"]   = $v['pstate'];
                    $userList[$i]["perstate"] = $v['perstate'];
                    $userList[$i]["pcity"]    = $v['pcity'];
                    $userList[$i]["percity"]  = $v['percity'];

                    $userList[$i]["dob"]      = $v['dob'];
                    $userList[$i]["doj"]      = $v['doj'];
                    $userList[$i]["approved_status"] = $v['approved_status'];
                    $userList[$i]["dept_id"]   = $v['dept_id'];
                    $userList[$i]["dept_name"] = $v['dept_name'];
                   $i++; 
              }
              unset($a);
              return $userList;
           }else{
               return null;
           }
     }
    function getFacultyMasterListByStatus($userTypeId= USERTYPE_FACULTY,$filterValues=array()){
       $userList = array();
       $tableName ="fm";
       $db = new DataBase();
       $q1 = "select md.*,".$tableName.".*,dp.dept_name from md,".$tableName.",department dp WHERE ".$tableName.".md_id = md.md_id AND ".$tableName.".delete_flag =".DELETE_FLAG_0." AND dp.dept_id = fm.dept_id ";
	   if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['md_id'])){
		 	 	$q1 = $q1." AND md.md_id = ".$filterValues['md_id'];	
		 	 }
                         if(isset($filterValues['dept_id'])){
		 	 	$q1 = $q1." AND fm.dept_id = ".$filterValues['dept_id'];	
		 	 }
                         if(isset($filterValues['NOT_IN_FM_ID'])){
		 	 	$q1 = $q1." AND fm.md_id != ".$filterValues['NOT_IN_FM_ID'];	
		 	 }
                         
                         
                         
		 }
	   }
	   $q1 = $q1." order by ".$tableName.".approved_by "; 
	   
	
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
               		 
               	    $userList[$i]["md_id"]     = $v['md_id'];
                    $userList[$i]["fname"]     = $v['fname'];
                    $userList[$i]["mname"]     = $v['mname'];
                    $userList[$i]["lname"]     = $v['lname'];
                    $userList[$i]["phone_no"]  = $v['phone_no'];
                    $userList[$i]["email"]     = $v['email'];
                    $userList[$i]["user_name"] = $v['user_name'];

                    $userList[$i]["paddress"] = $v['paddress'];
                    $userList[$i]["peraddress"] = $v['peraddress'];
                    $userList[$i]["pstate"]   = $v['pstate'];
                    $userList[$i]["perstate"] = $v['perstate'];
                    $userList[$i]["pcity"]    = $v['pcity'];
                    $userList[$i]["percity"]  = $v['percity'];

                    $userList[$i]["dob"]      = $v['dob'];
                    $userList[$i]["doj"]      = $v['doj'];
                    $userList[$i]["approved_status"] = $v['approved_status'];
                    $userList[$i]["dept_id"]   = $v['dept_id'];
                    $userList[$i]["dept_name"] = $v['dept_name'];
                   $i++; 
              }
              unset($a);
              return $userList;
           }else{
               return null;
           }
     }   
    function getStudentMasterListByStatus($userTypeId= USERTYPE_STUDENT,$filterValues=array()){
       $userList = array();
       $tableName ="sm";
       $db = new DataBase();
       $q1 = "select md.*,".$tableName.".*,dp.dept_name,sem.sem_name from md,".$tableName.",department dp,sem WHERE ".$tableName.".md_id = md.md_id AND ".$tableName.".delete_flag =".DELETE_FLAG_0." AND dp.dept_id = sm.dept_id
              AND sem.sem_id =sm.sem_id ";
	   if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['md_id'])){
		 	 	$q1 = $q1." AND md.md_id = ".$filterValues['md_id'];	
		 	 }
                         if(isset($filterValues['dept_id'])){
		 	 	$q1 = $q1." AND sm.dept_id = ".$filterValues['dept_id'];	
		 	 }
		 }
	   }
        $q1 = $q1." order by ".$tableName.".approved_by "; 
       
	   
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
               		 
               	    $userList[$i]["md_id"]     = $v['md_id'];
                    $userList[$i]["fname"]     = $v['fname'];
                    $userList[$i]["mname"]     = $v['mname'];
                    $userList[$i]["lname"]     = $v['lname'];
                    $userList[$i]["phone_no"]  = $v['phone_no'];
                    $userList[$i]["email"]     = $v['email'];
                    $userList[$i]["user_name"] = $v['user_name'];

                    $userList[$i]["paddress"] = $v['paddress'];
                    $userList[$i]["peraddress"] = $v['peraddress'];
                    $userList[$i]["pstate"]   = $v['pstate'];
                    $userList[$i]["perstate"] = $v['perstate'];
                    $userList[$i]["pcity"]    = $v['pcity'];
                    $userList[$i]["percity"]  = $v['percity'];

                    $userList[$i]["dob"]      = $v['dob'];
                    $userList[$i]["doj"]      = $v['doj'];
                    $userList[$i]["approved_status"] = $v['approved_status'];
                    $userList[$i]["dept_id"]   = $v['dept_id'];
                    $userList[$i]["dept_name"] = $v['dept_name'];
                    $userList[$i]["sem_id"] = $v['sem_id'];
                   $userList[$i]["sem_name"] = $v['sem_name'];
                   $i++; 
              }
              unset($a);
              return $userList;
           }else{
               return null;
           }
		   
     }   
    function approvedAllUsers($userTypeId= USERTYPE_STUDENT){
         $tableName ="";
         if($userTypeId ==USERTYPE_ADMIN){
             // Admin Section.....
               $tableName ="am";
         }else if ($userTypeId ==USERTYPE_HEAD){
             // Head sections...
             $tableName ="hm";
         }else if ($userTypeId == USERTYPE_FACULTY){
             //Faculty Sections...
             $tableName ="fm";
         }else{
             //Student Sections...
             $tableName ="sm";
         }
         //insert query
            $trasactionDB =  new DataBase();
            $trasactionDB->setAutoCommitFalseTrasaction();
            // insert query....
            $query ="UPDATE ".$tableName." SET approved_status =".STATUS_APPROVED." WHERE approved_status = ".STATUS_PENDING;
            $affectedRows = $trasactionDB ->executeQuery($query);
            if($affectedRows >0){
                     $trasactionDB ->commitTrasaction(); 
                     return true;
                 }
                $trasactionDB ->rollBackTransaction(); 
                return false;
      }
    function approvedUserById($md_id,$userTypeId= USERTYPE_STUDENT){
         $tableName ="";
         if($userTypeId ==USERTYPE_ADMIN){
             // Admin Section.....
               $tableName ="am";
         }else if ($userTypeId ==USERTYPE_HEAD){
             // Head sections...
             $tableName ="hm";
         }else if ($userTypeId == USERTYPE_FACULTY){
             //Faculty Sections...
             $tableName ="fm";
         }else{
             //Student Sections...
             $tableName ="sm";
         }
         //insert query
            $trasactionDB =  new DataBase();
            $trasactionDB->setAutoCommitFalseTrasaction();
            // insert query....
            $query ="UPDATE ".$tableName." SET approved_status =".STATUS_APPROVED." WHERE md_id =".$md_id;
            $affectedRows = $trasactionDB ->executeQuery($query);
            if($affectedRows >0){
                     $trasactionDB ->commitTrasaction(); 
                     return true;
                 }
                $trasactionDB ->rollBackTransaction(); 
                return false;
      }
    function rejectUserById($md_id,$userTypeId= USERTYPE_STUDENT){
         $tableName ="";
         if($userTypeId ==USERTYPE_ADMIN){
             // Admin Section.....
               $tableName ="am";
         }else if ($userTypeId ==USERTYPE_HEAD){
             // Head sections...
             $tableName ="hm";
         }else if ($userTypeId == USERTYPE_FACULTY){
             //Faculty Sections...
             $tableName ="fm";
         }else{
             //Student Sections...
             $tableName ="sm";
         }
         //insert query
            $trasactionDB =  new DataBase();
            $trasactionDB->setAutoCommitFalseTrasaction();
            // insert query....
            $query ="UPDATE ".$tableName." SET approved_status =".STATUS_NOTAPPROVED." WHERE md_id =".$md_id;
            $affectedRows = $trasactionDB ->executeQuery($query);
            if($affectedRows >0){
                     $trasactionDB ->commitTrasaction(); 
                     return true;
                 }
                $trasactionDB ->rollBackTransaction(); 
                return false;
      }
    function isSubjectExist($subjectName,$deptSelect,$semSelect){
        $db = new DataBase();
        $query ="SELECT sub_id FROM subject WHERE sub_title ='".$subjectName."' AND dept_id =".$deptSelect." AND sem_id = ".$semSelect."
            AND delete_flag = ".DELETE_FLAG_0." ";
        $rs1 = $db->executeQuery($query);
        unset($query);
        if($db->getTotalRows($rs1) > 0){
              return true;
        }
        $db->freeResultSet($rs1);
        return false;
     }
    function addSubject($subjectName,$dept_id,$sem_id,$createdBy){
        //insert query
         $trasactionDB =  new DataBase();
         $trasactionDB->setAutoCommitFalseTrasaction();
         // insert query....
         $query ="INSERT INTO subject(sub_title,dept_id,sem_id,createdby,created_datetime)VALUES 
             ('".$subjectName."',".$dept_id.",".$sem_id.",".$createdBy.",'".getCreatedDateTime()."')";
         $affectedRows = $trasactionDB ->executeQuery($query);
         if($affectedRows >0){
                  $trasactionDB ->commitTrasaction(); 
                  return true;
              }
          $trasactionDB ->rollBackTransaction(); 
          return false;
     }
    function getAllSubjectList($filterValues=array()){
       $subjectList = array();
       $db = new DataBase();
       $q1 = "SELECT s.*,d.dept_name,sem.sem_name FROM subject s,department d,sem WHERE d.dept_id = s.dept_id AND s.sem_id = sem.sem_id 
              AND s.delete_flag = ".DELETE_FLAG_0."  ";
	   if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['sub_id'])){
		 	 	$q1 = $q1." AND s.sub_id = ".$filterValues['sub_id'];	
		 	 }
                         if(isset($filterValues['dept_id'])){
		 	 	$q1 = $q1." AND s.dept_id = ".$filterValues['dept_id'];	
		 	 }
                          if(isset($filterValues['sem_id'])){
		 	 	$q1 = $q1." AND s.sem_id = ".$filterValues['sem_id'];	
		 	 }
		 }
	   }
        $q1 = $q1." ORDER BY s.dept_id,s.sem_id "; 
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
               		 
               	    $subjectList[$i]["sub_id"]     = $v['sub_id'];
                    $subjectList[$i]["sub_title"]  = $v['sub_title'];
                    $subjectList[$i]["dept_id"]    = $v['dept_id'];
                    $subjectList[$i]["dept_name"]  = $v['dept_name'];
                    $subjectList[$i]["sem_id"]     = $v['sem_id'];
                    $subjectList[$i]["sem_name"]   = $v['sem_name'];
                   $i++; 
              }
              unset($a);
              return $subjectList;
           }else{
               return null;
           }
		   
     }   
    function updateSubject($subjectName,$dept_id,$sem_id,$sub_id){
        //insert query
         $trasactionDB =  new DataBase();
         $trasactionDB->setAutoCommitFalseTrasaction();
         // insert query....
         $query ="UPDATE subject SET sub_title ='".$subjectName."' WHERE dept_id =".$dept_id." AND sem_id = ".$sem_id." AND sub_id =".$sub_id;
         $affectedRows = $trasactionDB ->executeQuery($query);
         if($affectedRows >0){
                  $trasactionDB ->commitTrasaction(); 
                  return true;
           }
          $trasactionDB ->rollBackTransaction(); 
          return false;
     }
    function resetPassword($userName, $txtPassword, $userTypeId){
         //insert query
         $trasactionDB =  new DataBase();
         $trasactionDB->setAutoCommitFalseTrasaction();
         // insert query....
         $query ="UPDATE md SET user_pass = MD5('".$txtPassword."') WHERE user_name ='".$userName."' AND usertype_id = ".$userTypeId." ";
         $affectedRows = $trasactionDB ->executeQuery($query);
         if($affectedRows >0){
                  $trasactionDB ->commitTrasaction(); 
                  return true;
           }
          $trasactionDB ->rollBackTransaction(); 
          return false;
         
     }
    /* --------------------  schedule functionality starts -----------------------*/
     
    function createScheduleEntry($head_id,$faculty_id,$txtScheduleDate,$sem_id,$sub_id,$seq_id,$scheduleType,$sessionAbout){
           //insert query
            $trasactionDB =  new DataBase();
            $trasactionDB->setAutoCommitFalseTrasaction();
            // insert query....
            $query ="INSERT INTO schedule(hm_id, fm_id, sub_id, sem_id, sessiontype_id,session_about, session_sequence, session_date,created_datetime)
                     VALUES (".$head_id.", ".$faculty_id.", ".$sub_id.", ".$sem_id.", ".$scheduleType.", '".$sessionAbout."',".$seq_id.", '".$txtScheduleDate."', '".getCreatedDateTime."')";
            $affectedRows = $trasactionDB ->executeQuery($query);
            if($affectedRows >0){
                     $trasactionDB ->commitTrasaction(); 
                     return true;
             }
             $trasactionDB ->rollBackTransaction(); 
             return false;
      }
    function isScheduleExist($head_id,$txtScheduleDate,$sem_id,$seq_id){
        $db = new DataBase();
        $query ="SELECT schedule_id FROM schedule WHERE hm_id = ".$head_id."  AND session_date = '".$txtScheduleDate."' 
                AND sem_id = ".$sem_id." AND session_sequence = ".$seq_id." AND delete_flag = ".DELETE_FLAG_0." ";
        $rs1 = $db->executeQuery($query);
        unset($query);
        if($db->getTotalRows($rs1) > 0){
              return true;
        }
        $db->freeResultSet($rs1);
        return false;
     }
    function getFacultyScheduleDetails($fm_id,$filterValues=array()){
         
        $scheduleList = array();
       $db = new DataBase();
       $q1 = "SELECT s.fm_id,md.fname,md.mname,md.lname,md.user_name,s.schedule_id,s.sub_id,s.sem_id,s.sessiontype_id,s.session_about,s.session_sequence, s.session_date,subject.sub_title,sem.sem_name FROM 
              schedule s,md,subject,sem WHERE md.md_id =s.fm_id AND subject.sub_id = s.sub_id AND sem.sem_id = s.sem_id  AND s.delete_flag = ".DELETE_FLAG_0." AND
              s.sent_flag =  ".SENT_FLAG_0." AND      
              s.fm_id = ".$fm_id." ";
	   if (isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
                          if(isset($filterValues['sub_id'])){
		 	 	$q1 = $q1." AND s.sub_id = ".$filterValues['sub_id'];	
		 	 }
                         if(isset($filterValues['fm_id'])){
		 	 	$q1 = $q1." AND s.fm_id = ".$filterValues['fm_id'];	
		 	 }
                         if(isset($filterValues['sem_id'])){
		 	 	$q1 = $q1." AND s.sem_id = ".$filterValues['sem_id'];	
		 	 }
                         if(isset($filterValues['session_date'])){
		 	 	$q1 = $q1." AND s.session_date = '".$filterValues['session_date']."'";	
		 	 }
                         if(isset($filterValues['schedule_id'])){
		 	 	$q1 = $q1." AND s.schedule_id = ".$filterValues['schedule_id']." ";	
		 	 }
                        
		 }
	   }
        $q1 = $q1." ORDER BY s.session_sequence,s.sessiontype_id "; 
        
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $scheduleList[$i]["schedule_id"]   = $v['schedule_id'];
                    $scheduleList[$i]["fname"]   = $v['fname'];
                    $scheduleList[$i]["mname"]   = $v['mname'];
                    $scheduleList[$i]["lname"]   = $v['lname'];
                    $scheduleList[$i]["name"]   =  $v['fname']. ' '.$v['lname'];
                    $scheduleList[$i]["user_name"] = $v['user_name'];
                    
                   
                    $scheduleList[$i]["sem_id"]   = $v['sem_id'];
                    $scheduleList[$i]["sub_id"]   = $v['sub_id'];
                   
                    $scheduleList[$i]["sem_name"]   = $v['sem_name'];
                    $scheduleList[$i]["sub_title"]  = $v['sub_title'];
                    $scheduleList[$i]["session_sequence"]  = $v['session_sequence'];
                    $scheduleList[$i]["sessiontype_id"]  = $v['sessiontype_id'];
                    
                    
                   $i++; 
              }
              unset($a);
              return $scheduleList;
           }else{
               return null;
           }
         
         
     }
    function getStudentListForAttendance($dept_id,$sem_id,$schedule_id,$filterValues=array()){
       $studnetList = array();
       $db = new DataBase();
       $q1 = " SELECT vs.md_id,vs.user_name,vs.fname,vs.mname,vs.lname,a.at_id,a.at_flag FROM viewstudents vs LEFT JOIN attendance a 
               ON vs.md_id = a.sm_id AND a.schedule_id =".$schedule_id."  WHERE vs.approved_status = ".STATUS_APPROVED." 
               AND vs.deleteFlag = ".DELETE_FLAG_0." AND vs.dept_id =".$dept_id." AND vs.sem_id = ".$sem_id."  ";
     
	if (isset($filterValues)) {
                if($filterValues != null && count($filterValues) > 0){
                        // filter value..
                        
                        
                }
	}
        $q1 = $q1." ORDER BY vs.fname "; 
       
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                   
                    $studnetList[$i]["md_id"]       = $v['md_id'];
                    $studnetList[$i]["user_name"]   = $v['user_name'];
                    $studnetList[$i]["name"]        = $v['fname']. ' '.$v['lname'];
                    
                    if($v["at_flag"] == 0){
                        $studnetList[$i]["atFlag"] ="Pending";
                    }else if($v["at_flag"] == 1){
                        $studnetList[$i]["atFlag"] ="Present";
                    }else if($v["at_flag"] == 2) {
                        $studnetList[$i]["atFlag"] ="Absent";
                    }
                    $studnetList[$i]["at_flag"] = $v["at_flag"] ;
                    $i++; 
              }
              unset($a);
              return $studnetList;
           }else{
               return null;
           }
         
     }
    function getAllScheduleDetails($hm_id,$filterValues=array()){
       $scheduleList = array();
       $db = new DataBase();
       $q1 = "SELECT s.fm_id,md.fname,md.mname,md.lname,md.user_name,s.schedule_id,s.sub_id,s.sem_id,s.sessiontype_id,s.session_about,s.session_sequence, s.session_date,subject.sub_title,sem.sem_name FROM 
              schedule s,md,subject,sem WHERE md.md_id =s.fm_id AND subject.sub_id = s.sub_id AND sem.sem_id = s.sem_id  AND s.delete_flag = ".DELETE_FLAG_0." AND
              s.sent_flag = ".SENT_FLAG_0." AND hm_id = ".$hm_id." ";
	   if(isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['sub_id'])){
		 	 	$q1 = $q1." AND s.sub_id = ".$filterValues['sub_id'];	
		 	 }
                         if(isset($filterValues['fm_id'])){
		 	 	$q1 = $q1." AND s.fm_id = ".$filterValues['fm_id'];	
		 	 }
                         if(isset($filterValues['sem_id'])){
		 	 	$q1 = $q1." AND s.sem_id = ".$filterValues['sem_id'];	
		 	 }
                         if(isset($filterValues['session_date'])){
		 	 	$q1 = $q1." AND s.session_date = '".$filterValues['session_date']."'";	
		 	 }
                         if(isset($filterValues['schedule_id'])){
		 	 	$q1 = $q1." AND s.schedule_id = ".$filterValues['schedule_id']." ";	
		 	 }
		 }
	   }
        $q1 = $q1." ORDER BY s.session_sequence,s.sessiontype_id "; 
      
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $scheduleList[$i]["schedule_id"]   = $v['schedule_id'];
                    $scheduleList[$i]["fname"]   = $v['fname'];
                    $scheduleList[$i]["mname"]   = $v['mname'];
                    $scheduleList[$i]["lname"]   = $v['lname'];
                    $scheduleList[$i]["name"]   =  $v['fname']. ' '.$v['lname'];
                    $scheduleList[$i]["user_name"] = $v['user_name'];
                    $scheduleList[$i]["fm_id"]     = $v['fm_id'];
                   
                    $scheduleList[$i]["sem_id"]   = $v['sem_id'];
                    $scheduleList[$i]["sub_id"]   = $v['sub_id'];
                   
                    $scheduleList[$i]["sem_name"]   = $v['sem_name'];
                    $scheduleList[$i]["sub_title"]  = $v['sub_title'];
                    $scheduleList[$i]["session_sequence"]  = $v['session_sequence'];
                    $scheduleList[$i]["sessiontype_id"]  = $v['sessiontype_id'];
                   $i++; 
              }
              unset($a);
              return $scheduleList;
           }else{
               return null;
           }
		   
     }
     function getPendingScheduleForHead($hm_id,$filterValues=array()){
       $scheduleList = array();
       $db = new DataBase();
       $q1 = "SELECT s.schedule_id,s.hm_id,s.fm_id,md.fname,md.mname,md.lname,md.user_name,s.sub_id,s.sem_id,
              s.sessiontype_id,s.session_about,s.session_sequence, s.session_date,subject.sub_title,
              sem.sem_name,COUNT(a.at_id) totalStudent, sum(IF(at_flag = ".ATTENDANCE_PRESENT.", 1, 0)) present,
              sum(IF(at_flag = ".ATTENDANCE_ABSENT.", 1, 0)) absent FROM schedule s ,attendance a,subject,sem,viewfacultyusers md
              WHERE  a.schedule_id = s.schedule_id AND md.md_id =s.fm_id AND subject.sub_id = s.sub_id
              AND sem.sem_id = s.sem_id AND s.delete_flag = ".DELETE_FLAG_0." AND s.sent_flag = ".SENT_FLAG_1." ";
              if(isset($filterValues)) {
                  if($filterValues != null && count($filterValues) > 0){
                          // filter value..
                          if(isset($filterValues['hm_id'])){
                                 $q1 = $q1." AND s.hm_id = ".$filterValues['hm_id'];	
                          }

                  }
             }
        $q1 = $q1." group by s.schedule_id ORDER BY s.session_sequence,s.sessiontype_id "; 
      
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $scheduleList[$i]["schedule_id"]   = $v['schedule_id'];
                    $scheduleList[$i]["fname"]   = $v['fname'];
                    $scheduleList[$i]["mname"]   = $v['mname'];
                    $scheduleList[$i]["lname"]   = $v['lname'];
                    $scheduleList[$i]["name"]   =  $v['fname']. ' '.$v['lname'];
                    $scheduleList[$i]["user_name"] = $v['user_name'];
                    
                   
                    $scheduleList[$i]["sem_id"]   = $v['sem_id'];
                    $scheduleList[$i]["sub_id"]   = $v['sub_id'];
                   
                    $scheduleList[$i]["sem_name"]   = $v['sem_name'];
                    $scheduleList[$i]["sub_title"]  = $v['sub_title'];
                    $scheduleList[$i]["session_sequence"]  = $v['session_sequence'];
                    $scheduleList[$i]["sessiontype_id"]  = $v['sessiontype_id'];
                    $scheduleList[$i]["session_date"]  = $v['session_date'];
                    $scheduleList[$i]["present"]  = $v['present'];
                    $scheduleList[$i]["absent"]   = $v['absent'];
                    
                   $i++; 
              }
              unset($a);
              return $scheduleList;
           }else{
               return null;
           }
     }
    function getProfileDetails($md_id){
        $userMapDetails = array();
        $db = new DataBase();
        $query ="SELECT md_id,fname,mname,lname,phone_no,email,user_name,paddress,peraddress,pstate,perstate,pcity,percity,dob,doj FROM md WHERE md_id = ".$md_id." ";
        $rs1 = $db->executeQuery($query);
        unset($query);
        if($db->getTotalRows($rs1) > 0){
            while($v = $db->fetchArrayQuery($rs1)){
                    $userMapDetails['user_name']= $v['user_name'];
                    $userMapDetails['fname']= $v['fname'];
                    $userMapDetails['mname']= $v['mname'];
                    $userMapDetails['lname']= $v['lname'];
                    $userMapDetails['phone_no']= $v['phone_no'];
                    $userMapDetails['email']= $v['email'];
                    $userMapDetails['dob'] = $v['dob'];
                    
                }
        }
        $db->freeResultSet($rs1);
        return $userMapDetails;
    }
    function isHeadExistForDepartment($deptSelect){
        $db = new DataBase();
        $query ="SELECT md.md_id FROM md,hm WHERE md.md_id = hm.md_id AND hm.approved_status IN (".STATUS_PENDING.",".STATUS_APPROVED.") 
                 AND hm.delete_flag = ".DELETE_FLAG_0." AND hm.dept_id = ".$deptSelect." ";
        $rs1 = $db->executeQuery($query);
        unset($query);
        if($db->getTotalRows($rs1) > 0){
              return true;
        }
        $db->freeResultSet($rs1);
        return false; 
        
    }
   
    /* --------------------  Report functionality starts -----------------------*/
    function getReport_Department(){
        $db = new DataBase();
        $q1 = "SELECT dept_id,dept_name FROM department WHERE delete_flag =".DELETE_FLAG_0."";
        $a = $db->fetchAllArray($q1,true);
        unset($q1);
         if (!empty($a)) {
              return $a;
           }else{
               return null;
           }
    }
    function getReport_Semester(){
        $db = new DataBase();
        $q1 = "SELECT sem_id,sem_name FROM sem WHERE delete_flag =".DELETE_FLAG_0."";
        $a = $db->fetchAllArray($q1,true);
        unset($q1);
         if (!empty($a)) {
              return $a;
           }else{
               return null;
           }
    }
    function getReport_Subjects(){
        $db = new DataBase();
        $q1 = "SELECT d.dept_name,sem.sem_name,s.sub_title FROM subject s,department d,sem WHERE 
                s.dept_id= d.dept_id AND s.sem_id =sem.sem_id AND s.delete_flag =".DELETE_FLAG_0."";
        $a = $db->fetchAllArray($q1,true);
        unset($q1);
         if (!empty($a)) {
              return $a;
           }else{
               return null;
           }
    }
    function getReport_UserType(){
        $db = new DataBase();
        $q1 = "SELECT usertype_name FROM ut WHERE delete_flag =".DELETE_FLAG_0."";
        $a = $db->fetchAllArray($q1,true);
        unset($q1);
         if (!empty($a)) {
              return $a;
           }else{
               return null;
           }
    }
    function getReport_AdminUsers(){
        $db = new DataBase();
        $q1 = "SELECT * FROM viewadminusers";
        $a = $db->fetchAllArray($q1,true);
        unset($q1);
         if (!empty($a)) {
              return $a;
           }else{
               return null;
         }
        
    }
    function getReport_HeadUsers(){
        $db = new DataBase();
        $q1 = "SELECT * FROM viewheadusers";
        $a = $db->fetchAllArray($q1,true);
        unset($q1);
         if (!empty($a)) {
              return $a;
           }else{
               return null;
         }
        
    }
    function getReport_FacultyUsers(){
        $db = new DataBase();
        $q1 = "SELECT * FROM viewfacultyusers";
        $a = $db->fetchAllArray($q1,true);
        unset($q1);
         if (!empty($a)) {
              return $a;
           }else{
               return null;
         }
        
    }
    function getReport_Students(){
        $db = new DataBase();
        $q1 = "SELECT * FROM viewstudents";
        $a = $db->fetchAllArray($q1,true);
        unset($q1);
         if (!empty($a)) {
              return $a;
           }else{
               return null;
         }
        
    }
    function sendScheduleDataToAdmin($schedule_id){
        //insert query
         $trasactionDB =  new DataBase();
         $trasactionDB->setAutoCommitFalseTrasaction();
         // insert query....
         $query ="UPDATE schedule SET sent_flag =".SENT_FLAG_2." WHERE schedule_id =".$schedule_id ;
         $affectedRows = $trasactionDB ->executeQuery($query);
         if($affectedRows > 0){
                 $query ="UPDATE attendance SET status_flag =".APPROVAL_HEAD." WHERE schedule_id =".$schedule_id ;
                 $aRows = $trasactionDB ->executeQuery($query);
                  if($aRows >0){
                      $trasactionDB ->commitTrasaction(); 
                      return true;
                  }
           }
          $trasactionDB ->rollBackTransaction(); 
          return false;
       
    }
    
    function sendScheduleDataToHead($schedule_id){
        //insert query
         $trasactionDB =  new DataBase();
         $trasactionDB->setAutoCommitFalseTrasaction();
         // insert query....
         $query ="UPDATE schedule SET sent_flag =".SENT_FLAG_1." WHERE schedule_id =".$schedule_id ;
         $affectedRows = $trasactionDB ->executeQuery($query);
         if($affectedRows >0){
                 $query ="UPDATE attendance SET status_flag =".APPROVAL_PENDING." WHERE schedule_id =".$schedule_id ;
                 $aRows = $trasactionDB ->executeQuery($query);
                  if($aRows >0){
                      $trasactionDB ->commitTrasaction(); 
                      return true;
                  }
           }
          $trasactionDB ->rollBackTransaction(); 
          return false;
    }
    
    function setPresentForSelectedStudent($schedule_id,$ids,$by="Head"){
           
        //insert query
         $trasactionDB =  new DataBase();
         $trasactionDB->setAutoCommitFalseTrasaction();
         // insert query....
         $pattern =",";
         $idsArr = explode($pattern, $ids);
         foreach ($idsArr as $value)
         {
             if($by == 'Head'){
                 if(isStudentExist($schedule_id,$value)){
                     // update query : update attendance of student to present
                     $query ="UPDATE attendance SET  at_flag = ".ATTENDANCE_PRESENT." WHERE schedule_id = ".$schedule_id."
                              AND sm_id = ".$value." ";    
                 }else{
                     $query ="INSERT INTO attendance (schedule_id,sm_id,at_flag,status_flag,created_datetime) 
                              VALUES (".$schedule_id.",".$value.",".ATTENDANCE_PRESENT.",".APPROVAL_HEAD.",'".getCreatedDateTime()."' )";    
                 }
             }else{
                 if(isStudentExist($schedule_id,$value)){
                     // update query : update attendance of student to present
                     $query ="UPDATE attendance SET  at_flag = ".ATTENDANCE_PRESENT." WHERE schedule_id = ".$schedule_id."
                              AND sm_id = ".$value." ";    
                 }else{
                     $query ="INSERT INTO attendance (schedule_id,sm_id,at_flag,created_datetime) 
                                VALUES (".$schedule_id.",".$value.",".ATTENDANCE_PRESENT.",'".getCreatedDateTime()."' )";  
                 }
             }
             $affectedRows = $trasactionDB ->executeQuery($query);
         }
         if($affectedRows >0){
                $trasactionDB ->commitTrasaction(); 
                return true;
           }
          $trasactionDB ->rollBackTransaction(); 
          return false;  
    }
    
    function setAbsentForSelectedStudent($schedule_id,$ids,$by="Head"){
           
        //insert query
         $trasactionDB =  new DataBase();
         $trasactionDB->setAutoCommitFalseTrasaction();
         // insert query....
         $pattern =",";
         $idsArr = explode($pattern, $ids);
         foreach ($idsArr as $value)
         {
             if($by == 'Head'){
                 if(isStudentExist($schedule_id,$value)){
                     // update query : update attendance of student to present
                     $query ="UPDATE attendance SET  at_flag = ".ATTENDANCE_ABSENT." WHERE schedule_id = ".$schedule_id."
                              AND sm_id = ".$value." ";    
                 }else{
                     $query ="INSERT INTO attendance (schedule_id,sm_id,at_flag,status_flag,created_datetime) 
                              VALUES (".$schedule_id.",".$value.",".ATTENDANCE_ABSENT.",".APPROVAL_HEAD.",'".getCreatedDateTime()."' )";    
                 }
             }else{
                 if(isStudentExist($schedule_id,$value)){
                     // update query : update attendance of student to present
                     $query ="UPDATE attendance SET  at_flag = ".ATTENDANCE_ABSENT." WHERE schedule_id = ".$schedule_id."
                              AND sm_id = ".$value." ";    
                 }else{
                     $query ="INSERT INTO attendance (schedule_id,sm_id,at_flag,created_datetime) 
                                VALUES (".$schedule_id.",".$value.",".ATTENDANCE_ABSENT.",'".getCreatedDateTime()."' )";  
                 }
             }
             $affectedRows = $trasactionDB ->executeQuery($query);
         }
         if($affectedRows >0){
                $trasactionDB ->commitTrasaction(); 
                return true;
           }
          $trasactionDB ->rollBackTransaction(); 
          return false;  
    }
    
    function getPendingScheduleForAdmin($filterValues=array()){
       $scheduleList = array();
       $db = new DataBase();
       $q1 = "SELECT s.schedule_id,s.hm_id,s.fm_id,md.fname,md.mname,md.lname,md.user_name,s.sub_id,s.sem_id,
              s.sessiontype_id,s.session_about,s.session_sequence, s.session_date,subject.sub_title,
              sem.sem_name,COUNT(a.at_id) totalStudent, sum(IF(at_flag = ".ATTENDANCE_PRESENT.", 1, 0)) present,
              sum(IF(at_flag = ".ATTENDANCE_ABSENT.", 1, 0)) absent FROM schedule s ,attendance a,subject,sem,viewfacultyusers md
              WHERE  a.schedule_id = s.schedule_id AND md.md_id =s.fm_id AND subject.sub_id = s.sub_id
              AND sem.sem_id = s.sem_id AND s.delete_flag = ".DELETE_FLAG_0." AND s.sent_flag = ".SENT_FLAG_2." 
              AND a.status_flag =".APPROVAL_HEAD."  ";
              if(isset($filterValues)) {
                  if($filterValues != null && count($filterValues) > 0){
                          // filter value..
                          if(isset($filterValues['hm_id'])){
                                 $q1 = $q1." AND s.hm_id = ".$filterValues['hm_id'];	
                          }

                  }
             }
        $q1 = $q1." group by s.schedule_id ORDER BY s.session_sequence,s.sessiontype_id "; 
      
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $scheduleList[$i]["schedule_id"]   = $v['schedule_id'];
                    $scheduleList[$i]["fname"]   = $v['fname'];
                    $scheduleList[$i]["mname"]   = $v['mname'];
                    $scheduleList[$i]["lname"]   = $v['lname'];
                    $scheduleList[$i]["name"]   =  $v['fname']. ' '.$v['lname'];
                    $scheduleList[$i]["user_name"] = $v['user_name'];
                    
                   
                    $scheduleList[$i]["sem_id"]   = $v['sem_id'];
                    $scheduleList[$i]["sub_id"]   = $v['sub_id'];
                   
                    $scheduleList[$i]["sem_name"]   = $v['sem_name'];
                    $scheduleList[$i]["sub_title"]  = $v['sub_title'];
                    $scheduleList[$i]["session_sequence"]  = $v['session_sequence'];
                    $scheduleList[$i]["sessiontype_id"]  = $v['sessiontype_id'];
                    $scheduleList[$i]["session_date"]  = $v['session_date'];
                    $scheduleList[$i]["present"]  = $v['present'];
                    $scheduleList[$i]["absent"]   = $v['absent'];
                    
                   $i++; 
              }
              unset($a);
              return $scheduleList;
           }else{
               return null;
           }
     }
     
     function approveStudentLogByAdmin($schedule_id,$filterValues=array()){
         //insert query
         $trasactionDB =  new DataBase();
         $trasactionDB->setAutoCommitFalseTrasaction();
      
         $query ="UPDATE attendance SET status_flag =".APPROVAL_ADMIN." WHERE schedule_id =".$schedule_id ." " ;
         $aRows = $trasactionDB ->executeQuery($query);
          if($aRows >0){
             $trasactionDB ->commitTrasaction(); 
             return true;
          }
          
          $trasactionDB ->rollBackTransaction(); 
          return false;
         
     } 
    function createFeedBack($sm_id,$txtSubject,$txtMsg){
         //insert query
         $trasactionDB =  new DataBase();
         $trasactionDB->setAutoCommitFalseTrasaction();
         // insert query....
         $query ="INSERT INTO fb(sm_id,subject,created_datetime)VALUES 
             (".$sm_id.",'".$txtSubject."','".getCreatedDateTime()."')";
         $affectedRows = $trasactionDB ->executeQuery($query);
         if($affectedRows >0){
                  $fb_id = $trasactionDB -> getLastInsertedId();
                  return createFeedBackDetails($trasactionDB,$fb_id,$txtMsg);
                  
              }
          $trasactionDB ->rollBackTransaction(); 
          return false;
        
        
    }
    function createFeedBackDetails($trasactionDB,$fb_id,$txtMsg,$requestTypeId=REQUESTTYPE_REQUEST,$fb_by=""){
         $query ="INSERT INTO fbdetails (fb_id,msg,requesttype_id,fb_by) VALUES 
                  (".$fb_id.",'".$txtMsg."',".$requestTypeId.",'".$fb_by."')";
         $affectedRows = $trasactionDB ->executeQuery($query);
         if($affectedRows >0){
                $trasactionDB ->commitTrasaction(); 
                return true;
        
         }
    }    
    
    function getListFeedBack($filterValues=array()){
       $fbist = array();
       $db = new DataBase();
       $q1 = "SELECT fb.fb_id,fb.sm_id,fb.subject,fb.created_datetime,v.fname,v.lname FROM viewstudents v ,fb
              WHERE fb.sm_id = v.md_id AND fb.delete_flag =".DELETE_FLAG_0."";
	   if(isset($filterValues)) {
	   	 if($filterValues != null && count($filterValues) > 0){
		 	 // filter value..
		 	 if(isset($filterValues['sm_id'])){
		 	 	$q1 = $q1." AND fb.sm_id = ".$filterValues['sm_id'];	
		 	 }
		 }
	   }
        $q1 = $q1." ORDER BY fb.created_datetime desc"; 
      
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $fbist[$i]["fb_id"]           = $v['fb_id'];
                    $fbist[$i]["sm_id"]           = $v['sm_id'];
                    $fbist[$i]["subject"]         = $v['subject'];
                    $fbist[$i]["created_datetime"]   = $v['created_datetime'];
                    $fbist[$i]["name"]   =  $v['fname']. ' '.$v['lname'];
                   $i++; 
              }
              unset($a);
              return $fbist;
           }else{
               return null;
           }
    }    
    function getFeedBackDetails($fb_id){
       $fbist = array();
       $db = new DataBase();
       $q1 = "SELECT fd.fb_id, fd.fbdetails_id,fd.fb_by,fd.requesttype_id ,fd.msg,fb.sm_id
              FROM fbdetails fd,requesttype rt,fb WHERE fd.requesttype_id = rt.requestTypeId AND
              fb.fb_id = fd.fb_id AND fd.fb_id = ".$fb_id." ";
	
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        $i =0;
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $fbist[$i]["fb_id"]               = $v['fb_id'];
                    $fbist[$i]["fbdetails_id"]        = $v['fbdetails_id'];
                    $fbist[$i]["fb_by"]               = $v['fb_by'];
                    $fbist[$i]["requesttype_id"]      = $v['requesttype_id'];
                    $fbist[$i]["msg"]                 =  $v['msg'];
                    $fbist[$i]["sm_id"]               =  $v['sm_id'];
                    
                   $i++; 
              }
              unset($a);
              return $fbist;
           }else{
               return null;
           }  
    }
      function getUserDetailsByMasterId($md_id){
       $userMap = array();
       $db = new DataBase();
       $q1 = "SELECT fname,lname from md where md_id = ".$md_id." ";
        $a = $db->fetchAllArray($q1,false);
        unset($q1);
        if (!empty($a)) {
               foreach ($a as $k => $v) {
                    $userMap["name"]    = $v['fname']. ' '.$v['lname'];
              }
              unset($a);
              return $userMap;
           }else{
               return null;
           }  
    }
    
    function assignScheduleToOtherFaculty($schedule_id, $facultySelect){
         //insert query
         $trasactionDB =  new DataBase();
         $trasactionDB->setAutoCommitFalseTrasaction();
         // insert query....
         $query ="UPDATE schedule SET fm_id = ".$facultySelect." WHERE schedule_id = ".$schedule_id."  ";
         $affectedRows = $trasactionDB ->executeQuery($query);
         if($affectedRows >0){
                  $trasactionDB ->commitTrasaction(); 
                  return true;
           }
          $trasactionDB ->rollBackTransaction(); 
          return false;
    }
    
    function getReport_StudentsAttendance($startDate,$endDate){
        $db = new DataBase();
        $q1 = " SELECT   sem.sem_name,subject.sub_title,CONCAT(md.fname ,'  ',md.lname) as facultyName,s.session_date,
                IF(s.sessiontype_id = 1, 'Lecture', 'Lab') type,s.session_sequence,
                s.session_about , sum(IF(at_flag = ".ATTENDANCE_PRESENT.", 1, 0)) present, sum(IF(at_flag = ".ATTENDANCE_ABSENT.", 1, 0)) absent,
                COUNT(a.at_id) totalStudent 
                FROM schedule s ,attendance a,subject,sem,viewfacultyusers md WHERE a.schedule_id = s.schedule_id 
                AND md.md_id =s.fm_id AND subject.sub_id = s.sub_id AND sem.sem_id = s.sem_id AND s.delete_flag = ".DELETE_FLAG_0." 
                AND s.sent_flag = ".SENT_FLAG_2." AND a.status_flag =".APPROVAL_ADMIN." 
                AND DATE(s.session_date) BETWEEN '".$startDate."' AND '".$endDate."'
                group by s.schedule_id ORDER BY s.session_sequence,s.sessiontype_id ";
        $a = $db->fetchAllArray($q1,true);
        unset($q1);
         if (!empty($a)) {
              return $a;
           }else{
               return null;
           }
    }
    
?>
