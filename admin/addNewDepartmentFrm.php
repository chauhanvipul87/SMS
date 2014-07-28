<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
?>
<div style="padding: 10px;">
<h4>Add New Department</h4><br/>
<form class="form-horizontal" id="addNewDepartmentFrm" name="addNewDepartmentFrm" onsubmit="return false;">
    <fieldset>
            <div class="control-group">
                    <label class="control-label">Department Name <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtDeptName" id="txtDeptName" style="width: 250px;" maxlength="40" class="required" 
                               onblur="isDepartmentExist(this.value);" />
                    </div>
            </div>  
        <div class="form-actions">
              <button type="submit" class="btn btn-primary" > 
                    Add
              </button>
      </div>	
    </fieldset>

</form>
</div>
<script src="developerjs/admin_details.js"></script>
<script src="js/charisma.js"></script>