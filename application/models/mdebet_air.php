<?php

class Mdebet_air extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getdebet_air() {
        $query = "SELECT
    debet_air.*
    , seksi.seksi
    , bendung.bendung
FROM
    dpa1.debet_air
    LEFT JOIN dpa1.seksi 
        ON (debet_air.id_seksi = seksi.id)
    LEFT JOIN dpa1.bendung 
        ON (debet_air.id_bendung = bendung.id) ";
        
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
		$query .= " ORDER BY debet_air.id ";
                return $this->db->query($query);
        
        
    }

    function adddebet_air(
$id_seksi,
$id_bendung,
$tanggal_input,
$jam,
$limpasan,
$suplesi_dari_btb45b,
$sumber_setempat,
$dimanfaatkan_ke_dki,
$dimanfaatkan_ke_bekasiutara,
$q1_dimanfaatkan,
$q2,
$debet_air,
$disukatani_bsh1,
$jumlah,
$bocoran,
$q1_suplesi_ketarumbarat,
$pintu_penguras,
$suplesi_dari_btb34b,
$dimanfaatkan_ke_bekasibarat,
$dimanfaatkan_ke_sukatani,
$pelimpas_kiri,
$pelimpas_kanan,
$saluran_induk_kiri,
$saluran_induk_kanan,
$q1,
$tma,
$debet,
$keterangan) {
        $data = array(
'id_seksi'=>$id_seksi,
'id_bendung'=>$id_bendung,
'tanggal_input'=>$tanggal_input,
'jam'=>$jam,
'limpasan'=>$limpasan,
'suplesi_dari_btb45b'=>$suplesi_dari_btb45b,
'sumber_setempat'=>$sumber_setempat,
'dimanfaatkan_ke_dki'=>$dimanfaatkan_ke_dki,
'dimanfaatkan_ke_bekasiutara'=>$dimanfaatkan_ke_bekasiutara,
'q1_dimanfaatkan'=>$q1_dimanfaatkan,
'q2'=>$q2,
'debet_air'=>$debet_air,
'disukatani_bsh1'=>$disukatani_bsh1,
'jumlah'=>$jumlah,
'bocoran'=>$bocoran,
'q1_suplesi_ketarumbarat'=>$q1_suplesi_ketarumbarat,
'pintu_penguras'=>$pintu_penguras,
'suplesi_dari_btb34b'=>$suplesi_dari_btb34b,
'dimanfaatkan_ke_bekasibarat'=>$dimanfaatkan_ke_bekasibarat,
'dimanfaatkan_ke_sukatani'=>$dimanfaatkan_ke_sukatani,
'pelimpas_kiri'=>$pelimpas_kiri,
'pelimpas_kanan'=>$pelimpas_kanan,
'saluran_induk_kiri'=>$saluran_induk_kiri,
'saluran_induk_kanan'=>$saluran_induk_kanan,
'q1'=>$q1,
'tma'=>$tma,
'debet'=>$debet,
'keterangan'=>$keterangan);
        $this->db->insert('debet_air', $data);
    }

    function getdebet_airid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('debet_air');
        return $query;
    }

    function updatedebet_air(
$id, 
$id_seksi,
$id_bendung,
$tanggal_input,
$jam,
$limpasan,
$suplesi_dari_btb45b,
$sumber_setempat,
$dimanfaatkan_ke_dki,
$dimanfaatkan_ke_bekasiutara,
$q1_dimanfaatkan,
$q2,
$debet_air,
$disukatani_bsh1,
$jumlah,
$bocoran,
$q1_suplesi_ketarumbarat,
$pintu_penguras,
$suplesi_dari_btb34b,
$dimanfaatkan_ke_bekasibarat,
$dimanfaatkan_ke_sukatani,
$pelimpas_kiri,
$pelimpas_kanan,
$saluran_induk_kiri,
$saluran_induk_kanan,
$q1,
$tma,
$debet,
$keterangan) {
            $data = array(
            'id_seksi'=>$id_seksi,
'id_bendung'=>$id_bendung,
'tanggal_input'=>$tanggal_input,
'jam'=>$jam,
'limpasan'=>$limpasan,
'suplesi_dari_btb45b'=>$suplesi_dari_btb45b,
'sumber_setempat'=>$sumber_setempat,
'dimanfaatkan_ke_dki'=>$dimanfaatkan_ke_dki,
'dimanfaatkan_ke_bekasiutara'=>$dimanfaatkan_ke_bekasiutara,
'q1_dimanfaatkan'=>$q1_dimanfaatkan,
'q2'=>$q2,
'debet_air'=>$debet_air,
'disukatani_bsh1'=>$disukatani_bsh1,
'jumlah'=>$jumlah,
'bocoran'=>$bocoran,
'q1_suplesi_ketarumbarat'=>$q1_suplesi_ketarumbarat,
'pintu_penguras'=>$pintu_penguras,
'suplesi_dari_btb34b'=>$suplesi_dari_btb34b,
'dimanfaatkan_ke_bekasibarat'=>$dimanfaatkan_ke_bekasibarat,
'dimanfaatkan_ke_sukatani'=>$dimanfaatkan_ke_sukatani,
'pelimpas_kiri'=>$pelimpas_kiri,
'pelimpas_kanan'=>$pelimpas_kanan,
'saluran_induk_kiri'=>$saluran_induk_kiri,
'saluran_induk_kanan'=>$saluran_induk_kanan,
'q1'=>$q1,
'tma'=>$tma,
'debet'=>$debet,
'keterangan'=>$keterangan);
        $this->db->where('id', $id);
        $this->db->update('dab_bekasi', $data);
    }

    function deldebet_air($id) {
        $this->db->delete('debet_air', array('id' => $id));
    }

}

?>