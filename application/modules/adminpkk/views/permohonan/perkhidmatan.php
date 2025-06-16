<?php $number = 1;
$date_mula = new DateTime($data_program->T02_TARIKH_MULA);
$date_tamat = new DateTime($data_program->T02_TARIKH_TAMAT);
$date_create = DateTime::createFromFormat('d-M-y h.i.s.u A', $data_program->T02_CREATE_ON, new DateTimeZone('UTC'));

$today = new DateTime();
?>
<style>
    .fade-in {
        opacity: 0;
        transition: opacity 0.3s ease-in;
    }

    .fade-in.visible {
        opacity: 1;
    }
</style>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div style="margin-bottom:;">
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
                                    <h5><strong><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                                viewBox="0 0 24 24">
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
                            <button type="button" class="btn btn-secondary mt-2"
                                onclick="viewPdf('<?= base_url('upload/' . $data_program->T02_TENTATIF) ?>')"><svg
                                    class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z" />
                                </svg>

                                Lihat
                                Tentatif</button>
                        <?php } else { ?>
                            Tiada fail tentatif
                        <?php } ?>
                        </h6>
                        <script>
                            function viewPdf(url) {
                                let w = window.open(url);
                                w.document.title = "Tentatif Program";
                            }
                        </script>

                    </div>
                </div>


                <div class="row align-items-center mb-3 mt-4">
                    <div class="col">
                        <h3>Senarai Perkhidmatan</h3>
                    </div>
                    <div class="col text-end">
                        <?php if ($check_perkhidmatan == 1) { ?>
                            <a href="<?php echo module_url('permohonan/semak_laporan/' . $id_program) ?>"
                                class="btn btn-info me-1"><svg class="w-6 h-6 text-gray-800 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                                </svg>
                                Laporan</a>
                            <a href="<?php echo module_url('permohonan/edit_perkhidmatan/' . $id_program) ?>"
                                class="btn btn-success"><svg class="w-6 h-6 text-gray-800 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                </svg>
                                Kemaskini</a>
                        <?php } else { ?>
                            <a href="<?php echo module_url('permohonan/form_perkhidmatan/' . $id_program) ?>"
                                class="btn btn-success"><svg class="w-6 h-6 text-gray-800 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                                Tambah Perkhidmatan</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="text-center">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perkhidmatan</th>
                                <th>Padam</th>
                                <th>Tindakan</th>
                                <th>Status Pengarah</th>
                                <th class="bg-light">Status Seksyen</th>
                                <th class="bg-light">Komen Seksyen</th>
                                <th>Komen</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="<?= module_url('permohonan/lulus_pengarah') ?>" method="post"
                                            style="display: inline;">
                                            <input type="hidden" name="id_perkhidmatan" value="<?= $list->T05_ID ?>">
                                            <input type="hidden" name="id_program" value="<?= $id_program ?>">
                                            <button type="submit" class="btn btn-success">Lulus</button>
                                        </form>
                                        <form action="<?= module_url('permohonan/batal_pengarah') ?>" method="post"
                                            style="display: inline;">
                                            <input type="hidden" name="id_perkhidmatan" value="<?= $list->T05_ID ?>">
                                            <input type="hidden" name="id_program" value="<?= $id_program ?>">
                                            <button type="submit" class="btn btn-warning">Tolak</button>
                                        </form>
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
                                    <?php if ($list->T05_SEKSYEN_ADMIN == 1) { ?>
                                        <td class="bg-light" style="color: green;">
                                            <p class="badge bg-success-subtle text-success">Disokong</p>
                                        </td>
                                    <?php } else if ($list->T05_SEKSYEN_ADMIN == null) { ?>
                                            <td class="bg-light" style="color: grey;">
                                                <p class="badge bg-warning-subtle text-warning">Belum disahkan</p>
                                            </td>
                                    <?php } else { ?>
                                            <td class="bg-light" style="color: red;">
                                                <p class="badge bg-danger-subtle text-danger">Tidak Disokong</p>
                                            </td>
                                    <?php } ?>
                                    <?php if (isset($list->T05_KOMEN_SEKSYEN)) { ?>
                                        <td class="bg-light"> <button type="button" class="btn btn-secondary"
                                                data-bs-toggle="modal" data-bs-target="#komenViewModal<?= $list->T05_ID ?>">
                                                View
                                            </button></td>
                                    <?php } else { ?>
                                        <td>-</td>
                                    <?php } ?>
                                    <!-- td komen pengarah -->
                                    <?php if (isset($list->T05_KOMEN_PENGARAH)) { ?>
                                        <td>
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#komenPengarahViewModal<?= $list->T05_ID ?>">
                                                View
                                            </button>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#komenPengarahModal<?= $list->T05_ID ?>">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 12h14m-7 7V5" />
                                                </svg>
                                            </button>
                                        </td>
                                    <?php } ?>

                                </tr>

                                <!-- Modal message untuk tambah dan view komen by section admin -->
                                <div class="modal fade" id="komenViewModal<?= $list->T05_ID ?>" tabindex="-1"
                                    aria-labelledby="komenViewLabel<?= $list->T05_ID ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="komenViewLabel<?= $list->T05_ID ?>">Komen
                                                    Seksyen :
                                                    <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?= $list->T05_KOMEN_SEKSYEN ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tamal modal section admin -->

                                <!-- Modal add and view komen by pengarah -->
                                <div class="modal fade" id="komenPengarahViewModal<?= $list->T05_ID ?>" tabindex="-1"
                                    aria-labelledby="komenPengarahViewLabel<?= $list->T05_ID ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="komenPengarahViewLabel<?= $list->T05_ID ?>">
                                                    Komen Pengarah :</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="pengarahDefaultContent<?= $list->T05_ID ?>">
                                                    <?= $list->T05_KOMEN_PENGARAH ?>
                                                </div>
                                                <div id="pengarahConfirmDeleteContent<?= $list->T05_ID ?>"
                                                    class="d-none text-center">
                                                    <p>Adakah anda pasti ingin membuang komen oleh Pengarah
                                                        "<strong><?= $list->T03_NAMA_PERKHIDMATAN ?></strong>"?</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div id="pengarahDefaultFooter<?= $list->T05_ID ?>">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#komenEditModal<?= $list->T05_ID ?>">Edit</button>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="showConfirmDeletePengarah(<?= $list->T05_ID ?>)">Padam</button>
                                                </div>
                                                <div id="pengarahConfirmDeleteFooter<?= $list->T05_ID ?>" class="d-none">
                                                    <button type="button" class="btn btn-secondary"
                                                        onclick="hideConfirmDeletePengarah(<?= $list->T05_ID ?>)">Batal</button>
                                                    <form action="<?= module_url('permohonan/delete_komen_pengarah') ?>"
                                                        method="post" class="d-inline">
                                                        <input type="hidden" name="id_program" value="<?= $id_program ?>">
                                                        <input type="hidden" name="id_perkhidmatan"
                                                            value="<?= $list->T05_ID ?>">
                                                        <button type="submit" class="btn btn-danger">Padam</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function showConfirmDeletePengarah(id) {
                                        document.getElementById(`pengarahDefaultContent${id}`).classList.add('d-none');
                                        document.getElementById(`pengarahDefaultFooter${id}`).classList.add('d-none');
                                        document.getElementById(`pengarahConfirmDeleteContent${id}`).classList.remove('d-none');
                                        document.getElementById(`pengarahConfirmDeleteFooter${id}`).classList.remove('d-none');
                                    }

                                    function hideConfirmDeletePengarah(id) {
                                        document.getElementById(`pengarahDefaultContent${id}`).classList.remove('d-none');
                                        document.getElementById(`pengarahDefaultFooter${id}`).classList.remove('d-none');
                                        document.getElementById(`pengarahConfirmDeleteContent${id}`).classList.add('d-none');
                                        document.getElementById(`pengarahConfirmDeleteFooter${id}`).classList.add('d-none');
                                    }
                                </script>


                                <div class="modal fade" id="komenPengarahModal<?= $list->T05_ID ?>" tabindex="-1"
                                    aria-labelledby="komenPengarahModalLabel<?= $list->T05_ID ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="<?= module_url('permohonan/tambah_komen') ?>" method="post">
                                            <input type="hidden" name="id_program" value="<?= $id_program ?>">
                                            <input type="hidden" name="id_perkhidmatan" value="<?= $list->T05_ID ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="komenPengarahModalLabel<?= $list->T05_ID ?>">Tambah Komen
                                                        Pengarah - <?= $list->T03_NAMA_PERKHIDMATAN ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3 text-start">
                                                        <label for="komenPengarah<?= $list->T05_ID ?>"
                                                            class="form-label">Komen</label>
                                                        <textarea class="form-control" name="komen"
                                                            id="komenPengarah<?= $list->T02_ID ?>" rows="3"
                                                            required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Hantar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Tamal modal pengarah -->


                                <?php $number++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <a href="<?php echo module_url('permohonan/view_program') ?>" class="btn btn-default">Kembali</a>
            </div>

        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <?php
            // echo $this->pagination->create_links(); 
            ?>
        </div>

    </div>
</div>

<!-- Modal for confirmation -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationLabel">Pengesahan Padam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Adakah anda pasti ingin membuang perkhidmatan "<strong id="serviceName"></strong>"?
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