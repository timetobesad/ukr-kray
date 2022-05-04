<html>
	<head>
		<title>Керування стравами</title>
		
		<link rel='stylesheet' href='../css/fonts.css' />
		<link rel='stylesheet' href='../css/adminDish.css' />
		
		<script type='text/javascript' src='../js/jquery.js' ></script>
		<script type='text/javascript' src='../js/adminDish.js' ></script>
		
	</head>
	<body>

		<div id='mainBox' >
		
			<div id='addDishBtn' >Додати</div>
		
		</div>
		
		<div id='bgFon' ></div>
		<div id='closeBtn' ></div>
		
		<div id='addDishBox' >
			<input type='label' name='title' placeholder='Назва' class='inputNewDish' />
			<input type='label' name='price' placeholder='Ціна' class='inputNewDish' />
			<input type='label' name='mass' placeholder='Вага' class='inputNewDish' />
			<textarea name='composition' placeholder='Склад' class='inputNewDish' ></textarea>
			<textarea name='description' placeholder='Додаткова інфа' class='inputNewDish' ></textarea>
			
			<select id='catDish' >
				<option >Перші страви</option>
				<option >Другі страви</option>
				<option >Млинці</option>
			</select>
			
			<span id='srcPathView' class='inputNewDish' >default image</span>
			
			<input type='button' id='uplImgButton' name='uplImgButton'  value='Завантажити фото' />
			<input type='button' id='addDishComplBtn' name='addDishComplBtn' value='Додати страву' />
		</div>
		
		<div id='cropHandle' ></div>
		<img src='' id='uploadImgView' />
		
		<form id="uploadImgForm" action="upload.php" method="post" enctype="multipart/form-data">
            <input id="imgInput" type="file" accept="image/*" name="image" />
        </form>

	</body>
</html>