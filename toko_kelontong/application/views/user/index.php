                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= base_url('upload/') . $user['image']; ?>" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['name']; ?></h5>
                                    <p class="card-text"><?= $user['email']; ?></p>
                                    <p class="card-text"><?= $user['role_id'] == 2 ? 'Admin' : 'Super Admin' ?></p>
                                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_create']); ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php echo anchor('user/edit', '<div class="btn btn-sm btn-warning">Edit Profil</div>') ?>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->