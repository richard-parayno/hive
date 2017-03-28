<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Hive Resource Management System - Create Service Request</title>
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
  /*
  if (!isset($_SESSION['currentUser'])) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  if ($_SESSION['currentType'] != 1) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  */
  ?>
</head>

<body>
  <!-- SIDEBAR START -->
  <div class="ui inverted left vertical sidebar menu" id="sidebar">
    <div class="item">
      <a href="#">
        <b class="centered">Hive Resource Management System</b>
      </a>
    </div>
    <a class="item" href="operations-index.php">
      <i class="home icon"></i> Operations Dashboard
    </a>
    <div class="item">
      <div class="header">
        Create Reports
      </div>
      <div class="menu">
        <a class="item" href="household-page1.php">
              Create Household Report
            </a>
        <a class="item" href="termite-treatment-page1.php">
              Create Termite Report
            </a>
        <a class="item" href="assign-occular.php">
              Create General Services Report
            </a>
        <a class="item" href="occular-page1.php">
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
      <div class="ui top menu">
        <a class="ui item launch">
          <i class="sidebar icon"></i> Menu
        </a>
        <div class="item">
          Operations Department
        </div>
        <div class="item">
          <div class="ui breadcrumb">
            <a class="section" href="../operations-index.php">Operations Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Household Service Report</div>
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

        <!-- FORM SUBMITTION 1 START-->
        <?php

        if (isset($_POST['submit1'])){
     
          //areaType[] 
          //serviceRendered[]
          //findings[]
          //other
          //fother
          require_once('../mysql_connect.php');
          $timeStart= $_POST['timeStart'];
          $timeEnd=$_POST['timeEnd'];
         //$CallTermite = $_SESSION['Job_Order'];
          $remarks = $_POST['remarks'];
          $Cremarks= $_POST['Cremarks'];
          $ctr = count($_POST['areaType']);
          $areas_treated=$_POST['areaType'];
          $selected = $_GET['pk'];
         
          $sctr= count ($_POST['serviceRendered']);
          $serviceRendered= $_POST['serviceRendered'];
          $fctr= count ($_POST['findings']); 
          $findings= $_POST['findings'];

          //Select CustomerId from job_order where JOnumber in (Select JobOrder_JONumber from householdpesttreatment where ControlNumber= '1');
          $getCustomer= "Select CustomerId from job_order where JOnumber in (Select JobOrder_JONumber from householdpesttreatment where ControlNumber= '{$selected}')";
          $qw=mysqli_query($dbc,$getCustomer);
          $rows1= mysqli_fetch_array($qw,MYSQLI_ASSOC);
          $insertIntoHouseholdReport = "Insert into householdpms_report ( Timestarted,Timefinished,CustomerRepresentative,HouseholdCaseIDNO) values ('{$timeStart}','{$timeEnd}', '{$rows1['CustomerId']}', '{$selected}'";
          $run = mysqli_query($dbc,$insertIntoHouseholdReport);
          //$getId= "Select Address,customer, Area_type, pending_order_Id from pending_order ORDER BY pending_order_Id DESC LIMIT 1";
          $getLast=  "Select  HPMSRIDNo from householdpms_report order by   HPMSRIDNo DESC limit 1";
          $run1 = mysqli_query($dbc,$getLast);
          $row2= mysqli_fetch_array($run1,MYSQLI_ASSOC);
          $insertDetails = "Insert into household_details (hhpmr,remarks,clientremarks) values ('{$row2['HPMSRIDNo']}','{$remarks}','{$Cremarks}'')";
          $run2 = mysqli_query($dbc,$insertDetails);
      
          for($x=0; $x<$ctr;$x++)
          {
            if ($serviceRendered[$x]=='others')
            {
              $area = $_POST['other'];
              $runArea= "insert into Area_Infection (HHID,Area_Infection) values ('{$row2['HPMSRIDNo']}','{$area}')";
              $runQ= mysqli_query($dbc,$runArea);

            }
            $runArea1= "insert into Area_Infection (HHID,Area_Infection) values('{$row2['HPMSRIDNo']}', '{$areas_treated[$x]}') ";
            $runA=mysqli_query($dbc,$runArea1);

          }
         for($a=0; $a<$sctr;$a++)
          {
          $runArea12= "insert into services (HHID,Services) values('{$row2['HPMSRIDNo']}', '{$serviceRendered[$a]}') "; 
          $runB=mysqli_query($dbc,$runArea12);

          }
           for($b=0; $b<$fctr;$b++)
          {
            if ($findings[$b]=='others')
            {
              $area1 = $_POST['fother'];
              $runArea= "insert into findings (HHID,Finding) values ('{$row2['HPMSRIDNo']}','{$area1}')";
              $runQ= mysqli_query($dbc,$runArea);

            }
            
            $runArea12= "insert into findings (HHID,Finding) values('{$row2['HPMSRIDNo']}', '{$findings[$b]}') ";
            $runB=mysqli_query($dbc,$runArea12);

          }
    
          $updateJobOrder = "UPDATE JOB_ORDER SET TOTAL_PAYMENT= '{$ammount}', job_status = 'Accomplished'";
          $Done =mysqli_query($dbc,$updateJobOrder);
         // UPDATE occular_visits SET SupervisedBy='{$EmployeeID}' WHERE Occular_ID= '{$CallTermite}'
        /*  $insertCustomer= "insert into customer (Name, ContactNo, Address) values('{$Name}','{$number}', '{$Area}') ";
          $result = mysqli_query($dbc,$insertCustomer);
          $getId= "Select CustomerId from customer ORDER BY CustomerId DESC LIMIT 1";
          $ew= mysqli_query($dbc, $getId);
          $rows= mysqli_fetch_array($ew,MYSQLI_ASSOC);
          $custId= $rows['CustomerId'];
          $wq = "insert into pending_order (Job_order_type, Address, customer,  Area_type, status, employee_recieved, customerType, date) values('{$radior}','{$Area}','{$custId}','{$atype}', 'Pending', 3, 1,'{$Date}')";
          //,{'$Date'}
          $eww = mysqli_query($dbc, $wq);
          if ($req == 1)
            header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/gsjoborder.php");
          elseif ($req == 2)
            header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/occular.php");
        */
        }
        // FORM SUBMISSION 1 END
        // FORM SUBMISSION 2 START

        //FORM SUBMIT 2


        ?>
          <!-- NEW CLIENTS START -->

          <!-- CLIENT TOGGLE START -->

          <!-- CLIENT TOGGLE END -->

          <div class="sixteen wide centered column ">
            <div class="ui padded segment">
              <h3 class="ui centered header">HouseHold Service Report</h3>
              <?php
            

            ?>
                <div class="ui divider">
                </div>
                <form id="householdreport" class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                  <div class="two wide field">
                    <label>Time Started:</label>
                    <input type="time" name="timeStart" placeholder="8:00 PM">

                  </div>
                  <div class="two wide field">
                    <label>Time Finished:</label>
                    <input type="time" name="timeEnd" placeholder="12:00 AM">
                  </div>

                  <div class="grouped fields">
                    <div class="field">
                      <label>Treated Areas:</label>
                      <div class="ui checkbox">
                        <input type="checkbox" name="areaType[]" value="Bedrooms">
                        <label>Bedrooms</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">
                        <input type="checkbox" name="areaType[]" value="Drainages">
                        <label>Drainages</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">
                        <input type="checkbox" name="areaType[]" value="Living Room">
                        <label>Living Room</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">
                        <input type="checkbox" name="areaType[]" value="Kitchen">
                        <label>Kitchen</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">

                        <input type="checkbox" name="areaType[]" value="Dining Room">
                        <label>Dining Room</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">
                        <input type="checkbox" name="areaType[]" value="Laundry Area">
                        <label>Laundry Area</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">

                        <input type="checkbox" name="areaType[]" value="others">
                        <label>Others: </label>
                        <input type="text" name="other" placeholder="Others">
                      </div>
                    </div>

                  </div>


                  <div class="grouped fields">
                    <div class="field">
                      <label>Services Rendered:</label>
                      <div class="ui checkbox">
                        <input type="checkbox" name="serviceRendered[]" value="Spraying">
                        <label>Spraying</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">
                        <input type="checkbox" name="serviceRendered[]" value="Missing">
                        <label>Missing</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">
                        <input type="checkbox" name="serviceRendered[]" value="Fogging">
                        <label>Fogging</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">
                        <input type="checkbox" name="serviceRendered[]" value="Gel Application">
                        <label>Gel Application</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">
                        <input type="checkbox" name="serviceRendered[]" value="Rat Traps">
                        <label>Rat Traps</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">
                        <input type="checkbox" name="serviceRendered[]" value="Rat Baits">
                        <label>Rat baits</label>
                      </div>
                    </div>

                  </div>

                  <div class="grouped fields">
                    <div class="field">
                      <label>Findings:</label>
                      <div class="ui checkbox">
                        <input type="checkbox" name="findings[]" value="Cockroaches">
                        <label>Cockroaches</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">
                        <input type="checkbox" name="findings[]" value="Rats">
                        <label>Rats</label>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui checkbox">

                        <input type="checkbox" name="findings[]" value="others">
                        <label>Others: </label>
                        <input type="text" name="Fother" placeholder="Others">


                      </div>



                    </div>
                  </div>
                  <div class="field">
                    <label>Remarks</label>
                    <textarea rows="2" name="remarks" /></textarea>
                  </div>
                  <div class="two wide field">
                    <label>Amount Due for the Services Rendered:</label>
                    <input type="number" name="ammount" placeholder="Amount due:">
                  </div>
                  <div class="field">
                    <label>Client Remarks</label>
                    <textarea rows="2" name="Cremarks" placeholder="Can be Empty" /></textarea>
                  </div>

                  <button class="positive ui button primary" type="submit" name="submit1">Submit</button>

                  <div class="ui error message"></div>
            </div>
            </form>
          </div>
      </div>
      <!-- NEW CLIENTS END  <input type="submit" name="submit" value="Submit1"> -->

      <!-- OLD CLIENTS START -->
      <br></br>

      <!-- OLD CLIENTS END -->
    </div>
  </div>
  </div>


  <!-- MAIN CONTENT END -->

  <!-- scripts -->
  <script src="../dashboard.js"></script>
  <script src="../dashboard4.js"></script>

</body>

</html>