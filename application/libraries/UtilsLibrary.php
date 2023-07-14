<?php

class UtilsLibrary
{
    public function DiaSemana($dataParametro)
    {
        $diaSemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado');
        $data = \DateTime::createFromFormat('Y-m-d H:i:s',$dataParametro);
        $diaSemanaNumero = date('w', strtotime($dataParametro));

        return $diaSemana[$diaSemanaNumero];
    }
	
	public function MesExtenso($mes)
	{
		$mesExtenso = "";
		switch ($mes) {
			
			case "01":
				$mesExtenso = "Janeiro";
				break;
			case "02":
				$mesExtenso = "Fevereiro";
				break;
			case "03":
				$mesExtenso = "Marco";
				break;
			case "04":
				$mesExtenso = "Abril";
				break;
			case "05":
				$mesExtenso = "Maio";
				break;
			case "06":
				$mesExtenso = "Junho";
				break;
			case "07":
				$mesExtenso = "Julho";
				break;
			case "08":
				$mesExtenso = "Agosto";
				break;
			case "09":
				$mesExtenso = "Setembro";
				break;
			case "10":
				$mesExtenso = "Outubro";
				break;
			case "11":
				$mesExtenso = "Novembro";
				break;
			case "12":
				$mesExtenso = "Dezembro";
				break;
		}
		
		return $mesExtenso;
	}
   
}