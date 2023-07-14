<?php

    $this->VwRotaMotorista_model->Id = $this->uri->segment(3);
    $dadosRota = array();
    $dadosRota = $this->VwRotaMotorista_model->buscarPorId()->row_array();
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1>
              <?php if ($nivelAcesso == 1): ?>
                    Alterar
                    <?php else: ?>
                    Visualizar
                    <?php endif; ?>
              </h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Rota</a></li>
                <li class="breadcrumb-item active">
                <?php if ($nivelAcesso == 1): ?>
                    Alterar
                    <?php else: ?>
                    Visualizar
                    <?php endif; ?>
                </li>
            </ol>
            </div>
        </div>
    </div>
</section>

<div class="card card-primary">
<div class="card card-header">
                <h3 class="card-title">Dados da rota</h3>
</div>
<div class="card-body">

<form name="rota" id="rota" method="post"  action="<?=base_url('rota/salvar')?>" enctype="multipart/form-data" >
<input type="hidden" name="Id" id="Id" value="<?=base64_encode($rota['Id']) ?>" />

<div class="form-group">

   <label for="Status">Status:</label>
    <div class="input-group mb-3">
        
     <select name="Status" id="Status" class="form-control">

          <option value="">Selecione...</option>
          <option value="1" <?php if($rota['Status'] == 1): ?> selected <?php endif;?> >Aberta</option>
          <option value="2" <?php if($rota['Status'] == 2): ?> selected <?php endif;?>>Em andamento</option>
          <option value="3" <?php if($rota['Status'] == 3): ?> selected <?php endif;?>>Atendimento realizado</option>
     </select>
    </div>    
</div>

<br />
<div class="checkbox">
	<label>
	  <input type="checkbox" name="rotaLiberada" 
			<?php if($rota['Liberada'] == "1"):?> checked <?php endif; ?>
	  id="rotaLiberada">
	  Liberar rota
	 </label>
</div>

<div class="form-group">
    <label for="Nome">Nome:</label>
    <div class="input-group mb-4">
        
    <input type="text" class="form-control" value="<?=$rota['Nome'] ?>" autocomplete="off" name="Nome" id="Nome" maxlength="200">
    </div>
</div>
<div class="form-group">
    <label for="IdCliente">Cliente:</label> 
        

    <div class="input-group mb-4">
         <button type="button" name="btnPesquisarClientes" id="btnPesquisarClientes" class="btn float-left">
            <i class="fa fa-search"></i> Pesquisar
        </button>
        <select style="display:none !important;" class="form-control select3" <?php if($rotaFinalizada): ?> disabled <?php endif;?> multiple="multiple" name="IdCliente[]" id="IdCliente" required>
        <option value=""></option>
         
        </select>
        
    </div>
   
   
    <label>Clientes</label><br />
    <span id="spanClientes">
    <?php foreach($clientesRota as $value):?>
        <span id="cliente<?=$value["Id"]?>">
            <input type="hidden" name="IdCliente[]" id="IdCliente" value="<?=$value["Id"]?>" />
            <label><?=$value["Nome"]?></label>&nbsp;<i class="fa fa-trash" style="cursor: pointer;" onclick="removeCliente(<?=$value['Id']?>);"></i><br />
        </span>
    <?php endforeach;?>
    </span>
    
</div>


<div class="form-group">
    <label for="IdMotorista">Motorista:</label>
    <div class="input-group mb-4">
        
    <select class="form-control" name="IdMotorista" id="IdMotorista" required>
        <option value=""></option>
        
        <?php foreach($motoristas as $value): ?>
        <option value="<?=$value['Id']?>"
            <?php if($rota['IdMotorista'] == $value['Id']): ?> selected <?php endif; ?>
                ><?=$value['Nome']?>
        </option>
        <?php endforeach; ?>
    </select>
    </div>
</div>

<div class="form-group">
    <label for="IdVeiculo">Veículo:</label>
    <div class="input-group mb-4">
        
    <select class="form-control" name="IdVeiculo" id="IdVeiculo">
        <option value=""></option>
        <?php foreach($veiculos as $value): ?>
        <option value="<?=$value['Id']?>"
            <?php if($rota['IdVeiculo'] == $value['Id']): ?> selected <?php endif; ?>
                ><?=$value['Nome']?>
        </option>
        <?php endforeach; ?>


    </select>
    </div>
</div>


<div class="form-group">
    <label for="Periodo">Data:</label>
    <div class="input-group mb-4">
            <input type="text" class="form-control data" value="<?=date("d/m/Y", strtotime($rota['DataRota'])) ?>" name="DataRota" id="DataRota" maxlength="200">
    </div>            
</div>

<div class="form-group">
    <label for="Turno">Turno:</label>
    <div class="input-group mb-4">
        
    <select name="Turno[]" multiple="multiple" id="Turno" class="form-control select2" required>
        <?php foreach ($turnos as $value): ?>
            <option value="<?=$value['Id']?>"
            <?php foreach ($turnosRota as $turnoRota): ?>
             <?php if($turnoRota['IdTurno'] == $value['Id']): ?> selected <?php endif; ?>
            <?php endforeach; ?>
            ><?=$value['Nome']?></option>   
            <?php endforeach; ?>
    </select>
    </div>
</div>


<div class="form-group">
    <label for="Perimetro">Cidade:</label>
    <div class="input-group mb-4">
        
    <input type="text" class="form-control" autocomplete="off" value="<?=$rota['Perimetro'] ?>" name="Perimetro" id="Perimetro" maxlength="200">
    </div>        
</div>
 

<div class="form-group">
    <label for="Observacao">Observação:</label>
    <div class="input-group mb-4">
        
    <input type="text" class="form-control" autocomplete="off" value="<?=$rota['Observacao'] ?>" name="Observacao" id="Observacao" maxlength="200">
    </div>
</div>

<?php if($nivelAcesso == 1 || $nivelAcesso == 2): ?>
    <button type="button" name="btnCadastrar" id="btnAlterarRota" class="btn float-left">
    <i class="fa fa-plus"></i> Salvar
    </button>

    <button type="button" name="btnExcluir" data-toggle="modal" data-target="#modal-default" id="btnExcluir" class="btn" id="excluirRota">
    <i class="fa fa-trash"></i> Excluir
    </button>
<?php endif; ?>

<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>rota'" class="btn ">
<i class="fa fa-backward"></i> Voltar
</button>

</form>
</div>
</div>

<script>




function excluirRota()
{
    $.ajax({
    url: "<?=site_url('rota')?>/excluir",
    type: "POST",
    data: "Id="+$("#Id").val(),
    dataType: "html"

    }).done(function(resposta) {
        $(document).Toasts('create', {
                    title: 'Exclusão',
                    autohide: true,
                    delay: 750,
                    body: 'Exclusão realizada com sucesso'
                });
                window.location.href="<?=site_url('rota')?>";

    }).fail(function(jqXHR, textStatus ) {
        $(document).Toasts('create', {
                    title: 'Ocorreu um erro',
                    autohide: true,
                    delay: 750,
                    body: 'Por favor, tente novamente'
                });
                window.location.href="<?=site_url('rota')?>";

    }).always(function() {
        console.log("end");
    });
        
}
</script>


<div class="modal fade" id="modal-default" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Exclusão</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Deseja realmente realizar exclusão?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn" onclick="excluirRota();" >Sim</button>
              <button type="button" class="btn" data-dismiss="modal">Não</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->