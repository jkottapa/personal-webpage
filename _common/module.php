<?php
// Author: Jayanth Kottapalli
session_start();
function getCommonHTMLFilePath()
{
	return '_common/';
}
class module
{
	protected $moduleName;	
	protected $pageName;	
	protected $javascriptFiles = array();
	protected $styleSheets = array();	

	// Creates an instance of the classes for each of the 
	function __construct()
	{
		// intentionally empty
	}
	
	/*
	 adds javascript file. If $isCommonFile=true the file will be included from the _common folder.
	 Else the file would be included from whatever folder is provided.
	 */

	function addJavascriptFile($fileName, $isCommonFile = true)
	{
		if ($isCommonFile)
		{
			// getCommonHTMLFilePath() gets the files path of the settings.inc.php
			$commonFilePath = getCommonHTMLFilePath();
			$this->javascriptFiles[] = $commonFilePath . "_js/" . $fileName;
		}
		else
		{
			$this->javascriptFiles[] = $fileName;
		}
	}

	/*
	 addStyleSheet adds the .css file. If $isCommonFile=true the file will be included from the _common folder.
	 Else the file would be included from whatever folder is provided.
	 */
	function addStyleSheet($fileName, $isCommonFile = true)
	{
		if ($isCommonFile)
		{
			$commonFilePath = getCommonHTMLFilePath();
			$this->styleSheets[] = $commonFilePath . "_styles/" . $fileName;
		}
		else
		{
			$this->styleSheets[] = $fileName;
		}
	}
	/*
	 This is a function within the class-module. loadModule has many functions used within itself.
	 This helps get the HTML content of the particular module. $quickLoad set to true, loads only specific content.
	 */
	function loadModule($moduleName, $pageName="")
	{
		
		$this->moduleName = $moduleName;
		$this->pageName = $pageName;
				
		/*
		 addJavascriptFile adds javascript file. (ex. JQuery.js).
		 If $isCommonFile=true the file will be included from the 
		 */
		$this->addJavascriptFile("jquery-cookie/jquery.cookie.js");		
		$this->addJavascriptFile("dynamicloader.js");
		$this->addJavascriptFile("checklistcookie.js");


		require("_templates/pageheader.php");//Loading the header image		
	}

	// endModule() � includes the footer of the webpages. Uses two files within the _templates folder.
	function endModule()
	{		
		require("_templates/pagefooter.php");
	}
	
}

$module = new module();

?>
