<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coleta extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("ControleAcesso");
        $this->controleacesso->controlar();
        if((int)$this->session->userdata["nivelAcesso"] > 2):
            redirect("login/sair");
        endif;
    }

    public function index() 
    {


        $config['per_page'] = 50;

        $page = $this->input->get('page', true);
        $busca = $this->input->get('busca', true);

        
        $this->db->where("Excluido","0");

        if ($busca != '') 
        {
            $this->db->like('Nome', $busca);
            $this->db->or_like('Motorista', $busca);  
            $this->db->or_like('Veiculo', $busca);   
        }

        $tempdb = clone $this->db;
        $total_row = $tempdb->from('vwatendimentorota')->count_all_results();
        $this->db->limit($config['per_page'], $page);
        $this->db->order_by("Id", "desc");

       
        $result['coletas'] = $this->db->get('vwatendimentorota')->result_array();

        $config['base_url'] = base_url('vwatendimentorota')."?busca=$busca";
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
        $config['prev_link'] = '&lt;Previous';
        $config['prev_tag_open'] = '<li class="page-link">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &gt;</i>';
        $config['next_tag_open'] = '<li class="page-link">';
        $config['next_tag_close'] = '</li>';


        $this->pagination->initialize($config);
        $result['pagination'] = $this->pagination->create_links();

        
        $result['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('coleta/index', $result, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $this->load->view('master', $data);
  
    }

 

    public function cadastro()
    {
       if($this->session->userdata["nivelAcesso"] == 2)
       {
           $this->Rota_model->IdMotorista= $this->session->userdata["IdMotorista"];
           $result['rotas'] = $this->Rota_model->buscarPorMotorista()->result_array();
       }
       else
       {
            $result['rotas'] = $this->Rota_model->buscarTodas()->result_array(); 
			$result['clientes'] = $this->Cliente_model->buscarTodos()->result_array(); 
            $result['recipientes'] = $this->Recipiente_model->buscarTodos()->result_array();
            $result['motoristas'] = $this->Motorista_model->buscarTodos()->result_array();	
            $result['formasPagamento'] = $this->FormaPagamento_model->buscarTodas()->result_array();			
			
       }
        $result['motoristas'] = $this->Motorista_model->buscarTodos()->result_array();  
        
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('coleta/cadastro', $result, true);
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
            $this->load->library("AtendimentosLibrary");

            
            $Id = base64_decode($this->input->post('Id'));
            $IdRota = base64_decode($this->input->post('IdRota'));
            
            

            if($Id=="" || is_null($Id))
            {
                $i = 0;
                foreach($this->input->post('IdCliente') as $value)
                {

                        $this->Atendimento_model->QuantidadeColetada    = $this->input->post('QuantidadeColetada')[$i];
                        $this->Atendimento_model->Observacao            = $this->input->post('Observacao')[$i];
                        $this->Atendimento_model->Status                = $this->atendimentoslibrary->atendimentoEmAndamento();
                        $this->Atendimento_model->IdRota                = $IdRota;
                        $this->Atendimento_model->IdCliente             = $value;
                        $this->Atendimento_model->DataCadastro          = date('Y-m-d H:i:s');
                
                        $IdAtendimento = $this->Atendimento_model->inserir();

                        foreach( $this->input->post('IdRecipiente')[$i] as $value)
                        {
                        
                            
                            $this->AtendimentoRecipiente_model->IdAtendimento = $IdAtendimento;
                            $this->AtendimentoRecipiente_model->IdRecipiente = $value ;
                            $this->AtendimentoRecipiente_model->DataCadastro = date('Y-m-d H:i:s');
                            $this->AtendimentoRecipiente_model->inserir();

                        }
                        $quantidade = 1;
                        $indFormaPagamento = 0;
                        foreach( $this->input->post('IdFormaPagamento')[$i] as $value)
                        {

                            if($this->input->post('Quantidade')[$i][$indFormaPagamento] == "" || $this->input->post('Quantidade')[$i][$indFormaPagamento] <= 0){
                                $quantidade = 1;
                            }
                            else
                            {
                                $quantidade = $this->input->post('Quantidade')[$i][$indFormaPagamento];
                            }

                            $this->AtendimentoFormaPagamento_model->IdAtendimento = $IdAtendimento;
                            $this->AtendimentoFormaPagamento_model->IdFormaPagamento = $value ;
                            $this->AtendimentoFormaPagamento_model->Quantidade = $quantidade ;
                            $this->AtendimentoFormaPagamento_model->DataCadastro = date('Y-m-d H:i:s');
                            $this->AtendimentoFormaPagamento_model->inserir();
                            $indFormaPagamento++;
                        }

                    $i++;
                }        
            

                $this->Rota_model->Id = $IdRota;
                $this->Rota_model->Status = $this->atendimentoslibrary->atendimentoEmAndamento();
                $this->Rota_model->alterarStatus();

            }
            else
            {

                $this->AtendimentoRecipiente_model->excluirPorAtendimento();
                $this->AtendimentoFormaPagamento_model->excluirPorAtendimento();


                foreach( $this->input->post('IdRecipiente') as $value)
                {
                    $this->AtendimentoRecipiente_model->IdAtendimento = $Id;
                    $this->AtendimentoRecipiente_model->IdRecipiente = $value ;
                    $this->AtendimentoRecipiente_model->DataCadastro = date('Y-m-d H:i:s');
                    $this->AtendimentoRecipiente_model->inserir();
                }
                
                foreach( $this->input->post('IdFormaPagamento') as $value)
                {
                    $this->AtendimentoFormaPagamento_model->IdAtendimento = $Id;
                    $this->AtendimentoFormaPagamento_model->IdFormaPagamento = $value ;
                    $this->AtendimentoFormaPagamento_model->DataCadastro = date('Y-m-d H:i:s');
                    $this->AtendimentoFormaPagamento_model->inserir();
                }


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

    public function alterar()
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
        
        $data['usuario'] = $this->session->userdata["usuario"];  

        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];

        $data['IdRota'] = $IdRota;
        $data['rotas'] = $this->Rota_model->buscarTodas()->result_array(); 
        $data['clientes'] = $this->Cliente_model->buscarTodos()->result_array(); 
        $data['recipientes'] = $this->Recipiente_model->buscarTodos()->result_array();
        $data['motoristas'] = $this->Motorista_model->buscarTodos()->result_array();	
        $data['formasPagamento'] = $this->FormaPagamento_model->buscarTodas()->result_array();
        $data['turnos'] = $turnos;       
        $data['content'] = $this->load->view('coleta/alterar', $data, true);
        $this->load->view('master', $data);

    }

    public function excluir()
    {
        $Id = base64_decode($this->input->post('Id'));
        
        header('Content-Type: text/html; charset=utf-8');
        if(is_null($Id))
        {
            echo "erro";   
        }
        else
        {

            $this->Coleta_model->Id = $Id;
            
            if($this->Coleta_model->excluir())
            {
                echo "Ok";
            }
            else
            {
                echo "erro";
            }
        
        }

    }

    public function pdf()
    {
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);

        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
            <center><h2> Óleo Local - Coleta Seletiva - Coletas Realizadas </h2></center>
        </div>');
        $mpdf->SetHTMLFooter('
        <table width="100%">
            <tr>
                <td width="33%" style="text-align: center;">Óleo Local - Coleta Seletiva</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%">{DATE j/m/Y}</td>
            </tr>
        </table>');

        $html = "<br /><br /><br /><br /><br /><br />";

        $busca = $this->input->get('busca', true);

        if ($busca != '') 
        {
            $this->VwColeta_model->Recipiente = $busca;
            $this->VwColeta_model->Quantidade = $busca;
            $this->VwColeta_model->Pagamento = $busca;
            $this->VwColeta_model->Cliente = $busca;
            $this->VwColeta_model->Motorista = $busca;    
        
        }

        $coleta = $this->VwColeta_model->buscar()->result_array();

        $body = "<tr>";
        foreach($coleta as $value)
        {
            
                $body .= "<tr><td>".$value['Id']."</td>".
                         "<td>".$value['Cliente']."</td>".
                         "<td>".$value['Motorista']."</td>".
                         "<td>".$value['Pagamento']."</td>".
                         "<td>".$value['Quantidade']."</td>".
                         "<td>".$value['Recipiente']."</td>"
                         ;
                        

        }

        $body .= "</tr>";


        $html .= "<table width='100%' style='border-collapse:collapse;' border='1' id='data-table-cliente' class='table table-striped table-valign-middle'>
                    <thead>
                    <tr>
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Motorista</th>
                    <th>Pagamento</th>
                    <th>Quantidade (litros)</th>
                    <th>Recipiente (litros)</th>
                    </tr>
                    </thead>
                    <tbody>
                    ".$body."
                    </tbody>
                </table>";

        
        $mpdf->WriteHTML($html);
        $pdf = 'Oleo-Local-Coleta-Seletiva-Coleta'.date('dmY').'.pdf';
        $mpdf->Output($pdf,\Mpdf\Output\Destination::DOWNLOAD);
    }

    public function excel() 
    {

        $busca = $this->input->get('busca', true);

        if ($busca != '') 
        {
            $this->VwColeta_model->Recipiente = $busca;
            $this->VwColeta_model->Quantidade = $busca;
            $this->VwColeta_model->Pagamento = $busca;
            $this->VwColeta_model->Cliente = $busca;
            $this->VwColeta_model->Motorista = $busca;    
        
        }

        $coleta = $this->VwColeta_model->buscar()->result_array();
        $html = "";

        $body = "<tr>";
        foreach($coleta as $value)
        {
            
                $body .= "<tr><td>".$value['Id']."</td>".
                         "<td>".utf8_decode($value['Cliente'])."</td>".
                         "<td>".utf8_decode($value['Motorista'])."</td>".
                         "<td>".$value['Pagamento']."</td>".
                         "<td>".$value['Quantidade']."</td>".
                         "<td>".utf8_decode($value['Recipiente'])."</td>"
                         ;
                        

        }

        $body .= "</tr>";


        $html .= "<table width='100%' style='border-collapse:collapse;' border='1' id='data-table-cliente' class='table table-striped table-valign-middle'>
                    <thead>
                    <tr>
                    <th>Codigo</th>
                    <th>Cliente</th>
                    <th>Motorista</th>
                    <th>Pagamento</th>
                    <th>Quantidade (litros)</th>
                    <th>Recipiente (litros)</th>
                    </tr>
                    </thead>
                    <tbody>
                    ".$body."
                    </tbody>
                </table>";



        $arquivo = 'Oleo-Local-Coleta-Seletiva-Coleta'.date('dmY').'.xls';
        header('Content-Type: application/excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        // Se for o IE9, isso talvez seja necessário
        header('Cache-Control: max-age=1');
        echo $html;
        exit;
    }

    public function coletasTableBody()
    {
        if($_POST['IdCliente'] && $_POST['IdCliente'] != "")
        {
            header('Content-Type: text/html');
            $IdCliente = $_POST['IdCliente'];
            $this->VwRecipientecoletarota_model->IdCliente = $IdCliente;
            $coletas = $this->VwRecipientecoletarota_model->buscarPorCliente()->result_array();

            $tableBody = "";

            foreach($coletas as $value)
            {
                $tableBody .= "<tr><td>".$value['Quantidade']."</td><td>".$value['Recipiente']."</td><td>".$value['FormaPagamento']."</td><td>".$value['Pagamento']."<td></tr>";
            }
            echo $tableBody;            
        }

    }

}