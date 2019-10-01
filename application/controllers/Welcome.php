<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['produk'] = $this->db->get('barang')->result();
		$this->load->view('welcome_message', $data);
	}

	public function edit($barang_id)
	{
		$where = array('barang_id' => $barang_id);
		$data['produk'] = $this->m_data->edit_data($where, 'barang')->row();
		$this->load->view('v_edit', $data);
	}

	function update()
	{
		$barang_id = $this->input->post('barang_id');
		$nama_barang = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');
		$kategori_id = $this->input->post('kategori_id');

		$data = array(
			'nama_barang' => $nama_barang,
			'harga' => $harga,
			'kategori_id' => $kategori_id
		);

		$where = array(
			'barang_id' => $barang_id
		);

		$this->m_data->update_data($where, $data, 'barang');
		redirect('welcome/index');
	}
}
