<?php

class Msaluran_tanam extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getsaluran_tanam() {
        return $this->db->get('saluran_tanam');
    }

    function getsaluran_tanamid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('saluran_tanam');
        return $query;
    }

    function addsaluran_tanam($saluran_tanam) {
        $data = array('saluran_tanam' => $saluran_tanam);
        $this->db->insert('saluran_tanam', $data);
    }

    function updatesaluran_tanam($id, $saluran_tanam) {
        $data = array('saluran_tanam' => $saluran_tanam);

        $this->db->where('id', $id);
        $this->db->update('saluran_tanam', $data);
    }

    function delsaluran_tanam($id) {
        $this->db->delete('saluran_tanam', array('id' => $id));
    }

}

?>