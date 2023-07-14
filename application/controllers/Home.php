<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("ControleAcesso");
        $this->controleacesso->controlar();       
    }


    public function index() 
    {   
    
        $result["totalRotas"]       = is_null($this->Rota_model->countAll()) ? 0: $this->Rota_model->countAll(); 
        $result["totalClientes"]    = is_null($this->Cliente_model->countAll()) ? 0: $this->Cliente_model->countAll();
        $result["totalMotoristas"]  = is_null($this->Motorista_model->countAll()) ? 0: $this->Motorista_model->countAll();
        $result["totalColeta"]      = is_null($this->Coleta_model->totalColetado()->Quantidade) ? 0 : $this->Coleta_model->totalColetado()->Quantidade;
		$result["totalRecipientes"]  = is_null($this->Recipiente_model->countAll()) ? 0: $this->Recipiente_model->countAll();
		
		$this->Rota_model->Status = 1;
		$result['totalRotasEmAberto'] = is_null($this->Rota_model->countPorStatus()) ? 0: $this->Rota_model->countPorStatus(); 
		
		$this->Rota_model->Status = 2;
		$result['totalRotasEmAndamento'] = is_null($this->Rota_model->countPorStatus()) ? 0: $this->Rota_model->countPorStatus(); 
		
		$this->Rota_model->Status = 3;
		$result['totalRotasAtendimentoRealizado'] = is_null($this->Rota_model->countPorStatus()) ? 0: $this->Rota_model->countPorStatus(); 
		
		$this->Rota_model->Status = 4;
		$result['totalRotasFinalizadas'] = is_null($this->Rota_model->countPorStatus()) ? 0: $this->Rota_model->countPorStatus(); 
		
		
		//--- Indicadores dos clientes por etiqueta --- //
		
		$this->EtiquetaCliente_model->IdEtiqueta = 2; // Clientes comerciais
		
		$result['totalClientesComerciais'] = is_null($this->EtiquetaCliente_model->countPorEtiqueta()) ? 0: $this->EtiquetaCliente_model->countPorEtiqueta(); 
		
		$this->EtiquetaCliente_model->IdEtiqueta = 5; // Clientes condomínio
		
		$result['totalClientesCondominio'] = is_null($this->EtiquetaCliente_model->countPorEtiqueta()) ? 0: $this->EtiquetaCliente_model->countPorEtiqueta(); 
		
		$this->EtiquetaCliente_model->IdEtiqueta = 15; // Clientes ponto de coleta
		
		$result['totalClientesPontoColeta'] = is_null($this->EtiquetaCliente_model->countPorEtiqueta()) ? 0: $this->EtiquetaCliente_model->countPorEtiqueta(); 
		
		//--- Fim Indicadores dos clientes por etiqueta --- //
		
		
		//-- Litros Coletados --//
		
		
		//$result['totalLitrosColetados'] = is_null($this->Atendimento_model->totalLitrosColetados()->row_array()["QuantidadeColetada"]) ? 0: $this->Atendimento_model->totalLitrosColetados()->row_array()["QuantidadeColetada"]; 
		$totalLitrosColetados = is_null($this->Atendimento_model->totalLitrosColetados()->row_array()["QuantidadeColetada"]) ? 0: $this->Atendimento_model->totalLitrosColetados()->row_array()["QuantidadeColetada"]; 
		$totalLitrosColetados = preg_replace('/([\d]{1,})([\d]{3})/','$1.$2',$totalLitrosColetados);
		// -- Separação de casas de milhar por ponto
		$result['totalLitrosColetados'] = $totalLitrosColetados;
		// ---------------------------------------------------------
		//-- Litros Coletados --//
		
		
        $result['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $data['usuario']     = $this->session->userdata["usuario"];  
        
        $data['content']     = $this->load->view('home/index', $result, true);
        $this->load->view('master', $data);
        
    }

}
?>