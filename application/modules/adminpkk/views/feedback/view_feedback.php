<?php

$tarikh_mula = date("d M Y", strtotime($program->T02_TARIKH_MULA));
$tarikh_akhir = date("d M Y", strtotime($program->T02_TARIKH_TAMAT));
?>

<div class="card shadow-lg p-4 mb-4 bg-white rounded">
    <div class="card-body text-center">
        <h3 class="pb-2">Maklumat Maklum Balas</h3>
        <img src="<?php echo base_url('upload/' . $feedback->T06_FEEDBACK_GAMBAR) ?>"
            class="img-fluid border rounded mb-3" alt="Gambar Program" style="max-width: 35%; height: auto;">
        <h4 class="text-center pb-2 pt-4">Maklumat Program</h4>
        <table class="table table-bordered text-start">
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


    <div class="card-body">
        <h4 class="text-center pb-2 pt-4">Maklum Balas</h4>
        <div class="card p-3 mb-3">
            <p class="fw-bold">Maklum balas sebelumnya:</p>
            <p><?= isset($feedback->T06_MAKLUM_BALAS) ? $feedback->T06_MAKLUM_BALAS : 'Tiada maklum balas.' ?></p>
        </div>
        <div class="mb-3">
            <p class="fw-bold">Sila masukkan maklum balas anda:</p>
            <textarea class="form-control" rows="4" placeholder="Tulis maklum balas di sini..." required
                name="maklum_balas"></textarea>
        </div>
        <div class="card p-3 mb-3">
            <p class="fw-bold">Cadangan penambahbaikan sebelumnya:</p>
            <p><?= isset($feedback->T06_PENAMBAHBAIKAN) ? $feedback->T06_PENAMBAHBAIKAN : 'Tiada cadangan.' ?></p>
        </div>
        <div class="mb-3">
            <p class="fw-bold">Sila cadangkan penambahbaikan (jika ada):</p>
            <textarea class="form-control" rows="4" placeholder="Tulis penambahbaikan di sini..."
                name="penambahbaikan"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Hantar</button>
            <a href="<?= site_url('pemohon/feedback/cetak/' . $feedback->T06_ID) ?>" class="btn btn-secondary">Cetak</a>
        </div>
    </div>
</div>