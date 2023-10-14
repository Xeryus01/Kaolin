<!DOCTYPE html>
<html lang="en">

<!doctype html>
<html lang="en">

<!-- <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head> -->

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

    <!-- Main CSS-->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet" media="all">

</head>

<body>
    <?= $this->include('\App\Views\template\auth\header_auth') ?>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
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
                            <div class="name">Asal Instansi</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="instansi" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">No Telepon</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="telepon" required>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-row m-b-55">
                            <div class="name">No Telepon</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code">
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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

                        <hr>
                        <br>

                        <div class="text-center">
                            <h4>Pengajuan Waktu Konsultasi</h4>
                            <br>
                        </div>

                        <div class="form-row">
                            <div class="name">Tanggal Konsultasi</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="tanggal" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Sesi Konsultasi</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="sesi" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="I">I (08.30 - 09.10 WIB)</option>
                                            <option value="II">II (10.00 - 10.40 WIB)</option>
                                            <option value="III">III (13.30 - 14.10 WIB)</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-row p-t-20">
                            <label class="label label--block">Are you an existing customer?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> -->
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->