<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rota extends CI_Controller
{

    public function __construct()
    {
        error_reporting(E_ERROR | E_PARSE); // Para funcionar na KingHost
        parent::__construct();
        $this->load->library("ControleAcesso");
        $this->controleacesso->controlar();
    }

    public function index() 
    {
        
        if((int)$this->session->userdata["nivelAcesso"] > 2):
            redirect("login/sair");
        endif;
        
        $config['per_page'] = 50;

        $page = $this->input->get('page', true);
        $busca = $this->input->get('busca', true);
        
        
        $dataRotaInicial = implode('-', array_reverse(explode('/', $this->input->get('dataRotaInicial',true))));
        $dataRotaFinal = implode('-', array_reverse(explode('/', $this->input->get('dataRotaFinal',true))));
        
		$status = $this->input->get('Status', true);

        $this->db->where("Excluido","0");

        if($this->session->userdata["nivelAcesso"] == 2)
        {
            $this->db->where("IdMotorista",$this->session->userdata["IdMotorista"]);
            $this->db->where("Liberada",1);
        }

        if ($busca != '') 
        {   
            $this->db->like('Nome', $busca);
        }

        if($dataRotaInicial !="" && $dataRotaFinal !="")
        {   
            $this->db->where("DataRota >=",$dataRotaInicial);
            $this->db->where("DataRota <=",$dataRotaFinal);
        }
	
		if($status != '')
		{
			$this->db->where("Status",$status);
		}

        $tempdb = clone $this->db;

        $total_row = $tempdb->from('vwrotamotorista')->count_all_results();
      
        $this->db->limit($config['per_page'], $page);
        $this->db->order_by("Id", "desc");
        $result['rotas'] = $this->db->get('vwrotamotorista')->result_array();

        $config['base_url'] = base_url('rota')."?busca=$busca";
        $config['total_rows'] = $total_row;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';


        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-link">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active page-link"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-link">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-link">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-link">';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;Anterior';
        $config['prev_tag_open'] = '<li class="page-link">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Próximo &gt;</i>';
        $config['next_tag_open'] = '<li class="page-link">';
        $config['next_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-change');

        $this->pagination->initialize($config);
        $result['pagination']  = $this->pagination->create_links();
        $result['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $result['nome'] = $busca;
        $result['dataRotaInicial'] = $this->input->get('dataRotaInicial',true);
        $result['dataRotaFinal'] = $this->input->get('dataRotaFinal',true);
		$result['status'] = $this->input->get('Status',true);

        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('rota/index', $result, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        
        $this->load->view('master', $data);
  
    }

    public function cadastro()
    {
        
        if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;
       
        $result['clientes'] = $this->Cliente_model->buscarTodos()->result_array();  
        $result['motoristas'] = $this->Motorista_model->buscarTodos()->result_array();  
        $result['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $result['veiculos'] = $this->Veiculo_model->buscarTodos()->result_array();
        $result['turnos'] = $this->Turno_model->buscarTodos()->result_array();
        

        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('rota/cadastro', $result, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        
        $this->load->view('master', $data);
    }

    public function salvar()
    {

        if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;
        
        if(isset($_POST))
        {  
            
            $this->load->library("RotasLibrary");
            $Id = base64_decode($this->input->post('Id'));
           
            $this->Rota_model->IdMotorista    = $this->input->post('IdMotorista');
            $this->Rota_model->Nome           = $this->input->post('Nome');
            $this->Rota_model->DataRota       = implode('-', array_reverse(explode('/', $this->input->post('DataRota'))));
            $this->Rota_model->Turno          = $this->input->post('Turno');
            $this->Rota_model->Perimetro      = $this->input->post('Perimetro');
            $this->Rota_model->DataCadastro   = date('Y-m-d h:i:s');
            $this->Rota_model->Observacao     = $this->input->post('Observacao');
            $this->Rota_model->Status         = $this->input->post('Status');
            $this->Rota_model->IdVeiculo      = $this->input->post('IdVeiculo');
			

            if(isset($_POST['rotaLiberada']))
            {
                $this->Rota_model->Liberada = $this->rotaslibrary->liberarRota();
            }
            else
            {           
                $this->Rota_model->Liberada = $this->rotaslibrary->bloquearRota();
            }
            
            if($Id=="" || is_null($Id))
            {
                $IdRota = $this->Rota_model->inserir();
                
                $ordem = 1;
                
                foreach( $this->input->post('IdCliente') as $value)
                {
                    $this->RotaCliente_model->IdRota = $IdRota;
                    $this->RotaCliente_model->IdCliente = $value ;
                    $this->RotaCliente_model->DataCadastro = date('Y-m-d h:i:s');
                    $this->RotaCliente_model->ordem = $ordem;
                    $this->RotaCliente_model->inserir();
                    $ordem++;
                }

                foreach($this->input->post('Turno') as $value)
                {
                    $this->RotaTurno_model->IdRota = $IdRota;
                    $this->RotaTurno_model->IdTurno = $value;
                    $this->RotaTurno_model->DataCadastro = date('Y-m-d h:i:s');
                    $this->RotaTurno_model->inserir();
                }

            }
            else
            {
                $this->Rota_model->Id = $Id;

                $this->RotaCliente_model->IdRota = $Id;
                $this->RotaCliente_model->excluirPorRota();

                $ordem = 1;
                foreach( $this->input->post('IdCliente') as $value)
                {
                    $this->RotaCliente_model->IdRota = $Id;
                    $this->RotaCliente_model->IdCliente = $value ;
                    $this->RotaCliente_model->DataCadastro = date('Y-m-d h:i:s');
                    $this->RotaCliente_model->ordem = $ordem;
                    $this->RotaCliente_model->inserir();
                    $ordem++;
                }
             
                $this->RotaTurno_model->IdRota = $Id;
                $this->RotaTurno_model->excluirPorRota();
                
                foreach( $this->input->post('Turno') as $value)
                {
                    $this->RotaTurno_model->IdRota  = $Id;
                    $this->RotaTurno_model->IdTurno = $value ;
                    $this->RotaTurno_model->DataCadastro = date('Y-m-d h:i:s');
                    $this->RotaTurno_model->inserir();
                }

                $result = $this->Rota_model->alterar();
            }
    
            if ($IdRota >=1 || $result == true) 
            {
                $this->session->set_flashdata('success', 'Dados salvos com sucesso!');
            } 
            else 
            {
                $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
            }
            redirect('rota');
        }
    }

    public function alterar()
    {
        if((int)$this->session->userdata["nivelAcesso"] > 2):
            redirect("login/sair");
        endif;

        $Id = $this->uri->segment(3);
        
        if(is_null($Id))
            redirect('rota');

        $this->Rota_model->Id = $Id;
        $result['rota']= $this->Rota_model->buscarPorId()->row_array();    

        $result['clientes'] = $this->Cliente_model->buscarTodos()->result_array();  

        $result['motoristas'] = $this->Motorista_model->buscarTodos()->result_array(); 
        $result['veiculos'] = $this->Veiculo_model->buscarTodos()->result_array(); 
        $result['turnos'] = $this->Turno_model->buscarTodos()->result_array();
        
        $result['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"]; 

        $this->RotaCliente_model->IdRota = $Id;
        $this->RotaTurno_model->IdRota = $Id;
	
		$result['clientesRota'] = array();
        $result['clientesRota'] = $this->RotaCliente_model->buscarPorRota()->result_array();

       
        $i = 0; 
		$clientes = array();
        foreach($result['clientesRota'] as $value)
        {
            $this->Cliente_model->Id = $value["IdCliente"];
            $cliente = $this->Cliente_model->buscarPorId()->row_array();
            $clientes[$i]["Id"] = $cliente['Id'];
            $clientes[$i]["Nome"] = $cliente['Nome'];
            $i++;
        }
       
        $result['turnosRota']   = $this->RotaTurno_model->buscarPorRota()->result_array();

        $result['clientesRota'] = $clientes;
		
        if(is_null($result))
            redirect();
        
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['clientesRota'] = $result['clientesRota'];
        
        $data['content'] = $this->load->view('rota/alterar', $result, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
		
		
        $this->load->view('master', $data);
    }
    
    public function excluir()
    {
        if((int)$this->session->userdata["nivelAcesso"] != 1):
            redirect("login/sair");
        endif;

        header('Content-Type: text/html; charset=utf-8');

        $Id = base64_decode($this->input->post('Id'));     

        if(is_null($Id))
        {
            echo "erro";    
        }
        else
        {

            $this->Rota_model->Id = $Id;
            $this->RotaCliente_model->IdRota = $Id;
            $this->RotaCliente_model->excluirPorRota();

            $this->RotaTurno_model->IdRota = $Id;
            $this->RotaTurno_model->excluirPorRota();
			
			$this->Atendimento_model->IdRota = $Id;
			$this->Atendimento_model->excluirPorRota();
            
            if($this->Rota_model->excluir())
            {
                echo "Ok";
            }
            else
            {
                echo "erro";
            }
        }
    }

    public function visualizar()
    {
        $IdRota = $this->uri->segment(3);

        $this->VwRotaMotorista_model->Id = $IdRota;
        $this->VwRotaClienteMotorista_model->IdRota = $IdRota;
        $this->VwRotaTurno_model->IdRota = $IdRota;

        $turnosRota = $this->VwRotaTurno_model->buscarPorRota()->result_array();
        $turnos = "";

        foreach($turnosRota as $key => $value)
        {
            $turnos .= $value["Nome"]."/"; 
        }

        $turnos = substr($turnos, 0, -1);

        $dadosRota = $this->Rota_model->buscarPorId()->result_array();

        $data['dadosRota'] = $this->VwRotaMotorista_model->buscarPorId()->row_array();
        
        $data['clientesRota'] = $this->VwRotaClienteMotorista_model->buscarPorRota()->result_array();
        
        $this->Atendimento_model->IdRota = $IdRota;
        
        $data['usuario'] = $this->session->userdata["usuario"];  

        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];

        
        $data['IdRota'] = $IdRota;
        $data['recipientes'] = $this->Recipiente_model->buscarTodos()->result_array();
        $data['motoristas'] = $this->Motorista_model->buscarTodos()->result_array();	
        $data['formasPagamento'] = $this->FormaPagamento_model->buscarTodas()->result_array();
        $data['tiposPagamento'] = $this->TipoPagamento_model->buscarTodos()->result_array();


        $data['turnos'] = $turnos;       
        $data['content'] = $this->load->view('rota/visualizar', $data, true);
        $this->load->view('master', $data);
    }

    
    public function imprimir()
    {

        $IdRota = $this->uri->segment(3);

        $this->VwRotaMotorista_model->Id = $IdRota;
        $this->VwRotaClienteMotorista_model->IdRota = $IdRota;

        $dadosRota = $this->Rota_model->buscarPorId()->result_array();

        $data['dadosRota'] = $this->VwRotaMotorista_model->buscarPorId()->row_array();
        
        $data['clientesRota'] = $this->VwRotaClienteMotorista_model->buscarPorRota()->result_array();
        
        $data['usuario'] = $this->session->userdata["usuario"];  

        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];

        $data['rotas'] = $this->Rota_model->buscarTodas()->result_array(); 
        $data['clientes'] = $this->Cliente_model->buscarTodos()->result_array(); 
        $data['recipientes'] = $this->Recipiente_model->buscarTodos()->result_array();
        $data['motoristas'] = $this->Motorista_model->buscarTodos()->result_array();	
        $data['formasPagamento'] = $this->FormaPagamento_model->buscarTodas()->result_array();
        
        $data['content'] = $this->load->view('rota/imprimir', $data, true);
        $this->load->view('master', $data);
    }
    
    public function salvarAtendimento()
    {
        if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;
        
        if(isset($_POST))
        {

            $this->load->library("RotasLibrary");
            $this->load->library("AtendimentosLibrary");
            
            $Id = base64_decode($this->input->post('Id'));
            $IdRota = base64_decode($this->input->post('IdRota'));
            $IdStatus = $this->input->post('Status');
            $IdAtendimento = 0 ;
			
			if($Id=="" || is_null($Id))
            {
                $i = 0;
                $quantidadeAtendimentos = 0;
                $quantidadeClientes = count($this->input->post('IdCliente')); 
            
                foreach($this->input->post('IdCliente') as $value)
                {

                        $this->Atendimento_model->QuantidadeColetada    = $this->input->post('QuantidadeColetada')[$i];
                        $this->Atendimento_model->Observacao            = $this->input->post('Observacao')[$i];
                        $this->Atendimento_model->Status                = $this->atendimentoslibrary->atendimentoEmAndamento();
                        $this->Atendimento_model->IdRota                = $IdRota;
                        $this->Atendimento_model->IdCliente             = $value;
                        $this->Atendimento_model->DataCadastro          = date('Y-m-d H:i:s');
                
                        $IdAtendimento = $this->Atendimento_model->inserir();
                        $indRecipiente = 0;
                        $quantidadeRecipiente = 0;
                         
                        $hasRecipiente = false;
                        
						foreach( $this->input->post('IdRecipiente')[$i] as $value)
                        {
                            $this->AtendimentoRecipiente_model->IdAtendimento = $IdAtendimento;
                            $this->AtendimentoRecipiente_model->IdRecipiente = $value ;
                           
                            $quantidadeRecipiente = $this->input->post('QuantidadeRecipiente')[$i][$indRecipiente];
                            
                            $this->AtendimentoRecipiente_model->Quantidade = $quantidadeRecipiente;
                            
                            $this->AtendimentoRecipiente_model->DataCadastro = date('Y-m-d H:i:s');
                            if($this->AtendimentoRecipiente_model->inserir()){
                                $hasRecipiente = true;
                            }
                            else
                            {
                                $hasRecipiente = false;
                            }
							
							$indRecipiente++;

                        }
                        $indFormaPagamento = 0;
                        $hasFormaPagamento = false;
                        foreach( $this->input->post('IdFormaPagamento')[$i] as $value)
                        {

                                $this->AtendimentoFormaPagamento_model->IdAtendimento = $IdAtendimento;
                                $this->AtendimentoFormaPagamento_model->IdFormaPagamento = $value ;
                                $this->AtendimentoFormaPagamento_model->Quantidade = $this->input->post('Quantidade')[$i][$indFormaPagamento];
								$this->AtendimentoFormaPagamento_model->ValorPagamento = $this->input->post('ValorPagamento')[$i][$indFormaPagamento];
   							    $this->AtendimentoFormaPagamento_model->DataCadastro = date('Y-m-d H:i:s');
                                
                                // -- Calculo do valor pago --//
                                $this->FormaPagamento_model->Id = $value;
								
								if((float)$this->AtendimentoFormaPagamento_model->ValorPagamento == 0 || $this->AtendimentoFormaPagamento_model->ValorPagamento =="" ){
									$dadosFormaPagamento = $this->FormaPagamento_model->buscarPorId()->row_array();                         
									$valorPago = $dadosFormaPagamento["Valor"] * $this->input->post('Quantidade')[$i][$indFormaPagamento];
								}
								else
								{
									$valorPago = $this->AtendimentoFormaPagamento_model->ValorPagamento * $this->input->post('Quantidade')[$i][$indFormaPagamento];	
								}
                                $this->AtendimentoFormaPagamento_model->ValorPago = $valorPago;
                                // -- Calculo do valor pago --//

                                if($this->AtendimentoFormaPagamento_model->inserir()){
                                    $hasFormaPagamento = true;
                                }
                                else
                                {
                                    $hasFormaPagamento = false;
                                }
                           
                            $indFormaPagamento++;    
                        }

                        $hasTipoPagamento = false;
                        foreach( $this->input->post('IdTipoPagamento')[$i] as $value)
                        {
                            
                                $this->AtendimentoTipoPagamento_model->IdAtendimento = $IdAtendimento;
                                $this->AtendimentoTipoPagamento_model->IdTipoPagamento = $value ;
                                $this->AtendimentoTipoPagamento_model->DataCadastro = date('Y-m-d H:i:s');
                                
                                if($this->AtendimentoTipoPagamento_model->inserir())
                                {
                                    $hasTipoPagamento = true;
                                }
                                else
                                {
                                    $hasTipoPagamento = false;
                                }
                   
                        }

                        if($hasFormaPagamento && $hasRecipiente && $hasTipoPagamento)
                            $quantidadeAtendimentos++;
                 						  
                        $i++;

                }        

                $this->Rota_model->Id = $IdRota;
				$this->Rota_model->Status = $IdStatus;
                $this->Rota_model->alterarStatus();
            }
            else
            {

                $this->AtendimentoRecipiente_model->excluirPorAtendimento();
                $this->AtendimentoFormaPagamento_model->excluirPorAtendimento();

                $indRecipiente = 0;
                $quantidadeRecipiente = 0;
                foreach( $this->input->post('IdRecipiente') as $value)
                {
                    $this->AtendimentoRecipiente_model->IdAtendimento = $Id;
                    $this->AtendimentoRecipiente_model->IdRecipiente = $value ;
                    
                    $this->AtendimentoRecipiente_model->IdRecipiente = $value ;
                    if($this->input->post('QuantidadeRecipiente')[$i][$indRecipiente] <= "" || $this->input->post('QuantidadeRecipiente')[$i][$indRecipiente] == 0){
                        $quantidadeRecipiente = 1;
                    }
                    else
                    {
                        $quantidadeRecipiente = $this->input->post('QuantidadeRecipiente')[$i][$indRecipiente];
                    }
                    $this->AtendimentoRecipiente_model->Quantidade = $quantidadeRecipiente;
                    
                    
                    $this->AtendimentoRecipiente_model->DataCadastro = date('Y-m-d H:i:s');
                    $this->AtendimentoRecipiente_model->inserir();
                    $indRecipiente++;
                }
                $indFormaPagamento = 0;
                $quantidade = 1;
                foreach( $this->input->post('IdFormaPagamento') as $value)
                {
                    $this->AtendimentoFormaPagamento_model->IdAtendimento = $Id;
                    $this->AtendimentoFormaPagamento_model->IdFormaPagamento = $value ;

                    if($this->input->post('Quantidade')[$i][$indFormaPagamento] <= "" || $this->input->post('Quantidade')[$i][$indFormaPagamento] == 0){
                        $quantidade = 1;
                    }
                    else
                    {
                        $quantidade = $this->input->post('Quantidade')[$i][$indFormaPagamento];
                    }
                    $this->AtendimentoFormaPagamento_model->Quantidade = $quantidade ;
                    $this->AtendimentoFormaPagamento_model->DataCadastro = date('Y-m-d H:i:s');
                    $this->AtendimentoFormaPagamento_model->inserir();
                    $indFormaPagamento++;
                }

				
				$this->Rota_model->Id = $IdRota;
				$this->Rota_model->Status = $IdStatus;
				
                $this->Rota_model->alterarStatus();
				
                $result = $this->Atendimento_model->alterar();
            }

           
            if ($IdAtendimento >=1 || $result == true) 
            {
                $this->session->set_flashdata('success', 'Dados salvos com sucesso!');
            } 
            else 
            {
                $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
            }

            redirect('rota');

        }

    }

  
    public function guiaRota()
    {

        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

        $this->load->library("UtilsLibrary");

        
        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
            <center><h3> SysColeta - Guia de Rota </h3></center>
        </div>');
        $mpdf->SetHTMLFooter('
        <table width="100%">
            <tr>
                <td width="33%" style="text-align: center;">SysColeta</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%">{DATE j/m/Y}</td>
            </tr>
        </table>');


        $IdRota = $this->uri->segment(3);

        $this->VwRotaMotorista_model->Id = $IdRota;
        $this->VwRotaClienteMotorista_model->IdRota = $IdRota;
        $this->VwRotaTurno_model->IdRota = $IdRota;

        $turnosRota = array();
        $turnosRota = $this->VwRotaTurno_model->buscarPorRota()->result_array();
        $turnos = "";

        foreach($turnosRota as $key => $value)
        {
            $turnos .= $value["Nome"]."/"; 
        }

        $turnos = substr($turnos, 0, -1);

        $this->Rota_model->Id = $IdRota;
        $dadosRota = array();
        $dadosRota = $this->Rota_model->buscarPorId()->result_object();


        $this->Veiculo_model->Id = $dadosRota[0]->IdVeiculo;

        $dadosVeiculo = array();
        $dadosVeiculo = $this->Veiculo_model->buscarPorId()->result_object();


        $data['dadosRota'] = $this->VwRotaMotorista_model->buscarPorId()->result_object();
        
        $data['clientesRota'] = $this->VwRotaClienteMotorista2_model->buscarPorRota()->result_array();
        
        $diaSemana = $this->utilslibrary->DiaSemana($data['dadosRota'][0]->DataRota);
        
        $html = "<br />";
        
        $tabelaCabecalho = "<table style='border: 1px solid black; border-collapse: collapse; width: 100%;'>";

        $tabelaCabecalho .= "<tbody><tr><td style='border: 1px solid black; border-collapse: collapse;'><b>MOTORISTA</b></td><td style='border: 1px solid black; border-collapse: collapse;'><b>VEÍCULO</b></td><td style='border: 1px solid black; border-collapse: collapse;'><b>DIA</b></td>";
        $tabelaCabecalho .= "<td style='border: 1px solid black; border-collapse: collapse;'><b>PERÍODO</b></td><td style='border: 1px solid black; border-collapse: collapse;'><b>DATA</b></td></tr>";
        $tabelaCabecalho .= "<tr><td style='border: 1px solid black; border-collapse: collapse;'>".$data['dadosRota'][0]->Motorista."</td><td style='border: 1px solid black; border-collapse: collapse;'>".$dadosVeiculo[0]->Nome."</td><td style='border: 1px solid black; border-collapse: collapse;'>".$diaSemana."</td><td style='border: 1px solid black; border-collapse: collapse;'>".$turnos."</td><td style='border: 1px solid black; border-collapse: collapse;'>".date("d/m/Y", strtotime($dadosRota[0]->DataRota))."</td></tr>";
        $tabelaCabecalho .= "</tbody>";
        $tabelaCabecalho .= "</table>";
        
        $html .= "<br />"; 

    
        $tabelaRota = "<table style='border: 1px solid black; border-collapse: collapse; width: 100%;'>";
        $tabelaRota .= "<tbody><tr><td><h2>".$data['dadosRota'][0]->Perimetro." - ".$data['dadosRota'][0]->Nome."</h2></td><td></td></tr>";
        $tabelaRota .= "</tbody>";
        $tabelaRota .= "</table>";


        $this->VwRotaClienteMotorista2_model->IdRota = $IdRota;
        $data['clientesRota'] = $this->VwRotaClienteMotorista2_model->buscarPorRota()->result_array();

    
        $data['pagamentos'] = $this->FormaPagamento_model->buscarTodas()->result_array();

        
        $pagamentos = "";

 
        $tabelaClientes = "";
        $tabelaClientes = "<table style='border: 1px solid black; border-collapse: collapse; width: 100%;'>";
        $tabelaClientes .= "<tbody style='border: 1px solid black; border-collapse: collapse;'>
                            <tr style='background-color: yellow;'>
                            <td style='border: 1px solid black; border-collapse: collapse;'><b>Nº</b></td><td><b>Nome</b></td>
                            <td style='border: 1px solid black; border-collapse: collapse;'><b>Endereço</b></td>
                            <td style='border: 1px solid black; border-collapse: collapse;'><b>Bairro</b></td>
                            <td style='border: 1px solid black; border-collapse: collapse;'><b>Recip.</b></td>
                            <td style='border: 1px solid black; border-collapse: collapse;'><b>Turno</b></td>
                            <td style='border: 1px solid black; border-collapse: collapse;'><b>Peri</b></td>
                            <td style='border: 1px solid black; border-collapse: collapse;'><b>Última</b></td>
                            <td style='border: 1px solid black; border-collapse: collapse;'><b>Recip.</b></td>
                            <td style='border: 1px solid black; border-collapse: collapse;'><b>Qua</b></td>
                            <td style='border: 1px solid black; border-collapse: collapse;'><b>Pgto</b></td>
                            </tr>";
        
       
        foreach($data['clientesRota'] as $value)
        {

            $this->Cliente_model->Id = $value['IdCliente'];
            $cliente = $this->Cliente_model->buscarPorId()->row_array();

            $this->Periodicidade_model->Id = $cliente['PeriodicidadeColeta'];
            $periodicidade = $this->Periodicidade_model->buscarPorId()->row_array();

            $recipientesCliente = "";

            $this->RecipienteCliente_model->IdCliente = $value['IdCliente'];
            $recipientesClienteResult = $this->RecipienteCliente_model->buscarPorCliente()->result_array();
            
            foreach($recipientesClienteResult as $val)
            {
              
                $this->Recipiente_model->Id = $val['IdRecipiente'];
                $recipiente = $this->Recipiente_model->buscarPorId()->row_array();
                
                $recipientesCliente .= $recipiente["Nome"]."&nbsp;/&nbsp;";
            } 
            
            $recipientesCliente = substr($recipientesCliente, 0, -7);

            $ultimoAtendimento = "";


            // --- Busca a data do Ultimo Atendimento ---//
            $this->RotaCliente_model->IdCliente = $value['IdCliente'];
            $ultimaRotaCliente = $this->RotaCliente_model->ultimaRotaPorCliente()->row_array();

            $this->Atendimento_model->IdCliente = $value['IdCliente'];
            $this->Atendimento_model->IdRota = $ultimaRotaCliente['IdRota'];

            //$dadosUltimoAtendimento = $this->Atendimento_model->buscarPorRotaCliente()->row_array();
			
 		    $dadosUltimoAtendimento = $this->Atendimento_model->buscarUltimoAtendimentoComOleo()->row_array();

            $dataUltimoAtendimento = (count($dadosUltimoAtendimento) > 0) ? date("d/m/Y H:i:s", strtotime($dadosUltimoAtendimento['DataCadastro'])) : "";
           
            // --- Busca a data do Ultimo Atendimento ---//


            // -- Quantidade coletada -- //

            $this->Atendimento_model->IdCliente = $value['IdCliente'];
            $this->Atendimento_model->IdRota = $IdRota;

            $dadosAtendimento = array();
            $dadosAtendimento = $this->Atendimento_model->buscarPorRotaCliente()->row_array();
			$quantidadeColetada = 0;
            if(is_array($dadosAtendimento)){
			    $quantidadeColetada = (count($dadosAtendimento) > 0) ? $dadosAtendimento['QuantidadeColetada'] : "";
            }
            // -- Quantidade coletada --//



		    // -- Tipos de pagamentos -- //
			
			 //$this->Cliente_model->Id = $value['IdCliente'];
			 
			 $this->TipoPagamentoCliente_model->IdCliente = $value['IdCliente'];
			 $dadosTipoPagamentoCliente = $this->TipoPagamentoCliente_model->buscarPorCliente()->result_array();
			 $tiposPagamentoCliente = "";
			 foreach($dadosTipoPagamentoCliente as $valueTipoPagamentoCliente)
			 {
				$this->TipoPagamento_model->Id = $valueTipoPagamentoCliente["IdTipoPagamento"];
				$dadosTipoPagamento = $this->TipoPagamento_model->buscarPorId()->row_array();
				
				if((int)$dadosTipoPagamento["Id"] == 3 || $dadosTipoPagamento["Nome"] == "PAGO MENSAL"){
					$tiposPagamentoCliente .= "R$ ";
				}					
				else if((int)$dadosTipoPagamento["Id"] == 4 || $dadosTipoPagamento["Nome"] == "PAGO À VISTA")
				{
					$tiposPagamentoCliente .= $valueTipoPagamentoCliente["Descricao"];
				}
				
			 }
			
			// -- Tipos de pagamentos --//
                
            $tabelaClientes .= "<tr style='border: 1px solid black; border-collapse: collapse;'>";
            $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse;'>".$value["IdCliente"]."</td/>";
            $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse;'>".$value["Cliente"]."</td/>";
            $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse;'>".$value['Rua'].",".$value['Numero']."</td>";
            $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse;'>".$value['Bairro']."</td>";
            $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse; background-color: yellow;'>".$recipientesCliente."</td>";
            //$tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse; background-color: yellow;'>".substr($dataUltimoAtendimento,11,18)."</td>";
            $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse; background-color: yellow;'>".$cliente['HorarioColeta']."</td>";
            $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse; background-color: yellow;'>".$periodicidade['Nome']."</td>";
            $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse; background-color: yellow;'>".$dataUltimoAtendimento."</td>";
            $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse;'></td>";

            if((string)$quantidadeColetada == "" || (int)$quantidadeColetada == 0 )
			{
                $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse;'>".$quantidadeColetada."</td>";
            }
            else
			{
                $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse;'>".$quantidadeColetada."L</td>";
            }
			
            $tabelaClientes .= "<td style='border: 1px solid black; border-collapse: collapse;'>".$tiposPagamentoCliente."</td>";
            $tabelaClientes .= "<tr/>";
        }


        $tabelaClientes .= "</tbody>";
        $tabelaClientes .= "</table>";

        //exit;
        
        $mpdf->WriteHTML($tabelaCabecalho.$tabelaRota.$tabelaClientes);
        $pdf = 'Guia de rota - '.$data['dadosRota'][0]->Nome.'.pdf';
        $mpdf->Output($pdf,\Mpdf\Output\Destination::DOWNLOAD);        
    }


    public function finalizar()
    {
        if((int)$this->session->userdata["nivelAcesso"] != 1):
            redirect("login/sair");
        endif;

        
        $Id = $this->uri->segment(3);

        if(is_null($Id) || $Id=="")
        {
            $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");    
            redirect('rota');
        }
        else
        {

            $this->load->library("RotasLibrary");

            /* Finaliza o atendimento tambem
                $this->atendimentoslibrary->atendimentoEmAndamento()
            */
            
            $this->Rota_model->Id = $Id;
            $this->Rota_model->Status = $this->rotaslibrary->finalizarRota();
            

            if ($this->Rota_model->alterarStatus()) 
            {
                $this->session->set_flashdata('success', 'Dados salvos com sucesso!');
            } 
            else 
            {
                $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
            }
            redirect('rota');

        }
    }
    public function excelRota($IdRota)
    { 
		
        error_reporting(E_ERROR | E_PARSE);
		
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $IdRota = $this->uri->segment(3);
        $this->Rota_model->Id = $IdRota;
        
        //$data['dadosRota'] = $this->Rota_model->buscarPorId()->result_object();
		$dados['dadosRota'] = array();
		$data['dadosRota'] = $this->Rota_model->buscarPorId()->result_array();
		
		
		
        $NomeRota = $data['dadosRota'][0]["Nome"];		
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');
        
        $sheet->mergeCells("A1:G1");
        $sheet->mergeCells("A2:G2");
        $sheet->setCellValue('A1',"SysColeta");
        $sheet->setCellValue('A2',$NomeRota);        
        $sheet->setCellValue('A4', 'Cliente'); 
        $sheet->setCellValue('B4', 'Data de atendimento');
        $sheet->setCellValue('C4', 'Quantidade coletada');
        $sheet->setCellValue('D4', 'Forma de pagamento');
		$sheet->setCellValue('E4', 'Quantidade');
		$sheet->setCellValue('F4', 'Valor do pagamento');
		$sheet->setCellValue('G4', 'Valor pago no atendimento');		
        $sheet->setAutoFilter('A4:G4');

        $i = 5;
		
		$this->Atendimento_model->IdRota = $IdRota;		
		//$atendimentos = $this->Atendimento_model->buscarPorRota()->result_array();
		$atendimentos = $this->Atendimento_model->buscarPorRotaAgrupadoPorCliente()->result_array();
		
		
		$iAtendimentos = 0;
		$valorPagoNoAtendimento = 0;

		foreach($atendimentos as $value)
		{
						
			$this->Cliente_model->Id = $value["IdCliente"];
			$clientes = $this->Cliente_model->buscarPorId()->result_array();			
			
			foreach($clientes as $valueClientes)
			{
				
				$this->AtendimentoFormaPagamento_model->IdAtendimento = $value['Id'];
				$atendimentosFormaPagamento = $this->AtendimentoFormaPagamento_model->buscarPorAtendimento()->result_array();
				
				
				$sheet->setCellValue('A'.$i,$valueClientes["Nome"]);
				$quantidadeColetada = $value["QuantidadeColetada"];
				
				$sheet->setCellValue('C'.$i,$quantidadeColetada);
								
				foreach($atendimentosFormaPagamento as $valueFormaPagamento)
				{
		
					
					$this->FormaPagamento_model->Id = $valueFormaPagamento["IdFormaPagamento"];
					
					$formaPagamento = $this->FormaPagamento_model->buscarPorId()->row_array();
			
					$dataAtendimentoFormatada = date('d/m/Y',strtotime($valueFormaPagamento["DataCadastro"]));
					
					

					if((float)$valueFormaPagamento["ValorPagamento"]>=0)
					{
						if((int)$valueFormaPagamento["Quantidade"] >=0 || $valueFormaPagamento["Quantidade"] != "")
						{
							
							// -- Tratativa para se a forma de pagamento for dinheiro
							
							if((int)$valueFormaPagamento["IdFormaPagamento"]==7)
							{
								$valorPagoFinal = $valueFormaPagamento["ValorPagamento"] * 1;
							}
							else
							{
								$valorPagoFinal = $valueFormaPagamento["ValorPago"] ;
								
							}
						}
					}
					else
					{
						if((int)$valueFormaPagamento["Quantidade"] >=0 || $valueFormaPagamento["Quantidade"] != "")
						{
							$valorPagoFinal = $formaPagamento["Valor"] * $valueFormaPagamento["Quantidade"];						
							
							if((int)$valueFormaPagamento["IdFormaPagamento"]==7)
							{
								$valorPagoFinal = $valueFormaPagamento["ValorPagamento"] * 1;
							}
						}
					}
				
					$valorFormaPagamento = str_replace('.',',',$formaPagamento["Valor"]);
					$valorPagoNoAtendimento = $valorPagoFinal;
					$valorFormaPagamento = number_format((float)str_replace(',','.',$valorFormaPagamento),2);
					$valorPagoNoAtendimento = number_format((float)str_replace(',','.',$valorPagoNoAtendimento),2);
					
					
					$sheet->setCellValue('B'.$i,$dataAtendimentoFormatada); 
					$sheet->setCellValue('D'.$i,$formaPagamento["Nome"]);
					$sheet->setCellValue('E'.$i,$valueFormaPagamento["Quantidade"]);
					$sheet->setCellValue('F'.$i,"R$ ".$valorFormaPagamento); 
					$sheet->setCellValue('G'.$i,"R$ ".$valorPagoNoAtendimento); 
					
					$i++;
				}
			}	
			$iAtendimentos++;			
		}	
       
		$writer = new Xlsx($spreadsheet);
		
		
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'. $NomeRota .'.xlsx"'); 
		header('Cache-Control: max-age=0');
	   
		$writer->save('php://output');
		exit;

    }

    public function pdfRota($IdRota)
    {
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        // Recupera o código HTML da view sem exibí-lo na tela

        $IdRota = $this->uri->segment(3);
        $this->Rota_model->Id = $IdRota;
        $data['dadosRota'] = $this->Rota_model->buscarPorId()->result_array();
        $NomeRota = $data['dadosRota'][0]['Nome'];
		
		$html = "";
        $html = "<h2 align='center'> SysColeta </h2><br /><br />";
        $html .= "<h3 align='center'> ".$NomeRota." </h3><br /><br />";
        $html .="<table border='0'  style='border-collapse: collapse' align='center' 
					style='width:100%'>
					<thead>
						<tr bgcolor='#C2C2C2'>
						<th><b>Cliente</b></th>
						<th><b>Data de atendimento</b></th>
						<th><b>Quantidade Coletada</b></th>
						<th><b>Forma de pagamento</b></th>
						<th><b>Quantidade</b></th>
						<th><b>Valor do pagamento</b></th>
						<th><b>Valor pago no atendimento</b></th>		
					</thead>
				 <tbody>";
        
        $color = "bgcolor='#DCDCDC'";
        $i = 0;
		
		
		$this->Atendimento_model->IdRota = $IdRota;		
		//$atendimentos = $this->Atendimento_model->buscarPorRota()->result_array();
		$atendimentos = $this->Atendimento_model->buscarPorRotaAgrupadoPorCliente()->result_array();
		
		foreach($atendimentos as $value)
		{
			$this->Cliente_model->Id = $value["IdCliente"];
			$clientes = $this->Cliente_model->buscarPorId()->result_array();
			
			
			$clienteAtual = "";
			$clienteAnterior = "";
			foreach($clientes as $valueClientes)
			{
				$this->AtendimentoFormaPagamento_model->IdAtendimento = $value['Id'];
				$atendimentosFormaPagamento = $this->AtendimentoFormaPagamento_model->buscarPorAtendimento()->result_array();
				
				$clienteAtual = $valueClientes['Nome'];
				
				
				foreach($atendimentosFormaPagamento as $valueFormaPagamento)
				{
					if($clienteAtual == $clienteAnterior)
					{
						$nome = "";
					}
					else
					{
						$nome = $clienteAtual;
					}
					
					
					$this->FormaPagamento_model->Id = $valueFormaPagamento["IdFormaPagamento"];
					
					$formaPagamento = $this->FormaPagamento_model->buscarPorId()->row_array();
					
					$dataAtendimentoFormatada = date('d/m/Y',strtotime($valueFormaPagamento["DataCadastro"]));
					$quantidadeColetada = $value["QuantidadeColetada"];
					
					$valorPagoFinal = 0;
					
					if((float)$valueFormaPagamento["ValorPagamento"]>0)
					{
						$valorPagoFinal = $valueFormaPagamento["ValorPagamento"] * $valueFormaPagamento["Quantidade"];
					}
					else
					{
						$valorPagoFinal = $formaPagamento["Valor"] * $valueFormaPagamento["Quantidade"];
					}
				
					$valorFormaPagamento = str_replace('.',',',$formaPagamento["Valor"]);
					$valorPagoNoAtendimento = str_replace('.',',', $valorPagoFinal);
					
					$valorFormaPagamento = number_format((float)str_replace(',','.',$valorFormaPagamento),2);
					$valorPagoNoAtendimento = number_format((float)str_replace(',','.',$valorPagoNoAtendimento),2);
					
					if ($i%2==0)
					{
						$color = "";
					}
					else
					{
						$color = "bgcolor='#DCDCDC'";
						
					}
					
					$html .= "<tr $color>";
					$html .= "<td>".$nome."</td>";
					$html .= "<td>".$dataAtendimentoFormatada."</td>".
							  "<td>".$quantidadeColetada."</td><td>"
							  .$formaPagamento["Nome"]."</td><td>".$valueFormaPagamento["Quantidade"]."
						  	  </td><td>R$ ".$valorFormaPagamento."<td>R$ ".$valorPagoNoAtendimento."</td>
				     </tr>";
					
					$i++;
				}
			
			
				$clienteAnterior = $valueClientes['Nome'];
			}			
		}		
		$html .= "</tbody></table>";
	  
        $mpdf->WriteHTML($html);
        
        $pdf = $NomeRota.'.pdf';

        $mpdf->Output($pdf,\Mpdf\Output\Destination::DOWNLOAD);
    }

    public function buscarClientesPorRota()
    {
        $dadosClientesRota = null;
        if($_POST){
            $IdRota = base64_decode($_POST['IdRota']);
            if(!empty($IdRota)){
                $this->RotaCliente_model->IdRota = $IdRota;
                $dadosClientesRota['rotaClientes'] = $this->RotaCliente_model->buscarPorRota()->result_object();
                $dadosClientesRota['clientes'] = $this->Cliente_model->buscarTodos()->result_object();

                
            }
            else{
                $dadosClientesRota = null;
            }
        }
        header('Content-Type: application/json');
        echo json_encode($dadosClientesRota);
    }

    public function excluirPorRotaCliente()
    {

        $exclusao =null;
        if($_POST)
        {

            $IdRota = base64_decode($_POST['IdRota']);
            if(!empty($IdRota))
            {
                $IdCliente = $_POST['IdCliente'];

                $this->RotaCliente_model->IdRota = $IdRota;
                $this->RotaCliente_model->IdCliente = $IdCliente;

                $this->RotaCliente_model->excluirPorRotaCliente();
                $exclusao = "ok";
            }
            else{
                $exclusao = "erro";
            }
        }
        header('Content-Type: application/json');
        echo json_encode($exclusao);
    }

    public function adicionarClientesPorRota(){

        $insercao =null;
        if($_POST)
        {

            $IdRota = base64_decode($_POST['IdRota']);
            if(!empty($IdRota))
            {
                $IdCliente = filter_var($_POST['IdCliente']);

                $this->RotaCliente_model->IdRota = $IdRota;
                $this->RotaCliente_model->IdCliente = $IdCliente;
                $this->RotaCliente_model->DataCadastro = date('Y-m-d h:i:s');

                $result = array();
                $result = $this->RotaCliente_model->buscarPorRotaECliente()->row_array();
                if(count($result) > 0)
                {

                    $insercao = "existe";
                }
                else
                {

                    $this->RotaCliente_model->inserir();
                    $insercao = "ok";
                }
            }
            else{
                $insercao = "erro";
            }
        }
        header('Content-Type: application/json');
        echo json_encode($insercao);
    }

    
}