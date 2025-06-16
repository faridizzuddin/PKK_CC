<?php $number = 1; ?>
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
            <table class="table table-hover table-striped" id="myTable">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Perkhidmatan</th>
                        <th>Harga Warga (RM)</th>
                        <th>Harga Bukan Warga (RM)</th>
                        <th>Status</th>
                        <th>Kebolehlihatan</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody id="perkhidmatanBody">
                    <?php foreach ($perkhidmatan as $list) { ?>
                        <tr class="text-center">
                            <td><?= $number++ ?></td>
                            <td><?= $list->T03_NAMA_PERKHIDMATAN ?></td>
                            <td><strong><?= $list->T03_HARGA_WARGA ?></strong></td>
                            <td><strong><?= $list->T03_HARGA_LUAR ?></strong></td>
                            <td>
                                <?php if ($list->T03_STATUS_PERKHIDMATAN == 1) { ?>
                                    <span class="badge bg-success-subtle text-success fw-bold">Available</span>
                                <?php } else { ?>
                                    <span class="badge bg-danger-subtle text-danger fw-bold">Not Available</span>
                                <?php } ?>
                            </td>
                            <td></td>
                            <td>
                                <!-- Edit form -->
                                <form action="<?= module_url('perkhidmatan/edit_perkhidmatan'); ?>" method="POST"
                                    style="display:inline;">
                                    <input type="hidden" name="T03_ID" value="<?= $list->T03_ID; ?>">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>

                                <!-- Delete form -->
                                <form action="<?= module_url('perkhidmatan/delete_perkhidmatan'); ?>" method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    <input type="hidden" name="T03_ID" value="<?= $list->T03_ID; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function searchPerkhidmatan() {
        const input = document.getElementById('searchBar').value.toLowerCase();
        const rows = document.getElementById('perkhidmatanBody').getElementsByTagName('tr');
        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let match = false;
            for (let j = 0; j < cells.length; j++) {
                if (cells[j].innerText.toLowerCase().indexOf(input) > -1) {
                    match = true;
                }
            }
            rows[i].style.display = match ? '' : 'none';
        }
    }
</script>