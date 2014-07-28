<?php
        include_once '../com/sms/common/request/commonRequestHandler.php';
        $fm_id       = trim($_SESSION['sessionUserId']);
        $session_date  = trim($_GET['txtDateOfSchedule']);
        if(!empty($fm_id)){
            $filterArray = array();
            $filterArray['session_date']  = $session_date;
            $scheduleList = getFacultyScheduleDetails($fm_id,$filterArray);
    ?>    
    <?php if($scheduleList != null && count($scheduleList) > 0){ ?>
            <table class="table table-striped table-bordered"> 
                          <thead>
                                  <tr>
                                      <th width="20%">Schedule Sequence</th>
                                      <th>Subject Name</th>
                                      <th>Type</th>
                                      
                                  </tr>
                          </thead>   
                         <tbody>
                <?php for($i=0; $i <count($scheduleList); $i++){  ?>
               
                            <tr>
                                <td class="center"><?php echo $scheduleList[$i]['session_sequence'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['sub_title'] ?></td>
                                <td class="center"><?php if($scheduleList[$i]['sessiontype_id']==1){  echo 'Lecture'; }else{echo 'Leb';} ?></td>
                            </tr> 
             <?php  } ?>                                                          
   		<?php }else{ ?>
                      <table class="table table-striped table-bordered"> 
                        <thead>
                                 <tr>
                                      <th>Schedule Sequence</th>
                                      <th>Subject Name</th>
                                      <th>Type</th>
                                  </tr>
                        </thead>   
                       <tbody>   
   			<tr>
   				<td colspan="4" style="color:red;">No Record found</td>
   			</tr>
       <?php }  ?>
   	</tbody>
	</table>
        
<?php     }else{
                // Error Msessage.
                showErrorMessage("Please send request with proper parameters.");
                exit();
            }
  ?>		