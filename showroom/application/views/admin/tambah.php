                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="row ">
                        <div class="col-md-6">

                            <form class="user" method="post" action="<?= base_url('admin/add'); ?>" enctype="multipart/form-data">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">

                                </div>
                                <div class="form-group">
                                    <input type="file" id="image" name="image" placeholder="image">
                                </div>

                                <div class="form-group">
                                    <select name="role_id" id="role_id" class="form-control" style="border-radius: 45px" placeholder="Select Role" required>
                                        <option value="">Select Role</option>
                                        <option value="2">Admin</option>
                                        <option value="1">Super Admin</option>
                                    </select>
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
                                    Add Account
                                </button>

                            </form>

                        </div>
                    </div>


                    <!-- /.container-fluid -->