<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
?>
<div style="padding: 10px;">
<h4>Give Schedule :</h4><br/>
<form class="form-horizontal" id="feedbackfrm" name="feedbackfrm" onsubmit="return false;">
    <fieldset>
       
          <div class="control-group">
                    <label class="control-label">Subject <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text"  name="txtSubject" id="txtSubject" style="width: 320px;" 
                                maxlength="150" class="required"  />
                    </div>
         </div>  
        <div class="control-group">
                    <label class="control-label">Message <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <textarea id="txtMsg" name="txtMsg" cols="5" rows="10" style="width: 320px;" ></textarea>
                    </div>
         </div> 
        <div class="form-actions">
              <button type="submit" class="btn btn-primary" > 
                    Submit
              </button>
      </div>	
    </fieldset>
</form>
   <div id="listFeedback"></div> 
</div>
<script src="developerjs/student_details.js"></script>
<script src="js/charisma.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        listFeedBackBySM();
    });
</script>