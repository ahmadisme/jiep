<?php class cart_model extends CI_Model
{



    function cari($id)
    {
        $query = $this->db->get_where('tbl_pelanggan', array('nama' => $id));
        return $query;
    }
}
