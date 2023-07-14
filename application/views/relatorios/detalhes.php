<style>

.print {
display:block;
}

.no-print { 
display:none; 
}
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4>Detalhes de atendimento</h4>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=base_url()?>relatorios/clientes">Relatórios de clientes</a></li>
                <li class="breadcrumb-item active">Detalhes de atendimento</li>
            </ol>
            </div>
        </div>
    </div>
</section>
<?php if ($this->session->flashdata('success') == TRUE): ?>
    <div class="alert alert-success alert-dismissible" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fas fa-check"></i> Sucesso!</h4>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error') == TRUE): ?>
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fas fa-ban"></i> Erro!</h4>
            <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('warning') == TRUE): ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h4>
        <?php echo $this->session->flashdata('warning'); ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card card-primary">
            <div class="card card-header" >
               <h3 class="card-title"><i class="fas fa-user"></i> <?=$dadosCliente['Nome'] ?></h3>
            </div>
            <div class="card-body">
                <b>Cnpj/Cpf: </b><?=$dadosCliente['CnpjCpf'] ?><br />
                <b>Endereço: &nbsp;</b><?=$dadosCliente['Rua'] ?> - Nº:<?=$dadosCliente['Numero'] ?> - <?=$dadosCliente['Cidade'] ?> - <?=$dadosCliente['Estado'] ?> Cep:<?=$dadosCliente['Cep'] ?> <br />
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card card-primary">
            <div class="card card-header" >
               <h3 class="card-title"><i class="fas fa-user"></i> Atendimento</h3>
            </div>
            <div class="card-body">
                <b>Rota:</b> &nbsp;&nbsp;<?=$dadosRota['Nome']?> &nbsp;&nbsp;<?=$dadosRota['Observacao']?> <br />
                <b>Perímetro:</b> &nbsp;&nbsp;<?=$dadosRota['Perimetro']?><br />
                <b>Data da rota:</b> &nbsp;&nbsp;<?=date('d/m/Y h:i:s',strtotime($dadosRota['DataRota']))?><br />
                <b>Motorista:</b> &nbsp;&nbsp;<?=$dadosRota['Motorista']?><br />
                <b>Quantidade coletada: </b>&nbsp;<?=$dadosAtendimento['QuantidadeColetada']?> L <br />
                <b>Data do atendimento: </b>&nbsp;<?=date('d/m/Y h:i:s',strtotime($dadosAtendimento['DataCadastro']))?><br />
                <b>Observação: </b>&nbsp;<?=$dadosAtendimento['Observacao']?><br />
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
<div class="card card-primary">
<div class="card card-header" >
                <h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Formas de pagamento</h3>
</div>
<div class="card-body">
<?php 

(float)$valorPago = 0; 
(float)$totalPago = 0;
(float)$tot = 0;
$vlpg2 = 0;
		
?>
<?php foreach($dadosAtendimentoFormasPagamento as $value):?>
<div class="row">
	<b>Nome:</b> <?=$value["Nome"]?>
	<b> &nbsp;Quantidade: </b><?=$value["Quantidade"]?> 
	
	<?php (float)$valor = 0; ?>
	<?php $valor = ((float)$value["ValorPagamento"] > 0) ? (float)$value["ValorPagamento"] : (float)$value["ValorIndividual"]?>	

	<b> &nbsp;&nbsp;Valor:</b>R$<?=number_format($valor,2)?>&nbsp;
	
	<?php 
		
		$totalPago = ($valor*$value["Quantidade"]) ;
		
		
		
		
		
		
		$valorPago = number_format($valor*$value["Quantidade"],2)	;
		$vlpg2 = $valor*$value["Quantidade"];
		$tot = (float)$vlpg2 + $tot;
		
	?>
	
	
	
	
	<b>Valor pago:</b>R$<?=$valorPago?>
	
</div>
<br />

<?php endforeach; ?>
<div class="row">

<b> Total pago:</b> R$ <?=number_format($tot,2);?>
</div>
</div>

</div>
</div>


<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
    <div class="card card-primary">
        <div class="card card-header" >
            <h3 class="card-title"><i class="nav-icon nav-icon fas fa-copy"></i> Tipos de pagamentos</h3>
        </div>
    <div class="card-body">
        <?php foreach($dadosTipoPagamento as $value):?>
            <div class="row">
                <b>Nome:</b> <?=$value["Nome"]?>
            </div>
        <br />
        <?php endforeach; ?>
    </div>
    </div>
</div>


</div>


<div class="row">

<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
    <div class="card card-primary">
        <div class="card card-header" >
            <h3 class="card-title"><i class="fas fa-flask"></i> Recipientes da coleta</h3>
        </div>
    <div class="card-body">
        <?php foreach($dadosAtendimentoRecipientes as $value):?>
            <div class="row">
                <b>Nome:</b> <?=$value["Nome"]?> &nbsp;&nbsp;&nbsp;&nbsp; <b> &nbsp;&nbsp;Capacidade: </b><?=$value["Capacidade"]?>&nbsp;L
            </div>
        <br />
        <?php endforeach; ?>
    </div>


    </div>
</div>


<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
    <div class="card card-primary">
        <div class="card card-header" >
            <h3 class="card-title"><i class="fas fa-flask"></i> Recipientes do cliente</h3>
        </div>
    <div class="card-body">
       
        <?php if(!empty($dadosRecipienteCliente)): ?>

        <?php foreach($dadosRecipienteCliente as $value):?>
            <div class="row">
                <b>Nome:</b> <?=$value["Nome"]?> &nbsp;&nbsp;&nbsp;&nbsp; <b> &nbsp;&nbsp;Capacidade: </b><?=$value["Capacidade"]?>&nbsp;L
            </div>
        <br />
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    </div>
</div>
</div>
<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>relatorios/clientes'" class="btn noPrint">
<i class="fa fa-backward"></i> Voltar
</button>

<script>

window.print = function {
    window.print();
}
</script>