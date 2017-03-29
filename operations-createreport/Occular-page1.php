<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System - Create Ocular Report</title>
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
        Create Report
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
        <a class="item" href="assign-termite.php">
          Create Ocular Report
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
        <div class="item">
          <div class="ui breadcrumb">
            <a class="section" href="../operations-index.php">Operations Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Choose Ocular Report</div>
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
            <h3 class="ui centered header">Occular Service List</h3>
            <label> <left align><b> Choose a Occular service to create a report for </left></b> </label>
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
            $sql = "SELECT ov.occular_ID, c.name,ov.date, po.Address from occular_visits ov join customer c on ov.CustomerID = c.customerID  join pending_order po on po.pending_order_id = ov.pending_order where ov.Supervisedby IS NOT NULL";
            $qry = mysqli_query($dbc,$sql);

            while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
              //<a href=\"clientreport.php?pk={$row['customerId']}\"><div align=\"center\">{$row['name']}
              $date= new DateTime ($row['date']);
              echo "<tr>
              <td width=\"5%\"><a href=\"ocular-service-performance.php?pk={$row['occular_ID']}\"><div align=\"center\">{$row['occular_ID']}
              </div></a></td>
              <td width=\"5%\"><div align=\"center\">{$row['name']}</a>
              </div></a></td>
              <td width=\"10%\"><div align=\"center\">{$row['Address']}</a>
              </div></a></td>
              <td width=\"10%\"><div align=\"center\">{$date->format('m-d-Y')}</a>
              </div></td>
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
