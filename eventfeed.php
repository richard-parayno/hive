<?php
require_once('mysql_connect.php');

try {
  $connection = new PDO('mysql:host=localhost;dbname=appdev;charset=utf8mb4', 'root', '');

  $query = "SELECT * FROM job_order";
  $sth = $connection->prepare($query);
  $sth->execute();

  $events=array();

  while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    $e = array();
    $e['id'] = $row['JONumber'];
    $e['title'] = $row['job_type'];
    $e['start'] = $row['StartDate'];
    $e['end'] = $row['EndDate'];

    if ($row['job_status'] == 'Ongoing')
      $e['color'] = 'green';
    else
      $e['color'] = 'red';

    $e['allDay'] = false;

    array_push($events, $e);
  }

  echo json_encode($events);
  exit();
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>
