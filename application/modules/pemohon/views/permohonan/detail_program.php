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
                <button type="button" class="btn btn-rounded bg-warning-subtle text-warning">
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
                </button>
                <a href="<?php echo module_url('permohonan/form_program/') ?>" class="btn btn-success col-sm-4">Tambah
                    Permohonan</a>
            </div>
        </div>

        <div class="text-center">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="selectAll" />
                            </div>
                        </th>
                        <th class="text-start">Nama Program</th>
                        <th class="text-start">Tarikh</th>
                        <th>Perkhidmatan</th>
                        <th>Cenderamata</th>
                        <th>Maklum Balas</th>
                        <!-- <th>Tindakan</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_permohonan as $list) { ?>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="id[]" value="<?= $list->T02_ID ?>"
                                        style="border: 1px solid #ccc; border-radius: .25rem;" />
                                </div>
                            </td>
                            <td class="text-start"><?= $list->T02_NAMA_PROGRAM ?></td>
                            <td class="text-start"><?= date("d M y", strtotime($list->T02_TARIKH_MULA)) ?> -
                                <?= date("d M y", strtotime($list->T02_TARIKH_TAMAT)) ?>
                            </td>
                            <td>
                                <form action="<?php echo module_url('permohonan/mohon_perkhidmatan') ?>" method="POST">
                                    <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                    <button type="submit"
                                        class="btn <?php echo $list->perkhidmatan == 1 ? 'btn-outline-primary' : 'btn-primary text-white'; ?> fs-2">
                                        <?php echo $list->perkhidmatan == 1 ? 'Lihat' : 'Tambah'; ?>
                                    </button>
                                </form>
                            </td>
                            <td>
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

                            </td>
                            <td>
                                <div class="d-flex justify-content-center ">
                                    <?php if ($today > $list->T02_TARIKH_TAMAT && $list->perkhidmatan == 1) { ?>
                                        <form action="<?php echo module_url('feedback/maklum_balas') ?>" method="POST">
                                            <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                            <button type="submit"
                                                class="btn bg-secondary-subtle text-secondary fs-2">Lihat</button>
                                        </form>
                                    <?php } else if ($list->perkhidmatan == 0) { ?>
                                            <span class="badge bg-danger-subtle text-danger">Permohonan belum
                                                dibuat</span>
                                    <?php } else if ($today < $list->T02_TARIKH_TAMAT) { ?>
                                                <span class="badge bg-warning-subtle text-warning">Program belum dijalankan</span>
                                    <?php } ?>
                                </div>


                                <!-- <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <form method="post" action="<?php echo module_url('permohonan/edit_program') ?>">
                                        <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                        <button type="submit" class="btn btn-flat btn-warning text-white me-2">Edit</button>
                                    </form>
                                    <a href="#" class="btn btn-flat btn-danger text-white delete-button"
                                        data-delete-url="<?php echo module_url('permohonan/delete_program/' . $list->T02_ID); ?>"
                                        data-program-name="<?php echo $list->T02_NAMA_PROGRAM; ?>">Delete</a>
                                </div>
                            </td> -->

                        </tr>
                        <?php $nombor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteConfirmationMessage" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Pengesahan Padam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteButton" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteSuccessModal" tabindex="-1" aria-labelledby="deleteSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSuccessModalLabel">Item Deleted</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">