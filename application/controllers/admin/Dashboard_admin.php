<?php

class Dashboard_admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dashboard');
    }
    public function index()
    {
        $data['grafik1'] = $this->model_dashboard->test1();
        $data['grafik2'] = $this->model_dashboard->test2();
        $data['grafik3'] = $this->model_dashboard->test3();
        $data['grafik4'] = $this->model_dashboard->test4();
        $data['grafik5'] = $this->model_dashboard->test5();
        $data['grafik6'] = $this->model_dashboard->test6();
        $data['grafik7'] = $this->model_dashboard->test7();
        $data['grafik8'] = $this->model_dashboard->test8();
        $data['grafik9'] = $this->model_dashboard->test9();
        $data['grafik10'] = $this->model_dashboard->test10();
        $data['grafik11'] = $this->model_dashboard->test11();
        $data['grafik12'] = $this->model_dashboard->test12();
        $data['proses'] = $this->model_dashboard->menunggu_pembayaran()->result();
        $data['stok'] = count($this->model_dashboard->perubahan_stok()->result());
        $this->load->view('admin/dashboard', $data);
    }
    public function error()
    {
        $this->load->view('admin/admin_error');
    }
    public function test()
    {
        $data['grafik1'] = $this->model_dashboard->test1();
        $data['grafik2'] = $this->model_dashboard->test2();
        $data['grafik3'] = $this->model_dashboard->test3();
        $data['grafik4'] = $this->model_dashboard->test4();
        $data['proses'] = $this->model_dashboard->tampil_data_penjualan()->result();
        $this->load->view('admin/test', $data);
    }
}