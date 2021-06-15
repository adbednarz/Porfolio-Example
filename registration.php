<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $username = $_POST["username"];
  $password = hash("sha256", $_POST["password"]);
  $email = $_POST["email"];
  $db = new SQLite3("database.db");
  $stmt = $db->prepare("INSERT INTO Users VALUES (:user, :passwd, :email)");
  $stmt->bindValue(":user", str_replace("<", "&lt;", $username), SQLITE3_TEXT);
  $stmt->bindValue(":passwd", str_replace("<", "&lt;", $password), SQLITE3_TEXT);
  $stmt->bindValue(":email", str_replace("<", "&lt;", $email), SQLITE3_TEXT);
  
  if ($stmt->execute()) {
    $_SESSION["username"] = $username;
    header("Location: /index.php");
  }
  echo "Registration error";
}
?>

<link href="styles/styles.css" rel="stylesheet" />

<form class="center_form" method="post" action="registration.php">
  <div class="form">
    <input type="text" placeholder="Login" name="username">
    <input type="password" placeholder="Hasło" name="password">
    <input type="email" placeholder="Email" name="email">
    <button class="btn" type="submit" class="btn">Zarejestruj się</button>
    <p>
      Masz już konto? <a href="login.php">Zaloguj się</a>
    </p>
  </div>
</form>