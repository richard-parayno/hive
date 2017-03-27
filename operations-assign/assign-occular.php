<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System</title>
  <link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" type="text/css" />
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
  if (isset($_POST['oculars'])) {
    $chosenocular = $_POST['oculars'];
    $_SESSION['ocular'] = $chosenocular;
  }
  else {
    header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/../operations-index.php");
  }

  ?>
  <!-- SIDEBAR START -->
  <div class="ui inverted left vertical sidebar menu">
    <div class="item">
      <a href="#">
        <b>Hive Resource Management System</b>
      </a>
    </div>
    <a class="item" href="../operations-index.php">
      <i class="home icon"></i> Operations Dashboard
    </a>
    <div class="item">
      <div class="header">
        Create Report
      </div>
      <div class="menu">
        <a class="item" href="/../operations-createReport/household-page1.php">
          Create Household Report
        </a>
        <a class="item" href="/../operations-createReport/termite-treatment-page1.php">
          Create Termite Report
        </a>
        <a class="item" href="#">
          Create General Services Report
        </a>
        <a class="item" href="#">
          Create Occular Report
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
          Operations Department
        </div>
        <div class="item">
          <div class="ui breadcrumb">
            <a class="section" href="../operations-index.php">Operations Dashboard</a>
            <i class="right angle icon divider"></i>
            <a class="section" href="../operations-index.php">Oculars</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Assign Workers to Ocular</div>
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
        <!-- Accept Start -->
        <?php
          
          require_once('../mysql_connect.php');
          $flag=0;
          if (isset($_POST['accept'])){
            $ocular = $_SESSION['ocular'];
            echo $ocular;
            $EmployeeID = $_POST['client'];
            echo $EmployeeID;
            $sql = "UPDATE occular_visits SET SupervisedBy='{$EmployeeID}' WHERE Occular_ID= '{$ocular}'";
            $runquery= mysqli_query($dbc,$sql); 

            header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/../operations-index.php");

          } 
        ?>
          <!-- Accept End-->
          <div class="five wide centered column">
            <div class="ui padded segment">
              <h3 class="ui centered header">Ocular Details</h3>
              <div class="ui divider">
              </div>
              <div>
                <?php 
                  require_once('../mysql_connect.php');
                  $run = "SELECT Job_order_type, DATE(ov.Date) AS Date, ov.CustomerID AS CustomerID, c.Name AS Name, LF_At_Site  FROM pending_order po JOIN occular_visits ov ON ov.pending_order=po.pending_order_Id JOIN customer c ON ov.CustomerID=c.CustomerId WHERE Occular_ID={$chosenocular}";
                  $ew= mysqli_query($dbc, $run);
                  while ($row = mysqli_fetch_array($ew,MYSQLI_ASSOC)){
                    echo "<h4>Service Request Type: </h4><p>".$row['Job_order_type']. "</p>";
                    echo "<h4>Ocular Date Requested: </h4><p>".$row['Date']. "</p>";
                    echo "<h4>Customer Name: </h4><p>" .$row['Name']. "</p>";
                    echo "<h4>Looking For At Site: </h4><p>" .$row['LF_At_Site']. "</p>";
                    
                  }

                  ?>
              </div>
            </div>
          </div>

          <div class="eleven wide centered column">
            <div class="ui padded segment">
              <h3 class="ui centered header">List of Employees That Can be Assigned For Occular</h3>
              <div class="ui divider">
              </div>
              <div class="ui form">
                <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="field">
                    <label>Employees </label>
                    <select name="client" id="client" class="ui search dropdown">
                      <option value="">Select Employee That Can Be Assigned</option>
                      <?php 
                        $getQuery = "SELECT customer
                                      FROM occular_visits ov 
                                      JOIN pending_order po 
                                        ON ov.pending_order=po.pending_order_Id
                                      WHERE Occular_ID= '{$chosenocular}'";
                        $result = mysqli_query($dbc, $getQuery);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                      
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  occular_visits where Occular_ID = '{$chosenocular}'";
                        $runquery= mysqli_query($dbc,$getoccular); 
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "select * from employee e where e.employeeNo not In ( select t.employeeno from team_members t where t.teamIdNo in (select ti.teamIdno from team ti where ti.jobOrder_No in (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and e.employeeposition = 'Worker' and e.employeeNo not In ( Select tt.EmployeeNo from termiteteammembers tt where tt.TermiteTeamID in (Select tti.TeamID from termite_team tti where tti.TTMSPIDno in(Select ttmsp.TTSPIDNO from termitetreatment_serviceperformance ttmsp WHERE ttmsp.date ='{$gettingData['Date']}')))";

                        $getname = mysqli_query($dbc, $custname);
                        while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                          echo '<option value="'.$row['EmployeeNo'].'">'.$row['Name'].'</option>';
                        }
                        $selectOption = $row['customer'];
                    ?>        
                    </select>
                  </div>
                  <div class="ui buttons">

                    <button class="ui positive button" type="submit" name="accept">Accept <i class="checkmark icon"></i> </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>

    <!-- MAIN CONTENT END -->

    <!-- scripts -->
    <script src="../dashboard.js"></script>

</body>

</html>