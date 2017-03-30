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
            header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
        }
        if ($_SESSION['currentType'] != 3) {
            header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
        }

        require_once('../mysql_connect.php');

        if (isset($_POST['submit1'])) {
            $accountowner = $_POST['accountowner'];
            $username = $_POST['username'];
            $password = $_POST['password2'];
            $accounttype = $_POST['accounttype'];

            $query = "INSERT INTO users (UserIdno, Username, Password, UserType) values ('{$accountowner}', '{$username}', '{$password}', '{$accounttype}')";
            $run = mysqli_query($dbc, $query);
        }

        if (isset($_POST['submit2'])) {
            $existingaccount = $_POST['existingaccount'];
            $accountaction = $_POST['accountaction'];

            switch($accountaction) {
                case deactivate:
                    $query2 = "UPDATE users SET UserType = 0";
                    $run2 = mysqli_query($dbc, $query2); 
                    break;
                case updateowner:
                    if (isset($_POST['newuser'])) 
                        $newowner = $_POST['newuser'];
                    else
                        header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."manage-accounts.php");
                    
                    if ($newowner['EmployeePosition'] == "System Administrator")
                        $newusertype = 3;
                    else if ($newowner['EmployeePosition'] == "Accountant")
                        $newusertype = 2;
                    else if ($newowner['EmployeePosition'] == "Supervisor")
                        $newusertype = 1;

                    $query2 = "UPDATE users 
                                  SET UserIdno = '{$newowner['EmployeeNo']}', UserType = '{$newusertype}'
                                WHERE UserIdno = {$existingaccount}";
                    $runQuery2 = mysqli_query($dbc, $query2);
                    break;
                case updatecreds:
                    if (isset($_POST['updatedusername'])) {
                        $updatedusername = $_POST['updatedusername'];
                        $updatedpassword = $_POST['updatedpassword2'];
                    } else
                        header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."manage-accounts.php");
                        

                    $query3 = "UPDATE users
                                  SET Username = '{$updatedusername}', Password = '{$updatedpassword}'
                                WHERE UserIdno = {$existingaccount}";
                    $runQuery3 = mysqli_query($dbc, $query3);
                    break;
            }

        }

    

    ?>
    <!-- SIDEBAR START -->
    <div class="ui inverted left vertical sidebar menu" id="sidebar">
      <div class="item">
        <a href="#">
          <b class="centered">Hive Resource Management System</b>
        </a>
      </div>
      <a class="item" href="../operations-index.php">
        <i class="home icon"></i> Admin Module
      </a>
      <div class="item">
        <div class="header">
          User Accounts
        </div>
        <div class="menu">
          <a class="item" href="manage-employees.php">Manage Employees</a>
        </div>
        <div class="menu">
          <a class="item" href="manage-accounts.php">Manage Accounts</a>
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
            <i class="sidebar icon"></i> Menu
          </a>
          <div class="item">
            <div class="ui breadcrumb">
              <a class="section" href="../admin-index.php">Admin Module</a>
              <i class="right angle icon divider"></i>
              <div class="active section">Manage Accounts</div>
            </div>
          </div>
          <div class="right menu ">

          </div>
        </div>
      </div>
      <!-- TOP BAR END -->
      <div class="ui basic padded segment">
        <div class="ui relaxed grid">
          <div class="sixteen wide column">
            <div class="ui segment">
              <h3 class="ui center aligned header">Manage Accounts</h3>
              <div class="ui divider">
              </div>
              <div class="ui two column doubling stackable grid container">
                <div class="eight wide column">
                  <div class="ui segment">
                    <h3 class="ui center aligned header">Add Account<h3>
                    <div class="ui divider"></div>
                        <form id="addaccount" class="ui form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="field">
                                <label>Account Owner</label>
                                <select name="accountowner" id="accountowner" class="ui search dropdown">
                                    <option value="">Choose the Account Owner</option>
                                    <?php
                                        require_once('../mysql_connect.php');
                                        $query = "SELECT EmployeeNo, Name, EmployeePosition
                                                    FROM employee
                                                   WHERE EmployeePosition != 'Worker'";
                                        $runQuery = mysqli_query($dbc, $query);
                                        while ($row = mysqli_fetch_array($runQuery, MYSQLI_ASSOC)) {
                                            echo "<option value='{$row['EmployeeNo']}'>{$row['Name']}, {$row['EmployeePosition']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="field">
                                <label>Username</label>
                                <input name="username" id="username" type="text" placeholder="Enter Username"></input>
                            </div>
                            <div class="field">
                                <label>Password</label>
                                <input name="password1" id="password1" type="password" placeholder="Enter Username"></input>                                
                            </div>
                            <div class="field">
                                <label>Confirm Password</label>
                                <input name="password2" id="password2" type="password" placeholder="Enter Username"></input>                                
                            </div>
                            <div class="grouped fields">
                                <div class="field">
                                    <label>Account Type</label>
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="accounttype" value="1">
                                        <label>Sales and Marketing Account</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="accounttype" value="2">
                                        <label>Operations Account</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="accounttype" value="3">
                                        <label>Administrator Account</label>
                                    </div>
                                </div>
                            </div>
                            <button class="positive ui button primary" type="submit" name="submit1">Submit</button>
                        </form>
                  </div>
                </div>
                <div class="eight wide column">
                  <div class="ui segment">
                    <h3 class="ui center aligned header">Update Account<h3>
                    <div class="ui divider"></div>                        
                        <form id="updateaccount" class="ui form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="field">
                                <label>Existing Account</label>
                                <select name="existingaccount" id="existingaccount" class="ui search dropdown">
                                    <option value="">Choose an Existing Account</option>
                                    <?php
                                        require_once('../mysql_connect.php');
                                        $query = "SELECT Username, UserType, UserIdno
                                                    FROM users";
                                        $runQuery = mysqli_query($dbc, $query);
                                        while ($row = mysqli_fetch_array($runQuery, MYSQLI_ASSOC)) {
                                            echo "<option value='{$row['UserIdno']}'>{$row['Username']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="grouped fields">
                                <div class="field">
                                    <label>Desired Account Action</label>
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="accountaction" value="deactivate">
                                        <label>Deactivate Account</label>
                                    </div>
                                </div>

                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="accountaction" value="updateowner">
                                            <label>Update Ownership</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Select New Owner</label>
                                        <select name="newowner" id="newowner" class="ui search dropdown">
                                            <option value="">Select a New Owner</option>
                                            <?php
                                                require_once('../mysql_connect.php');
                                                $query = "SELECT EmployeeNo, Name, EmployeePosition
                                                            FROM employee
                                                           WHERE EmployeePosition != 'Worker'";
                                                $runQuery = mysqli_query($dbc, $query);
                                                while ($row = mysqli_fetch_array($runQuery, MYSQLI_ASSOC)) {
                                                    echo "<option value='{$row['EmployeeNo']}'>{$row['Name']}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="accountaction" value="updatecreds">
                                            <label>Update Credentials</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Enter New Username</label>
                                        <input type="updatedusername" name="updatedusername" id="updatedusername" placeholder="Enter New Username"></input>
                                    </div>
                                    <div class="field">
                                        <label>Enter New Password</label>
                                        <input type="updatedpassword1" name="updatedpassword1" id="updatedpassword1" placeholder="Enter New Password"></input>
                                    </div>
                                    <div class="field">
                                        <label>Confirm New Password</label>
                                        <input type="updatedpassword2" name="updatedpassword1" id="updatedpassword1" placeholder="Confirm New Password"></input>
                                    </div>

                            </div>
                            <button class="positive ui button primary" type="submit" name="submit2">Submit</button>
                        </form>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>


    <!-- MAIN CONTENT END -->
    <script src="../dashboard.js"></script>
    <script type="text/javascript">
        $('#updateaccount')
            .form({
            inline: true,
            fields: {
                existingaccount: {
                identifier: 'existingaccount',
                rules: [
                    {
                    type   : 'empty',
                    prompt : 'You must choose an existing account.'
                    }
                ]
                },
                accountaction: {
                identifier: 'accountaction',
                rules: [
                    {
                    type   : 'checked',
                    prompt : 'You must select an account action.'
                    }
                ]
                }
            }
            })
        ;
        $('#addaccount')
            .form({
            inline: true,
            fields: {
                accountowner: {
                identifier: 'accountowner',
                rules: [
                    {
                    type   : 'empty',
                    prompt : 'You must choose an account owner.'
                    }
                ]
                },
                username: {
                identifier: 'username',
                rules: [
                    {
                    type   : 'empty',
                    prompt : 'You must enter a username.'
                    }
                ]
                },
                password1: {
                identifier: 'password1',
                rules: [
                    {
                    type   : 'empty',
                    prompt : 'You must enter a password.'
                    },
                    {
                    type   : 'match[password2]',
                    prompt : 'Your password cannot be different.'
                    }
                ]
                },
                password2: {
                identifier: 'password2',
                rules: [
                    {
                    type   : 'empty',
                    prompt : 'You must enter a password.'
                    },
                    {
                    type   : 'match[password1]',
                    prompt : 'Your password cannot be different.'
                    }
                ]
                },
                accounttype: {
                identifier: 'accounttype',
                rules: [
                    {
                    type   : 'checked',
                    prompt : 'You must choose an account type.'
                    }
                ]
                }
            }
            })
        ;
    </script>

</body>

</html>