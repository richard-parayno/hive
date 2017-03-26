<html>
<head>
</head>
<body>
<?php
$q = intval($_GET['client']);

require_once("../mysql_connect.php");
$getQuery = "SELECT oc.Date AS occular_date, po.date AS po_date, c.address, po.job_order_type
               FROM customer c
               JOIN occular_visits oc
                 ON c.CustomerId=oc.CustomerId
               JOIN pending_order po
                 ON c.CustomerId=po.customer
              WHERE c.customerId={$q}";
$result=mysqli_query($dbc, $getQuery);

echo "
<table class='ui celled table'>
  <thead>
    <tr>
      <th>Ocular Date</th>
      <th>Treatment Date</th>
      <th>Address</th>
      <th>Type of Treatment</th>
    </tr>
  </thead>
  <tbody>";

while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  echo "<tr>";
  echo "<td>{$row['occular_date']}</td>";
  echo "<td>{$row['po_date']}</td>";
  echo "<td>{$row['address']}</td>";
  echo "<td>{$row['job_order_type']}</td>";
  echo "</tr>";
}
echo "</tbody>";
echo "</table>";

?>
</body>
</html>
