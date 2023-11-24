<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dimg/admins/<?php echo $_SESSION['admins']['admins_file']; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>
          <?php echo $_SESSION['admins']['admins_namesurname']; ?>
        </p>
        <a href="#"> Yönetici</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menüler</li>
      <li><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      <li><a href="sliders.php"><i class="fa fa-sliders"></i> <span>Slider Yönetimi</span></a></li>
      <li><a href="teknoloji.php"><i class="fa fa-desktop"></i><span>Teknoloji</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-key"></i><span>Site Yönetim Aracı</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="settings.php"><i class="fa fa-cog"></i>Ayarlar</a></li>
        </ul>
      </li>
      <li><a href="yorumlar.php"><i class="fa fa-commenting-o"></i>Yorumlar</a></li>
      <li><a href="admins.php"><i class="fa fa-user"></i>Yöneticiler</a></li>
    </ul>
  </section>
</aside>