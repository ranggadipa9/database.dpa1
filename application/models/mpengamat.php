<?php

class Mpengamat extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getpengamat() {
        return $this->db->get('pengamat');
    }

    function getpengamatid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pengamat');
        return $query;
    }

    function addpengamat($pengamat) {
        $data = array('pengamat' => $pengamat);
        $this->db->insert('pengamat', $data);
    }

    function updatepengamat($id, $pengamat) {
        $data = array('pengamat' => $pengamat);

        $this->db->where('id', $id);
        $this->db->update('pengamat', $data);
    }

    function delpengamat($id) {
        $this->db->delete('pengamat', array('id' => $id));
    }

}

?>