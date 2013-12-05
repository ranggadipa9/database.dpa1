<?php

class Mpelanggan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getpelanggan() {
        return $this->db->get('pelanggan');
    }

    function getpelangganid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pelanggan');
        return $query;
    }

    function addpelanggan($pelanggan) {
        $data = array('pelanggan' => $pelanggan);
        $this->db->insert('pelanggan', $data);
    }

    function updatepelanggan($id, $pelanggan) {
        $data = array('pelanggan' => $pelanggan);

        $this->db->where('id', $id);
        $this->db->update('pelanggan', $data);
    }

    function delpelanggan($id) {
        $this->db->delete('pelanggan', array('id' => $id));
    }

}

?>