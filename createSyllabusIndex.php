<?php
	include_once 'com/sms/common/request/commonRequestHandler.php';
        $deptList = getAllDepartment();
        $semtList = getAllSemester();
        
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'header.php'; ?>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    
</head>
<body>
    <?php include 'topmenu.php'; ?>
    <div class="container-fluid">
    <div class="row-fluid">
            <?php include 'leftmenu.php'; ?>	
            <div id="content" class="span10">
            <!-- content starts -->
            <div id="resDiv" class="box">
               <div style="padding: 10px;">
                <h4>Create Syllabus</h4><br/>
                <form class="form-horizontal" id="registerFacultyFrm" name="registerFacultyFrm" onsubmit="return false;">
                    <fieldset>
                         <?php 
                            if($_SESSION['userTypeId'] == USERTYPE_ADMIN){ ?>
                                <div class="control-group">
                                    <label class="control-label">Department <strong style="color: red;">*</strong></label>
                                    <div class="controls">
                                      <select data-rel="chosen" id="deptSelect" style="width: 180px;" name="deptSelect">
                                            <option value="">Select Department</option>
                                                <?php  for($i=0; $i <count($deptList); $i++){  ?>
                                                    <option value="<?php echo $deptList[$i]['id'] ?>"><?php echo $deptList[$i]['name'] ?></option>
                                               <?php  } ?>
                                      </select>
                                    </div>
                             </div>
                        <?php    }else{  ?>
                                 <input type="hidden" name="deptSelect" id="deptSelect" value="<?php echo $_SESSION['sessionDeptId']?>" />
                        <?php    }

                        ?>
                         <div class="control-group">
                                    <label class="control-label">Semester <strong style="color: red;">*</strong></label>
                                    <div class="controls">
                                      <select data-rel="chosen" id="semSelect" style="width: 180px;" name="semSelect">
                                            <option value="">Select Semester</option>
                                                <?php  for($i=0; $i <count($semtList); $i++){  ?>
                                                    <option value="<?php echo $semtList[$i]['id'] ?>"><?php echo $semtList[$i]['name'] ?></option>
                                               <?php  } ?>
                                      </select>
                                    </div>
                         </div>
                        
                        
                         <div class="control-group">
                                <textarea id="editor1" name="editor1" ></textarea>
                                <script type="text/javascript">
                                                CKEDITOR.replace( 'editor1' );
                                </script>
                         </div>


                        <div class="form-actions">
                              <button type="submit" class="btn btn-primary" > 
                                    Create
                              </button>
                      </div>	
                    </fieldset>

                </form>
               </div>
            </div>
            <!-- content ends -->
            </div><!--/#content.span10-->
    </div><!--/fluid-row-->

    <?php include 'footer.php'; ?>
    <script src="developerjs/request.js"></script>
    <script src="developerjs/admin.js"></script>
    <script src="developerjs/head.js"></script>
    <script src="developerjs/faculty.js"></script>
    <script src="developerjs/student.js"></script>
    
</body>
</html>
