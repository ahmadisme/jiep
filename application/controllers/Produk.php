<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_produk');
        $this->load->library('cart');
    }

    public function tambah()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('produk/tambah');
        $this->load->view('layout/footer');
    }

    public function do_add()
    {
        $nama_produk = $this->input->post('nama_produk');
        $deskripsi = $this->input->post('deskripsi');
        $harga_beli = $this->input->post('harga_beli');

        $data = array(
            'nama_produk' => $nama_produk,
            'deskripsi' => $deskripsi,
            'harga_beli' => $harga_beli
        );
        $this->m_produk->input_data($data, 'tbl_produk');
        redirect('welcome/index');
    }

    function edit($id_produk)
    {
        $where = array('id_produk' => $id_produk);
        $data['detail_produk'] = $this->m_produk->edit_data($where, 'tbl_produk')->row();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('produk/detail', $data);
        $this->load->view('layout/footer');
    }

    function update()
    {
        $id_produk = $this->input->post('id_produk');
        $nama_produk = $this->input->post('nama_produk');
        $deskripsi = $this->input->post('deskripsi');
        $harga_beli = $this->input->post('harga_beli');

        $data = array(
            'nama_produk' => $nama_produk,
            'deskripsi' => $deskripsi,
            'harga_beli' => $harga_beli
        );

        $where = array(
            'id_produk' => $id_produk
        );

        $this->m_produk->update_data($where, $data, 'tbl_produk');
        redirect('purchaseorder/index');
    }
}
