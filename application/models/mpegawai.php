<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mpegawai extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function lookuppegawai() {
        return $this->db->get('pegawai');
    }
    function getpegawai() {
	return $this->db->query('SELECT
    pegawai.*
    , seksi.seksi
FROM
    dpa1.pegawai
    LEFT JOIN dpa1.seksi 
        ON (pegawai.id_seksi = seksi.id)');
		
    }
	
   function addpegawai($nip, $nama, $tempat_lahir, $tanggal_lahir, $alamat, $seksi) {
        $data = array('nip' => $nip,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'id_seksi' => $seksi);
        $this->db->insert('pegawai', $data);
    }

    function updatepegawai($id, $nip, $nama, $tempat_lahir, $tanggal_lahir, $alamat, $seksi) {
        $data = array('nip' => $nip,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'id_seksi' => $seksi);

        $this->db->where('id', $id);
        $this->db->update('pegawai', $data);
    }

    function getpegawaiid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pegawai');
        return $query;
    }

    function delpegawai($id) {
        $this->db->delete('pegawai', array('id' => $id));
    }

}