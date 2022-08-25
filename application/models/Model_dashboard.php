<?php

class Model_dashboard extends CI_Model{
    
    public function tampil_data_detail($where){
        $this->db->select('detail_penjualan.id,detail_penjualan.jumlah,ikan.nama_ikan,ikan.deskripsi,ikan.harga,detail_penjualan.harga_jual,detail_penjualan.subtotal_harga');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan', 'penjualan.id = detail_penjualan.id_penjualan', 'left');
        $this->db->join('ikan', 'ikan.id = detail_penjualan.id_ikan', 'left');
        $this->db->where('detail_penjualan.id_penjualan', $where);
        return $this->db->get();
    }
    public function select_where($table,$where){
        return $this->db->get_where($table,array('id' => $where));
    }

    public function menunggu_pembayaran(){
        $this->db->select('penjualan.no_penjualan,penjualan.total_harga,penjualan.alamat_pengiriman,penjualan.tanggal_dibuat,user_account.nama_user as nama_pembeli');
        $this->db->from('penjualan');
        $this->db->join('user_account', 'user_account.id = penjualan.id_pembeli', 'left');
        $this->db->join('pembayaran', 'pembayaran.id = penjualan.id_bank', 'left');
        $this->db->where('status = "Pembayaran Berhasil" OR status = "Menunggu Pembayaran"');
        return $this->db->get();
        // return $this->db->get_where('penjualan','status = "Pembayaran Berhasil" OR status = "Menunggu Pembayaran"');
    }

    public function pesanan_berlangsung(){
        return $this->db->get_where('penjualan','id_pembeli = "'.$_SESSION['id_user'].'" AND status != "Menunggu Pembayaran" AND status != "Selesai"');
    }
    
    public function selectmax($table = null, $field = null){
        $this->db->select_max($field);
        return $this->db->get($table)->row_array()[$field];
    }
    public function tambah_penjualan($data,$table){
        $this->db->insert($table,$data);
    }
    public function tampil_data_penjualan(){
        return $this->db->get('penjualan');
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
    public function perubahan_stok(){
        $date = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->like('tanggal', ''.$date.'');
        return $this->db->get();
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
    public function test5(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '05');        
        return $this->db->get()->result();  
    }
    public function test6(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '06');        
        return $this->db->get()->result();  
    }
    public function test7(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '07');        
        return $this->db->get()->result();  
    }
    public function test8(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '08');        
        return $this->db->get()->result();  
    }
    public function test9(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '09');        
        return $this->db->get()->result();  
    }
    public function test10(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '10');        
        return $this->db->get()->result();  
    }
    public function test11(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '11');        
        return $this->db->get()->result();  
    }
    public function test12(){
        $this->db->select('count(id) AS jumlah, tanggal_dibuat');
        $this->db->from('penjualan');
        $this->db->where('SUBSTRING(tanggal_dibuat, 6 , 2)=', '12');        
        return $this->db->get()->result();  
    }
}
