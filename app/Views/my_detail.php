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
                                    <?php if ($metode == 3) : ?>
                                        <label>Link Zoom</label>
                                        <div class="input-group input-group-md">
                                            <div class="mx-3 mb-3">
                                                <a type="button" href="<?php if ($link !== null) echo ($link['link']);
                                                                        else echo ("#"); ?>">
                                                    <span class="fa fa-video"></span>
                                                    <span class="mx-2">
                                                        <?php if ($link !== null) echo "Link Zoom";
                                                        else echo "Belum Ada Link Zoom"; ?>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <label>Bukti Kegiatan</label>
                                    <div class="input-group input-group-md">
                                        <div class="mx-3 mb-3">
                                            <a type="button" href="<?php if ($link !== null) echo ($link['link']);
                                                                    else echo ("#"); ?>">
                                                <span class="fa fa-file"></span>
                                                <span class="mx-2">
                                                    <?php if ($bukti !== null) echo "Bukti Konsultasi";
                                                    else echo "Belum Ada Bukti Konsultasi"; ?>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedbackModal" data-tiket="<?= $_GET['tiket'] ?>">Feedback</button>
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


<!-- Feedback Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Feedback Konsultasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("feedback_konsultasi") ?>" id="feed-form" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Kepuasan</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kepuasanOptions" id="kepuasanRadio1" value="1">
                            <label class="form-check-label" for="kepuasanRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kepuasanOptions" id="kepuasanRadio2" value="2">
                            <label class="form-check-label" for="kepuasanRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kepuasanOptions" id="kepuasanRadio3" value="3">
                            <label class="form-check-label" for="kepuasanRadio3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kepuasanOptions" id="kepuasanRadio4" value="4">
                            <label class="form-check-label" for="kepuasanRadio3">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kepuasanOptions" id="kepuasanRadio5" value="5">
                            <label class="form-check-label" for="kepuasanRadio3">5</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Kemudahan</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kemudahanOptions" id="kemudahanRadio1" value="1">
                            <label class="form-check-label" for="kemudahanRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kemudahanOptions" id="kemudahanRadio2" value="2">
                            <label class="form-check-label" for="kemudahanRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kemudahanOptions" id="kemudahanRadio3" value="3">
                            <label class="form-check-label" for="kemudahanRadio3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kemudahanOptions" id="kemudahanRadio4" value="4">
                            <label class="form-check-label" for="kemudahanRadio3">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kemudahanOptions" id="kemudahanRadio5" value="5">
                            <label class="form-check-label" for="kemudahanRadio3">5</label>
                        </div>
                    </div>

                    <br>

                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="saran_masukan"></textarea>
                        <label for="floatingTextarea2">Saran dan Masukan</label>
                    </div>
                    <input type="hidden" class="form-control" name="tiket" id="tiket" value="<?= $_GET['tiket'] ?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="feed-button">Save changes</button>
            </div>
        </div>
    </div>
</div>

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
<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script>
    document.getElementById("feed-button").addEventListener("click", submitForm);

    function submitForm() {
        document.getElementById("feed-form").submit();
    }
</script>
</body>

</html>