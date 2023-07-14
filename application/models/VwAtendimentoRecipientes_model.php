<?php

class VwAtendimentoRecipientes_model extends CI_Model
{

    public $Nome;
    public $Capacidade;
    public $Id;
    public $IdAtendimento;
    public $IdRecipiente;
    public $DataCadastro;

    
    public function buscarPorAtendimento()
    {
        $this->db->where('IdAtendimento', $this->IdAtendimento);
        return $this->db->get('vwatendimentorecipientes');
    }


}