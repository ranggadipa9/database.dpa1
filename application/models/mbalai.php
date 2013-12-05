<?php

class Mbalai extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getbalai() {
        return $this->db->get('balai');
    }

    function getbalaiid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('balai');
        return $query;
    }

    function addbalai($balai) {
        $data = array('balai' => $balai);
        $this->db->insert('balai', $data);
    }

    function updatebalai($id, $balai) {
        $data = array('balai' => $balai);

        $this->db->where('id', $id);
        $this->db->update('balai', $data);
    }

    function delbalai($id) {
        $this->db->delete('balai', array('id' => $id));
    }

}

?>