<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    //kodingan demos
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Pdf');
    }

    //kodingan profil
    public function index()
    {

        $data['title'] = 'My Profile';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function halaman_awal()
    {

        $data['title'] = 'Dashboard';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['total_b'] = $this->model_barang->hitungJumlahBarang();
        $data['total_s'] = $this->model_barang->hitungJumlahSuplier();
        $data['total_bm'] = $this->model_barang->hitungJumlahBM();
        $data['total_bk'] = $this->model_barang->hitungJumlahBK();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/halaman_awal', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update_user()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
           Gambar tidak sesuai !!
        </div>'
            );
            redirect('admin/member');
        } else {
            $upload_data = $this->upload->data();

            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => $upload_data['file_name'],
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'is_active' => 1,
                'date_create' => time()
            ];
            $this->db->where(['id' => htmlspecialchars($this->input->post('id', true))]);
            $this->db->update('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
           Congratulation! your account has been created. Please Login !
        </div>'
            );
            $data = [
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'role_id'   => htmlspecialchars($this->input->post('role_id', true))
            ];

            if ($data['role_id'] == 1) {
                redirect('admin');
            } else {
                redirect('admin/member');
            }
        }
    }


    public function update()
    {

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('imageupload_form', $error);
        } else {

            $upload_data = $this->upload->data();
            $data = [

                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => $upload_data['file_name'],
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'is_active' => 1,
                'date_create' => time()


            ];

            $this->db->where(['id' => htmlspecialchars($this->input->post('id', true))]);
            $this->db->update('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                    Congratulation! your account has been created. Please Login !
                </div>'
            );
            $data = [
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'role_id'   => htmlspecialchars($this->input->post('role_id', true))
            ];
            $this->session->set_userdata($data);
            if ($data['role_id'] == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }
    }

    //kodingan tabel jenis
    public function jenis_v()
    {
        $data['title'] = 'Jenis Barang';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jenis'] = $this->model_barang->tampil_jenis()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/jenis_v', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_jenis()
    {

        $jenis_barang       = $this->input->post('jenis_barang');

        $data = array(

            'jenis_barang'    => $jenis_barang,

        );

        $this->model_barang->tambah_jenis($data, 'tb_jenis_barang');
        $this->session->set_flashdata(
            'tambah_jenis',
            '<div class="alert alert-success" role="alert">
                 Data Ditambah !
              </div>'
        );
        redirect('user/jenis_v');
    }

    public function edit_jenis($id)
    {
        $data['title'] = 'Data Jenis';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['jenis'] = $this->model_barang->edit_jenis($where, 'tb_jenis_barang')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit_jenis', $data);
    }

    public function update_jenis()
    {
        $id                  = $this->input->post('id');
        $jenis_barang       = $this->input->post('jenis_barang');

        $data = array(

            'jenis_barang'      => $jenis_barang,

        );

        // var_dump($data);
        // die;
        $where = array('id=' => $id);
        $this->model_barang->update_jenis($where, $data, 'tb_jenis_barang');

        $this->session->set_flashdata(
            'edit_jenis',
            '<div class="alert alert-success" role="alert">
           Data berhasil Di Edit !
        </div>'
        );
        redirect('user/jenis_v');
    }

    public function hapus_jenis($id)
    {
        $where = array('id' => $id);
        $this->model_barang->hapus_jenis($where, 'tb_jenis_barang');
        $this->session->set_flashdata(
            'hapus_suplier',
            '<div class="alert alert-danger" role="alert">
             Data berhasil Di Hapus !
          </div>'
        );
        redirect('user/jenis_v');
    }

    //kodingan suplier
    public function suplier_v()
    {
        $data['title'] = 'Data Suplier';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['suplier'] = $this->model_barang->tampil_suplier()->result();
        $data['id'] = $this->model_barang->tampil_id_suplier();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/suplier_v', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_suplier()
    {
        $kode_suplier       = $this->input->post('kode_suplier');
        $nama_suplier       = $this->input->post('nama_suplier');
        $alamat           = $this->input->post('alamat');
        $no_tlp          = $this->input->post('no_tlp');

        $data = array(
            'kode_suplier'   => $kode_suplier,
            'nama_suplier'    => $nama_suplier,
            'alamat'   => $alamat,
            'no_tlp'  => $no_tlp,

        );

        $this->model_barang->tambah_suplier($data, 'tb_suplier');
        $this->session->set_flashdata(
            'tambah_suplier',
            '<div class="alert alert-success" role="alert">
                 Data Ditambah !
              </div>'
        );
        redirect('user/suplier_v');
    }

    public function edit_suplier($id_suplier)
    {
        $data['title'] = 'Data Suplier';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_suplier' => $id_suplier);
        $data['suplier'] = $this->model_barang->edit_suplier($where, 'tb_suplier')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit_suplier', $data);
    }

    public function update_suplier()
    {
        $id_suplier         = $this->input->post('id_suplier');
        //$kode_suplier       = $this->input->post('kode_suplier');
        $nama_suplier       = $this->input->post('nama_suplier');
        $alamat             = $this->input->post('alamat');
        $no_tlp             = $this->input->post('no_tlp');

        $data = array(
            //'kode_suplier'      => $kode_suplier,
            'nama_suplier'      => $nama_suplier,
            'alamat'            => $alamat,
            'no_tlp'            => $no_tlp

        );

        // var_dump($data);
        // die;
        $where = array('id_suplier' => $id_suplier);
        $this->model_barang->update_suplier($where, $data, 'tb_suplier');

        $this->session->set_flashdata(
            'edit_suplier',
            '<div class="alert alert-success" role="alert">
           Data berhasil Di Edit !
        </div>'
        );
        redirect('user/suplier_v');
    }

    public function hapus_suplier($id_suplier)
    {
        $where = array('id_suplier' => $id_suplier);
        $this->model_barang->hapus_suplier($where, 'tb_suplier');
        $this->session->set_flashdata(
            'hapus_suplier',
            '<div class="alert alert-danger" role="alert">
             Data berhasil Di Hapus !
          </div>'
        );
        redirect('user/suplier_v');
    }

    function cetakpdf_s()
    {

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'Daftar Suplier', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 6, 'Kode Suplier', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Nama Suplier', 1, 0, 'C');
        $pdf->Cell(65, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(70, 6, 'Nomer Telepon', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $suplier = $this->db->get('tb_suplier')->result();
        $no = 0;
        foreach ($suplier as $data) {
            $no++;
            $pdf->Cell(30, 6, $data->kode_suplier, 1, 0, 'C');
            $pdf->Cell(90, 6, $data->nama_suplier, 1, 0, 'C');
            $pdf->Cell(65, 6, $data->alamat, 1, 0, 'C');
            $pdf->Cell(70, 6, $data->no_tlp, 1, 1, 'C');
        }
        $pdf->Output();
    }

    //kodingan tabel satuan
    public function satuan_v()
    {
        $data['title'] = 'Satuan Barang';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['satuan'] = $this->model_barang->tampil_satuan()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/satuan_v', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_satuan()
    {

        $satuan_barang       = $this->input->post('satuan_barang');

        $data = array(

            'satuan_barang'    => $satuan_barang,

        );

        $this->model_barang->tambah_satuan($data, 'tb_satuan_barang');
        $this->session->set_flashdata(
            'tambah_satuan',
            '<div class="alert alert-success" role="alert">
                 Data Ditambah !
              </div>'
        );
        redirect('user/satuan_v');
    }

    public function edit_satuan($id)
    {
        $data['title'] = 'Data Satuan';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['satuan'] = $this->model_barang->edit_satuan($where, 'tb_satuan_barang')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit_satuan', $data);
    }

    public function update_satuan()
    {
        $id         = $this->input->post('id');
        $satuan_barang       = $this->input->post('satuan_barang');

        $data = array(

            'satuan_barang'      => $satuan_barang,

        );

        // var_dump($data);
        // die;
        $where = array('id=' => $id);
        $this->model_barang->update_satuan($where, $data, 'tb_satuan_barang');

        $this->session->set_flashdata(
            'edit_satuan',
            '<div class="alert alert-success" role="alert">
           Data berhasil Di Edit !
        </div>'
        );
        redirect('user/satuan_v');
    }

    public function hapus_satuan($id)
    {
        $where = array('id' => $id);
        $this->model_barang->hapus_satuan($where, 'tb_satuan_barang');
        $this->session->set_flashdata(
            'hapus_suplier',
            '<div class="alert alert-danger" role="alert">
             Data berhasil Di Hapus !
          </div>'
        );
        redirect('user/satuan_v');
    }


    //Kodingan Barang
    public function barang_v()
    {
        $data['title'] = 'Barang';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['barang'] = $this->model_barang->tampil_brg()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/barang_v', $data);
        $this->load->view('templates/footer');
    }

    public function detail_barang()
    {
        $data['title'] = 'Detail Barang';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['barang'] = $this->db->get('barang')->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail_barang', $data);
    }

    public function barang_t()
    {
        $data['title'] = 'Add Data';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jenis'] = $this->model_barang->tampil_id_jenis();
        $data['satuan'] = $this->model_barang->tampil_id_satuan();

        $data['id'] = $this->model_barang->tampil_id_barang();
        // $data['barang'] = $this->model_barang->tampil_id_barang();
        // $data['id'] = $this->model_barang->tampil_id_bm();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/barang_t', $data);
        $this->load->view('templates/footer');
    }

    public function add_barang()
    {

        $kode_barang         = $this->input->post('kode_barang');
        $nama_barang         = $this->input->post('nama_barang');
        $satuan_barang       = $this->input->post('satuan_barang');
        $jenis_barang         = $this->input->post('jenis_barang');
        $stok         = $this->input->post('stok');


        $data = array(


            'kode_barang'         => $kode_barang,
            'nama_barang'         => $nama_barang,
            'stok'                => $stok,
            'jenis_barang'        => $jenis_barang,
            'satuan'              => $satuan_barang



        );

        $this->model_barang->tambah_barang($data, 'barang');
        $this->session->set_flashdata(
            'tambah_barang_success', // Unique key for success message
            '<div class="alert alert-success" role="alert">
                 Data Ditambah !
              </div>'
        );
        redirect('user/barang_v');
    }

    public function hapus_b($id_barang)
    {

        $where = array('id_barang' => $id_barang);
        $this->model_barang->hapus_barang($where, 'barang');
        $this->session->set_flashdata(
            'hapus_barang_success', // Unique key for success message
            '<div class="alert alert-danger" role="alert">
                 Data berhasil Di Hapus !
              </div>'
        );
        redirect('user/barang_v');
    }

    public function edit_b($id_barang)
    {
        $data['title'] = 'Edit Barang';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['barang'] = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/barang_e', $data);
        //$this->load->view('templates/footer');
    }

    public function update_b()
    {

        $id_barang         = $this->input->post('id_barang');
        $nama_barang       = $this->input->post('nama_barang');

        $data = array(

            'nama_barang'      => $nama_barang,

        );

        // var_dump($data);
        // die;
        $where = array('id_barang' => $id_barang);
        $this->model_barang->update_barang($where, $data, 'barang');

        $this->session->set_flashdata(
            'edit_barang',
            '<div class="alert alert-success" role="alert">
           Data berhasil Di Edit !
        </div>'
        );


        redirect('user/barang_v');
    }


    //kodingan PDF
    function cetakpdf()
    {

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'DAFTAR Barang', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 6, 'Id Barang', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(65, 6, 'Stok', 1, 0, 'C');
        $pdf->Cell(70, 6, 'Harga', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $barang = $this->db->get('barang')->result();
        $no = 0;
        foreach ($barang as $data) {
            $no++;
            $pdf->Cell(30, 6, $no, 1, 0, 'C');
            $pdf->Cell(90, 6, $data->nama_barang, 1, 0);
            $pdf->Cell(65, 6, $data->stok, 1, 0);
            $pdf->Cell(70, 6, $data->harga, 1, 1);
        }
        $pdf->Output();
    }

    //barang Keluar

    public function barang_keluar()
    {
        $data['title'] = 'Barang Keluar';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['barang'] = $this->model_barang->tampil_id_barang();
        $data['id'] = $this->model_barang->tampil_id_bk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/barang_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function ambil_data_barang_bk()
    {
        header('Content-Type:application/json');

        $id_barang = $this->input->post('id_barang');

        $where = array('id_barang' => $id_barang);
        $barang = $this->model_barang->tampil_data_brg($where);

        echo json_encode([
            'satuan' => $barang['satuan'],
            'stok' => $barang['stok'],
            'kode_barang' => $barang['kode_barang'],
            'nama_barang' => $barang['nama_barang'],
            'id_barang' => $barang['id_barang'],
        ]);
    }

    public function tambah_bk()
    {

        $id_transaksi         = $this->input->post('id_transaksi');
        $tanggal              = $this->input->post('tanggal');
        $tujuan             = $this->input->post('tujuan');
        $jumlah               = $this->input->post('jumlah');
        $id_barang = $this->input->post('suplier');
        $kode_barang          = $this->model_barang->get_kode_by_id_barang($id_barang);
        $satuan               = $this->model_barang->get_satuan_by_id_barang($id_barang);
        $nama_barang = $this->model_barang->get_nama_by_id_barang($id_barang);
        $data = array(
            'id_transaksi'        => $id_transaksi,
            'tanggal_keluar'      => $tanggal,
            'kode_barang'         => $kode_barang[0]->kode_barang,
            'nama_barang'         => $nama_barang[0]->nama_barang,
            'tujuan'              => $tujuan,
            'jumlah_keluar'       => $jumlah,
            'satuan'              => $satuan[0]->satuan
        );
        $this->model_barang->tambah_barang($data, 'barang_keluar');
        $this->session->set_flashdata(
            'tambah_bk',
            '<div class="alert alert-success" role="alert">
                 Data Ditambah !
              </div>'
        );
        // Assuming you are retrieving the product ID
        $total = $this->input->post('jumlah');

        // Retrieve the current stok for the product with the given ID
        $current_stok = $this->model_barang->get_current_stok($id_barang); // Implement this function in your model
        $new_stok = $current_stok - $total;
        // Check if the product exists
        if ($new_stok >= 5) {
            // Update the product's stok in the database
            $data = array('stok' => $new_stok); // Assuming 'stok' is the column in your 'barang' table for stock quantity
            $where = array('id_barang' => $id_barang);
            $this->model_barang->update_barang($where, $data, 'barang');

            redirect('user/tampil_bk');
        } else {
            redirect('user/barang_keluar');
        }
    }

    public function tampil_bk()
    {
        $data['title'] = 'Barang Keluar';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['bk'] = $this->model_barang->tampil_bk()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tampil_bk', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_bk($id)
    {

        $where = array('id' => $id);
        $this->model_barang->hapus_bm($where, 'barang_keluar');
        $this->session->set_flashdata(
            'hapus_bk',
            '<div class="alert alert-danger" role="alert">
             Data berhasil Di Hapus !
          </div>'
        );
        redirect('user/tampil_bk');
    }

    //Barang Masuk

    public function barang_masuk()
    {
        $data['title'] = 'Barang Masuk';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['barang'] = $this->model_barang->tampil_id_barang();
        $data['id'] = $this->model_barang->tampil_id_bm();


        $data['suplier'] = $this->model_barang->tampil_id_suplier();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/barang_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function ambil_data_barang()
    {
        header('Content-Type:application/json');

        $id_barang = $this->input->post('id_barang');

        $where = array('id_barang' => $id_barang);
        $barang = $this->model_barang->tampil_data_brg($where);

        //$update = $this->model_product->update_cart($where, $data, 'cart');

        echo json_encode([
            'satuan' => $barang['satuan'],
            'stok' => $barang['stok'],
            'kode_barang' => $barang['kode_barang'],
            'nama_barang' => $barang['nama_barang'],
            'id_barang' => $barang['id_barang'],



        ]);
    }

    public function tambah_bm()
    {
        $id_transaksi         = $this->input->post('id_transaksi');
        $tanggal              = $this->input->post('tanggal');
        $pengirim             = $this->input->post('suplier');
        $jumlah               = $this->input->post('jumlah');
        $id_barang = $this->input->post('supplier');
        $kode_barang          = $this->model_barang->get_kode_by_id_barang($id_barang);
        $satuan               = $this->model_barang->get_satuan_by_id_barang($id_barang);
        $nama_barang = $this->model_barang->get_nama_by_id_barang($id_barang);
        $data = array(
            'id_transaksi'        => $id_transaksi,
            'tanggal'             => $tanggal,
            'kode_barang'         => $kode_barang[0]->kode_barang,
            'nama_barang'         => $nama_barang[0]->nama_barang,
            'pengirim'            => $pengirim,
            'jumlah'              => $jumlah,
            'satuan'              => $satuan[0]->satuan
        );
        $this->model_barang->tambah_barang($data, 'barang_masuk');
        $this->session->set_flashdata(
            'tambah_bm',
            '<div class="alert alert-success" role="alert">
                 Data Ditambah !
              </div>'
        );
        $total = $this->input->post('jumlah');

        // Retrieve the current stok for the product with the given ID
        $current_stok = $this->model_barang->get_current_stok($id_barang); // Implement this function in your model
        $new_stok = $current_stok + $total;
        // Check if the product exists
        // Update the product's stok in the database
        $data = array('stok' => $new_stok); // Assuming 'stok' is the column in your 'barang' table for stock quantity
        $where = array('id_barang' => $id_barang);
        $this->model_barang->update_barang($where, $data, 'barang');

        redirect('user/tampil_bm');
    }

    public function tampil_bm()
    {
        $data['title'] = 'Barang Masuk';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['bm'] = $this->model_barang->tampil_bm()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tampil_bm', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_bm($id)
    {

        $where = array('id' => $id);
        $this->model_barang->hapus_bm($where, 'barang_masuk');
        $this->session->set_flashdata(
            'hapus_bm',
            '<div class="alert alert-danger" role="alert">
             Data berhasil Di Hapus !
          </div>'
        );
        redirect('user/tampil_bm');
    }

    function cetakpdf_bm()
    {

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('P', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'Daftar Barang Masuk', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 6, 'Id Transaksi', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Tanggal Masuk', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Kode Barang', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Suplier', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Satuan', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $bm = $this->db->get('barang_masuk')->result();
        $no = 0;
        foreach ($bm as $data) {
            $no++;
            $pdf->Cell(30, 6, $data->id_transaksi, 1, 0, 'C');
            $pdf->Cell(30, 6, $data->tanggal, 1, 0, 'C');
            $pdf->Cell(30, 6, $data->kode_barang, 1, 0, 'C');
            $pdf->Cell(30, 6, $data->nama_barang, 1, 0, 'C');
            $pdf->Cell(30, 6, $data->pengirim, 1, 0, 'C');
            $pdf->Cell(20, 6, $data->jumlah, 1, 0, 'C');
            $pdf->Cell(30, 6, $data->satuan, 1, 1, 'C');
        }
        $pdf->Output();
    }

    function cetakpdf_bk()
    {

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('P', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'Daftar Barang Masuk', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);


        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 6, 'Id Transaksi', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Tanggal keluar', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Kode Barang', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Tujuan', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Satuan', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $bk = $this->db->get('barang_keluar')->result();
        $no = 0;
        foreach ($bk as $data) {
            $no++;
            $pdf->Cell(30, 6, $data->id_transaksi, 1, 0, 'C');
            $pdf->Cell(30, 6, $data->tanggal_keluar, 1, 0, 'C');
            $pdf->Cell(30, 6, $data->kode_barang, 1, 0, 'C');
            $pdf->Cell(30, 6, $data->nama_barang, 1, 0, 'C');
            $pdf->Cell(30, 6, $data->tujuan, 1, 0, 'C');
            $pdf->Cell(20, 6, $data->jumlah_keluar, 1, 0, 'C');
            $pdf->Cell(30, 6, $data->satuan, 1, 1, 'C');
        }
        $pdf->Output();
    }
}
