<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>AF-Xtrim Services - View Clients</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.css"
    rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.js"></script>
  <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.js"></script>

</head>

<body>
  <!-- SIDEBAR START -->
  <div class="ui inverted left vertical sidebar menu">
    <div class="item">
      <a class="ui logo icon image" href="#">
        <img src="../assets/logo.png">
      </a>
      <a href="#">
        <b>AF-Xtrim Services</b>
      </a>
    </div>
    <a class="item" href="../sales-index.php">
      <i class="home icon"></i> Sales Dashboard
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
        <div class="ui header item launch button">
          <i class="icon list layout"></i>
        </div>
        <div class="item">
          Operations Department
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
        <!-- Accept Start -->
        <?php
                       require_once('../mysql_connect.php');
                        $flag=0;
                       if (isset($_POST['accept'])){

                          //$CallTermite = $_SESSION['termiteocular'];
                          $CallTermite = 7;
                          $EmployeeID = $_POST['client'];
                          echo $EmployeeID;
                          $sql = "UPDATE occular_visits SET SupervisedBy='{$EmployeeID}' WHERE Occular_ID= '{$CallTermite}'";
                          $runquery= mysqli_query($dbc,$sql); 

                  } ?>
          <!-- Accept End-->


          <div class="eight wide centered column">
            <div class="ui basic padded segment">
              <h3 class="ui centered header">List of Employees That Can be Assigned For Occular</h3>
              <div class="ui divider">
              </div>
              <div class="ui form">
                <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                  <div class="field">
                    <label>Employees </label>
                    <select name="client" id="client" class="ui search dropdown">
            <?php 
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :) 
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                      $termiteocular = 7;
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  occular_visits where Occular_ID = '{$termiteocular}'";
                        $runquery= mysqli_query($dbc,$getoccular); 
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "select * from employee e where e.employeeNo not In ( select t.employeeno from team_members t where t.teamIdNo in (select ti.teamIdno from team ti where ti.jobOrder_No in (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and e.employeeposition = 'Worker' and e.employeeNo not In ( Select tt.EmployeeNo from termiteteammembers tt where tt.TermiteTeamID in (Select tti.TeamID from termite_team tti where tti.TTMSPIDno in(Select ttmsp.TTSPIDNO from termitetreatment_serviceperformance ttmsp WHERE ttmsp.date ='{$gettingData['Date']}')))";

                        /*"select *    from employee e where e.employeeNo not In 
                                    ( select t.employeeno from team_members t where t.teamIdNo in 
                                    (select ti.teamIdno from team ti where ti.jobOrder_No in 
                                    (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and  e.employeeposition = 'Worker'";*/

                                    //select * from employee e where e.employeeNo not In ( select t.employeeno from team_members t where t.teamIdNo in (select ti.teamIdno from team ti where ti.jobOrder_No in (select jo.joNumber from job_order jo where jo.StartDate = '2017-03-31'))) and e.employeeposition = 'Worker' and e.employeeNo not In ( Select tt.EmployeeNo from termiteteammembers tt where tt.TermiteTeamID in (Select tti.TeamID from termite_team tti where tti.TTMSPIDno in(Select ttmsp.TTSPIDNO from termitetreatment_serviceperformance ttmsp WHERE ttmsp.date ='2017-03-31')))
                        $getname = mysqli_query($dbc, $custname);
                        while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                                echo '<option value="'.$row['EmployeeNo'].'">'.$row['Name'].'</option>';
                              }
                            $selectOption = $_POST['Client']; 
            ?>        
                  </select>

                  </div>
                  <div class="ui buttons">

                    <button class="ui positive button" type="submit" name="accept">Accept <i class="checkmark icon"></i> </button>
                  </div>
                </form>
                <!--code for QUERIES 
           require_once('../mysql_connect.php');
               $query="select EmployeeNo, name from employee";
              $result=mysqli_query($dbc,$query);
              while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
              {
                echo '<option value="'.$row['].'">'.$row['name'].'</option>';
              }
           "select *    from employee e where e.employeeNo not In 
                      ( select t.employeeno from team_members t where t.teamIdNo in 
                      (select ti.teamIdno from team ti where ti.jobOrder_No in 
                      (select jo.joNumber from job_order jo where jo.StartDate = '{$ro['Date']}'))) and  e.employeeposition = 'Worker'"  -->


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