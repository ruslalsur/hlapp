Vagrant.configure("2") do |config|
  config.vm.define "master", primary: true do |master|
    master.vm.hostname = "master"
    master.vm.box = "bento/ubuntu-20.04"
    master.vm.network "private_network", ip: "10.0.0.10"

    master.vm.synced_folder ".", "/vagrant", disabled: true
    master.vm.synced_folder ".", "/home/vagrant/dev/app", type: "rsync", SharedFoldersEnableSymlinksCreate: false, rsync__auto: true, rsync__exclude: ['.idea/']

    master.vm.provider "virtualbox" do |vbox|
      vbox.name = "master"
      vbox.gui = false
      vbox.memory = "1024"
    end

    master.vm.provision "shell", run: "always", inline: <<-SHELL
      echo "Hello from the Master virtual machine"
    SHELL
  end

  config.vm.define "slave" do |slave|
    slave.vm.hostname = "slave"
    slave.vm.box = "bento/ubuntu-20.04"
    slave.vm.network "private_network", ip: "10.0.0.20"

    slave.vm.synced_folder ".", "/vagrant", disabled: true
    slave.vm.synced_folder ".", "/home/vagrant/dev/app", type: "rsync", SharedFoldersEnableSymlinksCreate: false, rsync__auto: true, rsync__exclude: ['.idea/']

    slave.vm.provider "virtualbox" do |vbox|
      vbox.name = "slave"
      vbox.gui = false
      vbox.memory = "1024"
    end

    slave.vm.provision "shell", run: "always", inline: <<-SHELL
      echo "Hello from the Slave virtual machine"
    SHELL
  end
end
