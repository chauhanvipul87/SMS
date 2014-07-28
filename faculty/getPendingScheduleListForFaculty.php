<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$fm_id = $_SESSION['sessionUserId'];
        if(!empty($fm_id)){
                
            $sdate      = $_GET['txtScheduleDate'];
            $filterArray = array();
            $filterArray['session_date']  =$sdate;    
            $scheduleList = getFacultyScheduleDetails($fm_id,$filterArray);
         }
         
?>
   <?php if($scheduleList != null && count($scheduleList) > 0){ ?>
    <table class="table table-striped table-bordered"> 
		  <thead>
			  <tr>
				  <th>Subject Name</th>
				  <th>Semester</th>
				  <th style="width: 50px;" >Sequence</th>
				  <th>Type</th>
                                  <th>Action</th>
			  </tr>
		  </thead>   
		 <tbody>
                <?php for($i=0; $i <count($scheduleList); $i++){  ?>
               
                            <tr>
                                <td class="center"><?php echo $scheduleList[$i]['sub_title'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['sem_name'] ?></td>
                                <td class="center"><?php echo $scheduleList[$i]['session_sequence'] ?></td>
                                <td class="center"><?php if($scheduleList[$i]['sessiontype_id']==1){  echo 'Lecture'; }else{echo 'Leb';} ?></td>
                                <td class="center">
                                     <a class="btn btn-success" title="Fill Attendance" href="javascript:void(0);" 
                                        onclick="listStudentForAttendanceByFaculty('<?php echo $scheduleList[$i]['schedule_id'] ?>');">
                                                <i class="icon-adjust icon-white"></i> Add Attendance                 
                                        </a>	   
                                </td>
                            </tr> 
             <?php  } ?>                                                          
   		<?php }else{ ?>
                      <table class="table table-striped table-bordered"> 
                        <thead>
                                <tr>    
                                        <th>Semester</th>
                                        <th>Sequence</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                        
                                </tr>
                        </thead>   
                       <tbody>   
   			<tr>
   				<td colspan="4" style="color:red;">No Record found</td>
   			</tr>
       <?php }  ?>
   	</tbody>
	</table>
        <script src="js/charisma.js"></script>  