<?php $number = 1;
$date_mula = new DateTime($data_program->T02_TARIKH_MULA);
$date_tamat = new DateTime($data_program->T02_TARIKH_TAMAT);
?>
<form method="post" action="<?php echo module_url('permohonan/tambah') ?>">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body mt-3">
                <h6><strong>Program : </strong><?= $data_program->T02_NAMA_PROGRAM ?></h6>
                <h6><strong>Tarikh : </strong><?= $date_mula->format('j F Y') ?> - <?= $date_tamat->format('j F Y') ?>
                </h6>
                <h6><strong>Tempat : </strong><?= $data_program->T02_TEMPAT_PROGRAM ?></h6>
                <h6>
                    <?php if (!empty($data_program->T02_TENTATIF)) { ?>
                        <button type="button" class="btn btn-secondary"
                            onclick="viewPdf('<?= base_url('upload/' . $data_program->T02_TENTATIF) ?>')">Lihat
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
                <div class="row align-items-center mb-3 mt-4">
                    <div class="col">
                        <h3>Senarai Perkhidmatan</h3>
                    </div>
                    <div class="col text-end">
                        <?php if ($check_perkhidmatan == 1) { ?>
                            <a href="<?php echo module_url('permohonan/semak_laporan/' . $id_program) ?>"
                                class="btn btn-info me-1">Laporan</a>
                            <a href="<?php echo module_url('permohonan/edit_perkhidmatan/' . $id_program) ?>"
                                class="btn btn-success">Kemaskini Perkhidmatan</a>
                        <?php } else { ?>
                            <a href="<?php echo module_url('permohonan/form_perkhidmatan/' . $id_program) ?>"
                                class="btn btn-success">Tambah Perkhidmatan</a>
                        <?php } ?>
                    </div>
                </div>

                <div class="text-center">
                    <table class="table table-hover table-striped border">
                        <thead class="bg-info">
                            <tr>
                                <th>No</th>
                                <th>Nama Perkhidmatan</th>
                                <th>Penerangan</th>
                                <th>Tindakan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $list) { ?>
                                <tr>
                                    <td><?= $number ?></td>
                                    <td><?= $list->T03_NAMA_PERKHIDMATAN ?></td>
                                    <td><?= $list->T05_DETAIL ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete('<?php echo module_url('permohonan/delete_perkhidmatan/' . $list->T05_ID) . "/" . $id_program ?>', '<?= $list->T03_NAMA_PERKHIDMATAN ?>')">
                                            Delete
                                        </button>
                                    </td>
                                    <?php if ($list->T05_STATUS == 1) { ?>
                                        <td style="color: green;">
                                            <p class="fw-bold">Diluluskan</p>
                                        </td>
                                    <?php } else if ($list->T05_STATUS == null) { ?>
                                            <td style="color: grey;">
                                                <p class="badge bg-warning-subtle text-warning">Belum disahkan</p>
                                            </td>
                                    <?php } else { ?>
                                            <td style="color: red;">
                                                <p class="fw-bold">Ditolak</p>
                                            </td>
                                    <?php } ?>
                                </tr>
                                <?php $number++;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <?php $user_id = $this->session->userdata('user_id') ?>
                <a href="<?php echo module_url('permohonan/view_program/' . $user_id) ?>"
                    class="btn btn-default">Kembali</a>
            </div><!-- /.box-body -->
        </div>
    </div>
</form>

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