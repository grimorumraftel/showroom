<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Suplier </h3>

    <?php
    foreach ($suplier as $su) :
    ?>

        <form method="post" action="<?php echo base_url() . 'user/update_suplier' ?>" enctype="multipart/form-data">

            <div class="for gorup">
                <label for=""></label>
                <input type="hidden" name="id_suplier" class="form-control" value="<?php echo $su->id_suplier ?> ">
            </div>

            <div class="for gorup">
                <label for="">Kode Suplier</label>
                <input type="text" name="kode_suplier" class="form-control" value="<?php echo $su->kode_suplier ?> " disabled>
            </div>

            <div class="for gorup">
                <label for="">Nama Suplier</label>
                <input type="text" name="nama_suplier" class="form-control" value="<?php echo $su->nama_suplier ?> ">
            </div>

            <div class="for gorup">
                <label for="">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $su->alamat ?> ">
            </div>

            <div class="for gorup">
                <label for="">Nomer Telepon</label>
                <input type="text" name="no_tlp" class=" form-control" value="<?php echo $su->no_tlp ?> ">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>