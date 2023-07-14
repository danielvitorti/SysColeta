<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TipoPagamento extends CI_Controller
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
        }

        $tempdb = clone $this->db;
        $total_row = $tempdb->from('tipopagamento')->count_all_results();
        $this->db->limit($config['per_page'], $page);
        $this->db->order_by("Id", "desc");
        $result['tipopagamentos'] = $this->db->get('tipopagamento')->result_array();
        $config['base_url'] = base_url('tipopagamento') . "?busca=$busca";
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
        $data['content'] = $this->load->view('tipopagamento/index', $result, true);
        $this->load->view('master', $data);
    }

    public function cadastro()
    {

        $data['usuario'] = $this->session->userdata["usuario"];
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $data['content'] = $this->load->view('tipopagamento/cadastro', $data, true);

        $this->load->view('master', $data);
    }



    public function salvar()
    {

        if (isset($_POST)) {

            $Id = base64_decode($this->input->post('Id'));

            $this->TipoPagamento_model->Nome = $this->input->post('Nome');


            if (is_null($Id) || empty($Id)) {
                if ($this->TipoPagamento_model->inserir()) {
                    $this->session->set_flashdata('success', "Dados inseridos com sucesso!");
                } else {
                    $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
                }
            } else {

                $this->TipoPagamento_model->Id = $Id;
                if ($this->TipoPagamento_model->alterar()) {
                    $this->session->set_flashdata('success', "Dados alterados com sucesso!");
                } else {
                    $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
                }
            }

            redirect('tipoPagamento');
        }
    }



    public function alterar()
    {

        $Id = $this->uri->segment(3);

        if (is_null($Id))
            redirect('tipopagamento');

        $this->db->where('Id', $Id);
        $tipopagamento['tipopagamento'] = $this->db->get('tipopagamento')->row_array();


        if (is_null($tipopagamento))
            redirect('tipopagamento');

        $data['usuario'] = $this->session->userdata["usuario"];
        $data['content'] = $this->load->view('tipoPagamento/alterar', $tipopagamento, true);
        $data['nivelAcesso']   = (int)$this->session->userdata["nivelAcesso"];

        $this->load->view('master', $data);
    }


    public function excluir()
    {
        $Id = base64_decode($this->input->post('Id'));

        header('Content-Type: text/html; charset=utf-8');

        if (is_null($Id) || empty($Id)) {
            echo "erro";
        } else {
            $this->TipoPagamento_model->Id = $Id;

            if ($this->TipoPagamento_model->excluir()) {

                echo "Ok";
            } else {
                echo "erro";
            }
        }
    }

    public function BuscarTiposPagamentoCliente()
    {
		
		
		$dadosTiposPagamento = array();
		if ($_POST) {
            $buscarTiposPagamento = base64_decode($_POST['buscarTiposPagamento']);
            if (!empty($buscarTiposPagamento) && $buscarTiposPagamento == "buscarTiposPagamentoCliente") {
            	$IdCliente = base64_decode($this->input->post('IdCliente'));
				
				$this->TipoPagamentoCliente_model->IdCliente = $IdCliente;
				$dadosTiposPagamentoCliente = $this->TipoPagamentoCliente_model->buscarPorCliente()->result_array();
                $dadosTiposPagamento = $this->TipoPagamento_model->buscarTodos()->result_array();
				
				$result = array();
				$i = 0;

				foreach($dadosTiposPagamento as $value)
				{
					$result[$i]["Id"] = $value["Id"];
					$result[$i]["Nome"] = $value["Nome"];
					$result[$i]["Descricao"] = null;
					$result[$i]["Quantidade"] = null;
					$result[$i]["Adicionado"] = false;
					foreach($dadosTiposPagamentoCliente as $v)
					{
						
						if($value["Id"] == $v['IdTipoPagamento'])
						{							
							$result[$i]["Descricao"] = $v["Descricao"];
							$result[$i]["Quantidade"] = $v["Quantidade"];
							$result[$i]["Adicionado"] = true;
						}
					    $result[$i]["IdTipoPagamentoCliente"] = $v["Id"];
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
