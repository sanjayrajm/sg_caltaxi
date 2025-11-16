<?php
// Serves printable HTML of tariff (same as tariff-download but with nicer print styles)
require_once __DIR__ . '/../database/db.php';
$stmt = $pdo->query('SELECT * FROM tariffs ORDER BY category, distance');
$tariffs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?><!doctype html><html><head><meta charset='utf-8'><title>Tariff PDF</title>
<style>
body{font-family:Arial, sans-serif; font-size:12px; color:#222}
table{width:100%; border-collapse:collapse}
th,td{border:1px solid #ddd; padding:6px; text-align:left}
th{background:#f4f4f4}
h2{text-align:center}
@media print { footer{position:fixed; bottom:0} }
</style>
</head><body><h2>SG Call Taxi - Tariff</h2><table><thead><tr><th>Category</th><th>Distance</th><th>Fare</th><th>Unit</th><th>Notes</th></tr></thead><tbody>
<?php foreach($tariffs as $t): ?><tr><td><?=htmlspecialchars($t['category'])?></td><td><?=htmlspecialchars($t['distance'])?></td><td>₹<?=number_format($t['fare'],2)?></td><td><?=htmlspecialchars($t['unit'])?></td><td><?=htmlspecialchars($t['notes'])?></td></tr><?php endforeach; ?>
</tbody></table><p style="text-align:center;margin-top:12px">Generated on <?=date('Y-m-d H:i')?></p></body></html>