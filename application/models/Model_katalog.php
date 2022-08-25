<?php

class Model_katalog extends CI_Model{

    public function tampil_data_katalog(){
        $this->db->select('ikan.id,ikan.harga,ikan.nama_ikan,ikan.deskripsi,SUM(stok.status) AS stok, ikan.gambar');
        $this->db->from('ikan');
        $this->db->join('stok', 'ikan.id = stok.id_ikan', 'left');
        $this->db->group_by('stok.id_ikan');
        return $this->db->get();
    }
    public function tampil_data_katalog1($where){
        $this->db->select('ikan.id,ikan.harga,ikan.nama_ikan,ikan.deskripsi,SUM(stok.status) AS stok, ikan.gambar');
        $this->db->from('ikan');
        $this->db->join('stok', 'ikan.id = stok.id_ikan', 'left');
        $this->db->where('ikan.id', $where);
        $this->db->group_by('stok.id_ikan');
        return $this->db->get();
    }
    public function search_katalog($where){
        $this->db->from('ikan');
        $this->db->like('nama_ikan', $where);
        return $this->db->get();
    }
    public function tampil_data_stok(){
        $this->db->select('stok.id,ikan.nama_ikan,stok.id_ikan,stok.status,stok.keterangan,stok.tanggal');
        $this->db->from('stok');
        $this->db->join('ikan', 'ikan.id = stok.id_ikan', 'left');
        return $this->db->get();
    }
    public function tampil_data_ikan(){
        return $this->db->get('ikan');
    }
    public function tambah_katalog($data,$table){
        $this->db->insert($table,$data);
    }
    public function tambah_katalog1($data1,$table){
        $this->db->insert($table,$data1);
    }
    public function selectmax(){
        $this->db->select_max('id');
        $query = $this->db->get('ikan');
        return $query->result_array();  
    }
    public function persen(){
        $total = '(select count(*) from task)';
        $query = $this->db->select('concat(round((100*count(*))/'.$total.',0),"%") as data_percentage')
                      ->from('task')
                      ->group_by('browser')
                      ->get();      
        return $query->result_array();  
    }
    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function select_id($id){
    $result = $this->db->where('id', $id)
                       ->limit (1)
                       ->get('ikan');
        if($result->num_rows() > 0) {
            return $result->row();
        }else{
        return array();
        }
    }
}
