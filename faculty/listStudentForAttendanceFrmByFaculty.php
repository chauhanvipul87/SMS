<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$fm_id        = $_SESSION['sessionUserId'];
        $schedule_id  = $_GET['schedule_id'];
        
        if(!empty($fm_id) && !empty($schedule_id)){
                
            $filterArray = array();
            $filterArray['md_id']  = $fm_id;
            $userDetails= getFacultyMasterListByStatus(USERTYPE_FACULTY,$filterArray);
            $dept_id = $userDetails[0]['dept_id'];  // Get Department
            
            $filterScheduleArray = array();
            $filterScheduleArray['schedule_id']   = $schedule_id ;
            $scheduleList= getFacultyScheduleDetails($fm_id,$filterScheduleArray);
            $sem_id = $scheduleList[0]['sem_id'];  // Get Semester
            
            $studentList= getStudentListForAttendance($dept_id, $sem_id,$schedule_id);
          
?>
        <h4>List Student </h4><br/>
        <?php if($studentList != null && count($studentList) > 0){ ?>
        <button type="button" class="btn btn-primary" onclick="setPresentForAllSelected_Faculty('<?php echo $schedule_id ?>');" > 
                       Set Present For Selected Record
        </button>
        <button type="button" class="btn btn-primary" onclick="setAbsentForAllSelected_Faculty('<?php echo $schedule_id ?>');" > 
                       Set Absent For Selected Record
        </button>
        <button type="button" class="btn btn-primary" onclick="sendForApprovalToHead('<?php echo $schedule_id ?>');" > 
                       Send For Approval
        </button>
        
         <?php } ?>
        <br/> <br/>
        <table class="table table-striped table-bordered bootstrap-datatable datatable"> 
            <thead>
                    <tr>
                        <th><input type="checkbox" id="selectall"/></th>
                        <th>User Name</th>
                        <th>Student Name</th>
                        <th>Status</th>
                    </tr>
            </thead>  
            <tbody>
        <?php if($studentList != null && count($studentList) > 0){ ?>
          <?php for($i=0; $i <count($studentList); $i++){  ?>
                            <tr>
                                
                                <td class="center"><input type="checkbox" class="case" name="case" value="<?php echo $studentList[$i]['md_id'] ?>"/></td>
                                <td class="center"><?php echo $studentList[$i]['user_name'] ?></td>
                                <td class="center"><?php echo $studentList[$i]['name'] ?></td>
                                <td class="center">
                                    <?php 
                                        if($studentList[$i]['at_flag'] == ATTENDANCE_PENDING ){ ?>
                                            <span class="label label-warning" style="color: black;"> <?php echo $studentList[$i]['atFlag'] ?></span>	
                                       <?php } else if($studentList[$i]['at_flag'] == ATTENDANCE_PRESENT ){ ?>
                                              <span class="label label-success"> <?php echo $studentList[$i]['atFlag'] ?></span>	
                                       <?php } else if($studentList[$i]['at_flag'] == ATTENDANCE_ABSENT ){ ?>
                                              <span class="label label-important"> <?php echo $studentList[$i]['atFlag'] ?></span>	
                                       <?php }  ?>
                                   </td>
                            </tr> 
             <?php  } ?>                                                          
   		<?php }else{ ?>
   			<tr>
   				<td colspan="4" style="color:red;">No Record found</td>
   			</tr>
       <?php }  ?>
   	</tbody>
	</table>
       
       <script src="developerjs/faculty_details.js"></script>
       <script src="js/charisma.js"></script>
       <script language="javascript">
        $(function(){
            
            // add multiple select / deselect functionality
            $("#selectall").click(function () {
                  $('.case').attr('checked', this.checked);
                  //uniform - styler for checkbox, radio and file input
                  $("input:checkbox").uniform();
            });

            // if all checkbox are selected, check the selectall checkbox
            // and viceversa
            $(".case").click(function(){

                if($(".case").length == $(".case:checked").length) {
                    $("#selectall").attr("checked", "checked");
                } else {
                    $("#selectall").removeAttr("checked");
                    $("input:checkbox").uniform();
                }

            });
        });
        </script>        

<?php 
    }else{
        showErrorMessage("Please send request with proper parameters.");
        exit();
  } 
       
  ?>