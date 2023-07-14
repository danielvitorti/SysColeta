<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Recipiente extends CI_Controller
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

    public function index()
    {

        $config['per_page'] = 50;

        $page = $this->input->get('page', true);
        $busca = $this->input->get('busca', true);

        $this->db->where("Excluido", "0");
        if ($busca != '') {
            $this->db->like('Nome', $busca);
            $this->db->or_like('Capacidade', $busca);
        }

        $tempdb = clone $this->db;
        $total_row = $tempdb->from('recipiente')->count_all_results();
        $this->db->limit($config['per_page'], $page);
        $this->db->order_by("Id", "desc");
        $result['recipientes'] = $this->db->get('recipiente')->result_array();
        $config['base_url'] = base_url('recipiente') . "?busca=$busca";
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
        $data['content'] = $this->load->view('recipiente/index', $result, true);
        $this->load->view('master', $data);
    }

    public function cadastro()
    {

        $data['usuario'] = $this->session->userdata["usuario"];
        $data['content'] = $this->load->view('recipiente/cadastro', null, true);
        $data['nivelAcesso']   = (int)$this->session->userdata["nivelAcesso"];

        $this->load->view('master', $data);
    }

    public function salvar()
    {

        if (isset($_POST)) {

            $Id = base64_decode($this->input->post('Id'));

            $this->Recipiente_model->Nome = $this->input->post('Nome');
            $this->Recipiente_model->Capacidade = $this->input->post('Capacidade');

            if (is_null($Id) || $Id == "") {
                if ($this->Recipiente_model->inserir()) {
                    $this->session->set_flashdata('success', "Dados inseridos com sucesso!");
                } else {
                    $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
                }
            } else {

                $this->Recipiente_model->Id = $Id;

                if ($this->Recipiente_model->alterar()) {
                    $this->session->set_flashdata('success', "Dados alterados com sucesso!");
                } else {
                    $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
                }
            }

            redirect('recipiente');
        }
    }



    public function alterar()
    {
        $Id = $this->uri->segment(3);

        if (is_null($Id))
            redirect('recipiente');

        $this->db->where('Id', $Id);
        $recipiente['recipiente'] = $this->db->get('recipiente')->row_array();

        if (is_null($recipiente))
            redirect('recipiente');

        $data['usuario'] = $this->session->userdata["usuario"];
        $data['content'] = $this->load->view('recipiente/alterar', $recipiente, true);
        $data['nivelAcesso']   = (int)$this->session->userdata["nivelAcesso"];
        $this->load->view('master', $data);
    }


    public function excluir()
    {
        $Id = base64_decode($this->input->post('Id'));

        header('Content-Type: text/html; charset=utf-8');

        if (is_null($Id)) {

            echo "erro";
        } else {
            $this->Recipiente_model->Id = $Id;

            if ($this->Recipiente_model->excluir()) {

                echo "Ok";
            } else {
                echo "erro";
            }
        }
    }

    public function pdf()
    {
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);

        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
            <center><h2> Óleo Local - Coleta Seletiva - Recipientes </h2></center>
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

        if ($busca != '') {
            $this->Recipiente_model->Nome = $busca;
            $this->Recipiente_model->Capacidade = $busca;
        }

        $recipientes = $this->Recipiente_model->buscar()->result_array();

        $body = "<tr>";
        foreach ($recipientes as $value) {

            $body .= "<tr><td>" . $value['Nome'] . "</td>" .
                "<td>" . $value['Capacidade'] . "</td>" .
                "</tr>";
        }

        $body .= "</tr>";


        $html .= "<table width='100%' id='data-table-cliente' class='table table-striped table-valign-middle'>
                    <thead>
                    <tr>
                    <td><b>Nome</b></td>
                    <td><b>Capacidade</b></td>
                    </tr>
                    </thead>
                    <tbody>
                  
                    " . $body . "
                    </tbody>
                </table>";


        $mpdf->WriteHTML($html);
        $pdf = 'Oleo-Local-Coleta-Seletiva-Recipientes' . date('dmY') . '.pdf';
        $mpdf->Output($pdf, \Mpdf\Output\Destination::DOWNLOAD);
    }

    public function excel()
    {
        $html = "<br /><br /><br /><br /><br /><br />";

        $busca = $this->input->get('busca', true);

        if ($busca != '') {
            $this->Recipiente_model->Nome = $busca;
            $this->Recipiente_model->Capacidade = $busca;
        }

        $recipientes = $this->Recipiente_model->buscar()->result_array();

        $body = "<tr>";
        foreach ($recipientes as $value) {

            $body .= "<tr><td>" . utf8_decode($value['Nome']) . "</td>" .
                "<td>" . utf8_decode($value['Capacidade']) . "</td>" .
                "</tr>";
        }

        $body .= "</tr>";


        $html .= "<table width='100%' style='border-collapse:collapse;' border='1' id='data-table-cliente' class='table table-striped table-valign-middle'>
                    <thead>
                    <tr>
                    <th><u><b>Nome</b></u></th>
                    <th><u><b>Capacidade</b></u></th>
                    </tr>
                    </thead>
                    <tbody>
                    " . $body . "
                    </tbody>
                </table>";


        $arquivo = 'Oleo-Local-Coleta-Seletiva-Recipientes' . date('dmY') . '.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $arquivo . '"');
        header('Cache-Control: max-age=0');
        // Se for o IE9, isso talvez seja necessário
        header('Cache-Control: max-age=1');
        echo $html;
        exit;
    }


    public function BuscarRecipientesCliente()
    {
        /*$buscarRecipientesCliente = array();
        if ($_POST) {
            
            if (!empty($buscarRecipientesCliente) && $buscarRecipientesCliente == "buscarRecipientesCliente") {
                $buscarRecipientesCliente = $this->Recipiente_model->buscarTodos()->result_array();
            } else {
                $buscarRecipientesCliente = array();
            }
        }
        header('Content-Type: application/json');
        echo json_encode($buscarRecipientesCliente); */
		
	    $buscarRecipientesCliente = array();
		if ($_POST) {
            $buscarRecipientesCliente = base64_decode($_POST['buscarRecipientes']);
            if (!empty($buscarRecipientesCliente) && $buscarRecipientesCliente == "buscarRecipientesCliente") {
            	$IdCliente = base64_decode($this->input->post('IdCliente'));
				
				$this->RecipienteCliente_model->IdCliente = $IdCliente;
				$dadosRecipienteCliente = $this->RecipienteCliente_model->buscarPorCliente()->result_array();
                $dadosRecipiente = $this->Recipiente_model->buscarTodos()->result_array();
				
				$result = array();
				$i = 0;

				foreach($dadosRecipiente as $value)
				{
					$result[$i]["Id"] = $value["Id"];
					$result[$i]["Nome"] = $value["Nome"];
					$result[$i]["Capacidade"] = $value["Capacidade"];
					$result[$i]["Descricao"] = null;
					$result[$i]["Quantidade"] = null;
					$result[$i]["Adicionado"] = false;
					foreach($dadosRecipienteCliente as $v)
					{
						
						if($value["Id"] == $v['IdRecipiente'])
						{							
							$result[$i]["Descricao"] = $v["Descricao"];
							$result[$i]["Quantidade"] = $v["Quantidade"];
							$result[$i]["Adicionado"] = true;
						}
					    $result[$i]["IdRecipienteCliente"] = $v["Id"];
					}
					$i++;
				}				
            } 
			else 
			{
                //$dadosFormasPagamento = array();
				$result = array();
            }
        }
        header('Content-Type: application/json');
        //echo json_encode($dadosFormasPagamento);
		echo json_encode($result);
    }

    
}
