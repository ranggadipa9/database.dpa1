<?php

class Mtanam_gadu extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function gettanam_gadu() {
//        return $this->db->query('SELECT
//    tanam_gadu.*
//    , seksi.seksi
//    , saluran_tanam.saluran_tanam
//    , golongan_tanam.golongan_tanam
//FROM
//    dpa1.tanam_gadu
//    LEFT JOIN dpa1.saluran_tanam 
//        ON (tanam_gadu.id_saluran_tanam = saluran_tanam.id)
//    LEFT JOIN dpa1.golongan_tanam 
//        ON (tanam_gadu.id_golongan_tanam = golongan_tanam.id)
//    LEFT JOIN dpa1.seksi 
//        ON (tanam_gadu.id_seksi = seksi.id);');
 
  $query = "SELECT
    tanam_gadu.*
    , seksi.seksi
    , saluran_tanam.saluran_tanam
    , golongan_tanam.golongan_tanam
FROM
    dpa1.tanam_gadu
    LEFT JOIN dpa1.saluran_tanam 
        ON (tanam_gadu.id_saluran_tanam = saluran_tanam.id)
    LEFT JOIN dpa1.golongan_tanam 
        ON (tanam_gadu.id_golongan_tanam = golongan_tanam.id)
    LEFT JOIN dpa1.seksi 
        ON (tanam_gadu.id_seksi = seksi.id) ";
        
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
		$query .= " ORDER BY tanam_gadu.id ";
                return $this->db->query($query);         
        
        
        }

    function addtanam_gadu($tanggal_input, $daerah_irigasi, $id_seksi, $id_saluran_tanam, $kabupaten, $kecamatan, $nama_areal, 
                              $id_golongan_tanam, $target_luas, $target_bibit, $target_garap, $target_tanam,
                              $target_panen, $target_jumlah, $target_persen, $target_palawija, $target_bera,
                              $target_puso, $luar_target_bibit, $luar_target_garap, $luar_target_tanam, $luar_target_panen,
                              $luar_target_jumlah, $luar_target_palawija, $keterangan) {
        $data = array('tanggal_input' => $tanggal_input,
            'daerah_irigasi' => $daerah_irigasi,
            'id_seksi' => $id_seksi,
            'id_saluran_tanam' => $id_saluran_tanam,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'nama_areal' => $nama_areal,
            'id_golongan_tanam' => $id_golongan_tanam,
            'target_luas' => $target_luas,
            'target_bibit' => $target_bibit,
            'target_garap' => $target_garap,
            'target_tanam' => $target_tanam,
            'target_panen' => $target_panen,
            'target_jumlah' => $target_jumlah,
            'target_persen' => $target_persen,
            'target_palawija' => $target_palawija,
            'target_bera' => $target_bera,
            'target_puso' => $target_puso,
            'luar_target_bibit' => $luar_target_bibit,
            'luar_target_garap' => $luar_target_garap,
            'luar_target_tanam' => $luar_target_tanam,
            'luar_target_panen' => $luar_target_panen,
            'luar_target_jumlah' => $luar_target_jumlah,
            'luar_target_palawija' => $luar_target_palawija,
            'keterangan' => $keterangan);
        $this->db->insert('tanam_gadu', $data);
    }

    function gettanam_gaduid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tanam_gadu');
        return $query;
    }

    function updatetanam_gadu($id, $tanggal_input, $daerah_irigasi, $id_seksi, $id_saluran_tanam, $kabupaten, $kecamatan, $nama_areal, 
                              $id_golongan_tanam, $target_luas, $target_bibit, $target_garap, $target_tanam,
                              $target_panen, $target_jumlah, $target_persen, $target_palawija, $target_bera,
                              $target_puso, $luar_target_bibit, $luar_target_garap, $luar_target_tanam, $luar_target_panen,
                              $luar_target_jumlah, $luar_target_palawija, $keterangan) {
            $data = array('tanggal_input' => $tanggal_input,
            'daerah_irigasi' => $daerah_irigasi,
            'id_seksi' => $id_seksi,
            'id_saluran_tanam' => $id_saluran_tanam,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'nama_areal' => $nama_areal,
            'id_golongan_tanam' => $id_golongan_tanam,
            'target_luas' => $target_luas,
            'target_bibit' => $target_bibit,
            'target_garap' => $target_garap,
            'target_tanam' => $target_tanam,
            'target_panen' => $target_panen,
            'target_jumlah' => $target_jumlah,
            'target_persen' => $target_persen,
            'target_palawija' => $target_palawija,
            'target_bera' => $target_bera,
            'target_puso' => $target_puso,
            'luar_target_bibit' => $luar_target_bibit,
            'luar_target_garap' => $luar_target_garap,
            'luar_target_tanam' => $luar_target_tanam,
            'luar_target_panen' => $luar_target_panen,
            'luar_target_jumlah' => $luar_target_jumlah,
            'luar_target_palawija' => $luar_target_palawija,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('tanam_gadu', $data);
    }

    function deltanam_gadu($id) {
        $this->db->delete('tanam_gadu', array('id' => $id));
    }

}

?>