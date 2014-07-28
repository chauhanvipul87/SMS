<?php
    include_once 'com/sms/common/request/commonRequestHandler.php';
    $md_id     = $_SESSION['sessionUserId'];
    $userDetails =getProfileDetails($md_id);
    if($userDetails != null && count($userDetails) > 0){
  ?>      
       
<div style="padding: 10px;">
        <h4>Your Profile Details :</h4><br/>
        <table class="table table-striped table-bordered"> 
        <thead>
                <tr>
                    <th width="25%"> UserName </th><td><?php echo $userDetails['user_name']; ?> </td>
                </tr>
                <tr>
                    <th> First Name </th><td><?php echo $userDetails['fname']; ?> </td>
                </tr>
                <tr>
                    <th> Middle Name </th><td><?php echo $userDetails['mname']; ?> </td>
                </tr>
                <tr>
                    <th> Last Name </th><td><?php echo $userDetails['lname']; ?> </td>
                </tr>
                <tr>
                    <th> Phone No </th><td><?php echo $userDetails['phone_no']; ?> </td>
                </tr>
                <tr>
                    <th> E-mail </th><td><?php echo $userDetails['email']; ?> </td>
                </tr>
                <tr>
                    <th> Date Of Birth </th><td><?php echo $userDetails['dob']; ?> </td>
                </tr>
        </thead>   
       </table>
</div>  
        
  <?php  }else{
          // Error Msessage.
            showErrorMessage("Please send request with proper parameters.");
            exit();
    }
?>
