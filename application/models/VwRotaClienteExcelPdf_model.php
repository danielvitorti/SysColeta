<?php

class VwRotaClienteExcelPdf_model extends CI_Model
{

    public $IdRota;
    public $Cliente;
    public $DataAtendimento;
    public $QuantidadeColetada;
    public $FormaPagamento;
    

    public function buscarPorRota()
    {
        $this->db->where('IdRota',$this->IdRota);
        return $this->db->get('vwrotaclienteexcelpdf');
    }
    

}