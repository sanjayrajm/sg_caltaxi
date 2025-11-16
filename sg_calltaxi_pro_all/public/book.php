<?php require_once __DIR__ . '/../database/db.php'; include ' _header.php'; $cats=$pdo->query('SELECT DISTINCT category FROM tariffs')->fetchAll(PDO::FETCH_COLUMN); ?>
<div class="card p-4">
  <h3>Book a Taxi</h3>
  <form method="post" action="submit-booking.php">
    <div class="row">
      <div class="col-md-6 mb-3"><label class="form-label">Name</label><input class="form-control" name="name" required></div>
      <div class="col-md-6 mb-3"><label class="form-label">Phone</label><input class="form-control" name="phone" required></div>
    </div>
    <div class="mb-3"><label class="form-label">Category</label><select name="category" class="form-select" required><?php foreach($cats as $c): ?><option value="<?=htmlspecialchars($c)?>"><?=htmlspecialchars(ucfirst($c))?></option><?php endforeach; ?></select></div>
    <div class="row"><div class="col-md-6 mb-3"><label class="form-label">Pickup</label><input class="form-control" name="pickup" required></div><div class="col-md-6 mb-3"><label class="form-label">Drop</label><input class="form-control" name="drop" required></div></div>
    <div class="mb-3"><label class="form-label">Trip Time</label><input type="datetime-local" class="form-control" name="time" required></div>
    <button class="btn btn-primary">Confirm Booking</button>
  </form>
</div>
<?php include ' _footer.php'; ?>