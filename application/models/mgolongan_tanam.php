<?php

class Mgolongan_tanam extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getgolongan_tanam() {
        return $this->db->get('golongan_tanam');
    }

    function getgolongan_tanamid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('golongan_tanam');
        return $query;
    }

    function addgolongan_tanam($golongan_tanam) {
        $data = array('golongan_tanam' => $golongan_tanam);
        $this->db->insert('golongan_tanam', $data);
    }

    function updategolongan_tanam($id, $golongan_tanam) {
        $data = array('golongan_tanam' => $golongan_tanam);

        $this->db->where('id', $id);
        $this->db->update('golongan_tanam', $data);
    }

    function delgolongan_tanam($id) {
        $this->db->delete('golongan_tanam', array('id' => $id));
    }

}

?>