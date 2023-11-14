<html>

<head>
	<title>Cadastre-se</title>
</head>

<body>
	<?php
		form_open("login/create", array("class" => "form-login card"));
			form_input(array("class" => "form-input", "name" => "username", "type" => "text", "maxlenght" => 32));
			form_password(array("class" => "form-input", "name" => "password", "maxlenght" => 32));
			form_submit(array("class" => "submit", "title" => "Enviar"), "Cadastrar");
		form_close();
	?>
</body>

</html>
