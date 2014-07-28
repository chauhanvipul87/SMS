<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
	$head_id = $_SESSION['sessionUserId'];
        if(!empty($head_id)){
                
            $dept_id = $_GET['dept_id'];
            $sem_id  = $_GET['sem_id'];
            
            $filterArray = array();
            $filterArray['dept_id']  = $dept_id;
            $filterArray['sem_id']  = $sem_id;        
            $subjectList= getAllSubjectList($filterArray);
         }
?>
    <div class="control-group">
                    <label class="control-label">Select Subject <strong style="color: red;">*</strong></label>
                    <div class="controls">
                        <select data-rel="chosen" id="subjectSelect" style="width: 250px;" name="subjectSelect">
                            <option value="">Select Subject</option>
                                <?php  for($i=0; $i <count($subjectList); $i++){  ?>
                                    <option value="<?php echo $subjectList[$i]['sub_id'] ?>"><?php echo $subjectList[$i]['sub_title'] ?></option>
                               <?php  } ?>
                      </select>
                  </div>
       </div>
