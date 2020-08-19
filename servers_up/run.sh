#!/bin/bash
sudo pamac install nginx mariadb php php-fpm php-gd php-intl composer npm xdebug phpmyadmin git vim unzip --no-confirm
sudo mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql
sudo usermod -aG mysql $USER

sudo cp -R ./nginx/* /etc/nginx
sudo cp -R ./php/conf.d/* /etc/php/conf.d

sudo sed -i 's/user = http/user = $USER/g' /etc/php/php-fpm.d/www.conf
sudo sed -i 's/group = http/group = $USER/g' /etc/php/php-fpm.d/www.conf
sudo sed -i 's/listen.owner = http/listen.owner = $USER/g' /etc/php/php-fpm.d/www.conf
sudo sed -i 's/listen.group = http/listen.group = $USER/g' /etc/php/php-fpm.d/www.conf
sudo sed -i 's/;listen.mode = 0660/listen.mode = 0660/g' /etc/php/php-fpm.d/www.conf

sudo sed -i '1i 127.0.0.1\thlapp.local pma' /etc/hosts

mkdir -p ~/dev/app.local
sudo systemctl enable nginx php-fpm mariadb && sudo systemctl start nginx php-fpm mariadb
sudo mysql_secure_installation && sudo mysql -uroot -proot < ./mariadb/createdb.sql
