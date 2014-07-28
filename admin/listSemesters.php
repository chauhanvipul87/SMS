<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
    
    $semList= getAllSemester();
	?>
	<div class="box-content">
		<h4>List Semester</h4><br/>	
                <table class="table table-striped table-bordered bootstrap-datatable datatable" style="width: 150px;">
		  <thead>
			  <tr>
				  <th>Semester Name</th>
			  </tr>
		  </thead>   
		 <tbody>
	
                <?php if($semList != null && count($semList) > 0){
                             for($i=0; $i <count($semList); $i++){  ?>
                          <tr>
                            <td width="200px;"><?php echo $semList[$i]['name'] ?></td>
                         </tr> 
                 <?php  } ?>                                                          

                    <?php }else{ ?>
   			<tr>
   				<td colspan="1" style="color:red;">No Record found</td>
   			</tr>
       <?php }  ?>
   	</tbody>
	</table>
</div>	         
<script src="js/charisma.js"></script>              
       