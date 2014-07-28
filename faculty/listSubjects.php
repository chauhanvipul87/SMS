<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        if($_SESSION['userTypeId'] == USERTYPE_ADMIN){ 
            $subjectList= getAllSubjectList();
         }else{ 
            $filterArray = array();
            $filterArray['dept_id']  = $_SESSION['sessionDeptId'];
            $subjectList= getAllSubjectList($filterArray);
         }
        
        
        
        
        
         
?>
	<div class="box-content">
		<h4>List Subjects </h4><br/>	
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th>Department Name </th>
				  <th>Semester</th>
                                  <th>Subject Name</th>
				  <th>Actions</th>
			  </tr>
		  </thead>   
		 <tbody>
	
    <?php if($subjectList != null && count($subjectList) > 0){
		 for($i=0; $i <count($subjectList); $i++){  ?>
                <tr>
					
					<td class="center"><?php echo $subjectList[$i]['dept_name'] ?></td>
					<td class="center"><?php echo $subjectList[$i]['sem_name'] ?></td>
                                        <td><?php echo $subjectList[$i]['sub_title'] ?></td>
					<td class="center">
						<a class="btn btn-info" href="javascript:void(0);" onclick="editSubjectDetails('<?php echo $subjectList[$i]['sub_id']?>');">
							<i class="icon-edit icon-white"></i>  
							Edit                                            
						</a>
						<a class="btn btn-danger" href="javascript:void(0);" onclick="deleteSubject('<?php echo $subjectList[$i]['sub_id']?>');">
							<i class="icon-trash icon-white"></i> 
							Delete
						</a>
					</td>
				</tr> 
             <?php  } ?>                                                          
			
   		<?php }else{ ?>
   			<tr>
   				<td colspan="4" style="color:red;">Ohh!! Sorry, No Record found</td>
   			</tr>
       <?php }  ?>
   	</tbody>
	</table>
</div>
<script src="js/charisma.js"></script>
       