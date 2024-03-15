                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="row ">
                        <div class="col-md-6">

                            <form class="user" method="post" action="<?= base_url('Admin/update_a'); ?>" enctype="multipart/form-data">
                                <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= $member['id']; ?>" style="display:none">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= $member['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= $member['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="file" id="image" name="image" placeholder="image">
                                </div>
                                <div class="form-group">
                                    <?php if ($member['role_id'] == 2) { ?>
                                        <select name="role_id" id="role_id" class="form-control" style="border-radius: 45px" placeholder="Select Role" required>
                                            <option value="">Select Role</option>
                                            <option value="2" <?= $member['role_id'] == 2 ? 'selected' : '' ?>>Admin</option>
                                            <option value="1" <?= $member['role_id'] == 1 ? 'selected' : '' ?>>Super Admin</option>
                                        </select>
                                    <?php } else { ?>
                                        <input type="text" class="form-control" style="border-radius: 45px" value="Admin" disabled>
                                    <?php } ?>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Edit Account
                                </button>
                            </form>
                        </div>
                    </div>


                    <!-- /.container-fluid -->