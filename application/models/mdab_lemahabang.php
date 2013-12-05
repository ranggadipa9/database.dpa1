<?php

class Mdab_lemahabang extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getdab_lemahabang() {
//        return $this->db->query('SELECT
//    dab_lemahabang.*
//    , seksi.seksi
//FROM
//    dpa1.dab_lemahabang
 //   LEFT JOIN dpa1.seksi 
 //       ON (dab_lemahabang.id_seksi = seksi.id);');
 
 $query = "SELECT
    *
    FROM
    dpa1.dab_lemahabang
     ";
        
     //   if ($this->session->userdata('jenis') == 'stb') {
	//		$seksi = $this->session->userdata('seksi');
	//		$query .= " WHERE seksi.seksi = '$seksi' ";			
	//	}
          //      if ($this->session->userdata('jenis') == 'pab') {
	//		$seksi = $this->session->userdata('seksi');
	//		$query .= " WHERE seksi.seksi = '$seksi' ";			
	//	}
          //      if ($this->session->userdata('jenis') == 'cipamingkis') {
	//		$seksi = $this->session->userdata('seksi');
	//		$query .= " WHERE seksi.seksi = '$seksi' ";			
	//	}
          //       if ($this->session->userdata('jenis') == 'lemahabang') {
	//		$seksi = $this->session->userdata('seksi');
	//		$query .= " WHERE seksi.seksi = '$seksi' ";			
	//	}
          //       if ($this->session->userdata('jenis') == 'bekasi') {
	//		$seksi = $this->session->userdata('seksi');
	//		$query .= " WHERE seksi.seksi = '$seksi' ";			
	//	}
	//	//if ($this->session->userdata('jenis') == 'admin') {
		//	$id_pemakaian_air = $this->session->userdata('id_pemakaian_air');
		//	$query .= " WHERE pemakaian_air.id = '$id_pemakaian_air' "; 
		//}
		$query .= " ORDER BY dab_lemahabang.id ";
                return $this->db->query($query);          
        
        }

    function adddab_lemahabang( $tanggal_input, $jam, $tma, $debet, $keterangan) {
        $data = array(//'id_seksi' => $id_seksi,
			'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'tma' => $tma,
            'debet' => $debet,
            'keterangan' => $keterangan);
        $this->db->insert('dab_lemahabang', $data);
    }

    function getdab_lemahabangid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('dab_lemahabang');
        return $query;
    }

    function updatedab_lemahabang($id, $tanggal_input, $jam, $tma, $debet, $keterangan) {
            $data = array(//'id_seksi' => $id_seksi,
			'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'tma' => $tma,
            'debet' => $debet,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('dab_lemahabang', $data);
    }

    function deldab_lemahabang($id) {
        $this->db->delete('dab_lemahabang', array('id' => $id));
    }

}

?>