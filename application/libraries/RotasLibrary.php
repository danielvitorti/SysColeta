<?php

class RotasLibrary
{

    private $statusEmAberto = "1";
    private $statusEmAndamento = "2";
    private $statusAtendimentoRealizado = "3";
    private $statusFinalizada = "4";

    private $rotaNaoLiberada = "0";
    private $rotaLiberada = "1";


    public function abrirRota()
    {
        return $this->statusEmAberto;
    }

    public function finalizarRota()
    {
        return $this->statusFinalizada;
    }


    public function emAndamento()
    {
        return $this->statusEmAndamento;
    }

    public function atendimentoRealizado()
    {
        return $this->statusAtendimentoRealizado;
    }



    public function liberarRota()
    {
        return $this->rotaLiberada;
    }

    public function bloquearRota()
    {
        return $this->rotaNaoLiberada;
    }


   
}