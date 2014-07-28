	<?php
		include_once '../com/sms/common/request/commonRequestHandler.php';
		
        $md_id       = trim($_GET["md_id"]);
        if(!empty($md_id)){
                
			$filterArray = array();
  			$filterArray['md_id']  = $md_id;
			$userDetails= getFacultyMasterListByStatus(USERTYPE_FACULTY,$filterArray);
	?>		
	<div class="box-content">	
		<h4>View Faculty Details</h4><br/>	
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
		 <tr>
			<th>
				<a class="btn btn-success" href="javascript:void(0);" onclick="listFacultyMasters();">
						<i class="icon-arrow-left icon-white"></i> Back                                            
				</a>
			</th>
			<td>&nbsp;</td>
		</tr>	 

	  <?php if($userDetails !=null && count($userDetails) > 0){ 	?>
		<tr>
			<th width="250px;" >Username</th>
			<td><?php echo $userDetails[0]['user_name'] ?></td>
		</tr>
		<tr>
			<th>Status</th>
			<td> <?php 
					if(trim($userDetails[0]['approved_status']) == STATUS_PENDING){ ?>
							<span class="label label-warning" style="color: black;" >Pending</span>				
					<?php }else if(trim($userDetails[0]['approved_status']) == STATUS_APPROVED){ ?>
						<span class="label label-success">Approved</span>	
					<?php }else if(trim($userDetails[0]['approved_status']) == STATUS_NOTAPPROVED){ ?>
						<span class="label label-important">Not Approved</span>	
					<?php }?>	
		  </td>
		</tr>
		<tr>
			<th>First Name</th>
			<td><?php echo $userDetails[0]['fname'] ?></td>
		</tr>
		<tr>
			<th>Middle Name</th>
			<td><?php echo $userDetails[0]['mname'] ?></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><?php echo $userDetails[0]['lname'] ?></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><?php echo $userDetails[0]['phone_no'] ?></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><?php echo $userDetails[0]['email'] ?></td>
		</tr>
		<tr>
			<th>DOB</th>
			<td><?php echo $userDetails[0]['dob'] ?></td>
		</tr>
		<tr>
			<th>DOJ</th>
			<td><?php echo $userDetails[0]['doj'] ?></td>
		</tr>
                <tr>
			<th>Department</th>
			<td><?php echo $userDetails[0]['dept_name'] ?></td>
		</tr>
                
		<tr>
			<th>Present Address Details</th>
			<td><div style="width: 200px;"><?php echo $userDetails[0]['paddress'] ?></div></td>
		</tr>
		<tr>
			<th>State</th>
			<td><?php echo $userDetails[0]['pstate'] ?></td>
		</tr>
		<tr>
			<th>City</th>
			<td><?php echo $userDetails[0]['pcity'] ?></td>
		</tr>
		<tr>
			<th>Permanent Address Details</th>
			<td><div style="width: 200px;"><?php echo $userDetails[0]['peraddress'] ?></div></td>
		</tr>
		<tr>
			<th>State</th>
			<td><?php echo $userDetails[0]['perstate'] ?></td>
		</tr>
		<tr>
			<th>City</th>
			<td><?php echo $userDetails[0]['percity'] ?></td>
		</tr>
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
        
      




;