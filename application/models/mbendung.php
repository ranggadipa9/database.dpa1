<?php

class Mbendung extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getbendung() {
        return $this->db->query('SELECT
    bendung.*
    , seksi.seksi
FROM
    dpa1.bendung
    LEFT JOIN dpa1.seksi 
        ON (bendung.id_seksi = seksi.id);');
    }

    function getbendungid($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bendung');
        return $query;
    }

    function addbendung($bendung, $id_seksi) {
        $data = array('bendung' => $bendung,'id_seksi'=>$id_seksi);
        $this->db->insert('bendung', $data);
    }

    function updatebendung($id, $bendung, $id_seksi) {
        $data = array('bendung' => $bendung,'id_seksi'=>$id_seksi);

        $this->db->where('id', $id);
        $this->db->update('bendung', $data);
    }

    function delbendung($id) {
        $this->db->delete('bendung', array('id' => $id));
    }

}

?>