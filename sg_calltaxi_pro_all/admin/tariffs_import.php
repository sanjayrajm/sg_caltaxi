<?php
require_once __DIR__ . '/../database/db.php';
session_start();
if (empty($_SESSION['user'])) { header('Location: login.php'); exit; }
$msg='';
if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_FILES['csv'])) {
    $tmp = $_FILES['csv']['tmp_name'];
    if (($h = fopen($tmp, 'r')) !== false) {
        $row = 0;
        $pdo->beginTransaction();
        try {
            while (($data = fgetcsv($h, 1000, ',')) !== false) {
                $row++;
                if ($row==1) continue; // skip header
                // expect columns: category,distance,fare,unit,notes (id optional)
                if (count($data) < 5) continue;
                $category = $data[0]; $distance = $data[1]; $fare = floatval($data[2]); $unit = $data[3]; $notes = $data[4];
                $pdo->prepare('INSERT INTO tariffs (category,distance,fare,unit,notes) VALUES (?,?,?,?,?)')->execute([$category,$distance,$fare,$unit,$notes]);
            }
            $pdo->commit();
            $msg='Imported successfully';
        } catch (Exception $e) {
            $pdo->rollBack();
            $msg='Error: ' . $e->getMessage();
        }
        fclose($h);
    } else { $msg='Unable to read file'; }
}
?><!doctype html><html><head><meta charset='utf-8'><title>Import Tariffs</title><link href='/public/css/bootstrap.min.css' rel='stylesheet'></head><body><div class='container py-4'><h3>Import Tariffs CSV</h3><?php if($msg): ?><div class='alert alert-info'><?=htmlspecialchars($msg)?></div><?php endif; ?><form method='post' enctype='multipart/form-data'><input type='file' name='csv' accept='.csv' required><button class='btn btn-primary'>Upload</button></form><p>CSV columns: category,distance,fare,unit,notes</p></div></body></html>