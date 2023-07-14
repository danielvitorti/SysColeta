<?php

class AtendimentosLibrary
{

    private $statusEmAberto = "0";
    private $statusEmAndamento = "1";
    private $statusFinalizado = "2";

    
    public function atendimentoEmAndamento()
    {
        return $this->statusEmAndamento;
    }

    public function atendimentoFinalizado()
    {
        return $this->statusFinalizado;
    }

    

   
}