                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="row ">
                        <div class="col-md-6">

                            <form class="user" method="post" action="<?= base_url('user/update_user'); ?>" enctype="multipart/form-data">
                                <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= $user['id']; ?>" style="display:none">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= $user['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= $user['email']; ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">

                                    <input type="file" id="image" name="image" placeholder="image" value="<?= $user['image']; ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <?php if ($user['role_id'] != 2) { ?>
                                        <select name="role_id" id="role_id" class="form-control" style="border-radius: 45px" placeholder="Select Role" required>
                                            <option value="">Select Role</option>
                                            <option value="2" <?= $user['role_id'] == 2 ? 'selected' : '' ?>>Admin</option>
                                            <option value="1" <?= $user['role_id'] == 1 ? 'selected' : '' ?>>Super Admin</option>
                                        </select>
                                    <?php } else { ?>
                                        <input type="text" class="form-control" style="border-radius: 45px" value="Admin" disabled>
                                    <?php } ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Edit Account
                                </button>

                            </form>
                            <!--
                        <form class="user" method="post" action="<?= base_url('user/update_user'); ?>" >

                              <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= $user['id']; ?>" style="display:none">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name"
                                        placeholder="Full Name" value="<?= $user['name']; ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address" value="<?= $user['email']; ?>">

                                </div>

                                <div class="form-group">
                                <select name="role_id" id="role_id" class="form-control" style="border-radius: 45px" placeholder="Select Role"
                                 required>
                                    <option value="">Select Role</option>
                                    <option value="2" <?= $user['role_id'] == 2 ? 'selected' : '' ?>>Admin</option>
                                    <option value="1" <?= $user['role_id'] == 1 ? 'selected' : '' ?>>Super Admin</option>
                                </select>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password1" name="password1" placeholder="Password">

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                            </form> -->
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->