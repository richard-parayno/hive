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
  <script src="../bower_components/semantic/dist/semantic.min.js"></script>
  <script src="../bower_components/moment/moment.js"></script>
  <script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="../bower_components/fullcalendar/dist/locale-all.js"></script>
  <link href="../bower_components/semantic-ui-calendar/dist/calendar.min.css" rel="stylesheet" type="text/css" />
  <script src="../bower_components/semantic-ui-calendar/dist/calendar.min.js"></script>
  <?php 
    ob_start();
    session_start();
    if (isset($_POST['termiteoculars'])) 
      $_SESSION['termiteoculars'] = $_POST['termiteoculars'];
    if (isset($_POST['initialtreattermite']))
      $_SESSION['initialtreattermite'] = $_POST['initialtreattermite'];
    ?>
</head>

<body>

  <!-- SIDEBAR START -->
  <div class="ui inverted left vertical sidebar menu">
    <div class="item">
      <a href="#">
        <b class="centered">Hive Resource Management System</b>
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
    <a class="item" href="../sales-clients/clients-list.php">
      View Clients
    </a>
    <div class="item">
      <div class="header">
        Reports
      </div>
      <div class="menu">
        <a class="item" href="../sales-reports/termite-treatment-report.php">
          Termite Treatment Report
        </a>
        <a class="item" href="../sales-reports/household-treatment-report.php">
          Household Treatment Report
        </a>
        <a class="item" href="../sales-reports/general-services-report.php">
          General Services Report
        </a>
        <a class="item" href="../sales-reports/list-of-oculars-report.php">
          List of Oculars Report
        </a>
        <a class="item" href="../sales-reports/accomplished-oculars-report.php">
          Accomplished Oculars Report
        </a>
        <a class="item" href="../sales-resports/unaccomplished-oculars-report.php">
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
    <div class="pusher">
      <!-- TOP BAR START-->
      <div class="sixteen wide column">
        <div class="ui sticky top menu" >
          <a class="ui item launch">
            <i class="sidebar icon"></i> Menu
          </a>
          <div class="item">
            Sales and Marketing Department
          </div>
          <div class="item">
            <div class="ui breadcrumb">
              <a class="section" href="../sales-index.php">Sales Dashboard</a>
              <i class="right angle icon divider"></i>
              <a class="section" href="../sales-index.php">Schedule Termite Treatment</a>
              <i class="right angle icon divider"></i>
              <div class="active section">Confirm Termite Treatment</div>
            </div>
          </div>
          <div class="right menu ">

          </div>
        </div>
      </div>
      <!-- TOP BAR END -->
      <div class="ui basic padded segment">
        <div class="ui relaxed grid">
          <!-- accept Button -->
          <?php
            if (isset($_POST['accept'])) {
              require_once('../mysql_connect.php');
              $toSchedule = $_SESSION['termiteoculars'] ;
            
              $query="Select * from occular_visits where occular_id = '{$toSchedule}' ";
              $wer =  mysqli_query($dbc,$query); 
              $roww= mysqli_fetch_array($wer, MYSQLI_ASSOC);  
              $callername= $roww['CustomerID']; 
              
              $callername= $roww['CustomerID']; 	
              $getAreaType = "Select Area_type from pending_order where pending_order_id = '{$roww['pending_order']}'";
              $run= mysqli_query($dbc,$getAreaType);
              $getIt=mysqli_fetch_array($run,MYSQLI_ASSOC);
              $stype= $getIt['Area_type'];
            
              $dateTimeclass =  new DateTime ($_SESSION['initialtreattermite']);
              $endDate= new DateTime ($_SESSION['initialtreattermite']);
              $toGetLastDate = new DateTime($_SESSION['initialtreattermtite']);
              $dateTimeclass->format('Y-m-d');
              $ctr=1;
              while ($ctr<12)
              {
                $ctr=$ctr+1; 
                $forLast= new DateInterval ('P30D');
                $toGetLastDate->add($forLast);

              }
              $query="insert into job_order (StartDate,EndDate,CustomerId,occular_id,structure_type,job_type, job_status) values ('{$endDate->format('Y-m-d')}','{$toGetLastDate->format('Y-m-d')}','{$callername}', '{$toSchedule}', '{$stype}', 'Termite Treatment', 'Ongoing')";
              $result=mysqli_query($dbc,$query);
              $jon= " select JONumber FROM  job_order ORDER BY JONumber DESC LIMIT 1";
              $placejon= mysqli_query($dbc, $jon); 
              $thisjon= mysqli_fetch_array($placejon, MYSQLI_ASSOC); 
              $lastJO= $thisjon['JONumber'];	
              $query2= " insert into termitetreatment_serviceperformance (JobORderNo,Date) values ('{$lastJO}','{$dateTimeclass->format('Y-m-d')}')"; 
              $ew= mysqli_query($dbc,$query2);  
              $counter = 1;
              while ( $counter < 12) {
                $counter = $counter +1;
                $datetri = new DateInterval('P30D');
                $dateTimeclass->add($datetri);  
                $query4= "insert into termitetreatment_serviceperformance (JobORderNo,Date) values ('{$lastJO}','{$dateTimeclass->format('Y-m-d')}')";
                $work= mysqli_query($dbc,$query4); 
              }

        			header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/../sales-index.php");
              
            }
        		if (isset($_POST['cancel']))
        			header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/../sales-index.php");
        	?>
              <!-- Cancel Button end -->
              <!-- CONFIRM SCHEDULE START -->
              <div class="eight wide centered column">
                <div class="ui center aligned segment">
                  <div class="ui horizontal divider">
                    Ocular Report Details
                  </div>
                  <?php 
                    require_once('../mysql_connect.php');
                    //('{$aetype}'
                    // $toSchedule = $_SESSION['termiteocular'] ;
                    // remove $toshed=4 once session from sales-index works :) 
                    $toSchedule = $_SESSION['termiteoculars']; 
                    $query="Select * from occular_visits where occular_id = '{$toSchedule}' "; 
                    $run =  mysqli_query($dbc,$query);	
                    $getData=mysqli_fetch_array($run,MYSQLI_ASSOC);
                    //'{$getData['CustomerID']}'
                    $getCustomerNameQuery= "Select Name from customer where customerID = '{$getData['CustomerID']}'";
                    $run2=mysqli_query($dbc,$getCustomerNameQuery);
                    $getdata2=mysqli_fetch_array($run2,MYSQLI_ASSOC);
                    //echo "Peter is " . $age['Peter'] . " years old.";
                    echo "<b>Customer Name:</b> " . $getdata2['Name']; 
                    echo "<br>";
                    echo "<b>Degree of Infestation:</b> " .$getData['Area_Infection'];
                    echo "<br>";
                    $date = new DateTime ($getData['Date']);
                    // $dateTimeclass = new DateTime ($_POST['Date']); 
                    //$dateTimeclass->format('Y-m-d')
                    echo "<b>Date of Ocular: </b>" .$date->format('m-d-Y');
                    echo "<br>";
                    echo "<b>Area Size (in sq. m):     </b>" .$getData['Area_Size'];
                    echo "<br>";	
                    echo "<b>Contact Person: </b>" .$getData['LF_At_Site'];
                    echo "<br>";	
                    echo "<b> Remarks: </b>" .$getData['Remarks'];
                    echo "<br>";	
                    echo "<b>Findings: </b>" .$getData['Findings'];
                    echo "<br>";		
                    $getEmployee= "Select Name from employee where EmployeeNo = '{$getData['SupervisedBy']}'";
                    $run3=mysqli_query($dbc,$getEmployee);
                    $getdata3=mysqli_fetch_array($run3,MYSQLI_ASSOC);
                    echo "<b>Ocular Inspector: </b>" .$getdata3['Name'];
                  ?>
                  <br> </br>

                  <div class="ui horizontal divider">
                    Termite Treatment Schedule Details
                  </div>
                  <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <?php 
                      $toSchedule = new DateTime ($_SESSION['initialtreattermite']);
                     
                      $toSchedule->format('Y-m-d');
               	

		                  $counter=1;

					            

						          echo "<b> Termite Treatment # 1 is on </b>".$toSchedule->format('m-d-Y');
						          echo "<br>";

                      while ($counter!=12) {
                        $counter = $counter +1;
                        $datetri = new DateInterval('P30D');
                        $toSchedule->add($datetri);  
                        //echo "Peter is " . $age['Peter'] . " years old.";
                        $toDisplay = $counter+1;
                        echo "<b> Termite Treatment # </b>" .$toDisplay . " is on " .$toSchedule->format('m-d-Y');
                        echo "<br>";
                      } 

                  
              	    ?>

                    <br></br>
                    <div class="ui buttons">
                      <button class="ui button" type="submit" name="cancel">Cancel <i class="x icon"></i></button>
                      <div class="or"></div>
                      <button class="ui positive button" type="submit" name="accept">Accept <i class="checkmark icon"></i> </button>
                    </div>
                  </form>


                </div>
                <div class="ui two column grid">

                </div>
              </div>
        </div>
        <!-- CONFIRM SCHEDULE END -->

      </div>
    </div>
  </div>


  <!-- MAIN CONTENT END -->

  <!-- scripts -->
  <script src="../dashboard.js"></script>

</body>

</html>