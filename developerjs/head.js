function showRegisterHeadMasterFrm(){
        var $ajaxUrl = "head/registerHeadMasterFrm.php";
        var $ajaxResponseLayer = "resDiv";
        var $arguments ="";
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
}
function getHeadScheduleFrmMethod(){
    var $ajaxUrl = "head/getHeadScheduleFrm.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
}

function copyPresentAddressToPermanentAddress(){
      
      var pAddress = $("#txtPAddress").val();
      var pState = $("#txtPState").val();
      var pCity = $("#txtPCity").val();
      if(pAddress == '' || pState =='' || pCity ==''){
          displayWarningMessage('Please fill up all fields of present address.');
      }else{
        $("#txtPerAddress").html(pAddress);
        $("#txtPerState").val(pState);
        $("#txtPerCity").val(pCity);
        
      }
}
function isHeadMasterUserExist(userName){
    if(userName != ''){
        var $ajaxUrl = "head/isAHeadMasterExist.php";
        var $ajaxResponseLayer = "errorDiv";
        var $arguments ="userName="+userName;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    }else{
          displayWarningMessage('Please enter username.');
    }
}      
function listHeadMasters(){
	var $ajaxUrl = "head/listHeadMasters.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
	
}
function viewHeadMasterDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "head/viewHeadMasterDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function deleteHeadMasterDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
		var $ajaxUrl = "head/deleteHeadMasterDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function editHeadMasterDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "head/editHeadMasterDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function createScheduleFrm(){
    var $ajaxUrl = "head/createScheduleFrm.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    
    
}
function getSubjectfrmHead(sem_id){
    var dept_id = $("#dept_id").val();
    if(sem_id =='' || dept_id == ''){
        displayWarningMessage();
    }else{
        var $ajaxUrl = "head/getSubjectListfrmHead.php";
        var $ajaxResponseLayer = "loadSubjectDiv";
        var $arguments ="dept_id="+dept_id+"&sem_id="+sem_id;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
        
    }
}
function getScheduleList(faculty_id){
    var txtScheduleDate = $("#txtScheduleDate").val();
    if(txtScheduleDate == '' || faculty_id ==''){
        displayWarningMessage('Please select schedule date & faculty.');
    }else{
       var $ajaxUrl = "head/getScheduleList.php";
       var $ajaxResponseLayer = "scheduleList";
       var $arguments ="txtScheduleDate="+txtScheduleDate+"&faculty_id="+faculty_id;
       sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    }
}

function  assignScheduleToOthers($s_id,$fm_id){
    if($s_id =='',$fm_id==''){
        displayWarningMessage('Please select valid schedule.');
    }else{
       var $ajaxUrl = "head/loadFacultyListToAssign.php";
       var $ajaxResponseLayer = "listScheduleRes";
       var $arguments ="schedule_id="+$s_id+"&fm_id="+$fm_id;
       sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    } 
}

function addAttendanceFrmHead(){
    var $ajaxUrl = "head/addAttendanceFrmHead.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
}

function listStudentForAttendance($s_id){
    if($s_id ==''){
        displayWarningMessage('Please select valid schedule.');
    }else{
       var $ajaxUrl = "head/listStudentForAttendanceFrm.php";
       var $ajaxResponseLayer = "listScheduleDiv";
       var $arguments ="schedule_id="+$s_id;
       sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    } 
    
    
}
function fun_getPendingScheduleList(){
     var $ajaxUrl = "head/getPendingScheduleList.php";
     var $ajaxResponseLayer = "listScheduleDiv";
     var $arguments =$("#timeAttendanceFrm").serialize();
     sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
     return false;
}

function sendForApprovalToAdmin($s_id){
      if($s_id ==''){
        displayWarningMessage('Schedule data should not an empty.');
    }else{
        if(confirm("Are you sure want to send data to admin. Please make sure once you sent,you will not be able to change the data.")){
            var $ajaxUrl = "head/sendForApprovalToAdmin.php";
            var $ajaxResponseLayer = "errorDiv";
            var $arguments ="schedule_id="+$s_id;
            sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
        }
       
    } 
    
}

function setPresentForAllSelected($s_id){
	    var val = [];
            var checkedval="";
            $('input[name=case]').each(function(i)
            {
                val[i] = $(this).val();
                if(this.checked == true)
                {
                     checkedval= checkedval  + "," + $(this).val();
                }
            });
            if(checkedval!=""){
                var $ajaxUrl = "head/setPresentForStudent.php";
                var $ajaxResponseLayer = "errorDiv";
                var $arguments ="schedule_id="+$s_id+"&ids="+checkedval;
                sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
            }else{
                  alert("Please select at least 1 record to proceed.");
                  return false;
            } 
}
function setAbsentForAllSelected($s_id){
    var val = [];
    var checkedval="";
    $('input[name=case]').each(function(i)
    {
        val[i] = $(this).val();
        if(this.checked == true)
        {
             checkedval= checkedval  + "," + $(this).val();
        }
    });
    if(checkedval!=""){
        var $ajaxUrl = "head/setAbsentForStudent.php";
        var $ajaxResponseLayer = "errorDiv";
        var $arguments ="schedule_id="+$s_id+"&ids="+checkedval;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);  
    }else{
          alert("Please select at least 1 record to proceed.");
          return false;
    } 
}

function loadHeadDeshBoardIndex(){
      var $ajaxUrl = "head/loadHeadDeshBoardIndex.php";
      var $ajaxResponseLayer = "resDiv";
      var $arguments ="";
      sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);  
}

function approveAndSentToAdmin($s_id){
    
    if($s_id ==''){
        displayWarningMessage('Please select valid record.');
    }else{
        if(confirm("Are you sure want to send data to admin. Please make sure once you sent,you will not be able to change the data.")){
            var $ajaxUrl = "head/sendForApprovalToAdmin.php";
            var $ajaxResponseLayer = "errorDiv";
            var $arguments ="schedule_id="+$s_id+"&action=loadDashboard";
            sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
        }
       
    }  
}

function getHeadScheduleList(){
    var $ajaxUrl = "head/getHeadSchedule.php";
    var $ajaxResponseLayer = "listScheduleRes";
    var $arguments =$("#frmGetHeadSchedule").serialize();
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
    return false;
}