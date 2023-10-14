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

    <link href="css/toastr.css" rel="stylesheet">
    <link href="/css/toastr.min.css" rel="stylesheet">

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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Kaolin</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Mari melakukan konsultasi statistik dengan BPS Kota Pangkalpinang</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="<?= base_url('pengajuan_konsultasi'); ?>" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Mulai Konsultasi</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="images/main-image.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>Apa itu Kaolin?</h3>
                            <h2>Kaolin merupakan ....</h2>
                            <p>
                                Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam et est corrupti.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Fitur yang Disediakan</p>
                    <!-- <p>Odit est perspiciatis laborum et dicta</p> -->
                </header>

                <div class="row">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="images/calendar.png" class="img-fluid " alt="">
                            <h3>Penjadwalan Konsultasi</h3>
                            <p>Pengajuan penjadwalan konsultasi sekarang dapat dilakukan secara online melalui sistem kaolin</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="images/virtual-chat.png" class="img-fluid" alt="">
                            <h3>Konsultasi virtual</h3>
                            <p>Konsultasi dengan BPS Kota Pangkalpinang tidak harus datang secara langsung, melainkan dapat dilakukan secara virtual</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="images/track-record.png" class="img-fluid" alt="">
                            <h3>Monitoring Konsultasi</h3>
                            <p>Hasil dari kegiatan konsultasi akan disimpan dalam Sistem Kaolin</p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Values Section -->


        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Jadwal Konsultasi</p>
                    <br>
                    <!-- <h2>cek jadwal konsultasi ke depannya ya..</h2> -->
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <?php
                            $month_num = date("n");
                            $year = date("Y");
                            for ($i = $month_num; $i < $month_num + 4; $i++) :
                                $month_name = date('F', mktime(0, 0, 0, $i, 10)); ?>
                                <li data-filter=".filter-<?= $month_name . "-" . $year ?>"><?= $month_name . " " . $year; ?></li>
                                <!-- <li data-filter=".filter-oktober-2023">Oktober 2023</li> -->
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="card col-lg-4 portfolio-item filter-October-2023">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight:bold">
                                <u>Badan Pemerintahan Daerah</u>
                            </h5>
                            <br>
                            <p class="card-text">Nama &emsp;&emsp;&emsp;: Akhmad Fadil</p>
                            <p class="card-text">Jabatan &emsp;&emsp;&nbsp;: Mahasiswa</p>
                            <p class="card-text">Tanggal &emsp;&emsp;&nbsp;: 4 Oktober 2023</p>
                            <p class="card-text">Keperluan &emsp;: Konsultasi Satu Data Pangkalpinang</p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                        <div class="card-footer text-muted text-center">
                            10 days more
                        </div>
                    </div>

                    <div class="card col-lg-4 portfolio-item filter-October-2023">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight:bold">
                                <u>Badan Pemerintahan Daerah</u>
                            </h5>
                            <br>
                            <p class="card-text">Nama &emsp;&emsp;&emsp;: Akhmad Fadil</p>
                            <p class="card-text">Jabatan &emsp;&emsp;&nbsp;: Mahasiswa</p>
                            <p class="card-text">Tanggal &emsp;&emsp;&nbsp;: 4 Oktober 2023</p>
                            <p class="card-text">Keperluan &emsp;: Konsultasi Satu Data Pangkalpinang</p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                        <div class="card-footer text-muted text-center">
                            10 days more
                        </div>
                    </div>

                    <div class="card col-lg-4 portfolio-item filter-October-2023">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight:bold">
                                <u>Badan Pemerintahan Daerah</u>
                            </h5>
                            <br>
                            <p class="card-text">Nama &emsp;&emsp;&emsp;: Akhmad Fadil</p>
                            <p class="card-text">Jabatan &emsp;&emsp;&nbsp;: Mahasiswa</p>
                            <p class="card-text">Tanggal &emsp;&emsp;&nbsp;: 4 Oktober 2023</p>
                            <p class="card-text">Keperluan &emsp;: Konsultasi Satu Data Pangkalpinang</p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                        <div class="card-footer text-muted text-center">
                            10 days more
                        </div>
                    </div>

                    <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-September-2023">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <p>4</p>
                                <h4>September 2023</h4>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 2"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-October-2023">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <p>19</p>
                                <h4>October 2023</h4>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 2"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-November-2023">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <p>10</p>
                                <h4>November 2023</h4>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 3"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>

            </div>

        </section>
        <!-- End Portfolio Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>F.A.Q</h2>
                    <p>Frequently Asked Questions</p>
                </header>

                <div class="row">
                    <div class="col-lg-6">
                        <!-- F.A.Q List 1-->
                        <div class="accordion accordion-flush" id="faqlist1">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                        Non consectetur a erat nam at lectus urna duis?
                                    </button>
                                </h2>
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                        Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                                    </button>
                                </h2>
                                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                                    </button>
                                </h2>
                                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">

                        <!-- F.A.Q List 2-->
                        <div class="accordion accordion-flush" id="faqlist2">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                                        Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                                    </button>
                                </h2>
                                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                                        Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                                    </button>
                                </h2>
                                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                                        Varius vel pharetra vel turpis nunc eget lorem dolor?
                                    </button>
                                </h2>
                                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End F.A.Q Section -->

    </main><!-- End #main -->

    <?= $this->include('\App\Views\template\footer') ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?= session()->flash; ?>
    <script>
        toastr.info('Are you the 6 fingered man?')
    </script>
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

    <script src="js/toastr.min.js"></script>

</body>

</html>