#!/usr/bin/php-cgi
<?php
	require('common/module.php');
	
	$action = "";
	if(isset($_GET['action']))
		$action = $_GET['action'];
	
	switch ($action) {
		case 'videos':
			require('google_analytics/googleanalytics.php');
			require('actions/video.php');
			break;
		case 'aboutme':
			require('google_analytics/googleanalytics.php');
			require('actions/aboutme.php');
			exit();
			break;
		case 'assignment':
			require('google_analytics/googleanalytics.php');
			require('actions/assignment.php');
			exit();
			break;
		case 'artwork':
			require('google_analytics/googleanalytics.php');
			require('actions/artwork.php');
			exit();
			break;
		case 'resume':
			require('actions/resume.php');
			break;
		case 'comments':
			require('views/comments.php');
			break;
		case 'interpreter':
			require('views/interpreter.php');
			break;				
		default:
			$module->loadModule("", "University of Waterloo");
?>
			<script type="text/javascript">
			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', 'UA-21535313-1']);
			  _gaq.push(['_trackPageview']);
			
			  (function() {
			    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();
			</script>
<?php
			require('views/view_index.php');
			break;
	}
	
	$module->endModule();
?>