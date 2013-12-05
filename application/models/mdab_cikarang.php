<?php

class Mdab_cikarang extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getdab_cikarang() {
//        return $this->db->query('SELECT
//    dab_cikarang.*
//    , seksi.seksi
//FROM
//    dpa1.dab_cikarang
//    LEFT JOIN dpa1.seksi 
//        ON (dab_cikarang.id_seksi = seksi.id);');
  
        $query = "SELECT
    *
    FROM
    dpa1.dab_cikarang
     ";
        
  //      if ($this->session->userdata('jenis') == 'stb') {
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
		$query .= " ORDER BY dab_cikarang.id ";
                return $this->db->query($query);   
        
        
        }

    function adddab_cikarang($tanggal_input, $jam, $limpasan, $bocoran, $pintu_penguras, $suplesi_dari_btb34b, 
            $sumber_setempat, $dimanfaatkan_ke_bekasibarat, $dimanfaatkan_ke_sukatani, $q1_dimanfaatkan, $q2 ,$keterangan) {
            $data = array(//'id_seksi' => $id_seksi,
            'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'limpasan' => $limpasan,
            'bocoran' => $bocoran,
            'pintu_penguras' => $pintu_penguras,
            'suplesi_dari_btb34b' => $suplesi_dari_btb34b,
            'sumber_setempat' => $sumber_setempat,
            'dimanfaatkan_ke_bekasibarat' => $dimanfaatkan_ke_bekasibarat,
            'dimanfaatkan_ke_sukatani' => $dimanfaatkan_ke_sukatani,
            'q1_dimanfaatkan' => $q1_dimanfaatkan,
            'q2' => $q2,
            'keterangan' => $keterangan);
        $this->db->insert('dab_cikarang', $data);
    }

    function getdab_cikarangid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('dab_cikarang');
        return $query;
    }

    function updatedab_cikarang($id, $tanggal_input, $jam, $limpasan, $bocoran, $pintu_penguras, $suplesi_dari_btb34b, 
            $sumber_setempat, $dimanfaatkan_ke_bekasibarat, $dimanfaatkan_ke_sukatani, $q1_dimanfaatkan, $q2 ,$keterangan) {
            $data = array(//'id_seksi' => $id_seksi,
            'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'limpasan' => $limpasan,
            'bocoran' => $bocoran,
            'pintu_penguras' => $pintu_penguras,
            'suplesi_dari_btb34b' => $suplesi_dari_btb34b,
            'sumber_setempat' => $sumber_setempat,
            'dimanfaatkan_ke_bekasibarat' => $dimanfaatkan_ke_bekasibarat,
            'dimanfaatkan_ke_sukatani' => $dimanfaatkan_ke_sukatani,
            'q1_dimanfaatkan' => $q1_dimanfaatkan,
            'q2' => $q2,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('dab_cikarang', $data);
    }

    function deldab_cikarang($id) {
        $this->db->delete('dab_cikarang', array('id' => $id));
    }

}

?>