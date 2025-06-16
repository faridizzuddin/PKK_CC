<form method="post" action="<?php echo module_url('permohonan/update_program') ?>" enctype="multipart/form-data">


    <div class="col-lg-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Maklumat Pemohon</h5>

            </div>
            <div class="card-body">
                <div class="mb-4 row align-items-center">
                    <label for="nokenderaan" class="form-label fw-semibold col-sm-3 col-form-label text-end">Nama
                        Pemohon</label>
                    <div class="col-sm-9">
                        <input name="nokenderaan" type="text" class="form-control" id="exampleInputText6" placeholder=""
                            value="<?= $user->T01_NAMA ?>">
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="jeniskereta" class="form-label fw-semibold col-sm-3 col-form-label text-end">ID
                        Staff</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputText6" name="jeniskereta" placeholder=""
                            value="<?= $user->T01_ID ?>">
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="pemilik" class="form-label fw-semibold col-sm-3 col-form-label text-end">E-mel</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputText6" name="pemilik"
                                placeholder="Sila masukkan nama pemilik" value="<?= $user->T01_EMAIL ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="pekerjaan"
                        class="form-label fw-semibold col-sm-3 col-form-label text-end">PTJ/Jabatan/Fakulti</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputText6" name="pekerjaan"
                                placeholder="Sila masukkan pekerjaan" value="<?= $user->T01_JABATAN ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="pekerjaan"
                        class="form-label fw-semibold col-sm-3 col-form-label text-end">Jawatan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputText6" name="pekerjaan"
                                placeholder="Sila masukkan pekerjaan" value="<?= $user->T01_JAWATAN ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="pekerjaan" class="form-label fw-semibold col-sm-3 col-form-label text-end">No
                        TeL/HP</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputText6" name="pekerjaan"
                                placeholder="Sila masukkan pekerjaan" value="<?= $user->T01_NO_TEL ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-lg-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Maklumat Program</h5>

            </div>
            <div class="card-body">
                <div class="mb-4 row align-items-center">
                    <label for="nama_program" class="form-label fw-semibold col-sm-3 col-form-label text-end">Nama
                        Program</label>
                    <div class="col-sm-9">
                        <input name="nama_program" type="text" class="form-control" id="exampleInputText6"
                            placeholder="Sila masukkan nama program" required
                            value="<?= $data_edit->T02_NAMA_PROGRAM ?>">
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="tempat_program" class="form-label fw-semibold col-sm-3 col-form-label text-end">Tempat
                        Program</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputText6" name="tempat_program"
                            placeholder="Sila masukkan tempat program" value="<?= $data_edit->T02_TEMPAT_PROGRAM ?>">
                    </div>
                </div>


                <div class="mb-4 row align-items-center">
                    <label for="tarikh_mula" class="form-label fw-semibold col-sm-3 col-form-label text-end">Tarikh
                        Mula
                        Program</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="date" class="form-control" id="tarikh_mula" name="tarikh_mula"
                                value="<?= $data_edit->T02_TARIKH_MULA ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="tarikh_tamat" class="form-label fw-semibold col-sm-3 col-form-label text-end">Tarikh
                        Tamat
                        Program</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="date" class="form-control" id="tarikh_tamat" name="tarikh_tamat"
                                value="<?= $data_edit->T02_TARIKH_TAMAT ?>">
                        </div>
                    </div>
                </div>


                <div class="mb-4 row align-items-center">
                    <label for="bil_peserta" class="form-label fw-semibold col-sm-3 col-form-label text-end">Bilangan
                        Peserta</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="number" class="form-control" id="exampleInputText6" name="bil_peserta"
                                placeholder="Sila masukkan bilangan peserta" value="<?= $data_edit->T02_BIL_PESERTA ?>">
                        </div>
                    </div>
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="tentatif" class="form-label fw-semibold col-sm-3 col-form-label text-end">Tentatif
                        Program</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input type="file" class="form-control" id="exampleInputText6" name="tentatif">
                            <?php if (!empty($data_edit->T02_TENTATIF)): ?>
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="window.open('<?= base_url('upload/tentatif/' . $data_edit->T02_TENTATIF) ?>')">
                                    Lihat Tentatif
                                </button>
                            <?php else: ?>
                                <button type="button" class="btn btn-outline-secondary" disabled>
                                    Tiada tentatif dimuat naik
                                </button>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>


                <input type="hidden" name="id" value="<?= $data_edit->T02_ID ?>">
                <input type="hidden" name="old_tentatif" value="<?= $data_edit->T02_TENTATIF ?>">


                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="d-flex align-items-center gap-6">
                            <button type="Submit" class="btn btn-primary">Kemaskini</button>
                            <button class="btn bg-danger-subtle text-danger">Batal</button>
                            <a href="<?php echo module_url('permohonan/view_program') ?>"
                                class="btn btn-success">Senarai
                                Permohonan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    // Get today's date
    var today = new Date();

    // Add 3 days to the current date
    var minDate = new Date();
    minDate.setDate(today.getDate() + 3);

    // Format the date to YYYY-MM-DD
    var minDateStr = minDate.toISOString().split('T')[0];

    document.getElementById('tarikh_mula').setAttribute('min', minDateStr);
    document.getElementById('tarikh_tamat').setAttribute('min', minDateStr);
</script>