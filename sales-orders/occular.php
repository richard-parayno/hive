<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hive Resource Management System - Create Service Request</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.css" rel="stylesheet" type="text/css" />
    <?php 
    ob_start();
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.js"></script>
    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.js"></script>

  </head>
  <body>
    <!-- SIDEBAR START -->
      <div class="ui inverted left vertical sidebar menu">
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
          <div class="ui top menu">
            <div class="ui header item launch button">
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

            <!-- Dispaly Information Start -->

            <!-- CLIENT TOGGLE START -->
           
            <!-- CLIENT TOGGLE END -->

            <div class="sixteen wide centered column new-clients">

              <div class="ui basic padded segment">
                <h3 class="ui centered header"> Client Information</h3>
                <div class="ui divider">
                </div>
                <div> 
                <?php 
                     require_once('../mysql_connect.php');
                     $run = "Select * from pending_order ORDER BY pending_order_Id DESC LIMIT 1";
                     $ew= mysqli_query($dbc, $run);
                       while ($row = mysqli_fetch_array($ew,MYSQLI_ASSOC)){
                       $id=$row['customer'];
                       echo "<br><h3>Service Request Type: </h3>".$row['Job_order_type']. "</br>";
                       echo "<br><h3>Date Requested: </h3>".$row['date']. "</br>";
                       }
                        $eww= "Select Name from customer where CustomerId='{$id}'";
                        $wr= mysqli_query($dbc,$eww); 
                        $row2=mysqli_fetch_array($wr,MYSQLI_ASSOC); 
                        echo "<br><h3>Customer Name: </h3>" .$row2['Name']. "</br";

                ?>
              </div>
            </div>
            <!-- Display Information END -->

             <?php
             $flag =0;
              if (isset($_POST['submit1'])){
              		if (empty($_POST['Date']))
              		{
              			$date=false;
              			$message.= '<p> You Forgot to choose the date for the Occular!';
              		}
              		else
              		{
                    $date= $_POST['Date'];

              		}
                    if (empty($_POST['Name']))
               {
                 $message.='<p>you forgot to enter the Client Name!';
                 $Name=FALSE;

                }
                 else $Name= $_POST['Name'];
              		 if(!isset($message)){ 
  						require_once('../mysql_connect.php');
 						 $flag=1;
					  // values ('{$Area_visited}','{$Area_Type} ','{$thecustomer} ','{$Date} ','{$Time} ','{$person} ', '{$supervisor}' , '{$callername}', 'Active')";
 
 						// $insertCustomer= "insert into customer (Name, ContactNo, Address) values('{$Name}','{$number}', '{$Area}') ";
 						// $result = mysqli_query($dbc,$insertCustomer);
 						 $getId= "Select Address,customer, Area_type, pending_order_Id from pending_order ORDER BY pending_order_Id DESC LIMIT 1"; 
 					   $ew= mysqli_query($dbc, $getId); 
 						 $rows= mysqli_fetch_array($ew,MYSQLI_ASSOC); 
  					// $rows['CustomerId']; customer is int address is varchar areatype is varchar 
             $address = $rows['Address'];
             $areatype=$rows['Area_type'];
             $customer= $rows['customer'];
             $pendingId= $rows['pending_order_Id'];

             Echo  "The address is : ". $address ;
             Echo  "The areatype is : ". $areatype ;
             Echo  "The customer is: ". $customer ;
             Echo  "The pendingid: ". $pendingId ;
             Echo  "The name is : ". $Name ;
             Echo  "The date is : ". $date ;
  						$wq= "insert into occular_visits (CustomerID, JobSite_Adress,Area_Type, Status,LF_At_Site, Date, pending_order) values('{$customer}','{$address}','{$areatype}','Active','{$Name}', '{$date}', '{$pendingId}')";
 						 //,{'$Date'}
 						 $eww= mysqli_query($dbc, $wq);
   				

             header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/../sales-index.php");
   
  }
              }

              ?>
            <!-- INput START -->
            <div class="sixteen wide centered column existing-clients">
              <div class="ui basic padded segment">
                <h3 class="ui centered header">Occular</h3>
                <div class="ui divider">
                </div>
                 <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                   <div class="field">
                      <label>Date Requested</label>
                      <div class="ui calendar" id="mycalendar">

                        <div class="ui input left icon">

                          <!--  <input type="date" name="Date" value="<?php if (isset($_POST['Date']) && !$flag) echo $_POST['Date']; ?>"/> -->
                        </div>
                      </div>
                       <i class="calendar icon"></i>   
                       <input type="date" name = "Date" value="<?php if (isset($_POST['Date']) && !$flag) echo $_POST['Date']; ?>"/>
                    </div>
                    <div class = "field"> 

                      <div class = "eight wide field"> 
                       <label>Looking for at Site:</label>
                          <input type="text" name="Name" placeholder="Looking For at Site"value="<?php if (isset($_POST['Name']) && !$flag) echo $_POST['Name']; ?>"/>

                    </div>
                  <input type="submit" name="submit1" value="Submit"> 
                  </form>
              </div>
            </div>
            <!-- OLD CLIENTS END -->
          </div>
        </div>
      </div>


      <!-- MAIN CONTENT END -->

      <!-- scripts -->
      <script>
    

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
        type: 'date',
        
        monthFirst: False, 
        formater: {
          date: function (date, settings){
            if (!date ) return ''; 
            var day= date.getDate();
            var month = date.getMonth() + 1;
            var year= date.getFullYear();
            return year + '-'+ month +'-'+day;
          }
        }
          
      })
      ;

      $(".ui.sidebar").sidebar()
                      .sidebar('attach events','.ui.launch.button');
      </script>

  </body>
</html>
