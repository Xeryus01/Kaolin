<?= $this->include('\App\Views\template\html') ?>

<?= $this->include('\App\Views\template\header') ?>

<main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Detail Konsultasi <u><?= $_GET['tiket']; ?></u></p>
                <br>
                <!-- <h2>cek jadwal konsultasi ke depannya ya..</h2> -->
            </header>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <!-- <php for ($i = 0; $i < count($kueri); $i++) :
                    $month = date('F', strtotime($kueri[$i]['tanggal'])); ?> -->
                <div class="col-xl col-lg portfolio-item filter-October-2023">
                    <div class="card shadow mb-4">
                        <div class="p-3">
                            <!-- <h7 class="modal-title text-justify" id="detailModalLabel"></h7> -->
                            <h3 class="card-title text-center" style="font-weight:bold">
                                <u>Lembaga Penelitian & Pendidikan</u>
                            </h3>
                            <h4 class="text-center">
                                Politeknik Statistika STIS
                            </h4>
                            <br>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2" style="font-weight:bold">
                                    <li>Pembuat</li>
                                </div>
                                <div class="col-1">
                                </div>
                                <div class="col-7">
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    Nama
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    Akhmad Fadil Mubarok
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    Pekerjaan
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    Pelajar/Mahasiswa
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    No Telepon
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    +6282226602929
                                </div>
                                </p>
                            </div>

                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2" style="font-weight:bold">
                                    <li>Konsultasi</li>
                                </div>
                                <div class="col-1">
                                </div>
                                <div class="col-7">
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    Tanggal
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    27 October 2023
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    Sesi
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    III (13.30 - 14.10 WIB)
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    Metode
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    Online (Zoom)
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    Keperluan
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7" style="text-align: justify;">
                                    Konsultasi Permintaan Data Skripsi Kemiskinan dan Tingkat Pengangguran Terbuka Kota Pangkalpinang
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    Konfirmasi Admin
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    Sudah Dikonfirmasi
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    Link zoom
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    <a href="https://us02web.zoom.us/j/89260576330?pwd=bjdHR3hwWFlSeU93bFJJWnNNZkR4dz09">
                                        <span>zoom link</span>
                                    </a>
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <p class="card-text">
                                <div class="col-1">
                                </div>
                                <div class="col-2">
                                    Bukti
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    <a type="button" href="https://drive.google.com/file/d/1ADatgIIsYzLdi3OP_jsm98q8cKNht8oC/view?usp=share_link">Bukti Konsultasi</a>
                                </div>
                                </p>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedbackModal">Feedback</button>
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

<!-- Feedback Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("admin/konsultasi_jadwal/") ?>" id="jadwal-form" method="post">
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
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Kritik dan Saran</label>
                    </div>
                    <input type="hidden" class="form-control" name="tiket" id="tiket">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

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