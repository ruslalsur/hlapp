~/dev/hlapp.local >>> vagrant ssh balancer                                                             ±[●●●][hw6]
Welcome to Ubuntu 20.04.1 LTS (GNU/Linux 5.4.0-42-generic x86_64)

vagrant@balancer:~$ sudo vim /etc/nginx/nginx.conf
vagrant@balancer:~$ sudo vim /etc/nginx/conf.d/app.local.conf
vagrant@balancer:~$ sudo nginx -t
nginx: the configuration file /etc/nginx/nginx.conf syntax is ok
nginx: configuration file /etc/nginx/nginx.conf test is successful
vagrant@balancer:~$ sudo systemctl restart nginx

vagrant@balancer:~$ sudo sed -i '1i 10.0.0.20\tserver1.local' /etc/hosts
vagrant@balancer:~$ sudo sed -i '1i 10.0.0.30\tserver2.local' /etc/hosts
vagrant@balancer:~$ cat /etc/hosts
10.0.0.30	server2.local
10.0.0.20	server1.local
127.0.0.1	localhost
127.0.1.1	balancer	balancer

# The following lines are desirable for IPv6 capable hosts
::1     localhost ip6-localhost ip6-loopback
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters
