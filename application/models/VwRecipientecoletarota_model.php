<?php

class VwRecipientecoletarota_model extends CI_Model
{

   
    public $IdRecipiente;
    public $IdColeta;
    public $Id;
    public $IdCliente;
    public $IdRota;
    public $Quantidade;
    public $Pagamento;
    public $FormaPagamento;
    public $DataCadastro;


    public function buscarPorCliente()
    {
        $this->db->where('IdCliente',$this->IdCliente);
        return $this->db->get('vwrecipientecoletarota');
    }

}