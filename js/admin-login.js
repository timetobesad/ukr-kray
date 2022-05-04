var hideNotif = undefined;

$(document).ready(function(){
	
	$('#loginButton').click(function(){
		
		$.ajax({
		
			type: 'POST',
			url: 'action/admin-login.php',
			data: { key: $('#key').val() },
			success: function(response){
				
				console.log(response);
				
				if(response.toLowerCase().trim() === 'open')
					window.location.reload();

				showError();
				$('#key').val('');
			}
		});
		
	});
	
});

function showError()
{
	hideNotif = null;
		
	var audio = $('#notifPlayer')[0];
		
	audio.pause();
	audio.currentTime = 0;
	audio.play();
		
	$('#errorNotif').css('display', 'none');
	$('#errorNotif').show('fade', 500);
	
	hideNotif = setTimeout(function(){
			
		$('#errorNotif').hide('fade', 500);
		
	}, 2000);
}