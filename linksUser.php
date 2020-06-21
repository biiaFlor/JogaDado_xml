<?php
	session_start();

	$dado1 = rand(1, 6);
	$dado2 = rand(1, 6);

	$total = $dado1 + $dado2;

	$_SESSION["total"] = $total;
	$_SESSION["tentativas"] = 3;
?>

<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<title> Links do User </title>
	<link rel="stylesheet" href="estilos.css">
</head>

<body>
	<div class="row justify-content-center margem">
		<!-- <button type="button" class="btn btn-success margem col-2"><a href="pag_inicial.php"> Home </a></button> -->
		<button type="button" class="btn btn-success margem col-2"><a href="pagJogar.php"> Jogar </a></button>
		<!-- <button type="button" class="btn btn-success margem col-2"><a href="pontuacao.php"> Pontuação </a></button>
		<button type="button" class="btn btn-success margem col-2"><a href="trofeus.php"> Troféus </a></button>
		<button type="button" class="btn btn-success margem col-2"><a href="quadroLideres.php"> Quadro de líderes </a></button> -->
		<button type="button" class="btn btn-success margem col-2"><a href="index.php"> Sair </a></button>
	</div>
</body>

</html>