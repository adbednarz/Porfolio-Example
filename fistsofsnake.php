<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Fists Of Snake</title>
<link href="styles/styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">
<script src="l3.js"></script>
<meta name="viewport" content="width=device−width , initial−scale=1.0"/>
</head>
<body>
	<?php include "./nav.php" ?>
	<main>
    	<section>
    	<h1>Fists Of Snake</h1>
    	<p>Wieloosobowa gra rodzaju strzelanki pierwszosobowej. Jeden z graczy spełnia również rolę serwera. Czas rozgrywki trwa pięć minut i wygrywa gracz, która ma najlepsze statystyki. Na statystykę składają się poniesione śmierci i liczba zadanych śmierci przeciwnikom. </p>
    	</section>
		<section>
			<h3> Zdjęcia przedstawiające projekt: </h3>
    	    <img class="screen" src="images/fistsofsnake_game1.jpeg" width="405" alt="screen game"/>
    	    <img class="screen" src="images/fistsofsnake_game2.png" width="400" alt="screen game"/>
    	</section>
    	<section>
    		<h3>Jeden z ciekawszych fragmentów kodu ukazujący konstruktor klasy pocisku, w którym tworzymy wygląd graficzny granatu, jego właściwości oraz przypisujemy dźwięk i animację wybuchu (ogień z dymem)</h3>
    	    <pre>
    	    	<code>
	AFPSProjectileGrenade::AFPSProjectileGrenade()
	{
		static ConstructorHelpers::FObjectFinder&lt;UStaticMesh&gt;Mesh(TEXT("/Game/FPS_Weapon_Bundle/Weapons/Meshes/G67_Grenade/SM_G67"));
		if (Mesh.Succeeded()) 
		{
			ProjectileMeshComponent->SetStaticMesh(Mesh.Object);
			ProjectileMeshComponent->SetRelativeScale3D(FVector(2, 2, 2));
		}

		ProjectileMovementComponent->InitialSpeed = 1500.0f;
		ProjectileMovementComponent->ProjectileGravityScale = 1.0f;

		this->Damage = 49.0f;

		static ConstructorHelpers::FObjectFinder&lt;USoundCue&gt; Sound(TEXT("'/Game/StarterContent/Audio/Explosion_Cue.Explosion_Cue'"));
		ExplosionSound = Sound.Object;

		static ConstructorHelpers::FObjectFinder&lt;UParticleSystem&gt; Particle(TEXT("'/Game/StarterContent/Particles/P_Explosion.P_Explosion'"));
		ExplosionParticles = Particle.Object;
	}	
 				</code>
			</pre>
    	    <p>Kod źródłowy dostępny: <a href="https://github.com/adbednarz/Fists-of-Snake-3D" target="_blank" rel="noopener noreferrer">tutaj</a></p>
		</section>
		<h2>Komentarze:</h2>
	<section>
	<ul>

	<?php
  	$db = new SQLite3("database.db");
  	$stmt = $db->prepare("SELECT * FROM Comments WHERE ProjectName=:projectName");
  	$stmt->bindValue(":projectName", "fistsofsnake");
  
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
			<input hidden=true name="project" value="fistsofsnake">
			<input type="text" name="content">
			<input type="submit" value="Wyślij">
  		</form>
	<?php } ?>
	</section>
	</main>
	<?php include "./footer.php" ?>
</body>
</html>
