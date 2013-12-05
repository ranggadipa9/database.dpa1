<?php

class Mkejadian extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getkejadian() {
        
        $query = "SELECT
    kejadian.*
    , bendung.bendung
    , seksi.seksi
FROM
    dpa1.kejadian
    LEFT JOIN dpa1.seksi 
        ON (kejadian.id_seksi = seksi.id)
    LEFT JOIN dpa1.bendung 
        ON (kejadian.id_bendung = bendung.id) ";
        
        if ($this->session->userdata('jenis') == 'stb') {
			$seksi = $this->session->userdata('seksi');
			$query .= " WHERE seksi.seksi = '$seksi' ";			
		}
                if ($this->session->userdata('jenis') == 'pab') {
			$seksi = $this->session->userdata('seksi');
			$query .= " WHERE seksi.seksi = '$seksi' ";			
		}
                if ($this->session->userdata('jenis') == 'cipamingkis') {
			$seksi = $this->session->userdata('seksi');
			$query .= " WHERE seksi.seksi = '$seksi' ";			
		}
                 if ($this->session->userdata('jenis') == 'lemahabang') {
			$seksi = $this->session->userdata('seksi');
			$query .= " WHERE seksi.seksi = '$seksi' ";			
		}
                 if ($this->session->userdata('jenis') == 'bekasi') {
			$seksi = $this->session->userdata('seksi');
			$query .= " WHERE seksi.seksi = '$seksi' ";			
		}
		//if ($this->session->userdata('jenis') == 'admin') {
		//	$id_pemakaian_air = $this->session->userdata('id_pemakaian_air');
		//	$query .= " WHERE pemakaian_air.id = '$id_pemakaian_air' "; 
		//}
		$query .= " ORDER BY kejadian.id ";
                return $this->db->query($query);
    }

    function addkejadian($tanggal_input, $jam, $id_seksi, $id_bendung, $regu, $nama_operator, $kejadian) {
        $data = array('tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'id_seksi' => $id_seksi,
            'id_bendung' => $id_bendung,
            'regu' => $regu,
            'nama_operator' => $nama_operator,
            'kejadian' => $kejadian);
        $this->db->insert('kejadian', $data);
    }

    function getkejadianid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('kejadian');
        return $query;
    }

    function updatekejadian($id, $tanggal_input, $jam, $id_seksi, $id_bendung, $regu, $nama_operator, $kejadian) {
        $data = array('tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'id_seksi' => $id_seksi,
            'id_bendung' => $id_bendung,
            'regu' => $regu,
            'nama_operator' => $nama_operator,
            'kejadian' => $kejadian);
        $this->db->where('id', $id);
        $this->db->update('kejadian', $data);
    }

    function delkejadian($id) {
        $this->db->delete('kejadian', array('id' => $id));
    }

}

?>