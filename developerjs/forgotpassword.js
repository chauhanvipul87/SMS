$(document).ready(function () {
      $('#changePasswordFrm').validate({
      	  submitHandler: function (form) {
          var $ajaxUrl = "sendForgetPasswordRequest.php";
          var $ajaxResponseLayer = "errorForgotPassword";   
          var $arguments =$("#changePasswordFrm").serialize();    
          $.post( $ajaxUrl,$arguments,function( data ) { 
              data = data.trim();
              if(data=="success"){
                document.getElementById("frm_resetPassword").submit();
              }else{
                $("#"+$ajaxResponseLayer).html("Please enter valid data.");
              }
              
          });
          return false;
        }
   });
     /*------- resetPasswordFrm -----  */
   $('#resetPasswordFrm').validate({
      	  submitHandler: function (form) {
          
          var password = $("#txtPassword").val();
          var cpassword = $("#txtCPassword").val();
          if(password != cpassword){
                displayWarningMessage('Password and confirm password are not matched.') 
          }else{
                var $ajaxUrl = "resetPassword.php";
                var $ajaxResponseLayer = "errorResetPassword";   
                var $arguments =$("#resetPasswordFrm").serialize();    
                $.post( $ajaxUrl,$arguments,function( data ) { 
                    data = data.trim();
                    if(data=="success"){
                      document.getElementById("frm_loginForm").submit();
                    }else{
                      $("#"+$ajaxResponseLayer).html(data);
                    }
                });
          }
          return false;
        }
   });
   
   
   
   
   
});

