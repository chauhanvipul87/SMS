 function showRegisterStudentFrm(){
        var $ajaxUrl = "student/registerStudentFrm.php";
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
function isStudentUserExist(userName){
    if(userName != ''){
        var $ajaxUrl = "student/isStudentExist.php";
        var $ajaxResponseLayer = "errorDiv";
        var $arguments ="userName="+userName;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    }else{
          displayWarningMessage('Please enter username.');
    }
}      
function listStudentMasters(){
    var $ajaxUrl = "student/listStudent.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
	
}
function viewStudentDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "student/viewStudentDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function deleteStudentDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
		var $ajaxUrl = "student/deleteStudentDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function editStudentDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "student/editStudentDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}
function getSyllabus(){
    var $ajaxUrl = "student/getSyllabus.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
    
}
function showSemeseterField(){
    $("#tr_sem").show();
}
function loadSubjectList(sem_id){
    var dept_id = $("#deptSelect").val();
    if(dept_id == '' || sem_id ==''){
          displayWarningMessage();
      }else{
        var $ajaxUrl = "student/getListSubjectPDF.php";
        var $ajaxResponseLayer = "getListSubjectsPDF";
        var $arguments ="dept_id="+dept_id+"&sem_id="+sem_id;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
    }
}


function downloadPDF(sub_id,sub_name){
    $("#sub_id_param").val(sub_id);
    $("#sub_name_param").val(sub_name);
    $( "#frmPDF" ).submit();
    
}

function getStudentScheduleFrm(){
    var $ajaxUrl = "student/getStudentScheduleFrm.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
}

function feedbackFrm(){
    var $ajaxUrl = "student/feedbackFrm.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
    
}

function listFeedBackBySM(){
    var $ajaxUrl = "student/listFeedBackBySM.php";
    var $ajaxResponseLayer = "listFeedback";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer); 
}
function viewFBDetails(fb_id){
    if(fb_id == null || fb_id ==''){
        displayWarningMessage('Please select valid feedback details record.');
    }else{
        var $ajaxUrl = "student/viewFBDetails.php";
        var $ajaxResponseLayer = "fbDetails";
        var $arguments ="fb_id="+fb_id;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
    }
}

function addMoreMessageByStudent(fb_id){
    var txtMoreMsg = $("#txtMoreMsg").val();
    if(txtMoreMsg =='' ||fb_id ==''){
        displayWarningMessage();
    }else{
        var $ajaxUrl = "student/addMoreMessageByStudent.php";
        var $ajaxResponseLayer = "errorDiv";
        var $arguments ="fb_id="+fb_id+"&txtMsg="+txtMoreMsg;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
    } 
}

function refreshFeedbackDetails($arguments){
    var $ajaxUrl = "student/viewFBDetails.php";
    var $ajaxResponseLayer = "fbDetails";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
    return false;
}

    