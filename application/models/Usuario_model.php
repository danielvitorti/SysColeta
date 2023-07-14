<?php

class Usuario_model extends CI_Model
{

    public $Id;
    public $login;
    public $Senha;
    public $NivelAcesso;
    public $nome;
    public $Status;
    public $IdCliente;
    public $IdMotorista;
    public $DataCadastro;

    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('usuario', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('usuario', $this);
    }

    public function excluir()
    {
        /*$this->db->where('Id', $this->Id);
        return $this->db->delete('usuario', $this); */

        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('usuario',$data);

    }

    public function excluirPorIdCliente()
    {
        /*
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->delete('usuario', $this); */
        $data = array("Excluido" => "1");
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->update('usuario',$data);
    }

    public function excluirPorIdMotorista()
    {
        /*
        $this->db->where('IdMotorista', $this->Id);
        return $this->db->delete('usuario', $this); */
        $data = array("Excluido" => "1");
        $this->db->where('IdMotorista', $this->IdMotorista);
        return $this->db->update('usuario',$data);
    }

    public function buscarPorId()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('Id', $this->Id);
        return $this->db->get('usuario');
    }

    public function buscarPorLogin()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('Login', $this->login);
        return $this->db->get('usuario');
    }

    public function buscarPorLoginSenha()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('Login', $this->login);
        $this->db->where('Senha', $this->Senha);
        $this->db->where('Status', 1);
        return $this->db->get('usuario');
    }

    public function buscarTodos()
    {
        $this->db->where('Excluido', '0');
        return $this->db->get('usuario');
    }

    
}