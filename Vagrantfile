Vagrant.configure("2") do |config|
  config.vm.box = "pending-soft-reboot/manjaro64-kde-20.0.3-minimal"
  config.vm.box_version = "2020.08.23"
  
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "forwarded_port", guest: 3306, host: 33060
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
  # config.vm.network "private_network", ip: "192.168.33.10"
  # config.vm.network "public_network"
  
  config.vm.synced_folder ".", "/vagrant", disabled: true
  config.vm.synced_folder ".", "/home/vagrant/dev/app", type: "rsync", SharedFoldersEnableSymlinksCreate: false, rsync__auto: true, rsync__exclude: ['.idea/']
  
  config.vm.provider "virtualbox" do |vb|
    vb.gui = false
    vb.memory = "1024"
  end
  
  # config.vm.provision "shell", inline: <<-SHELL
  #   apt-get update
  #   apt-get install -y apache2
  # SHELL  
end
