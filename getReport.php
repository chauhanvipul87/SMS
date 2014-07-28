<?php
    include_once 'com/sms/common/request/commonRequestHandler.php';
    include_once 'com/sms/common/csv/CSVClassFile.php';
    
    $opt       = trim($_GET["opt"]);
    if(!empty($opt)){
       if($opt =='Departments'){
           new CSVClass("department", array('Dept Id', 'Dept Name'), getReport_Department());
       }else if($opt =='Semester'){
           new CSVClass("Semester", array('Sem Id', 'Semester Name'), getReport_Semester());
       }else if($opt =='Subjects'){
           new CSVClass("Subjects", array('Department Name', 'Semester' ,'Subject Title'), getReport_Subjects());
       }else if($opt =='UserType'){
           new CSVClass("UserType", array('User Type'), getReport_UserType());
       }else if($opt =='AdminUsers'){
           $headingArr=array("Id","First Name","Middle Name","Last Name","Phone No",
                            "Email ","User Name","Present Address","Present Address State",
                            "Present Address City","Permenet Address","State","City","Date Of Birth",
                            "Date Of Joining"," User Type Name","Status","Role");
           new CSVClass("AdminUsers", $headingArr, getReport_AdminUsers());
       }else if($opt =='HeadUsers'){
           $headingArr=array("Id","First Name","Middle Name","Last Name","Phone No",
                            "Email ","User Name","Present Address","Present Address State",
                            "Present Address City","Permenet Address","State","City","Date Of Birth",
                            "Date Of Joining"," User Type Name","Status","Role");
           new CSVClass("HeadUsers", $headingArr, getReport_HeadUsers());
       }else if($opt =='FacultyUsers'){
           $headingArr=array("Id","First Name","Middle Name","Last Name","Phone No",
                            "Email ","User Name","Present Address","Present Address State",
                            "Present Address City","Permenet Address","State","City","Date Of Birth",
                            "Date Of Joining"," User Type Name","Status","Role","Department Name");
           new CSVClass("FacultyUsers", $headingArr, getReport_FacultyUsers());
       }else if($opt =='Students'){
           $headingArr=array("Id","First Name","Middle Name","Last Name","Phone No",
                            "Email ","User Name","Present Address","Present Address State",
                            "Present Address City","Permenet Address","State","City","Date Of Birth",
                            "Date Of Joining"," User Type Name","Status","Role","Department Name","Semester");
           new CSVClass("Students", $headingArr, getReport_Students());
       }else if($opt =='AttendanceReport'){
           $headingArr=array("Semester","Subject Name","Faculty Name","Session Date"," Session Type","Session Sequence ","About Session",
               "Present","Absent","Total Student");
           $txtStartDate       = trim($_GET["txtStartDate"]);
           $txtEndDate         = trim($_GET["txtEndDate"]);
           new CSVClass("AttendanceReport", $headingArr, getReport_StudentsAttendance($txtStartDate,$txtEndDate));
       }
       
       
       
       
    }else{
        header("Location:error.php");    
        exit();
    }
     
    
    
?>
