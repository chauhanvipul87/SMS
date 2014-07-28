$(document).ready(function () {
      $('#registerStudentFrm').validate({
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
           var $ajaxUrl = "student/registerStudent.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#registerStudentFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });

   $('#editStudentFrm').validate({
      	   submitHandler: function (form) {
           var $ajaxUrl = "student/updateStudentDetails.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#editStudentFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
    $('#getScheduleFrm').validate({
      	   submitHandler: function (form) {
           var $ajaxUrl = "student/getStudentSchedule.php";
           var $ajaxResponseLayer = "listScheduleRes";
           var $arguments =$("#getScheduleFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
   $('#feedbackfrm').validate({
        rules: {
            txtSubject: {
                required: true,
                maxlength :150
            },
            txtMsg:{
                required: true,
                maxlength :450
            }
          },
      	   submitHandler: function (form) {
           var $ajaxUrl = "student/createFeedback.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#feedbackfrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
   
   

});

