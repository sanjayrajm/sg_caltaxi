<?php
// Simple translations: English (default) and Tamil (ta)
$translations = [
  'en' => [
    'home' => 'Home', 'tariff' => 'Tariff', 'book_now' => 'Book Now', 'contact' => 'Contact Us',
    'welcome' => 'Welcome to SG Call Taxi', 'reliable' => 'Reliable taxi service in Kanchipuram.'
  ],
  'ta' => [
    'home' => 'முகப்பு', 'tariff' => 'விலைப்பட்டியல்', 'book_now' => 'புக் செய்யவும்', 'contact' => 'தொடர்புக்கு',
    'welcome' => 'SG கூல் டாக்ஸிக்கு வரவேற்பு', 'reliable' => 'காஞ்சிபுரத்தில் நம்பகமான டாக்சி சேவை.'
  ]
];
$lang = $_GET['lang'] ?? ($_COOKIE['lang'] ?? 'en');
if (!in_array($lang, ['en','ta'])) $lang = 'en';
setcookie('lang', $lang, time() + 60*60*24*30, '/');
function t($key) { global $translations, $lang; return $translations[$lang][$key] ?? $key; }
?>