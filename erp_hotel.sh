#!/bin/bash

cd ~/omega_hotel_erp || exit

echo "======================================"
echo " 🔄 Démarrage services OMEGA ERP"
echo "======================================"

# 🔥 1. Démarrer MariaDB
echo "📦 Démarrage MariaDB..."
service mariadb restart

sleep 2

# 🔥 2. Stop ancien serveur PHP si existant
pkill -f "php -S 0.0.0.0:8000" 2>/dev/null

echo "======================================"
echo " 🏨 OMEGA HOTEL ERP 2026"
echo "======================================"

# 🔥 3. Lancer serveur PHP
php -S 0.0.0.0:8000 -t public >/tmp/omega_hotel.log 2>&1 &

sleep 2

# 🔥 4. Ouvrir navigateur
termux-open-url "http://127.0.0.1:8000/?url=dashboard"

echo ""
echo "✅ Serveur lancé avec succès"
echo "🌐 URL : http://127.0.0.1:8000/?url=dashboard"
echo "🗄 MariaDB : redémarré"
echo ""
