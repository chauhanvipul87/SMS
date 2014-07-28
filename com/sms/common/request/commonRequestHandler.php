<?php 
	session_start(); //initialization
        define("PROJECTNAME"             , "SMS/");
        $rootPath = $_SERVER["DOCUMENT_ROOT"].PROJECTNAME;
        $_SESSION['rootPath'] = $rootPath;
        
        include_once $rootPath.'com/sms/common/dateutil/php_dates.php';
        include_once $rootPath.'com/sms/common/constant/applicationConstant.php';
	include_once $rootPath.'com/sms/common/db/dbconfig.php';
        include_once $rootPath.'com/sms/common/db/applicationDao.php';
	class RequestController{
		
		public function validateRequest(){
			$requestedURL = substr($_SERVER['PHP_SELF'],strripos($_SERVER['PHP_SELF'],"/")+1,strlen($_SERVER['PHP_SELF']));
                        $_SESSION['activeSession'] = "false";
			if(strtolower($requestedURL) =="index.php"){
                                $isSession = $this ->checkUserSession();
				if($isSession){
                                      if($_SESSION['userTypeId'] == USERTYPE_ADMIN){
                                           header("Location:adminIndex.php");  
                                           exit();
                                      }else if($_SESSION['userTypeId'] ==USERTYPE_HEAD){
                                           header("Location:headIndex.php");  
                                           exit();
                                      }else if($_SESSION['userTypeId'] ==USERTYPE_FACULTY){
                                           header("Location:facultyIndex.php");  
                                           exit();
                                      }else{
                                           header("Location:studentIndex.php");  
                                           exit();
                                      }   
                                }else{
                                  $userTypeList = getAllUserType();
                                    if($userTypeList !=null ){
                                         $_SESSION['userTypeList'] = $userTypeList;
                                    }else{
                                        $_SESSION['errorMsg'] = "Something went wrong while fetching usertype.";
                                    }
                                    header("Location:login.php");  
                                    exit();
                                 }
			}else if( $requestedURL == "loginValidate.php" || $requestedURL == "sendForgetPasswordRequest.php" 
                                || $requestedURL =='resetPassword.php' 
                                || $requestedURL =='Registration.php'  || $requestedURL =='loadRegistrationPage.php' 
                                || $requestedURL =='register.php'
                                
                                ){
                            //for loginValidate...
                            // continue execution in page... 
			}else {
				$isSession = $this ->checkUserSession();
				if($isSession){
					$_SESSION['activeSession'] = "true";
				}else{
					$_SESSION['activeSession'] = "false";
					header("Location:login.php");
                                        exit();
				}
			}
		}
		public function checkUserSession(){
			if(isset($_SESSION['sessionUserId'])){
				return true;
			}else{
				return false;
			}			
		}
	 
	}
        function showErrorMessage($errorMsg="Something went wrong while processing your request."){
           ?> 
            <div id="emsg" data-noty-options='{"text":"<?php echo $errorMsg;; ?>","layout":"bottomLeft","type":"error"}'>
		<script type="text/javascript">showMessage();</script>
            </div>	
           <?php 
        }
         function showSuccessMessage($errorMsg="request processed successfully."){
           ?> 
            <div id="emsg" data-noty-options='{"text":"<?php echo $errorMsg;; ?>","layout":"bottomLeft","type":"success"}'>
		<script type="text/javascript">showMessage();</script>
            </div>	
           <?php 
        }
        
	$req = new RequestController();
	$req-> validateRequest();
?>

