<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$deptList =getAllDepartment();
        $semList =getAllSemester();
	
?>
<div style="padding: 10px;">
<h4>Register Student</h4><br/>
<form class="form-horizontal" id="registerStudentFrm" name="registerStudentFrm" onsubmit="return false;">
    <fieldset>
        <input type="hidden" name="userTypeId" id="userTypeId" value="<?php echo USERTYPE_STUDENT?>" />
            <div class="control-group">
                    <label class="control-label">Username <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtUserName" id="txtUserName" style="width: 250px;" maxlength="40" class="required" 
                               onblur="isStudentUserExist(this.value);" />
                    </div>
            </div>  
        
            <div class="control-group">
                    <label class="control-label">Password <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="password"  name="txtPassword" id="txtPassword" style="width: 250px;" maxlength="40" class="required"/>
                    </div>
            </div> 
            
           <div class="control-group">
                    <label class="control-label">First Name <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtFname" id="txtFname" style="width: 250px;" maxlength="40" class="required"/>
                    </div>
            </div>
          <div class="control-group">
                    <label class="control-label">Middle Name <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtmname" id="txtmname" style="width: 250px;" maxlength="40" class="required"/>
                    </div>
         </div>  
         <div class="control-group">
                    <label class="control-label">Last Name <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtlname" id="txtlname" style="width: 250px;" maxlength="40" class="required"/>
                    </div>
         </div>  
         
         
         
         <div class="control-group">
                    <label class="control-label">Phone No <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtPhoneNo" id="txtPhoneNo" style="width: 250px;" maxlength="40" class="required"/>
                    </div>
         </div>  
         <div class="control-group">
                    <label class="control-label">Email <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtEmail" id="txtEmail" style="width: 250px;" maxlength="40" class="required"/>
                    </div>
         </div>  
        <div class="control-group">
                    <label class="control-label">DOB <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtDOB" id="txtDOB" style="width: 250px;" maxlength="40" class="required" readonly="readonly"/>
                    </div>
         </div>  
         <div class="control-group">
                    <label class="control-label">DOJ <strong style="color: red;">*</strong></label>
                    <div class="controls">
                         <input type="text"  name="txtDOJ" id="txtDOJ" style="width: 250px;" maxlength="40" class="required" readonly="readonly"/>
                    </div>
         </div>
        <?php 
            
            if($_SESSION['userTypeId'] == USERTYPE_ADMIN){ ?>
                <div class="control-group">
                    <label class="control-label">Department <strong style="color: red;">*</strong></label>
                    <div class="controls">
                      <select data-rel="chosen" id="deptSelect" style="width: 180px;" name="deptSelect">
                            <option value="">Select Department</option>
                                <?php  for($i=0; $i <count($deptList); $i++){  ?>
                                    <option value="<?php echo $deptList[$i]['id'] ?>"><?php echo $deptList[$i]['name'] ?></option>
                               <?php  } ?>
                      </select>
                    </div>
             </div>
        <?php    }else{  ?>
                 <input type="hidden" name="deptSelect" id="deptSelect" value="<?php echo $_SESSION['sessionDeptId']?>" />
        <?php    }
        
        ?>
        
         
        <div class="control-group">
                    <label class="control-label">Semester <strong style="color: red;">*</strong></label>
                    <div class="controls">
                      <select data-rel="chosen" id="semSelect" style="width: 180px;" name="semSelect">
                            <option value="">Select Semester</option>
                                <?php  for($i=0; $i <count($semList); $i++){  ?>
                                    <option value="<?php echo $semList[$i]['id'] ?>"><?php echo $semList[$i]['name'] ?></option>
                               <?php  } ?>
                      </select>
                    </div>
         </div>
        <h5>Present Address Details</h5>
         <div class="control-group">
                    <label class="control-label">Address <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <textarea rows="5" cols="10" name="txtPAddress" id="txtPAddress" style="width: 250px;" maxlength="200" class="required"></textarea>
                    </div>
         </div>  
         <div class="control-group">
                    <label class="control-label">State <strong style="color: red;">*</strong></label>
                    <div class="controls">
                         <input type="text"  name="txtPState" id="txtPState" style="width: 250px;" maxlength="40" class="required"/>
                    </div>
         </div>  
        <div class="control-group">
                    <label class="control-label">City <strong style="color: red;">*</strong></label>
                    <div class="controls">
                         <input type="text"  name="txtPCity" id="txtPCity" style="width: 250px;" maxlength="40" class="required"/>
                    </div>
         </div>  
        
        <h5>Permanent Address Details <button type="button" onclick="copyPresentAddressToPermanentAddress();" >Copy</button> </h5>
         <div class="control-group">
                    <label class="control-label">Address <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <textarea rows="5" cols="10" name="txtPerAddress" id="txtPerAddress" style="width: 250px;" maxlength="200" class="required"></textarea>
                    </div>
         </div>  
         <div class="control-group">
                    <label class="control-label">State <strong style="color: red;">*</strong></label>
                    <div class="controls">
                         <input type="text"  name="txtPerState" id="txtPerState" style="width: 250px;" maxlength="40" class="required"/>
                    </div>
         </div>  
        <div class="control-group">
                    <label class="control-label">City <strong style="color: red;">*</strong></label>
                    <div class="controls">
                         <input type="text"  name="txtPerCity" id="txtPerCity" style="width: 250px;" maxlength="40" class="required"/>
                    </div>
         </div> 
        
        <div class="form-actions">
              <button type="submit" class="btn btn-primary" > 
                    Submit
              </button>
      </div>	
    </fieldset>

</form>
</div>
<script src="developerjs/student_details.js"></script>
<script src="js/charisma.js"></script>
<script type="text/javascript">
$(function() {
	$("#txtDOB").datepicker({ changeMonth: true,   changeYear: true,dateFormat: 'yy-mm-dd',yearRange: "-100:+0" });
        $("#txtDOJ").datepicker({ changeMonth: true,   changeYear: true,dateFormat: 'yy-mm-dd',yearRange: "-100:+0" });
	 
});  
</script>