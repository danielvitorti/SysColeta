<?php

class VwColeta_model extends CI_Model
{

    public $Recipiente;
    public $Quantidade;
    public $Pagamento;
    public $Cliente;
    public $Motorista;
    public $IdCliente;

    public function __construct() 
    {
        parent::__construct();
    }

    public function buscar()
    {

        $this->db->like('Recipiente', $this->Recipiente);
        $this->db->or_like('Quantidade', $this->Quantidade);
        $this->db->or_like('Pagamento', $this->Pagamento);  
        $this->db->or_like('Cliente', $this->Cliente);   
        $this->db->or_like('Motorista', $this->Motorista);  
        return $this->db->get('vwcoleta');

    }

    public function buscarPorCliente()
    {
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('vwcoleta');
    }
   

}