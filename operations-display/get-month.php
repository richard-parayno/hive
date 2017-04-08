<html>
<head>
</head>
<body>
<?php
$q = intval($_GET['month']);

require_once("../mysql_connect.php");
if ($q=='total')
{
	$getQuery= "SELECT JO.JONUMBER, E.NAME, JO.JOB_TYPE,CS.RATE_DATE,CS.PUNCTUALITY,CS.WORK_SPEED,CS.FRIENDLINESS,CS.QUALITY,CS.KNOWLEDGE,CS.OVERALL 
				  FROM CUSTOMER_SERVICE CS 
				  JOIN JOB_ORDER JO 
				    ON CS.JOB_ORDER =JO.JONUMBER 
			      JOIN EMPLOYEE E 
				    ON E.EMPLOYEENO =CS.EMPLOYEE_ID";
}
ELSE {
$getQuery = "SELECT JO.JONUMBER, E.NAME, JO.JOB_TYPE,CS.RATE_DATE,CS.PUNCTUALITY,CS.WORK_SPEED,CS.FRIENDLINESS,CS.QUALITY,CS.KNOWLEDGE,CS.OVERALL 
			   FROM CUSTOMER_SERVICE CS 
			   JOIN JOB_ORDER JO 
			     ON CS.JOB_ORDER =JO.JONUMBER 
			   JOIN EMPLOYEE E 
			     ON E.EMPLOYEENO =CS.EMPLOYEE_ID
			  WHERE MONTHNAME(CS.DATE) = '{$q}'";

}
$result=mysqli_query($dbc, $getQuery);

echo "
<table class='ui celled table'>
  <thead>
    <tr>
		<th>Employee Name</th>
		<th>Job Order Number</th>
		<th>Job Type</th>
		<th>Date Evaluated</th>
		<th>Punctuality</th>
		<th>Work Speed</th>
		<th>Friendliness</th>
		<th>Quality of Service</th>
		<th>Work Knowledge</th>
		<th>Overall Satisfaction</th>
    </tr>
  </thead>
  <tbody>";
  
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

echo "<tr>";
echo "<td>{$row['NAME']}</td>";
echo "<td>{$row['JONUMBER']}</td>";
echo "<td>{$row['JOB_TYPE']}</td>";
echo "<td>{$row['RATE_DATE']}</td>";
echo "<td>{$row['PUNCTUALITY']}</td>";
echo "<td>{$row['WORK_SPEED']}</td>";
echo "<td>{$row['FRIENDLINESS']}</td>";
echo "<td>{$row['QUALITY']}</td>";
echo "<td>{$row['KNOWLEDGE']}</td>";
echo "<td>{$row['OVERALL']}</td>";
echo "</tr>";
}

echo "</tbody>";
echo "</table>";

?>
</body>
</html>
