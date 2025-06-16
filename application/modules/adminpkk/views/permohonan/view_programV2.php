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
            <div class="col d-flex justify-content-end align-items-center">
                <a href="<?php echo module_url('permohonan/form_program/') ?>" class="btn btn-success col-sm-4">Tambah
                    Permohonan</a>
            </div>
        </div>

        <div class="text-center">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Program</th>
                        <th>Tarikh</th>
                        <th>Perkhidmatan</th>
                        <th>Cenderamata</th>
                        <th>Maklum Balas</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_permohonan as $list) { ?>
                        <?php if ($list->perkhidmatan == 1) { ?>
                            <tr>
                                <td><?= $nombor ?></td>
                                <td><?= $list->T02_NAMA_PROGRAM ?></td>
                                <td><?= date("d M y", strtotime($list->T02_TARIKH_MULA)) ?> -
                                    <?= date("d M y", strtotime($list->T02_TARIKH_TAMAT)) ?>
                                </td>
                                <td>
                                    <a href="<?php echo module_url('permohonan/perkhidmatan/' . $list->T02_ID) ?>"
                                        class="btn btn-outline-primary">Lihat</a>
                                </td>
                                <td>
                                    <button class="btn btn-warning">Mohon</button>
                                </td>
                                <td>
                                    <?php if ($today > $list->T02_TARIKH_TAMAT && $list->perkhidmatan == 1) { ?>
                                        <form action="<?php echo module_url('feedback/maklum_balas') ?>" method="POST">
                                            <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                            <button type="submit" class="btn btn-flat btn-secondary text-white">Lihat</button>
                                        </form>
                                    <?php } else if ($list->perkhidmatan == 0) { ?>
                                            <span class="badge bg-danger">Permohonan belum dibuat</span>
                                    <?php } else if ($today < $list->T02_TARIKH_TAMAT) { ?>
                                                <span class="badge bg-warning">Program belum dijalankan</span>
                                    <?php } ?>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <form method="post" action="<?php echo module_url('permohonan/edit_program') ?>">
                                            <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                            <button type="submit" class="btn btn-flat btn-warning text-white me-2">Edit</button>
                                        </form>
                                        <a href="#" class="btn btn-flat btn-danger text-white delete-button"
                                            data-delete-url="<?php echo module_url('permohonan/delete_program/' . $list->T02_ID); ?>"
                                            data-program-name="<?php echo $list->T02_NAMA_PROGRAM; ?>">Delete</a>
                                    </div>
                                </td>

                            </tr>
                        <?php } ?>
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
                The item "<span id="deletedItemName"></span>" has been successfully deleted.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default anchor behavior
                const deleteUrl = this.dataset.deleteUrl;
                const programName = this.dataset.programName;
                confirmDelete(deleteUrl, programName);
            });
        });
    });

    function confirmDelete(deleteUrl, programName) {
        const deleteButton = document.getElementById('confirmDeleteButton');
        deleteButton.href = deleteUrl;
        const modalBody = document.querySelector('#deleteConfirmationMessage .modal-body');
        modalBody.textContent = `Adakah anda pasti ingin membuang program "${programName}"?`;
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationMessage'));
        deleteModal.show();
    }

    function showDeleteSuccessModal(itemName) {
        // Update the modal content with the item's name
        const itemNameElement = document.getElementById('deletedItemName');
        itemNameElement.textContent = itemName;

        // Show the modal
        const deleteSuccessModal = new bootstrap.Modal(document.getElementById('deleteSuccessModal'));
        deleteSuccessModal.show();
    }
</script>