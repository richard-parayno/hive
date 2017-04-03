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
  <script src="bower_components/chained/jquery.chained.js"></script>
  <script src="bower_components/semantic/dist/semantic.min.js"></script>
  <script src="bower_components/moment/moment.js"></script>
  <script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="bower_components/fullcalendar/dist/locale-all.js"></script>
  <link href="bower_components/semantic-ui-calendar/dist/calendar.min.css" rel="stylesheet" type="text/css" />
  <script src="bower_components/semantic-ui-calendar/dist/calendar.min.js"></script>



</head>
<body>
  <?php
  ob_start();
  session_start();
  if (!isset($_SESSION['currentUser'])) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  if ($_SESSION['currentType'] != 2) {
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
    <a class="item" href="operations-index.php">
      <i class="home icon"></i>
      Operations Dashboard
    </a>
    <div class="item">
      <div class="header">
        Create Reports
      </div>
      <div class="menu">
        <a class="item" href="operations-createreport/household-page1.php">
          Create Household Report
        </a>
        <a class="item" href="operations-createreport/termite-treatment-page1.php">
          Create Termite Report
        </a>
        <a class="item" href="operations-createreport/assign-occular.php">
          Create General Services Report
        </a>
        <a class="item" href="operations-createreport/occular-page1.php">
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
      <div class="ui sticky top menu">
        <a class="ui item launch">
          <i class="sidebar icon"></i>
          Menu
        </a>
        <div class="item">
          Operations Department
        </div>
        <div class="right menu ">

        </div>
      </div>
    </div>
    <!-- TOP BAR END -->
    <div class="ui basic padded segment">
      <div class="ui relaxed grid">
        <!-- Operations Dashboard START -->
        <div class="sixteen wide centered column">
          <div class="ui center aligned segment">
            <h3 class="ui header">Operations Dashboard</h3>
            <div class="ui divider">
            </div>
            <div class="ui four column doubling stackable grid container">
              <!-- OCULARS W/O SUPERVISOR START -->
              <div class="four wide column">
                <div class="ui center aligned segment">
                  <h5 class="ui centered header">Oculars</h5>
                  <form id="ocularnosupervisor" class="ui form" method="POST" action="operations-assign/assign-occular.php">
                    <div class="field">
                      <label>Service Request Type</label>
                      <select class="ui search dropdown" id="servicetypes" name="servicetypes">
                        <option value="">Select Service Request Type</option>
                        <option value="Termite Treatment">Termite Treatment</option>
                        <option value="Household Services">Household Services</option>
                      </select>
                    </div>
                    <div class="field">
                      <label>Ocular Request Without Supervisor</label>
                      <select class="ui search dropdown" id="oculars" name="oculars">
                        <option value="">Select Ocular Request Without Supervisor</option>
                        <?php
                        require_once("mysql_connect.php");
                        $getQuery = "SELECT Occular_ID, Job_order_type, DATE(ov.Date) AS Date, Area_type, LF_At_Site, customer
                                       FROM occular_visits ov 
                                       JOIN pending_order po 
                                         ON ov.pending_order=po.pending_order_Id
                                      WHERE SupervisedBy IS NULL";
                        $result = mysqli_query($dbc, $getQuery);
                        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                          echo "<option value =\"{$row['Occular_ID']}\" class=\"{$row['Job_order_type']}\">Date: {$row['Date']} | Area Type: {$row['Area_type']} | Look for: {$row['LF_At_Site']}</option>";
                        }                      
                        ?>
                      </select>
                    </div>
                    <button class="positive ui primary button" type="submit" name="submit1">Assign Inspector</button>
                    <div class="ui error message"></div>
                  </form>
                </div>
              </div>
              <!-- OCULARS W/O SUPERVISOR END -->
              <!-- TERMITE WITHOUT TEAM START -->
              <div class="four wide column">
                <div class="ui center aligned segment">
                  <h5 class="ui centered header">Termite Treatment</h5>
                  <form id="termitenoteam" class="ui form" method="POST" action="operations-assign/assign-termite.php">
                    <div class="field">
                      <label>Termite Treatment Without Team</label>
                      <select class="ui search dropdown" name="termite">
                        <option value="">Select Termite Treatment Without Team</option>
                        <?php
                        $getQuery2 = "SELECT TTSPIDNO, DATE(ttsp.Date) as Date , Structure_Type, Name
                                        FROM termitetreatment_serviceperformance ttsp
                                        JOIN job_order jo
                                          ON ttsp.JobORderNo=jo.JONumber
                                        JOIN customer c
                                          ON jo.CustomerId=c.CustomerID
                                       WHERE ttsp.TeamID IS NULL";
                        $result2 = mysqli_query($dbc, $getQuery2);
                        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                          echo "<option value = \"{$row2['TTSPIDNO']}\">Date: {$row2['Date']} | Structure Type: {$row2['Structure_Type']} | Name: {$row2['Name']}</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <button class="positive ui primary button" type="submit" name="submit2">Assign Termite Team</button>
                    <div class="ui error message"></div>
                  </form>
                </div>
              </div>
              <!-- TERMITE WITHOUT TEAM END -->
              <!-- HOUSEHOLD WITHOUT TEAM START -->
              <div class="four wide column">
                <div class="ui center aligned segment">
                  <h5 class="ui centered header">Household Treatment</h5>
                  <form id="householdnoteam" class="ui form" method="POST" action="operations-assign/assign-household.php">
                    <div class="field">
                      <label>Household Treatment Without Team</label>
                      <select class="ui search dropdown" name="household">
                        <option value="">Select Household Treatment Without Team</option>
                        <?php
                        $getQuery3 = "SELECT JobOrder_JONumber, DATE(StartDate) AS StartDate, DATE(EndDate) AS EndDate, Structure_Type, Name
                                        FROM householdpesttreatment hpt
                                        JOIN job_order jo
                                          ON hpt.JobOrder_JONumber=jo.JONumber
                                        JOIN customer c
                                          ON jo.CustomerId=c.CustomerId
                                       WHERE hpt.teamID IS NULL
                                         AND jo.job_status != 'Accomplished'";
                        $result3 = mysqli_query($dbc, $getQuery3);
                        while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                         echo "<option value = \"{$row3['JobOrder_JONumber']}\">Date: {$row3['StartDate']} to {$row3['EndDate']} | Structure Type: {$row3['Structure_Type']} | Name: {$row3['Name']}</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <button class="positive ui primary button" type="submit" name="submit3">Assign Household Team</button>
                    <div class="ui error message"></div>                    
                  </form>
                </div>
              </div>
              <!-- HOUSEHOLD WITHOUT TEAM END -->
              <!-- GENERAL SERVICE WITHOUT TEAM START -->
              <div class="four wide column">
                <div class="ui center aligned segment">
                  <h5 class="ui centered header">General Services</h5>
                  <form id="gsnoteam" class="ui form" method="POST" action="operations-assign/assign-generalServices.php">
                    <div class="field">
                      <label>General Service Without Team</label>
                      <select class="ui search dropdown" name="generalservice">
                        <option value="">Select Service Request Type</option>
                        <?php
                        $getQuery4 = "SELECT JobOrder_JONumber, Area_type, Name, date
                                        FROM general_services gs
                                        JOIN job_order jo
                                          ON gs.JobOrder_JONumber=jo.JONumber
                                        JOIN pending_order po
                                          ON gs.pending_order=po.pending_order_Id
                                        JOIN customer c
                                          ON jo.CustomerId=c.CustomerId
                                       WHERE gs.TeamID IS NULL";
                        $result4 = mysqli_query($dbc, $getQuery4);
                        while ($row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
												  echo "<option value = \"{$row4['JobOrder_JONumber']}\">Date: {$row4['date']} | Area Type: {$row4['Area_type']} | Name: {$row4['Name']}</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <button class="positive ui primary button" type="submit" name="submit4">Assign General Team</button>
                    <div class="ui error message"></div>
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
  <script type="text/javascript">
    $('#oculars').chained('#servicetypes');
    

    $('#ocularnosupervisor')
      .form({
        inline: true,        
        fields: {
          servicetypes: {
            identifier: 'servicetypes',
            rules: [
              {
                type   : 'empty',
                prompt : 'You must choose the service type.'
              }
            ]
          },
          oculars: {
            identifier: 'oculars',
            rules: [
              {
                type   : 'empty',
                prompt : 'You must select an ocular request.'
              }
            ]
          }
        }
      })
    ;

    $('#termitenoteam')
      .form({
        inline: true,        
        fields: {
          termite: {
            identifier: 'termite',
            rules: [
              {
                type   : 'empty',
                prompt : 'You must select a Termite Treatment without a team.'
              }
            ]
          }
        }
      })
    ;

    $('#householdnoteam')
      .form({
        inline: true,        
        fields: {
          household: {
            identifier: 'household',
            rules: [
              {
                type   : 'empty',
                prompt : 'You must select a Household Treatment without a team.'
              }
            ]
          }
        }
      })
    ;

    $('#gsnoteam')
      .form({
        inline: true,
        fields: {
          generalservice: {
            identifier: 'generalservice',
            rules: [
              {
                type   : 'empty',
                prompt : 'You must select a General Service without a team.'
              }
            ]
          }
        }
      })
    ;

  </script>

</body>
</html>
