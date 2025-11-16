<?php
require_once __DIR__ . '/../database/db.php';
session_start();
if (empty($_SESSION['user'])) { header('Location: login.php'); exit; }
$filename = 'tariffs-' . date('Ymd-His') . '.csv';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename);
$out = fopen('php://output', 'w');
fputcsv($out, ['id','category','distance','fare','unit','notes']);
foreach($pdo->query('SELECT * FROM tariffs ORDER BY category, distance') as $t) {
    fputcsv($out, [$t['id'],$t['category'],$t['distance'],$t['fare'],$t['unit'],$t['notes']]);
}
fclose($out);
exit;
?>