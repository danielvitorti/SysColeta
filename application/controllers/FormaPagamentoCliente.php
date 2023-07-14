<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FormaPagamentoCliente extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("ControleAcesso");
        $this->controleacesso->controlar();
        if ((int)$this->session->userdata["nivelAcesso"] > 1) :
            redirect("login/sair");
        endif;
    }
	
    public function salvarFormaPagamentoCliente()
    {
		header('Content-Type: application/json');		
        if($_POST){
			
            $IdCliente = base64_decode($this->input->post('Id'));
			$this->FormaPagamentoCliente_model->IdCliente    = $IdCliente;
			$this->FormaPagamentoCliente_model->IdFormaPagamento = $this->input->post('IdFormaPagamento') ;					
			$this->FormaPagamentoCliente_model->Descricao = $this->input->post('DescricaoFormaPagamento');
			$this->FormaPagamentoCliente_model->DataCadastro = date('Y-m-d h:i:s');
			$this->FormaPagamentoCliente_model->Quantidade = $this->input->post('QuantidadeFormaPagamento');
			$this->FormaPagamentoCliente_model->inserir();				
			echo json_encode("ok");
		}
        else 
        {
            echo json_encode("erro");
        }
    }
	public function excluirFormaPagamentoCliente()
	{
		header('Content-Type: application/json');		
		
        if($_POST)
		{
			$IdForma = $this->input->post('IdForma');
			$this->FormaPagamentoCliente_model->Id = $IdForma;
			$this->FormaPagamentoCliente_model->excluir();            
			echo json_encode("ok");
		}
		else
		{
			echo json_encode("erro");
		}
	}

}
