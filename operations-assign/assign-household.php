<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hive Resource Management System - View Clients</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.js"></script>
    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.js"></script>

  </head>
  <body>
    <!-- SIDEBAR START -->
      <div class="ui inverted left vertical sidebar menu">
        <div class="item">
          <a href="#">
            <b>Hive Resource Management System</b>
          </a>
        </div>
        <div class="item">
          <div class="header">
            Assign
          </div>
          <div class="menu">
            <a class="item" href="assign-generalServices.php">
              Assign General Services
            </a>
            <a class="item" href="assign-household.php">
              Assign Household
            </a>
            <a class="item" href="assign-occular.php">
              Assign Ocular
            </a>
            <a class="item" href="assign-termite.php">
              Assign Termite
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
                          //$CallTermite = $_SESSION['Job_Order'];
                          $JobOrder = 35;
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
                          //UPDATE occular_visits=mysqli_query($dbc,$minusInventory); SET SupervisedBy='{$EmployeeID}' WHERE Occular_ID= '{$CallTermite}'"
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
                <h3 class="ui centered header">List of Employees That Can be Assigned For Household Services</h3>
                <div class="ui divider">
                </div>
                <div class="ui form">
      <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="field">
                    <label>Supervisor </label>
          <select name="client1" id="client1" class="ui search dropdown">
            <?php
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = 35;
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
            <?php
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = 35;
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular);
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "select *    from employee e where e.employeeNo not In
                                    ( select t.employeeno from team_members t where t.teamIdNo in
                                    (select ti.teamIdno from team ti where ti.jobOrder_No in
                                    (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and  e.employeeposition = 'Worker'";
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
            <?php
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = 35;
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular);
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "select *    from employee e where e.employeeNo not In
                                    ( select t.employeeno from team_members t where t.teamIdNo in
                                    (select ti.teamIdno from team ti where ti.jobOrder_No in
                                    (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and  e.employeeposition = 'Worker'";
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
            <?php
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = 35;
                        require_once('../mysql_connect.php');
                        $getoccular= "Select * from  Job_Order where JONumber = '{ $JobOrder}'";
                        $runquery= mysqli_query($dbc,$getoccular);
                        $gettingData=mysqli_fetch_array($runquery,MYSQLI_ASSOC);
                        $custname = "select *    from employee e where e.employeeNo not In
                                    ( select t.employeeno from team_members t where t.teamIdNo in
                                    (select ti.teamIdno from team ti where ti.jobOrder_No in
                                    (select jo.joNumber from job_order jo where jo.StartDate = '{$gettingData['Date']}'))) and  e.employeeposition = 'Worker'";
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
            <?php
                            // $toSchedule = $_SESSION['termiteocular'] ;
                              //('{$aetype}'
                          // $toSchedule = $_SESSION['termiteocular'] ;
                          // remove $toshed=4 once session from sales-index works :)
                       //echo "Peter is " . $age['Peter'] . " years old.";
                   // $termiteocular = $_SESSION['termiteocular'];
                   $JobOrder = 35;
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
                   $JobOrder = 35;
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
      <script>
      $('.existing-clients').css("display", "none");
      $('.new-clients').css("display", "none");


      $('#slide-existing').click(function() {
        $('.existing-clients').show();
        $('.new-clients').hide();
      });
      $('#slide-new').click(function() {
        $('.new-clients').show();
        $('.existing-clients').hide();
      });


      $('select.dropdown')
        .dropdown()
      ;


      $('.notifications')
        .popup({
          popup: $('.special.popup'),
          on: 'click',
          position: 'bottom right'
        })
      ;

      $('#mycalendar').calendar({
        type: 'date'
      })
      ;

      $(".ui.sidebar").sidebar()
                      .sidebar('attach events','.ui.launch.button');
      </script>

  </body>
</html>
