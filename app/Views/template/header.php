<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="<?= base_url(); ?>" class="logo d-flex align-items-center">
            <img src="assets/img/logo-kaolin.png" alt="">
            <span>KAOLIN</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="<?= base_url() ?>">Home</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('#about') ?>">About</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('#values') ?>">Layanan</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('#portfolio') ?>">Jadwal</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('#faq') ?>">FAQ</a></li>

                <?php $user = auth()->user();
                if ($user != null) : ?>
                    <li><a class="getstarted scrollto" href="<?= base_url('my_menu') ?>" style="background-color:#ffc107">Konsultasi Saya</a></li>
                    <?php
                    $group = auth()->user()->getGroups()[0];
                    if ($group == 'admin' || $group == 'superadmin') :  ?>
                        <li><a class="getstarted scrollto" href="<?= base_url('admin/index') ?>" style="background-color:#28a745">Menu Admin</a></li>
                    <?php endif; ?>
                    <li><a class="getstarted scrollto" href="<?= base_url('logout') ?>">Logout</a></li>
                <?php else : ?>
                    <!-- <li><a class="nav-link scrollto" href="<?= base_url('#faq') ?>">Panduan</a></li> -->
                    <li><a class="getstarted scrollto" href="<?= base_url('login') ?>">Login</a></li>
                <?php endif; ?>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->