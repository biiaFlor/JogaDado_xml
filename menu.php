<!DOCTYPE html>

<html lang="pt-BR">

	<head> 
		<title>  </title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href = "estilos.css"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	</head>
	
	<body>
		<form action="gera.php" method="post">
			<label>Número que irá sair nos dados?</label>
			<input type="number" name="chute"/>
			
			<?php
				$dado1 = rand(1,6);
				$dado2 = rand(1,6);
				
				echo "<input type=\"hidden\" name=\"dado1\" value=\"$dado1\" />";
				echo "<input type=\"hidden\" name=\"dado2\" value=\"$dado2\" />";
			?>
			
			<input type="submit" value="Tentar"/>
		</form>
	</body>
	
</html>	
