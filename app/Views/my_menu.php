<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>KAOLIN - BPS Kota Pangkalpinang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <?= $this->include('\App\Views\template\header') ?>

    <main id="main">

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Jadwal Konsultasi</p>
                    <br>
                    <!-- <h2>cek jadwal konsultasi ke depannya ya..</h2> -->
                </header>

                <div class="float-right">
                    <a href="<?= base_url('pengajuan_konsultasi'); ?>" class="btn btn-warning" style="color: white">
                        <h5><strong>Tambah Konsultasi</strong></h5>
                    </a>
                    <br>
                    <br>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    <?php
                    for ($i = 0; $i < count($kueri); $i++) : ?>
                        <div class="card col-lg-4 portfolio-item filter-October-2023">
                            <div class="card-body">
                                <h5 class="card-title text-center" style="font-weight:bold">
                                    <u><?= $kueri[$i]['instansi'] ?></u>
                                </h5>
                                <br>
                                <p class="card-text">Nama &emsp;&emsp;&emsp;: <?= $kueri[$i]['user_konsultasi'] ?></p>
                                <p class="card-text">Tanggal &emsp;&emsp;&nbsp;: <?= $kueri[$i]['tanggal'] ?></p>
                                <p class="card-text">Keperluan &emsp;: <?= $kueri[$i]['keperluan'] ?></p>
                                <div class="text-center">
                                    <a href="<?= base_url('detail_konsultasi/') . $kueri[$i]['tiket'] ?>" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                            <div class="card-footer text-muted text-center">
                                <?php
                                $now = date_create(date('Y-m-d'));
                                $tanggal_konsultasi = date_create($kueri[$i]['tanggal']);
                                $diff = date_diff($now, $tanggal_konsultasi);
                                $diff = $diff->format('%R%a days');
                                if (substr($diff, 0, 1) == "+") {
                                    if (substr($diff, 1, 1) == "0")
                                        echo "Today";
                                    else
                                        echo substr($diff, 1, strlen($diff)) . " more";
                                } else {
                                    echo substr($diff, 1, strlen($diff)) . " ago";
                                }
                                ?>
                            </div>
                        </div>
                    <?php endfor; ?>

                </div>

            </div>

        </section>
        <!-- End Portfolio Section -->

    </main><!-- End #main -->

    <?= $this->include('\App\Views\template\footer') ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>