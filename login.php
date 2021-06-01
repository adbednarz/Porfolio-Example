<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $username = $_POST["username"];
  $password = hash("sha256", $_POST["password"]);
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');  
  $db = new SQLite3("database.db");
  $stmt = $db->prepare("SELECT Passwd FROM Users WHERE User=:User");
  $stmt->bindValue(":User", $username, SQLITE3_TEXT);
  $returned_set = $stmt->execute();
  while($result = $returned_set->fetchArray(SQLITE3_ASSOC)) {
    if ($result["Passwd"] == $password) {
      $_SESSION["username"] = $username;
      header("Location: /index.php");
    }
  }
  echo "Login error";
}
?>

<link href="styles/styles.css" rel="stylesheet" />

<form class="center_form" method="post" action="login.php">
  <div class="form">
    <input type="text" placeholder="Login" name="username">
    <input type="password" placeholder="Hasło" name="password">
    <button class="btn" type="submit" class="btn">Zaloguj się</button>
    <p>
      Nie masz konta? <a href="registration.php">Zarejestruj się</a>
    </p>    
  </div>
</form>