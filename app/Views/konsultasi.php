<!DOCTYPE html>
<html lang="en">

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>KAOLIN - BPS Kota Pangkalpinang</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Main CSS-->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet" media="all">

    <!-- Favicons -->
    <link href="assets/img/logo-bps.png" rel="icon">
    <link href="assets/img/logo-bps.png" rel="apple-touch-icon">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="<?= base_url(); ?>" class="logo d-flex align-items-center">
                <img src="assets/img/logo-kaolin.png" alt="">
                <span>KAOLIN</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
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
                        <li><a class="getstarted scrollto" href="<?= base_url('login') ?>">Login</a></li>
                    <?php endif; ?>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5 mt-4">
                <div class="card-heading">
                    <h2 class="title">Form Pengajuan Konsultasi</h2>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('pengajuan_konsultasi') ?>" method="POST">
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="user_konsultasi" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Pekerjaan</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="pekerjaan" id="pekerjaan" required>
                                            <option disabled="disabled" selected="selected">Pilih Salah Satu</option>
                                            <option value="1">Pelajar/Mahasiswa</option>
                                            <option value="2">Peneliti/Dosen</option>
                                            <option value="3">ASN/TNI/Polri</option>
                                            <option value="4">Pegawai BUMN/BUMD</option>
                                            <option value="5">Pegawai Swasta</option>
                                            <option value="6">Wiraswasta</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Kategori Instansi</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="kategori_instansi" id="kategori_instansi" required>
                                            <option disabled="disabled" selected="selected">Pilih Salah Satu</option>
                                            <option value="1">Lembaga Negara</option>
                                            <option value="2">Kementerian & Lembaga Pemerintah</option>
                                            <option value="3">TNI/Polri/BIN Kejaksaan</option>
                                            <option value="4">Pemerintah Daerah</option>
                                            <option value="5">Lembaga Internasional</option>
                                            <option value="6">Lembaga Penelitian & Pendidikan</option>
                                            <option value="7">BUMN/BUMD</option>
                                            <option value="8">Swasta</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Nama Instansi</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nama_instansi" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">No Whatsapp</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="telepon" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Metode Konsultasi</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="metode" id="metode" required>
                                            <option disabled="disabled" selected="selected">Pilih Salah Satu</option>
                                            <option value="1">Offline</option>
                                            <option value="2">Online (WhatsApp)</option>
                                            <option value="3">Online (Zoom)</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Keperluan</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="input--style-5" name="keperluan" id="keperluan" cols="100" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="hide">

                            <hr>
                            <br>

                            <div>
                                <div class="text-center">
                                    <u>
                                        <h4>Pengajuan Waktu Konsultasi</h4>
                                    </u>
                                </div>
                                <br>
                                <div class="text-left zoom">
                                    <h5>Layanan konsultasi hanya akan dilaksanakan pada hari Selasa, Rabu, dan Kamis</h5>
                                </div>
                                <div class="text-left offline">
                                    <h5>Layanan konsultasi hanya dapat dilaksanakan pada jam kerja</h5>
                                </div>
                                <br>
                            </div>

                            <div class="form-row">
                                <div class="name">Tanggal Konsultasi</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="date" name="tanggal" id="datepicker">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Sesi Konsultasi</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="sesi" id="sesi_konsultasi">
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn--radius-2 btn--green float-right" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('\App\Views\template\footer') ?>

    <?= session()->flash; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        var form = $('#hide');
        form.hide();
        var select = $("#metode");
        select.change(function() {
            if (select.val() !== '2') {
                form.show();
                if (select.val() == '1') {
                    $(".zoom").hide();
                    $(".offline").show();

                    // penggantian pilihan opsi
                    var el = $("#sesi_konsultasi");
                    el.empty(); // remove options
                    var newOptions = {
                        "Pagi (08.00 - 12.00 WIB)": "V",
                        "Siang (12.00 - 16.00 WIB)": "VI"
                    };
                    $.each(newOptions, function(key, value) {
                        el.append($("<option></option>")
                            .attr("value", value).text(key));
                    });
                } else {
                    $(".offline").hide();
                    $(".zoom").show();

                    // penggantian pilihan opsi
                    var el = $("#sesi_konsultasi");
                    el.empty(); // remove options
                    var newOptions = {
                        "Sesi I (08.30 - 09.05 WIB)": "I",
                        "Sesi II (10.00 - 10.35 WIB)": "II",
                        "Sesi III (13.30 - 14.05 WIB)": "II"
                    };
                    $.each(newOptions, function(key, value) {
                        el.append($("<option></option>")
                            .attr("value", value).text(key));
                    });
                }
            } else form.hide();
        });
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->