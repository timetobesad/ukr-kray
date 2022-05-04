$(document).ready(function(){

    $('#form').on('submit', function(event){

        event.preventDefault();

        var data = new FormData();
        data.append('action', 'uploadTmp');
        data.append('img', $('#imgInput')[0].files[0]);

        $.ajax({

            url: 'upload.php',
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            cache: false,
            success: function(response){

                console.log(response);
				
				var result = JSON.parse(response);
				
				console.log(result);
            }

        });

    });

});