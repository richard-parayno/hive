<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System</title>
  <link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" type="text/css"
  />
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
  if (!isset($_POST['submit3']))
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../operations-index.php");

  if (isset($_POST['household'])) {
    $household = $_POST['household'];
    $_SESSION['household'] = $household;
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
          <a class="item" href="/../operations-createReport/">
              Create General Services Report
            </a>
          <a class="item" href="/../operations-createReport/">
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
        if (isset($_POST['accept'])){
           $message = NULL;
           $JobOrder = $_SESSION['household'];
           $Supervisor = $_POST['client1'];
           $Employee1=$_POST['client2'];
           $Employee2=$_POST['client3'];
           $Employee3=$_POST['client4'];
           $AccountExecutive=$_POST['client5'];
           $item = $_POST['item'];

           $getdata= "Select quantity from inventory where ProductID = '{$item}'";
           $run5=mysqli_query($dbc,$getdata);
           $thedata= mysqli_fetch_array($run5,MYSQLI_ASSOC);

           if ($_POST['amount']>$thedata['quantity']) {
             $message.="<p> The amount cannot be greater than the quantity in the inventory";
             $quantity = NULL;
           }
           else {
             $quantity=$_POST['amount'];
           }


            $AssignSupervisor = "UPDATE Job_Order SET Supervisor ='{$Supervisor}', AEinCharge = '{$AccountExecutive}' WHERE JONumber= '{$JobOrder}'";
            $runquery= mysqli_query($dbc,$AssignSupervisor);
            $CreateTeam = "Insert into team (JobOrder_NO) value ('{$JobOrder}')";
            $run2=mysqli_query($dbc,$CreateTeam);
            $getNewTeam = "Select TeamIdNo from Team order by teamIdNo DESC LIMIT 1";
            $run7=mysqli_query($dbc,$getNewTeam);
            $data= mysqli_fetch_array($run3,MYSQLI_ASSOC);
            $Teamid = $data['TeamIdNo'];

            $addmem1=" Insert into team_members (EmployeeNo, TeamIdNo) values ('{$Employee1}', '{$Teamid}')";
            $addmem2=" Insert into team_members (EmployeeNo, TeamIdNo) values ('{$Employee2}', '{$Teamid}')";
            $addmem3=" Insert into team_members (EmployeeNo, TeamIdNo) values ('{$Employee3}', '{$Teamid}')";

            $run3=mysqli_query($dbc,$addmem1);
            $run4=mysqli_query($dbc,$addmem2);
            $run5=mysqli_query($dbc,$addmem3);
            $UpdateHousehold = "UPDATE householdpesttreatment SET Inventory_ProductID='{$item}',SET qtytobeused ='{$quantity}' WHERE JobOrder_JONumber= '{$JobOrder}'" ;
            $minusInventory= "UPDATE inventory set quantity= quantity-'{$quantity}' where ProductID = '{$item}'";
            $run6=mysqli_query($dbc,$minusInventory);
            $run8 =mysqli_query($dbc,$UpdateHousehold);
            
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
                <a class="section" href="../operations-index.php">Household Service</a>
                <i class="right angle icon divider"></i>
                <div class="active section">Assign Team to Household Service</div>
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
                <h3 class="ui centered header">Assign Team to Household Service</h3>
                <div class="ui divider">
                </div>
                <div class="ui form">
                  <form id="assignemployee" class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="field">
                      <label>Supervisor</label>
                      <select name="client1" id="client1" class="ui search dropdown">
                        <option value="">Select Supervisor</option>
                        <?php
                          $JobOrder = $_SESSION['household'];                        
                          require_once('../mysql_connect.php');
                          $getoccular= "Select * from  Job_Order where JONumber = '{$JobOrder}'";
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
                      <label>Employee</label>
                      <select name="client2" id="client2" class="ui search dropdown">
                        <option value="">Select Employee</option>                        
                        <?php
                          $JobOrder = $_SESSION['household'];
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
                                                                    WHERE ov.Date = '{$gettingData['Date']}' and ov.SupervisedBy is not NULL)";
                          $getname = mysqli_query($dbc, $custname);
                          while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                            echo '<option value="'.$row['EmployeeNo'].'">'.$row['Name'].'</option>';
                          }
                          $selectOption1 = $_POST['client1'];
                        ?>
                      </select>

                    </div>
                    <div class="field">
                      <label>Employee</label>
                      <select name="client3" id="client3" class="ui search dropdown">
                        <option value="">Select Employee</option>                                                
                        <?php
                          $JobOrder = $_SESSION['household'];                        
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
                      <label>Employee</label>
                      <select name="client4" id="client4" class="ui search dropdown">
                        <option value="">Select Employee</option>                        
                        <?php
                          $JobOrder = $_SESSION['household'];
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
                      <label>Accountant</label>
                      <select name="client5" id="client5" class="ui search dropdown">
                        <option value="">Select Accountant</option>                        
                        <?php
                          $JobOrder = $_SESSION['household'];
                          require_once('../mysql_connect.php');
                          $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                          $runquery= mysqli_query($dbc,$getoccular);
                          $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                          $custname = "select *    from employee e where e.employeeNo not In
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
                    <div class="thirteen wide field">
                      <label>Item to be Used</label>
                      <select name="item" id="item" class="ui search dropdown">
                        <option value="">Select Item to be Used</option>                        
                        <?php
                          $JobOrder = $_SESSION['household'];
                          require_once('../mysql_connect.php');
                          $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                          $runquery= mysqli_query($dbc,$getoccular);
                          $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                          $cust = "select *    from inventory";
                          $getname = mysqli_query($dbc, $cust);
                          while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                            echo '<option value="'.$row['ProductID'].'">'.$row['ProductName']. " - ".$row['Quantity']." pieces".'</option>';
                          }
                        ?>
                      </select>
                    </div>
                    <div class="field">
                      <label>Amount to be Used</label>
                      <input type="number" name="amount" placeholder="Amount to be Used" />
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
                },
                item: {
                  identifier: 'item',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'You must select atleast one item to use.'
                    }
                  ]
                },
                number: {
                  identifier: 'number',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'You must enter the amount to be used.'
                    }
                  ]
                }
              }
            })
          ;
        </script>


</body>

</html>