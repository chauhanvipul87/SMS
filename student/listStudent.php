<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        
        if($_SESSION['userTypeId'] == USERTYPE_ADMIN){ 
            $usersList= getStudentMasterListByStatus(USERTYPE_STUDENT,null);
         }else{ 
            $filterArray = array();
            $filterArray['dept_id']  = $_SESSION['sessionDeptId'];
            $usersList= getStudentMasterListByStatus(USERTYPE_STUDENT,$filterArray);
         }
        
        
?>
	<div class="box-content">
		<h4>List Student Master <input type="button" value="Approve All Pending Users" onclick="approvedAll('student');" class="btn btn-primary" /></h4><br/>	
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th>Username</th>
				  <th>First Name</th>
				  <th>Last Name</th>
				  <th>Phone</th>
				  <th>Email</th>
                                  <th>Department</th>
				  <th>Status</th>
				  <th>Actions</th>
			  </tr>
		  </thead>   
		 <tbody>
	
    <?php if($usersList != null && count($usersList) > 0){
		 for($i=0; $i <count($usersList); $i++){  ?>
                <tr>
					<td><?php echo $usersList[$i]['user_name'] ?></td>
					<td class="center"><?php echo $usersList[$i]['fname'] ?></td>
					<td class="center"><?php echo $usersList[$i]['lname'] ?></td>
					<td class="center"><?php echo $usersList[$i]['phone_no'] ?></td>
					<td class="center"><?php echo $usersList[$i]['email'] ?></td>
                                        <td class="center"><?php echo $usersList[$i]['dept_name'] ?></td>
					<td class="center">
						<?php 
							if(trim($usersList[$i]['approved_status']) == STATUS_PENDING){ ?>
								<span class="label label-warning" style="color: black;" >Pending</span>				
						<?php }else if(trim($usersList[$i]['approved_status']) == STATUS_APPROVED){ ?>
							<span class="label label-success">Approved</span>	
						<?php }else if(trim($usersList[$i]['approved_status']) == STATUS_NOTAPPROVED){ ?>
							<span class="label label-important">Not Approved</span>	
						<?php }?>			
					</td>
					<td class="center">
                                            <?php 
						   if(trim($usersList[$i]['approved_status']) == STATUS_PENDING){ ?>
                                                      <a class="btn btn-success" title="Mark to Approve" href="javascript:void(0);" onclick="approveUserById('<?php echo $usersList[$i]['md_id']?>','student');">
                                                                <i class="icon-ok icon-white"></i>                 
                                                        </a>				
						<?php }else if(trim($usersList[$i]['approved_status']) == STATUS_APPROVED){ ?>
                                                        <a class="btn btn-success" title="Mark to reject/not approved" href="javascript:void(0);" onclick="rejectUserById('<?php echo $usersList[$i]['md_id']?>','student');">
                                                                <i class="icon-remove icon-white"></i>  
                                                        </a>	
                                            
						<?php }else if(trim($usersList[$i]['approved_status']) == STATUS_NOTAPPROVED){ ?>
                                                        <a class="btn btn-success" title="Mark to Approve" href="javascript:void(0);" onclick="approveUserById('<?php echo $usersList[$i]['md_id']?>','student');">
                                                                <i class="icon-ok icon-white"></i>                  
                                                        </a>	
						<?php }?>
                                            
						<a class="btn btn-success" href="javascript:void(0);" onclick="viewStudentDetails('<?php echo $usersList[$i]['md_id']?>');">
							<i class="icon-zoom-in icon-white"></i>  
							View                                            
						</a>
						<a class="btn btn-info" href="javascript:void(0);" onclick="editStudentDetails('<?php echo $usersList[$i]['md_id']?>');">
							<i class="icon-edit icon-white"></i>  
							Edit                                            
						</a>
						<a class="btn btn-danger" href="javascript:void(0);" onclick="deleteStudentDetails('<?php echo $usersList[$i]['md_id']?>');">
							<i class="icon-trash icon-white"></i> 
							Delete
						</a>
					</td>
				</tr> 
             <?php  } ?>                                                          
			
   		<?php }else{ ?>
   			<tr>
   				<td colspan="8" style="color:red;">No Record found</td>
   			</tr>
       <?php }  ?>
   	</tbody>
	</table>
</div>	         
<script src="js/charisma.js"></script>        
       