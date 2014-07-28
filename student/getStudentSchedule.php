<?php
        include_once '../com/sms/common/request/commonRequestHandler.php';
        $sm_id       = trim($_SESSION['sessionUserId']);
        $session_date       = trim($_GET['txtDateOfSchedule']);
        if(!empty($sm_id)){
            $filterArray = array();
            $filterArray['md_id']  = $sm_id;
            $userDetails= getStudentMasterListByStatus(USERTYPE_STUDENT,$filterArray);
            //print_r ($userDetails);
            if($userDetails !=null && count($userDetails) > 0 ){
                $dept_id = $userDetails[0]['dept_id'];
                $sem_id = $userDetails[0]['sem_id'];
                $filterHeadMasterArr = array();
                $filterHeadMasterArr['dept_id']  = $dept_id;
                $filterHeadMasterArr['approved_status']  = STATUS_APPROVED;
                
                $headMasterDetails = getHeadMasterListByStatus(USERTYPE_HEAD,$filterHeadMasterArr);
                if($headMasterDetails !=null && count($headMasterDetails) > 0 ){
                    $hm_id = $headMasterDetails[0]['md_id'];
                    $filterScheduleArr = array();
                    $filterScheduleArr['sem_id']  = $sem_id;
                    $filterScheduleArr['session_date']  = $session_date;
                    $scheduleList = getAllScheduleDetails($hm_id, $filterScheduleArr);
    ?>    
    <?php if($scheduleList != null && count($scheduleList) > 0){ ?>
            <table class="table table-striped table-bordered"> 
                          <thead>
                                  <tr>
                                      <th width="20%">Schedule Sequence</th>
                                      <th>Subject Name</th>
                                      <th>Type</th>
                                      <th>Faculty Name</th>
                                      
                                  </tr>
                          </thead>   
                         <tbody>
                <?php for($i=0; $i <count($scheduleList); $i++){  ?>
               
                            <tr>
                                <td class="center"><?php echo $scheduleList[$i]['session_sequence'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['sub_title'] ?></td>
                                <td class="center"><?php if($scheduleList[$i]['sessiontype_id']==1){  echo 'Lecture'; }else{echo 'Leb';} ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['fname'].' '.$scheduleList[$i]['lname'] ?></td>
                            
                            </tr> 
             <?php  } ?>                                                          
   		<?php }else{ ?>
                      <table class="table table-striped table-bordered"> 
                        <thead>
                                 <tr>
                                      <th>Schedule Sequence</th>
                                      <th>Subject Name</th>
                                      <th>Type</th>
                                      <th>Faculty Name</th>
                                      
                                  </tr>
                        </thead>   
                       <tbody>   
   			<tr>
   				<td colspan="4" style="color:red;">No Record found</td>
   			</tr>
       <?php }  ?>
   	</tbody>
	</table>
        
   <?php             }else{
                    // Error Msessage.
                    showErrorMessage("Please send request with proper parameters.");
                    exit();
                }
            }else{
                // Error Msessage.
                showErrorMessage("Something went wrong while fetching schedule details.");
                exit();
            }
                
        }else{
             // Error Msessage.
            showErrorMessage("Please send request with proper parameters.");
            exit();
        }
  ?>		