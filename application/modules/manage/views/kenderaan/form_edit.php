<form method="post" action="<?php echo module_url('kenderaan/update') ?>">
    <div class="col-lg-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">KEMASKINI PENDAFTARAN KERETA</h5>

            </div>
            <div class="card-body">
                <div class="mb-4 row align-items-center">
                    <label for="nokenderaan" class="form-label fw-semibold col-sm-3 col-form-label text-end">Nombor
                        Kenderaan</label>
                    <div class="col-sm-9">
                        <input name="nokenderaan" type="text" class="form-control" id="exampleInputText6"
                            placeholder="Sila masukkan nombor kenderaan"
                            value="<?php echo $kenderaan->T01_NOMBOR_KENDERAAN ?>">
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="jeniskereta" class="form-label fw-semibold col-sm-3 col-form-label text-end">Jenis
                        Kereta</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputText6" name="jeniskereta"
                            placeholder="Sila masukkan jenis kereta" value="<?php echo $kenderaan->T01_JENAMA ?>">
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="pemilik" class="form-label fw-semibold col-sm-3 col-form-label text-end">Nama
                        Pemilik</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputText6" name="pemilik"
                                placeholder="Sila masukkan nama pemilik"
                                value="<?php echo $kenderaan->T01_NAMA_PEMILIK_ ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="pekerjaan"
                        class="form-label fw-semibold col-sm-3 col-form-label text-end">Pekerjaan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputText6" name="pekerjaan"
                                placeholder="Sila masukkan pekerjaan" value="<?php echo $kenderaan->T01_PANGKAT ?>">
                        </div>
                    </div>
                </div>


                <input type="hidden" name="id_kenderaan" value="<?php echo $kenderaan->T01_ID ?>">


                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="d-flex align-items-center gap-6">
                            <button type="Submit" class="btn btn-primary">Kemaskini</button>
                            <button class="btn bg-danger-subtle text-danger">Cancel</button>
                            <a href="<?php echo module_url('kenderaan/listkend') ?>" class="btn btn-success">Senarai
                                Kenderaan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>