                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="row ">
                        <div class="col-md-6">
                            <?php
                            $id = $id ? $id[0]->id : 0;
                            $waktu = date('dmy');
                            date_default_timezone_set('Asia/Jakarta');
                            $current_time = date('His');
                            $kode = 'BK-' . $waktu . $current_time;
                            ?>

                            <form action="<?php echo base_url() . 'user/tambah_bk'; ?>" name="barang_masuk" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Id Transaksi</label>
                                    <input type="text" name="id_transaksi" value="<?= $kode ?>" class="form-control" readonly>

                                </div>

                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>

                                <div class="form-group">

                                    <input type="hidden" name="id_barang" id="id_barang" class="form-control" value=" ">
                                </div>

                                <div class="form-group">
                                    <label>Barang</label>
                                    <select name="suplier" class="form-control" id="supplier" placeholder="Select Role" required>
                                        <?php foreach ($barang as $b) { ?>
                                            <option value="<?= $b->id_barang ?>"><?= $b->nama_barang  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="selected_barang" id="selected_barang" class="form-control">
                                    <input type="hidden" name="kode_barang" id="kode_barang" class="form-control" value=" ">
                                    <input type="hidden" name="nama_barang" id="nama_barang" class="form-control" value=" ">
                                </div>


                                <div class="form-group">
                                    <label>Stok</label>

                                    <input type="text" name="stok" class="form-control" id="stok" value=" " onFocus="startCalc();" onBlur="stopCalc();" readonly>

                                </div>

                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="text" name="jumlah" class="form-control" id="jumlah" onFocus="startCalc();">
                                </div>

                                <div class="form-group">
                                    <label>Total Stok</label>
                                    <input type="text" name="total_stok" class="form-control" id="total" onchange="tryNumberFormat(this.form.thirdBox);" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Satuan</label>
                                    <input type="text" name="satuan" class="form-control" id="satuan" value="" readonly>
                                    <!-- <input type="hidden" name="satuan" class="form-control" id="satuan" value=""> -->
                                </div>

                                <div class="form-group">
                                    <label>Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control">
                                </div>




                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button> -->
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    // Get references to the select element and the hidden input
                    const supplierSelect = document.getElementById('supplier');
                    const selectedBarangInput = document.getElementById('selected_barang');

                    // Add an event listener to the select element
                    supplierSelect.addEventListener('change', function() {
                        // Get the selected option
                        const selectedOption = supplierSelect.options[supplierSelect.selectedIndex];

                        // Set the hidden input value to the text of the selected option
                        selectedBarangInput.value = selectedOption.textContent;
                        console.log(selectedBarangInput.value);
                    });
                </script>
                <!-- /.container-fluid -->
                <script type="text/javascript">
                    function startCalc() {
                        interval = setInterval("calc()", 1);
                    }

                    function calc() {

                        y = parseInt(document.barang_masuk?.stok?.value ?? 0);
                        z = parseInt(document.barang_masuk?.jumlah?.value ?? 0);

                        var t = (y - z)
                        if (!isNaN(t)) {
                            document.barang_masuk.total.value = t;
                        }



                    }

                    function stopCalc() {
                        clearInterval(interval);
                    }
                </script>