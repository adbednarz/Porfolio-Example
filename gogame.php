<?php 
  	session_start();
  	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Go Game</title>
<link href="styles/styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
<script src="l3.js"></script>
<meta name="viewport" content="width=device−width , initial−scale=1.0"/>
</head>
<body>
	<?php include "./nav.php" ?>
  	<main>	
  	<section>
  	<h1> Go Game </h1> 
    	<p> Jest to chińska gra planszowa, w której gracze kładą na przemian czarne i białe kamienie na przecięciu linii. Każdy kamień znajdujący się na planszy ma co najmniej jeden oddech (oddech to niezajętę sąsiednie przecięcie linii), w innym przypadku kamień zostaje zbity przez przeciwnika. Celem gry jest zajęcie jak największego terytorium na planszy własnymi kamieniami. <br> Za pomocą prostego serwera można grać z innym użytkownikiem lub botem. Na początku wybieramy rozmiar planszy oraz typ przeciwnika. Następnie ukazuje się nam proste GUI, gdzie głównym elementem jest plansza, z góry mamy panel dostępnych akcji, a z boku wyświetlany jest przebieg rozgrywki. <br> <a href="https://pl.wikipedia.org/wiki/Go" target="_blank" rel="noopener noreferrer">Tutaj</a> można więcej poczytać na temat zasad jak i historii gry. </p>
	</section>
      	<section>
      		<h3> Zdjęcia przedstawiające projekt: </h3>
        	<img id="small_screen" src="images/gogame_game1.png" width="350" alt="game screen"/>
        	<img class="screen" src="images/gogame_game2.png" width="500" alt="game screen"/>
      	</section>
      	<section>
          	<h3>Jeden z ciekawszych fragmentów kodu ukazujący część logiki gry</h3>
          	<pre>
	        	<code>
	// jeżeli dookoła są kamienie różnych kolorów to można wstawić,
	// gdy chociaż jeden z przyjacielskich będzie miał oddechów więcej niż 1
	for(int i = 0; i &lt; chains.size(); i++) {
		if(chains.get(i).getColor().equals(color)) {
			if(chains.get(i).isHere(x + 1, y) || chains.get(i).isHere(x - 1, y) || 
				chains.get(i).isHere(x, y + 1) || chains.get(i).isHere(x, y - 1)) {
					if(chains.get(i).countLiberties() > 1) {
						return true;
					}
				}
			}
		}
		//tutaj wszystkie przyjacielskie mają po jednym oddeechu, więc któryś po dodaniu będzie usunięty
		for(int i = 0; i &lt; chains.size(); i++) {
			if(!(chains.get(i).getColor().equals(color))) {
				if(chains.get(i).isHere(x + 1, y) || chains.get(i).isHere(x - 1, y) || 
					chains.get(i).isHere(x, y + 1) || chains.get(i).isHere(x, y - 1)) {
						if(chains.get(i).countLiberties() == 1) {
							return true;
						}
					}
				}
			}
		}
		// gdy są 4 przyjacielskie po jednym oddechu zawsze to jest samobójstwo 
		return false;
	}
				</code>
			</pre>
        	<p>Kod źródłowy dostępny: <a href="https://github.com/adbednarz/GoProject" target="_blank" rel="noopener noreferrer">tutaj</a></p>
      	</section>
		  <h2>Komentarze:</h2>
	<section>
	<ul>

	<?php
  	$db = new SQLite3("database.db");
  	$stmt = $db->prepare("SELECT * FROM Comments WHERE ProjectName=:projectName");
  	$stmt->bindValue(":projectName", "gogame");
  
  	$returned_comments = $stmt->execute();
  	while($row = $returned_comments->fetchArray(SQLITE3_ASSOC)) {
		echo "<li class='comment'>";
		echo "<p>" . $row['Comment'] . "</p>";
		echo "<small> ~ " . $row['Author'] . "</small>";
		echo "</li>";
  	}
	?>

	</ul>

	<?php if (isset($_SESSION["username"])) { ?>
  		<form method="POST" action="/comment.php" id="usrform">
			<input hidden=true name="project" value="gogame">
			<input type="text" name="content">
			<input type="submit" value="Wyślij">
  		</form>
	<?php } ?>
	</section>
	</main>
	<?php include "./footer.php" ?>
</body>
</html>
