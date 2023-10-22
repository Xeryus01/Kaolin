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

                    <!-- Page Heading
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

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
                                        <li class="breadcrumb-item text-muted"><span>Users Management</span></li>
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
                                            <td>Email</td>
                                            <td class="text-center">Role</td>
                                            <td class="text-center">Tindakan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($users as $user) : ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $i ?>
                                                </td>
                                                <td>
                                                    <?= $user['secret'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $user['group'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <div>
                                                        <?php if ($user['group'] != 'superadmin') : ?>
                                                            <button class="btn btn-xs btn-outline-secondary" type="button" data-toggle="modal" data-target="#roleusers" data-id="<?= $user['id'] ?>" data-email="<?= $user['secret'] ?>">
                                                                <span class="text-xs"><i class="fas fa-user text-secondary"></i>&ensp;Ganti role</span>
                                                            </button>
                                                            <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#activeusers" data-id="<?= $user['id'] ?>"><i class="fas fa-user text-secondary"></i>&ensp;Ganti role</button>
                                                            </div> -->
                                                        <?php endif; ?>
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

            <!-- Modal Change User Role-->
            <div class="modal fade" id="roleusers" tabindex="-1" role="dialog" aria-labelledby="activeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pengubahan Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url("admin/user_change_role/") ?>" id="role-form" method="post">
                                <div class="form-group">
                                    <label for="user-name" class="col-form-label">User:</label>
                                    <input type="text" class="form-control" name="user_name" id="user-name" value="" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="role-user" class="col-form-label">Role:</label>
                                    <select class="form-control" id="role-user" name="role_user">
                                        <option value="user">user</option>
                                        <option value="admin">admin</option>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="user_id" id="user_id" value="">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button id="confirm-button" type="button" class="btn btn-primary">Setuju</button>
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->include('\App\Views\admin\template\footer') ?>

        </div>
        <!-- End of Content Wrapper -->

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
        $('#roleusers').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var email = button.data('email')

            var modal = $(this)
            modal.find('#user-name').val(email);
            modal.find('#user_id').val(id);
            modal.find('#exampleModalLabel').text("Pengubahan Role : " + email);
        })

        $('#confirm-button').on('click', function(event) {
            $('#role-form').submit()
        })
    </script>
</body>

</html>