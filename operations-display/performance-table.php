<html>
<head>
</head>
<body>
<?php
$q = intval($_GET['month']);

require_once("../mysql_connect.php");
if ($q=='total')
{
	$getGeneralService= "SELECT e.name, count(tm.employeeNO) from employee e 
	join team_members tm on tm.EmployeeNo = e.employeeNO 
	join team t on tt.TeamIDno = tm.TeamIdNo 
	join job_order jo on jo.jonumber = t.JobOrder_NO 
	where jo.job_type = 'General Services'";
	$getHouseholdService="SELECT e.name, count(tm.employeeNO) from employee e 
	join team_members tm on tm.EmployeeNo = e.employeeNO 
	join team t on tt.TeamIDno = tm.TeamIdNo 
	join job_order jo on jo.jonumber = t.JobOrder_NO 
	where jo.job_type = 'Household Services'";
	$getTermite="SELECT e.name, count(tm.employeeNO) from employee e 
	join termiteteammembers tm on tm.EmployeeNo = e.employeeNO 
	join termite_team t on tt.TeamID = tm.TermiteTeamId 
	join termitetreatment_serviceperformance ttsp on ttsp.TeamID = tt.TeamID";
	$getOccular = "Select e.name, count (ov.SupervisedBy) from employee each
				   join occular_visits ov on ov.SupervisedBy = e.EmployeeNo";
}
ELSE {
$getGeneralService= "SELECT e.name, count(tm.employeeNO) as total from employee e 
	join team_members tm on tm.EmployeeNo = e.employeeNO 
	join team t on tt.TeamIDno = tm.TeamIdNo 
	join job_order jo on jo.jonumber = t.JobOrder_NO 
	where jo.job_type = 'General Services' and where MONTHNAME (jo.StartDATE)='{$q}'";
	$getHouseholdService="SELECT e.name, count(tm.employeeNO) from employee e 
	join team_members tm on tm.EmployeeNo = e.employeeNO 
	join team t on tt.TeamIDno = tm.TeamIdNo 
	join job_order jo on jo.jonumber = t.JobOrder_NO 
	where jo.job_type = 'Household Services' and where MONTHNAME (jo.StartDATE)='{$q}'";
	$getTermite="SELECT e.name, count(tm.employeeNO) from employee e 
	join termiteteammembers tm on tm.EmployeeNo = e.employeeNO 
	join termite_team t on tt.TeamID = tm.TermiteTeamId 
	join termitetreatment_serviceperformance ttsp on ttsp.TeamID = tt.TeamID where MONTHNAME (ttsp.DATE)='{$q}'";
	$getOccular = "Select e.name, count (ov.SupervisedBy) from employee each
				   join occular_visits ov on ov.SupervisedBy = e.EmployeeNo where MONTHNAME(ov.Date) = '{$q}'";

}
$result1=mysqli_query($dbc, $getGeneralService);
$result2=mysqli_query($dbc, $getHouseholdService);
$result3=mysqli_query($dbc, $getTermite);
$result4=mysqli_query($dbc, $getOccular);
echo "
<table class='ui celled table'>
  <thead>
    <tr>
		<th>Employee Name</th>
		<th>General Service</th>
		<th>Occular</th>
		<th>Household Pest Treatment</th>
		<th>Termite Treatment</th>
    </tr>
  </thead>
  <tbody>";
  
while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){

echo "<tr>";
echo "<td>{$row['name']}</td>";
echo "<td>{$row['jonumber']}</td>";
}

echo "</tbody>";
echo "</table>";

?>
</body>
</html>
