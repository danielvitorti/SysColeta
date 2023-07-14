<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RecipienteCliente extends CI_Controller
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
    public function salvarRecipienteCliente()
    {
		header('Content-Type: application/json');	
        if($_POST)
		{
            
            $IdCliente = base64_decode($this->input->post('Id'));
			
			$this->RecipienteCliente_model->IdCliente    = $IdCliente;
			$this->RecipienteCliente_model->IdRecipiente = $this->input->post('IdRecipiente');
			$this->RecipienteCliente_model->Descricao = $this->input->post('DescricaoRecipiente');
			$this->RecipienteCliente_model->DataCadastro = date('Y-m-d h:i:s');
			$this->RecipienteCliente_model->Quantidade = $this->input->post('QuantidadeRecipiente');
			$this->RecipienteCliente_model->inserir();
            
			echo json_encode("ok");
        }
        else 
        {
            echo json_encode("erro");
        }
    }
	public function excluirRecipienteCliente()
	{
		header('Content-Type: application/json');		
		
        if($_POST)
		{
			$IdRecipienteCliente = $this->input->post('IdRecipienteCliente');
			$this->RecipienteCliente_model->Id = $IdRecipienteCliente;
			$this->RecipienteCliente_model->excluir();            
			echo json_encode("ok");
		}
		else
		{
			echo json_encode("erro");
		}			
	}	
}
