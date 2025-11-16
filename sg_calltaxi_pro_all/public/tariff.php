<?php require_once __DIR__ . '/../database/db.php'; include ' _header.php'; 
// fetch tariffs
$stmt = $pdo->query('SELECT * FROM tariffs ORDER BY category, distance');
$tariffs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="card p-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Tariff</h2>
    <a class="btn btn-outline-primary" href="/public/tariff-download.php">Download Tariff (PDF)</a>
  </div>
  <p class="text-muted">Transparent fares — updated regularly. Contact <strong>+91 86084 54545</strong> for bookings.</p>

  <div class="mb-3">
    <label class="form-label">Filter by category</label>
    <select id="filterCategory" class="form-select" onchange="filterTable()">
      <option value="">All</option>
      <?php foreach(array_unique(array_column($tariffs,'category')) as $c): ?>
        <option value="<?=htmlspecialchars($c)?>"><?=htmlspecialchars(ucfirst($c))?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="table-responsive">
    <table class="table table-hover" id="tariffTable">
      <thead class="table-light"><tr><th>Category</th><th>Distance</th><th>Fare</th><th>Unit</th><th>Notes</th></tr></thead>
      <tbody>
        <?php foreach($tariffs as $t): ?>
        <tr data-category="<?=htmlspecialchars($t['category'])?>">
          <td><?=htmlspecialchars(ucfirst($t['category']))?></td>
          <td><?=htmlspecialchars($t['distance'])?></td>
          <td>₹<?=number_format($t['fare'],2)?></td>
          <td><?=htmlspecialchars($t['unit'])?></td>
          <td><?=htmlspecialchars($t['notes'])?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
function filterTable() {
  var sel = document.getElementById('filterCategory').value;
  var rows = document.querySelectorAll('#tariffTable tbody tr');
  rows.forEach(r => {
    if (!sel) r.style.display='';
    else r.style.display = r.dataset.category === sel ? '' : 'none';
  });
}
</script>

<?php include ' _footer.php'; ?>