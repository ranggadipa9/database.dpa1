<?php

class Mtransaksi_air extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function gettransaksi_air() {
        //return $this->db->query('SELECT transaksi_air.* , pemakaian_air.nip, pemakaian_air.nama 
		//	FROM sipeg.transaksi_air INNER JOIN sipeg.pemakaian_air ON (transaksi_air.id_pemakaian_air = pemakaian_air.id)');
		$query = "SELECT
    transaksi_air.*
    , realisasi_air.realisasi
    , realisasi_air.keterangan
    , seksi.seksi
    , balai.balai
    , pemakaian_air.*
FROM
    dpa1.transaksi_air
    LEFT JOIN dpa1.pemakaian_air 
        ON (transaksi_air.id_pemakaian_air = pemakaian_air.id)
    LEFT JOIN dpa1.realisasi_air 
        ON (transaksi_air.id_realisasi_air = realisasi_air.id)
    LEFT JOIN dpa1.seksi 
        ON (pemakaian_air.id_seksi = seksi.id)
    LEFT JOIN dpa1.balai 
        ON (pemakaian_air.id_balai = balai.id) ";
                
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
	
		$query .= " ORDER BY pemakaian_air.pelanggan ";
		return $this->db->query($query);
    }

    function addtransaksi_air($pelanggan, $tgl_faktur, $nomor_faktur, $tarif, $titipan, $fee, 
                $jumlah_tagihan, $materai) {
        $data = array('id_pemakaian_air' => $pelanggan,
            'tgl_faktur' => $tgl_faktur,
            'nomor_faktur' => $nomor_faktur,
            'tarif' => $tarif,
            'titipan' => $titipan,
            'fee' => $fee,
            'materai' => $materai,
            'jumlah_tagihan' => $jumlah_tagihan);
        $this->db->insert('transaksi_air', $data);
    }

    function updatetransaksi_air($id, $pelanggan, $tgl_faktur, $nomor_faktur, $tarif, $titipan, $fee, 
                $jumlah_tagihan, $materai) {
        $data = array('id_pemakaian_air' => $pelanggan,
            'tgl_faktur' => $tgl_faktur,
            'nomor_faktur' => $nomor_faktur,
            'tarif' => $tarif,
            'titipan' => $titipan,
            'fee' => $fee,
            'materai' => $materai,
            'jumlah_tagihan' => $jumlah_tagihan);
        $this->db->where('id', $id);
        $this->db->update('transaksi_air', $data);
    }

    function gettransaksi_airid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('transaksi_air');
        return $query;
    }
    function gettransaksi_airidpemakaian_air($id_pemakaian_air){
        $this->db->where('id_pemakaian_air', $id_pemakaian_air);
        $query = $this->db->get('transaksi_air');
        return $query;
        
    }

    function deltransaksi_air($id) {
        $this->db->delete('transaksi_air', array('id' => $id));
    }

}

?>