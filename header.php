<?php
session_start();
require_once 'setconfig.php';
$sqldeneme = $db->read("settings");
$rowdeneme = $sqldeneme->fetchAll(PDO::FETCH_ASSOC);
foreach ($rowdeneme as $key) {
  $settings[$key['settings_key']] = $key['settings_value'];
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php echo $settings['title']; ?>
  </title>
  <meta name="description" content="<?php echo $settings['description']; ?>">
  <meta name="keyword" content="<?php echo $settings['keywords']; ?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="author" content="<?php echo $settings['author']; ?>">
  <meta name="publisher" content="<?php echo $settings['publisher']; ?>" />
  <meta name="twitter:card" content="<?php echo $settings['twitter:card']; ?>">
  <meta name="twitter:site" content="<?php echo $settings['twitter:site']; ?>">
  <meta name="twitter:title" content="<?php echo $settings['twitter:title']; ?>">
  <meta name="twitter:description" content="<?php echo $settings['twitter:description']; ?>">
  <meta name="twitter:creator" content="<?php echo $settings['twitter:creator']; ?>">
  <meta name="twitter:domain" content="<?php echo $settings['twitter:domain']; ?>">
  <meta property="og:title" content="<?php echo $settings['og:title']; ?>">
  <meta property="og:description" content="<?php echo $settings['og:description']; ?>">
  <meta property="og:url" content="<?php echo $settings['og:url']; ?>">
  <meta property="og:image" content="<?php echo $settings['og:image']; ?>" />
  <link rel="shortcut icon" type="image/x-icon" href="dimg/settings/<?php echo $settings['icon']; ?>">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="css/ozel.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <script src="ckeditor/ckeditor.js"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a title="sinanozcelik.com" href="index.php" class="logo">
        <span class="logo-mini"><b>SNN</b></span>
        <span class="logo-lg"><b>Sinan</b> Özçelik</span>
      </a>
      <nav class="navbar navbar-static-top" role="navigation">
        <a title="sinanozcelik.com" href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a title="sinanozcelik.com" href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="dimg/admins/<?php echo $_SESSION['admins']['admins_file']; ?>" class="user-image"
                  alt="sinanozcelik.com">
                <span class="hidden-xs">
                  <?php echo $_SESSION['admins']['admins_namesurname']; ?>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="dimg/admins/<?php echo $_SESSION['admins']['admins_file']; ?>" class="img-circle"
                    alt="sinanozcelik.com">
                  <p>
                    <?php echo $_SESSION['admins']['admins_namesurname']; ?>
                    <small>Yönetici</small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a title="sinanozcelik.com" href="#" class="btn btn-default btn-flat">Profil</a>
                  </div>
                  <div class="pull-right">
                    <a title="sinanozcelik" href="logout.php" class="btn btn-default btn-flat">Güvenli Çıkış</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>