<?php

class RelatorioCliente_model extends CI_Model
{

    public $Recipiente;
    public $Quantidade;
    public $Pagamento;
    public $DataColeta;
    public $Motorista;
    public $Veiculo;
    public $Inicio;
    public $Fim;
    public $IdCliente;
    public $IdFormaPagamento;

    public function __construct() 
    {
        parent::__construct();
    }


    public function buscarPorPeriodoCliente()
    {
        
        if(!empty($this->Inicio) && !empty($this->Fim) )
        {
             $this->db->where('DataColeta >=', $this->Inicio);
             $this->db->where('DataColeta <=', $this->Fim);
        }
        if(!empty($this->IdCliente))
        {
             $this->db->where('IdCliente',$this->IdCliente);
        }


        return $this->db->get('vwrelatorioclientes');
    }

   
}