<!-- left menu starts -->
 <?php
          if(isset($_SESSION['userTypeId'])){
   ?>
            <div class="span2 main-menu-span">
            <div class="well nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                       <?php
                             if($_SESSION['userTypeId']== USERTYPE_ADMIN){ ?>
                                <li class="nav-header hidden-tablet">Admin</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="loadAdminDeshBoardIndex();"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="showRegisterAdminUserFrm();"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Register Admin </span></a></li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="listAdminUsers();"><i class="icon-edit"></i><span class="hidden-tablet"> List Admin </span></a></li>
                               
                                <li class="nav-header hidden-tablet">Head</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="showRegisterHeadMasterFrm();"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Register Head</span></a></li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="listHeadMasters();"><i class="icon-align-justify"></i><span class="hidden-tablet"> List Head</span></a></li>
                                 
                       <?php   } ?>  
                         <?php
                             if($_SESSION['userTypeId']== USERTYPE_ADMIN || $_SESSION['userTypeId']== USERTYPE_HEAD ){ ?>
                                
                                <li class="nav-header hidden-tablet">Faculty</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="showRegisterFacultyFrm();"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Register Faculty</span></a></li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="listFacultyMasters();"><i class="icon-align-justify"></i><span class="hidden-tablet"> List Faculty</span></a></li>
                                
                                
                       <?php   } ?>    
                       <?php
                             if($_SESSION['userTypeId']== USERTYPE_HEAD ){ ?>
                                
                                <li class="nav-header hidden-tablet">Manage Schedule</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="createScheduleFrm();" ><i class="icon-plus-sign"></i><span class="hidden-tablet"> Create Schedule</span></a></li> 
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="getHeadScheduleFrmMethod();" ><i class="icon-plus-sign"></i><span class="hidden-tablet"> Get Schedule</span></a></li> 
                                
                                <li class="nav-header hidden-tablet">Manage Attendance</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="addAttendanceFrmHead();" ><i class="icon-plus-sign"></i><span class="hidden-tablet"> Add Attendance</span></a></li> 
                                
                                
                                
                       <?php   } ?>             
                       <?php
                             if($_SESSION['userTypeId']== USERTYPE_ADMIN || $_SESSION['userTypeId']== USERTYPE_HEAD || $_SESSION['userTypeId']== USERTYPE_FACULTY ){ ?>
                                <li class="nav-header hidden-tablet">Student</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="showRegisterStudentFrm();"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Register Student</span></a></li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="listStudentMasters();"><i class="icon-align-justify"></i><span class="hidden-tablet"> List Student</span></a></li>
                                
                                <li class="nav-header hidden-tablet">Manage Subjects</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="showAddSubjectFrm();"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Add Subject</span></a></li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="listSubjectMasters();"><i class="icon-align-justify"></i><span class="hidden-tablet"> List Subject</span></a></li>
                                
                                <li><a class="ajax-link"  href="createSyllabusIndex.php"><i class="icon-download"></i><span class="hidden-tablet"> Create Syllabus</span></a></li>
                                 <li><a class="ajax-link" href="javascript:void(0);" onclick="getFeedbackList();" ><i class="icon-download"></i><span class="hidden-tablet"> Get Feedback </span></a></li> 
                       <?php   } ?>
                          <?php
                             if($_SESSION['userTypeId']== USERTYPE_FACULTY ){ ?>
                                
                                <li class="nav-header hidden-tablet">Manage Attendance</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="addAttendanceFrmFaculty();" ><i class="icon-plus-sign"></i><span class="hidden-tablet"> Add Attendance</span></a></li> 
                                
                                <li class="nav-header hidden-tablet">Others</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="getFacultyScheduleFrm();" ><i class="icon-download"></i><span class="hidden-tablet"> Get Schedule</span></a></li> 
                                
                            <?php   } ?>            
                                
                                
                         <?php
                             if($_SESSION['userTypeId']== USERTYPE_STUDENT ){ ?>
                                
                                <li class="nav-header hidden-tablet">Others</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="getStudentScheduleFrm();" ><i class="icon-download"></i><span class="hidden-tablet"> Get Schedule</span></a></li> 
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="feedbackFrm();" ><i class="icon-download"></i><span class="hidden-tablet"> Give Feedback </span></a></li> 
                                
                       <?php   } ?>    
                        
                        <?php
                             if($_SESSION['userTypeId']== USERTYPE_ADMIN){ ?>
                                <li class="nav-header hidden-tablet">Others</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="showAddNewDepartmentFrm();"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Add Department</span></a></li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="listDepartments();"><i class="icon-align-justify"></i><span class="hidden-tablet"> List Department</span></a></li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="listSemesters();"><i class="icon-align-justify"></i><span class="hidden-tablet"> List Semester</span></a></li>
                                
                                <li class="nav-header hidden-tablet">Manage Reports</li>
                                <li><a class="ajax-link" href="javascript:void(0);" onclick="getListReportMenu();"><i class="icon-align-justify"></i><span class="hidden-tablet"> Reports Menu</span></a></li>
                       <?php   } ?>    
                                
                        <li><a class="ajax-link" href="javascript:void(0);" onclick="getSyllabus();" ><i class="icon-download"></i><span class="hidden-tablet"> Get Syllabus</span></a></li>
                        
                    </ul>
            </div><!--/.well -->
            </div><!--/span-->

          <?php   }
    ?>
<!-- left menu ends -->