<?php

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('login');
        $this->load->library('form_validation');

    }

    public function index()
    {
        $data['pesanan'] = $this->model_pesanan->tampil_data()->result();
        $where = array('id' =>$_SESSION["id_user"]);
        $data['user'] = $this->model_pesanan->detail_pesanan($where, 'user_account')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function masuk()
    {
        $this->load->view('templates_landing/header_login');
        $this->load->view('login');
        $this->load->view('templates_landing/footer_login');
    }

    public function daftar()
    {
        $this->load->view('templates_landing/header_login');
        $this->load->view('register');
        $this->load->view('templates_landing/footer_login');

    }

    public function detail($id)
    {
        $where = array('id' =>$id);
        $data['pesanan'] = $this->model_pesanan->detail_pesanan($where, 'pesanan')->result();
        $data['ambil'] = $this->model_pesanan->detail_pesanan($where, 'tampilan_pesanan')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail', $data);
        $this->load->view('templates/footer');
    }

    public function ambil(){
        $pesanan_id   =$this->input->post('id');
        $ikan_id      =$this->input->post('ikan_id');
        $status       =$this->input->post('status');
        $jumlah       =$this->input->post('jumlah');
        $user_id      =$_SESSION['id_user'];


            $data = array(
                'pesanan_id' => $pesanan_id,
                'ikan_id' => $ikan_id,
                'status_task' => $status,
                'jumlah' => $jumlah,
                'user_account_id' => $user_id,
            );

        $query = $this->db->query("SELECT request FROM pesanan WHERE id = $pesanan_id;");

            $data1 = array(
                'user_account_id' => $user_id,
                'pesanan_id' => $pesanan_id,
                'hasil' => $jumlah,
                'status' => "test"
            );

        $this->model_pesanan->tambah_barang($data, 'task');
        $this->model_pesanan->pengurangan($pesanan_id, $jumlah);
        redirect('dashboard/index');
    }

    public function logout() {
      session_destroy();
      redirect('landing_page/index');
    }


    public function login()
    {

      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $where = array('username'=>$username);
      $data['user'] = $this->login->get_user($where, 'user_account')->result();
      foreach ($data['user'] as $key => $value):
			$username_cek = $value->username;
            $password_cek = $value->password;
            $id = $value->id;
            $tipe_user = $value->tipe_user;
            $nama = $value->nama_user;
            $alamat = $value->alamat_user;
      endforeach; 
      if(!empty($username_cek)) {


      if($username_cek == $username && password_verify($password, $password_cek))
      {
        $_SESSION["tipe_user"] = $tipe_user;
        if($tipe_user == 2) {
          $_SESSION["id_user"] = $id;
          $_SESSION["username"] = $username;
          $_SESSION["nama_user"] = $nama;
          $_SESSION["alamat_user"] = $alamat;
          $this->session->set_flashdata('message', 'Selamat datang '. $_SESSION["nama_user"].'');
          $this->session->set_flashdata('icon', 'success');
          redirect('user/data_user');
        }
        else {
          $_SESSION["id_user"] = $id;
          $_SESSION["username"] = $username;
          $this->session->set_flashdata('message', 'Selamat datang Admin');
          $this->session->set_flashdata('icon', 'success');
          redirect('admin/dashboard_admin');
        }

      }
    
    		else {
                $this->session->set_flashdata('message', 'Username atau Password yang anda ketik salah!');
                $this->session->set_flashdata('icon', 'error');
                redirect('Dashboard/masuk');
            }
     }
     else {
        $this->session->set_flashdata('message', 'Username atau Password yang anda ketik salah!');
        $this->session->set_flashdata('icon', 'error');
        redirect('Dashboard/masuk');
    }

    }

    public function register() {

        $this->form_validation->set_rules('firstname', 'First Name', 'required|trim|alpha', [
            'required'      => 'Kolom berikut harus diisi.',
            'alpha'      => 'Nama depan hanya dapat menggunakan huruf.'
        ]);
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim|alpha', [
            'required'      => 'Kolom berikut harus diisi.',
            'alpha'      => 'Nama belakang hanya dapat menggunakan huruf.'
        ]);
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required|trim|numeric|min_length[11]|max_length[13]', [
            'required'      => 'Kolom berikut harus diisi.',
            'numeric'      => 'Nomor telepon hanya dapat menggunakan angka.',
            'min_length'      => 'Nomor telepon terlalu pendek.',
            'max_length'      => 'Nomor telepon terlalu panjang.'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|max_length[200]', [
            'required'      => 'Kolom berikut harus diisi.',
            'max_length'      => 'Alamat terlalu panjang.'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[20]|alpha_numeric|is_unique[user_account.username]', [
                'is_unique'      => 'Username telah digunakan.',
                'required'      => 'Kolom berikut harus diisi.',
                'min_length'      => 'Username terlalu pendek.',
                'max_length'      => 'Username terlalu panjang.',
                'alpha_numeric'      => 'Username hanya dapat menggunakan huruf dan angka.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[20]', [
            'required'      => 'Kolom berikut harus diisi.',
            'min_length'      => 'Password terlalu pendek.',
            'max_length'      => 'Password terlalu panjang.'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates_landing/header_login');
            $this->load->view('register');
            $this->load->view('templates_landing/footer_login');
        }
        else{
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $no_telepon = $this->input->post('no_telepon');
            $alamat = $this->input->post('alamat');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama = $firstname .' '. $lastname;


            $data = array(
                'nama_user'      => $nama,
                'username'       => $username,
                'password'       => password_hash($password, PASSWORD_DEFAULT),
                'alamat_user'    => $alamat,
                'tipe_user'      => 2,
                'no_telepon'     => $no_telepon
            );
            $this->login->daftar($data,'user_account');
            $this->session->set_flashdata('message', 'Registrasi akun berhasil');
            $this->session->set_flashdata('icon', 'success');
            redirect('Dashboard/masuk');
        }
      }


    public function task() {

        $where = array(
            'user_account_id' =>$_SESSION['id_user'],
            'status_task' =>"diambil"
        );
        $data['task'] = $this->model_pesanan->tampil_data_task($where, 'tampilan_task')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('task', $data);
        $this->load->view('templates/footer');
      }

    public function ready($task_id){
            $data = array(
                    'status_task' => "ready"
                );
            $where = array(
                'id' => $task_id
            );
        $this->model_pesanan->update_data($where,$data, 'task');
        $data['task'] = $this->model_pesanan->tampil_data_task($where, 'task')->result();
        foreach ($data['task'] as $key => $value):
  						$pesanan_id = $value->pesanan_id;
              $jumlah = $value->jumlah;
        endforeach;
        $this->model_pesanan->transfer($pesanan_id, $jumlah);
        
        redirect('dashboard/index');
    }
}
