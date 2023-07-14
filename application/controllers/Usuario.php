<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
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
            $this->db->or_like('Email', $busca);
            $this->db->or_like('Login', $busca);
        }

        $tempdb = clone $this->db;
        $total_row = $tempdb->from('usuario')->count_all_results();
        $this->db->limit($config['per_page'], $page);
        $this->db->order_by("Id", "desc");
        $result['usuarios'] = $this->db->get('usuario')->result_array();
        $config['base_url'] = base_url('usuario')."?busca=$busca";
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

        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('usuario/index', $result, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $this->load->view('master', $data);
    }

    public function cadastro()
    {
        $result['clientes'] = $this->Cliente_model->buscarTodos()->result_array();  
        $result['motoristas'] = $this->Motorista_model->buscarTodos()->result_array(); 
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('usuario/cadastro', $result, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $this->load->view('master', $data);
    }



    public function salvar()
    {
        if(isset($_POST))
        {   
            $Id = base64_decode($this->input->post('Id'));

            if(!empty($this->input->post("IdCliente")))
                $this->Usuario_model->IdCliente =  $this->input->post("IdCliente");
            else if(!empty($this->input->post("IdMotorista")))
                $this->Usuario_model->IdMotorista =  $this->input->post("IdMotorista");
   
            $this->Usuario_model->nome =  $this->input->post("nome");

            if(!empty($this->input->post('Senha')) && empty($this->input->post('ConfirmarSenha')))
            {
                if($this->input->post('Senha') != $this->input->post('ConfirmarSenha'))
                {
                    $this->session->set_flashdata('warning', "Informe as senhas corretamente!");
                    redirect('usuario/cadastro');
                }
            }
      
            $this->Usuario_model->Email = $this->input->post('Email');
            $this->Usuario_model->login = $this->input->post('login');
            $this->Usuario_model->Senha = md5($this->input->post('Senha'));
            $this->Usuario_model->NivelAcesso = $this->input->post('NivelAcesso');
            $this->Usuario_model->Status = $this->input->post('Status');
            $this->Usuario_model->DataCadastro = date('Y/m/d');

            
    

            if($Id == "" || is_null($Id))
            {
                if($this->Usuario_model->buscarPorLogin()->row_array())
                {
                    $this->session->set_flashdata('warning', "Usuário já cadastrado");
                    redirect('usuario/cadastro');
                }

                if($this->Usuario_model->inserir())
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

                $this->Usuario_model->Id = $Id;
                
                if($this->Usuario_model->alterar())
                {
                    $this->session->set_flashdata('success', "Dados alterados com sucesso!");
                }
                else
                {
                    $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
                }
            }

            redirect('Usuario');
           
        }
    }

    public function alterar()
    {
        $Id = $this->uri->segment(3);

        if(is_null($Id))
            redirect('usuario');
        
        

        $this->db->where('Id', $Id);
        $usuario['usuario']= $this->db->get('usuario')->row_array();    

        if(is_null($usuario))
            redirect('usuario');

        $usuario['clientes'] = $this->Cliente_model->buscarTodos()->result_array();  
        $usuario['motoristas'] = $this->Motorista_model->buscarTodos()->result_array(); 
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('usuario/alterar', $usuario, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $this->load->view('master', $data);
    }


    public function excluir()
    {
        $Id = base64_decode($this->input->post('Id'));

        echo $Id;

        if(is_null($Id))
        {
        
            echo "erro";
            
        }
        else
        {

            $this->Usuario_model->Id = $Id;
            
            if($this->Usuario_model->excluir())
            {
                
                echo "Ok";
            }
            else
            {
                echo "erro";
            }
        

        }

    }

}