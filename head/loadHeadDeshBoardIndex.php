<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$head_id = $_SESSION['sessionUserId'];
        if(!empty($head_id)){
            $scheduleList= getPendingScheduleForHead($head_id,array());
         }
?>
<div style="padding: 10px;">
<h3>DashBoard :</h3>
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
   <?php if($scheduleList != null && count($scheduleList) > 0){ ?>
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
                                          onclick="approveAndSentToAdmin('<?php echo $scheduleList[$i]['schedule_id']; ?>');">
                                            <i class="icon-ok icon-white"></i> Approve & Send                 
                                       </a>				
                                 </td>
                            </tr> 
             <?php  } ?>                                                          
   		<?php }else{ ?>
   			<tr>
   				<td colspan="9" style="color:red;">No Record found</td>
   			</tr>
       <?php }  ?>
        </tbody>
      </table>
</div>
<script src="js/charisma.js"></script>   