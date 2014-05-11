<?php
session_start();
function getCommonHTMLFilePath()
{
	return 'common/';
}
class module
{
	protected $moduleName;	
	protected $pageName;
	protected $mandatoryJSFiles = array();
	protected $javascriptFiles = array();
	protected $styleSheets = array();

	public $size;
	public $rightMenuExists = false;
	public $leftMenuExists = false;

	public $leftMenus = array();
	public $rightMenus = array();

	// Creates an instance of the classes stswebdb() and ptswebdb().
	function __construct()
	{
		if(!empty($_GET))
		$this->sideRoundCornerWidth=200;
		else
		$this->sideRoundCornerWidth=191;
	}

	/*
	 Mandatory JavaScript Files Are Those That NEED TO BE LOADED Prior To Any Others
	 Example: jquery Needs To Be Loaded Before Any Plugins In Order For The Plugins To Work
	 */

	/*
	 If $ptsCommonFile=true the file will be included from the ptsCommon folder.
	 Else the file would be included from the stsweb folder.
	 */
	function addMandatoryJSFile($fileName, $ptsCommonFile = true)
	{
		if ($ptsCommonFile)
		{
			$commonFilePath = getCommonHTMLFilePath();
			$this->mandatoryJSFiles[] = $commonFilePath . "_js/" . $fileName;
		}
		else
		{
			$this->mandatoryJSFiles[] = $fileName;
		}
	}

	/*
	 adds javascript file. If $ptsCommonFile=true the file will be included from the ptsCommon folder.
	 Else the file would be included from the stsweb folder.
	 */

	function addJavascriptFile($fileName, $ptsCommonFile = true)
	{
		if ($ptsCommonFile)
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
	 addStyleSheet adds the .css file. If $ptsCommonFile=true the file will be included from the ptsCommon folder.
	 Else the file would be included from the stsweb folder.
	 */
	function addStyleSheet($fileName, $ptsCommonFile = true)
	{
		if ($ptsCommonFile)
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
		 addMandatoryJSFile adds important javascript files that contributes towards other aspects of the page. (ex. JQuery.js).
		 If $ptsCommonFile=true the file will be included from the ptsCommon folder. Else the file would be included from the stsweb folder.
		 */
		$this->addMandatoryJSFile("jquery.js");
		/*
		 addJavascriptFile adds javascript file. (ex. JQuery.js).
		 If $ptsCommonFile=true the file will be included from the ptsCommon folder. Else the file would be included from the stsweb folder.
		 */
		$this->addJavascriptFile("jquery_plugins/jquery.color.js");
		$this->addJavascriptFile("jquery_plugins/modalbox.js");
		$this->addJavascriptFile("jquery_plugins/linkhover.js");		
		$this->addJavascriptFile('jquery_plugins/jquery-ui-1.8.14.custom.min.js');
		$this->addJavascriptFile("dynamicloader.js");


		require("_templates/pageheader.php");//Loading the header image		
	}

	// endModule() � includes the footer of the sts pages. Uses two files within the _templates folder.
	function endModule()
	{		
		require("_templates/pagefooter.php");
	}
	// private variable accessor.
	function getSettingsFilePath(){
		return $this->settingsFilePath;
	}

	public function roundCornersStart($title, $width, $style)
	{
		if($width == "100%" || $width == "auto")
		$center = "";
		else
		$center = 'width = "' . ($width - 20) . '"';
		print '
			<table border="0" style="margin-bottom:5px;text-align:left;" cellpadding="0" cellspacing="0" width="' . $width . '">
				<tr>
					<td class="' . $style . '_topleft"></td>
					<td class="' . $style . '_top" ' . $center . '>' . $title . '</td>
					<td class="' . $style . '_topright"></td>
				</tr>
				<tr>
					<td class="' . $style . '_left"></td>
					<td class="' . $style . '_middle">';
	}

	public function roundCornersEnd($style)
	{
		print '
						</td>
					<td class="' . $style . '_right"></td>
				</tr>
				<tr>
					<td class="' . $style . '_bottomleft"></td>
					<td class="' . $style . '_bottom"></td>
					<td class="' . $style . '_bottomright"></td>
				</tr>
			</table>';
	}
	
	public function loadSelectValues($selectname, $arr, $idcolumn, $valuecolumn, $selectedvalue, $onchange = "")
	{
		print "<SELECT id='" . $selectname . "' name='" . $selectname . "'";
		if (!empty($onchange))
		{
			print " onchange=\"" . $onchange . "\"";
		}
		print ">";
		foreach ($arr as $arritem)
		{
			print '<OPTION value="' . $arritem[$idcolumn] . '"';
			if ($arritem[$idcolumn] == $selectedvalue)
			{
				print ' selected';
			}
			print '>' . $arritem[$valuecolumn] . '</OPTION>';
		}
		print '</SELECT>';
	}

	// gets the present page name.
	function getPageName()
	{
		$page['ModuleName'] = $this->moduleName;
		$page['PageName'] = $this->pageName;

		return $page;
	}
}

$module = new module();

?>
