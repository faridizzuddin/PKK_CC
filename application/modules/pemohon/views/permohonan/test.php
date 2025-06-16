<a href="<?php echo base_url('mohon/permohonan/view_report'); ?>">Test pdf</a>
<a href="<?php echo module_url('permohonan/email_admin/123'); ?>">Test email</a>

<form action="<?php echo module_url('permohonan/email_admin'); ?>" method="POST">
    <input type="hidden" name="matrik" value="123">
    <input type="submit" value="Send Email">
</form>

<div class="form-check">
    <input type="checkbox" class="form-check-input" id="triggerModalCheckbox" data-bs-toggle="modal"
        data-bs-target="#modalRekaBentukGrafik">
    <label class="form-check-label" for="triggerModalCheckbox">Reka Bentuk Grafik</label>
</div>

<div class="modal fade" id="modalRekaBentukGrafik" tabindex="-1" aria-labelledby="modalRekaBentukGrafikLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRekaBentukGrafikLabel">Reka Bentuk Grafik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('pemohon/permohonan/upload_reka_bentuk_grafik') ?>" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="reka_bentuk_grafik_file" class="form-label">Sila pilih fail reka bentuk
                            grafik</label>
                        <input class="form-control" type="file" id="reka_bentuk_grafik_file"
                            name="reka_bentuk_grafik_file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Hantar</button>
                </div>
            </form>
        </div>
    </div>
</div>