#!/usr/bin/php-cgi
<?php

	require('_common/module.php');

	$action = "";
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}

	switch ($action) {
		case 'bcs':
			require('_actions/bcschecklist.php');
			exit();
			break;
		case 'bcs_bus':
			require('_actions/bcs_buschecklist.php');
			exit();
			break;
		
		default:
			$module->loadModule("", "Computer Science Checkliest");
			require('_views/view_checklist_index.php');

			break;
	}

	$module->endModule();
?>