<?php


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Examen</title>
		<meta charset="utf-8">
	</head>
	<body>
		
		<?php
			include('blocs/header.php');
		?>
		<H2>
			Register
		</H2>
		<table border='1px'>
			<tr>
				<td>
					<form name="inscription" id="inscription" action="registerProcess.php" method="POST">
						User name: <input type="text" id="userName" name="userName"><br/>
						email: <input type="text" id="email" name="email"><br/>
						Password: <input type="password" id="password" name="password"><br/>
						Confirmation: <input type="password" id="passwordConfirmation" name="passwordConfirmation"><br/>
						<input type="submit">
					</form>
				</td>
			</tr>
	</body>
</html>