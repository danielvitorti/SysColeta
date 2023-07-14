<?php
class VwRotaturno_model extends CI_Model
{

    public $IdRota;
    public $IdTurno;
    public $Nome;


    public function __construct() 
    {
        parent::__construct();
    }
    
    public function buscarPorRota()
    {
        $this->db->where('IdRota', $this->IdRota);
        return $this->db->get('vwrotaturno');
    }

    public function buscarTodas()
    {
        return $this->db->get('vwrotaturno');
    }
    
    public function buscarPorTurno()
    {
        $this->db->where('IdTurno', $this->IdTurno);
        return $this->db->get('vwrotaturno');
    }
}