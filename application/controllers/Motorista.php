<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Motorista extends CI_Controller
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

        $config['per_page'] = 50;
        
        $page = $this->input->get('page', true);
        $busca = $this->input->get('busca', true);

        $this->db->where("Excluido","0");
        if ($busca != '') 
        {
            $this->db->like('Nome', $busca);
            
        }

        $tempdb = clone $this->db;
        //$total_row = $tempdb->from('vwmotorista')->count_all_results();
        $total_row = $tempdb->from('motorista')->count_all_results();
        $this->db->limit($config['per_page'], $page);
        $this->db->order_by("Id", "desc");
        //$result['motoristas'] = $this->db->get('vwmotorista')->result_array();
        $result['motoristas'] = $this->db->get('motorista')->result_array();
        $config['base_url'] = base_url('motorista')."?busca=$busca";
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

        $data['nivelAcesso']   = (int)$this->session->userdata["nivelAcesso"];
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('motorista/index', $result, true);
        $this->load->view('master', $data);
    }

    public function cadastro()
    {
    
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
		$result['veiculos'] = $this->Veiculo_model->buscarTodos()->result_array(); 
	    $data['content'] = $this->load->view('motorista/cadastro', $result, true); 
     		
        $this->load->view('master', $data);
    }



    public function salvar()
    {
        
        if(isset($_POST))
        {   

            $Id = base64_decode($this->input->post('Id'));
            
            $this->Motorista_model->Nome = $this->input->post('Nome');
            $this->Motorista_model->Habilitacao = $this->input->post('Habilitacao');
            $this->Motorista_model->Telefone = $this->input->post('Telefone');
            $this->Motorista_model->Observacao = $this->input->post('Observacao');
            $this->Motorista_model->DataCadastro = date('Y-m-d');


            if(is_null($Id) || empty($Id))
            {
                if($this->Motorista_model->inserir())
                {
                    $this->session->set_flashdata('success', "Dados inseridos com sucesso!");
                }
                else
                {
                    $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
                }
            }
            else
            {               
          
                $this->Motorista_model->Id = $Id;
                if($this->Motorista_model->alterar())
                {
                    $this->session->set_flashdata('success', "Dados alterados com sucesso!");
                }
                else
                {
                    $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
                }
            }

            redirect('motorista');
           
        }
    }

   

    public function alterar()
    {
        
        $Id = $this->uri->segment(3);

        if(is_null($Id))
            redirect('motorista');
        
        $this->db->where('Id', $Id);
        $motorista['motorista']= $this->db->get('motorista')->row_array();    

        if(is_null($motorista))
            redirect('motorista');

        $motorista['veiculos'] = $this->Veiculo_model->buscarTodos()->result_array(); 
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('motorista/alterar', $motorista, true);
        $data['nivelAcesso']   = (int)$this->session->userdata["nivelAcesso"];

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

            $this->Motorista_model->Id = $Id;
            $this->Usuario_model->IdMotorista = $Id;
            
            if($this->Motorista_model->excluir() && $this->Usuario_model->excluirPorIdMotorista())
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
            <center><h2> Óleo Local - Coleta Seletiva - Motoristas </h2></center>
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
            $this->VwMotorista_model->Nome = $busca;
            $this->VwMotorista_model->Veiculo = $busca;
            $this->VwMotorista_model->Observacao = $busca;      
        
        }

        $motoristas = $this->VwMotorista_model->buscar()->result_array();

        $body = "<tr>";
        foreach($motoristas as $value)
        {
            
                $body .= "<tr><td>".$value['Nome']."</td>".
                         "<td>".$value['Habilitacao']."</td>".
                         "<td>".$value['Veiculo']."</td>".
                         "<td>".$value['Observacao']."</td></tr>";
                        

        }

        $body .= "</tr>";


        $html .= "<table width='100%' style='border-collapse:collapse;' border='1' id='data-table-cliente' class='table table-striped table-valign-middle'>
                    <thead>
                    <tr>
                    <th>Nome</th>
                    <th>Habilitação</th>
                    <th>Veiculo</th>
                    <th>Observação</th>
                    </tr>
                    </thead>
                    <tbody>
                    ".$body."
                    </tbody>
                </table>";

        
        $mpdf->WriteHTML($html);
        $pdf = 'Oleo-Local-Coleta-Seletiva-Motoristas'.date('dmY').'.pdf';
        $mpdf->Output($pdf,\Mpdf\Output\Destination::DOWNLOAD);
    }

    public function excel()
    {

        $html = "";

        $busca = $this->input->get('busca', true);

        if ($busca != '') 
        {
            $this->VwMotorista_model->Nome = $busca;
            $this->VwMotorista_model->Veiculo = $busca;
            $this->VwMotorista_model->Observacao = $busca;      
        
        }

        $motoristas = $this->VwMotorista_model->buscar()->result_array();

        $body = "<tr>";
        foreach($motoristas as $value)
        {
            
                $body .= "<tr><td>".$value['Nome']."</td>".
                         "<td>".$value['Habilitacao']."</td>".
                         "<td>".$value['Veiculo']."</td>".
                         "<td>".utf8_decode($value['Observacao'])."</td></tr>";
                        

        }

        $body .= "</tr>";


        $html .= "<table width='100%' style='border-collapse:collapse;' border='1' id='data-table-cliente' class='table table-striped table-valign-middle'>
                    <thead>
                    <tr>
                    <th><u>Nome</u></th>
                    <th><u>Habilita&ccedil;&atilde;o</u></th>
                    <th><u>Veiculo</u></th>
                    <th><u>Observa&ccedil;&atilde;o</u></th>
                    </tr>
                    </thead>
                    <tbody>
                    ".$body."
                    </tbody>
                </table>";



        $arquivo = 'Oleo-Local-Coleta-Seletiva-Motorista'.date('dmY').'.xls';
        header('Content-Type: application/excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        // Se for o IE9, isso talvez seja necessário
        header('Cache-Control: max-age=1');
        echo $html;
        exit;
    }


}