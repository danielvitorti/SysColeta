<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Spipu\Html2Pdf\Html2Pdf;
use Dompdf\Dompdf;

class Documento extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("ControleAcesso");
        $this->controleacesso->controlar();
    }
 			
    public function index() 
    {

        if((int)$this->session->userdata["nivelAcesso"] == 2 ):
            redirect("login/sair");
        endif;

        $config['per_page'] = 50;
        
        $page = $this->input->get('page', true);
        $busca = $this->input->get('busca', true);

        $this->db->where("Excluido","0");
        
        if($this->session->userdata["nivelAcesso"] == 3)
            $this->db->where("IdCliente",$this->session->userdata["IdCliente"]);

        if ($busca != '') 
        {
            $this->db->like('Titulo', $busca);
            $this->db->or_like('Nome', $busca);
        }
    
        $tempdb = clone $this->db;
        if($this->session->userdata["nivelAcesso"] == 3)
            $tempdb->where("IdCliente",$this->session->userdata["IdCliente"]);
            
        $total_row = $tempdb->from('vwdocumentocliente')->count_all_results();
        $this->db->limit($config['per_page'], $page);
        $this->db->order_by("Id", "desc");
        $result['documentos'] = $this->db->get('vwdocumentocliente')->result_array();
        $config['base_url'] = base_url('documento')."?busca=$busca";
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
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('documento/index', $result, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        
        
        $this->load->view('master', $data);
    }

    public function cadastro()
    {
        if((int)$this->session->userdata["nivelAcesso"] != 1 ):
            redirect("login/sair");
        endif;

        $result['clientes'] = $this->Cliente_model->buscarTodos()->result_array(); 
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('documento/cadastro', $result, true);
        $data['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"];
        $this->load->view('master', $data);
    }

    public function salvar()
    {
        
        if((int)$this->session->userdata["nivelAcesso"] == 2 || (int)$this->session->userdata["nivelAcesso"] == 3):
            redirect("login/sair");
        endif;

        if(isset($_POST))
        {   

            $Id = $this->input->post('Id');
            
            $this->Documento_model->Titulo    = $this->input->post('Titulo');
            $this->Documento_model->Texto     = $this->input->post('Texto');
            $this->Documento_model->IdCliente = $this->input->post('IdCliente');
            $this->Documento_model->DataValidade = implode('-', array_reverse(explode('/', $this->input->post('DataValidade'))));
            $this->Documento_model->DataCadastro = date('Y-m-d');
            $folder = $this->Documento_model->IdCliente;
                $path = "./uploads";
                    
                if ( ! is_dir($path)) 
                {
                    mkdir($path, 0777, $recursive = true);
                }
         
                   
                $configUpload['upload_path']   = $path;         
                $configUpload['allowed_types'] = 'pdf';
                $configUpload['encrypt_name']  = TRUE;
             
                $this->upload->initialize($configUpload);

               
                if ( !$this->upload->do_upload('Arquivo'))
                {
                    $data= array('error' => $this->upload->display_errors());  
                    $this->session->set_flashdata('error', "Ocorreu um erro! Só são permitidos arquivos com a extensão .pdf. Verifique a extensão e tente novamente");
                    redirect('documento');
                }
                else
                {
                
                    $data['dadosArquivo'] = $this->upload->data();
                    $arquivoPath = 'uploads/'.$folder."/".$data['dadosArquivo']['file_name'];
  
                    $data['urlArquivo'] = base_url($arquivoPath);
                    
                    $downloadPath = 'download/'.$folder."/".$data['dadosArquivo']['file_name'];
                    
                    $data['urlDownload'] = base_url($downloadPath);
 
                    $this->Documento_model->Arquivo = $data['dadosArquivo']['file_name'];

                }
            if(is_null($Id))
            {

                    if($this->Documento_model->inserir())
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
                $this->Documento_model->Id = base64_decode($this->input->post('Id'));
                
                if($this->Documento_model->alterar())
                {
                    $this->session->set_flashdata('success', "Dados alterados com sucesso!");
                }
                else
                {
                    $this->session->set_flashdata('error', "Ocorreu um erro! Por favor, tente novamente");
                }
            }

            redirect('documento');
           
        }
    }

    public function alterar()
    {
        if((int)$this->session->userdata["nivelAcesso"] == 2 ):
            redirect("login/sair");
        endif;

        $Id = $this->uri->segment(3);

        if(is_null($Id))
            redirect('documento');

        $this->db->where('Id', $Id);
        $documento['documento']= $this->db->get('documento')->row_array();    

        if(is_null($documento))
            redirect('documento');

        $documento['clientes'] = $this->Cliente_model->buscarTodos()->result_array();
        $documento['nivelAcesso'] = (int)$this->session->userdata["nivelAcesso"]; 
        $data['usuario'] = $this->session->userdata["usuario"];  
        $data['content'] = $this->load->view('documento/alterar', $documento, true);
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

            $this->Documento_model->Id = $Id;
            
            if($this->Documento_model->excluir())
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