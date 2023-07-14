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
                <li class="breadcrumb-item"><a href="#">Documento</a></li>
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
                <h3 class="card-title">Dados do documento</h3>
</div>
<form name="documento" id="documento" method="post"  action="<?=base_url('documento/salvar')?>" enctype="multipart/form-data" >
<input type="hidden" name="Id" id="Id" value="<?=base64_encode($documento['Id']) ?>" /> 
<div class="card-body">
<div class="form-group">
    <label for="IdCliente">Cliente:</label>
    <div class="input-group mb-4">
        
    <select class="form-control" name="IdCliente" id="IdCliente" required>
        <option value=""></option>
        <?php foreach ($clientes as $key => $value): ?>
            <option value="<?=$value['Id']?>"
             <?php if($documento['IdCliente'] == $value['Id']): ?> selected <?php endif; ?>
            ><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>


<div class="form-group">
    <label for="Nome">Titulo:</label>
    <div class="input-group mb-4">
        
    <input type="text" class="form-control" value="<?=$documento['Titulo']?>" name="Titulo" autocomplete="off" id="Nome" required="" maxlength="200">
    </div>
    <label for="Texto">Descrição:</label>
    <div class="input-group mb-4">
        
    <input type="Text" class="form-control" value="<?=$documento['Texto']?>"  name="Texto" autocomplete="off" id="Texto">
    </div>
    <label for="DataValidade">Data de validade:</label>
    <div class="input-group mb-4">
            <input type="Text" class="form-control data" value="<?=date("d/m/Y", strtotime($documento['DataValidade']))?>"  name="DataValidade" autocomplete="off" id="DataValidade">
    </div>
    <label for="ArquivoAntigo">
        Arquivo atual:
        <a target="_blank" href="<?=site_url('uploads')?>/<?=$documento["Arquivo"]?>" class="btn">
                            <span class="label label-primary"><i class="fa fa-file-pdf"></i></span>
        </a>
    </label>
    <br />
    <?php if ($nivelAcesso == 1): ?>
    <label for="Arquivo">Arquivo:</label>
    <input type="file" class="form-control" required accept=".pdf" value="<?=$documento['Arquivo']?>" name="Arquivo" autocomplete="off" id="Arquivo">            
    <?php endif; ?>
</div>

<?php if($nivelAcesso == 1): ?>
<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn" value="Salvar" >
<i class="fa fa-plus"></i> Salvar
</button>
<button type="button" name="btnExcluir" data-toggle="modal" data-target="#modal-default" id="btnExcluir" class="btn" id="excluirDocumento">
<i class="fa fa-trash"></i> Excluir
</button>
<?php endif ; ?>
<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>documento'" class="btn">
<i class="fa fa-backward"></i> Voltar
</button>
</form>
</div>
</div>

<script>
function excluirDocumento()
{
    $.ajax({
    url: "<?=site_url('documento')?>/excluir",
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
                window.location.href="<?=site_url('documento')?>";

    }).fail(function(jqXHR, textStatus ) {
        $(document).Toasts('create', {
                    title: 'Ocorreu um erro',
                    autohide: true,
                    delay: 750,
                    body: 'Por favor, tente novamente'
                });
                window.location.href="<?=site_url('documento')?>";

    }).always(function() {
        console.log("end");
    });
        
}
</script>


<div class="modal fade" id="modal-default">
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
              <button type="button" class="btn" onclick="excluirDocumento();" >Sim</button>
              <button type="button" class="btn" data-dismiss="modal">Não</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->