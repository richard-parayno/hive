<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hive Resource Management System - General Services Job Order</title>
    <link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/semantic/dist/semantic.min.js"></script>
    <script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" type="text/css" />
    <script src="../bower_components/moment/moment.js"></script>
    <link href="../bower_components/semantic-ui-calendar/dist/calendar.min.css" rel="stylesheet" type="text/css" />
    <script src="../bower_components/semantic-ui-calendar/dist/calendar.min.js"></script>
    <link href="../style.css" rel="stylesheet" type="text/css"/>


  </head>
  <body>
    <?php
    ob_start();
    session_start();
    echo $_SESSION['currentUser'];
    if (!isset($_SESSION['currentUser'])) {
        header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
    }
    if ($_SESSION['currentType'] != 1) {
        header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
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
        <a class="item" href="../sales-orders/create-service-requests.php">
          Create Service Requests
        </a>
        <a class="item" href="../sales-orders/reschedule-service-requests.php">
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
            <a class="item" href="../sales-reports/termite-treatment-report.php">
              Termite Treatment Report
            </a>
            <a class="item" href="../sales-reports/household-treatment-report.php">
              Household Treatment Report
            </a>
            <a class="item" href="../sales-reports/general-services-report.php">
              General Services Report
            </a>
            <a class="item" href="../sales-reports/list-of-oculars-report.php">
              List of Oculars Report
            </a>
            <a class="item" href="../sales-reports/job-orders-report.php">
              Job Orders Report
            </a>
            <a class="item" href="../sales-reports/accomplished-oculars-report.php">
              Accomplished Oculars Report
            </a>
            <a class="item" href="../sales-resports/unaccomplished-oculars-report.php">
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

            <!-- NEW CLIENTS START -->

            <!-- CLIENT TOGGLE START -->

            <!-- CLIENT TOGGLE END -->

            <div class="sixteen wide centered column">

              <div class="ui basic padded segment">
                <h3 class="ui centered header">Service Request Details</h3>
                <div class="ui divider">
                </div>
                    <div>
                <?php
                     require_once('../mysql_connect.php');
                     $run = "Select * from pending_order ORDER BY pending_order_Id DESC LIMIT 1";
                     $ew= mysqli_query($dbc, $run);
                       while ($row = mysqli_fetch_array($ew,MYSQLI_ASSOC)){
                       $id=$row['customer'];
                       echo "<br><h3>Service Request Type: </h3>".$row['Job_order_type']. "</br>";
                       echo "<br><h3>Date Requested: </h3>".$row['date']. "</br>";
                       }
                        $eww= "Select Name from customer where CustomerId='{$id}'";
                        $wr= mysqli_query($dbc,$eww);
                        $row2=mysqli_fetch_array($wr,MYSQLI_ASSOC);
                        echo "<br><h3>Customer Name: </h3>" .$row2['Name']. "</br";

                ?>
              </div>
              </div>
            </div>
            <!-- NEW CLIENTS END -->

            <!-- OLD CLIENTS START -->
            <div class="sixteen wide centered column">
              <div class="ui basic padded segment">
                <h3 class="ui centered header">New Clients</h3>
                <div class="ui divider">
                </div>
                  <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="field">
                      <label>Account Executive In Charge: </label>
                      <select class="ui search dropdown" name ="atype">
                        <?php
                        require ('../mysql_connect.php');
                         $aeincharge = "SELECT employeeno, name FROM employee WHERE employeeposition ='Accountant'";
                        $getAE = mysqli_query($dbc, $aeincharge);

                         while ($row = mysqli_fetch_array($getAE,MYSQLI_ASSOC)){
                            echo '<option value="'.$row['employeeno'].'">'.$row['name'].'</option>';
                           } ?>
                      </select>
                    </div>
                    <div class="field">
                       <label>Supervisor In Charge: </label>
                      <select class="ui search dropdown" name ="stype">
                        <?php
                        require ('../mysql_connect.php');
                         $supervisor = "SELECT employeeno, name FROM employee WHERE employeeposition ='Supervisor'";
                         $gethead = mysqli_query($dbc, $supervisor);

                          while ($row = mysqli_fetch_array($gethead,MYSQLI_ASSOC)){
                           echo '<option value="'.$row['employeeno'].'">'.$row['name'].'</option>';
                     } ?>
                      </select>
                      </div>
                       <div class="field">
                      <label>Date Available</label>
                      <div class="ui calendar" id="mycalendar">
                        <div class="ui input left icon">
                          <i class="calendar icon"></i>
                          <input type="text" name = "Date" placeholder="Date">
                        </div>
                      </div>
                    </div>
                     <div class="field">
                      <label>Type of Service Requested</label>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radior" <?php if (isset($radior) && $radior=="Termite Treatment") echo "checked";?> value="Termite Treatment">
                        <label>Termite</label>
                      </div>
                      <br></br>
                       <div class="field">

                      <div class="ui radio checkbox">
                        <input type="radio" name="radior" <?php if (isset($radior) && $radior=="Termite Treatment") echo "checked";?> value="Termite Treatment">
                        <label>Termite</label>
                      </div>
                      <br></br>
                       <div class="field">
                      <div class="ui radio checkbox">
                        <input type="radio" name="radior" <?php if (isset($radior) && $radior=="Termite Treatment") echo "checked";?> value="Termite Treatment">
                        <label>Termite</label>
                      </div>
                      <br></br>
                    <div class="field">
                      <label>Remarks</label>
                      <textarea rows="2"></textarea>
                    </div>
                    <button class="ui button primary" type="submit">Submit</button>
                  </form>
              </div>
            </div>
            <!-- OLD CLIENTS END -->
          </div>
        </div>
      </div>


      <!-- MAIN CONTENT END -->

      <!-- scripts -->
      <script src="../dashboard.js"></script>

  </body>
</html>
