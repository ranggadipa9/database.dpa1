<?php

class Mdab_cipamingkis extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getdab_cipamingkis() {
 //       return $this->db->query('SELECT
  //  dab_cipamingkis.*
  //  , seksi.seksi
//FROM
//    dpa1.dab_cipamingkis
 //   LEFT JOIN dpa1.seksi 
  //      ON (dab_cipamingkis.id_seksi = seksi.id);');
   
   $query = "SELECT
    *
   FROM
    dpa1.dab_cipamingkis ";
        
    //    if ($this->session->userdata('jenis') == 'stb') {
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
		$query .= " ORDER BY dab_cipamingkis.id ";
                return $this->db->query($query);        
        
        }

    function adddab_cipamingkis($tanggal_input, $jam, $limpasan, $saluran_induk_kiri, $saluran_induk_kanan, 
            $q1, $q2, $keterangan) {
        $data = array(//'id_seksi' => $id_seksi,
            'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'limpasan' => $limpasan,
            'saluran_induk_kiri' => $saluran_induk_kiri,
            'saluran_induk_kanan' => $saluran_induk_kanan,
            'q1' => $q1,
            'q2' => $q2,
            'keterangan' => $keterangan);
        $this->db->insert('dab_cipamingkis', $data);
    }

    function getdab_cipamingkisid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('dab_cipamingkis');
        return $query;
    }

    function updatedab_cipamingkis($id, $tanggal_input, $jam, $limpasan, $saluran_induk_kiri, $saluran_induk_kanan, 
            $q1, $q2, $keterangan) {
        $data = array(//'id_seksi' => $id_seksi,
            'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'limpasan' => $limpasan,
            'saluran_induk_kiri' => $saluran_induk_kiri,
            'saluran_induk_kanan' => $saluran_induk_kanan,
            'q1' => $q1,
            'q2' => $q2,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('dab_cipamingkis', $data);
    }

    function deldab_cipamingkis($id) {
        $this->db->delete('dab_cipamingkis', array('id' => $id));
    }

}

?>