<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Zainteresowania</title>
<link href="styles/styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
<script src="l3.js"></script>
<script src="https://kit.fontawesome.com/d38ec04bf6.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device−width , initial−scale=1.0"/>
</head>
<body>
	<?php include "./nav.php" ?>
  <main>
		<h2> Związane ze studiami </h2>
		<div class="aside">
			<section class="description">
				<h2>Teoria grafów</h2>
				<div>
					<img src="images/graph.png" width="200" alt="graph"/>
					<p>Grafy to dziedzina matematyki, które ma niejedno zastosowanie w informatyce. Struktury informatyczne często przedstawia się w postaci grafów (sieci, struktura witryn internetowych). Ponadto stosuje się algorytmy grafowe, które np. pomagają w wyborze najbardziej optymalnej trasy w GPS. Jednak to z czysto matematycznego podejścia polubiłem grafy. Fakt, że teorię można zrozumieć i wykorzystać często w praktycznych i ciekawych zadaniach. </p>					
				</div>
			</section>
			<section class="description">
				<h2>Kombinatoryka analityczna</h2>
				<div>
					<img src="images/combinatorics.png" width="200" alt="combinatorics"/> 		
					<p>Kombinatorykę analityczną też polubiłem dzięki praktycznym i ciekawym zadaniom. Lecz w tym przypadku dochodzi abstrakcja. Trzeba sobie pewne rzeczy ułożyć w głowie i przenieść do świata kombinatoryki analitycznej. Wchodząć w to stopniowo, można czerpać z tego dużą przyjemność.</p>					
				</div>
				<p><a href="patterns.php"> Przykładowe wzory matemtyczne</a></p>			
			</section>
		</div>

		<h2> Poza studiami </h2>
		<div class="aside">
			<section class="description">
				<h2>Geografia </h2>
				<div>
					<img src="images/geography.png" width="200" alt="geography"/>
					<p>Pod pojęciem geografii kryje się wiele pojęć. Możemy ją głównie podzielić na geografię fizyczną, społeczną, gospodarczą i polityczną. Interesuje się wszystkimi aspektami. Do rozwinięcia tej pasji szczególnie przyczyniła się moja nauczycielka geografii w gimnazjum. Pod jej kierownictwem brałem udziały w olimpiadach geograficznych. </p>					
				</div>
			</section>
			<section class="description">
				<h2>Historia </h2>
				<div>
					<img src="images/history.png" width="200" alt="history"/>	
					<p>To druga po geografii moja pasja. Obie te dziedziny geografia i historia pod różnymi względami są mocno połączone i oddziałowują wzajemnie na siebie. Interesuje się głównie historią Polski, aby bardziej zgłębić czynniki wpływające na to, jakim narodem dzisiaj jesteśmy. </p>					
				</div>
			</section>
			<section class="description">
				<h2>Inne </h2>
				<div>
					<img src="images/others.png" width="200" alt="others"/>	
					<p> Lubię czytać książki, podróżować i poznawać obce kultury. <br>
				Ze sportu najbardziej lubię bieganie. W czasie szkolnym amatorsko brałem udział w zawodach, a teraz jest to najlepszy sposób, aby odreagować długie godziny spędzane przed komputerem. </p>					
				</div>
			</section>			
		</div>
		<?php include "./footer.php" ?>
  </main>
  </body>
</html>
