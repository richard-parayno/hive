<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hive Resource Management System</title>
    <link href="bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/semantic/dist/semantic.min.js"></script>
    <script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" type="text/css" />
    <script src="../bower_components/moment/moment.js"></script>

    <style type="text/css">
      .column {
        margin-top: 100px;
        max-width: 450px;
      }

      body {
        background-color: #407DC5;
      }

      #header {
        color: white;
      }

    </style>
  </head>
  <?php
    require_once('mysql_connect.php');



    if (isset($_POST['submit'])) {
      echo $_POST['username'];
      echo "HI RICHARD";

      if (empty($_POST['username'])) {
        echo "<h1> EMPTY </h1>";
      } else $username = $_POST['username'];

      if (empty($_POST['password'])) {
        echo "<h1> EMPTY </h1>";

      } else $password = $_POST['password'];

      echo "username = {$username}";
      echo "password = {$password}";
      if (isset($username)) {
        if (isset($password)) {
          $getUserType = "SELECT UserType FROM users WHERE Username = '{$username}' AND Password = '{$password}'";
          $result = mysqli_query($dbc, $getUserType);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $userType = $row['UserType'];
          echo $userType;

          if(!empty($userType)){
            echo 'usertype exists';
            if ($userType == 1) {
              ob_start();
              session_start();
              $_SESSION['currentUser'] = $username;
              $_SESSION['currentType'] = $userType;
              header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/sales-index.php");
            } else if ($userType == 2) {
              ob_start();
              session_start();
              $_SESSION['currentUser'] = $username;
              $_SESSION['currentType'] = $userType;
              header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/operations-index.php");
            }
          }

        }
      }

    }

  ?>



  <body>
    <div class="ui middle aligned center aligned grid">
      <div class="column">
        <!-- TODO: Redesign AFXtrim Logo -->
        <!--<img src="assets/logo.png">-->
        <h2 class="ui header" id="header">Hive Resource Management System</h2>
        <form class="ui large form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="ui stacked segment">
          <div class="field">
            <input type="text" name="username" placeholder="Username:"></input>
          </div>
          <div class="field">
            <input type="password" name="password" placeholder="Password:"></input>
          </div>
          <button class="ui button primary" type="submit" name="submit">Login</button>
          </div>
        </form>

      </div>
  </body>
</html>
