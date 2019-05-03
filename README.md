"# projet3"
Projet d'étude chef de projet multimédia spécialité developpement web
## Conception
Ce site a été concu pour Jean Forteroche, écrivain.
Il sagit d'un blog coder en HTML5, CSS3, Bootstrap4, PHP7 et MYSQL.
Le site utilise un CRUD pour ses chapitres.
Pour la rédaction des chapitre le site utilise TinyMCE(lien de leurs github : https://github.com/tinymce/tinymce ) et PHPMailer(lien de leurs github : https://github.com/PHPMailer/PHPMailer) pour le systeme de newsletter et de notification.
Le lien github pour cloner le projet : https://github.com/tuxultima/projet3 .
L'utilisation de composer est recommander pour télécharger PHPmailer et TinyMCE (https://getcomposer.org).
Coter front le site utilise Bootstrap 4(https://getbootstrap.com/).

Une fois le projet télécharger : 
```
composer install
```


## Table SQL

Liste des différentes table qui devrons être crée pour le fonctionnoment du site :


Table pour les chapitres
```sql
CREATE TABLE IF NOT EXISTS `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(65) NOT NULL,
  `content` text NOT NULL,
  `dateUpload` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
```


Table pour les commentaires
```sql
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(65) NOT NULL,
  `comment` text NOT NULL,
  `dateUpload` datetime NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `reported` tinyint(4) NOT NULL,
  `moderate` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
```


Table pour les contacts
```sql
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(65) NOT NULL,
  `sujet` varchar(65) NOT NULL,
  `message` text NOT NULL,
  `boolnews` tinyint(4) NOT NULL,
  `rgpd` tinyint(4) NOT NULL,
  `processed` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
```


Table pour la newsletter
```sql
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(65) NOT NULL,
  `rgpd` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
```

Table pour l'admin
```sql
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password_token` varchar(65) NOT NULL,
  `tokenAddDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
```