function showRegisterAdminUserFrm(){
        var $ajaxUrl = "admin/registerAdminUserFrm.php";
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
function isAdminUserExist(userName){
    if(userName != ''){
        var $ajaxUrl = "admin/isAdminUserExist.php";
        var $ajaxResponseLayer = "resDiv";
        var $arguments ="userName="+userName;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    }else{
          displayWarningMessage('Please enter username.');
    }
}      
function listAdminUsers(){
    var $ajaxUrl = "admin/listAdminUsers.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
	
}
function viewAdminUserDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
		var $ajaxUrl = "admin/viewAdminUserDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function deleteAdminUserDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
		var $ajaxUrl = "admin/deleteAdminUserDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function editAdminUserDetails(md_id){
	if(md_id == null || md_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "admin/editAdminUserDetails.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="md_id="+md_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function showAddNewDepartmentFrm(){
    var $ajaxUrl = "admin/addNewDepartmentFrm.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
}

function isDepartmentExist(deptName){
     if(deptName != ''){
        var $ajaxUrl = "admin/isDepartmentExist.php";
        var $ajaxResponseLayer = "resDiv";
        var $arguments ="deptName="+deptName;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    }else{
          displayWarningMessage('Please enter department name.');
    }
}
function listDepartments(){
    var $ajaxUrl = "admin/listDepartments.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
    
}
function listSemesters(){
     var $ajaxUrl = "admin/listSemesters.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);   
}                                 

function editDepartment(dept_id){
    if(dept_id == null || dept_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "admin/editDepartment.php";
	    var $ajaxResponseLayer = "resDiv";
	    var $arguments ="dept_id="+dept_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}

function deleteDepartment(dept_id){
    if(dept_id == null || dept_id ==''){
		displayWarningMessage('Please select valid master details record.');
	}else{
            var $ajaxUrl = "admin/deleteDepartment.php";
	    var $ajaxResponseLayer = "errorDiv";
	    var $arguments ="dept_id="+dept_id;
	    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
	}
}
function getListReportMenu(){
    var $ajaxUrl = "admin/getListReportMenu.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer); 
}


function loadAdminDeshBoardIndex(){
      var $ajaxUrl = "admin/loadAdminDeshBoardIndex.php";
      var $ajaxResponseLayer = "resDiv";
      var $arguments ="";
      sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);  
}

function approveStudentLogByAdmin($s_id){
    if($s_id ==''){
        displayWarningMessage('Please select valid record.');
    }else{
        if(confirm("Are you sure want to approve this entry ?")){
            var $ajaxUrl = "admin/approveStudentLogByAdmin.php";
            var $ajaxResponseLayer = "errorDiv";
            var $arguments ="schedule_id="+$s_id;
            sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
        }
       
    }  
}

function loadAttendanceReportFrm(){
    var $ajaxUrl = "admin/loadAttendanceReportFrm.php";
    var $ajaxResponseLayer = "reportRes";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    return false;
}

function loadRegistrationPage(userTypeSelect){
    if(userTypeSelect != ''){
        var $ajaxUrl = "loadRegistrationPage.php";
        var $ajaxResponseLayer = "loadFrm";
        var $arguments ="userTypeSelect="+userTypeSelect;
        sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
        return false;
    }
    
    
}

