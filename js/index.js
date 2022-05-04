$(document).ready(function(){
	
	var rightMenu = $('#rightMenuBox');
	var rightMenuOpen = $('#rightMenuIcon');
	var rightMenuClose = $('#rightMenuCloseBtn');
	
	$('.dish').hover(function(){
		
		var img = $(this).find('img');
		var src = img.attr('src').replace('NORMAL', 'HOVER');
		
		img.attr('src', src);
		img.css('box-shadow', '26px 33px 28px 12px rgba(34, 60, 80, 0.2)');
		
	}, function(){
		
		var img = $(this).find('img');
		var src = img.attr('src').replace('HOVER', 'NORMAL');
		
		img.attr('src', src);
		img.css('box-shadow', 'none');
		
		
	});
	
	$('#rightMenuIcon').click(function(){
		
		rightMenu.show('shake', 500, function(){
			
			rightMenuClose.show();
			
		});
		
		rightMenuOpen.hide();
		
		$('#rightMenuContent').show('shake', 500);
		
	});
	
	rightMenuClose.click(function(){
		
		rightMenu.hide('shake', 500, function(){
			
			$('#rightMenuCloseBtn').hide();
			rightMenuOpen.show();
			
		});
		
	});
	
});