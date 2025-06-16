<?php

//outline checkbox
$bg_checkbox = 'style="outline: 0.4px solid black; outline-offset: 2px;"';
?>
<form action="<?php echo module_url('permohonan/kemaskini_perkhidmatan/' . $id_program) ?>" method="post">
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
            <div class="card-body">

                <?php foreach ($perkhidmatan as $list) { ?>

                    <?php if ($list->T03_STATUS_PERKHIDMATAN == '0') {
                        $checked = "disabled";
                        $status = "Not Available";
                        $background = "style='background-color:rgb(255, 219, 222);'";
                        //$background = "bg-danger";
                    } else {
                        $checked = '';
                        $status = "Available";
                        $background = "style='background-color:rgb(225, 225, 225);'";
                    } ?>

                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="card" <?= $background ?>>
                                <div class="card-body p-4 d-flex align-items-center gap-3 border border-rounded">

                                    <?php if ($list->T03_NAMA_PERKHIDMATAN == 'Pengacara Majlis') { ?>
                                        <div class="flex-shrink-0 ms-5 me-5">
                                            <input class="form-check-input secondary border" type="checkbox"
                                                id="pengacaraCheckbox" onclick="bahasa()" name="perkhidmatan[]" <?php foreach ($data as $row) {
                                                    if ($row->T03_ID == $list->T03_ID) {
                                                        echo "checked disabled";
                                                    }
                                                } ?> value="<?= $list->T03_ID ?>" <?= $bg_checkbox ?>>
                                            <!-- <i class="fa fa-fw fa-heartbeat text-primary display-6" aria-hidden="true"></i> -->
                                        </div>
                                        <div>
                                            <h4 class="fw-semibold mb-0">

                                                <!-- <a href="">Pengacara Majlis</a> -->
                                                <label class="form-check-label" for="perkhidmatan[]">
                                                    <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                                </label>

                                            </h4>
                                            <span class="fs-3 d-flex align-items-center">
                                                Status : <?= $status ?> <br>
                                            </span>

                                        </div>

                                        <div id="pilih_bahasa" style="display: none;" class="ms-5">
                                            <table>
                                                <td> <label for="status_bahasa[<?= $list->T03_ID ?>]">Sila Pilih Bahasa :
                                                    </label>
                                                </td>
                                                <td> <select name="status_bahasa[<?= $list->T03_ID ?>]" id="language"
                                                        class="form-select col-lg-12">
                                                        <option value="Bahasa Melayu">Bahasa Melayu</option>
                                                        <option value="Bahasa Inggeris">Bahasa Inggeris</option>
                                                    </select></td>
                                            </table>

                                        </div>
                                    <?php } else if ($list->T03_NAMA_PERKHIDMATAN == 'Lain - lain') { ?>

                                            <div class="flex-shrink-0 ms-5 me-5">
                                                <input class="form-check-input secondary border" type="checkbox" <?= $checked ?>
                                                    id="lainCheckbox" onclick="lainlain()" name="perkhidmatan[]" <?php foreach ($data as $row) {
                                                        if ($row->T03_ID == $list->T03_ID) {
                                                            echo "checked";
                                                        }
                                                    } ?> value="<?= $list->T03_ID ?>" <?= $bg_checkbox ?>>
                                            </div>
                                            <div>
                                                <h4 class="fw-semibold mb-0">

                                                    <!-- <a href="">Pengacara Majlis</a> -->
                                                    <label class="form-check-label" for="perkhidmatan[]">
                                                    <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                                    </label>

                                                </h4>
                                                <span class="fs-3 d-flex align-items-center">
                                                    Status : <?= $status ?> <br>
                                                </span>

                                            </div>

                                            <div id="input_lain" style="display: none;" class="ms-5">

                                                <input type="text" name="lain_lain[<?= $list->T03_ID ?>]" class="form-control"
                                                    placeholder="Enter additional information">
                                            </div>

                                    <?php } else { ?>
                                            <div class="flex-shrink-0 ms-5 me-5">
                                                <input class="form-check-input secondary border" type="checkbox" <?= $checked ?>
                                                    name="perkhidmatan[]" <?php foreach ($data as $row) {
                                                        if ($row->T03_ID == $list->T03_ID) {
                                                            echo "checked disabled";
                                                        }
                                                    } ?> value="<?= $list->T03_ID ?>" <?= $bg_checkbox ?>>
                                                <!-- <i class="fa fa-fw fa-heartbeat text-primary display-6" aria-hidden="true"></i> -->
                                            </div>
                                            <div>
                                                <h4 class="fw-semibold mb-0">

                                                    <!-- <a href="">Pengacara Majlis</a> -->
                                                    <label class="form-check-label" for="perkhidmatan[]">
                                                    <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                                    </label>

                                                </h4>
                                                <span class="fs-3 d-flex align-items-center">
                                                    Status : <?= $status ?> <br>
                                                </span>

                                            </div>
                                    <?php } ?>
                                    <div class="card-body p-2 d-flex flex-column align-items-end" style="height: 100px;">
                                        <a class="mb-auto mt-auto" tabindex="0" data-bs-toggle="popover"
                                            data-bs-trigger="focus" data-bs-content="FARAHIZZAH BINTI MOHD "
                                            aria-label="Pegawai Bertanggungjawab"
                                            data-bs-original-title="Pegawai Bertanggungjawab">
                                            <iconify-icon icon="ri:information-fill"
                                                class="fs-8 text-info py-1 px-2 ms-auto"></iconify-icon>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="mb-5 d-flex">
            <button type="submit" class="btn btn-primary col-sm-2 ms-auto" style="color: white;">Kemaskini
                Permohonan</button>
        </div>
    </div>
</form>

<script>
    function bahasa() {
        const checkbox = document.getElementById('pengacaraCheckbox');
        const languageSelect = document.getElementById('pilih_bahasa');
        // Toggle visibility based on checkbox state
        languageSelect.style.display = checkbox.checked ? 'block' : 'none';
    }
    function lainlain() {
        const checkboxLain = document.getElementById('lainCheckbox');
        const lainSelect = document.getElementById('input_lain');
        lainSelect.style.display = checkboxLain.checked ? 'block' : 'none';
    }
</script>