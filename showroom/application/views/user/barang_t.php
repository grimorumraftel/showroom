                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="row ">
                        <div class="col-md-6">
                        <?php
                            foreach ($id as $su) :
                                $jml = $su->id_barang + 1;
                                $waktu = date('dmy');
                                $kode = 'KS-' . $waktu . $jml;

                            endforeach;
                            ?>


                            <form action="<?php echo base_url() . 'user/add_barang'; ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" name="kode_barang" value="<?= $kode ?>" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" name="stok" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Satuan Barang</label>
                                    <select name="satuan_barang" id="satuan_barang" class="form-control" style="border-radius: 45px" placeholder="Select Role" required>
                                        <?php foreach ($satuan as $s) { ?>
                                            <option value=" <?= $s->satuan_barang ?>"><?= $s->satuan_barang ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Barang</label>

                                    <select name="jenis_barang" id="jenis_barang" class="form-control" style="border-radius: 45px" placeholder="Select Role" required>
                                        <?php foreach ($jenis as $barang) { ?>
                                            <option value=" <?= $barang->jenis_barang ?> "><?= $barang->jenis_barang ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button> -->
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- /.container-fluid -->