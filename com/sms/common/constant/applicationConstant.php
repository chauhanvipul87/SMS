<?php
    
    // Valid constant names
    //STATUS FLAGS
    define("STATUS_PENDING"     ,-1);
    define("STATUS_APPROVED"    ,0);
    define("STATUS_NOTAPPROVED" ,1);

    //USER TYPE FLAGS
    define("USERTYPE_ADMIN"     , 1);
    define("USERTYPE_HEAD"      , 2);
    define("USERTYPE_FACULTY"   , 3);
    define("USERTYPE_STUDENT"   , 4);
    
    //DB INFO
    
    define("LOCALHOST"          , 'localhost');
    define("USERNAME"           , 'root');
    define("PASSWORD"           , "root");
    define("DBNAME"             , "SMS");
    
    //OTHERS
    define("DELETE_FLAG_0"        ,0);
    define("DELETE_FLAG_1"        ,1);
    
    define("SENT_FLAG_0"          ,0); //pending at faculty
    define("SENT_FLAG_1"          ,1); //send for approval to head
    define("SENT_FLAG_2"          ,2); //send for approval to admin
    
    define("ATTENDANCE_PENDING"    ,0);
    define("ATTENDANCE_PRESENT"    ,1);
    define("ATTENDANCE_ABSENT"     ,2);
    
    //ATTENDANCE APPROVAL FLAG
    
    define("APPROVAL_PENDING"    ,0);
    define("APPROVAL_HEAD"       ,1);
    define("APPROVAL_ADMIN"      ,2);
    
    
    define("REQUESTTYPE_REQUEST"      ,1);
    define("REQUESTTYPE_RESPONSE"     ,2);
    

    
?>
