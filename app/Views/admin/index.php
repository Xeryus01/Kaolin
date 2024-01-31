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

                    <!-- ATAS DIISI DASHBOARD JUMLAH USER AKTIF DAN JUMLAH KONSULTASI YANG SUDAH DIAJUKAN -->
                    <!-- ISI DENGAN FITUR ADMIN YANG DISEDIAKAN -->


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="row">
                        <div class="col-xl-8 col-lg-6">
                            <!-- Jumlah Pengguna -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <!-- Jumlah Admin -->
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                Admin</div>
                                                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                                if (isset($count_user['admin'])) {
                                                                                                                    echo ($count_user['admin'] + 1);
                                                                                                                } else {
                                                                                                                    echo ('0');
                                                                                                                } ?></div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-user-secret fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Jumlah Pengguna -->
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-success shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                                Pengguna</div>
                                                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                                if (isset($count_user['user'])) {
                                                                                                                    echo ($count_user['user']);
                                                                                                                } else {
                                                                                                                    echo ('0');
                                                                                                                } ?></div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Konsultasi -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Konsultasi</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Offline
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Online (Zoom)
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Online (Whatsapp)
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- Jumlah Pengguna -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Features</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card shadow mb-4">
                                                <div class="card-body text-center">
                                                    <a href="<?= base_url('admin/user_list'); ?>" class="col btn btn-outline-success">Manajemen Users</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card shadow mb-4">
                                                <div class="card-body text-center">
                                                    <a href="<?= base_url('admin/konsultasi_list'); ?>" class="col btn btn-outline-success">Manajemen Konsultasi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <button type="button" class="btn btn-outline-success">Manajemen Users</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-success shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <button type="button" class="btn btn-outline-success">Manajemen Konsultasi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Offline", "Online (Zoom)", "Online (Whatsapp)"],
                datasets: [{
                    data: [
                        <?php
                        if (isset($count_konsultasi['1'])) {
                            echo ($count_konsultasi['1'] . ', ');
                        } else {
                            echo ('0, ');
                        }
                        if (isset($count_konsultasi['2'])) {
                            echo ($count_konsultasi['2'] . ', ');
                        } else {
                            echo ('0, ');
                        }
                        if (isset($count_konsultasi['3'])) {
                            echo ($count_konsultasi['3']);
                        } else {
                            echo ('0');
                        } ?>
                    ],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>
</body>

</html>