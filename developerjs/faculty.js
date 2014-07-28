function showRegisterFacultyFrm(){
        var $ajaxUrl = "faculty/registerFacultyFrm.php";
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
function isFacultyUserExist(userName){
    if(userName != ''){
        var $ajaxUrl = "faculty/isFacultyExist.php";
        var $ajaxResponseLayer = "errorDiv";
        var $arguments ="userName="+userName;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    }else{
          displayWarningMessage('Please enter username.');
    }
}      
function listFacultyMasters(){
    var $ajaxUrl = "faculty/listFaculties.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
	
}
function viewFacultyDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "faculty/viewFacultyDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function deleteFacultyDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
		var $ajaxUrl = "faculty/deleteFacultyDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function editFacultyDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "faculty/editFacultyDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}
/* --- Manage Subjects functions ---- */
function showAddSubjectFrm(){
        var $ajaxUrl = "faculty/addSubjectFrm.php";
        var $ajaxResponseLayer = "resDiv";
        var $arguments ="";
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
}
function isSubjectExist(subjectName){
    if(subjectName != ''){
        var deptSelect = $("#deptSelect").val();
        var semSelect  = $("#semSelect").val();
        if(deptSelect == '' || semSelect =='' ){
            displayWarningMessage();
        }else{
            var $ajaxUrl = "faculty/isSubjectExist.php";
            var $ajaxResponseLayer = "errorDiv";
            var $arguments ="subjectName="+subjectName+"&deptSelect="+deptSelect+"&semSelect="+semSelect;
            sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);  
        }
    }else{
          displayWarningMessage('Please enter subject title.');
    }
}
function listSubjectMasters(){
    var $ajaxUrl = "faculty/listSubjects.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
    
}

function editSubjectDetails(sub_id){
    if(sub_id == null || sub_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "faculty/editSubjectDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="sub_id="+sub_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}
function deleteSubject(sub_id){
    if(sub_id == null || sub_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "faculty/deleteSubject.php";
	    var $ajaxResponseLayer = "errorDiv";
	    var $arguments ="sub_id="+sub_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function getFacultyScheduleFrm(){
    var $ajaxUrl = "faculty/getFacultyScheduleFrm.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
}
/* Functionality for attendance management */

function addAttendanceFrmFaculty(){
    var $ajaxUrl = "faculty/addAttendanceFrmFaculty.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
}
function fun_getPendingScheduleListForFaculty(){
     var $ajaxUrl = "faculty/getPendingScheduleListForFaculty.php";
     var $ajaxResponseLayer = "listScheduleDiv";
     var $arguments =$("#timeAttendanceFrmFaculty").serialize();
     sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
     return false;
    
}
function listStudentForAttendanceByFaculty($s_id){
    if($s_id ==''){
        displayWarningMessage('Please select valid schedule.');
    }else{
       var $ajaxUrl = "faculty/listStudentForAttendanceFrmByFaculty.php";
       var $ajaxResponseLayer = "listScheduleDiv";
       var $arguments ="schedule_id="+$s_id;
       sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    } 
    
}        

function sendForApprovalToHead($s_id){
      if($s_id ==''){
        displayWarningMessage('Schedule data should not an empty.');
    }else{
        if(confirm("Are you sure want to send data to head. Please make sure once you sent,you will not be able to change the data.")){
            var $ajaxUrl = "faculty/sendForApprovalToHead.php";
            var $ajaxResponseLayer = "errorDiv";
            var $arguments ="schedule_id="+$s_id;
            sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
        }
       
    } 
    
}

function setPresentForAllSelected_Faculty($s_id){
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
                var $ajaxUrl = "faculty/setPresentForStudentByFaculty.php";
                var $ajaxResponseLayer = "errorDiv";
                var $arguments ="schedule_id="+$s_id+"&ids="+checkedval;
                sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
            }else{
                  alert("Please select at least 1 record to proceed.");
                  return false;
            } 
}
function setAbsentForAllSelected_Faculty($s_id){
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
        var $ajaxUrl = "faculty/setAbsentForStudentByFaculty.php";
        var $ajaxResponseLayer = "errorDiv";
        var $arguments ="schedule_id="+$s_id+"&ids="+checkedval;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);  
    }else{
          alert("Please select at least 1 record to proceed.");
          return false;
    } 
}

function getFeedbackList(){
    var $ajaxUrl = "faculty/getFeedBackList.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    
}
function addMoreMessage(fb_id){
    var txtMoreMsg = $("#txtMoreMsg").val();
    if(txtMoreMsg =='' ||fb_id ==''){
        displayWarningMessage();
    }else{
        var $ajaxUrl = "faculty/addMoreMessage.php";
        var $ajaxResponseLayer = "errorDiv";
        var $arguments ="fb_id="+fb_id+"&txtMsg="+txtMoreMsg;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
    } 
}
function refreshFBDetails($arguments){
    var $ajaxUrl = "faculty/ViewFeedBackDetails.php";
    var $ajaxResponseLayer = "fbDetails";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
    return false;
}

function viewFMDetailsOthers(fb_id){
    if(fb_id == null || fb_id ==''){
        displayWarningMessage('Please select valid feedback details record.');
    }else{
        var $ajaxUrl = "faculty/ViewFeedBackDetails.php";
        var $ajaxResponseLayer = "fbDetails";
        var $arguments ="fb_id="+fb_id;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
    }
}