#!/bin/bash
# Requires wkhtmltopdf installed on the server.
# Usage: ./generate_tariff_pdf.sh http://localhost/public/tariff-download.php /path/to/output/tariff.pdf
if [ $# -lt 2 ]; then
  echo "Usage: $0 <url> <output.pdf>"
  exit 1
fi
URL="$1"
OUT="$2"
wkhtmltopdf "$URL" "$OUT"
echo "PDF generated at $OUT"
