<?php   
	include_once '../com/sms/common/request/commonRequestHandler.php';

        $fb_id            = trim($_GET["fb_id"]);
        $sm_id            = trim($_SESSION['sessionUserId']);
         
        if(!empty($fb_id)){
            $lst= getFeedBackDetails($fb_id);
             
?> 
              <div class="box-content">
              <h4>Feed Back Details</h4><br/>	   
              <?php if($lst != null && count($lst) > 0){  ?>
              <table class="table table-striped table-bordered" style="width: 50%;">
                       <?php   for($i=0; $i <count($lst); $i++){  ?>
                            <?php if($lst[$i]['requesttype_id'] == REQUESTTYPE_REQUEST){ ?>
                            <tr>    
                                <td class="center"><div style="float: left"><b><?php echo $_SESSION['userDisplayName']." Says :";?></b>
                                           <?php echo $lst[$i]['msg'] ?> </div></td>
                            </tr>         
                           <?php } else{ ?>
                              <tr>
                                   <td class="center"><div style="float: right"><b>
                                     <?php $arr= getUserDetailsByMasterId($lst[$i]['fb_by']);  echo $arr['name']; ?> Says :</b> <?php echo $lst[$i]['msg'] ?> </div></td>
                              </tr> 
                       <?php }
                       
                        }
                     ?>
                  <tr>
                    <td>
                        <textarea id="txtMoreMsg" name="txtMoreMsg" cols="50" rows="3" style="width: 550px;" ></textarea> 
                    </td>          
                 </tr>  
                   <tr>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="addMoreMessageByStudent('<?php echo $fb_id;?>');" > 
                                Send
                         </button>
                    </td>          
                 </tr> 
                </table>          
              <?php  }   ?> 
              </div>
       <?php }else {
            // Error Msessage.
            showErrorMessage("Please fill up all the fields.");
            exit();
        } 

?>
        
       