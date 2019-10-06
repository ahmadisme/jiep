<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class PurchaseOrder extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_invoice');
        $this->load->model('cart_model');
    }

    public function index()
    {

        $data['produk'] = $this->db->get('tbl_produk')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('po/list_produk', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/footer');
    }
    public function tampil_cart()
    {

        $this->load->view('layout/header');
        $this->load->view('po/tampil_cart');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/footer');
    }

    public function check_out()
    {
        $data['invoice'] = $this->m_invoice->get_no_invoice();
        $data['record'] = $this->db->get('tbl_pelanggan');
        $this->load->view('layout/header');
        $this->load->view('po/check_out', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/footer');
    }

    public function list_purchaseorder()
    {

        $data['list_po'] = $this->db->get('tbl_po')->result();
        $data['list_detail_po'] = $this->db->get('tbl_detail_po')->result();
        $this->load->view('layout/header');
        $this->load->view('po/list_purchaseorder', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/footer');
    }

    public function detail()
    {


        $data['list_detail_po'] = $this->db->get_where('tbl_detail_po', ['order_id' => $this->uri->segment(3)])->result();
        $data['list_po'] = $this->db->get_where('tbl_po', ['id' => $this->uri->segment(3)])->row();
        $this->load->view('layout/header');
        $this->load->view('po/detail', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/footer');
    }

    public function detail_produk()
    {
        $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $data['detail'] = $this->keranjang_model->get_produk_id($id)->row_array();
        $this->load->view('themes/header', $data);
        $this->load->view('shopping/detail_produk', $data);
        $this->load->view('themes/footer');
    }

    public function print()
    {


        $data['list_detail_po'] = $this->db->get_where('tbl_detail_po', ['order_id' => $this->uri->segment(3)])->result();
        $data['list_po'] = $this->db->get_where('tbl_po', ['id' => $this->uri->segment(3)])->row();
        // $this->load->view('layout/header');
        $this->load->view('po/print', $data);
        // $this->load->view('layout/sidebar');
        // $this->load->view('layout/footer');
    }





    function tambah()
    {
        $data_produk = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('nama'),
            'price' => $this->input->post('harga'),
            'gambar' => $this->input->post('gambar'),
            'qty' => $this->input->post('qty')
        );
        $this->cart->insert($data_produk);
        redirect('purchaseorder');
    }

    function hapus($rowid)
    {
        if ($rowid == "all") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect('purchaseorder/tampil_cart');
    }

    function ubah_cart()
    {
        $cart_info = $_POST['cart'];
        foreach ($cart_info as $id => $cart) {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $gambar = $cart['gambar'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'gambar' => $gambar,
                'amount' => $amount,
                'qty' => $qty
            );
            $this->cart->update($data);
        }
        redirect('purchaseorder/tampil_cart');
    }

    public function proses_po()
    {

        // $data_pelanggan = array(
        //     'no_trans' => $this->input->post('no_trans'),

        // );
        // $this->m_invoice->tambah_invoice($data_pelanggan);
        //-------------------------Input data order------------------------------
        $data_order = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'tanggal_order' => date('Y-m-d'),
            'total_harga' => $this->input->post('total_harga'),
            'no_trans' => $this->input->post('no_trans'),
            'tanggal' => $this->input->post('tanggal'),

        );
        $id_order = $this->m_invoice->tambah_po($data_order);
        //-------------------------Input data detail order-----------------------		
        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $data_detail = array(
                    'order_id' => $id_order,
                    'produk' => $item['name'],
                    'qty' => $item['qty'],
                    'harga' => $item['price']
                );
                $proses = $this->m_invoice->tambah_detail_po($data_detail);
            }
        }
        //-------------------------Hapus shopping cart--------------------------		
        $this->cart->destroy();
        // $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('dashboard/index');
        $this->load->view('layout/footer');
    }

    public function cari()
    {
        $nama = $_GET['nama'];
        $cari = $this->cart_model->cari($nama)->result();
        echo json_encode($cari);
    }
}
