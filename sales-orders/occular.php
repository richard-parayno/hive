<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hive Resource Management System - Ocular Request Form</title>
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
      if (!isset($_SESSION['currentcustomer'])) {
        echo "<script language='text/javascript'>alert('You must create a new termite or household service request first!')</script>";
        
        header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../sales-index.php");
    }
    ?>
   

  </head>
  <body>
    <!-- SIDEBAR START -->
      <div class="ui inverted left vertical sidebar menu">
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
                <a class="section" href="../sales-index.php">Sales Dashboard</a>
                <i class="right angle icon divider"></i>
                <a class="section" href="create-service-requests.php">Create Service Request</a>
                <i class="right angle icon divider"></i>
                <div class="active section">Ocular Request Form</div>
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

            <!-- Dispaly Information Start -->

            <!-- CLIENT TOGGLE START -->
           
            <!-- CLIENT TOGGLE END -->

            <div class="five wide centered column">
              <div class="ui padded segment">
                <h3 class="ui centered header">Service Request Details</h3>
                <div class="ui divider">
                </div>
                <div>
                  <?php 
                    require_once('../mysql_connect.php');
                    $currentcustomer = $_SESSION['currentcustomer'];
                    $run = "SELECT Job_order_type, date FROM pending_order WHERE customer = {$currentcustomer} ORDER BY pending_order_Id DESC LIMIT 1";
                    $ew= mysqli_query($dbc, $run);
                    while ($row = mysqli_fetch_array($ew,MYSQLI_ASSOC)){
                      echo "<h4>Service Request Type: </h4><p>".$row['Job_order_type']. "</p>";
                      echo "<h4>Date Requested: </h4><p>".$row['date']. "</p>";
                    }
                    $eww= "SELECT Name FROM customer WHERE CustomerId={$currentcustomer}";
                    $wr= mysqli_query($dbc,$eww); 
                    $row2=mysqli_fetch_array($wr,MYSQLI_ASSOC); 
                    echo "<h4>Customer Name: </h4><p>" .$row2['Name']. "</p>";
                    ?>
                </div>
              </div>
            </div>
            <!-- Display Information END -->

             <?php
              if (isset($_POST['submit1'])) {
              		
                $date= $_POST['daterequested'];
                $Name= $_POST['contactperson'];
              		 
  						  require_once('../mysql_connect.php');
 						 
                $getId= "SELECT Address,customer, Area_type, pending_order_Id FROM pending_order WHERE customer = {$currentcustomer} ORDER BY pending_order_Id DESC LIMIT 1"; 
                $ew= mysqli_query($dbc, $getId); 
                $rows= mysqli_fetch_array($ew,MYSQLI_ASSOC); 
                $address = $rows['Address'];
                $areatype=$rows['Area_type'];
                $customer= $rows['customer'];
                $pendingId= $rows['pending_order_Id'];
  					    $wq= "insert into occular_visits (CustomerID, JobSite_Adress,Area_Type, Status,LF_At_Site, Date, pending_order) values('{$customer}','{$address}','{$areatype}','Active','{$Name}', '{$date}', '{$pendingId}')";
 						    $eww= mysqli_query($dbc, $wq);

                header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/../sales-index.php");
   
              }
              

              ?>
            <!-- INput START -->
            <div class="eleven wide centered column">
              <div class="ui padded segment">
                <h3 class="ui centered header">Ocular Request Form</h3>
                <div class="ui divider">
                </div>
                 <form id="ocularform" class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                   <div class="field">
                      <label>Date Requested:</label>
                      <div class="ui calendar" id="mycalendar">
                        <div class="ui input left icon">
                          <i class="calendar icon"></i>
                          <input type="text" name="daterequested" placeholder="Date Requested"/>
                        </div>
                      </div>
                    </div>
                    <div class = "field"> 
                      <label>Contact Person:</label>
                      <input type="text" name="contactperson" placeholder="Contact Person"/>
                    </div>
                  <button class="positive ui button primary" type="submit" name="submit1">Submit</button> 
                  <div class="ui error message"></div>
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
      <script src="../dashboard3.js"></script>

  </body>
</html>
