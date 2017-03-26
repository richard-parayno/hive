<?php
session_start();
require ('../mysql_connect.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title>Hive Resource Management System - Chemical Inventory</title>
	<link href="../bower_components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>
	<script src="../bower_components/semantic/dist/semantic.min.js"></script>
	<script src="../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
	<link href="../bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" type="text/css" />
	<link href="../bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" type="text/css" />
	<script src="../bower_components/moment/moment.js"></script>
	<script src="../bower_components/chained/jquery.chained.js"></script>
	<link href="../bower_components/semantic-ui-calendar/dist/calendar.min.css" rel="stylesheet" type="text/css" />
	<script src="../bower_components/semantic-ui-calendar/dist/calendar.min.js"></script>
	<link href="../style.css" rel="stylesheet" type="text/css"/>

</head>
<body>
	<!-- SIDEBAR START -->
	<?php
	require_once('../mysql_connect.php');
	if (!isset($_SESSION['currentUser'])) {
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
	}
	if ($_SESSION['currentType'] != 1) {
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
	}
	?>
	<div class="ui inverted left vertical sidebar menu" id="sidebar">
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
		<a class="item" href="../sales-orders/create-service-requests.php">
			Create Service Requests
		</a>
		<a class="item" href="../sales-orders/reschedule-service-requests.php">
			Reschedule Service Requests
		</a>
		<a class="item" href="chemical.php">
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
		<!-- TOP BAR START-->
		<div class="sixteen wide column">
			<div class="ui top menu">
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
						<div class="active section">Chemical Inventory</div>
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

				<!-- SUBMIT 1 START -->
				<?php
				$flag=0;
				if (isset($_POST['submit1']))
				{
					$message=NULL;
					if (empty($_POST['product-name']))
					{
						$productname=FALSE;
						$message.='You forgot to input the product name!';
					}
					else $productname= $_POST['product-name'];

					if (empty($_POST['quantity']))
					{
						$quantity=FALSE;
						$message.='You forgot to input the quantity!';
					}
					else $quantity= $_POST['quantity'];

					if (empty($_POST['volume']))
					{
						$volume=FALSE;
						$message.='You forgot to input the volume!';
					}
					else $volume= $_POST['volume'];

					if (empty($_POST['unit-description']))
					{
						$unitdescription=FALSE;
						$message.='You forgot to input the unit description!';
					}
					else $unitdescription= $_POST['unit-description'];

					if (empty($_POST['chemical-brand']))
					{
						$chemicalbrand=FALSE;
						$message.='You forgot to input the chemical-brand!';
					}
					else $chemicalbrand= $_POST['chemical-brand'];

					if(!isset($message))
					{
						require_once('../mysql_connect.php');
						$flag=1;
						$query="insert into inventory (ProductName,Quantity,Volume,Description,Status,ItemBrand) values ('{$productname}', '{$quantity}', '{$volume}','{$unitdescription}', 'Available', '{$chemicalbrand}')";
						$result=mysqli_query($dbc,$query);
						$message="Product Added!";
					}
				}

				if (isset($message))
				{
					echo "<script type='text/javascript'> alert('{$message}'); </script>";
				}

				#SUBMIT 1 END
				?>
				<?php
				# SUBMIT 2 START

				$flag=0;
				if (isset($_POST['submit2']))
				{
					$message=NULL;

					if (empty($_POST['amount']))
					{
						$amount=FALSE;
						$message.='You forgot to input the amount!';
					}
					else $amount= $_POST['amount'];

					if (empty($_POST['reason']))
					{
						$radio=false;
						$req = false;
						$message.= 'You forgot to input what reason!';

					}
					elseif ($_POST['reason']== "Damaged")
					{
						$radior= $_POST['reason'];
						$req=1;

					}
					elseif ($_POST['reason']== "Expired")
					{
						$radior= $_POST['reason'];
						$req=2;
					}
					elseif ($_POST['reason'] == "Others")
					{
						$radior= $_POST['reason'];
						$req=3;
					}

					if(!isset($message))
					{
						$flag=1;
						$productid = $_POST['remove_chemical'];
						$query="UPDATE inventory SET Quantity = Quantity - ".$amount." WHERE productid =".$productid;

						$result=mysqli_query($dbc,$query);

						if($req==1)
						{
							$qry1="UPDATE inventory SET reason_for_removal = 'Damaged' WHERE productid =".$productid;
							$r1=mysqli_query($dbc,$qry1);
						}
						elseif($req==2)
						{
							$qry2="UPDATE inventory SET reason_for_removal = 'Expired' WHERE productid =".$productid;
							$r2=mysqli_query($dbc,$qry2);
						}
						elseif($req==3)
						{
							$qry3="UPDATE inventory SET reason_for_removal = '{$others}' WHERE productid =".$productid;
							$r3=mysqli_query($dbc,$qry3);
						}

						$message="Product Removed!";
					}
				}

				if (isset($message))
				{
					echo "<script type='text/javascript'> alert('{$message}'); </script>";
				}

				# SUBMIT 2 END
				?>

				<?php
				# SUBMIT 3 START

				$flag=0;
				if (isset($_POST['submit3']))
				{
					$message=NULL;
					if (empty($_POST['amount']))
					{
						$amount=FALSE;
						$message.='You forgot to input the amount!';
					}
					else $amount= $_POST['amount'];

					if(!isset($message))
					{
						require_once('../mysql_connect.php');
						$flag=1;
						$productid = $_POST['replenish_chemical'];
						$query="UPDATE inventory SET quantity = quantity + '{$amount}' WHERE productid = \"{$productid}\"";
						$result=mysqli_query($dbc,$query);
						$message="Product Replenished";
					}
				}

				if (isset($message))
				{
					echo "<script type='text/javascript'> alert('{$message}'); </script>";

				}

				?>
				<!-- SUBMIT 3 END -->

				<!-- CLIENT TOGGLE START -->
				<div class="three wide centered column">
					<div class="ui padded segment">
						<h3 class="ui centered header">Choose an Action</h3>
						<div class="ui slider checkbox">
							<input type="radio" name="slide-client" id="slide-add">
							<label>Add Chemical</label>
						</div>
						<br></br>
						<div class="ui slider checkbox">
							<input type="radio" name="slide-client" id="slide-remove">
							<label>Remove Chemical</label>
						</div>
						<br></br>
						<div class="ui slider checkbox">
							<input type="radio" name="slide-client" id="slide-replenish">
							<label>Replenish Chemical</label>
						</div>
					</div>
				</div>
				<!-- CLIENT TOGGLE END -->

				<!-- ADD CHEMICALS START -->
				<div class="sixteen wide centered column chemical-add">
					<div class="ui basic padded segment">
						<h3 class="ui centered header">Add Chemical</h3>
						<div class="ui divider">
						</div>
						<form class="ui form" method="post" action="chemical.php">
							<div class="field">
								<label>Product Name</label>
								<input type="text" name="product-name" placeholder="Product Name" value="<?php if (isset($_POST['product-name']) && !$flag) echo $_POST['product-name']; ?>"/>
							</div>
							<div class="field">
								<div class="fields">
									<div class="eight wide field">
										<label>Quantity</label>
										<input type="number" name="quantity" placeholder="Quantity" value="<?php if (isset($_POST['quantity']) && !$flag) echo $_POST['quantity']; ?>"/>
									</div>
									<div class="eight wide field">
										<label>Volume</label>
										<input type="number" name="volume" placeholder="Volume" value="<?php if (isset($_POST['volume']) && !$flag) echo $_POST['volume']; ?>"/>
									</div>
								</div>
							</div>
							<div class="field">
								<label>Unit Description</label>
								<input type = "text"  name="unit-description" placeholder="Unit Description" value="<?php if (isset($_POST['unit-description']) && !$flag) echo $_POST['unit-description']; ?>" >
							</div>
							<div class="field">
								<label>Chemical Brand</label>
								<input type="text" name="chemical-brand" placeholder="Chemical Brand" value="<?php if (isset($_POST['chemical-brand']) && !$flag) echo $_POST['chemical-brand']; ?>"/>
							</div>
							<button class="ui button primary" type="submit" name="submit1">Submit</button>
							<!--<input type="submit" name="submit1" value="Submit">-->
						</form>
					</div>
				</div>
				<!-- ADD CHEMICALS END -->

				<!-- REMOVE CHEMICALS START -->
				<div class="sixteen wide centered column chemical-remove">
					<div class="ui basic padded segment">
						<h3 class="ui centered header">Remove Chemicals</h3>
						<div class="ui divider">
						</div>
						<form class="ui form" method="post" action="chemical.php">
							<div class="field">
								<label>Chemicals</label>
								<select name="remove_chemical" id="remove_chemical" class="ui search dropdown">
									<option value=''>Select Chemical to Remove</option>
									<?php
									$query="SELECT ProductID, ProductName FROM inventory";
									$result=mysqli_query($dbc,$query);
									while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
									{
										echo "<option value=".$row['ProductID'].">".$row['ProductName']."</option>";
									}
									?>
								</select>
							</div>
							<div class="field">
								<label>Amount</label>
								<input type="number" name="amount" placeholder="Amount" value="<?php if (isset($_POST['amount']) && !$flag) echo $_POST['amount']; ?>"/>
							</div>

							<div class="field">
								<label>reason for Removal</label>
								<div class="ui radio checkbox">
									<input type="radio" name="reason" <?php if (isset($Reason) && $Reason=="Damaged") echo "checked";?> value="Damaged">
									<label>Damaged</label>
								</div>
								<br></br>
								<div class="ui radio checkbox">
									<input type="radio" name="reason" <?php if (isset($Reason) && $Reason=="Expired") echo "checked";?> value="Expired">
									<label>Expired</label>
								</div>
								<br></br>

								<div class="ui radio checkbox">
									<input type="radio" name="reason"<?php if (isset($Reason) && $Reason=="Others") echo "checked";?> value="Others">
									<label>Others</label>

								</div>
								<br></br>
								<div class="six wide field">
									<input type="text" name="others" placeholder="Others" value="<?php if (isset($_POST['others']) && !$flag) echo $_POST['others']; ?>"/>
								</div>
								<br></br>

							</div>
							<!--<input type="submit" name="submit2" value="Submit">-->
							<button class="ui button primary" type="submit" name="submit2">Submit</button>
						</form>
					</div>
				</div>
				<!-- REMOVE CHEMICALS END --	>

				<!-- REPLENISH CHEMICALS START -->
				<div class="sixteen wide centered column chemical-replenish">
					<div class="ui basic padded segment">
						<h3 class="ui centered header">Replenish Chemical</h3>
						<div class="ui divider">
						</div>
						<form class="ui form" method="post" action="chemical.php">
							<div class="field">
								<label>Chemicals</label>
								<select name="replenish_chemical" id="replenish_chemical" class="ui search dropdown">
									<option value=''>Select Chemical to Replenish</option>
									<?php
									$query="SELECT ProductID, ProductName from inventory";
									$result=mysqli_query($dbc,$query);
									while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
									{
										echo "<option value=\"{$row['ProductID']}\">{$row['ProductName']}</option>";
									}
									?>
								</select>
							</div>
							<div class="field">
								<label>Amount</label>
								<input type="number" name="amount" placeholder="Amount" value="<?php if (isset($_POST['amount']) && !$flag) echo $_POST['amount']; ?>"/>
							</div>
							<!--<input type="submit" name="submit3" value="Submit">-->
							<button class="ui button primary" type="submit" name="submit3">Submit</button>
						</form>
					</div>
				</div>
				<!-- REPLENISH CHEMICALS END -->
			</div>
		</div>
	</div>


	<!-- MAIN CONTENT END -->

	<!-- scripts -->
	<script src="../dashboard.js"></script>

</body>
</html>
