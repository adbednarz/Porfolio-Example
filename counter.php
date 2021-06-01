<?php
$path = "counter.log";

if (!file_exists($path)) {
    $f = fopen($path, "w");
    fwrite($f, "0");
    fclose($f);
}

$f = fopen($path, "r");
$counter = fread($f, filesize($path));
fclose($f);

$db = new SQLite3("database.db");
$ip = $_SERVER['REMOTE_ADDR'];
$stmt = $db->prepare("SELECT * FROM IP WHERE UserIP=:ip");
$stmt->bindValue(":ip", $ip, SQLITE3_TEXT);
$returned_set = $stmt->execute();
if ($result = $returned_set->fetchArray(SQLITE3_ASSOC)) {
    $timeNow = date('Y-m-d H:i:s');
    $endTime = date('Y-m-d H:i:s', strtotime($result["AccessDate"] . ' +1 day'));
    if ($endTime < $timeNow) {
        $stmt = $db->prepare("UPDATE IP SET AccessDate = :timeNow WHERE UserIP = :ip"); 
        $stmt->bindValue(":timeNow", $timeNow, SQLITE3_TEXT);
        $stmt->bindValue(":ip", $ip, SQLITE3_TEXT);
        $returned_set = $stmt->execute();
        $counter++;
        $f = fopen($path, "w");
        fwrite($f, $counter);
        fclose($f); 
    }
} else {
    $timeNow = date('Y-m-d H:i:s');
    $stmt = $db->prepare("INSERT INTO IP VALUES (:ip, :timeNow)");
    $stmt->bindValue(":ip", $ip, SQLITE3_TEXT);
    $stmt->bindValue(":timeNow", $timeNow, SQLITE3_TEXT);
    $returned_set = $stmt->execute();
    $counter++;
    $f = fopen($path, "w");
    fwrite($f, $counter);
    fclose($f);      
}
    
echo "Jesteś $counter odwiedzającym.";

?>