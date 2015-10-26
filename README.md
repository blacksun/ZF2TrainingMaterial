## Environnement de travail

Nous avons imaginé pour vous un environnement de travail: 

- pratique,

- facile de mise en place, (preconfiguré)

- optimisé pour le développement ZF2

Nous vous fournissons une machine virtuelle Vagrant configurée avec comme base un serveur ubuntu/trusty64.
Preinstallés ("provisionnés"), vous trouverez Zend Server, Mysql, Git et Composer.

Nous imaginons de travailler avec l'IDE Zend Studio sur la machine client (la votre, que ce soit du Windows, Mac ou Linux). 

Mais vous etes libres de choisir votre environnement.
Il faudra par contre assumer vos choix : je ne serai pas là pour vous aider sur les problémes des environnements "autres". 

## Installation de VirtualBox

- Télécharger la dernière version VirtualBox [ici](https://www.virtualbox.org/wiki/Downloads).

- Installer VirtualBox sur votre machine.

## Installation de Vagrant

- Télécharger la dernière version de Vagrant [ici](https://www.vagrantup.com/downloads.html).

- Installer Vagrant sur votre machine.

## Installation de Zend Studio

Nous vous conseillons d'installer Zend Studio sur votre machine (Windows, Linux ou Mac).

En tant qu'étudiants (ou en tant que développeurs open source) vous avez droit a une licence gratuite valide pour un an.
Je vous communiquerez votre licence pendant la prochaine séance de Novembre.

Pour pouvoir vous attribuer la licence et télécharger Zend Studio, une inscription avec un'email valide est demandée. 

- Téléchargez Zend Studio  [ici](http://www.zend.com/en/products/studio/download).

> Sous Windows, installez l'exécutable téléchargé.

> Sous Linux, décompresser le fichier, naviguez en ligne de commande à la racine du decompressé 
et exécutez "ZendStudio"

### Configuration Plugins

A la première ouverture de Zend Studio, l'écran d'accueil "Welcome" vous permet de configurer rapidement votre environnement de travail.

Profitez-en pour rajouter les plugins "Terminal" et "Markdown editor". 

Je vous conseille aussi de vous donner la possibilité de tester PHP 7 en cochant simplement la case correspondante.

## Installation de la VM

Le matériel pour le cours est sur github https://github.com/blacksun/ZF2TrainingMaterial

Faites un git clone du projet.

> Dans Zend Studio : File => New => PHP Project from Github => 
dans le champ URL collez https://github.com/blacksun/ZF2TrainingMaterial.git
=> Finish

Ouvrir un terminale dans le repertoire ZF2TrainingMaterial/Vagrant

> Dans Zend Studio :

> - Cliquez sur le répertoire ZF2TrainingMaterial/Vagrant

> - Cliquez sur l'icône du terminal (ou Ctrl+Alt+Shift+T)

> - Choisissez 'Local Terminal' UTF8

- Remontez la VM avec

```shell
> vagrant up 
```



## Configuration de la VM

Nous avons configuré l'ip de la VM auprès du reseau de l'hote a 192.168.33.10 
Le nom choisi pour la vm est "zf2-training" et la RAM allouée de 1GB

Dans le "vagrantFile" :

```shell
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.provider "virtualbox" do |vm|
    vm.name = "zf2-training"
  	vm.memory = 1024
  end
```

Vous pouvez changer cela si vous voulez.

- rajoutez le nom 'zf2-training' dans votre fichier hosts

> sous Windows, c:/Windows/system32/drivers/etc/hosts

> Sous Linux, /etc/hosts

```shell
192.168.33.10 zf2-training
```

## Configuration de la VM

**vagrant** est l'user linux utilisé pour l'install. Il est sudoer.

**NB** cette install a pour but la simplicité et ne se soucie pas de la sécurité.
Ne prenez pas example sur cette install pour des machines de prod ou de recette. 

- Connectez-vous en SSH en utilisant comme login et password "vagrant"

> Dans Zend Studio :

> Terminal => SSH Terminal => Host: zf2-training

### Install Zend Server

Zend Server est provisionné.

Pour l'activer, il suffit d'ouvrir le navigateur à l'adresse **zf2-training:10081** 
et de suivre les étapes. Choisir un profil "Development".


## Ajout du project Hello World

L'idée de base du travail avec les VM Vagrant est d'utiliser pour les projets 
des repertoires partagés entre le serveur et le client.

Nous avons déjà monté le répertoire du projet HelloWorld dans Vagrant, 
comme étant un répertoire partagé dans */home/vagrant*. 

Vous pouvez vérifier en passant par la console SSH de notre machine

```shell
> ls /home/vagrant
```
Vous verrez le repertoire HelloWorld.

### Initialisation du projet

Créez une squelette du projet ZF2 dans le répertoire HelloWorld.

> Dans Zend Studio :

> File => New => Local PHP Project => 
**Project Name** : **_HelloWorld_**, **Content** : **_Zend Framework_** => Finish

> Effacez le repertoire **HelloWorld** dans **ZF2TrainingMaterial/Vagrant**

> Click droit sur HelloWorld => Refactor => Move => Browse => 
Selectionner **ZF2TrainingMaterial/Vagrant**
 
### Création du virtual host

- Dans Zend Server :

- Applications => Virtual Hosts => Click Add Virtual Host

- Virtual Host Name: **local.hello-world** 

- Next => Next

- Cochez "Edit the virtual host configuration template" et remplacé la variable 
${docroot} par /home/vagrant/HelloWorld/public/ pour DocumentRoot et Directory

- Next => Next

- Restart Zend Server

- Il faut definir le nouveau virtual host dans le fichier hosts de la VM sous /etc en rajoutant cette ligne

```shell
127.0.0.1 localhost zf2-training local.hello-world
```

Maintenant pour utiliser ce virtual Host dans notre machine, 
on doit rajouter son nom dans le fichier hosts (voir plus haut)

```shell
192.168.33.10 zf2-training local.hello-world
```

Si tout s'est correctement déroulé, en ouvrant votre navigateur à l'adresse 

**http://local.hello-world** vous devriez voir la page d'accueil du skeleton ZF2

### Déclaration du projet comme application Zend Server

- "Applications" => "Manage Apps" => "Define Application"

- Base Url: http://local.hello-world:80  (autocomplete)

- Application Name: Hello World (ou ce que vous voulez)

- "Define" => Restart Zend Server 

### Connecter Zend Server à Zend Studio

- Dans Zend Studio: Window => Preferences => PHP => Servers

- New => Remote Zend Server => Name: zf2-training