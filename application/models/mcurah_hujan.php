<?php

class Mcurah_hujan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getcurah_hujan() {
//        return $this->db->query('SELECT
 //   curah_hujan.*
  //  , seksi.seksi
//FROM
  //  dpa1.curah_hujan
    //LEFT JOIN dpa1.seksi 
      //  ON (curah_hujan.id_seksi = seksi.id);');
        
        $query = "SELECT
    curah_hujan.*
    , seksi.seksi
FROM
    dpa1.curah_hujan
    LEFT JOIN dpa1.seksi 
        ON (curah_hujan.id_seksi = seksi.id) ";
        
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
		$query .= " ORDER BY curah_hujan.id ";
                return $this->db->query($query);
    }

    function addcurah_hujan($tanggal_input, $nomor, $id_seksi, $nama_stasiun, $curah_hujan, $keterangan) {
        $data = array('tanggal_input' => $tanggal_input,
            'nomor' => $nomor,
            'id_seksi' => $id_seksi,
            'nama_stasiun' => $nama_stasiun,
			'curah_hujan' => $curah_hujan,
            'keterangan' => $keterangan);
        $this->db->insert('curah_hujan', $data);
    }

    function getcurah_hujanid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('curah_hujan');
        return $query;
    }

    function updatecurah_hujan($id, $tanggal_input, $nomor, $id_seksi, $nama_stasiun,$curah_hujan, $keterangan) {
            $data = array('tanggal_input' => $tanggal_input,
            'nomor' => $nomor,
            'id_seksi' => $id_seksi,
            'nama_stasiun' => $nama_stasiun,
			'curah_hujan' => $curah_hujan,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('curah_hujan', $data);
    }

    function delcurah_hujan($id) {
        $this->db->delete('curah_hujan', array('id' => $id));
    }

}

?>