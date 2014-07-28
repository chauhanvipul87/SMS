<?php
        include_once '../com/sms/common/request/commonRequestHandler.php';
        $hm_id          = trim($_SESSION['sessionUserId']);
        $session_date   = trim($_GET['txtDateOfSchedule']);
        if(!empty($hm_id)){
                $filterScheduleArr = array();
                $filterScheduleArr['session_date']  = $session_date;
                $scheduleList = getAllScheduleDetails($hm_id, $filterScheduleArr);
                    
    ?>    
    <?php if($scheduleList != null && count($scheduleList) > 0){ ?>
            <table class="table table-striped table-bordered bootstrap-datatable datatable"> 
                          <thead>
                                  <tr>
                                      <th width="20%">Semester</th>
                                      <th>Subject Name</th>
                                      <th>Faculty Name</th>
                                      <th>Type</th>
                                      <th>Sequence</th>
                                      <th>Action</th>
                                  </tr>
                          </thead>   
                         <tbody>
                <?php for($i=0; $i <count($scheduleList); $i++){  ?>
               
                            <tr>
                                <td class="center"><?php echo $scheduleList[$i]['sem_name'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['sub_title'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['fname'].' '.$scheduleList[$i]['lname'] ?></td>
                                <td class="center"><?php if($scheduleList[$i]['sessiontype_id']==1){  echo 'Lecture'; }else{echo 'Leb';} ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['session_sequence'] ?></td>
                                 <td class="center">
                                       <a class="btn btn-success" title="Mark to Approve" href="javascript:void(0);" onclick="assignScheduleToOthers('<?php echo $scheduleList[$i]['schedule_id']; ?>','<?php echo $scheduleList[$i]['fm_id']; ?>');">
                                            <i class="icon-adjust icon-white"></i> Assign to Other                  
                                       </a>				
                                 </td>
                            </tr> 
             <?php  } ?>                                                          
   		<?php }else{ ?>
                      <table class="table table-striped table-bordered"> 
                        <thead>
                                 <tr>
                                      <th width="20%">Semester</th>
                                      <th>Subject Name</th>
                                      <th>Faculty Name</th>
                                      <th>Type</th>
                                      <th>Sequence</th>
                                      <th>Action</th>
                                  </tr>
                        </thead>   
                       <tbody>   
   			<tr>
   				<td colspan="6" style="color:red;">No Record found</td>
   			</tr>
       <?php }  ?>
   	</tbody>
	</table>
       <script src="js/charisma.js"></script>                    
   <?php             
           }else{
                // Error Msessage.
                showErrorMessage("Please send request with proper parameters.");
                exit();
            }
  ?>		
                       