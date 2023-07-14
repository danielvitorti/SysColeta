<?php

class Documento_model extends CI_Model
{


    public $Id;
    public $IdCliente;
    public $Nome;
    public $Titulo;
    public $DataCadastro;
    public $Arquivo;
    
   

    public function __construct() 
    {
        parent::__construct();
    }


}