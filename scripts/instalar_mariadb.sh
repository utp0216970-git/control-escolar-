#!/bin/bash

echo "================================="
echo " INSTALACIÓN DE MARIADB"
echo "================================="

echo "Actualizando repositorios..."
sudo apt update

echo "Instalando MariaDB..."
sudo apt install mariadb-server mariadb-client -y

echo "Iniciando MariaDB..."
sudo systemctl start mariadb

echo "Configurando MariaDB para iniciar automáticamente..."
sudo systemctl enable mariadb

echo "================================="
echo " MariaDB instalado correctamente"
echo "================================="
