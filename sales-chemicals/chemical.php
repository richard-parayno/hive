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
	ob_start();
	session_start();
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
						<div class="active section">Chemical Inventory</div>
					</div>
				</div>
				<div class="right menu ">
					
				</div>
			</div>
		</div>
		<!-- TOP BAR END -->
		<div class="ui basic padded segment">
			<div class="ui relaxed grid">

				<!-- SUBMIT 1 START -->
				<?php

					if (isset($_POST['submit1'])) {

						$productname= $_POST['productname'];
						$quantity= $_POST['quantity'];
						$volume= $_POST['volume'];
						$unitdescription= $_POST['unitdescription'];
						$chemicalbrand= $_POST['chemicalbrand'];

						require_once('../mysql_connect.php');
						$flag=1;
						$query="insert into inventory (ProductName,Quantity,Volume,Description,Status,ItemBrand) values ('{$productname}', '{$quantity}', '{$volume}','{$unitdescription}', 'Available', '{$chemicalbrand}')";
						$result=mysqli_query($dbc,$query);
						$message="Product Added!";
						
					}


					if (isset($_POST['submit2'])) {
						$amount= $_POST['amount'];
						if ($_POST['reason']== "Damaged") {
							$radior= $_POST['reason'];
							$req=1;

						}
						elseif ($_POST['reason']== "Expired") {
							$radior= $_POST['reason'];
							$req=2;
						}
						elseif ($_POST['reason'] == "Others") {
							$radior= $_POST['reason'];
							$req=3;
						}

						
						$productid = $_POST['removechemical'];
						$query="UPDATE inventory SET Quantity = Quantity - ".$amount." WHERE productid =".$productid;

						$result=mysqli_query($dbc,$query);

						if($req==1) {
							$qry1="UPDATE inventory SET reason_for_removal = 'Damaged' WHERE productid =".$productid;
							$r1=mysqli_query($dbc,$qry1);
						}
						elseif($req==2) {
							$qry2="UPDATE inventory SET reason_for_removal = 'Expired' WHERE productid =".$productid;
							$r2=mysqli_query($dbc,$qry2);
						}
						elseif($req==3) {
							$qry3="UPDATE inventory SET reason_for_removal = '{$others}' WHERE productid =".$productid;
							$r3=mysqli_query($dbc,$qry3);
						}

					}

					if (isset($_POST['submit3'])) {
						$amount= $_POST['amount'];
						require_once('../mysql_connect.php');
						$flag=1;
						$productid = $_POST['replenishchemical'];
						$query="UPDATE inventory SET quantity = quantity + '{$amount}' WHERE productid = \"{$productid}\"";
						$result=mysqli_query($dbc,$query);
						$message="Product Replenished";
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
					<div class="ui padded segment">
						<h3 class="ui centered header">Add Chemical</h3>
						<div class="ui divider">
						</div>
						<form id="addchemical" class="ui form" method="post" action="chemical.php">
							<div class="field">
								<label>Product Name</label>
								<input type="text" name="productname" placeholder="Product Name"/>
							</div>
							<div class="field">
								<div class="fields">
									<div class="eight wide field">
										<label>Quantity</label>
										<input type="number" name="quantity" placeholder="Quantity" />
									</div>
									<div class="eight wide field">
										<label>Volume</label>
										<input type="number" name="volume" placeholder="Volume"/>
									</div>
								</div>
							</div>
							<div class="field">
								<label>Unit Description</label>
								<input type = "text"  name="unitdescription" placeholder="Unit Description" />
							</div>
							<div class="field">
								<label>Chemical Brand</label>
								<input type="text" name="chemicalbrand" placeholder="Chemical Brand"/>
							</div>
							<button class="positive ui button primary" type="submit" name="submit1">Submit</button>
							<div class="ui error message"></div>
						</form>
					</div>
				</div>
				<!-- ADD CHEMICALS END -->

				<!-- REMOVE CHEMICALS START -->
				<div class="sixteen wide centered column chemical-remove">
					<div class="ui padded segment">
						<h3 class="ui centered header">Remove Chemicals</h3>
						<div class="ui divider">
						</div>
						<form id="removechemical" class="ui form" method="post" action="chemical.php">
							<div class="field">
								<label>Chemicals</label>
								<select name="removechemical" id="removechemical" class="ui search dropdown">
									<option value=''>Select Chemical to Remove</option>
									<?php
									$query="SELECT ProductID, ProductName FROM inventory";
									$result=mysqli_query($dbc,$query);
									while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										echo "<option value=".$row['ProductID'].">".$row['ProductName']."</option>";
									}
									?>
								</select>
							</div>
							<div class="field">
								<label>Amount</label>
								<input type="number" name="amount" placeholder="Amount"/>
							</div>
							<div class="grouped fields">
								<div class="field">
									<label>Reason for Removal</label>
									<div class="ui radio checkbox">
										<input type="radio" name="reason" value="Damaged">
										<label>Damaged</label>
									</div>
								</div>
								<div class="field">
									<div class="ui radio checkbox">
										<input type="radio" name="reason" value="Expired">
										<label>Expired</label>
									</div>
								</div>
								<div class="inline fields">
									<div class="field">
										<div class="ui radio checkbox">
											<input type="radio" name="reason" value="Others">
											<label>Others</label>
										</div>
									</div>
									<div class="six wide field">
										<input type="text" name="others" placeholder="Others"/>
									</div>
								</div>
							</div>
							<button class="positive ui button primary" type="submit" name="submit2">Submit</button>
							<div class="ui error message"></div>
						</form>
					</div>
				</div>
				<!-- REMOVE CHEMICALS END -->

				<!-- REPLENISH CHEMICALS START -->
				<div class="sixteen wide centered column chemical-replenish">
					<div class="ui padded segment">
						<h3 class="ui centered header">Replenish Chemical</h3>
						<div class="ui divider">
						</div>
						<form id="replenishchemical" class="ui form" method="post" action="chemical.php">
							<div class="field">
								<label>Chemicals</label>
								<select name="replenishchemical" id="replenishchemical" class="ui search dropdown">
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
								<input type="number" name="amount" placeholder="Amount" />
							</div>
							<!--<input type="submit" name="submit3" value="Submit">-->
							<button class="positive ui button primary" type="submit" name="submit3">Submit</button>
							<div class="ui error message"></div>
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
	<script type="text/javascript">
		$('#replenishchemical')
		.form({
			fields: {
				replenishchemical: {
					identifier: 'replenishchemical',
					rules: [
					{
						type   : 'empty',
						prompt : 'You must choose the chemical to replenish.'
					}
					]
				},
				amount: {
					identifier: 'amount',
					rules: [
					{
						type   : 'empty',
						prompt : 'You must enter the amount to add to the chemical.'
					}
					]
				}
			}
		})
		;
		$('#removechemical')
		.form({       
			fields: {
				removechemical: {
					identifier: 'removechemical',
					rules: [
					{
						type   : 'empty',
						prompt : 'You must choose the chemical to remove.'
					}
					]
				},
				amount: {
					identifier: 'amount',
					rules: [
					{
						type   : 'empty',
						prompt : 'You must enter the amount to remove from the chemical.'
					}
					]
				},
				reason: {
					identifier: 'reason',
					rules: [
					{
						type   : 'checked',
						prompt : 'You must choose the reason why you are removing the chemical.'
					}
					]
				}
			}
		})
		;
		$('#addchemical')
		.form({        
			fields: {
				productname: {
					identifier: 'productname',
					rules: [
					{
						type   : 'empty',
						prompt : 'You must enter the product name.'
					}
					]
				},
				quantity: {
					identifier: 'quantity',
					rules: [
					{
						type   : 'empty',
						prompt : 'You must enter the quantity.'
					}
					]
				},
				volume: {
					identifier: 'volume',
					rules: [
					{
						type   : 'empty',
						prompt : 'You must enter the volume.'
					}
					]
				},
				unitdescription: {
					identifier: 'unitdescription',
					rules: [
					{
						type   : 'empty',
						prompt : 'You must enter the unit description.'
					}
					]
				},
				chemicalbrand: {
					identifier: 'chemicalbrand',
					rules: [
					{
						type   : 'empty',
						prompt : 'You must enter the chemical brand.'
					}
					]
				}
			}
		})
		;
	</script>

</body>
</html>
