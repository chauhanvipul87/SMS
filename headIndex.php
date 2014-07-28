<?php
	include_once 'com/sms/common/request/commonRequestHandler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'header.php'; ?>
</head>
<body>
    <?php include 'topmenu.php'; ?>
    <div class="container-fluid">
    <div class="row-fluid">

            <?php include 'leftmenu.php'; ?>	
            <div id="content" class="span10">
            <!-- content starts -->
            <div id="resDiv" class="box"></div>

            <!-- content ends -->
            </div><!--/#content.span10-->
    </div><!--/fluid-row-->

    <?php include 'footer.php'; ?>
    <script src="developerjs/request.js"></script>
    <script src="developerjs/head.js"></script>
    <script src="developerjs/faculty.js"></script>
    <script src="developerjs/student.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
             loadHeadDeshBoardIndex();   
        });
    </script>
    
</body>
</html>
