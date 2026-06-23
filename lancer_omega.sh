#!/bin/bash

cd ~/omega_hotel_erp || exit

pkill -f "php -S 0.0.0.0:8000" 2>/dev/null

echo "======================================"
echo " OMEGA HOTEL ERP 2026"
echo "======================================"

php -S 0.0.0.0:8000 -t public >/tmp/omega_hotel.log 2>&1 &

sleep 2

termux-open-url "http://127.0.0.1:8000/?url=dashboard"

echo ""
echo "Serveur lancé"
echo "URL : http://127.0.0.1:8000/?url=dashboard"
echo ""
