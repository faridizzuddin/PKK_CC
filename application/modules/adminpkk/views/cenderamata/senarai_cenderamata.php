<?php $number = 1; ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row p-4 ps-0">
                <div class="col-lg-7">
                    <h3 class="section-title" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                        Senarai Cenderamata
                    </h3>
                </div>
                <div class="col-lg-5 d-flex justify-content-end align-items-center">
                    <input type="text" id="searchBar" class="form-control" placeholder="Cari Cenderamata..."
                        onkeyup="searchPerkhidmatan()">
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover border" id="myTable">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Gambar Cenderamata</th>
                        <th>Nama Cenderamata</th>
                        <th>Harga</th>
                        <th>Kuantiti</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_cenderamata as $list) { ?>
                        <tr class="align-middle text-center" style="height:18rem;">
                            <td><?= $number++ ?></td>
                            <td>
                                <img src="<?= base_url('upload/cenderamata/' . $list->T04_GAMBAR) ?>"
                                    alt="Gambar Cenderamata" style="width: 15rem;">
                            </td>
                            <td><?= $list->T04_CNAMA ?></td>
                            <td><strong><?= $list->T04_CHARGA ?></strong></td>
                            <td><strong><?= $list->T04_KUANTITI ?></strong></td>
                            <td>
                                <form action="<?= module_url('cenderamata/edit_cenderamata'); ?>" method="POST"
                                    style="display:inline;">
                                    <input type="hidden" name="id_cenderamata" value="<?= $list->T04_ID ?>">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                                <form action="<?= module_url('cenderamata/delete_cenderamata'); ?>" method="POST"
                                    style="display:inline;">
                                    <input type="hidden" name="id_cenderamata" value="<?= $list->T04_ID ?>">
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this record?');">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>