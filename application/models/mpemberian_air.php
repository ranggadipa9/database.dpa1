<?php

class Mpemberian_air extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getpemberian_air() {
 //       return $this->db->query('SELECT
 //   pemberian_air.*
 //   , seksi.seksi
 //   , saluran_sekunder.saluran_sekunder
//FROM
//    dpa1.pemberian_air
//    LEFT JOIN dpa1.seksi 
//        ON (pemberian_air.id_seksi = seksi.id)
//    LEFT JOIN dpa1.saluran_sekunder 
//        ON (pemberian_air.id_saluran_sekunder = saluran_sekunder.id)');
  
  $query = "SELECT
    pemberian_air.*
    , seksi.seksi
    , saluran_sekunder.saluran_sekunder
FROM
    dpa1.pemberian_air
    LEFT JOIN dpa1.seksi 
        ON (pemberian_air.id_seksi = seksi.id)
    LEFT JOIN dpa1.saluran_sekunder 
        ON (pemberian_air.id_saluran_sekunder = saluran_sekunder.id) ";
        
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
		$query .= " ORDER BY pemberian_air.id ";
                return $this->db->query($query);         
        
        
        }

    function addpemberian_air($tanggal_input, $id_seksi, $nama_saluran, $id_saluran_sekunder, $nama_bangunan_btb, 
                               $target_areal_tanam, $golongan_tanam, $rencana_pemberian_air, $pemberian_air, $keterangan) {
        $data = array('tanggal_input' => $tanggal_input,
            'id_seksi' => $id_seksi,
            'nama_saluran' => $nama_saluran,
            'id_saluran_sekunder' => $id_saluran_sekunder,
            'nama_bangunan_btb' => $nama_bangunan_btb,
            'target_areal_tanam' => $target_areal_tanam,
            'golongan_tanam' => $golongan_tanam,
            'rencana_pemberian_air' => $rencana_pemberian_air,
            'pemberian_air' => $pemberian_air,
            'keterangan' => $keterangan);
        $this->db->insert('pemberian_air', $data);
    }

    function getpemberian_airid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pemberian_air');
        return $query;
    }

    function updatepemberian_air($id, $tanggal_input, $id_seksi, $nama_saluran, $id_saluran_sekunder, $nama_bangunan_btb, 
                               $target_areal_tanam, $golongan_tanam, $rencana_pemberian_air, $pemberian_air, $keterangan) {
        $data = array('tanggal_input' => $tanggal_input,
            'id_seksi' => $id_seksi,
            'nama_saluran' => $nama_saluran,
            'id_saluran_sekunder' => $id_saluran_sekunder,
            'nama_bangunan_btb' => $nama_bangunan_btb,
            'target_areal_tanam' => $target_areal_tanam,
            'golongan_tanam' => $golongan_tanam,
            'rencana_pemberian_air' => $rencana_pemberian_air,
            'pemberian_air' => $pemberian_air,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('pemberian_air', $data);
    }

    function delpemberian_air($id) {
        $this->db->delete('pemberian_air', array('id' => $id));
    }

}

?>