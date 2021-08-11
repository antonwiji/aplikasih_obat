<!-- Vertical Nav -->
<nav class="hk-nav hk-nav-light">
    <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
    <div class="nicescroll-bar">
        <div class="navbar-nav-wrap">
            <hr class="nav-separator">
            <div class="nav-header">
                <span>Daftar Menu</span>
                <span>LKTM</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="../dashboard/index.php">
                        <span class="feather-icon"><i data-feather="book"></i></span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        <span class="feather-icon"><i data-feather="book"></i></span>
                        <span class="nav-link-text">Visit Website</span>
                    </a>
                </li>
                <?php if ($_SESSION['login']['level'] == 'Admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../users/index.php">
                            <span class="feather-icon"><i data-feather="book"></i></span>
                            <span class="nav-link-text">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../product/index.php">
                            <span class="feather-icon"><i data-feather="book"></i></span>
                            <span class="nav-link-text">Product</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kunjungan/index.php">
                            <span class="feather-icon"><i data-feather="book"></i></span>
                            <span class="nav-link-text">Kunjungan</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['login']['level'] == 'Admin' or $_SESSION['login']['level'] == 'Pembeli') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../pembelian/index.php">
                            <span class="feather-icon"><i data-feather="book"></i></span>
                            <span class="nav-link-text">Pembelian</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pembayaran/index.php">
                            <span class="feather-icon"><i data-feather="book"></i></span>
                            <span class="nav-link-text">Pembayaran</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['login']['level'] == 'Admin' or $_SESSION['login']['level'] == 'Kurir') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../perintah/index.php">
                            <span class="feather-icon"><i data-feather="book"></i></span>
                            <span class="nav-link-text">Perintah</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['login']['level'] == 'Apoteker' or $_SESSION['login']['level'] == 'Pembeli') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../konsultasi/index.php">
                            <span class="feather-icon"><i data-feather="book"></i></span>
                            <span class="nav-link-text">Konsultasi</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="../profil/index.php">
                        <span class="feather-icon"><i data-feather="book"></i></span>
                        <span class="nav-link-text">Profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../auth/logout.php">
                        <i class="dropdown-icon zmdi zmdi-power"></i>
                        <span class="nav-link-text"> Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
<!-- /Vertical Nav -->

<!-- Setting Panel -->
<div class="hk-settings-panel">
    <div class="nicescroll-bar position-relative">
        <div class="settings-panel-wrap">
            <div class="settings-panel-head">
                <img class="brand-img d-inline-block align-top" src="../assets_dashboard/dist/img/unnamed.jpg" style="width:50%" alt="brand" />
                <a href="javascript:void(0);" id="settings_panel_close" class="settings-panel-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            </div>
            <hr>
            <h6 class="mb-5">Navigation</h6>
            <p class="font-14">Menu comes in two modes: dark & light</p>
            <div class="button-list hk-nav-select mb-10">
                <button type="button" id="nav_light_select" class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light Mode</span></button>
                <button type="button" id="nav_dark_select" class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark Mode</span></button>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <h6>Scrollable Header</h6>
                <div class="toggle toggle-sm toggle-simple toggle-light toggle-bg-primary scroll-nav-switch"></div>
            </div>
        </div>
    </div>
    <img class="d-none" src="../assets_dashboard/dist/img/unnamed.jpg" style="width:10%" alt="brand" />
    <img class="d-none" src="../assets_dashboard/dist/img/unnamed.jpg" style="width:10%" alt="brand" />
</div>
<!-- /Setting Panel -->