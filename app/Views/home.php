<?= $this->include('\App\Views\template\html') ?>

<?= $this->include('\App\Views\template\header') ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Kaolin</h1>
                <p data-aos="fade-up">
                    (Konsultasi Asyik Offline dan Online)
                </p>

                <h2 data-aos="fade-up" data-aos-delay="400">Mari melakukan konsultasi statistik yang asyik dan seru dengan BPS Kota Pangkalpinang</h2>
                <br>
                <p style="color: #2359b9; font-size: 1rem;" data-aos="fade-up" data-aos-delay="400">
                    Jadwal konsultasi : setiap jam kerja, kecuali <b>Zoom</b> setiap Selasa, Rabu, Kamis
                </p>
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
                        <h2>Kaolin merupakan sistem informasi untuk penjadwalan dan konsultasi di BPS Kota Pangkalpinang</h2>
                        <p>
                            Kaolin dapat digunakan oleh masyarakat umum, baik Organisasi Perangkat Daerah (OPD) maupun Mahasiswa untuk mengajukan jadwal konsultasi data maupun konsultasi statistik dengan BPS Kota Pangkalpinang.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="img/FGD_PKP.jpg" class="img-fluid d-block w-100" alt="">
                            </div>
                            <div class="carousel-item" data-bs-interval="10000">
                                <img src="img/FGD_PKP-2.jpg" class="img-fluid d-block w-100" alt="">
                            </div>
                            <div class="carousel-item" data-bs-interval="10000">
                                <img src="img/FGD_PKP-3.jpg" class="img-fluid d-block w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section><!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Fitur yang Disediakan</p>
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
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <?php for ($i = 0; $i < count($kueri); $i++) :
                    $month = date('F', strtotime($kueri[$i]['tanggal']));
                    $year = date("Y"); ?>
                    <div class="col-xl-4 col-lg-4 portfolio-item filter-<?= $month ?>-<?= $year ?>">
                        <div class="card shadow mb-4">
                            <!-- Card Body -->
                            <div class="card-body list-konsultasi">
                                <h5 class="card-title text-center" style="font-weight:bold">
                                    <u><?= $kueri[$i]['kategori_instansi'] ?></u>
                                </h5>
                                <h6 class="text-center">
                                    <?= $kueri[$i]['nama_instansi'] ?>
                                </h6>
                                <div class="row">
                                    <p class="card-text">
                                    <div class="col-3">
                                        Nama
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8">
                                        <?= $kueri[$i]['user_konsultasi'] ?>
                                    </div>
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="card-text">
                                    <div class="col-3">
                                        Tanggal
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8">
                                        <?= $kueri[$i]['itanggal'] ?>
                                    </div>
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="card-text">
                                    <div class="col-3">
                                        Keperluan
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <?= $kueri[$i]['keperluan'] ?>
                                    </div>
                                    </p>
                                </div>
                                <div class="text-center">
                                    <a href="<?= base_url('detail_konsultasi?tiket=') . $kueri[$i]['tiket'] ?>" class="btn btn-primary">Detail</a>
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
                    </div>
                <?php endfor; ?>
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
                                    Siapa saja yang bisa mengajukan konsultasi statistik melalui Kaolin?
                                </button>
                            </h2>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                <div class="accordion-body">
                                    Semua masyarakat umum, termasuk OPD dan mahasiswa, dapat mengajukan permintaan konsultasi statistik melalui Kaolin.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                    Apakah pelayanan konsultasi statistik melalui Kaolin berbayar?
                                </button>
                            </h2>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                <div class="accordion-body">
                                    <b>Tidak</b>, permintaan konsultasi statistik melalui Kaolin tidak dipungut biaya sepeserpun <b>(GRATIS)</b>.
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
                                    Apa saja akses konsultasi yang disediakan melalui Kaolin?
                                </button>
                            </h2>
                            <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                <div class="accordion-body">
                                    Dalam Kaolin, disediakan tiga metode yang dapat dipilih oleh pengguna, yaitu datang secara langsung (<i>offline</i>), secara virtual tatap muka melalui zoom atau google meet (<i>online meeting</i>), ataupun secara virtual chat melalui WhatsApp (<i>online chat</i>).
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                                    Bolehkah orang di luar pangkalpinang melakukan konsultasi statistik melalui Kaolin?
                                </button>
                            </h2>
                            <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                <div class="accordion-body">
                                    <b>Tentu saja boleh</b>, Kaolin diharapkan dapat mempermudah semua konsumen konsultasi statistik, baik yang ada di Kota Pangkalpinang, maupun yang sedang berada di luar Kota Pangkalpinang dalam melakukan konsultasi statistik dengan BPS Kota Pangkalpinang.
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