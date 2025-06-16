<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row mb-4 mt-3">
                <div class="col-12 text-center">
                    <div
                        style="background: linear-gradient(135deg, #a8c6f0, #e2f0fb); color: #1f2f49; padding: 26px 36px; border-radius: 16px; box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);">
                        <h2 style="font-weight: 600; font-size: 28px; margin-bottom: 12px;">
                            Welcome back, <span
                                style="color: #7a56c2;"><?= ucwords(strtolower($_SESSION["STAFF"])) ?></span> 👋
                        </h2>
                        <p style="font-size: 17px; margin: 0; color: #3e4e65;">
                            Let’s make today count at <strong>PKK CorporateConnect</strong> — bringing UMT excellence to
                            life!
                        </p>
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- Column -->

                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo module_url('permohonan/form_program') ?>"
                        class="card bg-box position-relative text-bg-info text-decoration-none">
                        <div class="card-body text-center">
                            <h5 class="text-white mb-0 fw-bold">Permohonan Perkhidmatan/Cenderamata</h5>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo module_url('permohonan/form_billboard') ?>"
                        class="card bg-box position-relative text-bg-secondary text-decoration-none">
                        <div class="card-body text-center">
                            <h5 class="text-white mb-0 fw-bold">Permohonan<br>Paparan Papan Iklan</h5>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo module_url('permohonan/view_program') ?>"
                        class="card bg-box position-relative text-bg-success text-decoration-none">
                        <div class="card-body text-center">
                            <!-- <h2 class="fw-bold fs-8 text-white">2,064</h2> -->
                            <h5 class="text-white mb-0 fw-bold">Senarai<br>Permohonan</h5>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo module_url('permohonan/sejarah_permohonan') ?>"
                        class="card bg-box position-relative text-bg-warning text-decoration-none">
                        <div class="card-body text-center">
                            <!-- <h2 class="fw-bold fs-8 text-white">2,064</h2> -->
                            <h5 class="text-white mb-0 fw-bold">Sejarah <br>Permohonan</h5>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <!-- Column -->
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo module_url('permohonan/form_program') ?>"
                        class="card bg-box position-relative text-decoration-none"
                        style="background-color: #A8DADC; color: #1D3557; border-radius: 8px;">
                        <div class="card-body text-center">
                            <h5 class="mb-0 fw-bold">Permohonan Perkhidmatan/Cenderamata</h5>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo module_url('permohonan/form_papan_iklan') ?>"
                        class="card bg-box position-relative text-decoration-none"
                        style="background-color: #F4A261; color: #264653; border-radius: 8px;">
                        <div class="card-body text-center">
                            <h5 class="mb-0 fw-bold">Permohonan<br>Paparan Papan Iklan</h5>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo module_url('permohonan/view_program') ?>"
                        class="card bg-box position-relative text-decoration-none"
                        style="background-color: #E9C46A; color: #2A9D8F; border-radius: 8px;">
                        <div class="card-body text-center">
                            <h5 class="mb-0 fw-bold">Senarai<br>Permohonan</h5>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo module_url('permohonan/sejarah_permohonan') ?>"
                        class="card bg-box position-relative text-decoration-none"
                        style="background-color:rgb(255, 199, 180); color: #6D6875; border-radius: 8px;">
                        <div class="card-body text-center">
                            <h5 class="mb-0 fw-bold">Sejarah <br>Permohonan</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Statistics Dashboard Section -->
            <div class="container my-4">

                <!-- Section: Application Summary -->
                <div class="card border-0 shadow-sm mb-4">
                    <div
                        class="card-header bg-gradient-to-r from-indigo-500 to-purple-500 text-white border-bottom d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Ringkasan Permohonan</h5>
                        <!-- <form action="<?php echo module_url('permohonan/report_program') ?>" method="post" class="mb-0"> -->
                        <button type="button" class="btn btn-warning me-1 mt-2" id="btn_export_report">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                            </svg>
                            Export Laporan
                        </button>
                        <!-- </form> -->
                    </div>
                    <div class="card-body">
                        <!-- Summary Stats -->
                        <h5 class="mb-4">Maklumat Program</h5>
                        <div class="row text-center g-3 mb-4">
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-secondary bg-opacity-10 rounded">
                                    <div class="fw-semibold text-secondary">Program</div>
                                    <div class="fs-4 fw-bold text-secondary"><?= $data_program ?></div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-success bg-opacity-10 rounded">
                                    <div class="fw-semibold text-success">Disahkan</div>
                                    <div class="fs-4 fw-bold text-success">
                                        <?= $data_program - $prog_belum_sah ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-warning bg-opacity-10 rounded">
                                    <div class="fw-semibold text-warning">Menunggu</div>
                                    <div class="fs-4 fw-bold text-warning"><?= $prog_belum_sah ?></div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-danger bg-opacity-10 rounded">
                                    <div class="fw-semibold text-danger">Dijalankan</div>
                                    <div class="fs-4 fw-bold text-danger"><?= $prog_dijalankan ?></div>
                                </div>
                            </div>

                        </div>

                        <!-- Sorting Section -->
                        <h5 class="mb-4">Maklumat Permohonan Perkhidmatan</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label for="filterMonth" class="form-label fw-semibold">Bulan</label>
                                <select class="form-select" id="filterMonth" name="month">
                                    <option value="" selected>Semua Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Mac</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Jun</option>
                                    <option value="07">Julai</option>
                                    <option value="08">Ogos</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Disember</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="filterStatus" class="form-label fw-semibold">Status Permohonan</label>
                                <select class="form-select" id="filterStatus" name="status">
                                    <option value="" selected>Semua Status</option>
                                    <option value="approved">Diluluskan</option>
                                    <option value="pending">Menunggu</option>
                                    <option value="rejected">Ditolak</option>
                                    <option value="cancelled">Dibatalkan</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="filterUser" class="form-label fw-semibold">Jenis Pengguna</label>
                                <select class="form-select" id="filterUser" name="user_type">
                                    <option value="" selected>Semua Pengguna</option>
                                    <option value="internal">Dalaman UMT</option>
                                    <option value="external">Luaran</option>
                                </select>
                            </div>
                        </div>


                        <!-- Chart.js Visualization -->
                        <div class="card">
                            <div class="card-body d-flex justify-content-center">
                                <div style="width:25rem;">
                                    <canvas id="permohonanChart" height="200"></canvas>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Chart.js CDN -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <?php

                $total_lulus = 0;
                $total_pending = 0;
                $total_rejected = 0;
                $total_cancelled = 0;

                foreach ($data_permohonan as $item) {
                    if (isset($item->T05_PENGARAH)) {
                        switch ($item->T05_PENGARAH) {
                            case "1":
                                $total_lulus++;
                                break;
                            case "0":
                                $total_rejected++;
                                break;
                        }
                    } else {
                        $total_pending++;
                    }
                }
                ?>

                <!-- Chart Initialization Script -->
                <script>
                    const ctx = document.getElementById('permohonanChart').getContext('2d');
                    const permohonanChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Diluluskan', 'Menunggu', 'Ditolak', 'Dibatalkan'],
                            datasets: [{
                                data: [
                                    <?= $total_lulus ?>,
                                    <?= $total_pending ?>,
                                    <?= $total_rejected ?>,
                                    <?= $total_cancelled ?>
                                ],
                                backgroundColor: [
                                    '#5FB49C', // Soft teal (approved)
                                    '#F7C59F', // Light peach (pending)
                                    '#EF767A', // Coral red (rejected)
                                    '#A2A8D3'  // Periwinkle (cancelled)
                                ],
                                borderColor: '#fff',
                                borderWidth: 2,
                                hoverOffset: 8
                            }]
                        },
                        options: {
                            responsive: true,
                            cutout: '45%',
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        font: {
                                            size: 14
                                        },
                                        color: '#333',
                                        generateLabels: function (chart) {
                                            const data = chart.data;
                                            const datasets = data.datasets;
                                            const labels = data.labels;
                                            return datasets[0].data.map((value, index) => {
                                                return {
                                                    text: labels[index] + ` (${value})`,
                                                    fillStyle: datasets[0].backgroundColor[index]
                                                }
                                            });
                                        }
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function (context) {
                                            return `${context.label}: ${context.parsed}`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                </script>


                <!-- Section: Service Usage -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="card-title mb-0">Statistik Penggunaan Perkhidmatan</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <?php
                                foreach ($statistik_perkhidmatan as $item) { ?>
                                    <tr>
                                        <td><?= $item->T03_NAMA_PERKHIDMATAN ?></td>
                                        <td class="text-end fw-bold"><?= $item->TOTAL ?></td>
                                    </tr>
                                    <?php
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Section: User Breakdown -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="card-title mb-0">Kategori Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center g-3">
                            <div class="col-6">
                                <div class="p-3 bg-info bg-opacity-10 rounded">
                                    <div class="fw-semibold text-info">Pengguna Dalaman (UMT)</div>
                                    <div class="fs-4 fw-bold text-info">30</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 bg-primary bg-opacity-10 rounded">
                                    <div class="fw-semibold text-primary">Pengguna Luar</div>
                                    <div class="fs-4 fw-bold text-primary"><?= $warga_luar->TOTAL ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Feedback Overview -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="card-title mb-0">Maklum Balas Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Jumlah Maklum Balas Diterima</span>
                                <span class="fw-bold">18</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Penilaian Purata</span>
                                <span class="fw-bold text-success">4.3 / 5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Maklum Balas Positif</span>
                                <span class="fw-bold text-success">13</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Aduan / Cadangan</span>
                                <span class="fw-bold text-warning">5</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="<?php echo base_url('images/logo_umt.png') ?>" class="d-block w-50" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="<?php echo base_url('images/logo_umt.png') ?>" class="d-block w-50" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo base_url('images/logo_umt.png') ?>" class="d-block w-50" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>


        </div>

    </div>
</div>

<!-- Export Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo module_url('permohonan/report_program') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Export Laporan Mengikut Bulan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exportMonth" class="form-label">Pilih Bulan</label>
                        <select class="form-select" id="exportMonth" name="month" required>
                            <option value="" selected disabled>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Mac</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Jun</option>
                            <option value="07">Julai</option>
                            <option value="08">Ogos</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Disember</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">Export</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const btn_export_report = document.getElementById('btn_export_report');
    btn_export_report.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent form submission
        var reportModal = new bootstrap.Modal(document.getElementById('reportModal'));
        reportModal.show();
    });
</script>