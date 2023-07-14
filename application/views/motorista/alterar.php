<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Alterar</h1>
            
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Motorista</a></li>
                <li class="breadcrumb-item active">Alterar</li>
            </ol>
            </div>
        </div>
    </div>
</section>

<div class="card card-primary">
<div class="card card-header" >
                <h3 class="card-title">Dados do motorista</h3>
</div>
<div class="card-body">
<form name="motorista" id="motorista" method="post"  action="<?=base_url('motorista/salvar')?>" enctype="multipart/form-data" >
<input type="hidden" name="Id" id="Id" value="<?=base64_encode($motorista['Id']) ?>" />
<div class="card-body">
<div class="form-group">
<label>Nome </label>
        <div class="input-group mb-4">

          <input type="text" class="form-control"  value="<?=$motorista['Nome'] ?>" required autocomplete="off" name="Nome" id="Nome" placeholder="" required>   
        </div>
</div>





<div class="form-group">
    <label for="Habilitacao">Habilitação:</label>
    <div class="input-group mb-4">
        
    <select name="Habilitacao" id="Habilitacao"  class="form-control" required="">

        <option value="">Selecione</option>
        <option value="ACC" <?php if($motorista['Habilitacao'] =="ACC" ):?> selected <?php endif;?> >ACC</option>
        <option value="A" <?php if($motorista['Habilitacao'] =="A" ):?> selected <?php endif;?>>A</option>
        <option value="B" <?php if($motorista['Habilitacao'] =="B" ):?> selected <?php endif;?>>B</option>
        <option value="C" <?php if($motorista['Habilitacao'] =="C" ):?> selected <?php endif;?>> C</option>
        <option value="D" <?php if($motorista['Habilitacao'] =="D" ):?> selected <?php endif;?>>D</option>
        <option value="E" <?php if($motorista['Habilitacao'] =="E" ):?> selected <?php endif;?>>E</option>
        <option value="A/B" <?php if($motorista['Habilitacao'] =="A/B" ):?> selected <?php endif;?>>A/B</option>
        <option value="A/C"> <?php if($motorista['Habilitacao'] =="A/C" ):?> selected <?php endif;?>A/C</option>
        <option value="A/D" <?php if($motorista['Habilitacao'] =="A/D" ):?> selected <?php endif;?>>A/D</option>
        <option value="A/E" <?php if($motorista['Habilitacao'] =="A/E" ):?> selected <?php endif;?>>A/E</option>
        <option value="ACC/B" <?php if($motorista['Habilitacao'] =="ACC/B" ):?> selected <?php endif;?>>ACC/B</option>
        <option value="ACC/C" <?php if($motorista['Habilitacao'] =="ACC/C" ):?> selected <?php endif;?>>ACC/C</option>
        <option value="ACC/D" <?php if($motorista['Habilitacao'] =="ACC/D" ):?> selected <?php endif;?>>ACC/D</option>
        <option value="ACC/E" <?php if($motorista['Habilitacao'] =="ACC/E" ):?> selected <?php endif;?>>ACC/E</option>
    
    </select>
    </div>
</div>
<div class="form-group">
<label>Telefone </label>
        <div class="input-group mb-4">
           <input type="text" class="form-control telefone" value="<?=$motorista['Telefone'] ?>" required autocomplete="off" name="Telefone" id="Telefone" placeholder="" required>   
        </div>
</div>


<div class="form-group">
<label>Observação </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="<?=$motorista['Observacao'] ?>" autocomplete="off" name="Observacao" id="Observacao" placeholder="" required>   
        </div>
</div>
</div>
 &nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn" value="Salvar" >
<i class="fa fa-plus"></i> Salvar
</button>
<button type="button" name="btnExcluir" data-toggle="modal" data-target="#modal-default" id="btnExcluir" class="btn" id="excluirMotorista">
    <i class="fa fa-trash"></i> Excluir
</button>
<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>motorista'" class="btn">
<i class="fa fa-backward"></i> Voltar
</button>
<br />
<br />
</form>
</div>
</div>

<script>
function excluirMotorista()
{
    $.ajax({
    url: "<?=site_url('motorista')?>/excluir",
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
                window.location.href="<?=site_url('motorista')?>";

    }).fail(function(jqXHR, textStatus ) {
        $(document).Toasts('create', {
                    title: 'Ocorreu um erro',
                    autohide: true,
                    delay: 750,
                    body: 'Por favor, tente novamente'
                });
                window.location.href="<?=site_url('motorista')?>";

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
              <button type="button" class="btn" onclick="excluirMotorista();" >Sim</button>
              <button type="button" class="btn" data-dismiss="modal">Não</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->