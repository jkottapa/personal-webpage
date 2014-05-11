<style type="text/css">
    .style1
    {
        font-family: Aharoni;
    }
</style>
<div id="assignment">			
	<?php if(isset($_SERVER['PHP_SELF'])) 
		{
			$PHP_SELF=$_SERVER['PHP_SELF'];
		}
	?>
 <p class="style1"> The following program is a interpreter for set language.&nbsp; I 
     had to code it as an assingment.
     It interprets the input into known form for a calculator for sets.
     I used PHP to coordinate the program and your input.</p>
    <p> Useful Syntax: </p>
     <strong><code> set -> Assign's the varable <br>
            output -> Outputs the variable<br>
            + -> Add sets together<br>
            - -> Subtracts sets together<br>
            * -> Multiplies sets together<br>
            ; -> Defines the end of a line<br>
            Important: Please look at the example input provided below<br>
          </code></strong>
    <p> Example input: </p>
     <strong><code> set d = { "a" "b" "c" }; <br>
            output d;<br>
            set a = { "a" };<br>
            set abc = ({"abc"}+{"bcd"});<br>
            output abc;<br>
            set b = a * d * abc + abc + d * { "z" };<br>
            output z;<br>
            set c = { "9" "2" } ;<br>
            set u = c + a - a + d;<br>
            set tester = b * c + d * b + a + u + abc - c;<br>
            output tester;<br>
      set numbers = { 1 2 3 4 5 6 7 8 9 };
      output numbers;
            print "it works";<br>
          </code></strong>
     This Results in:
 
     <?php 
     	exec("./dvr sl.txt &", $output);
	    foreach($output as $line)
	    {
	        echo $line;
	        echo "<br />";
	    }
    ?>
	<br /><br />
    <div id="result">Your Results</div>
    <br /> <strong> Your Input goes here </strong>
	<textarea cols="70" rows="5" id="code" name="input" wrap="virtual"></textarea>
	<input type="button" id="userinput" value="Submit" />	
</div>
<script type="text/javascript">
		
	$("#userinput").click(function() {
		var input = $("#code").val().replace(/\s/g,"%20");			
		$("#result").load("index.php?action=interpreter&input="+input, function(response) {			
			$("#result").html = "<br />Your Results<br />"+response;
		});
	});
</script>
