Vagrant.configure("2") do |config|
  config.vm.define "master" do |master|
    master.vm.hostname = "master"
    master.vm.box = "bento/ubuntu-20.04"
    master.vm.network "forwarded_port", guest: 80, host: 8080
    #master.vm.network "forwarded_port", guest: 6979, host: 6979
    #master.vm.network "forwarded_port", guest: 3306, host: 33060
    #master.vm.network "forwarded_port", guest: 11211, host: 11211

    master.vm.synced_folder ".", "/vagrant", disabled: true
    master.vm.synced_folder ".", "/home/vagrant/dev/app", type: "rsync", SharedFoldersEnableSymlinksCreate: false, rsync__auto: true, rsync__exclude: ['.idea/']

    master.vm.provider "virtualbox" do |vbox|
      vbox.name = "master"
      vbox.gui = false
      vbox.memory = "1024"
    end

    # master.vm.provision "shell", run: "always", inline: <<-SHELL
    #  echo "Hello from the virtual machine"
    # SHELL
  end
end