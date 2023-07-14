<?php
class Login extends CI_Controller
{
    public function index()
    {
        $data['content'] = $this->load->view('login/index', null, true);
        $this->load->view('master_login', $data);
    }
    public function entrar()
    {
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->Usuario_model->login = $login;
        $this->Usuario_model->Senha = md5($senha);
        
        $result =  $this->Usuario_model->buscarPorLoginSenha()->row();

        if(!is_null($result))
        {
                    
            $this->session->set_userdata("usuario",$result->nome);
            $this->session->set_userdata("nivelAcesso",$result->NivelAcesso);   
            $this->session->set_userdata("IdMotorista",$result->IdMotorista);   
            $this->session->set_userdata("IdCliente",$result->IdCliente);
           
            redirect("home/index");
        }
        else
        {
            $this->session->set_flashdata('error', "Usuário e/ou senha inválidos");
            redirect("login/index");
        }
    }
    public function sair()
    {
        $this->session->set_userdata("usuario","");
        $this->session->set_userdata("nivelAcesso","");
        $this->session->set_userdata("IdMotorista","");   
        $this->session->set_userdata("IdCliente","");
        session_destroy();
        redirect("login");
    }
}