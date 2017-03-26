<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hive Resource Management System - View Clients</title>
    <link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" type="text/css" />
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/semantic/dist/semantic.min.js"></script>
    <script src="../bower_components/moment/moment.js"></script>
    <script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../bower_components/fullcalendar/dist/locale-all.js"></script>
    <link href="../bower_components/semantic-ui-calendar/dist/calendar.min.css" rel="stylesheet" type="text/css" />
    <script src="../bower_components/semantic-ui-calendar/dist/calendar.min.js"></script>
    <link href="../style.css" rel="stylesheet" type="text/css"/>

  </head>
  <body>
    <?php
    ob_start();
    session_start();
    if (!isset($_SESSION['currentUser'])) {
      header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."../login.php");
    }
    if ($_SESSION['currentType'] != 1) {
      header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."../login.php");
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
            <a class="item" href="termite-treatment-report.php">
              Termite Treatment Report
            </a>
            <a class="item" href="household-treatment-report.php">
              Household Treatment Report
            </a>
            <a class="item" href="general-services-report.php">
              General Services Report
            </a>
            <a class="item" href="list-of-oculars-report.php">
              List of Oculars Report
            </a>
            <a class="item" href="job-orders-report.php">
              Job Orders Report
            </a>
            <a class="item" href="accomplished-oculars-report.php">
              Accomplished Oculars Report
            </a>
            <a class="item" href="unaccomplished-oculars-report.php">
              Unaccomplished Oculars Report
            </a>
            <a class="item" href="delinquency-report.php">
              Delinquency Report
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
                <div class="active section">Accomplished Oculars Report</div>
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

            <div class="eight wide centered column">
              <div class="ui basic padded segment">
                <h3 class="ui centered header">Job Orders and Sales Report</h3>
                <div class="ui divider"></div>
				<div align="right"><?php echo "Date: " .date("m/d/y");?></div>
				<br>
                <div class="ui form">
				<form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


                  <div align="center" class="field">
					<?php
            //QUERIES
            require_once('../mysql_connect.php');
            //JOB ORDER COUNT
            $termiteQuery = "SELECT COUNT(*) AS count FROM job_order WHERE job_type='Termite Treatment'";
            $householdQuery = "SELECT COUNT(*) AS count FROM job_order WHERE job_type='General Services'";
            $generalQuery = "SELECT COUNT(*) AS count FROM job_order WHERE job_type='Household Services'";
            $resultTermite = mysqli_query($dbc, $termiteQuery);
            $resultHousehold = mysqli_query($dbc, $householdQuery);
            $resultGeneral = mysqli_query($dbc, $generalQuery);
            $termite = mysqli_fetch_array($resultTermite, MYSQLI_ASSOC);
            $household = mysqli_fetch_array($resultHousehold, MYSQLI_ASSOC);
            $general = mysqli_fetch_array($resultGeneral, MYSQLI_ASSOC);



						$KoolControlsFolder = "../KoolPHPSuite/KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder
						require $KoolControlsFolder."/KoolChart/koolchart.php";

						$chart_column_line = new KoolChart("chart_column_line");
						$chart_column_line->scriptFolder=$KoolControlsFolder."/KoolChart";
						$chart_column_line->Height = 550;
						$chart_column_line->Width = 600;
						$chart_column_line->Title->Text = "Job Orders and Sales Report";
						$chart_column_line->Legend->Appearance->Visible = false;
						$chart_column_line->PlotArea->XAxis->Title = "";
						$chart_column_line->PlotArea->XAxis->Color = "black";
						$chart_column_line->PlotArea->XAxis->MajorGridLines->Color = "#b4b4b4";
						$chart_column_line->PlotArea->XAxis->MinorGridLines->Color = "#d2d2d2";
						$chart_column_line->PlotArea->XAxis->Set(array("Termite Treatment","Household Treatment","General Services"));
						$chart_column_line->PlotArea->YAxis->Title = "";
						$chart_column_line->PlotArea->YAxis->MinorTickSize = 0;
						$chart_column_line->PlotArea->YAxis->MaxValue = 100;
						$chart_column_line->PlotArea->YAxis->MinValue = 0;
						$chart_column_line->PlotArea->YAxis->MajorStep = 10;
						$chart_column_line->PlotArea->YAxis->MinorStep = 2;
						$chart_column_line->PlotArea->YAxis->Color = "black";
						$chart_column_line->PlotArea->YAxis->MajorGridLines->Color = "#b4b4b4";
						$chart_column_line->PlotArea->YAxis->MinorGridLines->Color = "#d2d2d2";
						$series = new ColumnSeries();
						$series->Appearance->BackgroundColor = "#5CB8E3";

            //JOB ORDER
						$series->ArrayData(array($termite['count'],$household['count'],$general['count']));
						$chart_column_line->PlotArea->AddSeries($series);
						$series = new LineSeries();
						$series->Appearance->BackgroundColor = "green";
            //SALES
						$series->ArrayData(array(76,15,60));
						$chart_column_line->PlotArea->AddSeries($series);
					?>

					<form id="form1" method="post">
						<?php echo $chart_column_line->Render();?>
					</form>

					<center>-End Of Report-</center>
					<br>
					<div align="right">Prepared by: Sales Executive</div>
                  </div>
                </div>

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
