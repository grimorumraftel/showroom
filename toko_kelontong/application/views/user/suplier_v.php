                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->session->flashdata('tambah_suplier'); ?>
                    <?= $this->session->flashdata('edit_suplier'); ?>
                    <?= $this->session->flashdata('hapus_suplier'); ?>
                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Suplier</h6>

                            <button class="btn btm-sm btn-light mb-3" data-toggle="modal" data-target="#tambah_suplier">
                                <i class="fas fa-plus fa-sm"></i>&nbsp;Tambah data
                            </button>

                            <a href="<?= base_url('user/cetakpdf_s'); ?>">
                                <button class="btn btm-sm btn-light mb-3"><i class="fas fa-print fa-sm"> &nbsp;Cetak PDF</i></button>
                            </a>



                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Suplier</th>
                                            <th>Nama suplier</th>
                                            <th>Alamat </th>
                                            <th>Nomer Telepon</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $no = 1;

                                        foreach ($suplier as $su) :
                                        ?>

                                            <tr>
                                                <td><?= $no++; ?> </td>
                                                <td><?= $su->kode_suplier ?></td>
                                                <td><?= $su->nama_suplier ?></td>
                                                <td><?= $su->alamat ?></td>
                                                <td><?= $su->no_tlp ?></td>
                                                <td>
                                                    <a href="<?= base_url('user/hapus_suplier/') . $su->id_suplier; ?>" class="fas fa-trash data-member" data-toggle="modal" data-target="#hapusModal" class="hapusdata">&nbsp;| &nbsp;
                                                        <a href="<?= base_url('user/edit_suplier/') . $su->id_suplier; ?>" class="fas fa-edit">
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

                <!-- Modal Tambah Suplier -->
                <div class="modal fade" id="tambah_suplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Suplier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <?php
                                foreach ($id as $su) :
                                    $jml = $su->id_suplier + 1;
                                    $waktu = date('dmy');
                                    $kode = 'KS-' . $waktu . $jml;

                                endforeach;
                                ?>
                                <form action="<?php echo base_url() . 'user/tambah_suplier'; ?>" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Kode Suplier</label>
                                        <input type="text" name="kode_suplier" value="<?= $kode ?>" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Suplier</label>
                                        <input type="text" name="nama_suplier" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Nomer Telepon</label>
                                        <input type="text" name="no_tlp" class="form-control">
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