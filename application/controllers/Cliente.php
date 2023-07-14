<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Cliente extends CI_Controller
{

             
    public function __construct()
    {
        parent::__construct();
        $this->load->library("ControleAcesso");
    }


    public function index()
    {

        $this->controleacesso->controlar();
        if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;

        $config['per_page'] = 50;
        
        $page = $this->input->get('page', true);
        $nome = $this->input->get('nome', true);
        $etiqueta = $this->input->get('Etiqueta', true);
        $status = $this->input->get('Status', true);
    
        $dataInicial = implode('-', array_reverse(explode('/', $this->input->get('dataInicial', true))));
        $dataFinal = implode('-', array_reverse(explode('/', $this->input->get('dataFinal', true))));
   
        $this->db->where("Excluido","0");

        if ($nome != '') 
        {
            $this->db->like('cliente.Nome', $nome);
        }

        if(!empty($etiqueta))
        {
            $this->db->join('etiquetacliente','etiquetacliente.IdCliente = cliente.Id','INNER');
            $this->db->where('etiquetacliente.IdEtiqueta',$etiqueta);   
        }

        if(!empty($dataInicial) && !empty($dataFinal))
        {
            $this->db->where('DataCadastro >=', $dataInicial." 00:00:00");
            $this->db->where('DataCadastro <=', $dataFinal." 23:59:59");            
        }
        if(!empty($status))
        {
            //$this->db->or_where('IdStatus', $status);
			$this->db->where('IdStatus', $status);
        }
       
        $tempdb = clone $this->db;
             
        $total_row = $tempdb->from('cliente')->count_all_results();
       
        $tempdb->limit($config['per_page'], $page);
        $tempdb->order_by("cliente.Id", "desc");
        $result['clientes'] = $this->db->get('cliente')->result_array();


        $config['base_url'] = base_url('cliente')."?nome=$nome&dataInicial=$dataInicial&dataFinal=$dataFinal";
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
        $config['first_link'] = '&lt;&lt;Primeira';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-link">';
        $config['last_link'] = 'Última &gt;&gt;';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;Anterior';
        $config['prev_tag_open'] = '<li class="page-link">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Próxima &gt;</i>';
        $config['next_tag_open'] = '<li class="page-link">';
        $config['next_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-change');
        $this->pagination->initialize($config);
        $result['pagination'] = $this->pagination->create_links();
        $result['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $result['etiquetas'] = $this->Etiqueta_model->buscarTodas()->result_array();     
        //$result['etiquetas'] = array();
        $result['status'] = $status;
        $result['etiqueta'] = $etiqueta;
        $result['nome'] = $nome;
        $result['dataInicial'] = (!empty($dataInicial)) ? date("d/m/Y", strtotime($dataInicial)) : "";
        $result['dataFinal'] = (!empty($dataFinal)) ? date("d/m/Y", strtotime($dataFinal)) : "";
        
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('cliente/index', $result, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        
        $this->load->view('master', $data);

    }


    public function alterar()
    {
        
        $this->controleacesso->controlar();
        if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;

        $Id = $this->uri->segment(3);

        if(is_null($Id))
            redirect('cliente');
     
        $this->db->where('Id', $Id);
        $cliente['cliente']= $this->db->get('cliente')->row_array();    

        if(is_null($cliente))
            redirect('cliente/consulta');

        $cliente['etiquetas'] = $this->Etiqueta_model->buscarTodas()->result_array(); 

        $this->EtiquetaCliente_model->IdCliente = $Id;
        $cliente['etiquetasCliente'] = $this->EtiquetaCliente_model->buscarPorClienteAlteracao()->result_array(); 
        
        $cliente['periodicidades'] = $this->Periodicidade_model->buscarTodas()->result_array(); 
	    $cliente['recipientes'] = $this->Recipiente_model->buscarTodos()->result_array();
        
        $this->RecipienteCliente_model->IdCliente = $Id;
        $cliente['recipientesCliente'] = $this->RecipienteCliente_model->buscarPorCliente()->result_array(); 

        $this->FormaPagamentoCliente_model->IdCliente = $Id;
        $cliente['formasPagamentoCliente'] = $this->FormaPagamentoCliente_model->buscarPorCliente()->result_array(); 


        $this->TipoPagamentoCliente_model->IdCliente = $Id;
        $cliente['tiposPagamentoCliente'] = $this->TipoPagamentoCliente_model->buscarPorCliente()->result_array(); 

     

        $cliente['recipientes'] = $this->Recipiente_model->buscarTodos()->result_array();
	    $cliente['formasPagamento'] = $this->FormaPagamento_model->buscarTodas()->result_array();
        $cliente['tiposPagamento'] = $this->TipoPagamento_model->buscarTodos()->result_array();
        

        $this->RecipienteCliente_model->IdCliente = $Id;
        $cliente['recipientesCliente'] = $this->RecipienteCliente_model->buscarPorCliente()->result_array(); 

        $this->FormaPagamentoCliente_model->IdCliente = $Id;
        $cliente['formasPagamentoCliente'] = $this->FormaPagamentoCliente_model->buscarPorCliente()->result_array(); 



        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('cliente/alterar', $cliente, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $this->load->view('master', $data);
    }


    public function cadastro()
    {
        $this->controleacesso->controlar();
        if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;

        $result['etiquetas'] = $this->Etiqueta_model->buscarTodas()->result_array(); 
	    $data['usuario'] = $this->session->userdata["usuario"];  
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $result['periodicidades'] = $this->Periodicidade_model->buscarTodas()->result_array(); 
        $result['recipientes'] = $this->Recipiente_model->buscarTodos()->result_array();
        $result['formasPagamento'] = $this->FormaPagamento_model->buscarTodas()->result_array();
        $result['tiposPagamento'] = $this->TipoPagamento_model->buscarTodos()->result_array();
        $data['content'] = $this->load->view('cliente/cadastro', $result, true);
       
        $this->load->view('master', $data);
    }

     
    public function salvar()
    {
        
        if(isset($_POST))
        {        
            
            $Id = base64_decode($this->input->post('Id'));
            
            $this->Cliente_model->Nome            = $this->input->post('Nome');
            $this->Cliente_model->CnpjCpf         = $this->input->post('CnpjCpf');
            $this->Cliente_model->Email           = $this->input->post('Email');
            $this->Cliente_model->NomeResponsavel = $this->input->post('NomeResponsavel');
            $this->Cliente_model->Cep             = $this->input->post('Cep');
            $this->Cliente_model->Rua             = $this->input->post('Rua');
            $this->Cliente_model->Bairro          = $this->input->post('Bairro');
            $this->Cliente_model->Cidade          = $this->input->post('Cidade');
            $this->Cliente_model->HorarioColeta   = $this->input->post('HorarioColeta');
            $this->Cliente_model->Instagram       = $this->input->post('Instagram');
            $this->Cliente_model->TipoDocumento   = $this->input->post('radCnpjCpf');
            $this->Cliente_model->IdEtiqueta      = $this->input->post('Etiqueta');
            $this->Cliente_model->Numero          = $this->input->post('Numero');
            $this->Cliente_model->IdStatus            = $this->input->post('Status');
            $this->Cliente_model->PeriodicidadeColeta = $this->input->post('PeriodicidadeColeta');
            $this->Cliente_model->Telefone            = $this->input->post('Telefone');
            $this->Cliente_model->TelefoneFixo        = $this->input->post('TelefoneFixo');
            
            if($Id=="" || is_null($Id))
            {
                $IdCliente = $this->Cliente_model->inserir();

                foreach( $this->input->post('Etiqueta') as $value)
                {
                    $this->EtiquetaCliente_model->IdCliente = $IdCliente;
                    $this->EtiquetaCliente_model->IdEtiqueta = $value ;
                    $this->EtiquetaCliente_model->inserir();
                }

                $indRecipiente = 0;
                foreach( $this->input->post('IdRecipiente') as $vRep)
                {
                    $this->RecipienteCliente_model->IdCliente    = $IdCliente;
                    $this->RecipienteCliente_model->IdRecipiente = $vRep ;
                    $this->RecipienteCliente_model->Descricao = $this->input->post('DescricaoRecipiente')[$indRecipiente];
                    $this->RecipienteCliente_model->Quantidade = $this->input->post('QuantidadeRecipiente')[$indRecipiente];
                    $this->RecipienteCliente_model->DataCadastro = date('Y-m-d h:i:s');
                    $this->RecipienteCliente_model->inserir();
                    $indRecipiente++;
                }

                $indFormaPagamento = 0;

                foreach( $this->input->post('IdFormaPagamento') as $v)
                {
                    
                    $this->FormaPagamentoCliente_model->IdCliente    = $IdCliente;
                    $this->FormaPagamentoCliente_model->IdFormaPagamento = $v ;
                    $this->FormaPagamentoCliente_model->Descricao = $this->input->post('DescricaoFormaPagamento')[$indFormaPagamento];
                    $this->FormaPagamentoCliente_model->Quantidade = $this->input->post('QuantidadeFormaPagamento')[$indFormaPagamento];
                    $this->FormaPagamentoCliente_model->DataCadastro = date('Y-m-d h:i:s');
                    $this->FormaPagamentoCliente_model->inserir();
                    
                    $indFormaPagamento++;
                }


                $indTipoPagamento = 0;
                foreach( $this->input->post('IdTipoPagamento') as $v3)
                {
                    $this->TipoPagamentoCliente_model->IdCliente    = $IdCliente;
                    $this->TipoPagamentoCliente_model->IdTipoPagamento = $v3 ;
                    $this->TipoPagamentoCliente_model->Descricao = $this->input->post('DescricaoTipoPagamento')[$indTipoPagamento];
                    $this->TipoPagamentoCliente_model->DataCadastro = date('Y-m-d h:i:s');
                    $this->TipoPagamentoCliente_model->Quantidade = $this->input->post('QuantidadeTipoPagamento')[$indTipoPagamento];
                    $this->TipoPagamentoCliente_model->inserir();

                    $indTipoPagamento++;
                    
                }

            }
            else
            {

               
                $this->EtiquetaCliente_model->IdCliente = $Id;
                $this->EtiquetaCliente_model->excluirPorCliente();

                foreach( $this->input->post('Etiqueta') as $value)
                {
                    $this->EtiquetaCliente_model->IdCliente = $Id;
                    $this->EtiquetaCliente_model->IdEtiqueta = $value ;
                    $this->EtiquetaCliente_model->inserir();
                }

                $this->RecipienteCliente_model->IdCliente = $Id;
                $this->RecipienteCliente_model->excluirPorCliente();
               

                $this->Cliente_model->Id = $Id;
                $result = $this->Cliente_model->alterar();

            }

            if ($IdCliente >=1 || $result == true) 
            {
                $this->session->set_flashdata('success', 'Dados salvos com sucesso!');
            } 
            else 
            {
                $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
            }
            redirect('cliente');
        }
    }


    public function salvarAlteracao()
    {
        $this->controleacesso->controlar();
        if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;
        
        if(isset($_POST))
        {   
            
            $Id = base64_decode($this->input->post('Id'));

            $this->Cliente_model->Nome            = $this->input->post('Nome');
            $this->Cliente_model->CnpjCpf         = $this->input->post('CnpjCpf');
            $this->Cliente_model->Email           = $this->input->post('Email');
            $this->Cliente_model->NomeResponsavel = $this->input->post('NomeResponsavel');
            $this->Cliente_model->EnderecoColeta  = $this->input->post('EnderecoColeta');
            $this->Cliente_model->Cep             = $this->input->post('Cep');
            $this->Cliente_model->Rua             = $this->input->post('Rua');  
            $this->Cliente_model->Bairro          = $this->input->post('Bairro');
            $this->Cliente_model->Cidade          = $this->input->post('Cidade');
            $this->Cliente_model->Numero          = $this->input->post('Numero');


            $this->Cliente_model->HorarioColeta   = $this->input->post('HorarioColeta');
            $this->Cliente_model->Instagram       = $this->input->post('Instagram');
            $this->Cliente_model->TipoDocumento   = $this->input->post('radCnpjCpf');
            $this->Cliente_model->IdEtiqueta        = $this->input->post('Etiqueta');
            $this->Cliente_model->IdStatus          = $this->input->post('Status'); // Inicialmente por padrao, um cliente é sempre novo
            $this->Cliente_model->PeriodicidadeColeta = $this->input->post('PeriodicidadeColeta');
            $this->Cliente_model->Telefone          = $this->input->post('Telefone');
            $this->Cliente_model->TelefoneFixo      = $this->input->post('TelefoneFixo');


            if(!is_null($Id) || !empty($Id))
            {
               $this->Cliente_model->Id = $Id;
                
                if($this->Cliente_model->alterar())
                {
                    $this->session->set_flashdata('success', "Dados alterados com sucesso!");
                }
                else
                {
                    $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
                }
            }

            redirect('cliente/consulta');
           
        }
    }

    public function excluir()
    {
        $Id = base64_decode($this->input->post('Id'));


        header('Content-Type: text/html; charset=utf-8');

        if(is_null($Id) || $Id == "")
        {
            echo "erro";
        }
        else
        {

            $this->Cliente_model->Id = $Id;
            $this->Usuario_model->IdCliente = $Id;
            $this->Usuario_model->excluirPorIdCliente();
            if($this->Cliente_model->excluir())
            {
                
                echo "Ok";
            }
            else
            {
                echo "erro";
            }

        }

    }

    public function excel() 
    {
		
		$IdCliente = $this->uri->segment(3);
     	
		$nome = $this->input->get('nome',true);		
		$Status = $this->input->get('Status',true);
		$Etiqueta = $this->input->get('Etiqueta',true);
		
		
		$clientes = null;
		
		if($IdCliente != '')
		{
			$this->Cliente_model->Id = $IdCliente;
			$clientes = $this->Cliente_model->buscarPorId()->result_array();
		}
		else if($IdCliente == '')
		{
		
			$this->Cliente_model->Nome = $nome;		            
			$this->Cliente_model->IdStatus = $Status;
			$this->Cliente_model->Etiqueta = $Etiqueta;
		}
		
		$clientes = $this->Cliente_model->buscarPorParametros()->result_array();
		
		
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		
		$sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
		$sheet->getColumnDimension('H')->setAutoSize(true);
		$sheet->getColumnDimension('I')->setAutoSize(true);
		$sheet->getColumnDimension('J')->setAutoSize(true);
		$sheet->getColumnDimension('K')->setAutoSize(true);
		$sheet->getColumnDimension('L')->setAutoSize(true);
		$sheet->getColumnDimension('M')->setAutoSize(true);
		$sheet->getColumnDimension('N')->setAutoSize(true);
		$sheet->getColumnDimension('O')->setAutoSize(true);
		$sheet->getColumnDimension('P')->setAutoSize(true);
		$sheet->getColumnDimension('Q')->setAutoSize(true);
		$sheet->getColumnDimension('R')->setAutoSize(true);
		$sheet->getColumnDimension('S')->setAutoSize(true);
		
		
		
		$sheet->mergeCells("A1:S1");        
        $sheet->setCellValue('A1',"Óleo Local - Sistema de Controle - Clientes");
		$sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
		$sheet->getStyle("A1:S2")->getFont()->setBold( true );

		
		$sheet->setCellValue('A2','Nome do estabelecimento');        
        $sheet->setCellValue('B2', 'CNPJ/CPF'); 
        $sheet->setCellValue('C2', 'Nome do responsável');
        $sheet->setCellValue('D2', 'Email');
        $sheet->setCellValue('E2', 'Telefone com whatsapp');
		$sheet->setCellValue('F2', 'Telefone fixo');
		$sheet->setCellValue('G2', 'Cep');
		$sheet->setCellValue('H2', 'Rua');		
		$sheet->setCellValue('I2', 'Número');		
		$sheet->setCellValue('J2', 'Bairro');		
		$sheet->setCellValue('K2', 'Cidade');		
		$sheet->setCellValue('L2', 'Horário de coleta');		
		$sheet->setCellValue('M2', 'Status');		
		$sheet->setCellValue('N2', 'Periodicidade');		
		$sheet->setCellValue('O2', 'Instagram');		
		$sheet->setCellValue('P2', 'Etiqueta');		
		$sheet->setCellValue('Q2', 'Formas de pagamento');		
		$sheet->setCellValue('R2', 'Tipos de pagamento');		
		$sheet->setCellValue('S2', 'Recipientes');		
	
 		
		$i = 3; // Começa da quinta linha
        foreach($clientes as $value)
        {
		
				$sheet->setCellValue('A'.$i,$value['Nome']); 
				$sheet->setCellValue('B'.$i,$value['CnpjCpf']);
				$sheet->setCellValue('C'.$i,$value['NomeResponsavel']);
				$sheet->setCellValue('D'.$i,$value['Email']); 
				$sheet->setCellValue('E'.$i,$value['Telefone']); 
				$sheet->setCellValue('F'.$i,$value['TelefoneFixo']); 
				$sheet->setCellValue('G'.$i,$value['Cep']); 
				$sheet->setCellValue('H'.$i,$value['Rua']); 
				$sheet->setCellValue('I'.$i,$value['Numero']); 
				$sheet->setCellValue('J'.$i,$value['Bairro']); 
				$sheet->setCellValue('K'.$i,$value['Cidade']); 
				$sheet->setCellValue('L'.$i,$value['HorarioColeta']); 
				
				$status = "";
				if($value['IdStatus'] == 1)
				{
					$status = "Novo";
				}
				else if($value['IdStatus'] == 2)
				{
					$status = "Recorrente";
				}
				else if($value['IdStatus'] == 3)
				{
					$status = "Avulso";
				}
				else if($value['IdStatus'] == 4)
				{
					$status = "Concorrente";
				}
				
				$sheet->setCellValue('M'.$i,$status); 
				
				
				
				$this->Periodicidade_model->Id = $value['PeriodicidadeColeta']; 
				$periodicidade = $this->Periodicidade_model->buscarPorId()->row_array();
				$sheet->setCellValue('N'.$i,$periodicidade["Nome"]); 
				$sheet->setCellValue('O'.$i,$value['Instagram']); 		
				
				
				$this->EtiquetaCliente_model->IdCliente = $value["Id"];
				$etiquetasCliente = $this->EtiquetaCliente_model->buscarPorClienteAlteracao()->result_array(); 
				
				$etqsCliente = "";
				
				foreach( $etiquetasCliente as $etiquetaCliente)
				{
					if($etiquetaCliente["IdEtiqueta"] != "")
					{
						$this->Etiqueta_model->Id = $etiquetaCliente["IdEtiqueta"];
						$etiqueta = $this->Etiqueta_model->buscarPorId()->row_array();	
						
						if($etiqueta != null)
						{
							$etqsCliente .= $etiqueta['Descricao']." - ";
						}
					}
				}

				if($etqsCliente != "")
				{
					$etqsCliente = substr($etqsCliente, 0, -2);
				}
				
				
				$sheet->setCellValue('P'.$i,$etqsCliente); 
				
				$etqsCliente = "";
				$this->FormaPagamentoCliente_model->IdCliente = $value["Id"];
				$formasPagamentoCliente = $this->FormaPagamentoCliente_model->buscarPorCliente()->result_array(); 
				
				$formaPagtosCliente = "";
				
				foreach( $formasPagamentoCliente as $pagamentosCliente)
				{
					if($pagamentosCliente["IdFormaPagamento"] != "")
					{
						$this->FormaPagamento_model->Id = $pagamentosCliente["IdFormaPagamento"];
						$formaPagamento = $this->FormaPagamento_model->buscarPorId()->row_array();	
						
						if($formaPagamento != null)
						{
							$formaPagtosCliente .= $formaPagamento['Nome']." - ";
						}
					}
				}
				
				if($formaPagtosCliente != "")
				{
					$formaPagtosCliente = substr($formaPagtosCliente, 0, -2);
				}
					
				$sheet->setCellValue('Q'.$i,$formaPagtosCliente); 
				
				
				$this->TipoPagamentoCliente_model->IdCliente = $value["Id"];
				$tiposPagamentoCliente = $this->TipoPagamentoCliente_model->buscarPorCliente()->result_array(); 
				
				$tiposPagtoCliente = "";
				
				foreach( $tiposPagamentoCliente as $tiposPagamentosCliente)
				{
					if($tiposPagamentosCliente["IdTipoPagamento"] != "")
					{
						$this->FormaPagamento_model->Id = $tiposPagamentosCliente["IdTipoPagamento"];
						$tipoPagamento = $this->TipoPagamento_model->buscarPorId()->row_array();	
						
						if($tipoPagamento != null)
						{
							$tiposPagtoCliente .= $tipoPagamento['Nome']." - ";
						}
					}
				}
				
				
				if($tiposPagtoCliente != "")
				{
					$tiposPagtoCliente = substr($tiposPagtoCliente, 0, -2);
				}
				$sheet->setCellValue('R'.$i,$tiposPagtoCliente); 
				
				
				$this->RecipienteCliente_model->IdCliente = $value["Id"];
				$recipientesCliente = $this->RecipienteCliente_model->buscarPorCliente()->result_array(); 
				
				$recipCliente = "";
				
				foreach( $recipientesCliente as $recipienteCliente)
				{
					if($recipienteCliente["IdRecipiente"] != "")
					{
						$this->Recipiente_model->Id = $recipienteCliente["IdRecipiente"];
						$recipiente = $this->Recipiente_model->buscarPorId()->row_array();	
						
						if($recipiente != null)
						{
							$recipCliente .= $recipiente['Nome']." - ";
						}
					}
				}
				
				if($recipCliente != "")
				{
					$recipCliente = substr($recipCliente, 0, -2);
				}
				$sheet->setCellValue('S'.$i,$recipCliente); 
				$i++;
        }
		
		$writer = new Xlsx($spreadsheet);
		$planilhaClientes = "";
		$planilhaClientes = "Clientes-Oleo-Local-".date('d-m-Y');
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'. $planilhaClientes .'.xlsx"'); 
		header('Cache-Control: max-age=0');
	   
		$writer->save('php://output');
		exit;
		
    } 
	
	public function pdf()
    {
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
            <center><h2> Óleo Local - Coleta Seletiva - Clientes </h2></center>
        </div>');
        $mpdf->SetHTMLFooter('
        <table width="100%">
            <tr>
                <td width="33%" style="text-align: center;">Óleo Local - Coleta Seletiva</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%">{DATE j/m/Y}</td>
            </tr>
        </table>');

        $html = "<br />";

        $IdCliente = $this->uri->segment(3);
        
		
		$nome = $this->input->get('nome',true);		
		$Status = $this->input->get('Status',true);
		$Etiqueta = $this->input->get('Etiqueta',true);
		
		
		$clientes = null;
		
		if($IdCliente != '')
		{
			$this->Cliente_model->Id = $IdCliente;
			$clientes = $this->Cliente_model->buscarPorId()->result_array();
		}
		else if($IdCliente == '')
		{
		
			$this->Cliente_model->Nome = $nome;		            
			$this->Cliente_model->IdStatus = $Status;
			$this->Cliente_model->Etiqueta = $Etiqueta;
			$clientes = $this->Cliente_model->buscarPorParametros()->result_array();
		}
		
		
        

        $body = "";
        foreach($clientes as $value)
        {
            
			    $body .= "<tr>";
                $body .= "<td>".$value['Nome']."</td>".
                         "<td>".$value['CnpjCpf']."</td>".
                         "<td>".$value['NomeResponsavel']."</td>".
                         "<td>".$value['Email']."</td>".
						 "<td>".$value['Telefone']."</td>".
						 "<td>".$value['TelefoneFixo']."</td>".
						 "<td>".$value['Cep']."</td>".
						 "<td>".$value['Rua']."</td>".
						 "<td>".$value['Numero']."</td>".
						 "<td>".$value['Bairro']."</td>".
						 "<td>".$value['Cidade']."</td>".
						 "<td>".$value['HorarioColeta']."</td>";
						 
            
			
				$status = "";
				if($value['IdStatus'] == 1)
				{
					$status = "Novo";
				}
				else if($value['IdStatus'] == 2)
				{
					$status = "Recorrente";
				}
				else if($value['IdStatus'] == 3)
				{
					$status = "Avulso";
				}
				else if($value['IdStatus'] == 4)
				{
					$status = "Concorrente";
				}
				
				$body .=  "<td>".$status."</td>"; 
				
				
				
				$this->Periodicidade_model->Id = $value['PeriodicidadeColeta']; 
				$periodicidade = $this->Periodicidade_model->buscarPorId()->row_array();
				
				$body .=  "<td>".$periodicidade["Nome"]."</td>"; 
				$body .=  "<td>".$value['Instagram']."</td>"; 
				
				
				$this->EtiquetaCliente_model->IdCliente = $value["Id"];
				$etiquetasCliente = $this->EtiquetaCliente_model->buscarPorClienteAlteracao()->result_array(); 
				
				$etqsCliente = "";
				
				foreach( $etiquetasCliente as $etiquetaCliente)
				{
					if($etiquetaCliente["IdEtiqueta"] != "")
					{
						$this->Etiqueta_model->Id = $etiquetaCliente["IdEtiqueta"];
						$etiqueta = $this->Etiqueta_model->buscarPorId()->row_array();	
						
						if($etiqueta != null)
						{
							$etqsCliente .= $etiqueta['Descricao']." - ";
						}
					}
				}

				if($etqsCliente != "")
				{
					$etqsCliente = substr($etqsCliente, 0, -2);
				}
				
				
				$body .=  "<td>".$etqsCliente."</td>"; 
				
				$etqsCliente = "";
				$this->FormaPagamentoCliente_model->IdCliente = $value["Id"];
				$formasPagamentoCliente = $this->FormaPagamentoCliente_model->buscarPorCliente()->result_array(); 
				
				$formaPagtosCliente = "";
				
				foreach( $formasPagamentoCliente as $pagamentosCliente)
				{
					if($pagamentosCliente["IdFormaPagamento"] != "")
					{
						$this->FormaPagamento_model->Id = $pagamentosCliente["IdFormaPagamento"];
						$formaPagamento = $this->FormaPagamento_model->buscarPorId()->row_array();	
						
						if($formaPagamento != null)
						{
							$formaPagtosCliente .= $formaPagamento['Nome']." - ";
						}
					}
				}
				
				if($formaPagtosCliente != "")
				{
					$formaPagtosCliente = substr($formaPagtosCliente, 0, -2);
				}
				
				$body .=  "<td>".$formaPagtosCliente."</td>"; 
				
				$this->TipoPagamentoCliente_model->IdCliente = $value["Id"];
				$tiposPagamentoCliente = $this->TipoPagamentoCliente_model->buscarPorCliente()->result_array(); 
				
				$tiposPagtoCliente = "";
				
				foreach( $tiposPagamentoCliente as $tiposPagamentosCliente)
				{
					if($tiposPagamentosCliente["IdTipoPagamento"] != "")
					{
						$this->FormaPagamento_model->Id = $tiposPagamentosCliente["IdTipoPagamento"];
						$tipoPagamento = $this->TipoPagamento_model->buscarPorId()->row_array();	
						
						if($tipoPagamento != null)
						{
							$tiposPagtoCliente .= $tipoPagamento['Nome']." - ";
						}
					}
				}
				
				
				if($tiposPagtoCliente != "")
				{
					$tiposPagtoCliente = substr($tiposPagtoCliente, 0, -2);
				}
				
				$body .=  "<td>".$tiposPagtoCliente."</td>"; 
				
				$this->RecipienteCliente_model->IdCliente = $value["Id"];
				$recipientesCliente = $this->RecipienteCliente_model->buscarPorCliente()->result_array(); 
				
				$recipCliente = "";
				
				foreach( $recipientesCliente as $recipienteCliente)
				{
					if($recipienteCliente["IdRecipiente"] != "")
					{
						$this->Recipiente_model->Id = $recipienteCliente["IdRecipiente"];
						$recipiente = $this->Recipiente_model->buscarPorId()->row_array();	
						
						if($recipiente != null)
						{
							$recipCliente .= $recipiente['Nome']." - ";
						}
					}
				}
				
				if($recipCliente != "")
				{
					$recipCliente = substr($recipCliente, 0, -2);
				}
				
				
				$body .=  "<td>".$recipCliente."</td>"; 
				
			$body .= "</tr>";
			
        }

        $html .= "<table width='100%' style='border-collapse:collapse;' border='1' class='table table-striped table-valign-middle'>
                    <thead>
                    <tr>
						<th>Nome do estabelecimento</th>
						<th>CNPJ/CPF</th>
						<th>Nome do responsável</th>
						<th>Email</th>					
						<th>Telefone com whatsapp</th>
						<th>Telefone fixo</th>
						<th>Cep</th>
						<th>Rua</th>
						<th>Número</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Horário de coleta</th>
						<th>Status</th>
						<th>Periodicidade</th>
						<th>Instagram</th>
						<th>Etiqueta</th>
						<th>Formas de pagamento</th>
						<th>Tipos de pagamento</th>
						<th>Recipientes</th>
                    </tr>
                    </thead>
                    <tbody>
						".$body."
                    </tbody>
                </table>";
		
        $mpdf->WriteHTML($html);
		
        $pdf = 'Oleo-Local-Coleta-Seletiva-Clientes'.date('dmY').'.pdf';
        $mpdf->Output($pdf,\Mpdf\Output\Destination::DOWNLOAD);
		
		
    }
	
	
}