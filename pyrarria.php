<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PyRarria</title>
<link href="styles/styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
<script src="l3.js"></script>
<meta name="viewport" content="width=device−width , initial−scale=1.0"/>
</head>
<body>
    <?php include "./nav.php" ?>
  	<main>
    	<section>
    		<h1>PyRarria</h1>
    		<p> Gra ta była wzorowana na grze 
    		<a href="https://terraria.org/" target="_blank" rel="noopener noreferrer">Terraria.</a> Zatem założeniem było, aby ją w miarę przyzwoicie przypominała. Celem gry jest zbieranie przedmiotów i bronienie się przed przeciwnikami. Pomaga mu w tym znaczna liczba umiejętności magicznych i rozbudowany system przedmiotów. Gracz ma możliwość kopania w głąb ziemi, gdzie może znależć bardziej unikalne przedmioty. </p>
    	</section>
      	<section>
      		<h3> Zdjęcie przedstawiające projekt: </h3>
        	<img class="screen" src="images/pyrarria_game.png" width="750" alt="game"/>
      	</section>
      	<section>
          	<h3>Jeden z ciekawszych fragmentów kodu ukazujący sposób rysowania opisów przedmiotów w ekwipunku, gdy najedziemy na nie myszką</h3>
          	<pre>
        		<code>
   def draw_item_description(self, screen):
        """Draw a description of item"""
        if self.is_opened and self.item_moving is None:  # rysowanie opisów
            x, y = pygame.mouse.get_pos()
            i = None
            for k, eq in enumerate(self.base_eq):
                if eq.rect.collidepoint(pygame.mouse.get_pos()):
                    i = k
            for k, eq in enumerate(self.extended_eq, 6):
                if eq.rect.collidepoint(pygame.mouse.get_pos()):
                    i = k
            for k, eq in enumerate(self.armor_eq, self.eq_size):
                if eq.rect.collidepoint(pygame.mouse.get_pos()):
                    i = k
            armour_pos = self.eq_size
            if i is not None and self.collected_items[i] and i >= armour_pos:
                words = self.font.render(self.collected_items[i][0].description, True, WHITE)
                screen.blit(words, (x - 120, y - 15))
            elif i is not None and self.collected_items[i]:
                words = self.font.render(self.collected_items[i][0].description, True, WHITE)
                screen.blit(words, (x + 15, y + 15))
            elif i in [armour_pos, armour_pos + 1, armour_pos + 2]:
                words = self.font.render(self.armour_description[i - self.eq_size], True, WHITE)
                screen.blit(words, (x - 120, y - 15))
				</code>
			</pre>
        	<p>Kod źródłowy dostępny: <a href="https://github.com/adbednarz/python_game" target="_blank" rel="noopener noreferrer">tutaj</a></p>
      	</section>
        <h2>Komentarze:</h2>
	<section>
	<ul>

	<?php
  	$db = new SQLite3("database.db");
  	$stmt = $db->prepare("SELECT * FROM Comments WHERE ProjectName=:projectName");
  	$stmt->bindValue(":projectName", "pyrarria");
  
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
			<input hidden=true name="project" value="pyrarria">
			<input type="text" name="content">
			<input type="submit" value="Wyślij">
  		</form>
	<?php } ?>
	</section>
	</main>
	<?php include "./footer.php" ?>
</body>
</html>
