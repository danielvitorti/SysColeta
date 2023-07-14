<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TipoPagamentoCliente extends CI_Controller
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
    public function salvarTipoPagamentoCliente()
    {
		header('Content-Type: application/json');	
        if($_POST){
			
            $IdCliente = base64_decode($this->input->post('Id'));
            
			$this->TipoPagamentoCliente_model->IdCliente    = $IdCliente;
			$this->TipoPagamentoCliente_model->IdTipoPagamento = $this->input->post('IdTipoPagamento') ;
			$this->TipoPagamentoCliente_model->Descricao = $this->input->post('DescricaoTipoPagamento');
			$this->TipoPagamentoCliente_model->DataCadastro = date('Y-m-d h:i:s');
			$this->TipoPagamentoCliente_model->Quantidade = $this->input->post('QuantidadeTipoPagamento');
			$this->TipoPagamentoCliente_model->inserir();
			echo json_encode("ok");
        }
        else 
        {
            echo json_encode("erro");
        }
    }
	public function excluirTipoPagamentoCliente()
	{
		header('Content-Type: application/json');		
		
        if($_POST)
		{
			$IdTipoPagamento = $this->input->post('IdTipoPagamento');
			$this->TipoPagamentoCliente_model->Id = $IdTipoPagamento;
			$this->TipoPagamentoCliente_model->excluir();            
			echo json_encode("ok");
		}
		else
		{
			echo json_encode("erro");
		}			
	}	
}
