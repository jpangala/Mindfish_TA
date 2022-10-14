<?php

class Data_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_katalog');
        $this->load->model('model_penjualan');
        $this->load->model('model_dashboard');
    }
    public function index()
    {
        $this->session->unset_userdata('no_penjualan');
        $where = $_SESSION['id_user'];
        $where1              = array('customer.id' => $_SESSION['id_customer']);
        $data['user']   = $this->model_penjualan->select_wheree('*','customer',$where1)->result();
        $data['penjualan']   = $this->model_dashboard->pesanan_berlangsung()->result();
        $this->load->view('user/dashboard_user', $data);
    }
    public function error()
    {
        $this->load->view('user/user_error');
    }
    public function katalog()
    {
        $this->session->unset_userdata('no_penjualan');
        $where = $_SESSION['id_user'];
        $where1              = array('customer.id' => $_SESSION['id_customer']);
        $data['user']   = $this->model_penjualan->select_wheree('*','customer',$where1)->result();
        $data['ikan'] = $this->model_katalog->tampil_data_katalog()->result();
        $this->load->view('user/user', $data);
    }
    public function pembelian()
    {
        $this->session->unset_userdata('no_penjualan');
        $table = 'penjualan';
        $field1 = 'id';
        $id_pembeli          = $_SESSION['id_user'];
        // $where               = array('transaksi.id_customer' => $id_pembeli);
        // $idmax               = $this->model_penjualan->selectmax1($table, $field1,$where);
        $where               = array('transaksi.id_customer' => $_SESSION['id_customer']);
        $data['penjualan']   = $this->model_penjualan->tampil_data_pembelian($_SESSION['id_customer'])->result();
        $where1              = array('customer.id' => $_SESSION['id_customer']);
        $data['user']   = $this->model_penjualan->select_wheree('*','customer',$where1)->result();
        // $this->load->view('templates_user/sidebar_user', $data);
        $this->load->view('user/data_pembelian', $data);
    }
    public function detail_pembelian($no_transaksi)
    {
        $where               = array('transaksi.no_transaksi' => $no_transaksi);
        $data['penjualan']   = $this->model_penjualan->select_where1('transaksi',$where)->result();
        $data['info']   = $this->model_penjualan->select_where2('transaksi',$where)->result();
        $where1              = array('customer.id' => $_SESSION['id_customer']);
        $data['user']   = $this->model_penjualan->select_wheree('*','customer',$where1)->result();
        // $this->load->view('templates_user/sidebar_user', $data);
        $this->load->view('user/detail_pembelian', $data);
    }
    public function detail_product($id)
    {
        $data['product'] = $this->model_katalog->tampil_data_katalog1($id)->result();
        $this->load->view('user/detail_product_user', $data);
    }
    public function pembayaran()
    {
        if (empty($this->cart->contents()) ) {
            $this->session->set_flashdata('message', 'Keranjang Tidak Boleh Kosong');
            $this->session->set_flashdata('icon', 'info');
            redirect('user/data_user/katalog');
        }

        date_default_timezone_set('Asia/Jakarta');
        $table = "transaksi";
        $field = "no_transaksi";
        $ambil = $this->model_penjualan->selectmax($table, $field);
        $ambil1 = substr($ambil, 3 , -4);
        $ambil2 = substr($ambil, -4 , 4);

        $tanggal0 = date("md");
        $tanggal1 = date("d");
        $tanggal2 = date("m");
        $tanggal3 = 'IKN'.$tanggal2.''.$tanggal1.'0001';
        
        if ($ambil1 == $tanggal0) {
            if($ambil2 >= '0001'){
            //untuk ambil 4 digit terakhir no_penjualan dan diubah ke int
            $empat = (int) substr($ambil, -4 , 4);
            $empat++;
            //untuk mengubah int sebelumnya jadi str dan ditambah IKN
            $str = 'IKN';
            $ubah = sprintf('%04s',$empat);

            //untuk ambil tanggal
            $tanggal = date("md");

            //gabung
            $gabung                     = $str.''.$tanggal.''.$ubah;
            }
        }else {
            $gabung = 'IKN'.$tanggal2.''.$tanggal1.'0001';
        }

        $_SESSION['no_penjualan']   = $gabung;
        $no_penjualan               = $_SESSION['no_penjualan'];
        $id_pembeli                 = $_SESSION['id_user'];
        $nama_pembeli               = $_SESSION['username'];
        $total_harga                = $this->cart->total();

        
        $id_pembeli          = $_SESSION['id_user'];
        $where1              = array('customer.id_akun' => $_SESSION['id_user']);
        $id_customer         = $this->model_penjualan->select_wheree('id','customer',$where1)->result_array();
        $where               = array('transaksi.no_transaksi' => $_SESSION['no_penjualan'], 'id_customer' => $id_customer[0]['id']);
        $data['penjualan']   = $this->model_penjualan->select_where1($table,$where)->result();
        $data['pembayaran']  = $this->model_penjualan->tampil_data_bank()->result();
        $data['user']        = $this->model_penjualan->select_wheree('*','customer',$where1)->result();
        $test = date('Y-m-d h:i:s');
        var_dump($_SESSION['no_penjualan']);
        $this->load->view('user/pembayaran', $data);
        
    }
    public function tambah_keranjang($id)
    {
        $jumlah = $_POST['apa'];
        $quantity = (int)$jumlah;
        $ikan = $this->model_katalog->select_id($id);
        $data = array(
            'id'      => $ikan->id,
            'qty'     => $quantity,
            'price'   => $ikan->harga,
            'name'    => $ikan->nama_ikan,
        );

        $this->cart->insert($data);
        redirect('user/data_user/katalog');
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('user/data_user/katalog');
    }
    public function tambah_penjualan()
    {
        $tanggal_selesai            = date("Y-m-d H:i:s", strtotime('+1 days'));
        $id_pembayaran              = $_POST['bank'];
        $no_transaksi               = $_SESSION['no_penjualan'];
        $where1                     = array('customer.id_akun' => $_SESSION['id_user']);
        $id_customer                = $this->model_penjualan->select_wheree('id','customer',$where1)->result_array();
        foreach ($this->cart->contents() as $items){
        $data = array(
            'id_ikan'           => $items['id'],
            'jumlah'            => $items['qty'],
            'id_customer'       => $id_customer[0]['id'],
            'no_transaksi'      => $no_transaksi,
            'id_pembayaran'     => $id_pembayaran,
            'status'            => 'Menunggu Pembayaran'
        );

        $this->model_penjualan->tambah_penjualan($data, 'transaksi');
        }
        foreach ($this->cart->contents() as $items){
                $data = array(
                    'status'      => -$items['qty'],
                    'id_ikan'   => $items['id'],
                    'keterangan'  => 'Pembelian',
                    'tanggal'     => $tanggal
                );
                $where = array(
                    'id' => $items['id']
                );
                $this->model_katalog->tambah_katalog1($data, 'stok');
        }
        $this->cart->destroy();
        redirect("user/data_user/invoice");
    }
    public function invoice()
    {   
        $where               = array('transaksi.no_transaksi' => $_SESSION['no_penjualan']);
        $data['penjualan']   = $this->model_penjualan->select_where1('transaksi',$where)->result();
        $data['info']        = $this->model_penjualan->select_where2('transaksi',$where)->result();
        $where1              = array('customer.id_akun' => $_SESSION['id_user']);
        $data['user']   = $this->model_penjualan->select_wheree('*','customer',$where1)->result();
        // $this->load->view('templates_user/sidebar_user', $data);
        var_dump($_SESSION['no_penjualan']);
        $this->load->view('user/invoice', $data);
    }

    public function invoice_pembelian($no_transaksi)
    {   
        $where               = array('transaksi.no_transaksi' => $no_transaksi);
        $data['penjualan']   = $this->model_penjualan->select_where1('transaksi',$where)->result();
        $data['info']        = $this->model_penjualan->select_where2('transaksi',$where)->result();
        $where1              = array('customer.id_akun' => $_SESSION['id_user']);
        $data['user']   = $this->model_penjualan->select_wheree('*','customer',$where1)->result();
        // $this->load->view('templates_user/sidebar_user', $data);
        $this->load->view('user/invoice', $data);
    }

    public function print_invoice()
    {
        $table = 'penjualan';
        $field = 'id';
        $id_pembeli          = $_SESSION['id_user'];
        $idmax               = $this->model_penjualan->selectmax($table, $field);
        $where               = array('penjualan.id' => $idmax, 'penjualan.id_pembeli' => $id_pembeli);
        $data['penjualan']   = $this->model_penjualan->select_where1($table,$where)->result();
        $data['detail']      = $this->model_penjualan->tampil_data_detail1($idmax)->result();
        $this->load->view('user/invoice-print', $data);
    }
    public function hapus_pembelian()
    {
        $id_penjualan        =$this->input->post('id_penjualan_hapus');

            $where = array(
                'id' => $id_penjualan
            );
            $this->model_penjualan->hapus_data($where, 'penjualan');
            redirect('user/data_user/pembelian');
    }
    public function submit_pembayaran($no_transaksi)
    {
        $gambar     =$_FILES['gambar']['name'];
        if ($gambar =''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png';
            $table = 'penjualan';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal diUpload!";
            }else{
                $gambar=$this->upload->data('file_name');
            }
            $where = array(
                'no_transaksi' => $no_transaksi
            );

            $data = array(
                'bukti_pembayaran' => $gambar,
                'status' => 'Pembayaran Telah Dilakukan'
            );
            $this->model_penjualan->update_data_penjualan($where,$data, 'transaksi');
            redirect('user/data_user/pembelian');
        }
    }
    public function update_profile()
    {
        $nama           =$this->input->post('nama_customer');
        $no_telepon     =$this->input->post('nomor_telp');
        $alamat         =$this->input->post('alamat_customer');

            $data = array(
                'nama_customer' => $nama,
                'nomor_telp' => $no_telepon,
                'alamat_customer' => $alamat
            );
            $where = array(
                'id' => $_SESSION['id_user']
            );
            $this->model_penjualan->update_data_penjualan($where,$data,'customer');
            $this->session->set_flashdata('message', 'Profile Updated');
            $this->session->set_flashdata('icon', 'success');
            redirect('user/data_user');
    }

    public function update_password()
    {
        $oldpass        =$this->input->post('oldpass');
        $newpass        =$this->input->post('newpass');
        $confirmpass    =$this->input->post('confirmpass');

        $where = array('username'=>$_SESSION['username']);
        $data['user'] = $this->login->get_user($where, 'akun')->result();

        foreach ($data['user'] as $key => $value):
            $password_cek = $value->password;
        endforeach; 

        if(password_verify($oldpass, $password_cek))
        {
          if($newpass == $confirmpass) {
            $data = array(
                'password' => password_hash($newpass, PASSWORD_DEFAULT)
            );
            $where = array(
                'id' => $_SESSION['id_user']
            );
            $this->model_penjualan->update_data_penjualan($where,$data,'akun');
            $this->session->set_flashdata('message', 'Password Updated');
            $this->session->set_flashdata('icon', 'success');
            redirect('user/data_user');
          }
          else {
            $this->session->set_flashdata('message', 'Password baru anda tidak sesuai dengan yang anda input!');
            $this->session->set_flashdata('icon', 'warning');
            redirect('user/data_user');
          }
  
        }
        else{
            $this->session->set_flashdata('message', 'Password lama anda tidak sesuai dengan yang anda input!');
            $this->session->set_flashdata('icon', 'warning');
            redirect('user/data_user');
        }
    }
}
