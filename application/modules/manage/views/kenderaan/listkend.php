<?php
//$ENABLE_ADD     = has_permission('menu.Add');
//$ENABLE_MANAGE  = has_permission('menu.Manage');
//$ENABLE_DELETE  = has_permission('menu.Delete');
$ENABLE_ADD = TRUE;
$ENABLE_MANAGE = TRUE;
$ENABLE_DELETE = TRUE;

$nombor = 1;
?>
<?= form_open($this->uri->uri_string(), array('id' => 'frm_menu', 'name' => 'frm_menu')) ?>

<div class="card">

    <div class="card-header">Senarai Kenderaan</div>
    <a href="<?php echo module_url('kenderaan/form_add') ?>" class="btn btn-success col-sm-2 ms-4">Tambah Kenderaan</a>

    <div class="card-body ">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nombor Kenderaan</th>
                    <th>Jenis Kereta</th>
                    <th>Nama Pemilik</th>
                    <th>Pekerjaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($listkenderaan as $list) {
                    ?>
                    <tr>
                        <td><?= $nombor ?></td>
                        <td><?= $list->T01_NOMBOR_KENDERAAN ?></td>
                        <td><?= $list->T01_JENAMA ?></td>
                        <td><?= $list->T01_NAMA_PEMILIK_ ?></td>
                        <td><?= $list->T01_PANGKAT ?></td>
                        <td>
                            <a href="<?php echo module_url('kenderaan/delete/' . $list->T01_ID) ?>"><button
                                    class="btn btn-flat btn-danger">Delete</a>
                            <a href="<?php echo module_url('kenderaan/form_edit/' . $list->T01_ID) ?>"><button
                                    class="btn btn-flat btn-warning ms-2">Edit</a>

                        </td>

                    </tr>

                    <?php
                    $nombor++;
                } ?>
            </tbody>
        </table>

        <?php if (!$ENABLE_DELETE) { ?>
            <input type="button" name="delete1" class="btn btn-danger" id="delete-me" value="Hapus"
                onclick="confirm_delete(this.form) ">
            <input type="hidden" name="delete" id="isdelete">
        <?php } ?>

    </div><!-- /.box-body -->
    <div class="box-footer clearfix">
        <?php
        // echo $this->pagination->create_links(); 
        ?>
    </div>



</div><!-- /.box --> <?php form_close(); ?>

<script>
    function confirm_delete(myform) {
        if (confirm('<?= (lang('ccc_delete_confirm')); ?>')) {
            $("#isdelete").val(1);
            myform.submit();
        }

        return false;
    }
</script>