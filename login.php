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
					<h2>Welcome to SMS</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
                                        <?php
                                            if($error !=""){ ?>
                                                 <div class="alert alert-error">
                                                    <?php echo $error; ?>
                                                </div>   
                                         <?php   }
                                        
                                        ?>
					
					<form class="form-horizontal" action="loginValidate.php" method="post">
						<fieldset>
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="txtUsername" id="txtUsername" type="text" value="admin" />
                                                                <strong style="color: red;">*</strong>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="txtPassword" id="txtPassword" type="password" value="admin123456" />
                                                                <strong style="color: red;">*</strong>
							</div>
							<div class="clearfix"></div>
							
							<div class="input-prepend" title="User Type">
								<select data-rel="chosen" id="userTypeSelect" style="width: 180px;" name="userTypeSelect">
                                                                    <option value="">Select User Type</option>
                                                                        <?php  for($i=0; $i <count($userList); $i++){  ?>
                                                                            <option value="<?php echo $userList[$i]['id'] ?>"><?php echo $userList[$i]['name'] ?></option>
                                                                       <?php  } ?>
								</select>
                                                            <strong style="color: red;">*</strong>
							</div>
							<div class="clearfix"></div>
							<p class="center span5">
							<button type="submit" class="btn btn-primary">Login</button>

                                                        <div class="input-prepend">
							<label><a href="forgotPasswordFrm.php">Forgot Password?</a></label>
							</div>
                                                        <div class="clearfix"></div>
                                                        <div class="input-prepend">
                                                            <label><a href="Registration.php">New User?</a></label>
							</div>
							<div class="clearfix"></div>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
		</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<?php include 'footer.php'; ?>				
				
</body>
</html>
