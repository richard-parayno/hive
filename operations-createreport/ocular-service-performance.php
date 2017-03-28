<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>AF-Xtrim Services - Create Service Request</title>
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
              Create Occular Report
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
        <div class="ui item launch button">
          <i class="icon list layout"></i>
        </div>
        <div class="item">
          Sales and Marketing Department
        </div>
        <div class="item">
          <div class="ui breadcrumb">
            <a class="section" href="../operations-index.php">Operations Dashboard</a>
            <i class="right angle icon divider"></i>
            <a class="section" href="occular-page1.php">Choose Ocular Report</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Create Ocular Report</div>
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

  $flag=0;
  if (isset($_POST['submit1'])){

  $message=NULL;

  /*type of structure here*/
   if (empty($_POST['Findings']))
   {
    $message.='<p>you forgot to enter the Client Name!';
    $findings=FALSE;

   }
   else $findings= $_POST['Findings'];

   if (empty($_POST['size']))
   {
    $size=FALSE;
    $message.='<p>You forgot to Enter the Area Size!';
   }else
    $size=$_POST['size'];
   if (empty($_POST['radior']))
   {
    $radior=FALSE;
    $req = false;

    $message.= '<p> You Forgot to choose a Type of Service Requested!';
   }
   elseif ($_POST['radior']== "Termite Treatment")
     {

      $radior= $_POST['radior'];
       $req=2;

     }

     elseif ($_POST['radior'] == "Household Services")
     {
        $radior= $_POST['radior'];
         

     }
  

  

   if (empty($_POST['remarks'])){
    $Remarks=FALSE;
    $message.='<p>You forgot to input the remarks!';
   }else
    $Remarks=$_POST['remarks'];
   if (empty($_POST['radior1']))
   {
   $radior1=FALSE;
    

    $message.= '<p> You Forgot to choose the degree of infestation!';
   }
   else $radior1 = $_POST['radior1'];

  if(!isset($message)){
  require_once('../mysql_connect.php');
  $flag=1;
    // $Occular= $_SESSION['occular_id'];
  
      $occular = $_GET['pk']; 
      echo "Size: " .$occular."<br>";
      $update = "UPDATE occular_visits set Status = 'Accomplished', Area_Size ='{$size}' , Remarks= '{$Remarks}', Findings= '{$findings}', Recommendation= '{$radior}', Area_Infection = '{$radior1}'  where Occular_ID = '{$occular}'";
      //UPDATE occular_visits set Status = 'Accomplished', Area_Size ='123' , Remarks= 'asd', Findings= 'asdada', Recommendation= 'Termite Treatment' where Occular_ID = '5'
      $run = mysqli_query($dbc,$update);
// $minusInventory= "UPDATE inventory set quantity= quantity-'{$quantity}' where ProductID = '{$item}'";

  // values ('{$Area_visited}','{$Area_Type} ','{$thecustomer} ','{$Date} ','{$Time} ','{$person} ', '{$supervisor}' , '{$callername}', 'Active')";

  }
}
// FORM SUBMISSION 1 END
// FORM SUBMISSION 2 START




  

            ?>
          <!-- NEW CLIENTS START -->

          <!-- CLIENT TOGGLE START -->

          <!-- CLIENT TOGGLE END -->

          <div class="sixteen wide centered column">

            <div class="ui padded segment">
              <h3 class="ui centered header">Occular Report</h3>
              <div class="ui divider">
              </div>
              <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="field">
                  <div class="fields">
                    <div class="two wide field">
                      <label>Area Size</label>
                      <input type="number" name="size" placeholder="Area SIze" value="<?php if (isset($_POST['size']) && !$flag) echo $_POST['size']; ?>"
                      />
                    </div>

                  </div>
                </div>
                <div class="field">
                  <label>Findings</label>
                  <div class="fields">
                    <div class="fourteen wide field">
                      <input type="text" name="Findings" placeholder="Address Line 1" value="<?php if (isset($_POST['Findings']) && !$flag) echo $_POST['Findings']; ?>"
                      />
                    </div>

                  </div>
                </div>
                <div class="field">
                  <div class="fields">
                    <div class="fourteen wide field">
                      <label>Remarks</label>
                      <input type="text" name="remarks" placeholder="Remarks" value="<?php if (isset($_POST['remarks']) && !$flag) echo $_POST['remarks']; ?>"
                      />
                    </div>

                  </div>
                </div>

                <div class="field">
                  <label>Recommendation</label>
                  <div class="ui radio checkbox">
                    <input type="radio" name="radior" <?php if (isset($radior) && $radior=="Termite Treatment" ) echo "checked";?>                    value="Termite Treatment">
                    <label>Termite Treatment</label>
                  </div>
                  <br></br>
                  <div class="ui radio checkbox">
                    <input type="radio" name="radior" <?php if (isset($radior) && $radior=="Household Services" ) echo "checked";?>                    value="Household Services">
                    <label>Household Service</label>
                  </div>
                  <br> </br>

                </div>
                <div class="field">
                  <label>Degree of Area Infection</label>
                  <div class="ui radio checkbox">
                    <input type="radio" name="radior1" <?php if (isset($radior) && $radior=="Heavy" ) echo "checked";?> value="Heavy">
                    <label>Heavy</label>
                  </div>
                  <br></br>
                  <div class="ui radio checkbox">
                    <input type="radio" name="radior1" <?php if (isset($radior) && $radior=="Medium" ) echo "checked";?>                    value="Medium">
                    <label>Medium</label>
                  </div>
                  <br> </br>
                  <div class="ui radio checkbox">
                    <input type="radio" name="radior1" <?php if (isset($radior) && $radior=="Light" ) echo "checked";?> value="Light">
                    <label>Light</label>
                  </div>
                  <br> </br>

                </div>


                <button class="positive ui right labeled icon button" name="submit1">
                            <i class="check icon"></i>
                            Done
                          </button>

              </form>
            </div>
          </div>
          <!-- NEW CLIENTS END  <input type="submit" name="submit" value="Submit1"> -->

      </div>
    </div>
  </div>


  <!-- MAIN CONTENT END -->

  <!-- scripts -->
  <script src="../dashboard.js"></script>

</body>

</html>