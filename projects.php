<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Projekty</title>
<link href="styles/styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
<script src="l3.js"></script>
<meta name="viewport" content="width=device−width , initial−scale=1.0"/>
</head>
<body>
	<?php include "./nav.php" ?>
  <main>
      <h2> Ciekawe projekty zrealizowane w trakcie studiów</h2>
      <div class="aside">
        <section class="description">
          <h2>Go Game</h2>
          <div>
            <img src="images/gogame_logo.png" alt="gogame logo"/>
                <p>Dwuosobowa gra planszowa zaimplementowana w języku Java stworzona w dwuosobowym zespole w ramach przedmiotu Kurs Programowania. 
                  <a href="gogame.php">Więcej...</a></p>            
          </div>
        </section>       
        <section class="description">
          <h2>PyRarria</h2>
          <div>
            <img src="images/pyrarria_logo.png" alt="pyrarria logo" class="project_logo"/>
            <p>Jednoosobowa gra 2D napisana w języku Python przy użyciu modułu PyGame w sześcioosobowym zespole w ramach przedmiotu Kurs wybranego języka programowania - Python. 
              <a href="pyrarria.php">Więcej...</a></p>
          </div>
        </section>
        <section class="description">
          <h2>Fists Of Snake</h2>
          <div>
            <img src="images/fistsofsnake_logo.png" alt="fistsofsnake logo" class="project_logo"/>
            <p>Wieloosobowa gra 3D napisana w języku C++ przy użyciu silnika do gier Unreal firmy Epic Games w trzyosobowym zespole w ramach przedmiotu Programowanie zespołowe. 
              <a href="fistsofsnake.php">Więcej...</a></p>            
          </div>
        </section>
      </div>
  </main>
  <?php include "./footer.php" ?>
  </body>
</html>
