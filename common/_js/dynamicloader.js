// Author: Jayanth Kottapalli

function loadPage(id, action)
{	
	$(id).clearQueue();
	$.ajax({
			url : "index.php?action=" + action,

			type : 'GET',

			success : function (data) {
				$(id).slideUp(1500, function(){
					$(id).html(data);
				}).slideDown(1500);
			},

			error : function (data) {				
				console.log('fail');
				console.log(data);
			}
		});	
}
