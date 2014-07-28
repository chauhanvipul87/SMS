<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$head_id      = $_SESSION['sessionUserId'];
        $schedule_id  = $_GET['schedule_id'];
        $fm_id        = $_GET['fm_id'];
        
        if(!empty($head_id) && !empty($schedule_id)){
                
            $filterArray = array();
            $filterArray['md_id']  = $head_id;
            $userDetails= getHeadMasterListByStatus(USERTYPE_HEAD,$filterArray);
            $dept_id = $userDetails[0]['dept_id'];  // Get Department
            
            $filterFacultyArray = array();
            $filterFacultyArray['dept_id']        = $dept_id ;
            $filterFacultyArray['NOT_IN_FM_ID']   = $fm_id ;
            
            $facultyList= getFacultyMasterListByStatus(USERTYPE_FACULTY, $filterFacultyArray)
          
?>
        <h4>Assign schedule to other Faculty </h4><br/>
        <?php if($facultyList != null && count($facultyList) > 0){ ?>
             
        <form class="form-horizontal" id="frmAssignScheduleToOtherFaculty" name="frmAssignScheduleToOtherFaculty" onsubmit="return false;">
            <input type="hidden" name="dept_id" id="dept_id" value="<?php echo $dept_id ?>" />
            <input type="hidden" name="head_id" id="head_id" value="<?php echo $head_id ?>" />
            <input type="hidden" name="schedule_id" id="schedule_id" value="<?php echo $schedule_id ?>" />
            
            <fieldset>
                   <div class="control-group">
                            <label class="control-label">Select Faculty <strong style="color: red;">*</strong></label>
                            <div class="controls">
                                <select data-rel="chosen" id="facultySelect" style="width: 250px;" name="facultySelect">
                                    <option value="">Select Faculty</option>
                                        <?php  for($i=0; $i <count($facultyList); $i++){  ?>
                                            <option value="<?php echo $facultyList[$i]['md_id'] ?>"><?php echo $facultyList[$i]['fname'].' '.$facultyList[$i]['lname'] ?></option>
                                       <?php  } ?>
                              </select>
                            </div>
                    </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"> 
                            Assign
                      </button>
                </div>	
            </fieldset>
        </form>            
        
        <?php }else{ ?>
               <table >
                <tr>
                        <td style="color:red;">No Record found</td>
                </tr>
                </table>
<?php }  ?>

       
       <script src="developerjs/head_details.js"></script>
       <script src="js/charisma.js"></script>
     
<?php 
    }else{
        showErrorMessage("Please send request with proper parameters.");
        exit();
  } 
       
  ?>