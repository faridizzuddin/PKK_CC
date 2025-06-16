<form method="post" action="<?php echo module_url('permohonan/update_program') ?>">
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
                        <input name="nokenderaan" type="text" class="form-control" id="exampleInputText6"
                            placeholder="Sila masukkan nombor kenderaan">
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="jeniskereta" class="form-label fw-semibold col-sm-3 col-form-label text-end">ID
                        Staff</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputText6" name="jeniskereta"
                            placeholder="Sila masukkan jenis kereta">
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="pemilik" class="form-label fw-semibold col-sm-3 col-form-label text-end">E-mel</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputText6" name="pemilik"
                                placeholder="Sila masukkan nama pemilik">
                        </div>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="pekerjaan"
                        class="form-label fw-semibold col-sm-3 col-form-label text-end">PTJ/Jabatan/Fakulti</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputText6" name="pekerjaan"
                                placeholder="Sila masukkan pekerjaan">
                        </div>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="pekerjaan"
                        class="form-label fw-semibold col-sm-3 col-form-label text-end">Jawatan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputText6" name="pekerjaan"
                                placeholder="Sila masukkan pekerjaan">
                        </div>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="pekerjaan" class="form-label fw-semibold col-sm-3 col-form-label text-end">No
                        TeL/HP</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputText6" name="pekerjaan"
                                placeholder="Sila masukkan pekerjaan">
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
                            value="<?= $data_edit->T01_NAMA_PROGRAM ?>">
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="tempat_program" class="form-label fw-semibold col-sm-3 col-form-label text-end">Tempat
                        Program</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputText6" name="tempat_program"
                            placeholder="Sila masukkan tempat program" value="<?= $data_edit->T01_TEMPAT_PROGRAM ?>">
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="tarikh_program" class="form-label fw-semibold col-sm-3 col-form-label text-end">Tarikh
                        Program</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="date" class="form-control" id="exampleInputText6" name="tarikh_program"
                                value="<?= $data_edit->T01_TARIKH_PROGRAM ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="bil_peserta" class="form-label fw-semibold col-sm-3 col-form-label text-end">Bilangan
                        Peserta</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="number" class="form-control" id="exampleInputText6" name="bil_peserta"
                                placeholder="Sila masukkan bilangan peserta" value="<?= $data_edit->T01_BIL_PESERTA ?>">
                        </div>
                    </div>
                </div>



                <input type="hidden" name="id" value="<?= $data_edit->T01_ID ?>">


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