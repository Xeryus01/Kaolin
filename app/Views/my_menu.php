<?= $this->include('\App\Views\template\html') ?>

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
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <?php for ($i = 0; $i < count($kueri); $i++) :
                    $month = date('F', strtotime($kueri[$i]['tanggal'])); ?>
                    <div class="col-xl-4 col-lg-4 portfolio-item filter-<?= $month ?>-2023">
                        <div class="card shadow mb-4">
                            <!-- Card Body -->
                            <div class="card-body">
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
                                        <?= $kueri[$i]['tanggal'] ?>
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
                                    <div class="col-8">
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