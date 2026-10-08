#!/bin/bash

echo "================================="
echo " INSTALACIÓN DE APACHE"
echo "================================="

echo "Actualizando repositorios..."
sudo apt update

echo "Instalando Apache..."
sudo apt install apache2 -y

echo "Iniciando Apache..."
sudo systemctl start apache2

echo "Configurando Apache para iniciar automáticamente..."
sudo systemctl enable apache2

echo "================================="
echo " Apache instalado correctamente"
echo "================================="
