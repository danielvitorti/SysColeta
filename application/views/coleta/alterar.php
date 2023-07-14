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
              <h1>Dados da coleta</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Coleta</a></li>
                <li class="breadcrumb-item active">Dados da coleta</li>
            </ol>
            </div>
        </div>
    </div>
</section>


<?php if ($this->session->flashdata('success') == TRUE): ?>
    <div class="alert alert-success alert-dismissible" style="background-color: #97BD59 !important;">
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


<div class="card card-primary">
<div class="card-body">
<h2 class="page-header">
            Rota <?=$dadosRota['Id']?> - <?=$dadosRota['Nome']?> ,
            <small class="pull-right">Data: <?=date('d/m/Y',strtotime($dadosRota['DataRota']))?></small>
          </h2>
<div class="col-sm-4 invoice-col">

          <address>
           <br />
            <strong>Motorista:&nbsp;</strong><?=$dadosRota['Motorista']?><br>
            <strong>Turno: &nbsp;</strong><?php 
                echo $turnos;
            ?><br>
            <strong>Observação:&nbsp;</strong><?=$dadosRota['Observacao']?><br>
          </address>
</div>


<button type="button" style="display:none !important;" name="btnImprimir" id="btnImprimir" onclick="window.print();" class="btn btn-default notPrint ">
<i class="fa fa-print"></i> Imprimir
</button>

</div>

</div>
<?php $IdCliente = 0; ?>
<?php foreach($clientesRota as $value): ?>

<div class="card card-primary">
<div class="card card-header" style="background-color: #97BD59 !important;">
                <h3 class="card-title"><?=$value['Cliente']?></h3>
</div>
<div class="card-body">


<div class="row">
Endereço:<?php echo $value['Rua']."&nbsp;Número:".$value['Numero']."&nbsp;".$value['Cidade']."&nbsp;Cep:".$value['Cep'];?>

</div>
<br />

<!-- -->
<div class="row">
    <label>Coleta</label>
</div>


<form name="frmAtendimento" id="frmAtendimento" method="post" action="<?=base_url('rota/salvarAtendimento')?>" enctype="multipart/form-data">

<input type="hidden" id="IdRota" name="IdRota" value="<?=base64_encode($IdRota)?>" />
<input type="hidden" id="IdCliente[]" name="IdCliente[]" value="<?=$value['IdCliente']?>" />


<div class="row">

<div class="table-responsive">
<table class="table table-striped">
    <tbody>
        <tr>
            <td>
                <div class="card">
                    <div class="card-body">
                    Coletado
                    <input type="text" name="QuantidadeColetada[<?=$IdCliente?>]"monkeyup="somenteNumeros(this);" value="<?=$value['QuantidadeColetada']?>" id="QuantidadeColetada" onkeyup="somenteNumeros(this);" class="form-control"/>
                    <small><i>Litros</i></small>
                    </div>
                </div>
            </td>
            <td>
                <div class="card">
                    <div class="card-body">
                    Observação
                    <input type="text" name="Observacao[<?=$IdCliente?>]" value="<?=$value["ObservacaoColeta"]?>" id="Observacao" class="form-control"/>
                    <small>&nbsp;</small>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>

</table>
</div>    
    
</div>






<div class="row">
    <label>Recipientes &nbsp; <i class="fas fa-flask"></i></label>
</div>
<div class="row">

<div class="table-responsive">
<table class="table" id="tbRecipientes<?=$IdCliente?>">
    <tbody>

        <?php 

            $this->Atendimento_model->IdRota = $IdRota;
            $this->Atendimento_model->IdCliente = $value['IdCliente'];
            $data['dadosAtendimento'] = $this->Atendimento_model->buscarPorRotaCliente()->result_array();
            $data['atendimentoRecipientes'] = array();
            $data['atendimentoFormasPagamento'] = array();

            foreach($data['dadosAtendimento'] as $value)
            {
                $this->AtendimentoRecipiente_model->IdAtendimento = $value['Id'];
                $this->AtendimentoFormaPagamento_model->IdAtendimento = $value['Id'];
                $data['atendimentoRecipientes'] = $this->AtendimentoRecipiente_model->buscarPorAtendimento()->result_array(); 
                $data['atendimentoFormasPagamento'] = $this->AtendimentoFormaPagamento_model->buscarPorAtendimento()->result_array();
            }

        ?>
        <?php if(count($data['atendimentoRecipientes']) > 0 ): ?>
        <?php foreach($data['atendimentoRecipientes'] as $valueAtendimentoRecipientes):?>
        
        <tr id="linhaRecipiente">
            <td>
                    Recipiente
                    <select class="form-control" name="IdRecipiente[<?=$IdCliente?>][]" id="IdRecipiente">
                            <option value=""></option>
                            <?php foreach ($recipientes as $value): ?>
                                <option value="<?=$value['Id']?>"
                                
                                <?php if($valueAtendimentoRecipientes['IdRecipiente'] == $value['Id']): ?>
                                   selected
                                <?php endif; ?>     
                                ><?=$value['Nome']?></option>   
                            <?php endforeach; ?>
                        </select>
                
            </td>
            <td>
            <br />
                <a class="btn excluirRecipiente<?=$IdCliente?>" onclick="excluirRecipiente(<?=$IdCliente?>)">
                 <i class="fa fa-trash"></i> Remover
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>

            <tr id="linhaRecipiente">
            <td>
                    Recipiente
                    <select class="form-control" name="IdRecipiente[<?=$IdCliente?>][]" id="IdRecipiente">
                            <option value=""></option>
                            <?php foreach ($recipientes as $value): ?>
                                <option value="<?=$value['Id']?>"
                                ><?=$value['Nome']?></option>   
                            <?php endforeach; ?>
                        </select>
                
            </td>
            <td>
            <br />
                <a class="btn excluirRecipiente<?=$IdCliente?>" onclick="excluirRecipiente(<?=$IdCliente?>)">
                 <i class="fa fa-trash"></i> Remover
                </a>
            </td>
        </tr>

        <?php endif; ?>
    </tbody>
    <div class="float-right">
        <button type="button" class="btn" onclick="adicionarRecipiente(<?=$IdCliente?>);" id="novoRecipiente"> <i class="fa fa-plus"></i> Novo recipiente</button>
    </div>
