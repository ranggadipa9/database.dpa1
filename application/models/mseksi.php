<?php

class Mseksi extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getseksi() {
        return $this->db->get('seksi');
    }

    function bekasigetseksi() {
        $query = "SELECT * FROM seksi ";
        if ($this->session->userdata('jenis') == 'bekasi') {
            $seksi = $this->session->userdata('seksi');
            $query .= " WHERE seksi = '$seksi' ";
        }
        $query .= " ORDER BY seksi ";
        return $this->db->query($query);
    }
	
	function cipamingkisgetseksi() {
        $query = "SELECT * FROM seksi ";
        if ($this->session->userdata('jenis') == 'cipamingkis') {
            $seksi = $this->session->userdata('seksi');
            $query .= " WHERE seksi = '$seksi' ";
        }
        $query .= " ORDER BY seksi ";
        return $this->db->query($query);
    }
	
	function lemahabanggetseksi() {
        $query = "SELECT * FROM seksi ";
        if ($this->session->userdata('jenis') == 'lemahabang') {
            $seksi = $this->session->userdata('seksi');
            $query .= " WHERE seksi = '$seksi' ";
        }
        $query .= " ORDER BY seksi ";
        return $this->db->query($query);
    }
	
	function pabgetseksi() {
        $query = "SELECT * FROM seksi ";
        if ($this->session->userdata('jenis') == 'pab') {
            $seksi = $this->session->userdata('seksi');
            $query .= " WHERE seksi = '$seksi' ";
        }
        $query .= " ORDER BY seksi ";
        return $this->db->query($query);
    }
	
	function stbgetseksi() {
        $query = "SELECT * FROM seksi ";
        if ($this->session->userdata('jenis') == 'stb') {
            $seksi = $this->session->userdata('seksi');
            $query .= " WHERE seksi = '$seksi' ";
        }
        $query .= " ORDER BY seksi ";
        return $this->db->query($query);
    }
	
	function getseksiid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('seksi');
        return $query;
    }

    function addseksi($seksi) {
        $data = array('seksi' => $seksi);
        $this->db->insert('seksi', $data);
    }

    function updateseksi($id, $seksi) {
        $data = array('seksi' => $seksi);

        $this->db->where('id', $id);
        $this->db->update('seksi', $data);
    }

    function delseksi($id) {
        $this->db->delete('seksi', array('id' => $id));
    }

}

?>