<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System</title>
  <link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" type="text/css"
  />
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../bower_components/chained/jquery.chained.js"></script>
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
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  if ($_SESSION['currentType'] != 3) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }

  ?>
    <!-- SIDEBAR START -->
    <div class="ui inverted left vertical sidebar menu" id="sidebar">
      <div class="item">
        <a href="#">
          <b class="centered">Hive Resource Management System</b>
        </a>
      </div>
      <a class="item" href="../operations-index.php">
        <i class="home icon"></i> Admin Module
      </a>
      <div class="item">
        <div class="header">
          User Accounts
        </div>
        <div class="menu">
          <a class="item" href="manage-employees.php">Manage Employees</a>
        </div>
        <div class="menu">
          <a class="item" href="manage-accounts.php">Manage Accounts</a>
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
        <div class="ui sticky top menu">
          <a class="ui item launch">
            <i class="sidebar icon"></i> Menu
          </a>
          <div class="item">
            <div class="ui breadcrumb">
              <a class="section" href="../admin-index.php">Admin Module</a>
              <i class="right angle icon divider"></i>
              <div class="active section">Manage Employees</div>
            </div>
          </div>
          <div class="right menu ">

          </div>
        </div>
      </div>
      <!-- TOP BAR END -->
      <div class="ui basic padded segment">
        <div class="ui relaxed grid">
          <div class="sixteen wide centered column">
            <div class="ui center aligned segment">
              <h3 class="ui header">Manage Employees</h3>
              <div class="ui divider">
              </div>
              <div class="ui two column doubling stackable grid container">
                <div class="eight wide column">
                  <div class="ui center aligned segment">
                    <h3 class="ui header">Add Employee<h3>
                    <div class="ui divider"></div>
                  </div>
                </div>
                <div class="eight wide column">
                  <div class="ui center aligned segment">
                    <h3 class="ui header">Update Employee<h3>
                    <div class="ui divider"></div>  
                  </div>                  
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>


    <!-- MAIN CONTENT END -->
    <script src="../dashboard.js"></script>

</body>

</html>