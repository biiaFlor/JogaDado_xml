<?php
function ler_dados_user()
{
	$codigo	= $_POST["codigo"];
	$nome = $_POST["nome"];
	$username 	= $_POST["username"];
	$senha 	= $_POST["senha"];

	if (!file_exists("user.xml")) {

		$xml =
			"<?xml version=\"1.0\" encoding=\"UTF-8\"?>
				<users>
					<user>
						<codigo>$codigo</codigo>
						<nome>$nome</nome>
						<username>$username</username>
						<senha>$senha</senha>
						<jogado>0</jogado>
						<ganho>0</ganho>
						<perdido>0</perdido>
						<trofeu>0</trofeu>
					</user>
				</users><br/>";

		atualizar_codigo("user");
		file_put_contents("user.xml", $xml);
	} else {
		$xml = simplexml_load_file("user.xml");

		$user = $xml->addChild('user');
		$user->addChild('codigo', $codigo);
		$user->addChild('nome', $nome);
		$user->addChild('username', $username);
		$user->addChild('senha', $senha);
		$user->addChild('jogado', 0);
		$user->addChild('ganho', 0);
		$user->addChild('perdido', 0);
		$user->addChild('trofeu', 0);
		atualizar_codigo("user");

		file_put_contents("user.xml", $xml->asXML());
	}

	echo "<div class=\"row justify-content-center\">";
		echo "<div class=\"margem\">";
			echo "<h2> User cadastrado com sucesso.</h2>";
		echo "</div>";
	echo "</div>";
}

function buscar_codigo($entidade){
	if (file_exists("sequencia_codigos.xml")) {
		$xml = simplexml_load_file("sequencia_codigos.xml");
		switch ($entidade) {
			case "user":
				return $xml->user;
				break;
		}
	} else {
		$xml =
			"<?xml version=\"1.0\" encoding=\"UTF-8\"?>
	<codigos>
	<user>1</user>
	</codigos>";
		file_put_contents("sequencia_codigos.xml", $xml);
		return 1;
	}
}

function atualizar_codigo($entidade){
	$xml = simplexml_load_file("sequencia_codigos.xml");
	switch ($entidade) {
		case "user":
			$xml->user++;
			break;
	}
	file_put_contents("sequencia_codigos.xml", $xml->asXML());
}

function verificar_user()
{
	$encontrou = false;
	if (!empty($_GET)) {
		$username = $_GET["user"];
		if (file_exists("user.xml")) {
			$xml = simplexml_load_file("user.xml");
			foreach ($xml->children() as $user) {
				if ($user->username == $username) {
					$nome = $user->nome;
					$username = $user->username;
					$senha = $user->senha;
					$encontrou = true;
				}
			}
		}
	}
	return $encontrou;
}

function cadastro_user()
{
	echo "<h3 class = \"text-center margem\">Cadastre-se:</h3>";

	echo "<div class = \"form-row justify-content-center margem\">";
			echo "<form action = \"conteudoCadastro.php\" method = \"post\">";
				echo "<div class = \"row form-group\">";
					echo "<div class=\"col-sm-12 col-lg-3\">";		
						echo "<label> Código: </label>";
						$codigo = buscar_codigo("user");
						echo "<input type = \"text\" class=\"form-control\" name = \"codigo\" value=\"$codigo\"readonly=\"readonly\"/>";
					echo "</div>";

					echo "<div class=\"col-lg-9 col-sm-12 \">";	
						echo "<label> Nome completo: </label>";
						echo "<input type = \"text\" class=\"form-control\" name = \"nome\"/>";
					echo "</div>";
				echo "</div>";

				echo "<div class = \"row form-group\">";
					echo "<div class=\"col-lg-6 col-sm-12 \">";	
						echo "<label> Username: </label>";
						echo "<input type = \"text\" class=\"form-control\" name = \"username\"/>";
					echo "</div>";

					echo "<div class=\"col-lg-6 col-sm-12 \">";	
						echo "<label> Senha: </label>";
						echo "<input type = \"password\" maxlength = \"8\" class=\"form-control\" name = \"senha\"/>";
					echo "</div>";
				echo "</div>";

				echo "<div class = \"col margem\">";
				echo "<div class=\"form-group text-center\">
						<input type = \"submit\" class=\"btn btn-success col-4\" name = \"submeter\" value = \"Cadastrar\"/>
						<button type = \"button\" class=\"btn btn-danger col-4\" name = \"cancelar\">
							<a href = \"index.php\"/> Voltar
						</button>
				</div>";
			echo "</div>";
		echo "</form>";
	echo "</div>";
}

function login(){
	echo "<h3 class = \"text-center margem\">Informe seu login:</h3>";
	echo "<div class = \"form-row justify-content-center margem\">";
		echo "<div class = \"col-4\">";
			echo "<form action = \"formLogin.php\" method = \"post\">
				<div class=\"form-group\">
					<label for=\"username\">Username:</label>
					<input type=\"text\" class=\"form-control\" id=\"username\" name = \"user\">
				</div>
				<div class=\"form-group\">
					<label for=\"senha\">Senha:</label>
					<input type=\"password\" class=\"form-control\" id=\"senha\" name = \"senha\">
				</div>
				<div class=\"form-group text-center\">
					<button type=\"submit\" class=\"btn btn-success col-4\">Entrar</button>
				</div>
			</form>";
		echo "</div>";
	echo "</div>";
}

function confere_user(){
	$user = $_POST["user"];
	$senha = $_POST["senha"];

	$xml = simplexml_load_file("user.xml");
	foreach ($xml->children() as $users) {
		if ($users->username == $user && $users->senha == $senha) {
			$encontrou = true;
		} else {
			$encontrou = false;
		}
	}

	if ($encontrou == true) {
		header("Location: inicial.php");
	} else {
		echo "<div class=\"text-center margem\"><h3> User não encontrado! </h3></div>";
		echo "<div class=\"row justify-content-center\">";
			echo "<div class=\"col text-center margem\">";
				echo "<button type=\"button\" class = \"btn btn-success\"><a href = \"formLogin.php\"> Tente novamente </a></button>";
			echo "</div>";
			
			echo "<div class=\"col text-center margem\">";
				echo "<button type=\"button\" class = \"btn btn-success\"><a href = \"conteudoCadastro.php\"> Cadastre-se </a></button>";
			echo "</div>";
		echo "</div>";
	}
}
