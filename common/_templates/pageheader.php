<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Jayanth Kottapalli - <?php echo ($this->moduleName == '')? $this->moduleName . " - " : ""; echo $this->pageName; ?></title>
<link rel="stylesheet" href="common/_styles/styles.css" type="text/css" />
<?php
// Include additional stylesheets (if necessary)
foreach ($this->styleSheets as $i => $styleSheet)
{
?>
	<link type="text/css" rel="stylesheet" href="<?php echo $styleSheet; ?>" />
<?php
}

//Include Required JavaScript Files
foreach ($this->mandatoryJSFiles as $i => $javascriptFile)
{ 
?>
	<script type="text/javascript" src="<?php echo $javascriptFile; ?>"></script>
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
</head>
<body>
<div id="container">
	<div id="header">
		<h1><?php echo ($this->moduleName == '')? 'Jayanth Kottapalli' : $this->moduleName; ?></h1>
<?php if($this->moduleName == '')
		{
?>	
		<p align="middle">	
			<marquee behavior="scroll" direction="left" onMouseover="this.stop();" onMouseout="this.start();">Welcome to my webpage! Feel free to browse around</marquee>
		</p>
<?php
		}
?>
	</div>
	<div id="nav">
		<ul>
			<li><a href="index.php" class="selected" title="Home Page"><strong>Home</strong></a></li>
			<li><a href="index.php?action=resume" title="Click to view my resume"><strong>Resume</strong></a></li>			
			<li><a href="#" onclick="loadPage('#page', 'aboutme'); return false;" title="About Me"><strong>About Me</strong></a></li>
			<!--<li><a href="index.php?action=videos" title="Videos"><strong>Videos</strong></a></li>-->
			<li><a href="#" onclick="loadPage('#page', 'assignment'); return false;"title="Assignments"><strong>Projects/Assignments</strong></a></li>
			<li><a href="#" onclick="loadPage('#page', 'artwork'); return false;" title="Photoshop & Illustrator work"><strong>Art Work</strong></a></li>			
		</ul>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
		<p>
			<script type="text/javascript"> function show_alert() {window.alert("Sorry, still working on the algorithm!");}</script>
			<input type="text" name="q" value="Search..."/>
			<input type="submit"	onclick="show_alert()" class="button"/>
		</p>
		 </form>		
	</div>
	<div id="content">
