<div id="page">
	<h3> Please sign off in my Guestbook </h3>
	<p> This simple guestbook was written using PHP, jQuery and a C++ program. </p>			
	
	<div id='textarea'>
	<h4>Enter your note below</h4>
		Name: <textarea cols="20" rows="1.5" name="name" wrap="virtual"></textarea> <br />
		Text: <textarea style="width: 100%;" rows="5" name="note" wrap="virtual"></textarea>
	<input type="button" value="Submit Post" id="comments" />
	</div>
	<div id="comments-area">&nbsp;</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#comments-area").load("index.php?action=comments");
	});
	$("#comments").click(function(){
		var name = $("[name='name']").val().replace(/\s/g,"%20");
		var note = $("[name='note']").val().replace(/\s/g,"%20");
		$("#comments-area").load("index.php?action=comments&name="+name+"&note="+note);
		$("[name='name']").val("");
		$("[name='note']").val("");
		alert("Thank you! Your comments have been received.");
	});
</script>	
</div>