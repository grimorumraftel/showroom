                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->session->flashdata('tambah_barang_success'); ?>
                    <?= $this->session->flashdata('edit_barang'); ?>
                    <?= $this->session->flashdata('hapus_barang_success'); ?>

                    <?php
                    $this->session->unset_userdata('tambah_barang_success');
                    $this->session->unset_userdata('hapus_barang_success');
                    ?>
                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>

                            <a href="<?= base_url('user/barang_t'); ?>">
                                <button class="btn btm-sm btn-light mb-3"><i class="fas fa-plus fa-sm">&nbsp;Tambah Barang</i></button>
                            </a>

                            <a href="<?= base_url('user/cetakpdf'); ?>">
                                <button class="btn btm-sm btn-light mb-3"><i class="fas fa-print fa-sm"> &nbsp;Cetak PDF</i></button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Jenis</th>
                                            <th>Satuan</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($barang as $barang) :
                                        ?>

                                            <tr>

                                                <td><?= $barang->kode_barang ?></td>
                                                <td><?= $barang->nama_barang ?></td>
                                                <td><?= $barang->stok ?></td>
                                                <td><?= $barang->jenis_barang ?></td>
                                                <td><?= $barang->satuan ?></td>
                                                <td>
                                                    <a href="<?= base_url('user/hapus_b/') . $barang->id_barang; ?>" class="fas fa-trash data-member" data-toggle="modal" data-target="#hapusModal" class="hapusdata">
                                                        &nbsp;| &nbsp;
                                                        <a href="<?= base_url('user/edit_b/') . $barang->id_barang; ?>" class="fas fa-edit">
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Select all flash message elements
                            var flashMessages = document.querySelectorAll('.alert');

                            // Set a timeout to hide each flash message after 3 seconds
                            flashMessages.forEach(function(message) {
                                setTimeout(function() {
                                    message.style.display = 'none';
                                }, 3000); // 3000 milliseconds (3 seconds)
                            });
                        });
                    </script>
                </div>