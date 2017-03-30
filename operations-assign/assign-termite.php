<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hive Resource Management System</title>
    <link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" type="text/css" />
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
    $termite = $_POST['termite'];
    $_SESSION['termite'] = $termite;
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
                        $flag=0;
                       if (isset($_POST['accept'])){
                          $message = NULL;
                          //$TermiteNum = $_SESSION['Termite_Treatment'];
                          $TermiteNum = $_SESSION['termite'];
                          $Supervisor = $_POST['client1'];
                          $Employee1=$_POST['client2'];
                          $Employee2=$_POST['client3'];
                          $Employee3=$_POST['client4'];
                            // ECHO "EMPLOYEE 3 " .$Employee3. "<br>"   ;
                          $AccountExecutive=$_POST['client5'];
                          $item = $_POST['item'];

                          if($Employee1== $_POST['client3'])
                          {
                             $message.='<p> Employee 1 and Employee 2 cannot be the SAME';
                             echo "TO CHECK WHAT HAPPENS ".$Employee1. "<br>";
                          }
                          else
                          {
                            $message=false;
                          }
                          if ($Employee1 ==$_POST['client4'])
                          {
                            $message.='<p> Employee 1 and Employee 3 cannot be the SAME';
                          }
                          else
                          {
                            $message=false;
                          }
                          if ($Employee2==$_POST['client4'])
                          {
                             $message.='<p> Employee 2 and Employee 3 cannot be the SAME';


                          }
                          else
                          {
                             $message=false;
                          }
                           if (empty ($_POST['amount']))
                              {
                                $message.= '<p> You forgot to input the amount';
                                $quantity=NULL;
                              }
                              else
                              {
                                $getdata= "Select quantity from inventory where ProductID = '{$item}'";
                                $run5=mysqli_query($dbc,$getdata);
                                $thedata= mysqli_fetch_array($run5,MYSQLI_ASSOC);

                                if ($_POST['amount']>$thedata['quantity'])
                                {
                                  $message.="<p> The amount cannot be greater than the quantity in the inventory";
                                  $quantity = NULL;
                                }
                                else
                                {
                                  $quantity=$_POST['amount'];
                                }
                              }


                           //      echo $message."<br>";
                        // echo $message. "EMPTY PALA BRODIE";

                         if(empty($message)){


                          $CreateTeam = "Insert into termite_team (TTMSPIDno) value ('{$TermiteNum}')";
                          $run2=mysqli_query($dbc,$CreateTeam);
                          $getNewTeam = "Select TeamId from termite_team order by teamId DESC LIMIT 1";
                          $run7=mysqli_query($dbc,$getNewTeam);
                          $data= mysqli_fetch_array($run3,MYSQLI_ASSOC);
                          $Teamid = $data['TeamIdNo'];
                          $addSup=" Insert into termiteteammembers (EmployeeNo, TermiteTeamId) values ('{$Supervisor}', '{$Teamid}')";
                          $addAcc=" Insert into termiteteammembers (EmployeeNo, TermiteTeamId) values ('{$AccountExecutive}', '{$Teamid}')";
                          $addmem1=" Insert into termiteteammembers (EmployeeNo, TermiteTeamId) values ('{$Employee1}', '{$Teamid}')";
                          $addmem2=" Insert into termiteteammembers (EmployeeNo, TermiteTeamId) values ('{$Employee2}', '{$Teamid}')";
                          $addmem3=" Insert into termiteteammembers (EmployeeNo, TermiteTeamId) values ('{$Employee3}', '{$Teamid}')";
                          $run8=mysqli_query($dbc,$addSup);
                          $run9=mysqli_query($dbc,$addAcc);
                          $run3=mysqli_query($dbc,$addmem1);
                          $run4=mysqli_query($dbc,$addmem2);
                          $run5=mysqli_query($dbc,$addmem3);
                          $addtoItemList="insert into item_list (Inventory_ProductID,TermiteIDno) values ('{$item}','{$TermiteNum}'";
                           $minusInventory= "UPDATE inventory set quantity= quantity-'{$quantity}' where ProductID = '{$item}'";
                            $r=mysqli_query($dbc,$minusInventory);
                             $a=mysqli_query($dbc,$addtoItemList);

                          //UPDATE occular_visits SET SupervisedBy='{$EmployeeID}' WHERE Occular_ID= '{$CallTermite}'"
                          //      $run = "Select * from pending_order ORDER BY pending_order_Id DESC LIMIT 1";
                          }
                          else
                          {
                            echo $message;
                          }

                  } ?>
              <!-- Accept End-->

      <!-- MAIN CONTENT START -->
      <div class="pusher">
        <!-- TOP BAR START-->
        <div class="sixteen wide column">
          <div class="ui sticky top menu">
            <div class="ui header item launch button">
                <i class="icon list layout"></i>
            </div>
            <div class="item">
             Operations Department
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
                <h3 class="ui centered header">List of Employees That Can be Assigned For Termite Treatment</h3>
                <div class="ui divider">
                </div>
                <div class="ui form">
      <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="field">
                    <label>Supervisor </label>
          <select name="client1" id="client1" class="ui search dropdown">
            <option value="">Select Supervisor</option>            
            <?php
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = $_SESSION['termite'];
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
                    <label>employee1 </label>
          <select name="client2" id="client2" class="ui search dropdown">
            <option value="">Select Employee</option>
            <?php
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = $_SESSION['termite'];
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular);
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "select * from employee e where e.employeeNo not In ( select t.employeeno from team_members t where t.teamIdNo in (select ti.teamIdno from team ti where ti.jobOrder_No in (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and e.employeeposition = 'Worker' and e.employeeNo not In ( Select tt.EmployeeNo from termiteteammembers tt where tt.TermiteTeamID in (Select tti.TeamID from termite_team tti where tti.TTMSPIDno in(Select ttmsp.TTSPIDNO from termitetreatment_serviceperformance ttmsp WHERE ttmsp.date ='{$gettingData['Date']}')))";
                        $getname = mysqli_query($dbc, $custname);
                        while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                                echo '<option value="'.$row['EmployeeNo'].'">'.$row['Name'].'</option>';
                              }
                            $selectOption1 = $_POST['client1'];
            ?>
          </select>

                  </div>
                   <div class="field">
                    <label>employee2 </label>
          <select name="client3" id="client3" class="ui search dropdown">
            <option value="">Select Employee</option>
            
            <?php
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = $_SESSION['termite'];
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular);
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "select * from employee e where e.employeeNo not In ( select t.employeeno from team_members t where t.teamIdNo in (select ti.teamIdno from team ti where ti.jobOrder_No in (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and e.employeeposition = 'Worker' and e.employeeNo not In ( Select tt.EmployeeNo from termiteteammembers tt where tt.TermiteTeamID in (Select tti.TeamID from termite_team tti where tti.TTMSPIDno in(Select ttmsp.TTSPIDNO from termitetreatment_serviceperformance ttmsp WHERE ttmsp.date ='{$gettingData['Date']}')))";
                        $getname = mysqli_query($dbc, $custname);
                        while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                                echo '<option value="'.$row['EmployeeNo'].'">'.$row['Name'].'</option>';
                              }
                            $selectOption1 = $_POST['client1'];
            ?>
          </select>

                  </div>
                    <div class="field">
                    <label>employee3 </label>
          <select name="client4" id="client4" class="ui search dropdown">
            <option value="">Select Employee</option>
            
            <?php
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = $_SESSION['termite'];
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular);
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "select * from employee e where e.employeeNo not In ( select t.employeeno from team_members t where t.teamIdNo in (select ti.teamIdno from team ti where ti.jobOrder_No in (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and e.employeeposition = 'Worker' and e.employeeNo not In ( Select tt.EmployeeNo from termiteteammembers tt where tt.TermiteTeamID in (Select tti.TeamID from termite_team tti where tti.TTMSPIDno in(Select ttmsp.TTSPIDNO from termitetreatment_serviceperformance ttmsp WHERE ttmsp.date ='{$gettingData['Date']}')))";
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
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = $_SESSION['termite'];
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
                  <div class="field">
                    <label>Item to be Used
                      <button class="ui icon button">
                   <i class="add icon"></i>
                   </button>
                     </label>


          <select name="item" id="item" class="ui search dropdown">
            <?php
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = $_SESSION['termite'];
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular);
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $cust = "select *    from inventory";
                        $getname = mysqli_query($dbc, $cust);
                        while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                                echo '<option value="'.$row['ProductID'].'">'.$row['ProductName']. " - ".$row['Quantity']." pieces".'</option>';
                              }
                           // $selectOption1 = $_POST['client1'];
            ?>
          </select>

                  </div>
                  <div class="four wide field">
                <label>Amount to be used</label>
                <input type="number" name="amount" placeholder="example: 123"value="<?php if (isset($_POST['amount']) && !$flag) echo $_POST['amount']; ?>"/>
              </div>









                     <div class="ui buttons">
                 <button class="ui positive button" type = "submit" name = "accept">Accept <i class="checkmark icon"></i> </button>
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
