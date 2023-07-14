<?php

class VwCidades_model extends CI_Model
{


    public $Cidade;
    
    public function buscarTodas()
    {
        return $this->db->get('vwcidade');
    }

}