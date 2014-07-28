<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$head_id = $_SESSION['sessionUserId'];
        if(!empty($head_id)){
            
?>
<div style="padding: 10px;">
<h4>Add Attendance </h4><br/>
<form class="form-horizontal" id="timeAttendanceFrm" name="timeAttendanceFrm" onsubmit="return false;">
    <fieldset>
             <div class="control-group">
                    <label class="control-label">Schedule Date <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text" id="txtScheduleDate" name="txtScheduleDate" style="width: 250px;"
                               class="required" readonly="readonly" value=""  />
                    </div>
            </div> 

        <div class="form-actions">
              <button type="submit" class="btn btn-primary" > 
                    Show
              </button>
      </div>	
    </fieldset>
    <div id="listScheduleDiv"></div>
</form>
 <div id=""></div>
</div>
<script src="developerjs/head_details.js"></script>
<script src="js/charisma.js"></script>
<script type="text/javascript">
$(function() {
       
	$("#txtScheduleDate").datepicker({ changeMonth: true,   changeYear: true,dateFormat: 'yy-mm-dd',yearRange: "-100:+0",
                beforeShowDay: function(date) { var day = date.getDay();  return [day != 0,'']; }});
	 
});  
</script>

  <?php  }else{
      
        showErrorMessage("Please send request with proper parameters.");
        exit();
  } 
       
  ?>