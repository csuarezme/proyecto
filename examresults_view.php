<?php
// This script and data application were generated by AppGini 5.70
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/examresults.php");
	include("$currDir/examresults_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('examresults');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "examresults";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`examresults`.`id`" => "id",
		"IF(    CHAR_LENGTH(`students1`.`FullName`), CONCAT_WS('',   `students1`.`FullName`), '') /* Student */" => "student",
		"IF(    CHAR_LENGTH(`students1`.`RegNo`), CONCAT_WS('',   `students1`.`RegNo`), '') /* RegNo */" => "RegNo",
		"IF(    CHAR_LENGTH(`classes1`.`Name`), CONCAT_WS('',   `classes1`.`Name`), '') /* Class */" => "Class",
		"IF(    CHAR_LENGTH(`streams1`.`Name`), CONCAT_WS('',   `streams1`.`Name`), '') /* Stream */" => "Stream",
		"IF(    CHAR_LENGTH(`examcategories1`.`Name`), CONCAT_WS('',   `examcategories1`.`Name`), '') /* Category */" => "Category",
		"IF(    CHAR_LENGTH(`subjects1`.`Name`), CONCAT_WS('',   `subjects1`.`Name`), '') /* Subject */" => "Subject",
		"`examresults`.`Marks`" => "Marks",
		"IF(    CHAR_LENGTH(`sessions1`.`Year`), CONCAT_WS('',   `sessions1`.`Year`), '') /* Term */" => "Term",
		"IF(    CHAR_LENGTH(`sessions2`.`Year`) || CHAR_LENGTH(`sessions2`.`Term`), CONCAT_WS('',   `sessions2`.`Year`, ' :Term ', `sessions2`.`Term`), '') /* AcademicYear */" => "AcademicYear"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`examresults`.`id`',
		2 => '`students1`.`FullName`',
		3 => '`students1`.`RegNo`',
		4 => 4,
		5 => 5,
		6 => '`examcategories1`.`Name`',
		7 => '`subjects1`.`Name`',
		8 => '`examresults`.`Marks`',
		9 => '`sessions1`.`Year`',
		10 => 10
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`examresults`.`id`" => "id",
		"IF(    CHAR_LENGTH(`students1`.`FullName`), CONCAT_WS('',   `students1`.`FullName`), '') /* Student */" => "student",
		"IF(    CHAR_LENGTH(`students1`.`RegNo`), CONCAT_WS('',   `students1`.`RegNo`), '') /* RegNo */" => "RegNo",
		"IF(    CHAR_LENGTH(`classes1`.`Name`), CONCAT_WS('',   `classes1`.`Name`), '') /* Class */" => "Class",
		"IF(    CHAR_LENGTH(`streams1`.`Name`), CONCAT_WS('',   `streams1`.`Name`), '') /* Stream */" => "Stream",
		"IF(    CHAR_LENGTH(`examcategories1`.`Name`), CONCAT_WS('',   `examcategories1`.`Name`), '') /* Category */" => "Category",
		"IF(    CHAR_LENGTH(`subjects1`.`Name`), CONCAT_WS('',   `subjects1`.`Name`), '') /* Subject */" => "Subject",
		"`examresults`.`Marks`" => "Marks",
		"IF(    CHAR_LENGTH(`sessions1`.`Year`), CONCAT_WS('',   `sessions1`.`Year`), '') /* Term */" => "Term",
		"IF(    CHAR_LENGTH(`sessions2`.`Year`) || CHAR_LENGTH(`sessions2`.`Term`), CONCAT_WS('',   `sessions2`.`Year`, ' :Term ', `sessions2`.`Term`), '') /* AcademicYear */" => "AcademicYear"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`examresults`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`students1`.`FullName`), CONCAT_WS('',   `students1`.`FullName`), '') /* Student */" => "Student",
		"IF(    CHAR_LENGTH(`students1`.`RegNo`), CONCAT_WS('',   `students1`.`RegNo`), '') /* RegNo */" => "RegNo",
		"IF(    CHAR_LENGTH(`classes1`.`Name`), CONCAT_WS('',   `classes1`.`Name`), '') /* Class */" => "Class",
		"IF(    CHAR_LENGTH(`streams1`.`Name`), CONCAT_WS('',   `streams1`.`Name`), '') /* Stream */" => "Stream",
		"IF(    CHAR_LENGTH(`examcategories1`.`Name`), CONCAT_WS('',   `examcategories1`.`Name`), '') /* Category */" => "Category",
		"IF(    CHAR_LENGTH(`subjects1`.`Name`), CONCAT_WS('',   `subjects1`.`Name`), '') /* Subject */" => "Subject",
		"`examresults`.`Marks`" => "Marks",
		"IF(    CHAR_LENGTH(`sessions1`.`Year`), CONCAT_WS('',   `sessions1`.`Year`), '') /* Term */" => "Term",
		"IF(    CHAR_LENGTH(`sessions2`.`Year`) || CHAR_LENGTH(`sessions2`.`Term`), CONCAT_WS('',   `sessions2`.`Year`, ' :Term ', `sessions2`.`Term`), '') /* AcademicYear */" => "AcademicYear"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`examresults`.`id`" => "id",
		"IF(    CHAR_LENGTH(`students1`.`FullName`), CONCAT_WS('',   `students1`.`FullName`), '') /* Student */" => "student",
		"IF(    CHAR_LENGTH(`students1`.`RegNo`), CONCAT_WS('',   `students1`.`RegNo`), '') /* RegNo */" => "RegNo",
		"IF(    CHAR_LENGTH(`classes1`.`Name`), CONCAT_WS('',   `classes1`.`Name`), '') /* Class */" => "Class",
		"IF(    CHAR_LENGTH(`streams1`.`Name`), CONCAT_WS('',   `streams1`.`Name`), '') /* Stream */" => "Stream",
		"IF(    CHAR_LENGTH(`examcategories1`.`Name`), CONCAT_WS('',   `examcategories1`.`Name`), '') /* Category */" => "Category",
		"IF(    CHAR_LENGTH(`subjects1`.`Name`), CONCAT_WS('',   `subjects1`.`Name`), '') /* Subject */" => "Subject",
		"`examresults`.`Marks`" => "Marks",
		"IF(    CHAR_LENGTH(`sessions1`.`Year`), CONCAT_WS('',   `sessions1`.`Year`), '') /* Term */" => "Term",
		"IF(    CHAR_LENGTH(`sessions2`.`Year`) || CHAR_LENGTH(`sessions2`.`Term`), CONCAT_WS('',   `sessions2`.`Year`, ' :Term ', `sessions2`.`Term`), '') /* AcademicYear */" => "AcademicYear"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'student' => 'Student', 'Category' => 'Category', 'Subject' => 'Subject', 'Term' => 'Term');

	$x->QueryFrom = "`examresults` LEFT JOIN `students` as students1 ON `students1`.`id`=`examresults`.`student` LEFT JOIN `examcategories` as examcategories1 ON `examcategories1`.`id`=`examresults`.`Category` LEFT JOIN `subjects` as subjects1 ON `subjects1`.`id`=`examresults`.`Subject` LEFT JOIN `sessions` as sessions1 ON `sessions1`.`id`=`examresults`.`Term` LEFT JOIN `classes` as classes1 ON `classes1`.`id`=`students1`.`Class` LEFT JOIN `streams` as streams1 ON `streams1`.`id`=`students1`.`Stream` LEFT JOIN `sessions` as sessions2 ON `sessions2`.`id`=`students1`.`AcademicYear` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "examresults_view.php";
	$x->RedirectAfterInsert = "examresults_view.php?SelectedID=#ID#";
	$x->TableTitle = "Resultados de Examen";
	$x->TableIcon = "resources/table_icons/application_view_columns.png";
	$x->PrimaryKey = "`examresults`.`id`";
	$x->DefaultSortField = '1';
	$x->DefaultSortDirection = 'desc';

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("Estudiante", "No Registro", "Clase", "Escuela", "Categoria", "Materia", "Marcas", "Termino", "A??o Acad??mico");
	$x->ColFieldName = array('student', 'RegNo', 'Class', 'Stream', 'Category', 'Subject', 'Marks', 'Term', 'AcademicYear');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7, 8, 9, 10);

	// template paths below are based on the app main directory
	$x->Template = 'templates/examresults_templateTV.html';
	$x->SelectedTemplate = 'templates/examresults_templateTVS.html';
	$x->TemplateDV = 'templates/examresults_templateDV.html';
	$x->TemplateDVP = 'templates/examresults_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `examresults`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='examresults' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `examresults`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='examresults' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`examresults`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: examresults_init
	$render=TRUE;
	if(function_exists('examresults_init')){
		$args=array();
		$render=examresults_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: examresults_header
	$headerCode='';
	if(function_exists('examresults_header')){
		$args=array();
		$headerCode=examresults_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: examresults_footer
	$footerCode='';
	if(function_exists('examresults_footer')){
		$args=array();
		$footerCode=examresults_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>