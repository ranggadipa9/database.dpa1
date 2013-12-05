<?php

class Mprogres_pekerjaan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getprogres_pekerjaan() {
        return $this->db->query('SELECT
    progres_pekerjaan.*
    , mata_anggaran.mata_anggaran
FROM
    dpa1.progres_pekerjaan
    LEFT JOIN dpa1.mata_anggaran 
        ON (progres_pekerjaan.id_mata_anggaran = mata_anggaran.id);');
    }

    function addprogres_pekerjaan($id_mata_anggaran, $uraian_pekerjaan, $biaya_program, $biaya_realisasi, $biaya_sisa, $nomor_kontrak, $tanggal_kontrak, $rekanan, $waktu, $progres, $keterangan) {
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
        $this->db->insert('progres_pekerjaan', $data);
    }

    function getprogres_pekerjaanid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('progres_pekerjaan');
        return $query;
    }

    function updateprogres_pekerjaan($id, $id_mata_anggaran, $uraian_pekerjaan, $biaya_program, $biaya_realisasi, $biaya_sisa, $nomor_kontrak, $tanggal_kontrak, $rekanan, $waktu, $progres, $keterangan) {
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
        $this->db->update('progres_pekerjaan', $data);
    }

    function delprogres_pekerjaan($id) {
        $this->db->delete('progres_pekerjaan', array('id' => $id));
    }

}

?>