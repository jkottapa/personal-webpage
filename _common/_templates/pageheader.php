<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="keywords" content="checklist,cs,uwaterloo,fillable" />
<title><?php echo ($this->moduleName == '')? $this->moduleName . " " : ""; echo $this->pageName; ?></title>
<link rel="stylesheet" href="_common/_styles/styles.css" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<?php
// Include additional stylesheets (if necessary)
foreach ($this->styleSheets as $i => $styleSheet)
{
?>
	<link type="text/css" rel="stylesheet" href="<?php echo $styleSheet; ?>" />
<?php
}

// Include additional javascript files (if necessary)
foreach ($this->javascriptFiles as $i => $javascriptFile)
{ 
?>
	<script type="text/javascript" src="<?php echo $javascriptFile; ?>"></script>
<?php 
}
?>
<meta name="google-site-verification" content="CnXvlM_hJKyCOPaR3QUrjREvQuTntDnd6kV-mnHE518" />
<script type='text/javascript'>
	$(document).ready(loadPage);
</script>
</head>
<body>
<h1> Select your checklist: </h1>
<select id="checklist_options" onchange="loadPage();">  
  <option value="bcs">BCS Checklist</option>
  <!-- <option value="bcs_bus">BCS/BUS Option</option>
  <option value="bcs_se">BCS/SE Option</option>   -->
</select>

