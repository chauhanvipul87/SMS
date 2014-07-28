	<?php
        	include_once '../com/sms/common/request/commonRequestHandler.php';
	        $md_id       = trim($_GET["md_id"]);
                if(!empty($md_id)){
                
			$filterArray = array();
  			$filterArray['md_id']  = $md_id;
			$userDetails= getHeadMasterListByStatus(USERTYPE_HEAD,$filterArray);
	?>		
	<div class="box-content">	
		<h4>Edit Head Master Users</h4><br/>
		<a class="btn btn-success" href="javascript:void(0);" onclick="listHeadMasters();">
					<i class="icon-arrow-left icon-white"></i> Back                                            
		</a><br/>	
	  <?php if($userDetails !=null && count($userDetails) > 0){ 	?>
		<form class="form-horizontal" id="editHeadMasterFrm" name="editHeadMasterFrm" onsubmit="return false;">
		    <fieldset>
		        <input type="hidden" name="userTypeId" id="userTypeId" value="<?php echo USERTYPE_HEAD ?>" />
		        <input type="hidden" name="md_id" id="md_id" value="<?php echo $md_id ?>" />
		        
		            <div class="control-group">
		                    <label class="control-label">Username <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <input type="text"  name="txtUserName" id="txtUserName" style="width: 250px;"  maxlength="40" class="required" readonly="readonly"
		                         value="<?php echo $userDetails[0]['user_name'] ?>" />
		                    </div>
		            </div>  
		        
		           <div class="control-group">
		                    <label class="control-label">First Name <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <input type="text"  name="txtFname" id="txtFname" style="width: 250px;" maxlength="40" class="required" 
		                        value="<?php echo $userDetails[0]['fname'] ?>"/>
		                    </div>
		            </div>
		          <div class="control-group">
		                    <label class="control-label">Middle Name <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <input type="text"  name="txtmname" id="txtmname" style="width: 250px;" maxlength="40" class="required" 
		                        value="<?php echo $userDetails[0]['mname'] ?>" />
		                    </div>
		         </div>  
		         <div class="control-group">
		                    <label class="control-label">Last Name <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <input type="text"  name="txtlname" id="txtlname" style="width: 250px;" maxlength="40" class="required"
		                        value="<?php echo $userDetails[0]['lname'] ?>"/>
		                    </div>
		         </div>  
		         <div class="control-group">
		                    <label class="control-label">Phone No <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <input type="text"  name="txtPhoneNo" id="txtPhoneNo" style="width: 250px;" maxlength="40" class="required"
		                        value="<?php echo $userDetails[0]['phone_no'] ?>"/>
		                    </div>
		         </div>  
		         <div class="control-group">
		                    <label class="control-label">Email <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <input type="text"  name="txtEmail" id="txtEmail" style="width: 250px;" maxlength="40" class="required"
		                        value="<?php echo $userDetails[0]['email'] ?>"/>
		                    </div>
		         </div>  
		        <div class="control-group">
		                    <label class="control-label">DOB <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <input type="text"  name="txtDOB" id="txtDOB" style="width: 250px;" maxlength="40" class="required" readonly="readonly"
		                        value="<?php echo $userDetails[0]['dob'] ?>"/>
		                    </div>
		         </div>  
		         <div class="control-group">
		                    <label class="control-label">DOJ <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                         <input type="text"  name="txtDOJ" id="txtDOJ" style="width: 250px;" maxlength="40" class="required" readonly="readonly"
		                         value="<?php echo $userDetails[0]['doj'] ?>"/>
		                    </div>
		         </div>
                        <div class="control-group">
                                <label class="control-label">Department <strong style="color: red;">*</strong></label>
                                <div class="controls">
                                        <input type="text" style="width: 250px;" maxlength="40" class="required" readonly="readonly"
		                         value="<?php echo $userDetails[0]['dept_name'] ?>"/>
                                  </div>
                       </div>
                        
                        
		        <h5>Present Address Details</h5>
		         <div class="control-group">
		                    <label class="control-label">Address <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <textarea rows="5" cols="10" name="txtPAddress" id="txtPAddress" style="width: 250px;" maxlength="200" class="required"><?php echo $userDetails[0]['paddress'] ?></textarea>
		                    </div>
		         </div>  
		         <div class="control-group">
		                    <label class="control-label">State <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                         <input type="text"  name="txtPState" id="txtPState" style="width: 250px;" maxlength="40" class="required"
		                         value="<?php echo $userDetails[0]['pstate'] ?>"/>
		                    </div>
		         </div>  
		        <div class="control-group">
		                    <label class="control-label">City <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                         <input type="text"  name="txtPCity" id="txtPCity" style="width: 250px;" maxlength="40" class="required"
		                         value="<?php echo $userDetails[0]['pcity'] ?>"/>
		                    </div>
		         </div>  
		        
		        <h5>Permanent Address Details <button type="button" onclick="copyPresentAddressToPermanentAddress();" >Copy</button> </h5>
		         <div class="control-group">
		                    <label class="control-label">Address <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                        <textarea rows="5" cols="10" name="txtPerAddress" id="txtPerAddress" style="width: 250px;" maxlength="200" class="required"><?php echo $userDetails[0]['peraddress'];?></textarea>
		                    </div>
		         </div>  
		         <div class="control-group">
		                    <label class="control-label">State <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                         <input type="text"  name="txtPerState" id="txtPerState" style="width: 250px;" maxlength="40" class="required"
		                         value="<?php echo $userDetails[0]['perstate'] ?>"/>
		                    </div>
		         </div>  
		        <div class="control-group">
		                    <label class="control-label">City <strong style="color: red;">*</strong></label>
		                    <div class="controls">
		                         <input type="text"  name="txtPerCity" id="txtPerCity" style="width: 250px;" maxlength="40" class="required"
		                         value="<?php echo $userDetails[0]['percity'] ?>"/>
		                    </div>
		         </div> 
		        
		        <div class="form-actions">
		              <button type="submit" class="btn btn-primary" > 
		                    Update
		              </button>
		      </div>	
		    </fieldset>
		
		</form>
		<script src="developerjs/head_details.js"></script>
		<script src="js/charisma.js"></script>
		<script type="text/javascript">
		$(function() {
			$("#txtDOB").datepicker({ changeMonth: true,   changeYear: true,dateFormat: 'yy-mm-dd',yearRange: "-100:+0" });
                        $("#txtDOJ").datepicker({ changeMonth: true,   changeYear: true,dateFormat: 'yy-mm-dd',yearRange: "-100:+0" });
			 
		});  
		</script>
	  <?php	}else{ ?>
			<tr>
   				<td colspan="2" style="color:red;">No Record found</td>
   			</tr>
	  <?php	} ?>		
			</thead>   
	  </table>
	</div>			
     <?php }else {
            // Error Msessage.
            showErrorMessage("Please send request with proper parameters.");
            exit();
        } 

	  ?>
        