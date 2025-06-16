<form action="<?php echo module_url('cenderamata/tambah_cenderamata') ?>" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0">Tambah Cenderamata</h5>
        </div>
        <div class="card-body p-4 border-bottom">
            <h5 class="fs-4 fw-semibold mb-4">Maklumat Cenderamata</h5>

            <div class="mb-4 row align-items-center justify-content-center">
                <div class="card mx-auto" style="width: fit-content;">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <img src="<?php echo base_url('images/no_available_picture.png') ?>"
                            class="img-fluid rounded shadow-sm" alt="..." id="gambar_upload"
                            style="width: 100%; height: 100%; object-fit: cover;width: 15rem;">
                    </div>
                </div>
            </div>

            <div class="mb-4 row align-items-center">
                <label for="Seksyen" class="form-label fw-semibold col-sm-3 col-form-label text-end">Gambar
                    Cenderamata</label>
                <div class="col-sm-9">
                    <div class="d-flex align-items-center">
                        <input class="form-control bg-white text-dark me-3" type="file" accept="image/*"
                            name="gambar_cend" id="file" onchange="loadFile(event)" style="background-color: white;">

                    </div>
                </div>
            </div>



            <div class="mb-4 row align-items-center">
                <label for="exampleInputText7" class="form-label fw-semibold col-sm-3 col-form-label text-end">Nama
                    Cenderamata</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputText7" name="nama_cenderamata"
                        placeholder="Sila Masukkan Nama Cenderamata" required>
                </div>
            </div>

            <div class="mb-4 row align-items-center">
                <label for="exampleInputText7"
                    class="form-label fw-semibold col-sm-3 col-form-label text-end">Kuantiti</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputText7" name="kuantiti"
                        placeholder="Sila Masukkan Kuantiti Cenderamata" required>
                </div>
            </div>


            <div class="mb-4 row align-items-center">
                <label for="exampleInpuText36" class="form-label fw-semibold col-sm-3 col-form-label text-end">Harga
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="harga_warga" id="exampleInpuText36"
                        placeholder="Sila Masukkan Harga Jika Berkenaan">
                </div>
            </div>


            <!-- <div class="mb-4 row align-items-center">
                <label for="detail" class="form-label fw-semibold col-sm-3 col-form-label text-end">Detail
                    Cenderamata</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" name="detail" id="exampleInpuText36"
                        placeholder="Sila Masukkan Detail Cenderamata" style="height: 100px"></textarea>
                </div>
            </div> -->

            <div class="row align-items-center">
                <label for="status_perkhidmatan" class="form-label fw-semibold col-sm-3 col-form-label text-end">Status
                    Cenderamata</label>
                <div class="col-sm-9">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="status_perkhidmatan" type="checkbox" id="button"
                            onchange="statusButton()">
                        <label class="form-check-label" for="flexSwitchCheckDefault" id="status">Tidak
                            Ditawarkan</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class=" border-0 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
<script>
    var loadFile = function (event) {
        var image = document.getElementById('gambar_upload');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>