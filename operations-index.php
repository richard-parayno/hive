<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System</title>
  <link href="bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
  <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" type="text/css" />
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/semantic/dist/semantic.min.js"></script>
  <script src="bower_components/moment/moment.js"></script>
  <script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="bower_components/fullcalendar/dist/locale-all.js"></script>
  <link href="bower_components/semantic-ui-calendar/dist/calendar.min.css" rel="stylesheet" type="text/css" />
  <script src="bower_components/semantic-ui-calendar/dist/calendar.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css"/>



</head>
<body>
  <?php
  session_start();
  /**if (!isset($_SESSION['currentUser'])) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  if ($_SESSION['currentType'] != 2) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }**/
  ?>
  <!-- SIDEBAR START -->
  <div class="ui inverted left vertical sidebar menu" id="sidebar">
    <div class="item">
      <a href="#">
        <b class="centered">Hive Resource Management System</b>
      </a>
    </div>
    <a class="item" href="operations-index.php">
      <i class="home icon"></i>
      Operations Dashboard
    </a>
    <div class="item">
      <div class="header">
        Assign
      </div>
      <div class="menu">
        <a class="item" href="operations-assign/assign-generalServices.php">
          Assign General Services
        </a>
        <a class="item" href="operations-assign/assign-household.php">
          Assign Household
        </a>
        <a class="item" href="operations-assign/assign-occular.php">
          Assign Ocular
        </a>
        <a class="item" href="operations-assign/assign-termite.php">
          Assign Termite
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
          Operations Department
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

        <!-- Operations Dashboard START -->
        <div class="sixteen wide centered column">
          <div class="ui center aligned segment">
            <h3 class="ui header">Operations Dashboard</h3>
            <div class="ui divider">
            </div>
            <div class="ui four column grid">
              <!-- OCULARS W/O SUPERVISOR START -->
              <div class="four wide column">
                <div class="ui center aligned segment">
                  <h5 class="ui centered header">Oculars</h5>
                  <form class="ui form" method="POST" action="">
                    <div class="field">
                      <label>Select Ocular Without Supervisor</label>
                      <select class="ui search dropdown" name="oculars">
                        <option value="">Select Service Request Type</option>
                        <option value="Termite Treatment">Termite Treatment</option>
                        <option value="Household Treatment">Household Treatment</option>
                      </select>
                    </div>
                    <button class="positive ui primary button" id="termite-button" name="submit1">Schedule Termite Treatment</button>
                  </form>
                </div>
              </div>
              <!-- OCULARS W/O SUPERVISOR END -->
              <!-- TERMITE WITHOUT TEAM START -->
              <div class="four wide column">
                <div class="ui center aligned segment">
                  <h5 class="ui centered header">Termite Treatment</h5>
                  <form class="ui form" method="POST" action="">
                    <div class="field">
                      <label>Select Termite Treatment Without Team</label>
                      <select class="ui search dropdown" name="oculars">
                        <option value="">Select Service Request Type</option>
                        <option value="Termite Treatment">Termite Treatment</option>
                        <option value="Household Treatment">Household Treatment</option>
                      </select>
                    </div>
                    <button class="positive ui primary button" id="termite-button" name="submit1">Schedule Termite Treatment</button>
                  </form>
                </div>
              </div>
              <!-- TERMITE WITHOUT TEAM END -->
              <!-- HOUSEHOLD WITHOUT TEAM START -->
              <div class="four wide column">
                <div class="ui center aligned segment">
                  <h5 class="ui centered header">Household Treatment</h5>
                  <form class="ui form" method="POST" action="">
                    <div class="field">
                      <label>Select Household Treatment Without Team</label>
                      <select class="ui search dropdown" name="oculars">
                        <option value="">Select Service Request Type</option>
                        <option value="Termite Treatment">Termite Treatment</option>
                        <option value="Household Treatment">Household Treatment</option>
                      </select>
                    </div>
                    <button class="positive ui primary button" id="termite-button" name="submit1">Schedule Termite Treatment</button>
                  </form>
                </div>
              </div>
              <!-- HOUSEHOLD WITHOUT TEAM END -->
              <!-- GENERAL SERVICE WITHOUT TEAM START -->
              <div class="four wide column">
                <div class="ui center aligned segment">
                  <h5 class="ui centered header">General Services</h5>
                  <form class="ui form" method="POST" action="">
                    <div class="field">
                      <label>Select General Service Without Team</label>
                      <select class="ui search dropdown" name="oculars">
                        <option value="">Select Service Request Type</option>
                        <option value="Termite Treatment">Termite Treatment</option>
                        <option value="Household Treatment">Household Treatment</option>
                      </select>
                    </div>
                    <button class="positive ui primary button" id="termite-button" name="submit1">Schedule Termite Treatment</button>
                  </form>
                </div>
              </div>
              <!-- GENERAL SERVICE WITHOUT TEAM END -->
            </div>
          </div>
        </div>
        <!-- Operations Dashboard END -->


        <!-- CALENDAR START -->
        <div class="thirteen wide centered column">
          <div class="ui center aligned segment">
            <h3 class="ui header">Calendar of Activities</h3>
            <div class="ui divider">
            </div>
            
            <div id="calendar">
            </div>
          </div>
        </div>
        <!-- CALENDAR END-->
      </div>
    </div>
  </div>


  <!-- MAIN CONTENT END -->
  <script src="dashboard.js"></script>

</body>
</html>
