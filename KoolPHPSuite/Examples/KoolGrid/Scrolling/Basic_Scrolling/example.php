<?php
	/*
	 * This file is ready to run as standalone example. However, please do:
	 * 1. Add tags <html><head><body> to make a complete page
	 * 2. Change relative path in $KoolControlFolder variable to correctly point to KoolControls folder 
	 */

	$KoolControlsFolder = "../../../../KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder
	
	require $KoolControlsFolder."/KoolAjax/koolajax.php";
	$koolajax->scriptFolder = $KoolControlsFolder."/KoolAjax";

	require $KoolControlsFolder."/KoolGrid/koolgrid.php";
	require $KoolControlsFolder."/KoolGrid/ext/datasources/MySQLiDataSource.php";
	$ds = new MySQLiDataSource($db_con);//This $db_con link has been created inside KoolPHPSuite/Resources/runexample.php
	$ds->SelectCommand = "select customerNumber,customerName,phone,addressLine1, city, country from customers";

	$grid = new KoolGrid("grid");
	$grid->scriptFolder = $KoolControlsFolder."/KoolGrid";
	$grid->styleFolder="sunset";
	$grid->DataSource = $ds;
	$grid->AjaxEnabled = true;
	$grid->AllowFiltering = true;

	$grid->AllowResizing = true;
	$grid->Width = "655px";
	$grid->PageSize = 20;
	$grid->RowAlternative = true;
	$grid->AllowScrolling = true;
	$grid->MasterTable->Height = "300px";
	$grid->MasterTable->ColumnWidth = "200px";

	$grid->AutoGenerateColumns = true;
		
	$grid->MasterTable->Pager = new GridPrevNextAndNumericPager();	
	$grid->Process();
?>

<form id="form1" method="post">
	<?php echo $koolajax->Render();?>
	<?php echo $grid->Render();?>
	<div style="margin-top:10px;"><i>* <u>Note</u>:</i>Generate your own grid with <a style="color:#B8305E;" target="_blank" href="http://codegen.koolphp.net/grid/">Code Generator</a></div>
	
</form>
