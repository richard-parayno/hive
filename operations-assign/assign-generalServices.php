<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System</title>
  <link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" type="text/css"/>
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

  if (!isset($_SESSION['currentUser'])) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../login.php");
  }
  if ($_SESSION['currentType'] != 2) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../login.php");
  }
  //if (!isset($_POST['submit4']))
    //header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../operations-index.php");
        
  if (isset($_POST['generalservice'])) {
    $JobOrder = $_POST['generalservice'];
    $_SESSION['generalservice'] = $JobOrder;
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
              Create Ocular Report
            </a>
      </div>
    </div>
    <a class="item" href="../login.php">
          Log Out
        </a>
  </div>
  <!-- SIDEBAR END -->
  <!-- Accept Start -->
  <?php
    require_once('../mysql_connect.php');
    if (isset($_POST['accept'])) {
          
      $JobOrder = $_SESSION['generalservice'];
      $Supervisor = $_POST['client1'];
      $Employee1=$_POST['client2'];
      $Employee2=$_POST['client3'];
      $Employee3=$_POST['client4'];  
      $AccountExecutive=$_POST['client5'];

      $AssignSupervisor = "UPDATE Job_Order SET Supervisor ='{$Supervisor}', AEinCharge = '{$AccountExecutive}' WHERE JONumber= '{$JobOrder}'";
      $runquery= mysqli_query($dbc,$AssignSupervisor); 
      $CreateTeam = "Insert into team (JobOrder_NO) value ('{$JobOrder}')";
      $run2=mysqli_query($dbc,$CreateTeam); 
      $getNewTeam = "Select TeamIdNo from Team order by teamIdNo DESC LIMIT 1";
      $run7=mysqli_query($dbc,$getNewTeam);
      $data= mysqli_fetch_array($run7,MYSQLI_ASSOC);
      $Teamid = $data['TeamIdNo'];
      
      $addmem1=" Insert into team_members (EmployeeNo, TeamIdNo) values ('{$Employee1}', '{$Teamid}')";
      $addmem2=" Insert into team_members (EmployeeNo, TeamIdNo) values ('{$Employee2}', '{$Teamid}')";
      $addmem3=" Insert into team_members (EmployeeNo, TeamIdNo) values ('{$Employee3}', '{$Teamid}')";
      $updateTeam= "UPDATE general_services set TeamID = '{$Teamid}'";
      $run9=mysqli_query($dbc,$updateTeam);
      $run3=mysqli_query($dbc,$addmem1);
      $run4=mysqli_query($dbc,$addmem2);
      $run5=mysqli_query($dbc,$addmem3);

      header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../operations-index.php");


      
  } 
  ?>
    <!-- Accept End-->

    <!-- MAIN CONTENT START -->
    <div class="pusher">
      <!-- TOP BAR START-->
      <div class="sixteen wide column">
        <div class="ui sticky top menu">
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
              <a class="section" href="../operations-index.php">General Services</a>
              <i class="right angle icon divider"></i>
              <div class="active section">Assign Team to General Services</div>
            </div>
          </div>
          <div class="right menu ">
            
          </div>
        </div>
      </div>
      <!-- TOP BAR END -->
      <div class="ui basic padded segment">
        <div class="ui relaxed grid">

          <div class="eight wide centered column">
            <div class="ui padded segment">
              <h3 class="ui centered header">Assign Team to General Services</h3>
              <div class="ui divider">
              </div>
              <div class="ui form">
                <form id="assignemployee" class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="field">
                    <label>Supervisor </label>
                    <select name="client1" id="client1" class="ui search dropdown">
                      <option value="">Select Supervisor</option>                      
                      <?php 
                        $JobOrder = $_SESSION['generalservice'];
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular); 
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "select *    from employee e where e.employeeNo not In 
                                    ( select t.employeeno from team_members t where t.teamIdNo in 
                                    (select ti.teamIdno from team ti where ti.jobOrder_No in 
                                    (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and  e.employeeposition = 'Supervisor'";
                        $getname = mysqli_query($dbc, $custname);
                        while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                          echo '<option value="'.$row['EmployeeNo'].'">'.$row['Name'].'</option>';
                        }
                        $selectOption1 = $_POST['client1']; 
                      ?>        
                    </select>
                  </div>
                  <div class="field">
                    <label>Employee </label>
                    <select name="client2" id="client2" class="ui search dropdown">
                      <option value="">Select Employee</option>                      
                      <?php           
                        $JobOrder = $_SESSION['generalservice'];
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular); 
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "SELECT * 
                                         FROM employee e 
                                        WHERE e.employeeNo NOT IN (SELECT t.employeeno 
                                                                     FROM team_members t 
                                                                    WHERE t.teamIdNo IN (SELECT ti.teamIdno 
                                                                                           FROM team ti 
                                                                                          WHERE ti.jobOrder_No IN (SELECT jo.joNumber 
                                                                                                                     FROM job_order jo 
                                                                                                                    WHERE jo.StartDate = '{$gettingData['Date']}'))) 
                                          AND e.employeeposition = 'Worker'
                                          AND e.employeeNo NOT IN (SELECT tt.EmployeeNo 
                                                                     FROM termiteteammembers tt 
                                                                    WHERE tt.TermiteTeamID IN (SELECT tti.TeamID 
                                                                                                 FROM termite_team tti 
                                                                                                WHERE tti.TTMSPIDno IN (SELECT ttmsp.TTSPIDNO 
                                                                                                                          FROM termitetreatment_serviceperformance ttmsp 
                                                                                                                         WHERE ttmsp.date = '{$gettingData['Date']}'))) 
                                          AND e.employeeNo NOT IN (SELECT ov.SupervisedBy 
                                                                     FROM Occular_visits ov 
                                                                    WHERE ov.Date = '{$gettingData['Date']}' and ov.Status = 'Active' and ov.SupervisedBy IS NOT NULL)";
                        $getname = mysqli_query($dbc, $custname);
                        while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                                echo '<option value="'.$row['EmployeeNo'].'">'.$row['Name'].'</option>';
                              }
                        $selectOption1 = $_POST['client1']; 
                      ?>        
                    </select>
                  </div>
                  <div class="field">
                    <label>Employee </label>
                    <select name="client3" id="client3" class="ui search dropdown">
                      <option value="">Select Employee</option>                      
                      <?php 
                        $JobOrder = $_SESSION['generalservice'];
                        require_once('../mysql_connect.php');
                        $getoccular= "SELECT * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular); 
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "SELECT * 
                                          FROM employee e 
                                          WHERE e.employeeNo NOT IN (SELECT t.employeeno 
                                                                      FROM team_members t 
                                                                      WHERE t.teamIdNo IN (SELECT ti.teamIdno 
                                                                                            FROM team ti 
                                                                                            WHERE ti.jobOrder_No IN (SELECT jo.joNumber 
                                                                                                                      FROM job_order jo 
                                                                                                                      WHERE jo.StartDate = '{$gettingData['Date']}'))) 
                                            AND e.employeeposition = 'Worker'
                                            AND e.employeeNo NOT IN (SELECT tt.EmployeeNo 
                                                                      FROM termiteteammembers tt 
                                                                      WHERE tt.TermiteTeamID IN (SELECT tti.TeamID 
                                                                                                  FROM termite_team tti 
                                                                                                  WHERE tti.TTMSPIDno IN (SELECT ttmsp.TTSPIDNO 
                                                                                                                            FROM termitetreatment_serviceperformance ttmsp 
                                                                                                                          WHERE ttmsp.date = '{$gettingData['Date']}'))) 
                                            AND e.employeeNo NOT IN (SELECT ov.SupervisedBy 
                                                                      FROM Occular_visits ov 
                                                                      WHERE ov.Date = '{$gettingData['Date']}');";
                        $getname = mysqli_query($dbc, $custname);
                        while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                          echo '<option value="'.$row['EmployeeNo'].'">'.$row['Name'].'</option>';
                        }
                        $selectOption1 = $_POST['client1']; 
                      ?>        
                    </select>
                  </div>
                  <div class="field">
                    <label>Employee </label>
                    <select name="client4" id="client4" class="ui search dropdown">
                      <option value="">Select Employee</option>
                      <?php 
                        $JobOrder = $_SESSION['generalservice'];
                        require_once('../mysql_connect.php');
                        $getoccular= "SELECT * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular); 
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "SELECT * 
                                          FROM employee e 
                                          WHERE e.employeeNo NOT IN (SELECT t.employeeno 
                                                                      FROM team_members t 
                                                                      WHERE t.teamIdNo IN (SELECT ti.teamIdno 
                                                                                            FROM team ti 
                                                                                            WHERE ti.jobOrder_No IN (SELECT jo.joNumber 
                                                                                                                      FROM job_order jo 
                                                                                                                      WHERE jo.StartDate = '{$gettingData['Date']}'))) 
                                            AND e.employeeposition = 'Worker'
                                            AND e.employeeNo NOT IN (SELECT tt.EmployeeNo 
                                                                      FROM termiteteammembers tt 
                                                                      WHERE tt.TermiteTeamID IN (SELECT tti.TeamID 
                                                                                                  FROM termite_team tti 
                                                                                                  WHERE tti.TTMSPIDno IN (SELECT ttmsp.TTSPIDNO 
                                                                                                                            FROM termitetreatment_serviceperformance ttmsp 
                                                                                                                          WHERE ttmsp.date = '{$gettingData['Date']}'))) 
                                            AND e.employeeNo NOT IN (SELECT ov.SupervisedBy 
                                                                      FROM Occular_visits ov 
                                                                      WHERE ov.Date = '{$gettingData['Date']}');";
                        $getname = mysqli_query($dbc, $custname);
                        while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                          echo '<option value="'.$row['EmployeeNo'].'">'.$row['Name'].'</option>';
                        }
                        $selectOption1 = $_POST['client1']; 
                      ?>        
                    </select>

                  </div>
                  <div class="field">
                    <label>Accountant </label>
                    <select name="client5" id="client5" class="ui search dropdown">
                      <option value="">Select Accountant</option>                        
                      <?php 
                        $JobOrder = $_SESSION['generalservice'];
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular); 
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "SELECT *    from employee e where e.employeeNo not In 
                                    ( select t.employeeno from team_members t where t.teamIdNo in 
                                    (select ti.teamIdno from team ti where ti.jobOrder_No in 
                                    (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and  e.employeeposition = 'Accountant'";
                        $getname = mysqli_query($dbc, $custname);
                        while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                          echo '<option value="'.$row['EmployeeNo'].'">'.$row['Name'].'</option>';
                        }
                        $selectOption1 = $_POST['client1']; 
                      ?>        
                    </select>
                  </div>
                  <div class="ui buttons">
                    <button class="ui positive button" type="submit" name="accept">Accept <i class="checkmark icon"></i> </button>
                  </div>
                  <div class="ui error message"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- MAIN CONTENT END -->

      <!-- scripts -->
      <script src="../dashboard.js"></script>
      <script type="text/javascript">
        $('#assignemployee')
          .form({
            inline: true,
            fields: {
              client1: {
                identifier: 'client1',
                rules: [
                  {
                    type   : 'empty',
                    prompt : 'You must select the Supervisor.'
                  }
                ]
              },
              client2: {
                identifier: 'client2',
                rules: [
                  {
                    type   : 'empty',
                    prompt : 'You must select an Employee.'
                  },
                  {
                    type   : 'different[client3]',
                    prompt : 'You can\'t choose the same employees!'
                  },
                  {
                    type   : 'different[client4]',
                    prompt : 'You can\'t choose the same employees!'
                  }
                ]
              },
              client3: {
                identifier: 'client3',
                rules: [
                  {
                    type   : 'empty',
                    prompt : 'You must select an Employee.'
                  },
                  {
                    type   : 'different[client2]',
                    prompt : 'You can\'t choose the same employees!'
                  },
                  {
                    type   : 'different[client4]',
                    prompt : 'You can\'t choose the same employees!'
                  }
                ]
              },
              client4: {
                identifier: 'client4',
                rules: [
                  {
                    type   : 'empty',
                    prompt : 'You must select an Employee.'
                  },
                  {
                    type   : 'different[client2]',
                    prompt : 'You can\'t choose the same employees!'
                  },
                  {
                    type   : 'different[client3]',
                    prompt : 'You can\'t choose the same employees!'
                  }
                ]
              },
              client5: {
                identifier: 'client5',
                rules: [
                  {
                    type   : 'empty',
                    prompt : 'You must select an Accountant.'
                  }
                ]
              }
            }
          })
        ;
      </script>

</body>

</html>