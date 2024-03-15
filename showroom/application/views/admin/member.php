                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Member</h6>
                            <a href="<?= base_url('Admin/tambah'); ?>">tambah</a>
                            <?= $this->session->flashdata('message'); ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Role id</th>
                                            <th>Start date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($member as $m) : ?>
                                            <!-- <?= base_url('upload/') . $user['image']; ?> -->
                                            <tr>
                                                <td><?= $m->name; ?></td>
                                                <td><?= $m->email; ?></td>
                                                <td><img src="<?= base_url('upload/') . $m->image; ?>" width="50px" height="50px"></td>
                                                <td><?= $m->role_id == 2 ? 'Admin' : 'Super Admin'; ?></td>
                                                <td><?= date('d F Y', $m->date_create); ?></td>
                                                <td>
                                                    <a href="<?= base_url('Admin/hapus/') . $m->id; ?>" class="fas fa-trash data-member" data-toggle="modal" data-target="#hapusModal" class="hapusdata"> &nbsp;|
                                                        &nbsp; <a href="<?= base_url('Admin/edit_a/') . $m->id; ?>" class="fas fa-edit">
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