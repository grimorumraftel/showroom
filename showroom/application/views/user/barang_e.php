                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="row ">
                        <div class="col-md-6">

                            <form class="user" method="post" action="<?= base_url('user/update_b'); ?>" enctype="multipart/form-data">

                                <div class="form-group">
                                    <input type="hidden" class="form-control form-control-user" id="id_barang" name="id_barang" placeholder="Id Barang" value="<?= $barang['id_barang']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" name="kode_barang" value="<?= $barang['kode_barang']; ?>" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama_barang" value="<?= $barang['nama_barang']; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" name="stok" value="0" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Satuan Barang</label>
                                    <input type="text" name="satuan_barang" value="<?= $barang['satuan']; ?>" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Barang</label>
                                    <input type="text" name="jenis_barang" value="<?= $barang['jenis_barang']; ?>" class="form-control" disabled>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Edit Data
                                </button>
                        </div>


                        </form>

                    </div>
                </div>


                <!-- /.container-fluid -->