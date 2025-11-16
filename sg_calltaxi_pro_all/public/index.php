<?php require_once __DIR__ . '/../database/db.php'; include ' _header.php'; ?>
<div class="row">
  <div class="col-md-8">
    <div class="card p-4">
      <h1>Welcome to SG Call Taxi</h1>
      <p class="lead">Reliable taxi service in Kanchipuram. Clean cars, experienced drivers.</p>
      <p>Contact us: <strong>+91 86084 54545</strong></p>
      <p><a class="btn btn-primary" href="/public/book.php">Book Now</a></p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card p-3">
      <h5>Quick Links</h5>
      <ul class="list-unstyled">
        <li><a href="/public/tariff.php">Tariff</a></li>
        <li><a href="/public/book.php">Book Online</a></li>
      </ul>
    </div>
  </div>
</div>
<?php include ' _footer.php'; ?>