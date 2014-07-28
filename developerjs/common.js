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
           var $ajaxUrl = "register.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#registerStudentFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
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
           var $ajaxUrl = "register.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#registerHeadMasterFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
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
           var $ajaxUrl = "register.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#registerFacultyFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
    $('#registerAdminUserFrm').validate({
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
           var $ajaxUrl = "register.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#registerAdminUserFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });

});
function reloadForm(){
   $("#frm_common").submit(); 
}