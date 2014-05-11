<?php 
	$name=$_GET['name'];
	$note=$_GET['note'];
	if(isset($note) && !empty($note)) 
	{
		if($note!="")
		{
			$fname=fopen("names.txt",'a') or die("can't open file");
			$fcomment = fopen("comments.txt", "a") or die("can't open file");
			if($name == '')
				$name = "Anonymous";
			$name = $name .  "\n";
			$comment= "\n" . $note . "$!";
			fwrite($fname,$name);
			fwrite($fcomment,$comment);
			fclose($fcomment);
			fclose($fname);
		}
	
	}
?>
	<h5>Current entries: </h5>
<?php
		$names = file("names.txt");
		exec("./greader", $comments);
		$comments = explode("$!", $comments[0]);
?>
	<table border=2 cellpadding=1 cellspacing=6 id="Guests">
		<th id="playlist"> Name </th>
		<th> Comment </th>
<?php				
		for($i = 0; $i < count($names); $i++)
		{
			$rowClass = $rowClass == 'evenrow' ? 'oddrow' : 'evenrow';
?>
			<tr class='<? echo $rowClass; ?>'>
                <td align="center"><? echo $names[$i]; ?> : </td>
                <td><? echo $comments[$i]; ?> </td>
            </tr>
<?php					
		}		
?>
      	</table>
<?php exit(); ?>
