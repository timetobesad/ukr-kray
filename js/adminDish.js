var timeFade = 300;

var cropStartX;
var cropStartY;

var isCropping = false;

var cropHandle;

$(document).ready(function(){
	
	cropHandle = $('#cropHandle');
	
	$('#addDishBtn').click(function(){
		
		$('#addDishBox').fadeIn(timeFade);
		$('#bgFon').fadeIn(timeFade);
		$('#closeBtn').fadeIn(timeFade);
		
	});
	
	$('#closeBtn').click(function(){
		
		$('#addDishBox').fadeOut(timeFade, function(){
		
			$('.inputNewDish').each(function(){
				
				$(this).val('').text('').removeClass('succInput').removeClass('errInput');
				
			});
		
		});
		
		$('#bgFon').fadeOut(timeFade);
		$('#closeBtn').fadeOut(timeFade);
		
	});
	
	$('#addDishComplBtn').click(addDishEvent);
	
	$('#uplImgButton').click(uploadImageEvent);
	
	$('#uploadImgView').mousedown(function(e){
			
		e.preventDefault();
		startCrop(e);
		
	});
	
	$('#cropHandle').mousedown(function(e){

		e.preventDefault();
		startCrop(e);
		
	});
	
	$('#uploadImgView').mousemove(function(e){
		
		e.preventDefault();
		cropDragged(e);
		
	});
	
	$('#cropHandle').mousemove(function(e){
		
		e.preventDefault();
		cropDragged(e);
		
	});
	
	$('body').mouseup(function(e){
		
		e.preventDefault;
		isCropping = false;
		
	});
	
	$('#imgInput').change(function(){
		
		$('#uploadImgForm').trigger('submit');
		
	});
	
    $('#uploadImgForm').on('submit', function(event){

        event.preventDefault();

        var data = new FormData();
        data.append('action', 'uploadTmp');
        data.append('img', $('#imgInput')[0].files[0]);

        $.ajax({

            url: '../action/dish.php',
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            cache: false,
            success: function(response){

                console.log(response);
				
				var result = JSON.parse(response);
				
				$('#uploadImgView').attr('src', '../'+result.path).fadeIn(timeFade);
            }

        });

    });
	
});

function addDishEvent()
{		
	var info = {  };
	var isError = false;
		
	$('#addDishBox').find('input[type=label],textarea').each(function(){
			
		console.log($(this).val().length)
			
		if($(this).val().length == 0)
		{
			isError = true;
			addErrorForm($(this));
			return;
		}
		
		delErrorForm($(this));
		info[$(this).attr('name')] = $(this).val();
			
	});
	
	if(isError)
		return;
		
	var data = { 'action':'add', 'info':info };
		
	console.log(data); return;
		
	$.ajax({
	
		type: 'POST',
		url: 'action/dish.php',
		data: data,
		success: function(response){
		
		}

	});
}

function addErrorForm(block)
{
	block.removeClass('succInput');
	block.addClass('errInput');
}

function delErrorForm(block)
{
	block.removeClass('errInput');
	block.addClass('succInput');
}

function uploadImageEvent()
{
	//$('#bgFon').fadeIn(timeFade);
	//$('#uplImgButton').show();
	
	$('#imgInput').click();
}

function startCrop(e)
{
	isCropping = true;
		
	cropStartX = e.pageX;
	cropStartY = e.pageY;
		
	cropHandle.css('width', 0).css('height', 0).css('left', cropStartX).css('top', cropStartY).show();
}

function cropDragged(e)
{
	if(!isCropping)
		return;
		
	var width  = e.pageX - cropStartX;
	var height = e.pageY - cropStartY;
	
	if(width > 0)
		cropHandle.css('width', width).css('height', height);
}