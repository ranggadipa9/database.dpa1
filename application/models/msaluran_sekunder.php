<?php

class Msaluran_sekunder extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getsaluran_sekunder() {
        return $this->db->get('saluran_sekunder');
    }

    function getsaluran_sekunderid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('saluran_sekunder');
        return $query;
    }

    function addsaluran_sekunder($saluran_sekunder) {
        $data = array('saluran_sekunder' => $saluran_sekunder);
        $this->db->insert('saluran_sekunder', $data);
    }

    function updatesaluran_sekunder($id, $saluran_sekunder) {
        $data = array('saluran_sekunder' => $saluran_sekunder);

        $this->db->where('id', $id);
        $this->db->update('saluran_sekunder', $data);
    }

    function delsaluran_sekunder($id) {
        $this->db->delete('saluran_sekunder', array('id' => $id));
    }

}

?>