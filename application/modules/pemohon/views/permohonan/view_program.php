<?php
$ENABLE_ADD = TRUE;
$ENABLE_MANAGE = TRUE;
$ENABLE_DELETE = TRUE;

$today = date('Y-m-d');
$nombor = 1;

$user_id = $_SESSION["UID"];
?>


<div class="card">
    <div class="card-body">
        <div class="row p-4 ps-0 pt-0 pe-0">
            <div class="col">
                <h3>Senarai Program</h3>
            </div>
            <div class="col d-flex justify-content-end align-items-center gap-2">
                <!-- <button type="button" class="btn btn-rounded bg-warning-subtle text-warning">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                    </svg>

                </button>
                <button type="button" class="btn waves-effect waves-light btn-rounded bg-danger-subtle text-danger">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                </button> -->
                <a href="<?php echo module_url('permohonan/form_program/') ?>" class="btn btn-success col-sm-5">
                    <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 25 25">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    Tambah Permohonan</a>
            </div>
        </div>

        <div class="text-center">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            No
                        </th>
                        <th>Nama Program</th>
                        <th>Tarikh</th>
                        <th>Laporan</th>
                        <th>Maklum Balas</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_permohonan as $list) { ?>
                        <tr>
                            <td>
                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="id[]" value="<?= $list->T02_ID ?>"
                                        style="border: 1px solid #ccc; border-radius: .25rem;" />
                                </div> -->
                                <?= $nombor++; ?>
                            </td>
                            <td><?= $list->T02_NAMA_PROGRAM ?></td>
                            <td><?= date("d M y", strtotime($list->T02_TARIKH_MULA)) ?> -
                                <?= date("d M y", strtotime($list->T02_TARIKH_TAMAT)) ?>
                            </td>
                            <td>
                                <form action="<?php echo module_url('permohonan/report_perkhidmatan') ?>" method="POST"
                                    class="d-inline"> <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                    <button type="submit" class="btn btn-outline-primary fs-2"> <svg
                                            class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                                        </svg>
                                        Lihat
                                    </button>
                                </form>
                            </td>
                            <!-- <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <form action="<?php echo module_url('permohonan/cenderamata') ?>" method="POST">
                                        <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                        <button type="submit" class="btn btn-success fs-2"><svg
                                                class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            Tambah</button>
                                    </form>
                                </div>
                            </td> -->
                            <td>
                                <div class="d-flex justify-content-center ">
                                    <?php if ($today > $list->T02_TARIKH_TAMAT && $list->perkhidmatan == 1) { ?>
                                        <form action="<?php echo module_url('feedback/maklum_balas') ?>" method="POST">
                                            <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                            <button type="submit" class="btn bg-secondary-subtle text-secondary fs-2">
                                                <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="1.5"
                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                    <path stroke="currentColor" stroke-width="1.5"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>Lihat</button>
                                        </form>
                                    <?php } else if ($list->perkhidmatan == 0) { ?>
                                            <span class="badge bg-danger-subtle text-danger">Permohonan belum
                                                dibuat</span>
                                    <?php } else if ($today < $list->T02_TARIKH_TAMAT) { ?>
                                                <span class="badge bg-warning-subtle text-warning">Program belum dijalankan</span>
                                    <?php } ?>
                                </div>
                            </td>


                            <td>
                                <div class="d-flex align-items-center justify-content-center gap-1">

                                    <!-- Delete Trigger Button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationMessage" data-program-id="<?= $list->T02_ID ?>"
                                        data-program-name="<?= $list->T02_NAMA_PROGRAM ?>">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                    </button>



                                    <form action="<?php echo module_url('permohonan/perkhidmatan') ?>" method="POST">
                                        <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                        <button type="submit" class="btn btn-outline-primary fs-2"><svg
                                                class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4.248 19C3.22 15.77 5.275 8.232 12.466 8.232V6.079a1.025 1.025 0 0 1 1.644-.862l5.479 4.307a1.108 1.108 0 0 1 0 1.723l-5.48 4.307a1.026 1.026 0 0 1-1.643-.861v-2.154C5.275 13.616 4.248 19 4.248 19Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationMessage" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Pengesahan
                    Padam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Adakah anda pasti ingin membuang program "<span id="programName"></span>"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form method="post" action="<?php echo module_url('permohonan/delete_program'); ?>">
                    <input type="hidden" name="id_program" id="programIdToDelete" value="">
                    <button type="submit" id="confirmDeleteButton" class="btn btn-danger">Padam</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const deleteModal = document.getElementById('deleteConfirmationMessage');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const programId = button.getAttribute('data-program-id');
        const programName = button.getAttribute('data-program-name');

        document.getElementById('programName').textContent = programName;
        document.getElementById('programIdToDelete').value = programId;
    });

</script>