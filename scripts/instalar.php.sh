#!/bin/bash

echo "================================="
echo " INSTALACIÓN DE PHP"
echo "================================="

echo "Actualizando repositorios..."
sudo apt update

echo "Instalando PHP..."
sudo apt install php libapache2-mod-php php-mysql -y

echo "Reiniciando Apache..."
sudo systemctl restart apache2

echo "================================="
echo " PHP instalado correctamente"
echo "================================="
