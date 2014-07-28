function pagination(action,currentPage ,$ajaxUrl,$ajaxResponseLayer){
	 $arguments ="action="+action+"&current_page="+currentPage+"&record="+$("#record").val()+"&"+$("#mainfrm").serialize();;
	 sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);
}

function sendRequest($ajaxUrl,$arguments,$timeStamp,$ajaxResponseLayer){
	
	var $currentTime = new Date();
	var $timeStamp = $currentTime.getHours() + $currentTime.getMinutes()
	+ $currentTime.getSeconds() + $currentTime.getMilliseconds()
	+ $currentTime.getDay() + $currentTime.getMonth()
	+ $currentTime.getFullYear() + Math.random();
	
	 $.ajax({
		url : $ajaxUrl + "?" + $arguments + "&stamp=" + $timeStamp,
		cache : false,
		beforeSend : function() {
			/* call method before send request to server  */
			showProgressBar();
		},
		complete : function($response, $status) {
			/* hide progress bar once we get response */
			hideProgressBar();
			if ($status != "error" && $status != "timeout") {
				/* for set response in div */
				if($ajaxResponseLayer !="")  
			    {	
//					alert('$ajaxUrl ::'+$ajaxUrl);
					//return checkAuthentication($response);
					//alert($response.responseText.trim());
					if($response.responseText.search("showMessage")>-1){
						//alert('in if ::');
						$("#errorDiv").html($response.responseText.trim());
						processAfterResponse($ajaxUrl,$arguments,$timeStamp,$ajaxResponseLayer,$response.responseText);
						return false;
					}
					if($ajaxUrl == 'puturl.html'){
							//code here
					}
//					alert('res:'+$response.responseText);
					$("#"+$ajaxResponseLayer).html($response.responseText);
					processAfterResponse($ajaxUrl,$arguments,$timeStamp,$ajaxResponseLayer,$response.responseText);
				}
				
			}
		},
		error : function($obj) {
			/* call when error occurs */
			hideProgressBar();
			alert("Something went wrong while processing your request."+$obj.responseText);
		}
	});  
}


