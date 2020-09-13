Vagrant.configure('2') do |config|
   config.vm.define 'server1' do |server1|
     server1.vm.hostname = 'server1'
     server1.vm.box = 'bento/ubuntu-20.04'
     server1.vm.network 'private_network', ip: '10.0.0.20'
     server1.vm.network "forwarded_port", guest: 80, host: 8080
      server1.vm.synced_folder '.', '/vagrant', disabled: true
     server1.vm.synced_folder '.', '/home/vagrant/dev/app1', type: 'rsync', SharedFoldersEnableSymlinksCreate: false, rsync__auto: true,
       rsync__exclude: ["Vagrantfile", ".idea/", ".git/", ".gitignore", "vendor/", "composer.json", "composer.lock"]
      server1.vm.provider 'virtualbox' do |vbox|
       vbox.name = 'server1'
       vbox.gui = false
       vbox.memory = '1024'
     end
     server1.vm.provision 'shell', run: 'always', inline: <<-SHELL
       echo "Hello from the Server1"
     SHELL
   end
    config.vm.define 'server2' do |server2|
     server2.vm.hostname = 'server2'
     server2.vm.box = 'bento/ubuntu-20.04'
     server2.vm.network 'private_network', ip: '10.0.0.30'
      server2.vm.synced_folder '.', '/vagrant', disabled: true
     server2.vm.synced_folder '.', '/home/vagrant/dev/app1', type: 'rsync', SharedFoldersEnableSymlinksCreate: false, rsync__auto: true,
       rsync__exclude: ["Vagrantfile", ".idea/", ".git/", ".gitignore", "vendor/", "composer.json", "composer.lock"]
      server2.vm.provider 'virtualbox' do |vbox|
       vbox.name = 'server2'
       vbox.gui = false
       vbox.memory = '1024'
     end
     server2.vm.provision 'shell', run: 'always', inline: <<-SHELL
       echo "Hello from the Server2"
     SHELL
   end
 end