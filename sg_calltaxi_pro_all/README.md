SG Call Taxi - Professional Tariff Redesign (Localhost)

What I built:
- Redesigned Tariff page with professional UI and filters (/public/tariff.php)
- Tariff management in admin panel (/admin/tariffs.php)
- Bookings now reference tariff category; booking form shows categories
- Tariff download / printable page
- SQLite DB pre-seeded for localhost in storage/db.sqlite

Localhost setup:
1. Unzip the project.
2. From project root run: php -S 0.0.0.0:8000 -t .
3. Open:
   - Tariff: http://localhost:8000/public/tariff.php
   - Book: http://localhost:8000/public/book.php
   - Admin: http://localhost:8000/admin/login.php (demo admin: admin@example.com / admin123)

Notes:
- For production, replace SQLite with MySQL and run migrations in database/migrations/*.sql
- I modelled the tariff page layout and content after https://www.sgcalltaxi.com/tariff.php but improved UI, usability and admin management.


### Additional enhancements (requested 'ALL')
- MySQL seed updated with bcrypt-hashed admin password (demo admin: admin@example.com / admin123). Seed file updated.
- CSV import/export for tariffs (admin/tariffs_import.php, admin/tariffs_export.php).
- Printable PDF generation: endpoint public/tariff_pdf.php and script scripts/generate_tariff_pdf.sh (requires wkhtmltopdf).
- Multilingual support (English/Tamil): config/lang.php and language selector in header.
- Improved visual design and logo placeholder: public/css/style.css and public/images/logo-placeholder.png.

### How to generate PDF locally
1. Install wkhtmltopdf (Ubuntu: sudo apt install wkhtmltopdf).
2. Start PHP server: php -S 0.0.0.0:8000 -t .
3. Run: ./scripts/generate_tariff_pdf.sh http://localhost:8000/public/tariff_pdf.php ./tariff.pdf

