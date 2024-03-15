<div class="container-fluid">
    <div class="card">
        <h5 class="card-harder py-3 ml-2">Detail Barang</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url() . '/upload/' . $barang['gambar_barang'] ?>" widht="300" height="300" alt="">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Nama Produk</td>
                            <td><strong><?php echo $barang['nama_barang'] ?></strong></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><strong><?php echo $barang['keterangan'] ?></strong></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><strong><?php echo $barang['stok'] ?></strong></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><strong>
                                    <div class="btn btn-sm btn-success">Rp. <?php echo number_format($barang['harga'], 0, ',', '.') ?></div>
                                </strong></td>
                        </tr>
                    </table>


                    <?php echo anchor('User/barang_v', '<div class="btn btn-sm btn-danger">Kembali</div>') ?>

                </div>
            </div>


        </div>
    </div>
</div>