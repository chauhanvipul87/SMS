<?php
    session_start();
    if(isset($_SESSION['requestedUserName'])){
        //continue process
    }else{
        //redirect to login page.
        header("Location:login.php");
        exit();        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'header.php'; ?>
</head>
<body>
		<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
		</noscript>
                <div class="container-fluid" style="min-height: 650px;">
		<div class="row-fluid">
		
                    <div class="row-fluid">
                            <div class="span12 center login-header">
                                    <h3>Step 2:Reset Password Form </h3>
                            </div><!--/span-->
                    </div><!--/row-->

                    <div class="row-fluid">
                        <div class="" style="margin-left: 350px;border: 1px solid #000;width: 580px;" >
                            <div style="color: white;background-color: orange" id="errorResetPassword" ></div><br/>
                           <form class="form-horizontal" id="resetPasswordFrm" name="resetPasswordFrm" onsubmit="return false;">
                                    <fieldset>
                                            <div class="control-group">
                                                <label class="control-label">User Name <strong style="color: red;">*</strong></label>
                                                <div class="controls">
                                                    <input type="text"  style="width: 250px;" readonly="readonly" 
                                                           value="<?php echo $_SESSION['requestedUserName']; ?>"  />
                                                </div>
                                            </div>  
                                            <div class="control-group">
                                                    <label class="control-label">Password <strong style="color: red;">*</strong></label>
                                                    <div class="controls">
                                                        <input type="password"  name="txtPassword" id="txtPassword" style="width: 250px;" 
                                                               maxlength="40" class="required" />
                                                    </div>
                                            </div>  
                                             <div class="control-group">
                                                    <label class="control-label">Confirm Password <strong style="color: red;">*</strong></label>
                                                    <div class="controls">
                                                        <input type="password"  name="txtCPassword" id="txtCPassword" style="width: 250px;" 
                                                               maxlength="40" class="required" />
                                                    </div>
                                            </div>  
                                        <div class="form-actions" style="text-align: left;">
                                              <button type="submit" class="btn btn-primary" > 
                                                     Reset Password
                                              </button>
                                          </div>	
                                    </fieldset>
                            </form>
                            </div><!--/span-->
			</div><!--/row-->
		</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<?php include 'footer.php'; ?>
        <form id="frm_loginForm" action="index.php"></form>
        <script src="developerjs/forgotpassword.js"></script>
        <script src="developerjs/request.js"></script>
</body>
</html>
