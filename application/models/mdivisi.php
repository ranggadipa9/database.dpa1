<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdivisi extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getbagian() {
        return $this->db->get('bagian');
    }

    function lapgetbagian() {
        $query = "SELECT * FROM bagian ";
        if ($this->session->userdata('jenis') == 'kabiro') {
            $bagian = $this->session->userdata('bagian');
            $query .= " WHERE bagian = '$bagian' ";
        }
        $query .= " ORDER BY bagian ";
        return $this->db->query($query);
    }

    function getbagianid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bagian');
        return $query;
    }

    function addbagian($bagian) {
        $data = array('bagian' => $bagian);
        $this->db->insert('bagian', $data);
    }

    function updatebagian($id, $bagian) {
        $data = array('bagian' => $bagian);

        $this->db->where('id', $id);
        $this->db->update('bagian', $data);
    }

    function delbagian($id) {
        $this->db->delete('bagian', array('id' => $id));
    }

}