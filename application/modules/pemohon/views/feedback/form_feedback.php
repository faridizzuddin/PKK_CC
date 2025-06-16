<?php

$tarikh_mula = date("d M Y", strtotime($program->T02_TARIKH_MULA));
$tarikh_akhir = date("d M Y", strtotime($program->T02_TARIKH_TAMAT));

?>


<form action="<?php echo module_url('feedback/hantar_feedback') ?>" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h3 class="pb-2">Borang Maklum Balas</h3>

            <div class="row">
                <div class="col">
                    <div class="card text-center bg-light">
                        <div class="card-header">
                            <h5 class="card-title">Maklumat Program</h5>
                        </div>
                        <div class="card-body">
                            <table class="table text-start ms-2">
                                <tr>
                                    <td class="fw-bolder">Nama Program</td>
                                    <td><?= $program->T02_NAMA_PROGRAM ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bolder">Tarikh Program</td>
                                    <td><?= $tarikh_mula ?> - <?= $tarikh_akhir ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bolder">Tempat</td>
                                    <td><?= $program->T02_TEMPAT_PROGRAM ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bolder">Bilangan Peserta</td>
                                    <td><?= $program->T02_BIL_PESERTA ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bolder">VIP</td>
                                    <td>Tiada VIP</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center bg-light">
                        <div class="card-header">
                            <h5 class="card-title">Gambar Program</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-start" style="font-weight: bold;">Sila masukkan gambar program : </p>
                            <div class="card">
                                <div class="card-body">
                                    <img src="<?php echo base_url('images/no_available_picture.png') ?>"
                                        class="img-fluid" alt="..." id="gambar_upload" style="width:13rem;">
                                </div>
                            </div>
                            <div class="mb-3 text-start">
                                <input class="form-control bg-white text-dark" type="file" accept="image/*"
                                    name="gambar_program" id="file" onchange="loadFile(event)"
                                    style="background-color: white;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="card text-center bg-light">
                        <div class="card-header">
                            <h5 class="card-title">Maklum Balas</h5>
                        </div>
                        <div class="card-body">
                            <div class="mt-2">
                                <p class="text-start" style="font-weight: bold;">Sila masukkan maklum balas anda : </p>
                                <textarea class="form-control" rows="4" placeholder="Tulis maklum balas di sini..."
                                    required style="background-color: white;" name="maklum_balas"></textarea>
                            </div>
                            <div class="mt-4">
                                <p class="text-start" style="font-weight: bold;">Sila cadangkan penambahbaikan (jika
                                    ada) : </p>
                                <textarea class="form-control" rows="4" placeholder="Tulis penambahbaikan di sini..."
                                    style="background-color: white;" name="penambahbaikan"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Hantar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    var loadFile = function (event) {
        var image = document.getElementById('gambar_upload');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>