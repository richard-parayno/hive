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
        <a class="item" href="clients-list.php">
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
            <div class="right menu ">
              <a class="ui labeled item notifications">
                Notifications
                 
              </a>
            </div>
          </div>
        </div>
        <!-- TOP BAR END -->
		
				<br>
				<div align="right" class="months">
					<select class="ui search dropdown">
					  <option value="">Month</option>
					  <option value="jan">January</option>
					  <option value="feb">February</option>
					  <option value="mar">March</option>
					  <option value="apr">April</option>
					  <option value="may">May</option>
					  <option value="jun">June</option>
					  <option value="jul">July</option>
					  <option value="aug">August</option>
					  <option value="sep">September</option>
					  <option value="oct">October</option>
					  <option value="nov">November</option>
					  <option value="dec">December</option>
					</select>
				</div>	
				
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
                <h3 class="ui centered header">Delinquency Report</h3>
                <div class="ui divider"></div>
				<div align="right"><?php echo "Date: " .date("m/d/y");?></div>
				<br>
                <div class="ui form">
				<form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


                  <div class="field">
                    <table class="ui celled table">
                      <thead>
                        <tr>
						  <th>Status</th>
                          <th>ID Number</th>
                          <th>Customer Name</th>
						  <th>Date and Time</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php
						require_once('../mysql_connect.php');
						$sql = "SELECT ov.occular_id, ov.date, c.name FROM occular_visits  ov JOIN customer c on c.customerid = ov.customerid";
						$qry = mysqli_query($dbc,$sql);

						while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
							$try = $row['occular_id'];

							echo "<tr>
							<td width=\"5%\"><div align=\"center\">FINISHED
							</div></a></td>
							<td width=\"5%\"><div align=\"center\">{$row['occular_id']}
							</div></a></td>
							<td width=\"10%\"><div align=\"center\">{$row['name']}</a>
							</div></a></td>
							<td width=\"10%\"><div align=\"center\">{$row['date']}</a>
							</div></td
							</tr>";
						}

						?>
						
						<?php
						require_once('../mysql_connect.php');
						$sql = "SELECT ov.occular_id, ov.date, c.name FROM occular_visits  ov JOIN customer c on c.customerid = ov.customerid";
						$qry = mysqli_query($dbc,$sql);

						while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
							$try = $row['occular_id'];

							echo "<tr>
							<td width=\"5%\"><div align=\"center\">LEFT UNDONE
							</div></a></td>
							<td width=\"5%\"><div align=\"center\">{$row['occular_id']}
							</div></a></td>
							<td width=\"10%\"><div align=\"center\">{$row['name']}</a>
							</div></a></td>
							<td width=\"10%\"><div align=\"center\">{$row['date']}</a>
							</div></td
							</tr>";
						}
						
						?>


                      </tbody>
                    </table>
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
