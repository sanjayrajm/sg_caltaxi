<?php require_once __DIR__ . '/../database/db.php';
$name = trim($_POST['name'] ?? ''); $phone = trim($_POST['phone'] ?? ''); $category = trim($_POST['category'] ?? ''); $pickup = trim($_POST['pickup'] ?? ''); $drop = trim($_POST['drop'] ?? ''); $time = trim($_POST['time'] ?? '');
if (!$name||!$phone||!$category||!$pickup||!$drop||!$time) die('Missing fields');
$stmt = $pdo->prepare('INSERT INTO bookings (customer_name, customer_phone, category, pickup, drop_loc, trip_time, status) VALUES (?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$name,$phone,$category,$pickup,$drop,$time,'pending']); $id = $pdo->lastInsertId();
header('Location: booking-success.php?id=' . $id); exit; ?>