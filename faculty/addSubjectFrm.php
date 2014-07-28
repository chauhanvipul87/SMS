<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$deptList =getAllDepartment();
        $semList =getAllSemester();
	
?>
<div style="padding: 10px;">
<h4>Add Subject based on Department</h4><br/>
<form class="form-horizontal" id="addSubjectFrm" name="addSubjectFrm" onsubmit="return false;">
    <fieldset>
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
        
        
            <div class="control-group">
                    <label class="control-label">Subject Title <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtSubjectName" id="txtSubjectName" style="width: 250px;" maxlength="40" class="required" 
                               onblur="isSubjectExist(this.value);" />
                    </div>
            </div>  
        <div class="form-actions">
              <button type="submit" class="btn btn-primary" > 
                    Add Subject
              </button>
      </div>	
    </fieldset>

</form>
</div>
<script src="developerjs/faculty_details.js"></script>
<script src="js/charisma.js"></script>
