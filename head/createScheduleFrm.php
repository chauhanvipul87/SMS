<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$head_id = $_SESSION['sessionUserId'];
        if(!empty($head_id)){
                
            $filterArray = array();
            $filterArray['md_id']  = $head_id;
            $userDetails= getHeadMasterListByStatus(USERTYPE_HEAD,$filterArray);
            $dept_id = $userDetails[0]['dept_id'];
            $dept_name = $userDetails[0]['dept_name'];
            
            $filterFacultyArray = array();
            $filterFacultyArray['dept_id']  = $dept_id;
            $facultyDetails= getFacultyMasterListByStatus(USERTYPE_FACULTY,$filterFacultyArray);
            $semtList = getAllSemester();
          
?>
<div style="padding: 10px;">
<h4>Create Schedule </h4><br/>
<form class="form-horizontal" id="createScheduleForm" name="createScheduleForm" onsubmit="return false;">
    <fieldset>
        <input type="hidden" name="dept_id" id="dept_id" value="<?php echo $dept_id ?>" />
        <input type="hidden" name="head_id" id="head_id" value="<?php echo $head_id ?>" />
        
            <div class="control-group">
                    <label class="control-label">Department Name <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text" value="<?php echo $dept_name ?>" style="width: 250px;" readonly="readonly" />
                    </div>
            </div>  
        
            <div class="control-group">
                    <label class="control-label">Schedule Date <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="text" id="txtScheduleDate" name="txtScheduleDate" style="width: 250px;" class="required" readonly="readonly"  />
                    </div>
            </div> 
            
           <div class="control-group">
                    <label class="control-label">Select Faculty <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <select data-rel="chosen" id="facultySelect" style="width: 250px;" name="facultySelect" onchange="getScheduleList(this.value);" >
                            <option value="">Select Faculty</option>
                                <?php  for($i=0; $i <count($facultyDetails); $i++){  ?>
                                    <option value="<?php echo $facultyDetails[$i]['md_id'] ?>"><?php echo $facultyDetails[$i]['fname'].' '.$facultyDetails[$i]['lname'] ?></option>
                               <?php  } ?>
                      </select>
                    </div>
            </div>
        
         <div class="control-group">
                <label class="control-label">Semester <strong style="color: red;">*</strong></label>
                <div class="controls">
                    <select data-rel="chosen" id="semSelect" style="width: 250px;" name="semSelect" onchange="getSubjectfrmHead(this.value);">
                        <option value="">Select Semester</option>
                            <?php  for($i=0; $i <count($semtList); $i++){  ?>
                                <option value="<?php echo $semtList[$i]['id'] ?>"><?php echo $semtList[$i]['name'] ?></option>
                           <?php  } ?>
                  </select>
                </div>
          </div>
        
        <div id="loadSubjectDiv"></div>
        
         <div class="control-group">
                    <label class="control-label">Schedule Sequence <strong style="color: red;">*</strong></label>
                    <div class="controls">
                      <select data-rel="chosen" id="sequenceSelect" style="width: 180px;" name="sequenceSelect">
                            <option value="">Select Schedule Sequence</option>
                                <?php  for( $i= 1; $i <6; $i++){  ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                               <?php  } ?>
                      </select>
                    </div>
          </div>
         <div class="control-group">
                    <label class="control-label">Schedule Type <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <input type="radio" name="scheduleType" id="lectureType" checked="checked" value="1" style="margin-left: 0px;" /> Lecture 
                        <input type="radio" name="scheduleType" id="labType" value="2" style="margin-left: 0px;"  /> Lab 
                    </div>
          </div>
         
         <div class="control-group">
                    <label class="control-label">Session About  <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <textarea name="sessionAbout" id="sessionAbout" rows="5" cols="10" maxlength="200" class="required"></textarea>
                    </div>
         </div>  
        <div class="form-actions">
              <button type="submit" class="btn btn-primary" > 
                    Submit
              </button>
      </div>	
    </fieldset>

</form>
        <div id="scheduleList"></div>
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