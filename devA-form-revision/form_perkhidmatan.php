<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
</head>

<body>
    <!-- Form action using module_url() was removed because the function is undefined. 
     The form is temporarily disabled for testing/experimental purposes. -->
    <form>
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Tambah Perkhidmatan</h5>
            </div>
            <div class="card-body p-4 border-bottom">
                <h5 class="fs-4 fw-semibold mb-4">Maklumat Perkhidmatan</h5>
                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText7" class="form-label fw-semibold col-sm-3 col-form-label text-end">Nama
                        Perkhidmatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputText7" name="nama_perkhidmatan"
                            placeholder="Sila Masukkan Nama Perkhidmatan" required />
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="exampleInpuText36" class="form-label fw-semibold col-sm-3 col-form-label text-end">Harga
                        (Warga)</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="harga_warga" id="exampleInpuText36"
                            placeholder="Sila Masukkan Harga Jika Berkenaan" />
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="exampleInpuText36" class="form-label fw-semibold col-sm-3 col-form-label text-end">Harga
                        (Bukan Warga)</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="harga_bukan_warga" id="exampleInpuText36"
                            placeholder="Sila Masukkan Harga Jika Berkenaan" />
                    </div>
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="Seksyen" class="form-label fw-semibold col-sm-3 col-form-label text-end">Seksyen</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="Seksyen" aria-label="Default select example" name="seksyen">
                            <option selected>Sila Pilih</option>
                            <option value="Seksyen Protokol dan Pengurusan Majlis">
                                Seksyen Protokol dan Pengurusan Majlis
                            </option>
                            <option value="Seksyen Pentadbiran dan Kewangan">
                                Seksyen Pentadbiran dan Kewangan
                            </option>
                            <option value="Seksyen Promosi dan Citra">
                                Seksyen Promosi dan Citra
                            </option>
                            <option value="Seksyen Perhubungan Korporat dan Media">
                                Seksyen Perhubungan Korporat dan Media
                            </option>
                            <option value="Seksyen Media Kreatif">
                                Seksyen Media Kreatif
                            </option>
                            <option value="Lain - Lain">Lain - Lain</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4 row align-items-center">
                    <label for="detail" class="form-label fw-semibold col-sm-3 col-form-label text-end">Detail
                        Perkhidmatan</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="detail" id="exampleInpuText36"
                            placeholder="Sila Masukkan Detail Perkhidmatan" style="height: 100px"></textarea>
                    </div>
                </div>

                <div class="row align-items-center">
                    <label for="status_perkhidmatan"
                        class="form-label fw-semibold col-sm-3 col-form-label text-end">Status Perkhidmatan</label>
                    <div class="col-sm-9">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="status_perkhidmatan" type="checkbox" id="button"
                                onchange="statusButton()" />
                            <label class="form-check-label" for="flexSwitchCheckDefault" id="status">Tidak
                                Ditawarkan</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card-footer border-0 d-flex justify-content-end">
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
            status.textContent = button.checked ? "Ditawarkan" : "Tidak Ditawarkan";
        }

        document.querySelector("form").addEventListener("submit", function (e) {
            e.preventDefault(); // prevent real submit

            const section = document.getElementById("Seksyen");
            if (section.value === "Sila Pilih") {
                alert("Sila pilih seksyen yang sah.");
                section.focus();
                return;
            }

            // If all required fields are filled, you can log or store
            console.log("Validation passed! (No backend submission yet)");
        });
    </script>

</body>

</html>