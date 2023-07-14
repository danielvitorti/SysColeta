<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Spipu\Html2Pdf\Html2Pdf;

class Relatorios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("ControleAcesso");
        $this->controleacesso->controlar();
        if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;
		

    }

    public function index()
    {
        redirect('relatorios/clientes');
    }
 	
    public function clientes()
    {
		$this->controleacesso->controlar();
		if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;

        $config['per_page'] = 200;
        
        $page = $this->input->get('page', true);
        $inicio = implode('-', array_reverse(explode('/', $this->input->get('inicio'))));
        $fim = implode('-', array_reverse(explode('/', $this->input->get('fim'))));
            
        $IdCliente = $this->input->get('IdCliente', true);
        $IdRota = $this->input->get('IdRota', true);
        $IdFormaPagamento = $this->input->get('IdFormaPagamento',true);
        $Cidade = $this->input->get('Cidade',true);
        if (!empty($inicio) && !empty($fim)) 
        {
            $this->db->where('DataAtendimento >=', $inicio." 00:00:00");
            $this->db->where('DataAtendimento <=', $fim." 23:59:59");
        }
        if (!empty($IdCliente)) 
        {
            $this->db->where('IdCliente', $IdCliente);
        }
        if (!empty($IdRota)) 
        {
            $this->db->where('IdRota', $IdRota);
        }
        if(!empty($IdFormaPagamento))
        {
            $this->db->join('atendimentoformapagamento','atendimentoformapagamento.IdAtendimento= vwrelatorioatendimentocliente.IdAtendimento','INNER'); // Join table1 with table2 based on the foreign key
            $this->db->where('atendimentoformapagamento.IdFormaPagamento',$IdFormaPagamento); // Set Filter
        }
        if(!empty($Cidade))
        {
            $this->db->where('Cidade', $Cidade);
        }

        $tempdb = clone $this->db;
        $total_row = $tempdb->from('vwrelatorioatendimentocliente')->count_all_results();

        $this->db->limit($config['per_page'], $page);
        $this->db->order_by("DataAtendimento", "desc");
        $result['relatorioCliente'] = $this->db->get('vwrelatorioatendimentocliente')->result_array();
        $config['base_url'] = base_url('relatorios/clientes')."?inicio=$inicio&fim=$fim&IdCliente=$IdCliente&IdRota=$IdRota";
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
        $config['prev_link'] = '&lt;&lt;Anterior';
        $config['prev_tag_open'] = '<li class="page-link">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Próxima &gt;&gt;</i>';
        $config['next_tag_open'] = '<li class="page-link">';
        $config['next_tag_close'] = '</li>';


        $this->pagination->initialize($config);
        $result['pagination'] = $this->pagination->create_links();
        $result['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $result['inicio'] = (empty($inicio)) ? "" : date("d/m/Y", strtotime($inicio));
        $result['fim'] =  (empty($fim)) ? "" : date("d/m/Y", strtotime($fim));
        $result['IdCliente'] = $IdCliente;
        $result['IdRota'] = $IdRota;
        $result['clientes'] = $this->Cliente_model->buscarTodos()->result_array(); 
        $result['rotas'] = $this->Rota_model->buscarTodas()->result_array(); 
        $result['formasPagamento'] = $this->FormaPagamento_model->buscarTodas()->result_array(); 
        $result['IdFormaPagamento'] = $IdFormaPagamento;
        $result['Cidade'] = $Cidade;
        $result['cidades'] = $this->VwCidades_model->buscarTodas()->result_array(); 
        

        $data['nivelAcesso']   = (int)$this->session->userdata["nivelAcesso"];
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('relatorios/clientes', $result, true);
        $this->load->view('master', $data);
    }


	public function clientesExcel()
	{
		
		// Vai montar a planilha de acordo com os filtros //
		$this->controleacesso->controlar();
		if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;
		
		
		$inicio = implode('-', array_reverse(explode('/', $this->input->get('inicio'))));
        $fim = implode('-', array_reverse(explode('/', $this->input->get('fim'))));
            
        $IdCliente = $this->input->get('IdCliente', true);
        $IdRota = $this->input->get('IdRota', true);
        $IdFormaPagamento = $this->input->get('IdFormaPagamento',true);
        $Cidade = $this->input->get('Cidade',true);
		
		// -- Filtros ------------------------------------------------------------------------ //
        if (!empty($inicio) && !empty($fim)) 
        {
            $this->db->where('DataAtendimento >=', $inicio." 00:00:00");
            $this->db->where('DataAtendimento <=', $fim." 23:59:59");
        }
        if (!empty($IdCliente)) 
        {
            $this->db->where('IdCliente', $IdCliente);
        }
        if (!empty($IdRota)) 
        {
            $this->db->where('IdRota', $IdRota);
        }
        if(!empty($IdFormaPagamento))
        {
            $this->db->join('atendimentoformapagamento','atendimentoformapagamento.IdAtendimento= vwrelatorioatendimentocliente.IdAtendimento','INNER'); // Join table1 with table2 based on the foreign key
            $this->db->where('atendimentoformapagamento.IdFormaPagamento',$IdFormaPagamento); // Set Filter
        }
        if(!empty($Cidade))
        {
            $this->db->where('Cidade', $Cidade);
        }

		//------------------------------------------- Fim dos Filtros ---------------------------//
		$this->db->order_by("DataAtendimento", "desc");
        $tempdb = clone $this->db;
        
		$relatorioCliente = array();
		$relatorioCliente = $this->db->get('vwrelatorioatendimentocliente')->result_array();
        
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
		
		$sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);		
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');
        
        $sheet->mergeCells("A1:E1");
        $sheet->mergeCells("A2:E2");
        $sheet->setCellValue('A1',"Óleo Local - Sistema de Controle - Relatório de Clientes");
        $sheet->setCellValue('A2',"");        
        $sheet->setCellValue('A4', 'Cliente'); 
        $sheet->setCellValue('B4', 'Data do atendimento');
        $sheet->setCellValue('C4', 'Quantidade coletada');
        $sheet->setCellValue('D4', 'Forma de pagamento');
		$sheet->setCellValue('E4', 'Tipo de pagamento');
		$sheet->setAutoFilter('A4:e4');
		
		$i = 5;
		
		
		foreach ($relatorioCliente as $value)
		{						
			$sheet->setCellValue('A'.$i,$value["Nome"]); 
			$sheet->setCellValue('B'.$i,date('d/m/Y',strtotime($value["DataAtendimento"])));
			$sheet->setCellValue('C'.$i,$value["QuantidadeColetada"]);
			
			$this->AtendimentoFormaPagamento_model->IdAtendimento = $value['IdAtendimento'];
			$dadosAtendimentoFormaPagamento = array();
			$dadosAtendimentoFormaPagamento = $this->AtendimentoFormaPagamento_model->buscarPorAtendimento()->result_array();
						 
			$formaPagamento = "";
			$quantidade = "";
			$tipoPagamento = "";
			foreach($dadosAtendimentoFormaPagamento as $val)
			{
			   $this->FormaPagamento_model->Id = $val['IdFormaPagamento'];
			   $dadosFormaPagamento = $this->FormaPagamento_model->buscarPorId()->row_array();
			   
			   if($dadosFormaPagamento['Nome'] !="")
				  $formaPagamento .= $dadosFormaPagamento['Nome']." - Quantidade: ".$val['Quantidade']."/";
			   else
				  $formaPagamento = "";
			}
			
			if($formaPagamento != "")
				$formaPagamento = substr($formaPagamento,0,-1);
			else
				$formaPagamento = "";

			$this->AtendimentoTipoPagamento_model->IdAtendimento = $value['IdAtendimento'];
			$dadosAtendimentoTipoPagamento = array();
			$dadosAtendimentoTipoPagamento = ($this->AtendimentoTipoPagamento_model->buscarPorAtendimento()->result_array()) ? $this->AtendimentoTipoPagamento_model->buscarPorAtendimento()->result_array() : array() ;

			$tipoPagamento = "";

			foreach($dadosAtendimentoTipoPagamento as $v)
			{
			    $this->TipoPagamento_model->Id = $v['IdTipoPagamento'];
				$dadosTipoPagamento = $this->TipoPagamento_model->buscarPorId()->row_array();
				$tipoPagamento .= $dadosTipoPagamento['Nome']."/";

			}
			
			if($tipoPagamento != "")
				$tipoPagamento = substr($tipoPagamento,0,-1);			
			else
				$tipoPagamento = "";
			
			$sheet->setCellValue('D'.$i,$formaPagamento);
			$sheet->setCellValue('E'.$i,$tipoPagamento);
			
			$i++;
		}
		
        $writer = new Xlsx($spreadsheet);
		
		
		ob_end_clean();
		$NomeRota = "relatorio-de-clientes";
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'. $NomeRota .'.xlsx"'); 
		header('Cache-Control: max-age=0');
	   
		$writer->save('php://output');		
		exit;

		
		
	}
  
	public function clientesPdf()
	{

		$this->controleacesso->controlar();
		if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;
		
		
		$inicio = implode('-', array_reverse(explode('/', $this->input->get('inicio'))));
        $fim = implode('-', array_reverse(explode('/', $this->input->get('fim'))));
            
        $IdCliente = $this->input->get('IdCliente', true);
        $IdRota = $this->input->get('IdRota', true);
        $IdFormaPagamento = $this->input->get('IdFormaPagamento',true);
        $Cidade = $this->input->get('Cidade',true);
		
		// -- Filtros ------------------------------------------------------------------------ //
        if (!empty($inicio) && !empty($fim)) 
        {
            $this->db->where('DataAtendimento >=', $inicio." 00:00:00");
            $this->db->where('DataAtendimento <=', $fim." 23:59:59");
        }
        if (!empty($IdCliente)) 
        {
            $this->db->where('IdCliente', $IdCliente);
        }
        if (!empty($IdRota)) 
        {
            $this->db->where('IdRota', $IdRota);
        }
        if(!empty($IdFormaPagamento))
        {
            $this->db->join('atendimentoformapagamento','atendimentoformapagamento.IdAtendimento= vwrelatorioatendimentocliente.IdAtendimento','INNER'); // Join table1 with table2 based on the foreign key
            $this->db->where('atendimentoformapagamento.IdFormaPagamento',$IdFormaPagamento); // Set Filter
        }
        if(!empty($Cidade))
        {
            $this->db->where('Cidade', $Cidade);
        }

		//------------------------------------------- Fim dos Filtros ---------------------------//
		$this->db->order_by("DataAtendimento", "desc");
        $tempdb = clone $this->db;
        
		$relatorioCliente = array();
		$relatorioCliente = $this->db->get('vwrelatorioatendimentocliente')->result_array();
        
		$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
		
		$html = "";
		 
		$html = "<h2 align='center'> Óleo Local - Sistema de Controle </h2><br /><br />";
        $html .= "<h3 align='center'> Relatório de Clientes </h3><br /><br />";
        $html .="<table border='0'  style='border-collapse: collapse' align='center' 
					style='width:100%'>
					<thead>
						<tr bgcolor='#C2C2C2'>
						<th><b>Cliente</b></th>
						<th><b>Data de atendimento</b></th>
						<th><b>Quantidade Coletada</b></th>
						<th><b>Forma de pagamento</b></th>
						<th><b>Tipo de pagamento</b></th>
					</thead>
				 <tbody>";
        
		$color = "";
        $color = "bgcolor='#DCDCDC'";
		
		$i = 0;
		foreach ($relatorioCliente as $value)
		{
			if ($i%2==0)
			{
				$color = "";
			}
			else
			{
				$color = "bgcolor='#DCDCDC'";
				
			}
			
			$this->AtendimentoFormaPagamento_model->IdAtendimento = $value['IdAtendimento'];
			$dadosAtendimentoFormaPagamento = array();
			$dadosAtendimentoFormaPagamento = $this->AtendimentoFormaPagamento_model->buscarPorAtendimento()->result_array();
						 
			$formaPagamento = "";
			$quantidade = "";
			$tipoPagamento = "";
			foreach($dadosAtendimentoFormaPagamento as $val)
			{
			   $this->FormaPagamento_model->Id = $val['IdFormaPagamento'];
			   $dadosFormaPagamento = $this->FormaPagamento_model->buscarPorId()->row_array();
			   
			   if($dadosFormaPagamento['Nome'] !="")
				  $formaPagamento .= $dadosFormaPagamento['Nome']." - Quantidade: ".$val['Quantidade']."/";
			   else
				  $formaPagamento = "";
			}
			
			if($formaPagamento != "")
				$formaPagamento = substr($formaPagamento,0,-1);
			else
				$formaPagamento = "";

			
			
			$html .= "<tr $color>";
					$html .= "<td>".$value["Nome"]."</td>";
					$html .= "<td>".date('d/m/Y',strtotime($value["DataAtendimento"])).			"</td>".
							  "<td>".$value["QuantidadeColetada"]."</td>".
		
						  	  "<td>".$formaPagamento."<td>".$tipoPagamento."</td>
				     </tr>";
					
					$i++;			
					
		}		
		
		$html .= "</tbody></table>";
	  
	
        $mpdf->WriteHTML($html);
        
		
        $pdf = 'relatorio-de-clientes.pdf';

        $mpdf->Output($pdf,\Mpdf\Output\Destination::DOWNLOAD);
		exit;
	}


     public function detalhes()
    {

        $this->controleacesso->controlar();
        if((int)$this->session->userdata["nivelAcesso"] > 1):
            redirect("login/sair");
        endif;

        $Id = $this->uri->segment(3);
        $IdCliente = $this->uri->segment(4);

        
        if(is_null($Id))
            redirect('relatorios/clientes');

        $this->Atendimento_model->Id = $Id;
        $atendimento['dadosAtendimento'] = $this->Atendimento_model->buscarPorId();

        $this->Cliente_model->Id = $IdCliente;
        $this->Atendimento_model->Id = $Id;
        $this->Atendimento_model->IdCliente = $IdCliente;
        $this->VwAtendimentoRecipientes_model->IdAtendimento = $Id;
        $this->VwAtendimentoFormasPagamento_model->IdAtendimento = $Id;

        $this->AtendimentoTipoPagamento_model->IdAtendimento = $Id;
        $dadosAtendimentoTipoPagamento = $this->AtendimentoTipoPagamento_model->buscarPorAtendimento()->result_array();

        $tipoPagamento = array();
        $i = 0;
        foreach( $dadosAtendimentoTipoPagamento as $value)
        {   
            $this->TipoPagamento_model->Id = $value["IdTipoPagamento"];
            $dadosTipoPagamento = $this->TipoPagamento_model->buscarPorId()->row_array();
            $tipoPagamento[$i] = $this->TipoPagamento_model->buscarPorId()->row_array();

            $i++;
        }


    
        $atendimento['dadosCliente'] = $this->Cliente_model->buscarPorId()->row_array();
        $atendimento['dadosAtendimento'] = $this->Atendimento_model->buscarPorAtendimentoECliente()->row_array();

        $this->RecipienteCliente_model->IdCliente = $atendimento['dadosCliente']['Id'];

        $dadosRecipienteCliente = array();
        $dadosRecipienteCliente = $this->RecipienteCliente_model->buscarPorCliente()->result_array();

        $recipienteCliente = array();
        $i = 0;
        foreach($dadosRecipienteCliente as $key => $value)
        {
            $this->Recipiente_model->Id = $value['IdRecipiente'];
            $recipienteCliente[0] = $this->Recipiente_model->buscarPorId()->row_array(); 
            $i++;
        }

        $this->VwRotaMotorista_model->Id = $atendimento['dadosAtendimento']['IdRota'];

        $atendimento['dadosRota'] = $this->VwRotaMotorista_model->buscarPorId()->row_array();

        $atendimento['dadosRecipienteCliente'] = array();
        $atendimento['dadosRecipienteCliente'] = $recipienteCliente;


        $atendimento['dadosAtendimentoRecipientes'] = $this->VwAtendimentoRecipientes_model->buscarPorAtendimento()->result_array();
        $atendimento['dadosAtendimentoFormasPagamento'] = $this->VwAtendimentoFormasPagamento_model->buscarPorAtendimento()->result_array();        
		$atendimento['dadosTipoPagamento'] = $tipoPagamento;

	

        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('relatorios/detalhes', $atendimento, true);
        $data['nivelAcesso']   = (int)$this->session->userdata["nivelAcesso"];

        
        $this->load->view('master', $data);
        
    }
	
	
}