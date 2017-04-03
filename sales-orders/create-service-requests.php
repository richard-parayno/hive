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
  if (!isset($_SESSION['currentUser'])) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  if ($_SESSION['currentType'] != 1) {
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
  }
  ?>
</head>
<body>
  <!-- SIDEBAR START -->
  <div class="ui inverted left vertical sidebar menu" id="sidebar">
    <div class="item">
      <a href="#">
        <b>Hive Resource Management System</b>
      </a>
    </div>
    <a class="item" href="../sales-index.php">
      <i class="home icon"></i>
      Sales Dashboard
    </a>
    <a class="item" href="create-service-requests.php">
      Create Service Requests
    </a>
    <a class="item" href="reschedule-service-requests.php">
      Reschedule Service Requests
    </a>
    <a class="item" href="../sales-chemicals/chemical.php">
      Chemical Inventory
    </a>
    <a class="item" href="sales-clients/clients-list.php">
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
      <div class="ui sticky top menu">
        <a class="ui item launch">
          <i class="sidebar icon"></i>
          Menu
        </a>
        <div class="item">
          Sales and Marketing Department
        </div>
        <div class="item">
          <div class="ui breadcrumb">
            <a class="section" href="../sales-index.php">Sales Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Create Service Request</div>
          </div>
        </div>
        <div class="right menu ">
        </div>
      </div>
    </div>
    <!-- TOP BAR END -->
    <div class="ui basic padded segment">
      <div class="ui relaxed grid">

        <!-- FORM SUBMITTION 1 START-->
        <?php

        if (isset($_POST['submit1'])){

          $Name= $_POST['newname'];
          $Area=$_POST['newaddress'];
          $radior = $_POST['newservicerequested'];
          switch ($radior) {
            case 'General Services':
              $req = 1;
              break;

            case 'Termite Treatment':
              $req = 2;
              break;

            case 'Household Services':
              $req = 3;
              break;
          }

          $atype = $_POST['newareatype'];
          if ($atype == "Others") {
            $atype = $_POST['newothers'];
          }

          $Date = $_POST['newdate'];
          $number = $_POST['newnumber'];
          if (isset($_POST['newremarks']))
            $Remarks = $_POST['newremarks'];

          require_once('../mysql_connect.php');

          $insertCustomer= "INSERT INTO customer (Name, ContactNo, Address) values('{$Name}','{$number}', '{$Area}') ";
          $result = mysqli_query($dbc,$insertCustomer);
          $getId= "Select CustomerId from customer WHERE Name='{$Name}'";
          $ew= mysqli_query($dbc, $getId);
          $rows= mysqli_fetch_array($ew,MYSQLI_ASSOC);
          $custId= $rows['CustomerId'];
          if (isset($_POST['newremarks']))
            $wq = "INSERT INTO pending_order (Job_order_type, Address, customer,  Area_type, status, employee_recieved, customerType, date, remarks) values('{$radior}','{$Area}','{$custId}','{$atype}', 'Pending', 3, 1,'{$Date}', '{$Remarks}')";
          else
            $wq = "INSERT INTO pending_order (Job_order_type, Address, customer,  Area_type, status, employee_recieved, customerType, date) values('{$radior}','{$Area}','{$custId}','{$atype}', 'Pending', 3, 1,'{$Date}')";
            
          //,{'$Date'}
          $eww = mysqli_query($dbc, $wq);
          
          $_SESSION['currentcustomer'] = $custId;
          $_SESSION['currentareatype'] = $atype; 
          $_SESSION['currentdate'] = $Date;           

          if ($req == 1) {
            header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/gsjoborder.php");
          }
          elseif ($req == 2) {
            header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/occular.php");
          }
          elseif ($req == 3) {
            header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/occular.php");
          }
        }
        // FORM SUBMISSION 1 END
        // FORM SUBMISSION 2 START

        //FORM SUBMIT 2


        if  (isset($_POST['submit2'])){

          $Date= $_POST['olddate'];
          $Area=$_POST['oldaddress'];
          if (isset($_POST['oldremarks']))
            $Remarks=$_POST['oldremarks'];

          $radior = $_POST['oldservicerequested'];

          switch ($radior) {
            case 'General Services':
              $req = 1;
              break;

            case 'Termite Treatment':
              $req = 2;
              break;

            case 'Household Services':
              $req = 3;
              break;
          }

          $atype = $_POST['oldareatype'];
          if ($atype == "Others") {
            $atype = $_POST['oldothers'];
          }
          $old= $_POST['old'];
          
          require_once('../mysql_connect.php');

          $_SESSION['currentcustomer'] = $old;
          $_SESSION['currentareatype'] = $atype; 
          $_SESSION['currentdate'] = $Date; 

          if (isset($_POST['oldremarks']))
            $wq= "INSERT INTO pending_order (Job_order_type, Address, customer,  Area_type, status, customerType, date, remarks) values('{$radior}','{$Area}','{$old}','{$atype}', 'Pending', 2,'{$Date}', '{$Remarks}')";
          else
            $wq= "INSERT INTO pending_order (Job_order_type, Address, customer,  Area_type, status, customerType, date) values('{$radior}','{$Area}','{$old}','{$atype}', 'Pending', 2,'{$Date}')";

          $eww= mysqli_query($dbc, $wq);
          if ($req==1) {
            header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/gsjoborder.php");
          }
          elseif ($req==2) { 
            header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/occular.php");
          }
        }

        ?>
        <!-- NEW CLIENTS START -->

        <!-- CLIENT TOGGLE START -->
        <div class="three wide centered column">
          <div class="ui padded segment">
            <h3 class="ui centered header">Client Type</h3>
            <div class="ui slider checkbox">
              <input type="radio" name="slide-client" id="slide-new">
              <label>New Client</label>
            </div>
            <br></br>
            <div class="ui slider checkbox">
              <input type="radio" name="slide-client" id="slide-existing">
              <label>Existing Client</label>
            </div>
          </div>
        </div>
        <!-- CLIENT TOGGLE END -->

        <div class="sixteen wide centered column new-clients">
          <div class="ui padded segment">
            <h3 class="ui centered header">New Clients</h3>
            <div class="ui divider">
            </div>
            <form id="newclientsform" class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div class="field">
                <label>Client Name</label>
                <input type="text" name="newname" placeholder="Client Name"/>
              </div>
              <div class="field">
                <label>Address</label>
                <input type="text" name="newaddress" placeholder="Address Line 1"/>
              </div>
              <div class="field">
                <label>Contact Number</label>
                <input type="number" name="newnumber" placeholder="Contact Number"/>
              </div>

              <div class="grouped fields">
                <label>Type of Service Requested</label>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="newservicerequested" value="Termite Treatment">
                    <label>Termite</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="newservicerequested" value="Household Services">
                    <label>Household</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="newservicerequested" value="General Services">
                    <label>General Services</label>
                  </div>
                </div>

              </div>

              <div class="field">
                <label>Date Requested</label>
                <div class="ui calendar" id="mycalendar">
                  <div class="ui input left icon">
                    <i class="calendar icon"></i>
                    <input type="text" name="newdate" placeholder="Date Requested"/>
                  </div>
                </div>
              </div>
              <div class="grouped fields">
                <div class="field">
                  <label>Area Type</label>
                  <div class="ui radio checkbox">
                    <input type="radio" name="newareatype" value="Restaurant">
                    <label>Restaurant</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="newareatype" value="Household">
                    <label>Household</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="newareatype" value="Office Area">
                    <label>Office Area</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="newareatype" value="Warehouse">
                    <label>Warehouse</label>
                  </div>
                </div>
                <div class="inline fields">
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input type="radio" name="newareatype" value="Others">
                      <label>Others: </label>
                    </div>
                  </div>
                  <div class="field">
                    <input type="text" name="newothers" placeholder="Others"/>
                  </div>
                </div>

              </div>
              <div class="field">
                <label>Remarks</label>
                <textarea rows="2" name="newremarks"/></textarea>
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
      <div class="sixteen wide centered column existing-clients">
        <div class="ui padded segment">
          <h3 class="ui centered header">Existing Clients</h3>
          <div class="ui divider">
          </div>
          <form id="oldclientsform" class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="field">
              <label>Existing Clients</label>
              <select class="ui search dropdown" name = "old">
                <option value=''>Select an Existing Client</option>
                <?php
                require_once('../mysql_connect.php');
                $custname = "SELECT CustomerId, Name from customer";
                $getname = mysqli_query($dbc, $custname);
                while ($row = mysqli_fetch_array($getname,MYSQLI_ASSOC)){
                  echo '<option value="'.$row['CustomerId'].'">'.$row['Name'].'</option>';
                }
                $selectOption = $_POST['Name'];
                ?>
              </select>
            </div>
            <div class="grouped fields">
              <label>Type of Service Requested</label>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="oldservicerequested" value="Termite Treatment">
                  <label>Termite</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="oldservicerequested" value="Household Services">
                  <label>Household</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="oldservicerequested"  value="General Services">
                  <label>General Services</label>
                </div>
              </div>
            </div>
            <div class="field">
              <label>Address</label>
              <input type="text" name="oldaddress" placeholder="Address Line 1"/>
            </div>
            <div class="field">
              <label>Date Requested</label>
              <div class="ui calendar" id="mycalendar2">
                <div class="ui input left icon">
                  <i class="calendar icon"></i>
                  <input type="text" name="olddate" placeholder="Date Requested"/>
                </div>
              </div>
            </div>
            <div class="grouped fields">
              <div class="field">
                <label>Area Type</label>
                <div class="ui radio checkbox">
                  <input type="radio" name="oldareatype" value="Restaurant">
                  <label>Restaurant</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="oldareatype" value="Household">
                  <label>Household</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="oldareatype" value="Office Area">
                  <label>Office Area</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" name="oldareatype" value="Warehouse">
                  <label>Warehouse</label>
                </div>
              </div>
              <div class="inline fields">
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="oldareatype" value="Others">
                    <label>Others</label>
                  </div>
                </div>
                <div class="field">
                  <input type="text" name="oldothers" placeholder="Others"/>
                </div>
              </div>
            </div>
            <div class="field">
              <label>Remarks</label>
              <textarea rows="2" name="oldremarks"/></textarea>
            </div>
            <button class="positive ui button primary" type="submit" name="submit2">Submit</button>
            <div class="ui error message"></div>
          </form>
        </div>
      </div>
      <!-- OLD CLIENTS END -->
    </div>
  </div>
</div>


<!-- MAIN CONTENT END -->

<!-- scripts -->
<script src="../dashboard.js"></script>
<script src="../dashboard2.js"></script>

</body>
</html>
