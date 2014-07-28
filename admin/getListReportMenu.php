<?php
	include_once '../com/sms/common/request/commonRequestHandler.php';
?>

<div id="reportRes" style="padding: 10px;">
<h4>List Of Reports</h4><br/>

<table class="table table-striped table-bordered">
    <tr>
        <td><a href="getReport.php?opt=Departments" >Get List Department</a></td>
        <td><a href="getReport.php?opt=Semester">Get List Semester</a></td>
        <td><a href="getReport.php?opt=Subjects">Get List Subjects</a></td>
    </tr>
    <tr>
        <td><a href="getReport.php?opt=UserType" >Get User Type</a></td>
        <td><a href="getReport.php?opt=AdminUsers">Get List Admin Users </a></td>
        <td><a href="getReport.php?opt=HeadUsers">Get List Head Users</a></td>
    </tr>
    <tr>
        <td><a href="getReport.php?opt=FacultyUsers" >Get List Faculty</a></td>
        <td><a href="getReport.php?opt=Students">Get List Student </a></td>
        <td><a href="javascript:void(0);" onclick="loadAttendanceReportFrm();"> Attendance Report </a></td>
    </tr>
</table>
 </div>

<script src="developerjs/admin_details.js"></script>
<script src="js/charisma.js"></script>
