<?php
// SQLite connection for localhost demo
$sqliteFile = __DIR__ . '/../storage/db.sqlite';
if (!file_exists($sqliteFile)) { @mkdir(dirname($sqliteFile),0755,true); $h=fopen($sqliteFile,'w'); if($h) fclose($h); }
try {
    $pdo = new PDO('sqlite:' . $sqliteFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('DB Connection error: ' . $e->getMessage());
}
return $pdo;
?>