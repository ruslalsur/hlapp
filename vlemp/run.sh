#!/bin/bash
sudo apt update -y
sudo apt upgrade -y
sudo apt install -y nginx php7.4 php7.4-fpm php7.4-mysql php-common php7.4-cli php7.4-common php7.4-json php7.4-opcache php7.4-readline php7.4-mbstring php7.4-xml php7.4-gd php7.4-curl php-xdebug mariadb-server mariadb-client git composer npm vim unzip
git config --global user.email "suhrugen@gmail.com"
git config --global user.name "rusla"
sudo usermod -aG mysql $USER
sudo chown www-data:www-data /home/vagrant/dev/app1/public -R
sudo systemctl enable nginx php7.4-fpm mariadb
sudo rm /etc/nginx/sites-enabled/default
sudo cp -R ./nginx/* /etc/nginx
sudo cp -R ./php/conf.d/* /etc/php/7.4/fpm/conf.d
sudo mysql_secure_installation
sudo mysql -uroot -proot < ./mariadb/createdb.sql
sudo systemctl reload nginx php7.4-fpm mariadb
sudo systemctl status nginx php7.4-fpm mariadb
