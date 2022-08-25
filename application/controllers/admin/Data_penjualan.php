<?php

class data_penjualan extends CI_Controller{
    public function __construct()
    {   
        parent::__construct();
        $this->load->library('session');
        $this->load->model('model_katalog');
        $this->load->model('model_penjualan');
    }
    public function index()
    {   
        $data['penjualan']      = $this->model_penjualan->tampil_data_penjualan()->result();
        $data['katalog_asli']   = $this->model_penjualan->tampil_data_katalog()->result();
        $data['ikan']           = $this->model_katalog->tampil_data_katalog()->result();
        $this->load->view('admin/data_penjualan', $data);
        
    }
    public function detail($id)
    {   
        $where               = array('penjualan.id' => $id);
        $data['penjualan']   = $this->model_penjualan->select_where1('penjualan',$where)->result();
        $data['detail']      = $this->model_penjualan->tampil_data_detail($id)->result();
        $data['id'] = $id;
        $this->load->view('admin/detail_penjualan', $data);
     }
     public function detail_penjualan($id)
     {   
         $table = 'penjualan';
         $field = 'id';
         $where = $this->model_penjualan->selectmax($table, $field);
         $data['detail']         = $this->model_penjualan->tampil_data_detail($id)->result();
         $data['penjualan']      = $this->model_penjualan->select_where($table, $id)->result();
         $data['ikan']           = $this->model_penjualan->tampil_data_ikan()->result();
         $data['id'] = $id;
         $this->load->view('admin/data_detail_penjualan', $data);
      }
    public function tambah_penjualan()
    {   
        $id =  $this->uri->segment(4);
        $table        = "penjualan";
        $field        = "id";
        $jumlah       = $this->input->post('jumlah');
        $id_ikan      = $this->input->post('nama_ikan');
        $id_penjualan = $this->model_penjualan->selectmax($table, $field);
        $data['katalog1'] = $this->db->get_where('ikan', array('id =' => $id_ikan))->result_array();

        

        
        for( $x=0;$x< count($data['katalog1']);$x++) {
           
            $data['katalog1'][$x]['jumlah'] = $jumlah;
            $data['katalog1'][$x]['sub_total'] = $jumlah*$data['katalog1'][$x]['harga'];
            $data['katalog2'] = array(
                'id_ikan'      => $this->input->post('nama_ikan'),
                'id_penjualan' => $id,
                'jumlah'       => $jumlah,
                'harga_jual'        => $data['katalog1'][$x]['harga'],
                'subtotal_harga'    => $data['katalog1'][$x]['sub_total'],

            );
            $this->model_penjualan->tambah_penjualan($data['katalog2'], 'detail_penjualan');
            redirect('admin/data_penjualan/detail_penjualan/'.$id);
        }
    }
    public function no_penjualan()//untuk generate no_penjulan dan input nama_pembeli
    {   
        $table = "penjualan";
        $field = "no_penjualan";
        $ambil = $this->model_penjualan->selectmax($table, $field);
        
        //untuk ambil 4 digit terakhir no_penjualan dan diubah ke int
        $empat = (int) substr($ambil, -4 , 4);
        $empat++;
        //untuk mengubah int sebelumnya jadi str dan ditambah IKN
        $str = 'IKN';
        $ubah = sprintf('%04s',$empat);
        
        //untuk ambil tanggal
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("md");

        //gabung
        $no_penjualan         = $str.''.$tanggal.''.$ubah;
        $nama_pembeli         =$this->input->post('nama_pembeli');
        $tanggal_dibuat       =$this->input->post('tanggal_dibuat');

            $data = array(
                'nama_pembeli' => $nama_pembeli,
                'no_penjualan' => $no_penjualan,
                'tanggal_dibuat' => $tanggal_dibuat,
                'status'       => 'Proses'
            );
            $this->model_penjualan->tambah_penjualan($data, 'penjualan');
            $field = 'id';
            $id_penjualan = $this->model_penjualan->selectmax($table, $field);
            redirect('admin/data_penjualan/detail_penjualan/'.$id_penjualan);
    }
    public function hapus_ikan($id)
    {
        $id_detail  = $this->input->post('id_detail');
        $id         = $this->uri->segment(4);


            $where = array(
                'id' => $id_detail
            );
            $this->model_penjualan->hapus_data($where, 'detail_penjualan');
            // $this->session->set_flashdata('message', 'Data ikan berhasil dihapus');
            // $this->session->set_flashdata('icon', 'success');
            redirect('admin/data_penjualan/detail_penjualan/'.$id);
    }
    public function save()
    {
        $id = $this->uri->segment(4);
        $total = $_SESSION["total"];
        var_dump($total);

            $data = array(
                'total_harga' => $total
            );
            $this->model_penjualan->update_data($data, 'penjualan', $id);
            redirect('admin/data_penjualan/');
    }
    public function edit_penjualan()
    {
        $id_penjualan      =$this->input->post('id_penjualan');
        $nama_pembeli      =$this->input->post('nama_pembeli');
        $tanggal_dibuat    =$this->input->post('tanggal_dibuat');
        $status            =$this->input->post('status');

            $data = array(
                'nama_pembeli' => $nama_pembeli,
                'tanggal_dibuat' => $tanggal_dibuat,
                'status' => $status
            );
            $where = array(
                'id' => $id_penjualan
            );
            $this->model_penjualan->update_data_penjualan($where,$data, 'penjualan');
            $this->session->set_flashdata('message', 'Data penjualan berhasil diubah');
            $this->session->set_flashdata('icon', 'success');
            redirect('admin/data_penjualan');
    }
    public function hapus_penjualan($id)
    {
            $where = array(
                'id' => $id
            );

            $this->model_penjualan->hapus_data($where, 'penjualan');
            $this->session->set_flashdata('message', 'Data penjualan berhasil dihapus');
            $this->session->set_flashdata('icon', 'success');
            redirect('admin/data_penjualan');
    }
    public function batal_penjualan($id)
    {
            $where = array(
                'id' => $id
            );
            $where1 = array(
                'id_penjualan' => $id
            );
            
            foreach ($this->model_penjualan->hapus_stok_penjualan('detail_penjualan',$where1)->result_array() as $items){
                $where2 = array(
                    'id_ikan' => $items['id_ikan'],
                    'status' => '-'.$items['jumlah']
                );
                 $this->model_penjualan->hapus_data($where2, 'stok');

            }

            $this->model_penjualan->hapus_data($where, 'penjualan');
            $this->session->set_flashdata('message', 'Data penjualan berhasil dihapus');
            $this->session->set_flashdata('icon', 'success');
            redirect('admin/data_penjualan');
    }
    public function test()
    {
        $query = $this->model_penjualan->test();
        var_dump($query);
    }
    public function status_berhasil($id)
    {
            $data = array(
                'status' => 'Pembayaran Berhasil'
            );
            $where = array(
                'id' => $id
            );
            $this->model_penjualan->update_data_penjualan($where,$data, 'penjualan');
            redirect('admin/data_penjualan');
    }
    public function status_packing($id)
    {
            $data = array(
                'status' => 'Proses Packing'
            );
            $where = array(
                'id' => $id
            );
            $this->model_penjualan->update_data_penjualan($where,$data, 'penjualan');
            redirect('admin/data_penjualan');
    }
    public function status_pengiriman($id)
    {
            $data = array(
                'status' => 'Proses Pengiriman'
            );
            $where = array(
                'id' => $id
            );
            $this->model_penjualan->update_data_penjualan($where,$data, 'penjualan');
            redirect('admin/data_penjualan');
    }
    public function status_selesai($id)
    {
            $data = array(
                'status' => 'Selesai'
            );
            $where = array(
                'id' => $id
            );
            $this->model_penjualan->update_data_penjualan($where,$data, 'penjualan');
            redirect('admin/data_penjualan');
    }


}
