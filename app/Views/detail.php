<?= $this->include('\App\Views\template\html') ?>

<?= $this->include('\App\Views\template\header') ?>


<style>
    #panel1 {
        padding: 10px 20px;
        background: #f4f7f8;
        border-radius: 8px;
    }

    h1 {
        margin: 0 0 30px 0;
        text-align: center;
    }

    fieldset {
        margin-bottom: 30px;
        border: none;
    }

    legend {
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    label.light {
        font-weight: 300;
        display: inline;
    }
</style>

<main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Detail Konsultasi <u><?= $_GET['tiket']; ?></u></p>
                <br>
            </header>

            <div class="container-fluid">
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-xl col-lg">
                        <div class="card shadow mb-4">
                            <div id="panel1" class="card ">
                                <h1 class="mt-4 card-title text-center" style="font-weight:bold">
                                    <u><?= $kategori_instansi ?></u>
                                </h1>
                                <h3 class="text-center">
                                    <?= $nama_instansi ?>
                                </h3>
                                <br>
                                <hr>
                                <fieldset>
                                    <legend class="text-center">Informasi Pembuat</legend>
                                </fieldset>

                                <fieldset>
                                    <label>Nama</label>
                                    <div class="input-group input-group-md">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><span class="fas fa-user"></span></span>
                                            <span class="form-control">
                                                <?= $user_konsultasi ?>
                                            </span>
                                        </div>
                                    </div>
                                    <label>Pekerjaan</label>
                                    <div class="input-group input-group-md">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><span class="fas fa-briefcase"></span></span>
                                            <span class="form-control">
                                                <?= $konsultasi_pekerjaan ?>
                                            </span>
                                        </div>
                                    </div>
                                    <label>No WhatsApp</label>
                                    <div class="input-group input-group-md">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><span class="fab fa-whatsapp"></span></span>
                                            <span class="form-control">
                                                <?= $telepon ?>
                                            </span>
                                        </div>
                                    </div>
                                </fieldset>

                                <hr>

                                <fieldset>
                                    <legend class="text-center">Informasi Konsultasi</legend>
                                </fieldset>

                                <fieldset>
                                    <label>Tanggal</label>
                                    <div class="input-group input-group-md">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><span class="fas fa-calendar"></span></span>
                                            <span class="form-control">
                                                <?= $tanggal ?>
                                            </span>
                                        </div>
                                    </div>
                                    <label>Sesi</label>
                                    <div class="input-group input-group-md">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><span class="fas fa-clock"></span></span>
                                            <span class="form-control">
                                                <?= $sesi ?>
                                            </span>
                                        </div>
                                    </div>
                                    <label>Metode</label>
                                    <div class="input-group input-group-md">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><span class="fas fa-clipboard-list"></span></span>
                                            <span class="form-control">
                                                <?= $nama_metode ?>
                                            </span>
                                        </div>
                                    </div>
                                    <label>Keperluan</label>
                                    <div class="input-group input-group-md">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><span class="fas fa-comments"></span></span>
                                            <span class="form-control">
                                                <?= $keperluan ?>
                                            </span>
                                        </div>
                                    </div>
                                    <label>Konfirmasi Admin</label>
                                    <div class="input-group input-group-md">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><span class="fas fa-user-check"></span></span>
                                            <span class="form-control">
                                                <?= $konfirmasi_admin ?>
                                            </span>
                                        </div>
                                    </div>
                                    <label>Bukti Kegiatan</label>
                                    <div class="input-group input-group-md">
                                        <!-- <div class="input-group mb-3"> -->
                                        <div class="mx-3 mb-3">
                                            <!-- <span class="input-group-text" id="basic-addon1"> -->
                                            <span class="fa fa-file"></span>
                                            <!-- </span> -->
                                            <!-- <span class="form-control"> -->
                                            <a type="button" class="mx-2" href="<?php if ($bukti !== null) echo ($bukti['bukti_konsultasi']);
                                                                                else echo ("#"); ?>"><?php if ($bukti !== null) echo "Bukti Konsultasi";
                                                                                                        else echo "Belum Ada Bukti Konsultasi"; ?></a>
                                            <!-- </span> -->
                                        </div>
                                    </div>
                                </fieldset>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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