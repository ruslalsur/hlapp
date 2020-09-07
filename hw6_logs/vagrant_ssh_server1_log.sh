~/dev/hlapp.local >>> vagrant ssh server1                                                             ±[●●●][hw6]
Welcome to Ubuntu 20.04.1 LTS (GNU/Linux 5.4.0-42-generic x86_64)

vagrant@balancer:~$ sudo vim /etc/nginx/conf.d/app.local.conf
vagrant@balancer:~$ cat /etc/nginx/conf.d/app.local.conf
server {
  listen 8080;
  listen [::]:8080;
  server_name   www.server1.local server1.local;
  root /home/vagrant/dev/app/public;
  index index.php index.html index.htm index.nginx-debian.html;

  location / {
    try_files $uri $uri/ /index.php;
  }

  location ~ \.php$ {
    fastcgi_pass unix:/run/php/php7.4-fpm.sock;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
    include snippets/fastcgi-php.conf;
  }

 # A long browser cache lifetime can speed up repeat visits to your page
  location ~* \.(jpg|jpeg|gif|png|webp|svg|woff|woff2|ttf|css|js|ico|xml)$ {
       access_log        off;
       log_not_found     off;
       expires           360d;
  }

  # disable access to hidden files
  location ~ /\.ht {
      access_log off;
      log_not_found off;
      deny all;
  }
}

vagrant@balancer:~$ sudo systemctl restart nginx
