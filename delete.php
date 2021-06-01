<?php
  session_start();
  $username = $_SESSION["username"];
  echo("<script>console.log('PHP: " . $username . "');</script>");
  $db = new SQLite3("database.db");
  $stmt = $db->prepare("DELETE FROM Users WHERE User = :user");
  $stmt->bindValue(":user", $username, SQLITE3_TEXT);
  $stmt->execute();
  session_destroy();
  header("Location: /index.php");
?>