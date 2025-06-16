<?php $number = 1;
$date_mula = new DateTime($data_program->T02_TARIKH_MULA);
$date_tamat = new DateTime($data_program->T02_TARIKH_TAMAT);
$date_create = DateTime::createFromFormat('d-M-y h.i.s.u A', $data_program->T02_CREATE_ON, new DateTimeZone('UTC'));


$today = new DateTime();

// var_dump(value: $data_cenderamata); ?>

<style>
    .fade-in {
        opacity: 0;
        transition: opacity 0.3s ease-in;
    }

    .fade-in.visible {
        opacity: 1;
    }
</style>

<div class="fade-in">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div style="margin-bottom: 15vh;">
                    <div class="row">
                        <div class="col-md-9">
                            <h3><strong><?= $data_program->T02_NAMA_PROGRAM ?></strong></h3>
                            <h5><strong><?= $date_mula->format('j F Y') ?> -
                                    <?= $date_tamat->format('j F Y') ?></strong>
                            </h5>
                            <p class="text-muted fst-italic fw-bold">Permohonan dibuat pada
                                <?= $date_create->format('d F Y, h:i A'); ?>
                            </p>
                            <div class="mb-4">
                                <?php if ($today < $date_tamat): ?>
                                    <span class="badge bg-success-subtle text-success rounded-pill fs-2">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger-subtle text-danger rounded-pill">Non Active</span>
                                <?php endif; ?>
                                <span class="badge bg-primary-subtle text-primary rounded-pill fs-2">Segera</span>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex mx-auto justify-content-end">
                            <div class="d-flex align-items-center gap-2">
                                <form action="<?php echo module_url('permohonan/edit_program') ?>" method="post">
                                    <input type="hidden" name="id_program" value="<?= $id_program ?>">
                                    <button type="submit" class="btn btn-rounded bg-warning-subtle text-warning">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                    </button>
                                </form>
                                <form action="<?php echo module_url('permohonan/delete_program') ?>" method="post">
                                    <input type="hidden" name="id_program" value="<?= $id_program ?>">
                                    <button type="submit" class="btn btn-rounded bg-danger-subtle text-danger"
                                        onclick="return confirm('Anda pasti ingin menghapus program ini?')">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body bg-light rounded" id="body_detail">
                            <div class="row">
                                <h4 class="mb-2"><strong>Butiran Program</strong></h4>
                                <div class="col">
                                    <div>
                                        <h5><strong><svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                                                </svg>
                                                Tempat : </strong></h5>
                                        <p class="fw-bold">
                                            <?= $data_program->T02_TEMPAT_PROGRAM ?>
                                        </p>
                                    </div>
                                    <div>
                                        <h5><strong><svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                Bilangan Peserta : </strong></h5>
                                        <p class="fw-bold">
                                            <?= $data_program->T02_BIL_PESERTA ?>
                                        </p>
                                    </div>
                                    <div>
                                        <h5><strong><svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                VIP : </strong></h5>
                                        <p class="fw-bold">
                                            <?= $data_program->T02_NAMA_PROGRAM ?>
                                        </p>
                                    </div>

                                </div>


                                <div class="col">
                                    <div class="row">
                                        <h5><strong><svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="square"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M7 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h1m4-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm7.441 1.559a1.907 1.907 0 0 1 0 2.698l-6.069 6.069L10 19l.674-3.372 6.07-6.07a1.907 1.907 0 0 1 2.697 0Z" />
                                                </svg>
                                                Nama Pemohon : </strong></h5>
                                        <p class="fw-bold">
                                            <?= $_SESSION["STAFF"] ?>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <h5><strong><svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z" />
                                                </svg>
                                                Fakulti/Jabatan : </strong></h5>
                                        <p class="fw-bold">
                                            <?= $_SESSION["ptj"] ?>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <?php if (!empty($data_program->T02_TENTATIF)) { ?>
                                <button type="button" class="btn btn-secondary mt-2 me-1"
                                    onclick="viewPdf('<?= base_url('upload/tentatif/' . $data_program->T02_TENTATIF) ?>')"><svg
                                        class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z" />
                                    </svg>
                                    Lihat Tentatif</button>
                            <?php } else { ?>
                                Tiada fail tentatif
                            <?php } ?>
                            <script>
                                function viewPdf(url) {
                                    let w = window.open(url);
                                    w.document.title = "Tentatif Program";
                                }
                            </script>
                            <form action="<?php echo module_url('permohonan/report_perkhidmatan') ?>" method="post"
                                class="d-inline">
                                <input type="hidden" name="id_program" value="<?= $id_program ?>">
                                <button type="submit" class="btn btn-info me-1 mt-2">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                                    </svg>
                                    Laporan
                                </button>
                            </form>
                        </div>
                    </div>



                    <div class="row align-items-center mb-3 mt-4">
                        <div class="col">
                            <h3>Senarai Perkhidmatan</h3>
                        </div>
                        <div class="col text-end">
                            <?php if ($check_perkhidmatan == 1) { ?>
                                <!-- <form action="<?php echo module_url('permohonan/report_perkhidmatan') ?>" method="post"
                                    class="d-inline">
                                    <input type="hidden" name="id_program" value="<?= $id_program ?>">
                                    <button type="submit" class="btn btn-info me-1">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                                        </svg>
                                        Laporan
                                    </button>
                                </form> -->
                                <!-- <form action="<?php echo module_url('permohonan/report_perkhidmatan1') ?>" method="post"
                                    class="d-inline">
                                    <input type="hidden" name="id_program" value="<?= $id_program ?>">
                                    <button type="submit" class="btn btn-info me-1">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                                        </svg>
                                        Laporan1
                                    </button>
                                </form> -->
                                <a href="<?php echo module_url('permohonan/edit_perkhidmatan/' . $id_program) ?>"
                                    class="btn btn-success"><svg class="w-6 h-6 text-gray-800 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                    </svg>
                                    Kemaskini</a>
                            <?php } else { ?>
                                <a href="<?php echo module_url('permohonan/form_perkhidmatan/' . $id_program) ?>"
                                    class="btn btn-success"><svg class="w-6 h-6 text-gray-800 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 12h14m-7 7V5" />
                                    </svg>
                                    Tambah Perkhidmatan</a>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="text-center">
                        <table class="table table-hover border">
                            <thead class="bg-info">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perkhidmatan</th>
                                    <th>Tindakan</th>
                                    <th>Status</th>
                                    <th>Komen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$check_perkhidmatan == 1) { ?>
                                    <tr>
                                        <td colspan="5" class="text-center bg-white">
                                            <span class="badge bg-danger-subtle text-danger fs-3">Permohonan
                                                perkhidmatan
                                                belum
                                                dibuat
                                                mohon
                                                sekarang</span>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <?php foreach ($data as $list) { ?>
                                        <tr>
                                            <td><?= $number ?></td>
                                            <td><?= $list->T03_NAMA_PERKHIDMATAN ?></td>
                                            <td>
                                                <button type="button" class="btn btn-rounded bg-danger-subtle text-danger"
                                                    onclick="confirmDelete('<?php echo module_url('permohonan/delete_perkhidmatan/' . $list->T05_ID) . "/" . $id_program ?>', '<?= $list->T03_NAMA_PERKHIDMATAN ?>')">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                    </svg>
                                                </button>
                                            </td>
                                            <?php if ($list->T05_PENGARAH == 1) { ?>
                                                <td style="color: green;">
                                                    <p class="badge bg-success-subtle text-success">Diluluskan</p>
                                                </td>
                                            <?php } else if ($list->T05_PENGARAH == null) { ?>
                                                    <td style="color: grey;">
                                                        <p class="badge bg-warning-subtle text-warning">Belum disahkan</p>
                                                    </td>
                                            <?php } else { ?>
                                                    <td style="color: red;">
                                                        <p class="badge bg-danger-subtle text-danger">Ditolak</p>
                                                    </td>
                                            <?php } ?>
                                            <td><?= isset($list->T05_KOMEN_PENGARAH) ? $list->T05_KOMEN_PENGARAH : "-" ?></td>
                                        </tr>
                                        <?php $number++;
                                    } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div style="margin-bottom: 15vh;">
                    <div class="row align-items-center mb-3 mt-4">
                        <div class="col">
                            <h3>Senarai Cenderamata</h3>
                        </div>
                        <div class="col text-end">
                            <form action="<?php echo module_url('permohonan/form_cenderamata1') ?>" method="post">
                                <input type="hidden" name="id_program" value="<?= $id_program ?>">
                                <button type="submit" class="btn btn-success"><svg
                                        class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 12h14m-7 7V5" />
                                    </svg>
                                    Tambah Cenderamata</button>
                            </form>
                        </div>
                    </div>

                    <div class="text-center">
                        <table class="table table-hover border">
                            <thead class="bg-info">
                                <tr>
                                    <th>Number</th>
                                    <th>Nama Cenderamata</th>
                                    <th>Bilangan</th>
                                    <th>Total Harga</th>
                                    <th>Tindakan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$check_cenderamata == 1) { ?>
                                    <tr>
                                        <td colspan="5" class="text-center bg-white">
                                            <span class="badge bg-danger-subtle text-danger fs-3">Permohonan cenderamata
                                                belum
                                                dibuat
                                                mohon
                                                sekarang</span>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <?php $number = 1;
                                    foreach ($data_cenderamata as $list) { ?>
                                        <tr>
                                            <td><?= $number ?></td>
                                            <td><?= $list->T04_CNAMA ?></td>
                                            <td><?= $list->T07_BIL ?></td>
                                            <td>RM <?= number_format((float) ($list->T07_HARGA * $list->T07_BIL), 2, '.', '') ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-rounded bg-primary-subtle text-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editCenderamataModal<?= $list->T04_ID ?>">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M15 4h3a1 1 0 0 1 1 1v3H9v-4h15m0 4V5a1 1 0 0 1 1 1h3a1 1 0 0 1 1 1V4a1 1 0 0 0-1 1h-3v3a1 1 0 0 1-1 1H6a1 1 0 0 0-1 1v4a1 1 0 0 1 1 1h3v-3a1 1 0 0 1 1-1Z" />
                                                    </svg>
                                                </button>


                                                <!-- Modal edit quantity -->
                                                <div class="modal fade" id="editCenderamataModal<?= $list->T04_ID ?>"
                                                    tabindex="-1" aria-labelledby="editCenderamataModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editCenderamataModalLabel">
                                                                    Kemaskini Bilangan
                                                                    Cenderamata</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="<?php echo module_url('permohonan/update_cenderamata') ?>"
                                                                    method="post">
                                                                    <input type="hidden" name="T07_ID"
                                                                        value="<?= $list->T07_ID ?>">
                                                                    <input type="hidden" name="T02_ID"
                                                                        value="<?= $id_program ?>">
                                                                    <div class="mb-3 text-start">
                                                                        <label for="T07_BIL" class="form-label">Bilangan</label>
                                                                        <input type="number" class="form-control" id="t07_bil"
                                                                            name="T07_BIL" value="<?= $list->T07_BIL ?>"
                                                                            required>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Kemaskini</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <button type="button"
                                                    class="btn btn-rounded bg-danger-subtle text-danger d-inline"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal<?= $list->T04_ID ?>">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                    </svg>
                                                </button>

                                                <!-- Modal delete message -->
                                                <div class="modal fade" id="confirmDeleteModal<?= $list->T04_ID ?>"
                                                    tabindex="-1" aria-labelledby="confirmDeleteModalLabel<?= $list->T04_ID ?>"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="confirmDeleteModalLabel<?= $list->T04_ID ?>">Sahkan
                                                                    Padam</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Adakah anda pasti ingin memadamkan cenderamata
                                                                <strong><?= $list->T04_CNAMA ?></strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form
                                                                    action="<?php echo module_url('permohonan/delete_cenderamata') ?>"
                                                                    method="post">
                                                                    <input type="hidden" name="id_cenderamata"
                                                                        value="<?= $list->T04_ID ?>">
                                                                    <input type="hidden" name="id_program"
                                                                        value="<?= $id_program ?>">
                                                                    <button type="submit" class="btn btn-danger">Padam</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                            <?php if ($list->T07_STATUS == 1) { ?>
                                                <td style="color: green;">
                                                    <p class="badge bg-success-subtle text-success">Diluluskan</p>
                                                </td>
                                            <?php } else if ($list->T07_STATUS == null) { ?>
                                                    <td style="color: grey;">
                                                        <p class="badge bg-warning-subtle text-warning">Belum disahkan</p>
                                                    </td>
                                            <?php } else { ?>
                                                    <td style="color: red;">
                                                        <p class="badge bg-danger-subtle text-danger">Ditolak</p>
                                                    </td>
                                            <?php } ?>
                                        </tr>
                                        <?php $number++;
                                    } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div style="margin-bottom: 0vh;">
                    <div class="row align-items-center mb-3 mt-4">
                        <div class="col">
                            <h3>Sebut Harga</h3>
                        </div>
                    </div>

                    <div class="text-center">
                        <table class="table table-hover border">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Item</th>
                                    <th>Harga (RM)</th>
                                    <th>Kuantiti</th>
                                    <th>Jumlah (RM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$check_perkhidmatan && !$check_cenderamata) { ?>
                                    <tr>
                                        <td colspan="5" class="text-center bg-white">
                                            <span class="badge bg-danger-subtle text-danger fs-3">
                                                Tiada sebut harga untuk program ini. Sila tambah perkhidmatan atau
                                                cenderamata terlebih dahulu.
                                            </span>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <?php
                                    $number = 1;
                                    $total = 0.00;

                                    // List perkhidmatan (services)
                                    if ($check_perkhidmatan && !empty($data)) {
                                        foreach ($data as $list) {
                                            $nama = $list->T03_NAMA_PERKHIDMATAN ?? 'Perkhidmatan Tidak Dikenalpasti';
                                            $harga = floatval($list->T03_HARGA_WARGA ?? 0);
                                            $kuantiti = 1;
                                            $jumlah = $harga * $kuantiti;
                                            $total += $jumlah;
                                            ?>
                                            <tr>
                                                <td><?= $number++ ?></td>
                                                <td><?= $nama ?></td>
                                                <td><?= number_format($harga, 2) ?></td>
                                                <td><?= $kuantiti ?></td>
                                                <td><?= number_format($jumlah, 2) ?></td>
                                            </tr>
                                        <?php }
                                    }

                                    // List cenderamata
                                    if ($check_cenderamata && !empty($data_cenderamata)) {
                                        foreach ($data_cenderamata as $item) {
                                            $nama = $item->T04_CNAMA ?? 'Cenderamata Tidak Dikenalpasti';
                                            $harga = floatval($item->T04_CHARGA ?? 0);
                                            $kuantiti = intval($item->T07_BIL ?? 0);
                                            $jumlah = $harga * $kuantiti;
                                            $total += $jumlah;
                                            ?>
                                            <tr>
                                                <td><?= $number++ ?></td>
                                                <td><?= $nama ?></td>
                                                <td><?= number_format($harga, 2) ?></td>
                                                <td><?= $kuantiti ?></td>
                                                <td><?= number_format($jumlah, 2) ?></td>
                                            </tr>
                                        <?php }
                                    }
                                    ?>

                                    <!-- Jumlah keseluruhan -->
                                    <tr class="table-secondary fw-bold">
                                        <td colspan="4" class="text-end">Jumlah Keseluruhan (RM)</td>
                                        <td><?= number_format($total, 2) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>



                <a href="<?php echo module_url('permohonan/view_program/') ?>" class="btn btn-default">Kembali</a>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>

<!-- </form> -->

<!-- Modal for confirmation -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationLabel">Pengesahan Padam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Adakah anda pasti ingin membuang perkhidmatan "<span id="serviceName"></span>"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteButton" class="btn btn-danger">Padam</a>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmDelete(deleteUrl, serviceName) {
        // Set service name in the modal
        document.getElementById('serviceName').textContent = serviceName;

        // Set the confirmation button's href to the delete URL
        document.getElementById('confirmDeleteButton').href = deleteUrl;

        // Show the modal
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
        deleteModal.show();
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const fadeInElement = document.querySelector('.fade-in');
        fadeInElement.classList.add('visible');
    });
</script>