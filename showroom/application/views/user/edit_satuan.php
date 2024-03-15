<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Satuan </h3>

    <?php
    foreach ($satuan as $s) :
    ?>

        <form method="post" action="<?php echo base_url() . 'user/update_satuan' ?>" enctype="multipart/form-data">

            <div class="for gorup">
                <label for=""></label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $s->id ?> ">
            </div>

            <div class="for gorup">
                <label for="">Satuan Barang</label>
                <input type="text" name="satuan_barang" class="form-control" value="<?php echo $s->satuan_barang ?> ">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>