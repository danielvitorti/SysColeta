<?php

class EtiquetaCliente_model extends CI_Model
{

    public $Id;
    public $IdEtiqueta;
    public $IdCliente;

    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('etiquetacliente', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('etiquetacliente', $this);
    }

    public function excluir()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->delete('etiquetacliente', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('etiquetacliente');
    }

    public function buscarTodas()
    {
        return $this->db->get('etiquetacliente');
    }

    public function buscarPorCliente()
    {
        $this->db->like('IdCliente', $this->IdCliente);
        return $this->db->get('etiquetacliente');
    }


    public function buscarPorClienteAlteracao()
    {
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('etiquetacliente');
    }

    public function buscarPorEtiqueta()
    {
        $this->db->like('IdEtiqueta', $this->IdEtiqueta);
        return $this->db->get('etiquetacliente');
    }

    public function excluirPorCliente()
    {
        $array = array('IdCliente' => $this->IdCliente);
        return $this->db->delete('etiquetacliente', $array);
    }
	
	public function countPorEtiqueta()
	{
		return $this->db->where('IdEtiqueta', $this->IdEtiqueta)->	
						  from('etiquetacliente')->count_all_results();		
	}

}