<?php
    session_start();
    if(isset($_SESSION['userTypeList'])){
        $userList =$_SESSION['userTypeList'];
    }else{
        $userList = array();
    }
    $error ="";
    if(isset($_SESSION['errorMsg'])){
        //eror msg coding.
        $error = $_SESSION['errorMsg'];
        unset($_SESSION['errorMsg']); 
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
                                    <h3>Step 1: Provide Your Details </h3>
                            </div><!--/span-->
                    </div><!--/row-->

                    <div class="row-fluid">
                        <div class="" style="margin-left: 350px;border: 1px solid #000;width: 580px;" >
                            <div style="color: white;background-color: red;font-size: large" id="errorForgotPassword" ></div><br/>
                           <form class="form-horizontal" id="changePasswordFrm" name="changePasswordFrm" onsubmit="return false;">
                                    <fieldset>
                                            <div class="control-group">
                                                <label class="control-label">User Name <strong style="color: red;">*</strong></label>
                                                <div class="controls">
                                                    <input type="text"  name="txtUserName" id="txtUserName" style="width: 250px;"  maxlength="40" class="required" />
                                                           
                                                </div>
                                            </div>  
                                            <div class="control-group">
                                                    <label class="control-label">DOB <strong style="color: red;">*</strong></label>
                                                    <div class="controls">
                                                        <input type="text"  name="txtDOB" id="txtDOB" style="width: 250px;" 
                                                               maxlength="40" class="required"   readonly="readonly"  />
                                                    </div>
                                            </div>  
                                            <div class="control-group">
                                                    <label class="control-label">Phone No <strong style="color: red;">*</strong></label>
                                                    <div class="controls">
                                                        <input type="text"  name="txtPhoneNo" id="txtPhoneNo" style="width: 250px;"
                                                               maxlength="12" class="required"  />
                                                    </div>
                                            </div>  
                                             <div class="control-group">
                                                <label class="control-label">User Type <strong style="color: red;">*</strong></label>
                                                <div class="controls">
                                                    <select data-rel="chosen" id="userTypeSelect" style="width: 250px;" name="userTypeSelect">
                                                        <option value="">Select User Type</option>
                                                            <?php  for($i=0; $i <count($userList); $i++){  ?>
                                                                <option value="<?php echo $userList[$i]['id'] ?>"><?php echo $userList[$i]['name'] ?></option>
                                                           <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>  
                                        <div class="form-actions" style="text-align: left;">
                                              <button type="submit" class="btn btn-primary" > 
                                                     Send Request 
                                              </button>
                                          </div>	
                                    </fieldset>
                            </form>
                            </div><!--/span-->
			</div><!--/row-->
		</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<?php include 'footer.php'; ?>
        <form id="frm_resetPassword" action="resetPasswordFrm.php"></form>
        <script src="developerjs/forgotpassword.js"></script>
        <script src="developerjs/request.js"></script>
	<script type="text/javascript">
        $(function() {
                $("#txtDOB").datepicker({ changeMonth: true,   changeYear: true,dateFormat: 'yy-mm-dd',yearRange: "-100:+0" });

        });  
        </script>			
</body>
</html>
