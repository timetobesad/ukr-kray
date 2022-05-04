<html>
	<head>
	
		<title>Вхід</title>
		
		<link rel='stylesheet' href='css/fonts.css' />
		<link rel='stylesheet' href='css/admin-login.css' />
		
		<script type='text/javascript' src='js/jquery.js' ></script>
		<script type='text/javascript' src='js/jquery-ui.js' ></script>
		<script type='text/javascript' src='js/admin-login.js' ></script>
	
	</head>
	<body>
	
		<audio id='notifPlayer' src='sounds/notif.ogg' ></audio>
	
		<div id='errorNotif' >
			<div id='errorMsg' >Ви ввели не вірний пароль.<br>Спробуйте ще раз!</div>
		</div>

		<div id='loginBox' >
			<div id='hintBox' >Введіть пароль</div>
			<input type='password' name='pass' id='key' />
			<div id='loginButton' >Увійти</div>
		</div>

	</body>
</html>