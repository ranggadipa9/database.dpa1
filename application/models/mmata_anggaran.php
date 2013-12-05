<?php

class Mmata_anggaran extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getmata_anggaran() {
        return $this->db->get('mata_anggaran');
    }

    function getmata_anggaranid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('mata_anggaran');
        return $query;
    }

    function addmata_anggaran($mata_anggaran) {
        $data = array('mata_anggaran' => $mata_anggaran);
        $this->db->insert('mata_anggaran', $data);
    }

    function updatemata_anggaran($id, $mata_anggaran) {
        $data = array('mata_anggaran' => $mata_anggaran);

        $this->db->where('id', $id);
        $this->db->update('mata_anggaran', $data);
    }

    function delmata_anggaran($id) {
        $this->db->delete('mata_anggaran', array('id' => $id));
    }

}

?>