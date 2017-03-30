<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>AF-Xtrim Services - View Clients</title>
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
            <img src="../assets/logo.png">
          </a>
          <a href="#">
            <b>AF-Xtrim Services</b>
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
          <div class="ui sticky top menu">
            <div class="ui item launch button">
                <i class="icon list layout"></i>
            </div>
            <div class="item">
              Sales and Marketing Department
            </div>
            <div class="right menu ">
              <a class="ui labeled item notifications">
                Notifications
                <div class="ui basic red circular label">10</div>
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
                <h3 class="ui centered header">Employee Performance Review</h3>
                <div class="ui divider"></div>
				<br>
                <div class="ui form">
				  <div class="field">
					<label>Employee</label>
					<select class="ui search dropdown" name = "old">
						<?php
						require_once('../mysql_connect.php');
						$employee = "SELECT firstname from employee";
						$getname = mysqli_query($dbc, $employee);
						while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
						  echo '<option value="'.$row['employeeno'].'">'.$row['firstname'].'</option>';
						}
						$selectOption = $_POST['firstname'];
						?>
					  </select>
				  </div>
				</div>
				<br>
				<label>Characteristics</label>
				<table class="ui fixed table">
				  <thead align="center">
					<tr><th width="23%">Quality</th>
					<th width="22%">Unsatisfactory</th>
					<th width="20%">Satisfactory</th>
					<th width="15%">Good</th>
					<th width="20%">Excellent</th>
				  </tr></thead>
				  <tbody>
					<tr>
					  <td>Work to Full Potential</td>
					  <td><div align="center"><input type="radio" name="r1" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r1" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r1" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r1" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Quality of Work</td>
					  <td><div align="center"><input type="radio" name="r2" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r2" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r2" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r2" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Work Consistency</td>
					  <td><div align="center"><input type="radio" name="r3" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r3" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r3" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r3" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Communication</td>
					  <td><div align="center"><input type="radio" name="r4" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r4" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r4" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r4" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Independent Work</td>
					  <td><div align="center"><input type="radio" name="r5" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r5" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r5" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r5" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Takes Initiative</td>
					  <td><div align="center"><input type="radio" name="r6" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r6" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r6" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r6" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Group Work</td>
					  <td><div align="center"><input type="radio" name="r7" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r7" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r7" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r7" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Productivity</td>
					  <td><div align="center"><input type="radio" name="r8" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r8" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r8" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r8" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Creativity</td>
					  <td><div align="center"><input type="radio" name="r9" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r9" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r9" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r9" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Honesty</td>
					  <td><div align="center"><input type="radio" name="r10" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r10" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r10" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r10" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Integrity</td>
					  <td><div align="center"><input type="radio" name="r11" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r11" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r11" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r11" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Coworker Relations</td>
					  <td><div align="center"><input type="radio" name="r12" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r12" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r12" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r12" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Clien Relations</td>
					  <td><div align="center"><input type="radio" name="r13" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r13" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r13" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r13" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Technical Skills</td>
					  <td><div align="center"><input type="radio" name="r14" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r14" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r14" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r14" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Dependability</td>
					  <td><div align="center"><input type="radio" name="r15" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r15" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r15" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r15" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Punctuality</td>
					  <td><div align="center"><input type="radio" name="r16" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r16" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r16" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r16" id="radio1" /></div></td>
					</tr>
					<tr>
					  <td>Attendance</td>
					  <td><div align="center"><input type="radio" name="r17" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r17" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r17" id="radio1" /></div></td>
					  <td><div align="center"><input type="radio" name="r17" id="radio1" /></div></td>
					</tr>
				  </tbody>
				</table>
				<div  align="right"><button class="ui button primary" type="submit" name="submit1">Submit</button></div>
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
