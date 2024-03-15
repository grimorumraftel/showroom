<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    //kodingan Demos
    public function index()
    {

        $data['title'] = 'My Profile';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index_a', $data);
        $this->load->view('templates/footer');
    }

    public function member()
    {
        $data['title'] = 'Member';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['member'] = $this->db->get('user')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {

        $this->db->where(['id' => $id]);

        $this->db->delete('user');
        redirect('admin/member');
    }

    public function view()
    {
        $data['title'] = 'Data Member';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['member'] = $this->db->get('user')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/view', $data);
        $this->load->view('templates/footer');
    }

    public function edit_a($id)
    {
        $data['title'] = 'Edit Profile';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['member'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_a', $data);
        // $this->load->view('templates/footer');
    }

    public function update_a()
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

    public function tambah()
    {
        $data['title'] = 'Add Data';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function add()
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
            $this->db->insert('user', $data);
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
}
