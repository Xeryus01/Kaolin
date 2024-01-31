<?= $this->include('\App\Views\admin\template\html') ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?= $this->include('\App\Views\admin\template\sidebar') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?= $this->include('\App\Views\admin\template\topbar') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="response">
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right text-sm mr-2">
                                        <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Admin</a></li>
                                        <li class="breadcrumb-item text-muted"><span>Konsultasi Management</span></li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Management Konsultasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Instansi</td>
                                            <td class="text-center">Keperluan</td>
                                            <td class="text-center">Tanggal</td>
                                            <td class="text-center">Sesi</td>
                                            <td class="text-center">Metode</td>
                                            <td class="text-center">Konfirmasi</td>
                                            <td class="text-center">Tindakan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($konsultasi as $data) : ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $i ?>
                                                </td>
                                                <td>
                                                    <?= $data['nama_instansi'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['keperluan'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $data['tanggal'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $data['sesi'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $data['metode'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($data['konfirmasi_admin'] == 1) : ?>
                                                        <span class="badge badge-pill badge-primary">sudah konfirmasi</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-pill badge-info">belum konfirmasi</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropleft">
                                                        <button class="btn btn-xs btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="text-xs">Tindakan</span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#detail_konsultasi" data-tiket="<?= $data['tiket'] ?>"><i class="fas fa-info text-secondary"></i>&ensp;Detail</button>

                                                            <?php if ($data['konfirmasi_admin'] == 1) : ?>
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#confirm_konsultasi" data-tiket="<?= $data['tiket'] ?>" data-admin="cancel"><i class="fas fa-toggle-off text-secondary"></i>&ensp;Batalkan Konfirmasi</button>
                                                            <?php else : ?>
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#confirm_konsultasi" data-tiket="<?= $data['tiket'] ?>" data-admin="<?= $data['token_admin'] ?>"><i class="fas fa-toggle-on text-secondary"></i>&ensp;Konfirmasi Pengajuan</button>
                                                            <?php endif; ?>

                                                            <?php if ($data['metode'] != "Online (Whatsapp)") : ?>
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#jadwal_konsultasi" data-tiket="<?= $data['tiket'] ?>" data-jadwal="<?= $data['tanggal'] ?>" data-sesi="<?= $data['sesi'] ?>"><i class="fas fa-calendar text-secondary"></i>&ensp;Ganti Jadwal</button>
                                                            <?php endif; ?>

                                                            <?php if ($data['metode'] == "Online (Zoom)") : ?>
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#link_konsultasi" data-tiket="<?= $data['tiket'] ?>"><i class="fas fa-link text-secondary"></i>&ensp;Tambah Link</button>
                                                            <?php endif; ?>

                                                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#bukti_konsultasi" data-tiket="<?= $data['tiket'] ?>" data-link="<?= $data['tiket'] ?>"><i class="fas fa-file text-secondary"></i>&ensp;Tambah Bukti Konsultasi</button>

                                                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#delete_konsultasi" data-tiket="<?= $data['tiket'] ?>" data-link="<?= $data['tiket'] ?>"><i class="fas fa-trash text-secondary"></i>&ensp;Hapus Pengajuan</button>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?= $this->include('\App\Views\admin\template\footer') ?>

        </div>
        <!-- End of Content Wrapper -->

        <!-- Modal Detail Konsultasi-->
        <div class="modal fade" id="detail_konsultasi" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Konsultasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <h7 class="modal-title text-justify" id="detailModalLabel"></h7> -->
                        <h3 class="card-title text-center" style="font-weight:bold" id="lembaga">
                            <u>Lembaga Penelitian & Pendidikan</u>
                        </h3>
                        <h4 class="text-center" id="nama_lembaga">
                            Politeknik Statistika STIS
                        </h4>
                        <br>
                        <div class="row">
                            <p class="card-text">
                            <div class="col-1">
                            </div>
                            <div class="col-2">
                                No Tiket
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-7" id="no_tiket">
                                BpGFST
                            </div>
                            </p>
                        </div>
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
                            <div class="col-7" id="nama_pembuat">
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
                            <div class="col-7" id="pekerjaan_pembuat">
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
                            <div class="col-7" id="notelp_pembuat">
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
                            <div class="col-7" id="tanggal_konsultasi">
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
                            <div class="col-7" id="sesi_konsultasi">
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
                            <div class="col-7" id="metode_konsultasi">
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
                            <div class="col-7" style="text-align: justify;" id="keperluan_konsultasi">
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
                            <div class="col-7" id="konfirmasi_konsultasi">
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
                                <a id="link_detail" href="https://us02web.zoom.us/j/89260576330?pwd=bjdHR3hwWFlSeU93bFJJWnNNZkR4dz09">
                                    <span class="badge badge-pill badge-primary">zoom link</span>
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
                            <div class="col-7" id="bukti_detail">
                                <a id="link_detail" href="https://us02web.zoom.us/j/89260576330?pwd=bjdHR3hwWFlSeU93bFJJWnNNZkR4dz09">
                                    <span class="badge badge-pill badge-success">Bukti konsultasi</span>
                                </a>
                                <!-- <a type="button" href="https://drive.google.com/file/d/1ADatgIIsYzLdi3OP_jsm98q8cKNht8oC/view?usp=share_link"><i class="fas fa-file text-secondary"></i>&ensp; Bukti Konsultasi</a> -->
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Konfirmasi Konsultasi-->
        <div class="modal fade" id="confirm_konsultasi" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Konsultasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h7 class="modal-title text-justify" id="confirmModalLabel"></h7>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                        <a id="confirm-button" href="#" type="button" class="btn btn-primary">Setuju</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Ganti Jadwal Konsultasi-->
        <div class="modal fade" id="jadwal_konsultasi" tabindex="-1" role="dialog" aria-labelledby="jadwalModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ganti Jadwal Konsultasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url("admin/konsultasi_jadwal/") ?>" id="jadwal-form" method="post">
                            <div class="form-group">
                                <label for="tiket-name" class="col-form-label">No Tiket:</label>
                                <input type="text" class="form-control" name="tiket_konsultasi" id="tiket-name" value="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="jadwal_konsultasi" class="col-form-label">Jadwal Awal:</label>
                                <input type="text" class="form-control" name="jadwal_konsultasi" id="jadwal_konsultasi" value="" disabled>
                            </div>
                            <!-- <div class="form-group">
                                <label for="sesi_konsultasi" class="col-form-label">Sesi Awal:</label>
                                <input type="text" class="form-control" name="sesi_konsultasi" id="sesi_konsultasi" value="" disabled>
                            </div> -->
                            <div class="form-group">
                                <label for="new_jadwal_konsultasi" class="col-form-label">Tanggal Pengganti:</label>
                                <input type="date" class="form-control" name="new_jadwal_konsultasi" id="new_jadwal_konsultasi">
                            </div>
                            <div class="form-group">
                                <label for="new_sesi_konsultasi" class="col-form-label">Sesi Pengganti:</label>
                                <select class="form-control" id="new_sesi" name="new_sesi_konsultasi">
                                    <option value="I">I (08.30 - 09.05 WIB)</option>
                                    <option value="II">II (10.00 - 10.35 WIB)</option>
                                    <option value="III">III (13.30 - 14.05 WIB)</option>
                                </select>
                            </div>
                            <input type="hidden" class="form-control" name="tiket" id="tiket">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                        <a id="jadwal-button" href="#" type="button" class="btn btn-primary">Setuju</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Link Konsultasi-->
        <div class="modal fade" id="link_konsultasi" tabindex="-1" role="dialog" aria-labelledby="linkModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Link Konsultasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url("admin/konsultasi_link/") ?>" id="link-form" method="post">
                            <div class="form-group">
                                <label for="tiket-name" class="col-form-label">No Tiket:</label>
                                <input type="text" class="form-control" name="tiket_konsultasi" id="tiket-name" value="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="link" class="col-form-label">Link Konsultasi:</label>
                                <input type="text" class="form-control" name="link" id="link">
                            </div>
                            <input type="hidden" class="form-control" name="tiket" id="tiket">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                        <a id="link-button" href="#" type="button" class="btn btn-primary">Setuju</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Bukti Konsultasi-->
        <div class="modal fade" id="bukti_konsultasi" tabindex="-1" role="dialog" aria-labelledby="buktiModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Bukti Konsultasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url("admin/konsultasi_bukti/") ?>" id="bukti-form" method="post">
                            <div class="form-group">
                                <label for="tiket-name" class="col-form-label">No Tiket:</label>
                                <input type="text" class="form-control" name="tiket_konsultasi" id="tiket-name" value="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="bukti_konsultasi" class="col-form-label">Bukti Konsultasi:</label>
                                <input type="text" class="form-control" name="bukti_konsultasi" id="bukti_konsultasi">
                            </div>
                            <input type="hidden" class="form-control" name="tiket" id="tiket">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                        <a id="bukti-button" href="#" type="button" class="btn btn-primary">Setuju</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus Konsultasi-->
        <div class="modal fade" id="delete_konsultasi" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Konsultasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h7 class="modal-title text-justify" id="confirmModalLabel"> Apakah anda setuju untuk menghapus permintaan konsultasi ini?</h7>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                        <a id="confirm-button" href="#" type="button" class="btn btn-primary">Setuju</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        // detail konsultasi
        $('#detail_konsultasi').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var tiket = button.data('tiket')

            // AJAX detail konsultasi
            $.post("<?= base_url("/admin/konsultasi_detail") ?>", {
                    'tiket': tiket
                },
                function(data) {
                    json = JSON.parse(data)

                    var modal = $('#detail_konsultasi')
                    modal.find('#lembaga').text(json.kategori_instansi)
                    modal.find('#nama_lembaga').text(json.nama_instansi)
                    modal.find('#no_tiket').text(json.tiket)
                    modal.find('#nama_pembuat').text(json.user_konsultasi)
                    modal.find('#pekerjaan_pembuat').text(json.konsultasi_pekerjaan)
                    modal.find('#notelp_pembuat').text(json.telepon)
                    modal.find('#tanggal_konsultasi').text(json.tanggal)
                    modal.find('#sesi_konsultasi').text(json.sesi)
                    modal.find('#metode_konsultasi').text(json.nama_metode)
                    modal.find('#keperluan_konsultasi').text(json.keperluan)
                    modal.find('#bukti_detail').text(json.tiket)
                    if (json.konfirmasi_admin == 1) {
                        modal.find('#konfirmasi_konsultasi').text("Sudah Dikonfirmasi")
                    } else {
                        modal.find('#konfirmasi_konsultasi').text("Belum Dikonfirmasi")
                    }
                    if (json.link != null) {
                        modal.find('#link_detail').attr('href', json.link.link);
                        modal.find('#link_detail span').text('Zoom link');
                    } else {
                        modal.find('#link_detail').attr('href', "#");
                        modal.find('#link_detail span').text('Belum terdapat link zoom');
                    }
                },
            );
        })

        // konfirmasi konsultasi
        $('#confirm_konsultasi').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var tiket = button.data('tiket')
            var admin = button.data('admin')

            var modal = $(this)
            if (admin == "cancel") {
                modal.find('#confirm-button').attr('href', "<?= base_url('batalkan_pengajuan/') ?>" + tiket);
                modal.find('#confirmModalLabel').text("Apakah anda yakin untuk membatalkan konfirmasi konsultasi tersebut?")
            } else {
                modal.find('#confirm-button').attr('href', "<?= base_url('konfirmasi_pengajuan/') ?>" + tiket + "/" + admin);
                modal.find('#confirmModalLabel').text("Apakah anda yakin untuk menyetujui konfirmasi konsultasi tersebut?")
            }
        })

        // pengubahan jadwal konsultasi
        $('#jadwal_konsultasi').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var tiket = button.data('tiket')
            var jadwal = button.data('jadwal')
            var sesi = button.data('sesi')
            // var date = jadwal.split("-")
            // date = new Date(date[2], date[1] - 1, date[0]);
            // jadwal = date.toLocaleString('default', {
            //     weekday: "long",
            //     year: "numeric",
            //     month: "long",
            //     day: "numeric",
            // })

            var modal = $(this)
            modal.find('#tiket-name').val(tiket);
            modal.find('#jadwal_konsultasi').val(jadwal + " [Sesi " + sesi + "]");
            modal.find('#tiket').val(tiket);
        })

        $('#jadwal-button').on('click', function(event) {
            $('#jadwal-form').submit()
        })

        // penambahan link konsultasi
        $('#link_konsultasi').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var tiket = button.data('tiket')
            var link = button.data('link')

            var modal = $(this)
            modal.find('#tiket-name').val(tiket);
            modal.find('#tiket').val(tiket);
        })

        $('#link-button').on('click', function(event) {
            $('#link-form').submit()
        })

        // penambahan bukti konsultasi
        $('#bukti_konsultasi').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var tiket = button.data('tiket')

            var modal = $(this)
            modal.find('#tiket-name').val(tiket);
            modal.find('#tiket').val(tiket);
        })

        $('#bukti-button').on('click', function(event) {
            $('#bukti-form').submit()
        })
    </script>
</body>

</html>