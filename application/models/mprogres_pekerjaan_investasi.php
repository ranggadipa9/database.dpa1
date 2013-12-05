<?php

class Mprogres_pekerjaan_investasi extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getprogres_pekerjaan_investasi() {
        return $this->db->query('SELECT
    progres_pekerjaan_investasi.*
    , mata_anggaran.mata_anggaran
FROM
    dpa1.progres_pekerjaan_investasi
    LEFT JOIN dpa1.mata_anggaran 
        ON (progres_pekerjaan_investasi.id_mata_anggaran = mata_anggaran.id);');
    }

    function addprogres_pekerjaan_investasi($id_mata_anggaran, $uraian_pekerjaan, $biaya_program, $biaya_realisasi, $biaya_sisa, $nomor_kontrak, $tanggal_kontrak, $rekanan, $waktu, $progres, $keterangan) {
        $data = array('id_mata_anggaran' => $id_mata_anggaran,
            'uraian_pekerjaan' => $uraian_pekerjaan,
            'biaya_program' => $biaya_program,
            'biaya_realisasi' => $biaya_realisasi,
            'biaya_sisa' => $biaya_sisa,
            'nomor_kontrak' => $nomor_kontrak,
            'tanggal_kontrak' => $tanggal_kontrak,
            'rekanan' => $rekanan,
            'waktu' => $waktu,
            'progres' => $progres,
            'keterangan' => $keterangan);
        $this->db->insert('progres_pekerjaan_investasi', $data);
    }

    function getprogres_pekerjaan_investasiid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('progres_pekerjaan_investasi');
        return $query;
    }

    function updateprogres_pekerjaan_investasi($id, $id_mata_anggaran, $uraian_pekerjaan, $biaya_program, $biaya_realisasi, $biaya_sisa, $nomor_kontrak, $tanggal_kontrak, $rekanan, $waktu, $progres, $keterangan) {
            $data = array('id_mata_anggaran' => $id_mata_anggaran,
            'uraian_pekerjaan' => $uraian_pekerjaan,
            'biaya_program' => $biaya_program,
            'biaya_realisasi' => $biaya_realisasi,
            'biaya_sisa' => $biaya_sisa,
            'nomor_kontrak' => $nomor_kontrak,
            'tanggal_kontrak' => $tanggal_kontrak,
            'rekanan' => $rekanan,
            'waktu' => $waktu,
            'progres' => $progres,
            'keterangan' => $keterangan);
        $this->db->where('id', $id);
        $this->db->update('progres_pekerjaan_investasi', $data);
    }

    function delprogres_pekerjaan_investasi($id) {
        $this->db->delete('progres_pekerjaan_investasi', array('id' => $id));
    }

}

?>