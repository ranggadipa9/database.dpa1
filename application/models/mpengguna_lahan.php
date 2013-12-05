<?php

class Mpengguna_lahan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getpengguna_lahan() {
        
        $query = "SELECT
    pengguna_lahan.*
    , seksi.seksi
FROM
    dpa1.pengguna_lahan
    LEFT JOIN dpa1.seksi 
        ON (pengguna_lahan.id_seksi = seksi.id) ";
        
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
		$query .= " ORDER BY pengguna_lahan.id ";
                return $this->db->query($query);
    }

    function addpengguna_lahan($nama, $alamat, $berlaku_mulai, $berlaku_akhir, $id_seksi, $lokasi, $no_sipls,
            $penggunaan_1, $luas_1, $tarif_1, $penggunaan_2, $luas_2, $tarif_2, $penggunaan_3, $luas_3,
                $tarif_3, $penggunaan_4, $luas_4, $tarif_4, $penggunaan_5, $luas_5, $tarif_5, $jumlah, $ppn, $administrasi,
                $jumlah_sewa) {
        $data = array('nama' => $nama,
            'alamat' => $alamat,
            'berlaku_mulai' => $berlaku_mulai,
            'berlaku_akhir' => $berlaku_akhir,
            'id_seksi' => $id_seksi,
            'lokasi' => $lokasi,
            'no_sipls' => $no_sipls,
            
            'penggunaan_1' => $penggunaan_1,
            'luas_1' => $luas_1,
            'tarif_1' => $tarif_1,
            'penggunaan_2' => $penggunaan_2,
            'luas_2' => $luas_2,
            'tarif_2' => $tarif_2,
            'penggunaan_3' => $penggunaan_3,
            'luas_3' => $luas_3,
            'tarif_3' => $tarif_3,
            'penggunaan_4' => $penggunaan_4,
            'luas_4' => $luas_4,
            'tarif_4' => $tarif_4,
            'penggunaan_5' => $penggunaan_5,
            'luas_5' => $luas_5,
            'tarif_5' => $tarif_5,
            
            'jumlah' => $jumlah,
            'ppn' => $ppn,
            'administrasi' => $administrasi,
            'jumlah_sewa' => $jumlah_sewa
                        
            );
        $this->db->insert('pengguna_lahan', $data);
    }

    function getpengguna_lahanid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pengguna_lahan');
        return $query;
    }

    function updatepengguna_lahan($id, $nama, $alamat, $berlaku_mulai, $berlaku_akhir, $id_seksi, $lokasi, $no_sipls,
            $penggunaan_1, $luas_1, $tarif_1, $penggunaan_2, $luas_2, $tarif_2, $penggunaan_3, $luas_3,
                $tarif_3, $penggunaan_4, $luas_4, $tarif_4, $penggunaan_5, $luas_5, $tarif_5, $jumlah, $ppn, $administrasi,
                $jumlah_sewa) {
        $data = array('nama' => $nama,
            'alamat' => $alamat,
            'berlaku_mulai' => $berlaku_mulai,
            'berlaku_akhir' => $berlaku_akhir,
            'id_seksi' => $id_seksi,
            'lokasi' => $lokasi,
            'no_sipls' => $no_sipls,
            
            'penggunaan_1' => $penggunaan_1,
            'luas_1' => $luas_1,
            'tarif_1' => $tarif_1,
            'penggunaan_2' => $penggunaan_2,
            'luas_2' => $luas_2,
            'tarif_2' => $tarif_2,
            'penggunaan_3' => $penggunaan_3,
            'luas_3' => $luas_3,
            'tarif_3' => $tarif_3,
            'penggunaan_4' => $penggunaan_4,
            'luas_4' => $luas_4,
            'tarif_4' => $tarif_4,
            'penggunaan_5' => $penggunaan_5,
            'luas_5' => $luas_5,
            'tarif_5' => $tarif_5,
            
            'jumlah' => $jumlah,
            'ppn' => $ppn,
            'administrasi' => $administrasi,
            'jumlah_sewa' => $jumlah_sewa
            
            );
        $this->db->where('id', $id);
        $this->db->update('pengguna_lahan', $data);
    }
    
function addperpanjangan ($id, $nama, $alamat, $berlaku_mulai, $berlaku_akhir, $id_seksi, $lokasi, $no_sipls,
            $penggunaan_1, $luas_1, $tarif_1, $penggunaan_2, $luas_2, $tarif_2, $penggunaan_3, $luas_3,
                $tarif_3, $penggunaan_4, $luas_4, $tarif_4, $penggunaan_5, $luas_5, $tarif_5, $jumlah, $ppn, $administrasi,
                $jumlah_sewa, $sipls, $tgl_perpanjangan) {
        $data = array('nama' => $nama,
            'alamat' => $alamat,
            'berlaku_mulai' => $berlaku_mulai,
            'berlaku_akhir' => $berlaku_akhir,
            'id_seksi' => $id_seksi,
            'lokasi' => $lokasi,
            'no_sipls' => $no_sipls,
            
            'penggunaan_1' => $penggunaan_1,
            'luas_1' => $luas_1,
            'tarif_1' => $tarif_1,
            'penggunaan_2' => $penggunaan_2,
            'luas_2' => $luas_2,
            'tarif_2' => $tarif_2,
            'penggunaan_3' => $penggunaan_3,
            'luas_3' => $luas_3,
            'tarif_3' => $tarif_3,
            'penggunaan_4' => $penggunaan_4,
            'luas_4' => $luas_4,
            'tarif_4' => $tarif_4,
            'penggunaan_5' => $penggunaan_5,
            'luas_5' => $luas_5,
            'tarif_5' => $tarif_5,
            
            'jumlah' => $jumlah,
            'ppn' => $ppn,
            'administrasi' => $administrasi,
            'jumlah_sewa' => $jumlah_sewa,
            
            
            'sipls' => $sipls,
            'tgl_perpanjangan' => $tgl_perpanjangan
            
            );
        $this->db->where('id', $id);
        $this->db->update('pengguna_lahan', $data);
    }

  function addperpanjangan_1 ($id, $sipls, $tgl_perpanjangan) {
        $data = array('sipls' => $sipls,
            'tgl_perpanjangan' => $tgl_perpanjangan);
        $this->db->where('id', $id);
        $this->db->update('populasi_lahan', $data);
    }
  
    
    function delpengguna_lahan($id) {
        $this->db->delete('pengguna_lahan', array('id' => $id));
    }

}

?>