<?php

class Model_barang extends CI_Model
{
    //kodingan ambil id
    public function tampil_id_satuan()
    {
        $query = $this->db->query("SELECT * FROM tb_satuan_barang ORDER BY id ASC");

        return $query->result();
    }
    public function tampil_id_jenis()
    {
        $query = $this->db->query("SELECT * FROM tb_jenis_barang ORDER BY id ASC");

        return $query->result();
    }
    public function tampil_id_suplier()
    {
        $query = $this->db->query("SELECT * FROM tb_suplier ORDER BY id_suplier ASC");

        return $query->result();
    }
    public function tampil_id_barang()
    {
        $query = $this->db->query("SELECT * FROM barang ORDER BY id_barang ASC");

        return $query->result();
    }
    public function tampil_id_bm()
    {
        $query = $this->db->query("SELECT * FROM barang_masuk ORDER BY id DESC LIMIT 1 ");

        return $query->result();
    }
    public function tampil_id_barang1()
    {
        $query = $this->db->query("SELECT * FROM barang ORDER BY id_barang DESC LIMIT 1 ");

        return $query->result();
    }
    public function tampil_id_bk()
    {
        $query = $this->db->query("SELECT * FROM barang_keluar ORDER BY id DESC LIMIT 1 ");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return False;
        }
    }
    public function tampil_id_s()
    {
        $query = $this->db->query("SELECT * FROM tb_suplier ORDER BY id_suplier DESC LIMIT 1 ");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return False;
        }
    }

    //kodingan barang
    public function tampil_brg()
    {
        return $this->db->get('barang');
    }
    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function hapus_barang($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_barang($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function get_current_stok($id_barang)
    {
        $this->db->select('stok'); // Assuming 'stok' is the column for stok quantity
        $this->db->where('id_barang', $id_barang);
        $query = $this->db->get('barang');
        // Check if a result exists
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->stok;
        } else {
            return "Database Error: " . $this->db->last_query(); // Return false if the product with the given ID is not found
        }
    }

    // kodingan jenis
    public function tampil_jenis()
    {
        return $this->db->get('tb_jenis_barang');
    }
    public function tambah_jenis($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_jenis($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_jenis($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_jenis($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    //kodingan satuan
    public function tampil_satuan()
    {
        return $this->db->get('tb_satuan_barang');
    }
    public function tambah_satuan($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_satuan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_satuan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_satuan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function get_satuan_by_id_barang($id_barang)
    {
        $this->db->select('satuan'); // Select the column you want to retrieve
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('barang')->result();
    }
    public function get_nama_by_id_barang($id_barang)
    {
        $this->db->select('nama_barang'); // Select the column you want to retrieve
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('barang')->result();
    }
    public function get_kode_by_id_barang($id_barang)
    {
        $this->db->select('kode_barang'); // Select the column you want to retrieve
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('barang')->result();
    }

    //kodingan suplier
    public function tampil_suplier()
    {
        return $this->db->get('tb_suplier');
    }
    public function tambah_suplier($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_suplier($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_suplier($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_suplier($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //transaksi
    public function tambah_bm($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function tambah_bk($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function tampil_bm()
    {
        return $this->db->get('barang_masuk');
    }
    public function tampil_bk()
    {
        return $this->db->get('barang_keluar');
    }
    public function hapus_bm($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function tampil_data_brg($where)
    {
        $this->db->where($where);
        $query = $this->db->get('barang');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function hitungJumlahBarang()
    {
        $query = $this->db->get('barang');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function hitungJumlahSuplier()
    {
        $query = $this->db->get('tb_suplier');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function hitungJumlahBM()
    {
        $this->db->select_sum('jumlah');
        $query = $this->db->get('barang_masuk');
        if ($query->num_rows() > 0) {
            return $query->row()->jumlah;
        } else {
            return 0;
        }
    }

    public function hitungJumlahBK()
    {
        $this->db->select_sum('jumlah_keluar');
        $query = $this->db->get('barang_keluar');
        if ($query->num_rows() > 0) {
            return $query->row()->jumlah_keluar;
        } else {
            return 0;
        }
    }
}
