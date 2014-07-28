<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
        $fm_id    = trim($_SESSION['sessionUserId']);
        if(!empty($fm_id)){
                $fbList    = getListFeedBack();
?>
                <div class="box-content">
                <h4>List FeedBack From Students</h4><br/>	
                 <?php if($fbList != null && count($fbList) > 0){  ?>
                      <table class="table table-striped table-bordered bootstrap-datatable datatable">
                          <thead>
                                  <tr>
                                          <th>Sr No.</th>
                                          <th>Subject</th>
                                          <th>Name</th>
                                          <th>Date</th>
                                          <th>Actions</th>
                                  </tr>
                          </thead>   
                         <tbody>

               <?php   for($i=0,$j=1; $i <count($fbList); $i++,$j++){  ?>
                        <tr>
                                                <td><?php echo $j; ?></td>
                                                <td class="center"><?php echo $fbList[$i]['subject'] ?></td>
                                                <td class="center"><?php echo $fbList[$i]['name'] ?></td>
                                                <td class="center"><?php echo substr($fbList[$i]['created_datetime'],0,10) ?></td>
                                                <td class="center">
                                                        <a class="btn btn-success" href="javascript:void(0);" 
                                                                    onclick="viewFMDetailsOthers('<?php echo $fbList[$i]['fb_id']?>');">
                                                                <i class="icon-zoom-in icon-white"></i>  
                                                                View                                            
                                                        </a>
                                                </td>
                                        </tr> 
                     <?php  } ?>                                                          
                             </tbody>
                            </table>
                        <?php }else{ ?>
                               <table class="table table-striped table-bordered">
                                <thead>
                                        <tr>
                                                <th>Sr No.</th>
                                                <th>Subject</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                        </tr>
                                </thead>   
                               <tbody>
                                <tr>
                                        <td colspan="4" style="color:red;">No Record found</td>
                                </tr>
                               </tbody>
                             </table>
               <?php }  ?>
               
                <div id="fbDetails"></div>
            </div>	         
            <script src="js/charisma.js"></script>    

<?php        }else{
             // Error Msessage.
            showErrorMessage("Please fill up all the fields.");
            exit();
        }
        
?>
    
       