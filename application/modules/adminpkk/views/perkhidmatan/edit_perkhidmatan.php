<form action="<?php echo module_url('perkhidmatan/kemaskini_perkhidmatan') ?>" method="post">
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0">Tambah Perkhidmatan</h5>
        </div>
        <div class="card-body p-4 border-bottom">
            <h5 class="fs-4 fw-semibold mb-4">Detail Perkhidmatan</h5>
            <div class="mb-4 row align-items-center">
                <label for="exampleInputText7" class="form-label fw-semibold col-sm-3 col-form-label text-end">Nama
                    Perkhidmatan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputText7" name="nama_perkhidmatan"
                        placeholder="Sila Masukkan Nama Perkhidmatan" required
                        value="<?= $perkhidmatan->T03_NAMA_PERKHIDMATAN ?>" style="color: black;">
                </div>
            </div>

            <div class="mb-4 row align-items-center">
                <label for="exampleInpuText36" class="form-label fw-semibold col-sm-3 col-form-label text-end">Harga
                    (Warga)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="harga_warga" id="exampleInpuText36"
                        placeholder="Sila Masukkan Harga Jika Berkenaan" value="<?= $perkhidmatan->T03_HARGA_WARGA ?>"
                        style="color: black;">
                </div>
            </div>
            <div class="mb-4 row align-items-center">
                <label for="exampleInpuText36" class="form-label fw-semibold col-sm-3 col-form-label text-end">Harga
                    (Bukan Warga)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="harga_bukan_warga" id="exampleInpuText36"
                        placeholder="Sila Masukkan Harga Jika Berkenaan" value="<?= $perkhidmatan->T03_HARGA_LUAR ?>"
                        style="color: black;">
                </div>
            </div>


            <div class="mb-4 row align-items-center">
                <label for="Seksyen" class="form-label fw-semibold col-sm-3 col-form-label text-end">Seksyen</label>
                <div class="col-sm-9" style="color: black;">
                    <select class="form-select" id="Seksyen" aria-label="Default select example" name="seksyen">
                        <option selected><?= $perkhidmatan->T12_ID ?></option>
                        <option value="Seksyen Protokol dan Pengurusan Majlis">Seksyen Protokol dan Pengurusan Majlis
                        </option>
                        <option value="Seksyen Pentadbiran dan Kewangan">Seksyen Pentadbiran dan Kewangan</option>
                        <option value="Seksyen Promosi dan Citra">Seksyen Promosi dan Citra</option>
                        <option value="Seksyen Perhubungan Korporat dan Media">Seksyen Perhubungan Korporat dan Media
                        </option>
                        <option value="Seksyen Media Kreatif">Seksyen Media Kreatif</option>
                        <option value="Lain - Lain">Lain - Lain</option>
                    </select>
                </div>
            </div>

            <div class="row align-items-center">
                <label for="status_perkhidmatan" class="form-label fw-semibold col-sm-3 col-form-label text-end">Status
                    Perkhidmatan</label>
                <div class="col-sm-9">
                    <div class="form-check form-switch">
                        <?php if ($perkhidmatan->T03_STATUS_PERKHIDMATAN == 1) {
                            $checked = "checked";
                            $status = "Ditawarkan";
                        } else {
                            $checked = "";
                            $status = "Tidak Ditawarkan";
                        } ?>
                        <input class="form-check-input" name="status_perkhidmatan" type="checkbox" id="button"
                            onchange="statusButton()" <?= $checked ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault" id="status"><?= $status ?></label>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id_perkhidmatan" value="<?= $perkhidmatan->T03_ID ?>">

            <div class="row">
                <div class="card-footer border-0 d-flex justify-content-between">
                    <a href="<?php echo module_url('perkhidmatan/senarai_perkhidmatan') ?>"
                        class="btn btn-default">Kembali</a>
                    <button type="submit" class="btn btn-primary">Kemaskini</button>
                </div>
            </div>

        </div>
    </div>
</form>

<script>
    function statusButton() {
        var button = document.getElementById("button");
        var status = document.getElementById("status");
        if (button.checked == true) {
            status.textContent = "Ditawarkan";
        } else {
            status.textContent = "Tidak Ditawarkan";
        }
    }
</script>