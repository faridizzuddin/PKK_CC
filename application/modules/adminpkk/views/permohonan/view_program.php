<?php
$ENABLE_ADD = TRUE;
$ENABLE_MANAGE = TRUE;
$ENABLE_DELETE = TRUE;

$today = date('Y-m-d');
$nombor = 1;

$user_id = $_SESSION["UID"];

$grouped_by_month = [];

foreach ($list_permohonan as $program) {
    $month_key = date('Y-m', strtotime($program->T02_TARIKH_MULA)); // e.g., "2025-04"
    if (!isset($grouped_by_month[$month_key])) {
        $grouped_by_month[$month_key] = [];
    }
    $grouped_by_month[$month_key][] = $program;
}

ksort($grouped_by_month);
?>
<div class="card">
    <div class="card-header">
        <h3>Senarai Program</h3>
    </div>
    <div class="card-body">
        <!-- <div class="col-md-6 ms-auto d-flex justify-content-end mb-4">
            <a href="<?php echo module_url('permohonan/form_program/') ?>" class="btn btn-success">Tambah Permohonan</a>
        </div> -->
        <?php foreach ($grouped_by_month as $month => $programs): ?>
            <?php $nombor = 1; ?>
            <?php foreach ($programs as $list): ?>
                <?php if ($list->perkhidmatan == 1): ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row p-4 ps-0 pt-0 pe-0">
                                <div class="col">
                                    <div class="card-header text-center bg-secondary-subtle text-secondary">
                                        <h3>
                                            <?= date('F Y', strtotime($month . '-01')) ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Program</th>
                                            <th>Tarikh</th>
                                            <th>Butiran Program</th>
                                            <th>Maklum Balas</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td><?= $nombor++ ?></td>
                                            <td><?= $list->T02_NAMA_PROGRAM ?></td>
                                            <td><?= date("d M y", strtotime($list->T02_TARIKH_MULA)) ?> -
                                                <?= date("d M y", strtotime($list->T02_TARIKH_TAMAT)) ?>
                                            </td>
                                            <td>
                                                <form action="<?php echo module_url('permohonan/perkhidmatan') ?>" method="POST">
                                                    <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                                    <button type="submit" class="btn btn-outline-primary fs-2">
                                                        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="1.5"
                                                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                            <path stroke="currentColor" stroke-width="1.5"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        Lihat
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <?php if ($today > $list->T02_TARIKH_TAMAT && $list->perkhidmatan == 1): ?>
                                                        <form action="<?php echo module_url('feedback/maklum_balas') ?>" method="POST">
                                                            <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                                            <button type="submit" class="btn bg-secondary-subtle text-secondary fs-2"
                                                                aria-label="Lihat Maklum Balas">
                                                                <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-width="1.5"
                                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                    <path stroke="currentColor" stroke-width="1.5"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                Lihat
                                                            </button>
                                                        </form>
                                                    <?php elseif ($list->perkhidmatan == 0): ?>
                                                        <span class="badge bg-danger-subtle text-danger"
                                                            aria-label="Permohonan belum dibuat">Permohonan belum dibuat</span>
                                                    <?php elseif ($today < $list->T02_TARIKH_TAMAT): ?>
                                                        <span class="badge bg-warning-subtle text-warning"
                                                            aria-label="Program belum dijalankan">Program belum dijalankan</span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <form method="post"
                                                        action="<?php echo module_url('permohonan/edit_program') ?>">
                                                        <input type="hidden" name="id_program" value="<?= $list->T02_ID ?>">
                                                        <button type="submit"
                                                            class="btn btn-rounded bg-warning-subtle text-warning me-2">
                                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="<?php echo module_url('permohonan/delete_program/' . $list->T02_ID); ?>"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Adakah anda pasti ingin membuang program \" <?php echo $list->T02_NAMA_PROGRAM; ?>\"?')">
                                                        <button type="button"
                                                            class="btn waves-effect waves-light btn-rounded bg-danger-subtle text-danger"
                                                            data-bs-toggle="modal" data-bs-target="#deleteConfirmationMessage"
                                                            data-program-id="<?= $list->T02_ID ?>"
                                                            data-program-name="<?= $list->T02_NAMA_PROGRAM ?>">
                                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
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
                Adakah anda pasti ingin membuang program "<span id="programName"></span>"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteButton" class="btn btn-danger">Padam</a>
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

        deleteModal.querySelector('#programName').textContent = programName;
        deleteModal.querySelector('#confirmDeleteButton').href = `<?php echo module_url('permohonan/delete_program/'); ?>${programId}`;
    });
</script>