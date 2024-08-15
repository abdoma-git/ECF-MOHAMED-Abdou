<h2 align="center">ECF-MOHAMED-Abdou : STANIA BET WEBSITE (PHP)<h2>

<h5>Cette branche contient les fichiers de developpement de l'application STANIA (SUPER BOWL) en Php, ce fichier README contient les differents etapes et requirements pour lancer cette application en Local (MAMP/XAMP, PhpMyAdmin, htdocs, Visual Studio Code).</h5>

# I-Lancer une Application PHP en Local avec MAMP

Ce guide explique comment configurer et exécuter une application PHP localement en utilisant MAMP, `htdocs`, PhpMyAdmin et Visual Studio Code.

## Prérequis

- [MAMP](https://www.mamp.info/en/downloads/)
- [Visual Studio Code](https://code.visualstudio.com/Download)
- Navigateur web (comme Chrome, Firefox, etc.)

## Étapes pour Lancer l'Application

### 1. Installation de MAMP

1. Téléchargez et installez [MAMP](https://www.mamp.info/en/downloads/) sur votre machine.
2. Une fois installé, lancez MAMP.
3. Assurez-vous que le serveur Apache et MySQL sont démarrés. Vous pouvez voir leur statut dans la fenêtre de MAMP.

### 2. Configuration de l'Environnement Local

1. **Configurer le dossier `htdocs` :**
   - Placez votre projet PHP dans le répertoire `htdocs` de MAMP. Par défaut, ce répertoire se trouve ici :
     - **macOS** : `/Applications/MAMP/htdocs/`
     - **Windows** : `C:\MAMP\htdocs\`
   - Par exemple, si votre projet s'appelle `mon-projet`, placez-le dans le répertoire `htdocs` de manière à ce qu'il soit accessible via : `C:\MAMP\htdocs\mon-projet`.

2. **Configuration de la base de données avec PhpMyAdmin :**
   - Accédez à [http://localhost/phpmyadmin](http://localhost/phpmyadmin) dans votre navigateur pour ouvrir PhpMyAdmin.
   - Créez une nouvelle base de données pour votre projet.
   - Importez le fichier SQL (le cas échéant) dans cette base de données pour initialiser les tables.

### 3. Édition et Configuration du Code avec Visual Studio Code

1. Ouvrez Visual Studio Code.
2. Cliquez sur "File" > "Open Folder..." et sélectionnez le répertoire de votre projet dans `htdocs`.
3. Vérifiez le fichier de configuration de la base de données (souvent `config.php` ou `database.php`) pour vous assurer que les paramètres de connexion à la base de données sont corrects :
   ```php
   <?php
   $host = 'localhost';
   $dbname = 'cours';
   $username = 'root';
   $password = 'root'; // Ou vide selon la configuration par défaut de MAMP
   ?>

 # II - Execution de l'application Web STANIA

 <img width="350" height="300" src="captures/c1.png">
 <br>
  <img width="350" height="300" src="captures/c2.png">
 <br>
  <img width="350" height="300" src="captures/c3.png">
 <br>
  <img width="350" height="300" src="captures/c4.png">
 <br>
  <img width="350" height="300" src="captures/c5.png">
 <br>
 
