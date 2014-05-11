// Author: Jayanth Kottapalli

function loadPage()
{	
	var action = $("#checklist_options option:selected").val();
	var id = "#page";
	$(id).clearQueue();
	$.ajax({
			url : "checklist_index.php?action=" + action,

			type : 'GET',

			success : function (data) {
				$(id).slideUp(1500, function(){
					$(id).html(data);
				}).slideDown(1500);
			},

			error : function (data) {				
				console.log('fail');
				console.log(data.responseText);
			}
		});	
}
