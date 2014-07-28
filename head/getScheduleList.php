<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$head_id = $_SESSION['sessionUserId'];
        
        
        if(!empty($head_id)){
                
            $sdate      = $_GET['txtScheduleDate'];
            $faculty_id = $_GET['faculty_id'];
            
            $filterArray = array();
            $filterArray['fm_id']         =$faculty_id ;
            $filterArray['session_date']  =$sdate;      
            $scheduleList= getAllScheduleDetails($head_id,$filterArray);
         }
         
       
?>
   <?php if($scheduleList != null && count($scheduleList) > 0){ ?>
    <table class="table table-striped table-bordered"> 
		  <thead>
			  <tr>
				  <th>Subject Name</th>
				  <th>Semester</th>
				  <th>Schedule Sequence</th>
				  <th>Type</th>
			  </tr>
		  </thead>   
		 <tbody>
                <?php for($i=0; $i <count($scheduleList); $i++){  ?>
               
                            <tr>
                                <td class="center"><?php echo $scheduleList[$i]['sub_title'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['sem_name'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['session_sequence'] ?></td>
                                <td class="center"><?php if($scheduleList[$i]['sessiontype_id']==1){  echo 'Lecture'; }else{echo 'Leb';} ?></td>
                            </tr> 
             <?php  } ?>                                                          
   		<?php }else{ ?>
                      <table class="table table-striped table-bordered"> 
                        <thead>
                                <tr>
                                        <th>Subject Name</th>
                                        <th>Semester</th>
                                        <th>Schedule Sequence</th>
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
