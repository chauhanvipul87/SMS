<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
?>
<div style="padding: 10px;">
<h4>Select dates to show schedule report</h4><br/>
<form class="form-horizontal" id="attendanceReprotFrm" name="attendanceReprotFrm" action="getReport.php">
    <input type="hidden" name="opt" value="AttendanceReport" />
    <fieldset>
        <div class="control-group">
                    <label class="control-label">Start Date <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtStartDate" id="txtStartDate" style="width: 250px;" maxlength="40" class="required" readonly="readonly"/>
                    </div>
         </div>  
         <div class="control-group">
                    <label class="control-label">End Date <strong style="color: red;">*</strong></label>
                    <div class="controls">
                         <input type="text"  name="txtEndDate" id="txtEndDate" style="width: 250px;"
                                    maxlength="40" class="required" readonly="readonly"/>
                    </div>
         </div>
        
        <div class="form-actions">
              <button type="submit" class="btn btn-primary" > 
                    Get Report
              </button>
      </div>	
    </fieldset>

</form>


</div>
<script src="developerjs/admin_details.js"></script>
<script src="js/charisma.js"></script>
<script type="text/javascript">
$(function() {
	$("#txtStartDate").datepicker({ changeMonth: true,   changeYear: true,dateFormat: 'yy-mm-dd',yearRange: "-100:+0" });
        $("#txtEndDate").datepicker({ changeMonth: true,   changeYear: true,dateFormat: 'yy-mm-dd',yearRange: "-100:+0" });
	 
});  
</script>