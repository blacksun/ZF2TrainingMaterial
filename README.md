## Environnement de travail

Nous avons imaginé pour vous un environnement de travail: 

- pratique,

- facile de mise en place, (preconfiguré)

- optimisé pour le développement ZF2

Une machine virtual sur Vagrant contient un serveur ubuntu/trusty64 avec Zend server , service Mysql et git integrés. 

Si les choix que nous avons faites ne vous conviennent pas, vous etes libres de choisir votre propre environnement.
Il faudra par contre assumer vos choix : je ne serai pas là pour vous aider sur des problémes derivés de vos choix d'environnement. 

## Installation de VirtualBox

- Télécharger la version 4.1.14 de VirtualBox [ici](http://download.virtualbox.org/virtualbox/4.1.42/VirtualBox-4.1.42-103435-Win.exe).

- Installer VirtualBox sur votre machine.

## Installation de Vagrant

- Télécharger la version 1.7.2 de Vagrant [ici](https://dl.bintray.com/mitchellh/vagrant/vagrant_1.7.2.msi).

- Installer Vagrant sur votre machine.

## Installation de la VM

- Importez le projet utilisant git

```shell
> git clone https://github.com/blacksun/Trainings
```

- Allez sur le répertoire Vagrant-VM

```shell
> cd Trainings/Vagrant-VM
```

- Remontez la VM avec

```shell
> vagrant up --provision
```

- Connectez-vous avec

```shell
> user-login : vagrant
> user-password : vagrant
```
## Configuration de la VM

### Install Zend Server

Dans notre fichier de config de vagrant "vagrantFile", Nous avons mis :

```shell
config.vm.network "private_network", ip: "192.168.33.10"
```

Donc pour installer Zend Server, il suffit d'aller sur le browser et on met 192.168.33.10:10081 puis on suit les étapes de l'installation.


### Add project Hello World

Nous avons déjà monté le projet (le répertoire) helloWorld dans Vagrant 

Vous pouvez vérifier en passant par la console de notre machine sur VirtualBox (ou putty.exe en utilisant host:127.0.0.1, port :2222)

```shell
> ls /home/vagrant
```
 et vous allez trouver le repertoire helloWorld.
 
## Création du virtual host

- Créez un nouveau virtual host "local.hello-world"

- Cliquez sur Next

- Cliquez sur Next

- Cochez "Edit the virtual host configuration template" et modifier le variable ${docroot} par /home/vagrant/helloWorld/public/ pour DocumentRoot et Directory

- Cliquez sur Next

- Il faut definir le nouveau virtual host dans le fichier hosts du VM sous /etc en rajoutant cette ligne

```shell
127.0.0.1 local.hello-world
```

Maintenant pour utiliser ce virtual Host dans notre machine, 
on doit rajouter l'adress IP de la VM 192.168.33.10 dans le fichier hosts de notre machine
en rajoutant cette ligne dans c:/Windows/system32/drivers/etc/hosts

```shell
192.168.33.10 local.hello-world
```

## Déclaration du projet comme application Zend Server

- Dans l'onglet "Applications" cliquer sur "Manage Apps"

- Cliquez sur "Define Application"

- Dans le champ "Base Url" il faut choisir le virtual host que vous avez construit "local.hello-world:8000" 

- Donnez un nom pour votre application dans le champ "Application Name"

- Cliquez sur "Define"

- Redemarrez Zend server 

## Install de Zend Studio

Nous allons besoin d'installer Zend studio sur notre machine (Windows, Linux ou Mac).

- Téléchargez Zend studio  [ici](http://www.zend.com/en/products/studio/downloads#Windows).

- Si votre système et 32 bit choisissez le Zend studio - 32 bit sinon le Zend studio - 64 bit.

- Cliquez sur le exe et installez zend studio.

### Configuration Plugins

### Configuration Préférences

### Import du projet helloworld dans la VM et dans Zend Studio.

L'idée de base du travail avec les VM Vagrant est d'utiliser pour les projets 
des repertoires partagés entre le serveur et le client.

Dans notre conf le répertoire du projet helloWorld est déjà partagé entre hôte et client. 
Nous allons donc créer notre projet Zend Studio à partir de ce repertoire.

1. Dans la barre de menu, cliquez sur file puis new

2. Choisissez "PHP Project from remote server"

3. Ajoutez un nom pour votre projet

4. Cliquez sur "Add Server"

5. choisissez "Remote Zend Server" puis cliquez sur Next

6. Donnez un nom au serveur puis cliquez sur Next

7. Renseigner dans le champ Client Ip/Host : 192.168.33.10 (le host de notre VM)

8. Renseignez dans le champ Port :10081 puis cliquer sur Next

9. Cliquez sur "manage"

10. Mettez Alias Name vagrant (peut être autre chose)

11. Renseignez dans Host Name 127.0.0.1

12. Renseignez dans User : vagrant et Password : vagrant

13. le Port Ici doit être 2222

14. choisissez le Directory : c'est bien notre projet alors il sera : /home/vagrant/helloWorld

Pour vérifier que la conexion avec la VM est bonne essayez avec le boutton "test Connection"

15. Cliquez sur Finish

16. Choisissez la connexion dans " Profile" puis cliquez , Next et Finish

17. Cliquez sur Next

Vous aurez le répertoire helloWorld coché déjà.

Cliquez sur finish et vous aurez le projet sur Zend Studio lié à votre VM.

