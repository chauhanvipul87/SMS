<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
    
    $deptList= getAllDepartment();
	?>
	<div class="box-content">
		<h4>List Departments</h4><br/>	
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th>Department Name</th>
				  <th>Actions</th>
			  </tr>
		  </thead>   
		 <tbody>
	
                <?php if($deptList != null && count($deptList) > 0){
                             for($i=0; $i <count($deptList); $i++){  ?>
                    <tr>
                            <td width="200px;"><?php echo $deptList[$i]['name'] ?></td>
                            <td class="center">
                                    <a class="btn btn-info" href="javascript:void(0);" onclick="editDepartment('<?php echo $deptList[$i]['id']?>');">
                                            <i class="icon-edit icon-white"></i>  
                                            Edit                                            
                                    </a>
                                    <a class="btn btn-danger" href="javascript:void(0);" onclick="deleteDepartment('<?php echo $deptList[$i]['id']?>');">
                                            <i class="icon-trash icon-white"></i> 
                                            Delete
                                    </a>
                            </td>
                         </tr> 
                 <?php  } ?>                                                          

                    <?php }else{ ?>
   			<tr>
   				<td colspan="2" style="color:red;">No Record found</td>
   			</tr>
       <?php }  ?>
   	</tbody>
	</table>
</div>	         
<script src="js/charisma.js"></script>              
       