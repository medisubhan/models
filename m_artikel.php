<?php class M_artikel extends CI_Model {

    var $judul   = '';
    var $isi = '';
    var $tanggal    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     function get10ArtikelTerbaru()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }
    function tambahArtikel()
    {
        $this->judul   = $_POST['judul']; 
        $this->isi = $_POST['isi'];
        $this->tanggal    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->judul  = $_POST['judul'];
        $this->isi 	= $_POST['isi'];
        $this->tanggal    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
}
