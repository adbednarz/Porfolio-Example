<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Strona główna </title>
<link href="styles/styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>
	<?php include "./nav.php" ?>	
	<main class="aside">
    	<section id="introduce">
    		<h2>Nazywam się Adam Bednarz </h2>
			<div>
  				<img id="profile" src="images/my_photo.jpeg" alt="my_photo"/>
      			<p>Obecnie studiuję informatykę na Wydziale Podstawowych Problemów Techniki na Politechnice Wrocławskiej. Urodzony i wychowany na 
				  <a href="https://pl.wikipedia.org/wiki/Krajna" target="_blank" rel="noopener noreferrer">Krajnie</a> (między Kaszubami a Wielkopolską).
				  W wolnym czasie lubię rekreacyjnie biegać i czytać książki. </p>				
			</div>
    	</section>
    	<section>
    		<h2>Dodatkowe informacje: </h2>
    			<ul>
    				<li>
      					<p> By zerknąć na mój github, kliknij
        					<a href="https://github.com/adbednarz" target="_blank" rel="noopener noreferrer">tutaj</a>.
        				</p>
        			</li>
        			<li>
        				<p> Email: a.bednarz22@gmail.com </p>
        			</li>
					<li>
        				<p> Grupa krwi: A Rh- </p>
        			</li>
        			<li>
        				<p> Znak zodiaku: Wodnik </p>
        			</li>
        		</ul>    		
    	</section>
	</main>
	<?php include "./footer.php" ?>
	<script src="l3.js"></script>
</body>
</html>

