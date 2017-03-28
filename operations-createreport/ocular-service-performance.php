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
      <div class="ui top menu">
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

            $findings= $_POST['Findings'];

            $size=$_POST['size'];
            $radior= $_POST['radior'];
                
            $Remarks=$_POST['remarks'];
            $radior1 = $_POST['radior1'];
            $occular = $_SESSION['pk']; 
            $update = "UPDATE occular_visits set Status = 'Accomplished', Area_Size ='{$size}' , Remarks= '{$Remarks}', Findings= '{$findings}', Recommendation= '{$radior}', Area_Infection = '{$radior1}'  where Occular_ID = '{$occular}'";
            $run = mysqli_query($dbc,$update);

            header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../operations-index.php");


          }
        ?>
          <!-- NEW CLIENTS START -->

          <!-- CLIENT TOGGLE START -->

          <!-- CLIENT TOGGLE END -->

          <div class="eight wide centered column">

            <div class="ui padded segment">
              <h3 class="ui centered header">Ocular Report</h3>
              <div class="ui divider">
              </div>
              <form id="ocularreport" class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="field">
                  <label>Area Size</label>
                  <input type="number" name="size" placeholder="Area Size"/>
                </div>
                <div class="field">
                  <label>Findings</label>
                  <input type="text" name="Findings" placeholder="Findings"/>
                </div>
                <div class="field">
                  <label>Remarks</label>
                  <input type="text" name="remarks" placeholder="Remarks"/>
                </div>

                <div class="grouped fields">
                  <div class="field">
                    <label>Recommendation</label>
                    <div class="ui radio checkbox">
                      <input type="radio" name="radior" value="Termite Treatment">
                      <label>Termite Treatment</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input type="radio" name="radior" value="Household Services">
                      <label>Household Service</label>
                    </div>
                  </div>
                </div>
                <div class="grouped fields">
                  <div class="field">
                    <label>Degree of Area Infection</label>
                    <div class="ui radio checkbox">
                      <input type="radio" name="radior1" value="Heavy">
                      <label>Heavy</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input type="radio" name="radior1" value="Medium">
                      <label>Medium</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input type="radio" name="radior1" value="Light">
                      <label>Light</label>
                    </div>
                  </div>
                </div>


                <button class="positive ui right labeled icon button" name="submit1">
                  <i class="check icon"></i>
                  Done
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
  <script src="../dashboard7.js"></script>

</body>

</html>