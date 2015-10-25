## Environnement de travail

Nous avons imaginé pour vous un environnement de travail: 

- pratique,

- facile de mise en place, (preconfiguré)

- optimisé pour le développement ZF2

Nous vous fournissons une machine virtuelle Vagrant qui contient un serveur ubuntu/trusty64.
Preinstallés ("provisionnés"), vous trouverez Zend Server, Mysql et Git.

Nous imaginons de travailler avec l'IDE Zend Studio sur la machine client (la votre, que ce soit du Windows, Mac ou Linux). 

Mais vous etes libres de choisir votre environnement.
Il faudra par contre assumer vos choix : je ne serai pas là pour vous aider sur les problémes des environnements "autres". 

## Installation de VirtualBox

- Télécharger la dernière version VirtualBox [ici](https://www.virtualbox.org/wiki/Downloads).

- Installer VirtualBox sur votre machine.

## Installation de Vagrant

- Télécharger la dernière version de Vagrant [ici](https://www.vagrantup.com/downloads.html).

- Installer Vagrant sur votre machine.

## Installation de la VM

- Importez le projet utilisant git

```shell
> git clone https://github.com/blacksun/ZF2TrainingMaterial.git
```

- Allez sur le répertoire ZF2TrainingMaterial/Vagrant

```shell
> cd ZF2TrainingMaterial/Vagrant
```

- Remontez la VM avec

```shell
> vagrant up --provision
```

- Connectez-vous avec

```shell
> login : vagrant
> password : vagrant
```
## Configuration de la VM

Nous avons configuré l'ip de la VM auprès du reseau de l'hote a 192.168.33.10 

Dans le "vagrantFile" :

```shell
config.vm.network "private_network", ip: "192.168.33.10"
```

Vous pouvez changer cela si vous voulez.

### Install Zend Server

Zend Server est provisionné.
Pour l'activer, il suffit d'ouvrir le navigateur à l'adresse 192.168.33.10:10081 
et de suivre les étapes. Choisir un profil "Development".


## Ajout du project Hello World

Nous avons déjà monté le répertoire du projet helloWorld dans Vagrant 

Vous pouvez vérifier en passant par la console de notre machine sur VirtualBox (ou putty.exe en utilisant host:127.0.0.1, port :2222)

```shell
> ls /home/vagrant
```
 et vous allez trouver le repertoire helloWorld.
 
### Création du virtual host

- Dans Zend Server, cliquer sur "Applications" 

- Créez un nouveau virtual host "local.hello-world"

- Cliquez sur Next

- Cliquez sur Next

- Cochez "Edit the virtual host configuration template" et modifier la variable 
${docroot} par /home/vagrant/helloWorld/public/ pour DocumentRoot et Directory

- Cliquez sur Next

- Il faut definir le nouveau virtual host dans le fichier hosts du VM sous /etc en rajoutant cette ligne

```shell
127.0.0.1 local.hello-world
```

Maintenant pour utiliser ce virtual Host dans notre machine, 
on doit rajouter l'adress IP de la VM 192.168.33.10 dans le fichier hosts de notre machine

> Sous Windows en rajoutant cette ligne dans c:/Windows/system32/drivers/etc/hosts

> Sous Linux rajouter cette ligne dans le fichier /etc/hosts

```shell
192.168.33.10 local.hello-world
```

### Déclaration du projet comme application Zend Server

- Dans l'onglet "Applications" cliquer sur "Manage Apps"

- Cliquez sur "Define Application"

- Dans le champ "Base Url" il faut choisir le virtual host que vous avez construit "local.hello-world:8000" 

- Donnez un nom pour votre application dans le champ "Application Name"

- Cliquez sur "Define"

- Redemarrez Zend Server 

## Install de Zend Studio

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
