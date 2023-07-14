<?php

class ControleAcesso
{

    public function controlar()
    {
        $CI = &get_instance();
        $usuario = $CI->session->userdata('usuario');
        $nivelAcesso = $CI->session->userdata('nivelAcesso');
      
        if(empty($usuario))
        {
            redirect('login');
        }
    }

   
}