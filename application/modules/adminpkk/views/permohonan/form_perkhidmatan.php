<?php

//outline checkbox
$bg_checkbox = 'style="outline: 0.4px solid black; outline-offset: 2px;"';
?>
<form action="<?php echo module_url('permohonan/hantar_perkhidmatan/' . $id_program) ?>" method="post">
    <div class="container">


        <div class="card">
            <div class="card-header">


                <div class="row p-4 ps-0">
                    <div class="col-lg-7">
                        <h3 class="section-title" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                            Senarai Perkhidmatan
                        </h3>
                    </div>
                    <div class="col-lg-5 d-flex justify-content-end align-items-center">
                        <input type="text" id="searchBar" class="form-control" placeholder="Cari Perkhidmatan..."
                            onkeyup="searchPerkhidmatan()">
                    </div>
                </div>


            </div>
            <div class="card-body row g-3">

                <?php foreach ($perkhidmatan as $list) { ?>

                    <?php if ($list->T03_STATUS_PERKHIDMATAN == '0') {
                        $checked = "disabled";
                        $status = "Not Available";
                        $bg_status = "badge bg-warning-subtle text-warning fw-bold";
                        // $background = "style='background-color:rgb(255, 219, 222);'";
                        $background = "bg-danger-subtle";
                    } else {
                        $checked = 'onclick="bahasa()"';
                        $status = "Available";
                        $bg_status = "badge bg-success-subtle text-success fw-bold";
                        // $background = "style='background-color:rgb(233, 233, 233);'";
                        $background = "bg-light";
                    } ?>


                    <div class="col-lg-6">
                        <div class="card <?= $background ?>">
                            <div class="card-body p-2 d-flex align-items-center gap-3 border border-rounded">



                                <?php if ($list->T03_NAMA_PERKHIDMATAN == 'Pengacara Majlis') { ?>
                                    <div class="flex-shrink-0 ms-5 me-5">
                                        <input class="form-check-input secondary border" type="checkbox" <?= $checked ?>
                                            id="pengacaraCheckbox" name="perkhidmatan[]" value="<?= $list->T03_ID ?>"
                                            <?= $bg_checkbox ?>>
                                    </div>
                                    <div>
                                        <h4 class="fw-semibold mb-2">
                                            <label class="form-check-label" for="perkhidmatan[]">
                                                <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                            </label>

                                        </h4>
                                        <span class="<?= $bg_status ?>">
                                            <?= $status ?>
                                        </span>

                                    </div>

                                    <div id="pilih_bahasa" style="display: none;" class="ms-5">
                                        <select name="status_bahasa[<?= $list->T03_ID ?>]" id="language"
                                            class="form-select col-lg-12">
                                            <option value="Bahasa Melayu">Bahasa Melayu</option>
                                            <option value="Bahasa Inggeris">Bahasa Inggeris</option>
                                        </select>
                                    </div>
                                <?php } else if ($list->T03_NAMA_PERKHIDMATAN == 'Reka Bentuk Grafik') { ?>

                                        <div class="flex-shrink-0 ms-5 me-5">
                                            <input class="form-check-input secondary" type="checkbox" <?= $checked ?>
                                                id="triggerModalCheckbox" data-bs-toggle="modal"
                                                data-bs-target="#modalRekaBentukGrafik" name="perkhidmatan[]"
                                                value="<?= $list->T03_ID ?>" <?= $bg_checkbox ?>>
                                        </div>
                                        <div>
                                            <h4 class="fw-semibold mb-2">

                                                <label class="form-check-label" for="perkhidmatan[]">
                                                <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                                </label>

                                            </h4>
                                            <span class="<?= $bg_status ?> me-2">
                                            <?= $status ?>
                                            </span>
                                            <button type="button" id="buttonFileRekaBentuk"
                                                class="btn btn-outline-secondary btn-sm d-none" data-bs-toggle="modal"
                                                data-bs-target="#modalRekaBentukGrafik">
                                                Lampiran Fail
                                            </button>

                                        </div>

                                <?php } else if ($list->T03_NAMA_PERKHIDMATAN == 'Montaj') { ?>
                                            <div class="flex-shrink-0 ms-5 me-5">
                                                <input class="form-check-input secondary" type="checkbox" <?= $checked ?>
                                                    id="lainCheckbox" onclick="lainlain()" name="perkhidmatan[]"
                                                    value="<?= $list->T03_ID ?>" <?= $bg_checkbox ?>>
                                            </div>
                                            <div>
                                                <h4 class="fw-semibold mb-2">

                                                    <!-- <a href="">Pengacara Majlis</a> -->
                                                    <label class="form-check-label" for="perkhidmatan[]">
                                                <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                                    </label>

                                                </h4>
                                                <span class="<?= $bg_status ?>">
                                            <?= $status ?>
                                                </span>
                                            </div>

                                <?php } else if ($list->T03_NAMA_PERKHIDMATAN == 'Lain - Lain') { ?>
                                                <div class="flex-shrink-0 ms-5 me-5">
                                                    <input class="form-check-input secondary" type="checkbox" <?= $checked ?>
                                                        id="lainCheckbox" onclick="lainlain()" name="perkhidmatan[]"
                                                        value="<?= $list->T03_ID ?>" <?= $bg_checkbox ?>>
                                                </div>
                                                <div>
                                                    <h4 class="fw-semibold mb-2">

                                                        <!-- <a href="">Pengacara Majlis</a> -->
                                                        <label class="form-check-label" for="perkhidmatan[]">
                                                <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                                        </label>

                                                    </h4>
                                                    <span class="<?= $bg_status ?>">
                                            <?= $status ?>
                                                    </span>

                                                </div>

                                                <div id="input_lain" style="display: none;" class="ms-5">
                                                    <input type="text" name="lain_lain[<?= $list->T03_ID ?>]" class="form-control"
                                                        placeholder="Enter additional information">
                                                </div>

                                <?php } else { ?>
                                                <div class="flex-shrink-0 ms-5 me-5">
                                                    <input class="form-check-input secondary" type="checkbox" <?= $checked ?>
                                                        name="perkhidmatan[]" value="<?= $list->T03_ID ?>" <?= $bg_checkbox ?>>
                                                </div>
                                                <div>
                                                    <h4 class="fw-semibold mb-2">
                                                        <label class="form-check-label" for="perkhidmatan[]">
                                                <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                                        </label>

                                                    </h4>
                                                    <span class="<?= $bg_status ?>">
                                            <?= $status ?>
                                                    </span>

                                                </div>
                                <?php } ?>



                                <div class="card-body p-2 d-flex flex-column align-items-end" style="height: 100px;">
                                    <a class="mb-auto mt-auto" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus"
                                        data-bs-content="FARAHIZZAH BINTI MOHD " aria-label="Pegawai Bertanggungjawab"
                                        data-bs-original-title="Harga">
                                        <iconify-icon icon="ri:information-fill"
                                            class="fs-8 text-info py-1 px-2 ms-auto"></iconify-icon>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>




        <div class="mb-5 d-flex">
            <button type="submit" class="btn btn-primary col-sm-2 ms-auto" style="color: white;">Hantar
                Permohonan</button>
        </div>
    </div>



    <div class="modal fade" id="modalRekaBentukGrafik" tabindex="-1" aria-labelledby="modalRekaBentukGrafikLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRekaBentukGrafikLabel">Reka Bentuk Grafik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="reka_bentuk_grafik_file" class="form-label">Sila masukkan contoh rekaan grafik
                            <br>(Eg.
                            draft, wording, design dan lain-lain)</label>
                        </label>
                        <input class="form-control" type="file" id="reka_bentuk_grafik_file"
                            name="reka_bentuk_grafik_file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


</form>

<script>
    const rb_grafik = document.getElementById('triggerModalCheckbox');
    const file_rb = document.getElementById('reka_bentuk_grafik_file');
    const btn_rb = document.getElementById('buttonFileRekaBentuk');

    // Add an event listener to detect changes in the file input
    file_rb.addEventListener('change', function () {
        if (file_rb.files.length > 0) {
            rb_grafik.checked = true;
            btn_rb.classList.remove('d-none');
        } else {
            rb_grafik.checked = false;
        }
    });

    // Add an event listener to detect changes in the checkbox
    rb_grafik.addEventListener('change', function () {
        if (!rb_grafik.checked) {
            file_rb.value = ''; // Clear the file input if the checkbox is unchecked
            btn_rb.classList.add('d-none'); // Hide the button when the checkbox is unchecked
        }
    });


    function bahasa() {
        const checkbox = document.getElementById('pengacaraCheckbox');
        const languageSelect = document.getElementById('pilih_bahasa');
        languageSelect.style.display = checkbox.checked ? 'block' : 'none';
    }
    function lainlain() {
        const checkboxLain = document.getElementById('lainCheckbox');
        const inputLain = document.getElementById('input_lain');
        inputLain.style.display = checkboxLain.checked ? 'block' : 'none';
    }



</script>