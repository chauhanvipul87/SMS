$(document).ready(function () {
      $('#registerFacultyFrm').validate({
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
           var $ajaxUrl = "faculty/registerFaculty.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#registerFacultyFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });

   $('#editFacultyFrm').validate({
      	   submitHandler: function (form) {
           var $ajaxUrl = "faculty/updateFacultyDetails.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#editFacultyFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
   
   $('#addSubjectFrm').validate({
      	   submitHandler: function (form) {
           var $ajaxUrl = "faculty/addSubject.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#addSubjectFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
   $('#editSubjectFrm').validate({
      	   submitHandler: function (form) {
           var $ajaxUrl = "faculty/updateSubject.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#editSubjectFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
    $('#getFacultyScheduleFrm').validate({
      	   submitHandler: function (form) {
           var $ajaxUrl = "faculty/getFacultySchedule.php";
           var $ajaxResponseLayer = "listScheduleRes";
           var $arguments =$("#getFacultyScheduleFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
    $('#timeAttendanceFrmFaculty').validate({
      	   submitHandler: function (form) {
               fun_getPendingScheduleListForFaculty();
        }
   });   

});

