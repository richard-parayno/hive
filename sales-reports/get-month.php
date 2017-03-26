<html>
<head>
</head>
<body>
<?php
$q = intval($_GET['month']);

require_once("../mysql_connect.php");
$getQuery = "SELECT jo.jonumber, jo.job_status, c.name, c.address, jo.startdate
			   FROM job_order jo JOIN customer c on c.customerid = jo.customerid
			  WHERE MONTH(DATE(JO.startdate)) ={$q}";
$result=mysqli_query($dbc, $getQuery);

echo "
<table class='ui celled table'>
  <thead>
    <tr>
		<th>Status</th>
		<th>ID Number</th>
		<th>Customer Name</th>
		<th>Address</th>
		<th>Date and Time</th>
    </tr>
  </thead>
  <tbody>";

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

echo "<tr>";
echo "<td>{$row['job_status']}</td>";
echo "<td>{$row['jonumber']}</td>";
echo "<td>{$row['name']}</td>";
echo "<td>{$row['address']}</td>";
echo "<td>{$row['startdate']}</td>";
echo "</tr>";
}

echo "</tbody>";
echo "</table>";

?>
</body>
</html>
