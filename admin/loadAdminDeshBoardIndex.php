<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$head_id = $_SESSION['sessionUserId'];
        if(!empty($head_id)){
            $scheduleList= getPendingScheduleForAdmin(array());
         }
?>
<div style="padding: 10px;">
<h3>DashBoard :</h3>
   <?php if($scheduleList != null && count($scheduleList) > 0){ ?>
                 <table class="table table-striped table-bordered bootstrap-datatable datatable"> 
                    <thead>
                            <tr>
                                <th width="20%">Semester</th>
                                <th>Subject Name</th>
                                <th>Faculty Name</th>
                                <th>Date</th>                
                                <th>Type</th>
                                <th>Sequence</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Action</th>
                            </tr>
                    </thead>   
                   <tbody>
                <?php for($i=0; $i <count($scheduleList); $i++){  ?>
                            <tr>
                                <td class="center"><?php echo $scheduleList[$i]['sem_name'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['sub_title'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['fname'].' '.$scheduleList[$i]['lname'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['session_date']?></td>
                                <td class="center"><?php if($scheduleList[$i]['sessiontype_id']==1){  echo 'Lecture'; }else{echo 'Leb';} ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['session_sequence'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['present'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['absent'] ?></td>
                                <td class="center">
                                       <a class="btn btn-success" title="Mark to Approve" href="javascript:void(0);" 
                                          onclick="approveStudentLogByAdmin('<?php echo $scheduleList[$i]['schedule_id']; ?>');">
                                            <i class="icon-ok icon-white"></i> Approve           
                                       </a>				
                                 </td>
                            </tr> 
             <?php  } ?>  
                   </tbody>      
   		<?php }else{ ?>
                        <table class="table table-striped table-bordered"> 
                         <thead>
                                 <tr>
                                     <th width="20%">Semester</th>
                                     <th>Subject Name</th>
                                     <th>Faculty Name</th>
                                     <th>Date</th>                
                                     <th>Type</th>
                                     <th>Sequence</th>
                                     <th>Present</th>
                                     <th>Absent</th>
                                     <th>Action</th>
                                 </tr>
                         </thead>   
                        <tbody>
   			<tr>
   				<td colspan="9" style="color:red;">No Record found</td>
   			</tr>
                        </tbody>
                         </table>
                        
       <?php }  ?>
    
     
</div>
<script src="js/charisma.js"></script>   