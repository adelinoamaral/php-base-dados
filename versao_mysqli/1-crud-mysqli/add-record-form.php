<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Formulário de registo</title>
</head>
<body>
<form action="insert.php" method="post">
	<p>
    	<label for="firstName">Nome:</label>
        <input type="text" name="first_name" id="firstName">
    </p>
    <p>
    	<label for="lastName">Apelido:</label>
        <input type="text" name="last_name" id="lastName">
    </p>
    <p>
    	<label for="emailAddress">Email:</label>
        <input type="email" name="email" id="emailAddress">
    </p>
    <input type="submit" value="Adiciona Registo">
</form>
</body>
</html>