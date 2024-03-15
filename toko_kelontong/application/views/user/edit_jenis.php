<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Jenis </h3>

    <?php
    foreach ($jenis as $j) :
    ?>

        <form method="post" action="<?php echo base_url() . 'user/update_jenis' ?>" enctype="multipart/form-data">

            <div class="for gorup">
                <label for=""></label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $j->id ?> ">
            </div>

            <div class="for gorup">
                <label for="">Satuan Barang</label>
                <input type="text" name="jenis_barang" class="form-control" value="<?php echo $j->jenis_barang ?> ">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>