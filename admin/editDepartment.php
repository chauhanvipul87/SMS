	<?php
        include_once '../com/sms/common/request/commonRequestHandler.php';
		
        $dept_id       = trim($_GET["dept_id"]);
        if(!empty($dept_id)){
                
			$filterArray = array();
  			$filterArray['dept_id']  = $dept_id;
			$deptDetails= getAllDepartment($filterArray);
	?>		
	<div class="box-content">	
		<h4>Edit Department</h4><br/>
		<a class="btn btn-success" href="javascript:void(0);" onclick="listDepartments();">
					<i class="icon-arrow-left icon-white"></i> Back                                            
		</a><br/>	
	  <?php if($deptDetails !=null && count($deptDetails) > 0){ 	?>
		<form class="form-horizontal" id="editDepartmentFrm" name="editDepartmentFrm" onsubmit="return false;">
		    <fieldset>
                         <input type="hidden" name="dept_id" id="dept_id" value="<?php echo $dept_id ?>" />
		         <div class="control-group">
                                <label class="control-label">Department Name <strong style="color: red;">*</strong></label>
                                <div class="controls">
                                    <input type="text"  name="txtDeptName" id="txtDeptName" style="width: 250px;" maxlength="40" class="required" 
                                           onblur="isDepartmentExist(this.value);" value="<?php echo $deptDetails[0]['name'] ?>" />
                                </div>
                        </div>  
		        <div class="form-actions">
		              <button type="submit" class="btn btn-primary" > 
		                    Update
		              </button>
		      </div>	
		    </fieldset>
		
		</form>
		<script src="developerjs/admin_details.js"></script>
		<script src="js/charisma.js"></script>
	  <?php	}else{ ?>
		 No Record Found...
	  <?php	} ?>		
			
	</div>			
     <?php }else {
            // Error Msessage.
            showErrorMessage("Please send request with proper parameters.");
            exit();
        } 

	  ?>
        
      




;