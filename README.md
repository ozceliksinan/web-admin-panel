## Web Admin Panel

Upload the files to the server to use the admin panel.

For the admin panel to work, the sql file must be included in your system. For this, the panel.sql file in the SQL folder is used. A database called panel is created by going to phpMyAdmin.

![sinanozcelik.com](img/1.jpg)

After the database is created, the panel.sql file in the SQL folder is selected with the import feature and git is pressed.

![sinanozcelik.com](img/2.jpg)

As a last step, the netting/dbconfig.php file in the folder is opened and rearranged with your own information.

```php
<?php 
define('DBHOST','localhost');   // Host
define('DBUSER','root');        // phpMyAdmin username
define('DBPWD','sinan123');     // phpMyAdmin password
define('DBNAME','panel');       // database name
 ?>
```

Admin panel login username: sinanozcelik
Admin panel login password: sinan123

## <img src="https://user-images.githubusercontent.com/74038190/235294019-40007353-6219-4ec5-b661-b3c35136dd0b.gif" width="30" style="margin-bottom: -5px;"> Contact Information

You can reach out to me using the following contact details:

[![Email](https://img.shields.io/badge/Email-sinanozcelik%40yaani.com-brightgreen)](mailto:sinanozcelik@yaani.com)

[![LinkedIn](https://img.shields.io/badge/LinkedIn-sinan--ozcelik-blue)](https://www.linkedin.com/in/sinan-ozcelik/)

I'm always open to development and collaboration. Feel free to reach out to me!
