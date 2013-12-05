<?php

class Mpengguna extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getpengguna() {
        //$this->db->select('pengguna.id
        //, pengguna.pengguna
        //, pengguna.kata_kunci
        //, pengguna.id_hak_akses
        //, hak_akses.jenis');
        //$this->db->from('pengguna');
        //$this->db->join('hak_akses', 'hak_akses.id=pengguna.id_hak_akses');
        //$query = $this->db->get();
        //return $query;
        return $this->db->query('SELECT
    pengguna.*
    , seksi.seksi
    , hak_akses.jenis
    , pegawai.nama
FROM
    dpa1.pengguna
    LEFT JOIN dpa1.hak_akses 
        ON (pengguna.id_hak_akses = hak_akses.id)
    LEFT JOIN dpa1.seksi 
        ON (pengguna.id_seksi = seksi.id)
    LEFT JOIN dpa1.pegawai
        ON (pengguna.id_pegawai = pegawai.id)');
    }

    function addpengguna($pengguna, $katakunci, $jenis, $seksi, $pegawai) {
        $data = array('pengguna' => $pengguna,
            'kata_kunci' => $katakunci,
            'id_hak_akses' => $jenis,
            'id_seksi' => $seksi,
            'id_pegawai' => $pegawai);
        $this->db->insert('pengguna', $data);
    }

    function getpenggunaid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pengguna');
        return $query;
    }

    function updatepengguna($id, $pengguna, $katakunci, $jenis, $seksi, $pegawai) {
        $data = array('pengguna' => $pengguna,
            'kata_kunci' => $katakunci,
            'id_hak_akses' => $jenis,
            'id_seksi' => $seksi,
            'id_pegawai' => $pegawai
        );

        $this->db->where('id', $id);
        $this->db->update('pengguna', $data);
    }

    function delpengguna($id) {
        $this->db->delete('pengguna', array('id' => $id));
    }

}

?>