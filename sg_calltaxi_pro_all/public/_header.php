<?php
// Header include with Bootstrap and site nav
require_once __DIR__ . '/../config/lang.php';
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>SG Call Taxi - Professional</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/public/css/style.css" rel="stylesheet">
</head><body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/public/index.php">SG Call Taxi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/public/index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/public/tariff.php">Tariff</a></li>
        <li class="nav-item"><a class="nav-link" href="/public/book.php">Book Now</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/login.php">Admin</a></li>
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="langDrop" role="button" data-bs-toggle="dropdown">Language</a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDrop">
      <li><a class="dropdown-item" href="?lang=en">English</a></li>
      <li><a class="dropdown-item" href="?lang=ta">தமிழ்</a></li>
    </ul>
  </li>
</ul>
    </div>
  </div>
</nav>
<main class="container py-4">