<?php

class Minvent_area extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getinvent_area() {
//        return $this->db->query('SELECT
 //   invent_area.*
 //   , saluran_sekunder.saluran_sekunder
 //   , pengamat.pengamat
 //   , seksi.seksi
//FROM
 //   dpa1.invent_area
 //   LEFT JOIN dpa1.seksi 
 //       ON (invent_area.id_seksi = seksi.id)
 //   LEFT JOIN dpa1.pengamat 
 //       ON (invent_area.id_pengamat = pengamat.id)
 //   LEFT JOIN dpa1.saluran_sekunder 
 //       ON (invent_area.id_saluran_sekunder = saluran_sekunder.id);');
    
   $query = "SELECT
    invent_area.*
    , saluran_sekunder.saluran_sekunder
    , pengamat.pengamat
    , seksi.seksi
FROM
    dpa1.invent_area
    LEFT JOIN dpa1.seksi 
        ON (invent_area.id_seksi = seksi.id)
    LEFT JOIN dpa1.pengamat 
        ON (invent_area.id_pengamat = pengamat.id)
    LEFT JOIN dpa1.saluran_sekunder 
        ON (invent_area.id_saluran_sekunder = saluran_sekunder.id) ";
        
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
		$query .= " ORDER BY invent_area.id ";
                return $this->db->query($query);     
        
        
    }

    function addinvent_area($tanggal, $daerah_irigasi, $id_saluran_sekunder, $blok, $tahun_lalu, $tahun_ini, $selisih, $id_pengamat, $id_seksi, $kecamatan, $kabupaten, $keterangan) {
        $data = array('tanggal' => $tanggal,
			'daerah_irigasi' => $daerah_irigasi,
            'id_saluran_sekunder' => $id_saluran_sekunder,
            'blok' => $blok,
            'tahun_lalu' => $tahun_lalu,
            'tahun_ini' => $tahun_ini,
            'selisih' => $selisih,
            'id_pengamat' => $id_pengamat,
            'id_seksi' => $id_seksi,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'keterangan' => $keterangan);
        $this->db->insert('invent_area', $data);
    }

    function getinvent_areaid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('invent_area');
        return $query;
    }

    function updateinvent_area($id, $tanggal, $daerah_irigasi, $id_saluran_sekunder, $blok, $tahun_lalu, $tahun_ini, $selisih, $id_pengamat, $id_seksi, $kecamatan, $kabupaten, $keterangan) {
            $data = array('tanggal' => $tanggal,
			'daerah_irigasi' => $daerah_irigasi,
            'id_saluran_sekunder' => $id_saluran_sekunder,
            'blok' => $blok,
            'tahun_lalu' => $tahun_lalu,
            'tahun_ini' => $tahun_ini,
            'selisih' => $selisih,
            'id_pengamat' => $id_pengamat,
            'id_seksi' => $id_seksi,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('invent_area', $data);
    }

    function delinvent_area($id) {
        $this->db->delete('invent_area', array('id' => $id));
    }

}

?>