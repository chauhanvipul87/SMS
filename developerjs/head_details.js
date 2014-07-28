$(document).ready(function () {
      $('#registerHeadMasterFrm').validate({
         rules: {
            txtEmail: {
                required: true,
                email: true
            },
            txtPhoneNo:{
                required: true,
                number: true,
                minlength :10
            }
          },
      	  submitHandler: function (form) {
           var $ajaxUrl = "head/registerHeadMaster.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#registerHeadMasterFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });

   $('#editHeadMasterFrm').validate({
      	   submitHandler: function (form) {
           var $ajaxUrl = "head/updateHeadMasterDetails.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#editHeadMasterFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
    $('#frmGetHeadSchedule').validate({
      	   submitHandler: function (form) {
            getHeadScheduleList();
        }
   });
   
   
    $('#createScheduleForm').validate({
      	   submitHandler: function (form) {
           var facultySelect  = $("#facultySelect").val();
           var semSelect      = $("#semSelect").val();
           var sequenceSelect = $("#sequenceSelect").val();
           var subjectSelect = $("#subjectSelect").val();
           
           if(facultySelect !='' && semSelect !='' && sequenceSelect !='' && subjectSelect!='' ){
               var $ajaxUrl = "head/createSchedule.php";
               var $ajaxResponseLayer = "errorDiv";
               var $arguments =$("#createScheduleForm").serialize();
               sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           }else{
                displayWarningMessage(); 
           }
           return false;
        }
   });
   
    $('#timeAttendanceFrm').validate({
      	   submitHandler: function (form) {
               fun_getPendingScheduleList();
        }
   });   
   
    $('#frmAssignScheduleToOtherFaculty').validate({
      	   submitHandler: function (form) {
           var facultySelect =  $("#facultySelect").val();
           if(facultySelect ==''){
                displayWarningMessage();
           }else{
                if(confirm("Are you sure want to change schedule faculty ?")){
                    var $ajaxUrl = "head/assignSchedule.php";
                    var $ajaxResponseLayer = "errorDiv";
                    var $arguments =$("#frmAssignScheduleToOtherFaculty").serialize();
                    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
                
               }
           }
           return false;
        }
   });



});

   
