<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
?>
<div style="padding: 10px;">
<h4>Get Schedule :</h4><br/>
<form class="form-horizontal" id="frmGetHeadSchedule" name="frmGetHeadSchedule" onsubmit="return false;">
    <fieldset>
       
          <div class="control-group">
                    <label class="control-label">Date Of Schedule <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtDateOfSchedule" id="txtDateOfSchedule" style="width: 250px;" 
                               maxlength="20" class="required" readonly="readonly" />
                    </div>
         </div>  
        <div class="form-actions">
              <button type="submit" class="btn btn-primary" > 
                    Get
              </button>
      </div>	
    </fieldset>
</form>
   <div id="listScheduleRes"></div> 
</div>
<script src="developerjs/head_details.js"></script>
<script src="js/charisma.js"></script>
<script type="text/javascript">
$(function() {
	$("#txtDateOfSchedule").datepicker({ minDate: 0,dateFormat: 'yy-mm-dd',beforeShowDay: function(date) { var day = date.getDay();  return [day != 0,''];}});
});  
</script>