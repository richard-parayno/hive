<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System - Create Service Request</title>
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
  /*
  if (!isset($_SESSION['currentUser'])) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  if ($_SESSION['currentType'] != 1) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  */
  ?>
</head>
<body>
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
      <div class="ui sticky top menu">
        <a class="ui item launch">
          <i class="sidebar icon"></i>
          Menu
        </a>
        <div class="item">
          Operations Department
        </div>
        <div class="item">
          <div class="ui breadcrumb">
            <a class="section" href="../operations-index.php">Operations Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Household Service Report</div>
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
      
        <!-- NEW CLIENTS START -->

        <!-- CLIENT TOGGLE START -->
      
        <!-- CLIENT TOGGLE END -->

        <div class="sixteen wide centered column ">
          <div class="ui padded segment">
            <h3 class="ui centered header">Termite Treatment Service List</h3>
            <label> <left align><b> Choose a Termite Treatment service to create a report for </left></b> </label>
            <div class="ui divider">
            </div>

          <div class="field">
              <table class="ui celled table">
                      <thead>
                        <tr>
                          <th>ID Number</th>
                          <th>Customer Name</th>
                           <th>Address </th>
                           <th>Date</th>
                           
                        </tr>
                      </thead>
                      <tbody>
            <?php
            require_once('../mysql_connect.php');
          /*  $sql = "SELECT hp.ControlNumber, jo.jonumber, jo.startdate, c.name, po.Address FROM householdpesttreatment hp JOIN job_order jo ON hp.joborder_jonumber = jo.jonumber JOIN customer c ON jo.customerid=c.customerid Join occular_visits ov on jo.Occular_id = ov.occular_id join pending_order po on po.pending_order_id = ov.pending_order"; 
            $qry = mysqli_query($dbc,$sql);
            while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
              //<a href=\"clientreport.php?pk={$row['customerId']}\"><div align=\"center\">{$row['name']}
                   $date= new DateTime ($row['startdate']);
              echo "<tr>
              <td width=\"5%\"><a href=\"household-treatment-service.php?pk={$row['ControlNumber']}\"><div align=\"center\">{$row['ControlNumber']}
              </div></a></td>
              <td width=\"5%\"><div align=\"center\">{$row['name']}</a>
              </div></a></td>
              <td width=\"10%\"><div align=\"center\">{$row['Address']}</a>
              </div></a></td>
              <td width=\"10%\"><div align=\"center\">{$date->format('m-d-Y')}</a>
              </div></td>
              </tr>";
              }
              */
            $sql = "SELECT tt.ttspidno, tt.joborderno, tt.date, c.name,po.Address FROM termitetreatment_serviceperformance tt join job_order jo on jo.jonumber = tt.joborderno join customer c on c.customerid = jo.customerid join occular_visits ov on jo.Occular_id = ov.occular_id join pending_order po on po.pending_order_id = ov.pending_order";
            $qry = mysqli_query($dbc,$sql);
            while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
             // $try = $row['joborderno'];
              $date = new DateTime ($row['date']);
              echo "<tr>
              <td width=\"5%\"><a href=\"termite-service-performance.php?pk={$row['ttspidno']}\"><div align=\"center\">{$row['ttspidno']}
              </div></a></td>
              <td width=\"10%\"><div align=\"center\">{$row['name']}</a>
              </div></a></td>
               <td width=\"10%\"><div align=\"center\">{$row['Address']}</a>
              </div></a></td>
              <td width=\"10%\"><div align=\"center\">{$date->format('m-d-Y')}</a>
              </div></td
              </tr>";
            }
            ?>
           </tbody>
           </table>
          <center>-End Of List-</center>
           
        </div>
      </div>
      <!-- NEW CLIENTS END  <input type="submit" name="submit" value="Submit1"> -->

      <!-- OLD CLIENTS START -->
      <br></br>
 
      <!-- OLD CLIENTS END -->

  </div>
</div>


<!-- MAIN CONTENT END -->

<!-- scripts -->
<script src="../dashboard.js"></script>

</body>
</html>