</table>
</div>    
    
</div>
    


<div class="row">
    <label>Pagamentos&nbsp; <i class="fas fa-money-bill-alt"></i></label>
</div>
<div class="row">

<div class="table-responsive">
<table class="table" id="tbPagamentos<?=$IdCliente?>">
    <tbody>
        <?php if(count($data['atendimentoFormasPagamento']) > 0): ?>
        <?php foreach($data['atendimentoFormasPagamento'] as $valueAtendimentoFormaPagamento): ?>
        <tr id="linhaPagamento">
            <td>
                Pagamento
                <select class="form-control" name="IdFormaPagamento[<?=$IdCliente?>][]" id="IdFormaPagamento">
                        <option value=""></option>
                        <?php foreach ($formasPagamento as $value): ?>
                            <option value="<?=$value['Id']?>"
                        <?php if($value['Id'] == $valueAtendimentoFormaPagamento["IdFormaPagamento"]): ?> selected <?php endif; ?>
                            ><?=$value['Nome']?></option>   
                        <?php endforeach; ?>
                </select>
                
            </td>
            <td>
                Quantidade
                <input type="text" onkeyup="somenteNumeros(this);" class="form-control" value="<?=$valueAtendimentoFormaPagamento["Quantidade"]?>" name="Quantidade[<?=$IdCliente?>][]" id="Quantidade" />
            </td>
            <td>
            <br />
                <a class="btn excluirPagamento<?=$IdCliente?>" onclick="excluirPagamento(<?=$IdCliente?>)">
                 <i class="fa fa-trash"></i> Remover
                </a>
            </td>
            
            
        </tr>
        <?php endforeach; ?>
        <?php else: ?>

            <tr id="linhaPagamento">
            <td>
                Pagamento
                <select class="form-control" name="IdFormaPagamento[<?=$IdCliente?>][]" id="IdFormaPagamento">
                        <option value=""></option>
                        <?php foreach ($formasPagamento as $value): ?>
                            <option value="<?=$value['Id']?>">
                        
                            <?=$value['Nome']?></option>   
                        <?php endforeach; ?>
                </select>
                
            </td>
            <td>
                Quantidade
                <input type="text" onkeyup="somenteNumeros(this);" class="form-control" value="" name="Quantidade[<?=$IdCliente?>][]" id="Quantidade" />
            </td>
            <td>
            <br />
                <a class="btn excluirPagamento<?=$IdCliente?>" onclick="excluirPagamento(<?=$IdCliente?>)">
                 <i class="fa fa-trash"></i> Remover
                </a>
            </td>
            
            
        </tr>

        <?php endif; ?>
    </tbody>
    <div class="float-right">
        <button type="button" class="btn" onclick="adicionarPagamento(<?=$IdCliente?>);" id="novoPagamento"> <i class="fa fa-plus"></i> Novo pagamento</button>
    </div>
</table>


</div>    

</div>
    
<?php $IdCliente++; ?>
<?php endforeach; ?>
<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn float-left">
<i class="fa fa-plus"></i> Salvar
</button>



<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>coleta'" class="btn ">
<i class="fa fa-backward"></i> Voltar
</button>

</form>
</div>


</div>

<script>


function excluirRota()
{
    
    if(confirm("Deseja realmente realizar esta exclusão?"))
    {
        document.getElementById("rota").submit();
    }
}


function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }   
}

</script>