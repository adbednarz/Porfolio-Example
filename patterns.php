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
    <section>
        <iframe src="./web/index.html" style="width: 100%;"></iframe>
    </section>
	<?php include "./footer.php" ?>
  </main>
  </body>
</html>
