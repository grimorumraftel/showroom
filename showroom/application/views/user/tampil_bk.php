                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->session->flashdata('tambah_bk'); ?>
                    <?= $this->session->flashdata('hapus_bk'); ?>

                    <?php
                    $this->session->unset_userdata('tambah_bm');
                    $this->session->unset_userdata('hapus_bm');
                    ?>
                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>

                            <!-- <a href="<?= base_url('user/barang_keluar'); ?>">
                                <button class="btn btm-sm btn-light mb-3"><i class="fas fa-plus fa-sm">&nbsp;Tambah Barang Keluar</i></button>
                            </a> -->

                            <a href="<?= base_url('user/cetakpdf_bk'); ?>">
                                <button class="btn btm-sm btn-light mb-3"><i class="fas fa-print fa-sm"> &nbsp;Cetak PDF</i></button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>Id Transaksi</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Keluar</th>
                                            <th>Satuan</th>
                                            <th>Tujuan</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($bk as $barang) :
                                        ?>

                                            <tr>

                                                <td><?= $barang->id_transaksi ?></td>
                                                <td><?= $barang->tanggal_keluar ?></td>
                                                <td><?= $barang->kode_barang ?></td>
                                                <td><?= $barang->nama_barang ?></td>
                                                <td><?= $barang->jumlah_keluar ?></td>
                                                <td><?= $barang->satuan ?></td>
                                                <td><?= $barang->tujuan ?></td>
                                                <td>
                                                    <a href="<?= base_url('user/hapus_bk/') . $barang->id; ?>" class="data-member" data-toggle="modal" data-target="#hapusModal" class="hapusdata">
                                                        <button class="btn btm-sm btn-danger mb-3"> Hapus</button>
                                                    </a>

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