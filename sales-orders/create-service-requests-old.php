<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hive Resource Management System - Create Service Request</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.js"></script>
    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.js"></script>
    <?php
    ob_start();
    ?>
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
              <!-- FORM SUBMITTION 1 START-->
                  <?php

  $flag=0;
  if (isset($_POST['submit1'])){

  $message=NULL;

  /*type of structure here*/
   if (empty($_POST['Name']))
   {
    $message.='<p>you forgot to enter the Client Name!';
    $Name=FALSE;

   }
   else $Name= $_POST['Name'];

   if (empty($_POST['Area']))
   {
    $Area=FALSE;
    $message.='<p>You forgot to Enter the Area!';
   }else
    $Area=$_POST['Area'];
   if (empty($_POST['radior']))
   {
    $radior=FALSE;
    $req = false;

    $message.= '<p> You Forgot to choose a Type of Service Requested!';
   }
   elseif ($_POST['radior']== "General Services")
     {
      $radior= $_POST['radior'];
      $req=1;


     } elseif ($_POST['radior']== "Termite Treatment")
     {

      $radior= $_POST['radior'];
       $req=2;

     }

     elseif ($_POST['radior'] == "Household Services")
     {
        $radior= $_POST['radior'];
           $req=2;

     }
   if (empty($_POST['Atype'])){
     $message.= '<p> You Forgot to choose an area type!';
     $atype= false;

   }
   elseif ($_POST['Atype']="Household")
   {

     $atype=($_POST['Atype']);
   }
   elseif ($_POST['Atype']="Office Area")
   {

       $atype=($_POST['Atype']);
   }
   elseif ($_POST['Atype']="Warehouse")
   {

       $atype=($_POST['Atype']);
   }
   elseif ($_POST['Atype']="Restaurant")
   {

       $atype=($_POST['Atype']);
   }
   elseif ($_POST['Atype']="Others")
   {

        if (empty ($_POST['others']))
        {
          $message.= '<p> You forgot to input the others data';
        }
        else
           $atype=($_POST['others']);
   }
   if (empty($_POST['Date'])){
   $Date=false;
   $message.='<p> You forgot to choose the date ';

   }
   else
    $Date= $_POST['Date'];


   if (empty($_POST['Cnumber'])){
   $number=false;
   $message.='<p> You forgot to input a number' ;

   }
   else
    $number= $_POST['Cnumber'];


   if (empty($_POST['remarks'])){
    $Remarks=FALSE;
    $message.='<p>You forgot to input the remarks!';
   }else
    $Remarks=$_POST['remarks'];


  if(!isset($message)){
  require_once('../mysql_connect.php');
  $flag=1;
  // values ('{$Area_visited}','{$Area_Type} ','{$thecustomer} ','{$Date} ','{$Time} ','{$person} ', '{$supervisor}' , '{$callername}', 'Active')";

  $insertCustomer= "insert into customer (Name, ContactNo, Address) values('{$Name}','{$number}', '{$Area}') ";
  $result = mysqli_query($dbc,$insertCustomer);
  $getId= "Select CustomerId from customer ORDER BY CustomerId DESC LIMIT 1";
  $ew= mysqli_query($dbc, $getId);
  $rows= mysqli_fetch_array($ew,MYSQLI_ASSOC);
  $custId= $rows['CustomerId'];
  $wq= "insert into pending_order (Job_order_type, Address, customer,  Area_type, status, customerType, date) values('{$radior}','{$Area}','{$custId}','{$atype}', 'Pending', 1,'{$Date}')";
  //,{'$Date'}
  $eww= mysqli_query($dbc, $wq);
    if ($req==1)
    {

        header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/gsjoborder.php");
    }
    elseif ($req==2)
    {
        header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/occular.php");

    }
  }
}
// FORM SUBMISSION 1 END
// FORM SUBMISSION 2 START


                   ?>

            <!-- FORM SUBMIT 2 -->
      <?php
              $flag =0;
    if  (isset($_POST['submit2'])){
       if (empty($_POST['Date'])){
      $Date=false;


   }
   else
    $Date= $_POST['Date'];
      if (empty($_POST['Area']))
          {
            $Area=FALSE;
           $message.='<p>You forgot to Enter the Area!';
        }else
        $Area=$_POST['Area'];
   if (empty($_POST['remarks'])){
    $Remarks=FALSE;
    $message.='<p>You forgot to input the remarks!';
   }else
    $Remarks=$_POST['remarks'];
     if (empty($_POST['Area']))
   {
    $Area=FALSE;
    $message.='<p>You forgot to Enter the Area!';
   }else
    $Area=$_POST['Area'];
   if (empty($_POST['radior']))
   {
    $radior=FALSE;
    $req = false;
     $message.= '<p> You Forgot to choose a Type of Service Requested!';
   }
   elseif ($_POST['radior']== "General Services")
     {
      $radior= $_POST['radior'];
      $req=1;


     } elseif ($_POST['radior']== "Termite Treatment")
     {

      $radior= $_POST['radior'];
       $req=2;

     }

     elseif ($_POST['radior'] == "Household Services")
     {
        $radior= $_POST['radior'];
           $req=2;

     }
   if (empty($_POST['Atype'])){
     $message.= '<p> You Forgot to choose an area type!';
     $atype= false;

   }
   elseif ($_POST['Atype']="Household")
   {

     $atype=($_POST['Atype']);
   }
   elseif ($_POST['Atype']="Office Area")
   {

       $atype=($_POST['Atype']);
   }
   elseif ($_POST['Atype']="Warehouse")
   {

       $atype=($_POST['Atype']);
   }
   elseif ($_POST['Atype']="Restaurant")
   {

       $atype=($_POST['Atype']);
   }
   elseif ($_POST['Atype']="Others")
   {

        if (empty ($_POST['others']))
        {
          $message.= '<p> You forgot to input the others data';
        }
        else
           $atype=($_POST['others']);
   }


   if (empty($_POST['old']))
   {

    $old=false;
    $message.='<p> You did not choose a customer';
   }
   else
    $old= $_POST['old'];

  if(!isset($message)){
  require_once('../mysql_connect.php');
  $flag=1;

  // values ('{$Area_visited}','{$Area_Type} ','{$thecustomer} ','{$Date} ','{$Time} ','{$person} ', '{$supervisor}' , '{$callername}', 'Active')";
  $wq= "insert into pending_order (Job_order_type, Address, customer,  Area_type, status, customerType, date) values('{$radior}','{$Area}','{$old}','{$atype}', 'Pending', 2,'{$Date}')";
  //,{'$Date'}
  $eww= mysqli_query($dbc, $wq);
    if ($req==1)
    {

        header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/gsjoborder.php");
    }
    elseif ($req==2)
    {
        header("Location:  http://".$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/occular.php");

    }
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

              <div class="ui basic padded segment">
                <h3 class="ui centered header">New Clients</h3>
                <div class="ui divider">
                </div>
                  <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="field">
                      <div class="fields">
                        <div class="twelve wide field">
                          <label>Client Name</label>
                          <input type="text" name="Name" placeholder="Client Name"value="<?php if (isset($_POST['Name']) && !$flag) echo $_POST['Name']; ?>"/>
                        </div>

                    </div>
                      </div>
                    <div class="field">
                      <label>Address</label>
                      <div class="fields">
                        <div class="fourteen wide field">
                          <input type="text" name="Area" placeholder="Address Line 1" value="<?php if (isset($_POST['Area']) && !$flag) echo $_POST['Area']; ?>"/>
                        </div>

                      </div>
                    </div>
                     <div class="field">
                      <div class="fields">
                        <div class="four wide field">
                          <label>Contact Number</label>
                          <input type="number" name="Cnumber" placeholder="Eg. 09175690899"value="<?php if (isset($_POST['Cnumber']) && !$flag) echo $_POST['Cnumber']; ?>"/>
                        </div>

                    </div>
                      </div>

                    <div class="field">
                      <label>Type of Service Requested</label>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radior" <?php if (isset($radior) && $radior=="Termite Treatment") echo "checked";?> value="Termite Treatment">
                        <label>Termite</label>
                      </div>
                      <br></br>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radior" <?php if (isset($radior) && $radior=="Household Services") echo "checked";?> value="Household Services">
                        <label>Household</label>
                      </div>
                      <br> </br>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radior" <?php if (isset($radior) && $radior=="General Services") echo "checked";?> value="General Services">
                        <label>General Services</label>
                      </div>
                      <br></br>
                    </div>

                    <div class="field">
                      <label>Date Requested</label>
                      <div class="ui calendar" id="mycalendar">
                        <div class="ui input left icon">
                          <i class="calendar icon"></i>
                          <input type="text" name = "Date"placeholder="Date" value="<?php if (isset($_POST['Date']) && !$flag) echo $_POST['Date']; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <label>Area Type</label>
                      <div class="ui radio checkbox1">
                        <input type="radio" name="Atype" <?php if (isset($Atype) && $Atype=="Restaurant") echo "checked";?> value="Restaurant">
                        <label>Restaurant</label>
                      </div>

                      <div class="ui radio checkbox1">
                        <input type="radio" name="Atype"<?php if (isset($Atype) && $Atype=="Household") echo "checked";?> value="Household">
                        <label>Household</label>
                      </div>

                      <div class="ui radio checkbox1">
                        <input type="radio" name="Atype"<?php if (isset($Atype) && $Atype=="Office Area") echo "checked";?> value="Office Area">
                        <label>Office Area</label>
                      </div>

                      <div class="ui radio checkbox1">
                        <input type="radio" name="Atype"<?php if (isset($Atype) && $Atype=="Warehouse") echo "checked";?> value="Warehouse">
                        <label>Warehouse</label>
                      </div>

                      <div class="ui radio checkbox1">
                        <input type="radio" name="Atype"<?php if (isset($Atype) && $Atype=="Others") echo "checked";?> value="Others">
                        <label>Others</label>
                          <div class="four wide field">
                          <input type="text" name="others" placeholder="Others" value="<?php if (isset($_POST['others']) && !$flag) echo $_POST['others']; ?>"/>
                        </div>
                      </div>
                      <br></br>
                    </div>
                    <div class="field">
                      <label>Remarks</label>
                      <textarea rows="2" name="remarks" value="<?php if (isset($_POST['remarks']) && !$flag) echo $_POST['remarks']; ?>"/></textarea>
                    </div>
                    <input type="submit" name="submit1" value="Submit">

                  </form>
              </div>
            </div>
            <!-- NEW CLIENTS END  <input type="submit" name="submit" value="Submit1"> -->

            <!-- OLD CLIENTS START -->
            <div class="sixteen wide centered column existing-clients">
              <div class="ui basic padded segment">
                <h3 class="ui centered header">Existing Clients</h3>
                <div class="ui divider">
                </div>
                  <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="field">
                      <label>Existing Clients</label>
                      <select class="ui search dropdown" name = "old">
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
                        <div class="field">
                      <label>Type of Service Requested</label>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radior" <?php if (isset($radior) && $radior=="Termite Treatment") echo "checked";?> value="Termite Treatment">
                        <label>Termite</label>
                      </div>
                      <br></br>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radior" <?php if (isset($radior) && $radior=="Household Services") echo "checked";?> value="Household Services">
                        <label>Household</label>
                      </div>
                      <br> </br>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radior" <?php if (isset($radior) && $radior=="General Services") echo "checked";?> value="General Services">
                        <label>General Services</label>
                      </div>
                      <br></br>
                    </div>
                    <div class="field">
                      <label>Address</label>
                      <div class="fields">
                        <div class="sixteen wide field">
                          <input type="text" name="Area" placeholder="Address Line 1" value="<?php if (isset($_POST['Area']) && !$flag) echo $_POST['Area']; ?>"/>
                        </div>

                      </div>
                    </div>
                    <div class="field">
                      <label>Date Requested</label>
                      <div class="ui calendar" id="mycalendar">
                        <div class="ui input left icon">
                          <i class="calendar icon"></i>
                         <input type="text" name = "Date"placeholder="Date" value="<?php if (isset($_POST['Date']) && !$flag) echo $_POST['Date']; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <label>Area Type</label>
                      <div class="ui radio checkbox1">
                        <input type="radio" name="Atype" <?php if (isset($Atype) && $Atype=="Restaurant") echo "checked";?> value="Restaurant">
                        <label>Restaurant</label>
                      </div>

                      <div class="ui radio checkbox1">
                        <input type="radio" name="Atype"<?php if (isset($Atype) && $Atype=="Household") echo "checked";?> value="Household">
                        <label>Household</label>
                      </div>

                      <div class="ui radio checkbox1">
                        <input type="radio" name="Atype"<?php if (isset($Atype) && $Atype=="Office Area") echo "checked";?> value="Office Area">
                        <label>Office Area</label>
                      </div>

                      <div class="ui radio checkbox1">
                        <input type="radio" name="Atype"<?php if (isset($Atype) && $Atype=="Warehouse") echo "checked";?> value="Warehouse">
                        <label>Warehouse</label>
                      </div>

                      <div class="ui radio checkbox1">
                        <input type="radio" name="Atype"<?php if (isset($Atype) && $Atype=="Others") echo "checked";?> value="Others">
                        <label>Others</label>
                          <div class="four wide field">
                          <input type="text" name="others" placeholder="Others" value="<?php if (isset($_POST['others']) && !$flag) echo $_POST['others']; ?>"/>
                        </div>
                      </div>
                      <br></br>
                    </div>
                    <div class="field">
                      <label>Remarks</label>
                     <textarea rows="2" name="remarks" value="<?php if (isset($_POST['remarks']) && !$flag) echo $_POST['remarks']; ?>"/></textarea>
                    </div>
                      <input type="submit" name="submit2" value="Submit">
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
