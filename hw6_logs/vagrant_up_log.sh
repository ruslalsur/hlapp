~/dev/hlapp.local >>> vagrant up                                                                        ±[●●][hw6]
Bringing machine 'balancer' up with 'virtualbox' provider...
Bringing machine 'server1' up with 'virtualbox' provider...
Bringing machine 'server2' up with 'virtualbox' provider...
==> balancer: Checking if box 'bento/ubuntu-20.04' version '202008.16.0' is up to date...
==> balancer: Clearing any previously set forwarded ports...
==> balancer: Clearing any previously set network interfaces...
==> balancer: Preparing network interfaces based on configuration...
    balancer: Adapter 1: nat
    balancer: Adapter 2: hostonly
==> balancer: Forwarding ports...
    balancer: 80 (guest) => 8080 (host) (adapter 1)
    balancer: 22 (guest) => 2222 (host) (adapter 1)
==> balancer: Running 'pre-boot' VM customizations...
==> balancer: Booting VM...
==> balancer: Waiting for machine to boot. This may take a few minutes...
    balancer: SSH address: 127.0.0.1:2222
    balancer: SSH username: vagrant
    balancer: SSH auth method: private key
==> balancer: Machine booted and ready!
==> balancer: Checking for guest additions in VM...
==> balancer: Setting hostname...
==> balancer: Configuring and enabling network interfaces...
==> balancer: Rsyncing folder: /home/rusla/dev/hlapp.local/ => /home/vagrant/dev/app
==> balancer:   - Exclude: [".vagrant/", ".idea/"]
==> balancer: Machine already provisioned. Run `vagrant provision` or use the `--provision`
==> balancer: flag to force provisioning. Provisioners marked to run always will still run.
==> balancer: Running provisioner: shell...
    balancer: Running: inline script
    balancer: Hello from the Balancer
==> server1: Checking if box 'bento/ubuntu-20.04' version '202008.16.0' is up to date...
==> server1: Clearing any previously set forwarded ports...
==> server1: Fixed port collision for 22 => 2222. Now on port 2200.
==> server1: Clearing any previously set network interfaces...
==> server1: Preparing network interfaces based on configuration...
    server1: Adapter 1: nat
    server1: Adapter 2: hostonly
==> server1: Forwarding ports...
    server1: 22 (guest) => 2200 (host) (adapter 1)
==> server1: Running 'pre-boot' VM customizations...
==> server1: Booting VM...
==> server1: Waiting for machine to boot. This may take a few minutes...
    server1: SSH address: 127.0.0.1:2200
    server1: SSH username: vagrant
    server1: SSH auth method: private key
==> server1: Machine booted and ready!
==> server1: Checking for guest additions in VM...
==> server1: Setting hostname...
==> server1: Configuring and enabling network interfaces...
==> server1: Rsyncing folder: /home/rusla/dev/hlapp.local/ => /home/vagrant/dev/app
==> server1:   - Exclude: [".vagrant/", ".idea/"]
==> server1: Machine already provisioned. Run `vagrant provision` or use the `--provision`
==> server1: flag to force provisioning. Provisioners marked to run always will still run.
==> server1: Running provisioner: shell...
    server1: Running: inline script
    server1: Hello from the Server1
==> server2: Checking if box 'bento/ubuntu-20.04' version '202008.16.0' is up to date...
==> server2: Clearing any previously set forwarded ports...
==> server2: Fixed port collision for 22 => 2222. Now on port 2201.
==> server2: Clearing any previously set network interfaces...
==> server2: Preparing network interfaces based on configuration...
    server2: Adapter 1: nat
    server2: Adapter 2: hostonly
==> server2: Forwarding ports...
    server2: 22 (guest) => 2201 (host) (adapter 1)
==> server2: Running 'pre-boot' VM customizations...
==> server2: Booting VM...
==> server2: Waiting for machine to boot. This may take a few minutes...
    server2: SSH address: 127.0.0.1:2201
    server2: SSH username: vagrant
    server2: SSH auth method: private key
==> server2: Machine booted and ready!
==> server2: Checking for guest additions in VM...
==> server2: Setting hostname...
==> server2: Configuring and enabling network interfaces...
==> server2: Rsyncing folder: /home/rusla/dev/hlapp.local/ => /home/vagrant/dev/app
==> server2:   - Exclude: [".vagrant/", ".idea/"]
==> server2: Machine already provisioned. Run `vagrant provision` or use the `--provision`
==> server2: flag to force provisioning. Provisioners marked to run always will still run.
==> server2: Running provisioner: shell...
    server2: Running: inline script
    server2: Hello from the Server2
~/dev/hlapp.local >>> vagrant status                                                                    ±[●●][hw6]
Current machine states:

balancer                  running (virtualbox)
server1                   running (virtualbox)
server2                   running (virtualbox)

This environment represents multiple VMs. The VMs are all listed
above with their current state. For more information about a specific
VM, run `vagrant status NAME`.