function processAfterResponse($ajaxUrl,$arguments,$timeStamp,$ajaxResponseLayer,$response){
	/* Admin functionality   */
	if($ajaxUrl == 'admin/registerAdminUser.php'){
		if($response.search("success")>-1){
			showRegisterAdminUserFrm(); //refersh page for adding new
		}else{
			$("#txtUserName").val('');
			$("#txtUserName").focus();	
		}
	}
        if($ajaxUrl =='admin/updateAdminUserDetails.php' || $ajaxUrl == 'admin/deleteAdminUserDetails.php'){
		if($response.search("success")>-1){
			listAdminUsers(); //refersh page 
		}
	}
        
        if($ajaxUrl == 'admin/isAdminUserExist.php'){
		if($response.search("error")>-1){
			$("#txtUserName").val('');
			$("#txtUserName").focus();	
		}
	}
	/* Head Master functionality   */
        if($ajaxUrl == 'head/registerHeadMaster.php'){
		if($response.search("success")>-1){
			showRegisterHeadMasterFrm(); //refersh page for adding new
		}else{
			$("#txtUserName").val('');
			$("#txtUserName").focus();	
		}
	}
	
        if($ajaxUrl == 'head/updateHeadMasterDetails.php' || $ajaxUrl == 'head/deleteHeadMasterDetails.php'){
		if($response.search("success")>-1){
			listHeadMasters(); //refersh page
		}
	}
	if($ajaxUrl == 'head/isAHeadMasterExist.php'){
		if($response.search("error")>-1){
			$("#txtUserName").val('');
			$("#txtUserName").focus();	
		}
	}
        if($ajaxUrl == 'head/createSchedule.php'){
		if($response.search("success")>-1){
                    createScheduleFrm();
		}
	}
        
        
       
        
        /* Faculty functionality   */
         if($ajaxUrl == 'faculty/registerFaculty.php'){
		if($response.search("success")>-1){
			showRegisterFacultyFrm(); //refersh page for adding new
		}else{
			$("#txtUserName").val('');
			$("#txtUserName").focus();	
		}
	}
        if($ajaxUrl == 'faculty/isFacultyExist.php'){
		if($response.search("error")>-1){
			$("#txtUserName").val('');
			$("#txtUserName").focus();	
		}
	}
        if($ajaxUrl == 'faculty/updateFacultyDetails.php' || $ajaxUrl == 'faculty/deleteFacultyDetails.php'){
		if($response.search("success")>-1){
			listFacultyMasters(); //refersh page
		}
	}
        
         /* Student functionality   */
         if($ajaxUrl == 'student/registerStudent.php'){
		if($response.search("success")>-1){
			showRegisterStudentFrm(); //refersh page for adding new
		}else{
			$("#txtUserName").val('');
			$("#txtUserName").focus();	
		}
	}
        if($ajaxUrl == 'student/isStudentExist.php'){
		if($response.search("error")>-1){
			$("#txtUserName").val('');
			$("#txtUserName").focus();	
		}
	}
        if($ajaxUrl == 'student/updateStudentDetails.php' || $ajaxUrl == 'student/deleteStudentDetails.php'){
		if($response.search("success")>-1){
			listStudentMasters(); //refersh page
		}
	}
        
        if($ajaxUrl == 'appprovedAllUsers.php' || $ajaxUrl =='rejectUserById.php' || $ajaxUrl =='approveUserById.php'){
		if($arguments.search("admin")>-1){
                    listAdminUsers();
		}else if($arguments.search("head")>-1){
                    listHeadMasters();
		}else if($arguments.search("faculty")>-1){
                    listFacultyMasters();
		}else {
                    listStudentMasters();
                }
	}
        
        /* Subject funcationality */
         if($ajaxUrl == 'faculty/addSubject.php'){
		if($response.search("success")>-1){
                        showAddSubjectFrm()(); //refersh page for adding new
		}else{
			$("#txtSubjectName").val('');
			$("#txtSubjectName").focus();	
		}
	}
        if($ajaxUrl == 'faculty/isSubjectExist.php'){
		if($response.search("error")>-1){
			$("#txtSubjectName").val('');
			$("#txtSubjectName").focus();	
		}
	}
        if($ajaxUrl == 'faculty/updateSubject.php' || $ajaxUrl == 'faculty/deleteSubject.php'){
		if($response.search("success")>-1){
                        listSubjectMasters()(); //refersh page
		}
	}
       
         /* Department funcationality */
         if($ajaxUrl == 'admin/addNewDepartment.php'){
		if($response.search("success")>-1){
                        showAddNewDepartmentFrm(); //refersh page for adding new
		}else{
			$("#txtDeptName").val('');
			$("#txtDeptName").focus();	
		}
	}
        if($ajaxUrl == 'admin/isDepartmentExist.php'){
		if($response.search("error")>-1){
			$("#txtDeptName").val('');
			$("#txtDeptName").focus();	
		}
	}
        if($ajaxUrl == 'admin/updateDepartment.php' || $ajaxUrl == 'admin/deleteDepartment.php'){
		if($response.search("success")>-1){
                        listDepartments(); //refersh page
		}
	}
         if($ajaxUrl == 'head/sendForApprovalToAdmin.php'){
                if($arguments.search("loadDashboard")>-1){
                        loadHeadDeshBoardIndex() //refersh page
		}else if($response.search("success")>-1){
                        fun_getPendingScheduleList(); //refresh page
		}
	}
        if($ajaxUrl == 'head/setPresentForStudent.php' || $ajaxUrl =='head/setAbsentForStudent.php'){
		if($response.search("success")>-1){
                        //refresh page.
                         $strArg= $arguments.substr(0,$arguments.indexOf("&"));
                         $strArr = $strArg.split('=');
                         if($strArr[1]!=''){
                             listStudentForAttendance($strArr[1]);
                         }
		}
	}  
       if($ajaxUrl == 'faculty/sendForApprovalToHead.php'){
		if($response.search("success")>-1){
                        fun_getPendingScheduleListForFaculty(); //refresh page
		}
	}
         if($ajaxUrl == 'admin/approveStudentLogByAdmin.php'){
		if($response.search("success")>-1){
                        loadAdminDeshBoardIndex(); //refresh page.
		}
	}
        
        
        if($ajaxUrl == 'faculty/setAbsentForStudentByFaculty.php' ||
                $ajaxUrl =='faculty/setPresentForStudentByFaculty.php'){
		if($response.search("success")>-1){
                        //refresh page.
                         $strArg= $arguments.substr(0,$arguments.indexOf("&"));
                         $strArr = $strArg.split('=');
                         if($strArr[1]!=''){
                             listStudentForAttendanceByFaculty($strArr[1]);
                         }
		}
	}
        if($ajaxUrl =='student/addMoreMessageByStudent.php'){
               refreshFeedbackDetails($arguments); 
        }
         if($ajaxUrl =='faculty/addMoreMessage.php'){
               refreshFBDetails($arguments);
        }
         if($ajaxUrl =='head/assignSchedule.php'){
               getHeadScheduleList();
        }
        if($ajaxUrl =='register.php'){
             requestHandler(2500);
        }
        
        
        
        
}
function processForm(delay){
	setTimeout( function() { showOrderIndexPage(); }, delay );
}

function requestHandler(delay)
{
    setTimeout( function() { reloadForm(); }, delay );
}

function closeDialogBox(modelId){
	$("#"+modelId).dialog( "close" );
}

function showProgressBar() {
		document.getElementById('ajax_loader').style.display = 'block';
}

function hideProgressBar() {
	 document.getElementById('ajax_loader').style.display = 'none';
}

var hideError = function closer() {
	$.modal.close();
	  //alert("Done!"); 
};

function removeClass(id){
	  $("#"+id+"Div").removeClass("error");
	  $("#"+id+"Div-help").html("");
}

function showMessage(){
	var options = $.parseJSON($("#emsg").attr('data-noty-options'));
	noty(options);
}

function IsEmail(email) {
	  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
}

function profileUnderVerification(){
	
   	var textMsg ='{"text":"Your profile is under administrator verification","layout":"bottomLeft","type":"warning"}';  
	var options = $.parseJSON(textMsg);
	noty(options);	
	return false;
}

function displayWarningMessage($errorVal){
         if($errorVal ==null || $errorVal ==''){
             $errorVal = "Please select all the mandatory fields indicated as (*).";
         }
	 var textMsg ='{"text":"'+$errorVal+'","layout":"bottomLeft","type":"warning"}';  
	 var options = $.parseJSON(textMsg);
	 noty(options);
}

function onlyIntegerNumber(evt){
  var textMsg ='{"text":"Please enter only digit (0-9)","layout":"bottomLeft","type":"error"}';
  var options = $.parseJSON(textMsg);	 
  var e = evt; // for trans-browser compatibility
  var charCode = e.which || e.keyCode;
  if(charCode == 9){
  	 return true;
  }
  if((charCode >=35 && charCode <38) || charCode ==39 || e.which ==0){
  	 //humanMsg.displayMsg("Please enter only digit (0-9)");
	 noty(options);
  	 //alert("Please enter only digit (0-9)");
  	return false;
  }
  
  if ((charCode > 31) && (charCode < 48 || charCode > 57) ){
  	   	//humanMsg.displayMsg("Please enter only digit (0-9)");
 		   noty(options);
 	       //alert('Please enter only digit (0-9)');
 	       return false;
 	 }else{
	   return true;
   }
}

function isNumberKey(evt)
{
	var textMsg ='{"text":"Allow only numeric characters (0-9 or .","layout":"bottomLeft","type":"error"}';
	var options = $.parseJSON(textMsg);
	var e = evt; // for trans-browser compatibility
    var charCode = e.which || e.keyCode;
    
    if(charCode == 46 || charCode == 9){
    	return true;
    }
    if((charCode >=35 && charCode <38) || charCode ==39 || e.which ==0){
    	//humanMsg.displayMsg("Allow only numeric characters (0-9 or .)");
        noty(options);
   	 return false;
    }
    if ((charCode > 31) && (charCode < 48 || charCode > 57) ){
    	 	noty(options);
   	       return false;
   	 }else{
	   return true;
     }
}
if(typeof String.prototype.trim !== 'function') {
	  String.prototype.trim = function() {
	    return this.replace(/^\s+|\s+$/g, ''); 
	  };
}
function approvedAll(actionType){
      if(actionType ==undefined || actionType ==''){
            actionType ="student";
      }
      var $ajaxUrl = "appprovedAllUsers.php";
      var $ajaxResponseLayer = "errorDiv";
      var $arguments ="action="+actionType;
      sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    
}

function approveUserById(md_id,actionType){
      if(md_id==''){
          displayWarningMessage('Please select valid record.');
          return false;
      }
      if(actionType ==undefined || actionType ==''){
            actionType ="student";
      }
      var $ajaxUrl = "approveUserById.php";
      var $ajaxResponseLayer = "errorDiv";
      var $arguments ="action="+actionType+"&md_id="+md_id;
      sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    
}

function rejectUserById(md_id,actionType){
      if(md_id==''){
          displayWarningMessage('Please select valid record.');
          return false;
      }
      if(actionType ==undefined || actionType ==''){
            actionType ="student";
      }
      var $ajaxUrl = "rejectUserById.php";
      var $ajaxResponseLayer = "errorDiv";
      var $arguments ="action="+actionType+"&md_id="+md_id;
      sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);    
    
}
function displayProfile(){
    var $ajaxUrl = "displayProfile.php";
    var $ajaxResponseLayer = "resDiv";
    var $arguments ="";
    sendRequest($ajaxUrl, $arguments, "",$ajaxResponseLayer);  
}