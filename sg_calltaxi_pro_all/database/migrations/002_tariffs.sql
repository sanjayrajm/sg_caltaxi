-- Create tariffs table
CREATE TABLE IF NOT EXISTS tariffs (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  category TEXT,
  distance TEXT,
  fare REAL,
  unit TEXT,
  notes TEXT
);
-- Add category to bookings if not present (SQLite simple alter)
PRAGMA foreign_keys=off;
BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS new_bookings AS SELECT * FROM bookings;
DROP TABLE IF EXISTS bookings;
CREATE TABLE bookings (id INTEGER PRIMARY KEY AUTOINCREMENT, customer_name TEXT, customer_phone TEXT, category TEXT, pickup TEXT, drop_loc TEXT, trip_time TEXT, driver_id INTEGER, status TEXT DEFAULT 'pending', fare REAL DEFAULT 0, created_at TEXT DEFAULT CURRENT_TIMESTAMP);
-- (Note: if using MySQL, use the provided MySQL migrations file in /database/migrations)
COMMIT;
PRAGMA foreign_keys=on;
