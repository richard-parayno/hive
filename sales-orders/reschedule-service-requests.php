<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System - Reschedule Service Request</title>
  <link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>
  <script src="../bower_components/semantic/dist/semantic.min.js"></script>
  <script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" type="text/css" />
  <script src="../bower_components/moment/moment.js"></script>
  <script src="../bower_components/chained/jquery.chained.js"></script>
  <link href="../bower_components/semantic-ui-calendar/dist/calendar.min.css" rel="stylesheet" type="text/css" />
  <script src="../bower_components/semantic-ui-calendar/dist/calendar.min.js"></script>
  <link href="../style.css" rel="stylesheet" type="text/css"/>

</head>
<body>
  <!-- initialize db connection -->
  <?php
  ob_start();
  session_start();
  if (!isset($_SESSION['currentUser'])) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  if ($_SESSION['currentType'] != 1) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  require_once('../mysql_connect.php');

  #TODO: Create a table and place deactivated job orders there.

  if (isset($_POST['client-select'])) {
    $client = $_POST['client-select'];
    if (isset($_POST['treatment-type'])) {
      $treatmentType = $_POST['treatment-type'];
      if (isset($_POST['new-date'])) {
        //Set old record to deactivated
        $newDate = $_POST['new-date'];
        $oldDate = $_POST['reschedule-this'];

        $query="UPDATE pending_order SET status='Deactivated' WHERE customer='{$client}' AND Job_order_type='{$treatmentType}' AND date='{$oldDate}' ";
        $result = mysqli_query($dbc,$query);
        //get old records
        $query="SELECT * FROM pending_order WHERE customer='{$client}' AND Job_order_type='{$treatmentType}' AND date='{$oldDate}'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //insert updated records
        $query="INSERT INTO pending_order(Job_order_type, Address, customer, employee_recieved, date, customerType, Area_type, status)
        VALUES ('{$treatmentType}', '{$row['Address']}', '{$client}', '{$row['employee_recieved']}', '{$newDate}', '{$row['customerType']}', '{$row['Area_type']}', 'Pending')";
        $result = mysqli_query($dbc, $query);

        echo '<script type="text/javascript"> alert(\'Service Request Rescheduled!\'); </script>';

      }
    }
  }
  ?>
  <!-- SIDEBAR START -->
  <div class="ui inverted left vertical sidebar menu" id="sidebar">
    <div class="item">
      <a class="ui logo icon image" href="#">

      </a>
      <a href="#">
        <b>Hive Resource Management System</b>
      </a>
    </div>
    <a class="item" href="../sales-index.php">
      <i class="home icon"></i>
      Sales Dashboard
    </a>
    <a class="item" href="create-service-requests.php">
      Create Service Requests
    </a>
    <a class="item" href="reschedule-service-requests.php">
      Reschedule Service Requests
    </a>
    <a class="item" href="../sales-chemicals/chemical.php">
      Chemical Inventory
    </a>
    <a class="item" href="../sales-clients/clients-list.php">
      View Clients
    </a>
    <div class="item">
      <div class="header">
        Reports
      </div>
      <div class="menu">
        <a class="item" href="sales-reports/termite-treatment-report.php">
          Termite Treatment Report
        </a>
        <a class="item" href="sales-reports/household-treatment-report.php">
          Household Treatment Report
        </a>
        <a class="item" href="sales-reports/general-services-report.php">
          General Services Report
        </a>
        <a class="item" href="sales-reports/list-of-oculars-report.php">
          List of Oculars Report
        </a>
        <a class="item" href="sales-reports/accomplished-oculars-report.php">
          Accomplished Oculars Report
        </a>
        <a class="item" href="sales-resports/unaccomplished-oculars-report.php">
          Unaccomplished Oculars Report
        </a>
      </div>
    </div>
    <a class="item" href="../login.php">
      Log Out
    </a>
  </div>
  <!-- SIDEBAR END -->


  <!-- MAIN CONTENT START -->
  <div class="pusher">
    <!-- TOP BAR START-->
    <div class="sixteen wide column">
      <div class="ui top menu">
        <a class="ui item launch">
          <i class="sidebar icon"></i>
          Menu
        </a>
        <div class="item">
          Sales and Marketing Department
        </div>
        <div class="item">
          <div class="ui breadcrumb">
            <a class="section" href="../sales-index.php">Sales Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Reschedule Service Requests</div>
          </div>
        </div>
        <div class="right menu ">
          <a class="ui labeled item notifications">
            Notifications

          </a>
        </div>
      </div>
    </div>
    <!-- TOP BAR END -->
    <div class="ui basic padded segment">
      <div class="ui relaxed grid">
        <!-- NOTIFICATION FEED START -->
        <div class="ui special popup">
          <div class="eight wide column center aligned grid">
            <div class="ui small feed">
              <h4 class="ui header">Notifications</h4>
              <div class="event">
                <div class="content">
                  <div class="summary">
                    Ocular Inspection for <a>Job Order 1234</a> has been accomplished.
                  </div>
                </div>
              </div>
              <div class="event">
                <div class="content">
                  <div class="summary">
                    <a>Job Order 1234</a> has been accomplished.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- NOTIFICATION FEED END -->

        <div class="eight wide centered column">
          <div class="ui padded segment">
            <h3 class="ui centered header">Reschedule Service Requests</h3>
            <div class="ui divider">
            </div>
            <form id="reschedform" class="ui form" method="POST" action="reschedule-service-requests.php">
              <div class="field">
                <label>Select Client</label>
                <select class="ui search dropdown" id='client-select' name='clientselect'>
                  <option value="">Select Client</option>
                  <?php
                  $getQuery = "SELECT * FROM customer";
                  $result = mysqli_query($dbc,$getQuery);
                  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    echo "<option value=\"{$row['CustomerId']}\">{$row['Name']}</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="field">
                <label>Treatment Type</label>
                <select class="ui search dropdown" id="treatment-type" name="treatmenttype">
                  <option value="">Select Treatment Type</option>
                  <?php
                  $getQuery = "SELECT * FROM pending_order WHERE status='Pending'";
                  $result = mysqli_query($dbc,$getQuery);
                  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    echo "<option value=\"{$row['Job_order_type']}\" class=\"{$row['customer']}\">{$row['Job_order_type']}</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="field">
                <label>Date of Service Request to be Rescheduled</label>
                <select class="ui search dropdown" id="reschedule-this" name="reschedulethis">
                  <option value="">Select Service Request to be Rescheduled</option>
                  <?php
                  $getQuery = "SELECT * FROM pending_order WHERE status='Pending'";
                  $result = mysqli_query($dbc,$getQuery);
                  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    echo "<option value=\"{$row['date']}\" class=\"{$row['customer']}\\{$row['Job_order_type']}\">{$row['date']}</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="field">
                <label>New Date of Service Request</label>
                <div class="ui calendar" id="mycalendar">
                  <div class="ui input left icon">
                    <i class="calendar icon"></i>
                    <input type="text" placeholder="New Date of Service Request" name="newdate" value="new-date">
                  </div>
                </div>
              </div>
              <button class="ui primary button" type="submit">Submit</button>
              <div class="ui error message"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- MAIN CONTENT END -->

  <!-- scripts -->
  <script src="../dashboard.js"></script>
  <script src="../dashboard3.js"></script>

</body>
</html>
