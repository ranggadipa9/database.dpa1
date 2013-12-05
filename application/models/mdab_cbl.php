<?php

class Mdab_cbl extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getdab_cbl() {
//        return $this->db->query('SELECT
 //   dab_cbl.*
 //   , seksi.seksi
//FROM
//    dpa1.dab_cbl
//    LEFT JOIN dpa1.seksi 
//        ON (dab_cbl.id_seksi = seksi.id);');
  
        $query = "SELECT
    *
FROM
    dpa1.dab_cbl";
        
      //  if ($this->session->userdata('jenis') == 'stb') {
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
		$query .= " ORDER BY dab_cbl.id ";
                return $this->db->query($query);   
        
        
        }

    function adddab_cbl($tanggal_input, $jam, $limpasan, $debet_air, $disukatani_bsh1, $jumlah, 
                                    $keterangan) {
        $data = array(
            'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'limpasan' => $limpasan,
            'debet_air' => $debet_air,
            'disukatani_bsh1' => $disukatani_bsh1,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan);
        $this->db->insert('dab_cbl', $data);
    }

    function getdab_cblid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('dab_cbl');
        return $query;
    }

    function updatedab_cbl($id,  $tanggal_input, $jam, $limpasan, $debet_air, $disukatani_bsh1, $jumlah, 
                                    $keterangan) {
            $data = array(
                'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'limpasan' => $limpasan,
            'debet_air' => $debet_air,
            'disukatani_bsh1' => $disukatani_bsh1,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('dab_cbl', $data);
    }

    function deldab_cbl($id) {
        $this->db->delete('dab_cbl', array('id' => $id));
    }

}

?>