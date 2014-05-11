<?php
	$data=$_GET['input'];	
	
	if(isset($data)) 
	{
		if($data!="")
		{
			$fp=fopen("input.txt",'w') or die("can't open file");
			fwrite($fp,$data);
			fclose($fp);
		}
	
	} 		
	if(isset($data))
	{
		exec("./remsp");
		exec("./dvr in.txt", $obj);
		exec("./copier");
		echo "**************************YOUR OUTPUT STARTS HERE!*****************************<br />";
        		foreach($obj as $in)
     		{
  	      			echo $in;
       	       echo "<br />";
				
		}
		echo "******************************OUTPUT ENDS HERE!*********************************";
	}
	$fp=fopen("input.txt",'w');
	fwrite($fp,"");
	fclose($fp);
	exit();
?>