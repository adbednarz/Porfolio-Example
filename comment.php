<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST" and isset($_SESSION["username"])) {
    $db = new SQLite3("database.db");
    $stmt = $db->prepare(
        "INSERT INTO Comments (Comment, ProjectName, Author) 
        VALUES (:comment, :projectName, :user)"
    );
    $stmt->bindValue(":comment", $_POST["content"]);
    $stmt->bindValue(":projectName", $_POST["project"]);
    $stmt->bindValue(":user", $_SESSION["username"]);
    $stmt->execute();

    header("Location: /".$_POST["project"].".php");
}