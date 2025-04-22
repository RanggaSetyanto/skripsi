<?= $this->extend('User/layoutstaf/template'); ?>

<?= $this->Section('content'); ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            Pendaftaran<br>
                                            <h3><?= $totalPendaftaran ?></h3>
                                        </div>
                                        <i class="fas fa-file-alt fa-2x"></i>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            Jamaah<br>
                                            <h3><?= $totalJamaah ?></h3>
                                        </div>
                                        <i class="fas fa-users fa-2x"></i>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            Paket Umroh<br>
                                            <h3><?= $totalPaket ?></h3>
                                        </div>
                                        <i class="fas fa-suitcase-rolling fa-2x"></i>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            Pembayaran<br>
                                            <h3><?= $totalPembayaran ?></h3>
                                        </div>
                                        <i class="fas fa-money-bill-wave fa-2x"></i>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Chart Section -->
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Statistik Umrah
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-container" style="position: relative; height:60vh; width:100%">
                                            <canvas id="dashboardChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <?= $this->endSection(); ?>
                <!-- SECTION UNTUK SCRIPT -->
                <?= $this->section('script') ?>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx = document.getElementById('dashboardChart').getContext('2d');
                        const dashboardChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Pendaftaran', 'Jamaah', 'Paket Umroh', 'Pembayaran'],
                                datasets: [{
                                    label: 'Jumlah Data',
                                    data: [<?= $totalPendaftaran ?>, <?= $totalJamaah ?>, <?= $totalPaket ?>, <?= $totalPembayaran ?>],
                                    backgroundColor: [
                                        'rgba(0, 123, 255, 0.7)',
                                        'rgba(255, 193, 7, 0.7)',
                                        'rgba(40, 167, 69, 0.7)',
                                        'rgba(220, 53, 69, 0.7)'
                                    ],
                                    borderColor: [
                                        'rgba(0, 123, 255, 1)',
                                        'rgba(255, 193, 7, 1)',
                                        'rgba(40, 167, 69, 1)',
                                        'rgba(220, 53, 69, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                layout: {
                                    padding: {
                                        top: 10,
                                        bottom: 10,
                                        left: 10,
                                        right: 10
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: true,
                                        position: 'top'
                                    },
                                    tooltip: {
                                        enabled: true
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            precision: 0,
                                            stepSize: 1
                                        },
                                        title: {
                                            display: true,
                                            text: 'Jumlah'
                                        }
                                    },
                                    x: {
                                        title: {
                                            display: true,
                                            text: 'Kategori'
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                <?= $this->endSection() ?>