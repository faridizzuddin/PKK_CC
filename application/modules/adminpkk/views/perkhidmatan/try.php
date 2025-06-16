<div class="col-lg-12">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-4 d-flex align-items-center gap-3 border border-rounded">

                <?php if ($list->T03_NAMA_PERKHIDMATAN == 'Pengacara Majlis' && $list->T03_STATUS_PERKHIDMATAN == '1') { ?>
                    <div class="flex-shrink-0 ms-5 me-5">
                        <input class="form-check-input secondary border" type="checkbox" id="pengacaraCheckbox"
                            onclick="bahasa()" name="perkhidmatan[]" value="<?= $list->T03_ID ?>">
                        <!-- <i class="fa fa-fw fa-heartbeat text-primary display-6" aria-hidden="true"></i> -->
                    </div>
                    <div>
                        <h5 class="fw-semibold mb-0">

                            <!-- <a href="">Pengacara Majlis</a> -->
                            <label class="form-check-label" for="perkhidmatan[]">
                                <?= $list->T03_NAMA_PERKHIDMATAN ?>
                            </label>

                        </h5>
                        <span class="fs-2 d-flex align-items-center">
                            Status: Active <br>
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
                <?php } else if ($list->T03_NAMA_PERKHIDMATAN == 'Lain Lain' && $list->T03_STATUS_PERKHIDMATAN == '1') { ?>

                        <div class="flex-shrink-0 ms-5 me-5">
                            <input class="form-check-input secondary" type="checkbox" id="lainCheckbox" onclick="lainlain()"
                                name="perkhidmatan[]" value="<?= $list->T03_ID ?>">
                        </div>
                        <div>
                            <h5 class="fw-semibold mb-0">
                                <label class="form-check-label" for="perkhidmatan[]">
                                <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                </label>
                            </h5>
                            <span class="fs-2 d-flex align-items-center">
                                Status: Active <br>
                            </span>
                        </div>

                        <div id="input_lain" style="display: none;" class="ms-5">

                            <input type="text" name="lain_lain[<?= $list->T03_ID ?>]" class="form-control"
                                placeholder="Enter additional information">
                        </div>

                <?php } else if ($list->T03_STATUS_PERKHIDMATAN == '1') { ?>
                            <div class="flex-shrink-0 ms-5 me-5">
                                <input class="form-check-input secondary" type="checkbox" name="perkhidmatan[]"
                                    value="<?= $list->T03_ID ?>">
                                <!-- <i class="fa fa-fw fa-heartbeat text-primary display-6" aria-hidden="true"></i> -->
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-0">

                                    <!-- <a href="">Pengacara Majlis</a> -->
                                    <label class="form-check-label" for="perkhidmatan[]">
                                <?= $list->T03_NAMA_PERKHIDMATAN ?>
                                    </label>

                                </h5>
                                <span class="fs-2 d-flex align-items-center">
                                    Status: Active <br>
                                </span>

                            </div>
                <?php } ?>
                <div class="card-body p-2 d-flex flex-column align-items-end" style="height: 100px;">
                    <a class="mb-auto mt-auto" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus"
                        data-bs-content="FARAHIZZAH BINTI MOHD " aria-label="Pegawai Bertanggungjawab"
                        data-bs-original-title="Pegawai Bertanggungjawab">
                        <iconify-icon icon="ri:information-fill"
                            class="fs-8 text-info py-1 px-2 ms-auto"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>