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
                            <h6 class="m-0 font-weight-bold text-primary">Management User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>No Tiket</td>
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
                                                    <?= $data['tiket'] ?>
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
                                                            <a class="dropdown-item" type="button" href="<?= base_url('change_status_user/' . $data['id']) ?>"><i class="fas fa-info text-secondary"></i>&ensp;Detail</a>
                                                            <?php if ($data['konfirmasi_admin'] == 1) : ?>
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#confirm_konsultasi" data-tiket="<?= $data['tiket'] ?>" data-admin="cancel"><i class="fas fa-toggle-off text-secondary"></i>&ensp;Batalkan Konfirmasi</button>
                                                            <?php else : ?>
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#confirm_konsultasi" data-tiket="<?= $data['tiket'] ?>" data-admin="<?= $data['token_admin'] ?>"><i class="fas fa-toggle-on text-secondary"></i>&ensp;Konfirmasi Pengajuan</button>
                                                            <?php endif; ?>
                                                            <a class="dropdown-item" type="button" href="<?= base_url('change_status_user/' . $data['id']) ?>"><i class="fas fa-calendar text-secondary"></i>&ensp;Ganti Jadwal</a>
                                                            <?php if ($data['metode'] > 1) : ?>
                                                                <a class="dropdown-item" type="button" href="<?= base_url('change_status_user/' . $data['id']) ?>"><i class="fas fa-link text-secondary"></i>&ensp;Tambah Link</a>
                                                            <?php endif; ?>
                                                            <a class="dropdown-item" type="button" href="<?= base_url('delete_user/' . $data['id']) ?>"><i class="fas fa-file text-secondary"></i>&ensp;Tambah Bukti Konsultasi</a>
                                                            <a class="dropdown-item" type="button" href="<?= base_url('delete_user/' . $data['id']) ?>"><i class="fas fa-trash text-secondary"></i>&ensp;Hapus Pengajuan</a>
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

        <!-- Modal Aktivasi User-->
        <div class="modal fade" id="confirm_konsultasi" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Ulang Status User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h7 class="modal-title text-justify" id="exampleModalLabel">Apakah anda yakin akan mengubah status user tersebut?</h7>
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
        $('#confirm_konsultasi').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var tiket = button.data('tiket')
            var admin = button.data('admin')

            var modal = $(this)
            if (admin == "cancel") {
                modal.find('#confirm-button').attr('href', "<?= base_url('batalkan_pengajuan/') ?>" + tiket);
            } else {
                modal.find('#confirm-button').attr('href', "<?= base_url('konfirmasi_pengajuan/') ?>" + tiket + "/" + admin);
            }
        })
    </script>
</body>

</html>