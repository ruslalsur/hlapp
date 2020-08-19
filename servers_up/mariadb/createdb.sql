CREATE DATABASE IF NOT EXISTS hlappdb;
CREATE USER 'hlappuser'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON appdb.* to 'hlappuser'@'localhost';

FLUSH PRIVILEGES;

SHOW DATABASES;
SHOW GRANTS FOR hlappuser@localhost;
