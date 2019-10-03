<?php
class m_invoice extends CI_Model
{

    function get_no_invoice()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(no_trans,1)) AS kd_max FROM tbl_po WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy') . $kd;
    }

    function simpan_invoice($no_invoice)
    {
        $hasil = $this->db->query("INSERT INTO tbl_invoice (no_invoice) VALUES ('$no_invoice')");
        return $hasil;
    }

    public function tambah_po($data)
    {
        $this->db->insert('tbl_po', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function tambah_detail_po($data)
    {
        $this->db->insert('tbl_detail_po', $data);
    }

    public function tambah_invoice($data)
    {
        $this->db->insert('tbl_invoice', $data);
    }
}
