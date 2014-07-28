<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        $dept_id     = trim($_GET["dept_id"]);
        $sem_id      = trim($_GET["sem_id"]);
        if(!empty($dept_id) && !empty($sem_id)){
                     
          $filterSubArray = array();
          $filterSubArray['dept_id']  = $dept_id;
          $filterSubArray['sem_id']   = $sem_id;
          $subjectList = getAllSubjectList($filterSubArray);
          if($subjectList ==null  || count($subjectList) < 0){
         ?>     
               <table class="table table-striped table-bordered bootstrap-datatable">
                 <tr>
                     <td colspan="2" style="color: red;">No subjects found.</td>   
                </tr>
               </table>
          <?php  
               exit();
            }
          $dir = "../extracted/";
          // Sort in ascending order - this is default
          $a = scandir($dir);
          $fileList = array();
          $fl =0;
          for($c=0; $c <count($a); $c++){
              if($a[$c]=='.' || $a[$c]=='..') continue;
              $fileList[$fl] =$a[$c];
              $fl++;
          } 
          if(empty($fileList)){
         ?>     
               <table class="table table-striped table-bordered bootstrap-datatable">
                 <tr>
                     <td colspan="2" style="color: red;">There is no file uploaded in directory.</td>   
                </tr>
               </table>
          <?php  
               exit();
            }
          /* Normal Flow goes here..*/
        ?>    
        <table class="table table-striped table-bordered bootstrap-datatable">
          <?php 
               
               for($i=0; $i <count($subjectList); $i++){
                 $matchCount =0;
                 for($k=0;$k <count($fileList); $k++){
                     
                     if(strtolower($fileList[$k]) == strtolower('SUB_'.$subjectList[$i]['sub_id'].".pdf")){
                         $matchCount =1; 
                        }
                 }
                 if($matchCount ==0){ ?>
                     <tr>
                        <td><?php echo $subjectList[$i]['sub_title'] ?></td>   
                        <td>File Not Available</td>   
                    </tr>
                 <?php }else{ ?>
                     <tr>
                        <td><?php echo $subjectList[$i]['sub_title'] ?></td>   
                        <td><a href="javascript:void(0);" onclick="downloadPDF('<?php echo $subjectList[$i]['sub_id']; ?>','<?php echo $subjectList[$i]['sub_title']; ?>');">Click to Download</a></td>   
                    </tr>
               <?php } }  ?>
         </table> 
        <form id="frmPDF" name="frmPDF" action="student\downloadPDF.php" method="post">
            <input type="hidden" id="sub_id_param" name="sub_id_param" />
            <input type="hidden" id="sub_name_param" name="sub_name_param" />
            
        </form>
 <?php  }else {
            // Error Msessage.
            showErrorMessage("Please fill up all the fields.");
            exit();
        } 

?>
        
       