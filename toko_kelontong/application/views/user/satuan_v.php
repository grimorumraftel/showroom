                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->session->flashdata('tambah_satuan'); ?>
                    <?= $this->session->flashdata('edit_satuan'); ?>
                    <?= $this->session->flashdata('hapus_satuan'); ?>
                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Satuan Barang</h6>

                            <button class="btn btm-sm btn-light mb-3" data-toggle="modal" data-target="#tambah_satuan">
                                <i class="fas fa-plus fa-sm"></i>&nbsp;Tambah data
                            </button>

                            <!-- <button class="btn btm-sm btn-light mb-3">
                                <i class="fas fa-print fa-sm"><a href="<?= base_url('user/cetakpdf_satuan'); ?>">&nbsp;Cetak PDF</a></i>
                            </button> -->

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Satuan Barang</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $no = 1;

                                        foreach ($satuan as $s) :
                                        ?>

                                            <tr>
                                                <td><?= $no++; ?> </td>
                                                <td><?= $s->satuan_barang ?></td>
                                                <td>
                                                    <a href="<?= base_url('user/hapus_satuan/') . $s->id; ?>" class="fas fa-trash data-member" data-toggle="modal" data-target="#hapusModal" class="hapusdata">
                                                        &nbsp;| &nbsp;
                                                        <a href="<?= base_url('user/edit_satuan/') . $s->id; ?>" class="fas fa-edit">

                                                </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Main Content -->

                <!-- Modal Tambah satuan -->
                <div class="modal fade" id="tambah_satuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah satuan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="<?php echo base_url() . 'user/tambah_satuan'; ?>" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Satuan </label>
                                        <input type="text" name="satuan_barang" class="form-control">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button> -->
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>