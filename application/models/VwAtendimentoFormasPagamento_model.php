<?php

class VwAtendimentoFormasPagamento_model extends CI_Model
{

    public $IdAtendimento;
    public $Quantidade;
    public $Nome;
    public $ValorIndividual;
    public $ValorPago;


    
    public function buscarPorAtendimento()
    {
        $this->db->where('IdAtendimento', $this->IdAtendimento);
        return $this->db->get('vwatendimentoformaspagamento');
    }


}