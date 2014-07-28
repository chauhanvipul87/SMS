$(document).ready(function () {
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
           var $ajaxUrl = "admin/registerAdminUser.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#registerAdminUserFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });

   $('#editAdminUserFrm').validate({
      	   submitHandler: function (form) {
           var $ajaxUrl = "admin/updateAdminUserDetails.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#editAdminUserFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });

   $('#addNewDepartmentFrm').validate({
      	   submitHandler: function (form) {
           var $ajaxUrl = "admin/addNewDepartment.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#addNewDepartmentFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   }); 
    $('#editDepartmentFrm').validate({
      	   submitHandler: function (form) {
           var $ajaxUrl = "admin/updateDepartment.php";
           var $ajaxResponseLayer = "errorDiv";
           var $arguments =$("#editDepartmentFrm").serialize();
           sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
           return false;
        }
   });
   
     $('#attendanceReprotFrm').validate({
      	   submitHandler: function (form) {
            form.submit();
            
        }
   });
   
   
  

});

