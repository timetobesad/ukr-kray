var timeHide = 300;

$(document).ready(function(){
	
	$('#addDishBtn').click(function(){
		
		$('#addDishBox').fadeIn(timeHide);
		$('#bgFon').fadeIn(timeHide);
		$('#closeBtn').fadeIn(timeHide);
		
	});
	
	$('#closeBtn').click(function(){
		
		$('#addDishBox').fadeOut(timeHide, function(){
		
			$('.inputNewDish').each(function(){
				
				$(this).val('').text('');
				
			});
		
		});
		
		$('#bgFon').fadeOut(timeHide);
		$('#closeBtn').fadeOut(timeHide);
		
	});
	
	$('#addDishComplBtn').click(function(){
		
		// check for empty field
		
		var info = {  };
		
		$('#addDishBox').find('input[type=label],textarea').each(function(){
			
			info[$(this).attr('name')] = $(this).val();
			
		})
		
		var data = { 'action':'add', 'info':info };
		
		console.log(data); return;
		
		$.ajax({
			
			type: 'POST',
			url: 'action/dish.php',
			data: data,
			success: function(response){
				
			}
			
		});
		
	});
	
});