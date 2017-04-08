<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System</title>
  <link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../bower_components/semantic/dist/semantic.min.js"></script>
  <script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" type="text/css" />
  <script src="../bower_components/moment/moment.js"></script>
  <link href="../bower_components/semantic-ui-calendar/dist/calendar.min.css" rel="stylesheet" type="text/css" />
  <script src="../bower_components/semantic-ui-calendar/dist/calendar.min.js"></script>
  <?php
    ob_start();
    session_start();
    if (isset($_GET['pk']))
      $_SESSION['pk'] = $_GET['pk'];
    ?>
</head>

<body>
  <!-- SIDEBAR START -->
  <div class="ui inverted left vertical sidebar menu">
    <div class="item">
      <a href="#">
        <b class="centered">Hive Resource Management System</b>
      </a>
    </div>
    <a class="item" href="../operations-index.php">
      <i class="home icon"></i> Operations Dashboard
    </a>
    <div class="item">
      <div class="header">
        Create Reports
      </div>
      <div class="menu">
        <a class="item" href="household-page1.php">
              Create Household Report
            </a>
        <a class="item" href="termite-treatment-page1.php">
              Create Termite Report
            </a>
        <a class="item" href="assign-occular.php">
              Create General Services Report
            </a>
        <a class="item" href="occular-page1.php">
              Create Ocular Report
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
      <div class="ui sticky top menu">
        <div class="ui item launch button">
          <i class="icon list layout"></i>
        </div>
        <div class="item">
          Sales and Marketing Department
        </div>
        <div class="item">
          <div class="ui breadcrumb">
            <a class="section" href="../operations-index.php">Operations Dashboard</a>
            <i class="right angle icon divider"></i>
            <a class="section" href="occular-page1.php">Choose Ocular Report</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Create Ocular Report</div>
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
        <!-- FORM SUBMITTION 1 START-->
        <?php
          require_once('../mysql_connect.php');
          if (isset($_POST['submit1'])){

            $ammount= $_POST['Ammount'];
            $occular = $_SESSION['pk']; 
            $update = "UPDATE job_order set Status = 'Accomplished', Total_Paymeny='{$ammount}'  where jonumber = '{$occular}'";
            $run = mysqli_query($dbc,$update);

            header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../operations-index.php");


          }
        ?>
          <!-- NEW CLIENTS START -->

          <!-- CLIENT TOGGLE START -->

          <!-- CLIENT TOGGLE END -->

          <div class="eight wide centered column">

            <div class="ui padded segment">
              <h3 class="ui centered header">General Service</h3>
              <div class="ui divider">
              </div>
              <form id="ocularreport" class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="field">
                  <label>Amount due</label>
                  <input type="number" name="Ammount" placeholder="123432"/>
                </div>
             

                <button class="positive ui right labeled icon button" name="submit1">
                  <i class="check icon"></i>
                  Submit
                </button>
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
  <script type="text/javascript">
    $('#ocularreport')
      .form({
        fields: {
          size: {
            identifier: 'size',
            rules: [
              {
                type   : 'empty',
                prompt : 'You must enter the area size.'
              }
            ]
          },
          Findings: {
            identifier: 'Findings',
            rules: [
              {
                type   : 'empty',
                prompt : 'You must enter the findings.'
              }
            ]
          },
          radior: {
            identifier: 'radior',
            rules: [
              {
                type   : 'checked',
                prompt : 'You must choose a recommendation.'
              }
            ]
          },
          radior1: {
            identifier: 'radior1',
            rules: [
              {
                type   : 'checked',
                prompt : 'You must choose the degree of area infection.'
              }
            ]
          }
        }
      })
    ;


  </script>

</body>

</html>