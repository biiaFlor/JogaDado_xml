<?php
	function gera_form(){
		echo "<div class = \"form-row justify-content-center margem\">";
			echo "<div class = \"col-3 margem\">";
				echo "<form action=\"pagJogar.php\" method=\"post\">";
					echo "<div class=\"form-group text-center\">";
						echo "<label>Número que irá sair nos dados?</label> <br />";
						echo "<input type=\"number\" name=\"chute\" class=\"form-control\"/>";
					echo "</div>";
					echo "<div class=\"form-group text-center\">";
						echo "<input type=\"submit\" class=\"btn btn-success col-4\" value=\"Tentar\"/>";
						echo "<button type = \"button\" class = \"btn btn-success margem\"><a href=\"pagJogar.php\">Iniciar novo Jogo</a></button>";
						echo "<button type = \"button\" class = \"btn btn-danger margem\"><a href=\"index.php\">Sair</a></button>";
					echo "</div>";
				echo "</form>";
			echo "</div>";
		echo "</div>";
	}
	
	function salva_chute(){		
		$chute = $_POST["chute"];
		$total = $_SESSION["total"];
		
		if($total == $chute){
			echo "<div class = \"row justify-content-center margem\">";
				echo "<h3>Parabéns, você acertou! </h3>";
			echo "</div>";

			echo "<div class = \"row justify-content-center\">";
				echo "<h4> O número sorteado é: " . $total . "</h4>";
			echo "</div>";

			session_destroy();

			echo "<div class = \"row justify-content-center\">";
				echo "<button type = \"button\" class = \"btn btn-success margem\"><a href=\"inicial.php\"> Sair</a></button>";
			echo "</div>";
		}else{
			$_SESSION["tentativas"]--;
			$tentativas = $_SESSION["tentativas"];

			if($tentativas > 0){
				echo "<div class = \"row justify-content-center margem\">";
					echo "<h3>Que pena, você errou.</h3>";
				echo "</div>";

				echo "<div class = \"row justify-content-center margem\">";
					echo "Mas você ainda tem " .  $tentativas . " tentativas.";
				echo "</div>";

				echo "<div class = \"row justify-content-center\">";
					echo "<button type = \"button\" class = \"btn btn-success margem\"><a href=\"pagJogar.php\"> Tentar novamente</a></button>";
				echo "</div>";
			}
			else{
				echo "<div class = \"row justify-content-center margem\">";
					echo "<h3>Que pena, suas chances acabaram.</h3>";
				echo "</div>";

				echo "<div class = \"row justify-content-center\">";
					echo "O número era $total";
				echo "</div>";

				echo "<div class = \"row justify-content-center\">";
					echo "<button type = \"button\" class = \"btn btn-success margem\"><a href=\"inicial.php\"> Sair </a></button>";
				echo "</div>";

				session_destroy();
			}
		}
	}
?>