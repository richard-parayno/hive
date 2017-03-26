x<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System</title>
  <link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" type="text/css" />
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../bower_components/semantic/dist/semantic.min.js"></script>
  <script src="../bower_components/moment/moment.js"></script>
  <script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="../bower_components/fullcalendar/dist/locale-all.js"></script>
  <link href="../bower_components/semantic-ui-calendar/dist/calendar.min.css" rel="stylesheet" type="text/css" />
  <script src="../bower_components/semantic-ui-calendar/dist/calendar.min.js"></script>

</head>

<body>
  <?php
  ob_start();
  session_start();
  if (!isset($_SESSION['currentUser'])) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."../login.php");
  }
  if ($_SESSION['currentType'] != 1) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."../login.php");
  }
  ?>
  <!-- SIDEBAR START -->
  <div class="ui inverted left vertical sidebar menu">
    <div class="item">
      <a class="ui logo icon image" href="#">
        <img src="assets/logo.png">
      </a>
      <a href="#">
        <b class="centered">Hive Resource Management System</b>
      </a>
    </div>
    <a class="item" href="sales-index.php">
      <i class="home icon"></i>
      Sales Dashboard
    </a>
    <a class="item" href="sales-orders/create-service-requests.php">
      Create Service Requests
    </a>
    <a class="item" href="sales-orders/reschedule-service-requests.php">
      Reschedule Service Requests
    </a>
    <a class="item" href="sales-chemicals/chemical.php">
      Chemical Inventory
    </a>
    <a class="item" href="sales-clients/clients-list.php">
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
    <a class="item" href="login.php">
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
						<a class="section" href="../sales-index.php">Schedule Termite Treatment</div>
            <i class="right angle icon divider"></i>
            <div class="active section">Confirm Termite Treatment</div>
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

        <!-- CONFIRM SCHEDULE START -->
        <div class="sixteen wide centered column">
          <div class="ui center aligned basic segment">
            <h3 class="ui header">Ocular Status of Service Requests</h3>
            <div class="ui divider">
            </div>
            <div class="ui two column grid">
              <?php
              //get inputs from previous page
              $toSchedule = $_POST['pending_order_Id'];
              $toScheduleDate = $_POST['initial-treat-termite'];


              ?>
            </div>
          </div>
        </div>
        <!-- CONFIRM SCHEDULE END -->


        <!-- HOUSEHOLD MODAL START -->
        <div class="ui modal household">
          <i class="close icon"></i>
          <div class="header">
            Schedule Household Treatment
          </div>
          <div class="content">
            <div class="description">
              <p>Supervisor: </p>
              <p>Date of Initial Treatment: </p>
              <p>Account Executive: </p>
              <p>Monthly Date of Service: </p>
            </div>
          </div>
          <div class="actions">
            <div class="ui black deny button">
              Close
            </div>
            <div class="ui positive right labeled icon button">
              Accept
              <i class="checkmark icon"></i>
            </div>
          </div>
        </div>
        <!-- HOUSEHOLD MODAL END -->

      </div>
    </div>
  </div>


  <!-- MAIN CONTENT END -->

  <!-- scripts -->
  <script src="../dashboard.js"></script>

</body>
</html>
