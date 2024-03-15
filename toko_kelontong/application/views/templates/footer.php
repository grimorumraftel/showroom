            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- hapus Modal-->
            <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Delete" below if you are ready to Delete.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a id="hapus" class="btn btn-primary" href="<?= base_url('admin/hapus'); ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
            <!-- Page level plugins -->
            <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
            <!-- Page level custom scripts -->
            <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
            <script>
                $('.data-member').click(function() {
                    var uri = $(this)
                    $('#hapus').attr('href', uri.attr('href'))
                })

                //barang masuk
                $(document).ready(function() {

                    $('#barang').change(function() {

                        var idbar = $(this).val();

                        $.ajax({
                            url: '/toko_kelontong/user/ambil_data_barang/',
                            type: 'post',
                            data: {

                                id_barang: idbar,
                            },
                            success: (rest) => {
                                $('#satuan').val(rest.satuan)
                                $('#stok').val(rest.stok)
                                $('#id_barang').val(rest.id_barang)
                                $('#nama_barang').val(rest.nama_barang)
                                $('#kode_barang').val(rest.kode_barang)

                            },

                        });


                    })
                })
                //akhir barang masuk

                //barang keluar
                $(document).ready(function() {

                    $('#barang').change(function() {

                        var idbar = $(this).val();

                        $.ajax({
                            url: '/toko_kelontong/user/ambil_data_barang_bk/',
                            type: 'post',
                            data: {

                                id_barang: idbar,
                            },
                            success: (rest) => {
                                $('#satuan').val(rest.satuan)
                                $('#stok').val(rest.stok)
                                $('#id_barang').val(rest.id_barang)
                                $('#nama_barang').val(rest.nama_barang)
                                $('#kode_barang').val(rest.kode_barang)

                            },

                        });


                    })
                })
                //akhir barang keluar
            </script>
            </body>

            </html>