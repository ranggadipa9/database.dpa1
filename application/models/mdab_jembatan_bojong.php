<?php

class Mdab_jembatan_bojong extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getdab_jembatan_bojong() {
 //       return $this->db->query('SELECT
 //   dab_jembatan_bojong.*
 //   , seksi.seksi
//FROM
 //   dpa1.dab_jembatan_bojong
   // LEFT JOIN dpa1.seksi 
     //   ON (dab_jembatan_bojong.id_seksi = seksi.id);');
 
        $query = "SELECT
    *
    FROM
    dpa1.dab_jembatan_bojong
     ";
        
 //       if ($this->session->userdata('jenis') == 'stb') {
//			$seksi = $this->session->userdata('seksi');
//			$query .= " WHERE seksi.seksi = '$seksi' ";			
//		}
  //              if ($this->session->userdata('jenis') == 'pab') {
//			$seksi = $this->session->userdata('seksi');
//			$query .= " WHERE seksi.seksi = '$seksi' ";			
//		}
  //              if ($this->session->userdata('jenis') == 'cipamingkis') {
//			$seksi = $this->session->userdata('seksi');
//			$query .= " WHERE seksi.seksi = '$seksi' ";			
//		}
  //               if ($this->session->userdata('jenis') == 'lemahabang') {
//			$seksi = $this->session->userdata('seksi');
//			$query .= " WHERE seksi.seksi = '$seksi' ";			
//		}
  //               if ($this->session->userdata('jenis') == 'bekasi') {
//			$seksi = $this->session->userdata('seksi');
//			$query .= " WHERE seksi.seksi = '$seksi' ";			
//		}
		//if ($this->session->userdata('jenis') == 'admin') {
		//	$id_pemakaian_air = $this->session->userdata('id_pemakaian_air');
		//	$query .= " WHERE pemakaian_air.id = '$id_pemakaian_air' "; 
		//}
		$query .= " ORDER BY dab_jembatan_bojong.id ";
                return $this->db->query($query);   
        
        
        }

    function adddab_jembatan_bojong($tanggal_input, $jam, $tma, $debet, $keterangan) {
        $data = array(//'id_seksi' => $id_seksi,
			'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'tma' => $tma,
            'debet' => $debet,
            'keterangan' => $keterangan);
        $this->db->insert('dab_jembatan_bojong', $data);
    }

    function getdab_jembatan_bojongid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('dab_jembatan_bojong');
        return $query;
    }

    function updatedab_jembatan_bojong($id, $tanggal_input, $jam, $tma, $debet, $keterangan) {
            $data = array(//'id_seksi' => $id_seksi,
			'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'tma' => $tma,
            'debet' => $debet,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('dab_jembatan_bojong', $data);
    }

    function deldab_jembatan_bojong($id) {
        $this->db->delete('dab_jembatan_bojong', array('id' => $id));
    }

}

?>