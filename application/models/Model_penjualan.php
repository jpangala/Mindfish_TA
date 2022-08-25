<?php

class Model_penjualan extends CI_Model{
    
    public function tampil_data_detail($where){
        $this->db->select('detail_penjualan.id,detail_penjualan.jumlah,ikan.id as id_ikan,ikan.nama_ikan,ikan.deskripsi,ikan.harga,detail_penjualan.harga_jual,detail_penjualan.subtotal_harga');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan', 'penjualan.id = detail_penjualan.id_penjualan', 'left');
        $this->db->join('ikan', 'ikan.id = detail_penjualan.id_ikan', 'left');
        $this->db->where('detail_penjualan.id_penjualan', $where);
        return $this->db->get();
    }
    public function tampil_data_detail1($idmax){
        $this->db->select('detail_penjualan.id,detail_penjualan.jumlah,ikan.nama_ikan,ikan.deskripsi,ikan.harga,detail_penjualan.harga_jual,detail_penjualan.subtotal_harga');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan', 'penjualan.id = detail_penjualan.id_penjualan', 'left');
        $this->db->join('ikan', 'ikan.id = detail_penjualan.id_ikan', 'left');
        $this->db->where('detail_penjualan.id_penjualan', $idmax);
        return $this->db->get();
    }
    public function select_where($table,$where){
        return $this->db->get_where($table,array('id' => $where));
    }
    public function hapus_stok_penjualan($table,$where){
        $this->db->select('id_ikan,jumlah');
        $this->db->from($table);
        $this->db->where($where);		
        return $this->db->get();
    }
    public function select_where1($table,$where){
        $this->db->select('penjualan.no_penjualan,penjualan.total_harga,penjualan.status,penjualan.bukti_pembayaran,penjualan.id,user_account.id as id_pembeli,penjualan.alamat_pengiriman,penjualan.tanggal_dibuat,user_account.nama_user as nama_pembeli
        ,pembayaran.nama_bank,pembayaran.no_rek,pembayaran.nama_penerima ');
        $this->db->from($table);
        $this->db->join('user_account', 'user_account.id = penjualan.id_pembeli', 'left');
        $this->db->join('pembayaran', 'pembayaran.id = penjualan.id_bank', 'left');
        $this->db->where($where);		
        return $this->db->get();
    }   
    public function selectmax_where($table,$id){
        $this->db->select_max('id');
        return $this->db->get_where($table,array('id_pembeli' => $id));
    }
    public function selectmax_where1($table,$where){
        $this->db->select_max('id');
        $this->db->where($where);		
        return $this->db->get($table)->row_array()['id'];
    }
    public function selectmax($table = null, $field = null){
        $this->db->select_max($field);
        return $this->db->get($table)->row_array()[$field];
    }
    public function selectmax1($table = null, $field1 = null){
        $id_pembeli          = $_SESSION['id_user'];
        $this->db->select_max($field1);
        $this->db->where(array('penjualan.id_pembeli' => $id_pembeli));
        return $this->db->get($table)->row_array()[$field1];
    }
    public function tambah_penjualan($data,$table){
        $this->db->insert($table,$data);
    }
    public function tampil_data_penjualan(){
        $this->db->select('penjualan.no_penjualan,penjualan.total_harga,penjualan.status,penjualan.bukti_pembayaran,penjualan.id,penjualan.alamat_pengiriman,penjualan.tanggal_dibuat,user_account.nama_user as nama_pembeli');
        $this->db->from('penjualan');
        $this->db->join('user_account', 'user_account.id = penjualan.id_pembeli', 'left');
        $this->db->join('pembayaran', 'pembayaran.id = penjualan.id_bank', 'left');
        return $this->db->get();
        // return $this->db->get_where('penjualan','status = "Pembayaran Berhasil" OR status = "Menunggu Pembayaran"');
    }
    public function tampil_data_detail_pembelian($where){
        $this->db->select('penjualan.no_penjualan,penjualan.total_harga,penjualan.status,penjualan.bukti_pembayaran,penjualan.id,penjualan.alamat_pengiriman,penjualan.tanggal_dibuat,user_account.nama_user as nama_pembeli');
        $this->db->from('penjualan');
        $this->db->join('user_account', 'user_account.id = penjualan.id_pembeli', 'left');
        $this->db->join('pembayaran', 'pembayaran.id = penjualan.id_bank', 'left');
        $this->db->where('penjualan.id', $where);
        return $this->db->get();
        // return $this->db->get_where('penjualan','status = "Pembayaran Berhasil" OR status = "Menunggu Pembayaran"');
    }
    public function tampil_data_bank(){
        return $this->db->get('pembayaran');
    }
    public function tampil_data_katalog(){
        $this->db->select('detail_penjualan.id,detail_penjualan.jumlah,ikan.nama_ikan,ikan.id,ikan.harga,ikan.deskripsi,detail_penjualan.harga_jual,detail_penjualan.subtotal_harga');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan', 'penjualan.id = detail_penjualan.id_penjualan', 'left');
        $this->db->join('ikan', 'ikan.id = detail_penjualan.id_ikan', 'left');
        return $this->db->get();
    }
    public function tampil_data_ikan(){
        return $this->db->get('ikan');
    }
    public function selectmax_id($table){
        $this->db->select_max('id');
        return $this->db->get($table);
    }
    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_data($data,$table,$where){
        $this->db->where('id',$where);
        $this->db->update($table,$data);
    }
    public function update_data_penjualan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function test1(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '01');        
        return $this->db->get()->result();  
    }
    public function test2(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '02');        
        return $this->db->get()->result();  
    }
    public function test3(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '03');        
        return $this->db->get()->result();  
    }
    public function test4(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '04');        
        return $this->db->get()->result();  
    }
}
