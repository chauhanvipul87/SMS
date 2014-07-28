<?php
	include_once 'com/sms/common/request/commonRequestHandler.php';
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
    <?php include 'topmenu.php'; ?>
    <div class="container-fluid" style="min-height: 750px;">
    <div class="row-fluid">

            <?php include 'leftmenu.php'; ?>	
            <div id="content" class="span12">
            <!-- content starts -->
            <div id="resDiv" class="box">
                <div></div><br/>
                <form class="form-horizontal" id="registrationFrm" name="registrationFrm" onsubmit="return false;">
                         <fieldset>
                                 <div class="control-group" id="loadFrm"> 
                                  <label class="control-label">User Type <strong style="color: red;">*</strong></label>
                                  <div class="controls">
                                      <select data-rel="chosen" id="userTypeSelect" style="width: 250px;" name="userTypeSelect" onchange="loadRegistrationPage(this.value);">
                                          <option value="">Select User Type</option>
                                              <?php  for($i=0; $i <count($userList); $i++){  ?>
                                                  <option value="<?php echo $userList[$i]['id'] ?>"><?php echo $userList[$i]['name'] ?></option>
                                             <?php  } ?>
                                      </select>
                                  </div>
                                 </div>
                         </fieldset>
                 </form>
            </div><!--/span-->
                
            </div>

            <!-- content ends -->
            </div><!--/#content.span10-->
    </div><!--/fluid-row-->

    <?php include 'footer.php'; ?>
    <script src="developerjs/request.js"></script>
    <script src="developerjs/admin.js"></script>

    <form id="frm_common" action="index.php"></form>
</body>
</html>
