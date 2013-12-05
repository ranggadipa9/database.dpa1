<?php

class Mhakakses extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function gethakakses() {
        return $this->db->get('hak_akses');
    }

    function gethakaksesid($id) {
        $this->db->where('id', $id);
        return $this->db->get('hak_akses');
    }

}

?>