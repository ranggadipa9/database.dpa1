<?php

class Mdab_cikeas extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getdab_cikeas() {
 //       return $this->db->query('SELECT
  //  dab_cikeas.*
  //  , seksi.seksi
//FROM
//    dpa1.dab_cikeas
 //   LEFT JOIN dpa1.seksi 
 //       ON (dab_cikeas.id_seksi = seksi.id);');
   
        $query = "SELECT
    *
    FROM
    dpa1.dab_cikeas
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
		$query .= " ORDER BY dab_cikeas.id ";
                return $this->db->query($query);   
        
        
        }

    function adddab_cikeas($tanggal_input, $jam, $pelimpas_kiri, $pelimpas_kanan, $jumlah, $keterangan) {
        $data = array(//'id_seksi' => $id_seksi,
			'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'pelimpas_kiri' => $pelimpas_kiri,
            'pelimpas_kanan' => $pelimpas_kanan,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan);
        $this->db->insert('dab_cikeas', $data);
    }

    function getdab_cikeasid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('dab_cikeas');
        return $query;
    }

    function updatedab_cikeas($id, $tanggal_input, $jam, $pelimpas_kiri, $pelimpas_kanan, $jumlah, $keterangan) {
        $data = array(//'id_seksi' => $id_seksi,
			'tanggal_input' => $tanggal_input,
            'jam' => $jam,
            'pelimpas_kiri' => $pelimpas_kiri,
            'pelimpas_kanan' => $pelimpas_kanan,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('dab_cikeas', $data);
    }

    function deldab_cikeas($id) {
        $this->db->delete('dab_cikeas', array('id' => $id));
    }

}

?>