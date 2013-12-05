<?php

class Mdab_bekasi extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getdab_bekasi() {
//        return $this->db->query('SELECT
 //   dab_bekasi.*
 //   , seksi.seksi
//FROM
 //   dpa1.dab_bekasi
 //   LEFT JOIN dpa1.seksi 
 //       ON (dab_bekasi.id_seksi = seksi.id);');
    
        $query = "SELECT
    *
    FROM
    dpa1.dab_bekasi
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
		$query .= " ORDER BY dab_bekasi.id ";
                return $this->db->query($query);
        
        
    }

    function adddab_bekasi($tanggal_input, $jam, $limpasan, $suplesi_dari_btb45b, $sumber_setempat, $dimanfaatkan_ke_dki, 
            $dimanfaatkan_ke_bekasiutara, $q1_dimanfaatkan, $q2, $keterangan) {
        $data = array(//'id_seksi' => $id_seksi,
          //  'tanggal_input' => NOW('Y-m-d'),
         //   'jam' => NOW('H:i:s'),
            'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'limpasan' => $limpasan,
            'suplesi_dari_btb45b' => $suplesi_dari_btb45b,
            'sumber_setempat' => $sumber_setempat,
            'dimanfaatkan_ke_dki' => $dimanfaatkan_ke_dki,
            'dimanfaatkan_ke_bekasiutara' => $dimanfaatkan_ke_bekasiutara,
            'q1_dimanfaatkan' => $q1_dimanfaatkan,
            'q2' => $q2,
            'keterangan' => $keterangan);
        $this->db->insert('dab_bekasi', $data);
    }

    function getdab_bekasiid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('dab_bekasi');
        return $query;
    }

    function updatedab_bekasi($id, $tanggal_input, $jam, $limpasan,$suplesi_dari_btb45b, $sumber_setempat, $dimanfaatkan_ke_dki, 
            $dimanfaatkan_ke_bekasiutara, $q1_dimanfaatkan, $q2, $keterangan) {
            $data = array(//'id_seksi' => $id_seksi,
            'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'limpasan' => $limpasan,    
            'suplesi_dari_btb45b' => $suplesi_dari_btb45b,
            'sumber_setempat' => $sumber_setempat,
            'dimanfaatkan_ke_dki' => $dimanfaatkan_ke_dki,
            'dimanfaatkan_ke_bekasiutara' => $dimanfaatkan_ke_bekasiutara,
            'q1_dimanfaatkan' => $q1_dimanfaatkan,
            'q2' => $q2,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('dab_bekasi', $data);
    }

    function deldab_bekasi($id) {
        $this->db->delete('dab_bekasi', array('id' => $id));
    }

}

?>