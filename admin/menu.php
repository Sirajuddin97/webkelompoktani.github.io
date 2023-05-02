<div class="wrapper">
      <div data-active-color="white" data-background-color="primary" data-image="app-assets/img/sidebar-bg/bg.jpg" class="app-sidebar">
        <div class="sidebar-header">
          <div class="logo clearfix"><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"></a>
            <p class="gradient-ibiza-sunset" style="font-size: 15px;margin-left: -9px;margin-right: auto;margin-bottom:-18px;margin-top: -6px;padding-right: 74px;padding-left: 60px;padding-top: 13px;padding-bottom: 13px;">ADMINISTRATOR</p></div>
        </div>
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
              <li class="<?php echo $active; ?> nav-item"><a href="dashboard.php"><i class="icon-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
              </li>
              <li class="has-sub nav-item"><a href="#"><i class="icon-notebook"></i><span data-i18n="" class="menu-title">Rekap Laporan</span></a>
                <ul class="menu-content" style="">
                  <li class="<?php echo $active1111; ?>"><a href="daftar-petani.php" class="menu-item">Daftar Data Petani</a>
                  </li>
                  <li class="<?php echo $active11; ?>"><a href="daftar-ajuan.php" class="menu-item">Daftar Data Ajuan Petani</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub nav-item"><a href="#"><i class="icon-wallet"></i><span data-i18n="" class="menu-title">Berikan Bantuan</span></a>
                <ul class="menu-content" style="">
                  <li class="<?php echo $active2; ?>"><a href="berikanbantuan.php" class="menu-item">Pilih Petani</a>
                  </li>
                  <li class="<?php echo $active4; ?>"><a href="daftar-bantuan.php" class="menu-item">Daftar Bantuan Petani</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub nav-item"><a href="#"><i class="icon-users"></i><span data-i18n="" class="menu-title">Kelola Akun</span></a>
                <ul class="menu-content" style="">
                  <li class="<?php echo $active5; ?>"><a href="tambah-akun.php" class="menu-item">Tambah Akun</a>
                  </li>
                  <li class="<?php echo $active6; ?>"><a href="daftar-akun.php" class="menu-item">Daftar Akun</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub nav-item"><a href="#"><i class="icon-settings"></i><span data-i18n="" class="menu-title">Pengaturan</span></a>
                <ul class="menu-content" style="">
                <li class="<?php echo $active3; ?>"><a href="edit-admin.php" class="menu-item">Edit Akun</a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="config/logout.php"><i class="icon-loop"></i><span data-i18n="" class="menu-title">Logout</span></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="sidebar-background"></div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light faded">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
            <span class="icon-bar"></span><span class="icon-bar"></span></button>
            <!--
            <a id="navbar-fullscreen" href="../index.php" target="_blank" class="mr-2 display-inline-block">
            <i class="icon-share-alt blue-grey darken-4"></i><span class="mx-1 blue-grey darken-4 text-bold-400">Lihat Website</span></a>
            </a>
            -->
          </div>
        </div>
      </nav>