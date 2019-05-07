"# projet3"
Projet d'étude chef de projet multimédia spécialité developpement web
## Conception
This website was designed for Jean Forteroche, a writer.
It is a blog coded in HTML5, CSS3, Bootstrap4, PHP7 and MYSQL.
The website uses a CRUD for its chapters.
To write chapters, the website uses TinyMCE (link to their github: https://github.com/tinymce/tinymce ), and PHPMailer (link to their github: https://github.com/PHPMailer/PHPMailer) for the newsletter and notification system.
Github link to clone the project: https://github.com/tuxultima/projet3 .
Using composer is recommended to download PHPmailer and TinyMCE (https://getcomposer.org/).
On the front side, the website uses Bootstrap 4 (https://getbootstrap.com/).

Once the project is downloaded:
```
composer install
```

Rename the "DbManagerSample.php" file in the "Model" folder as "DbManager.php", and fill the forms dbname, login, password with your name of choice for the database and your database login information.

## SQL Table

List of separate tables that shall be created to operate the website:


Chapters table
```sql
CREATE TABLE IF NOT EXISTS `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(65) NOT NULL,
  `content` text NOT NULL,
  `dateUpload` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
```


Comments table
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


Contacts Table
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


Newsletters table
```sql
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(65) NOT NULL,
  `rgpd` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
```

Admin table
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