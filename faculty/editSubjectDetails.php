	<?php
        	include_once '../com/sms/common/request/commonRequestHandler.php';
	        $sub_id       = trim($_GET["sub_id"]);
                if(!empty($sub_id)){
			$filterArray = array();
  			$filterArray['sub_id']  = $sub_id;
			$subjectDetails= getAllSubjectList($filterArray);
	?>		
	<div class="box-content">	
		<h4>Edit Subject Details</h4><br/>
                <a class="btn btn-success" href="javascript:void(0);" onclick="listSubjectMasters();">
					<i class="icon-arrow-left icon-white"></i> Back                                            
		</a><br/>	
	  <?php if($subjectDetails !=null && count($subjectDetails) > 0){ 	?>
		<form class="form-horizontal" id="editSubjectFrm" name="editSubjectFrm" onsubmit="return false;">
		    <fieldset>
		        <input type="hidden" name="sub_id" id="sub_id" value="<?php echo $sub_id ?>" />
                        <input type="hidden" name="deptSelect" id="deptSelect" value="<?php echo $subjectDetails[0]['dept_id'] ?>" />
                        <input type="hidden" name="semSelect" id="semSelect"  value="<?php echo $subjectDetails[0]['sem_id'] ?>" />
		        
		            <div class="control-group">
		                    <label class="control-label">Department Name <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <input type="text"  style="width: 250px;"  class="required" readonly="readonly"
		                         value="<?php echo $subjectDetails[0]['dept_name'] ?>" />
		                    </div>
		            </div>
                             <div class="control-group">
		                    <label class="control-label">Semester <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <input type="text"  style="width: 250px;" class="required" readonly="readonly"
		                         value="<?php echo $subjectDetails[0]['sem_name'] ?>" />
		                    </div>
		            </div>  
                           <div class="control-group">
		                    <label class="control-label">Subject Name <strong style="color: red;">*</strong></label>
		                    <div class="controls">
                                        <input type="text"  name="txtSubjectName" id="txtSubjectName" style="width: 250px;" maxlength="40" class="required" 
                                            value="<?php echo $subjectDetails[0]['sub_title'] ?>"     onblur="isSubjectExist(this.value);" />    
		                    </div>
		            </div>  
		        <div class="form-actions">
		              <button type="submit" class="btn btn-primary" > 
		                    Update
		              </button>
		      </div>	
		    </fieldset>
		
		</form>
		<script src="developerjs/faculty_details.js"></script>
		<script src="js/charisma.js"></script>
	  <?php	}else{ ?>
               <div style="color:red;">No Record found</div>
	  <?php	} ?>		
     <?php }else {
            // Error Msessage.
            showErrorMessage("Please send request with proper parameters.");
            exit();
        } 
     ?>        