<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Alterar</h1>
            
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Usuário</a></li>
                <li class="breadcrumb-item active">Alterar</li>
            </ol>
            </div>
        </div>
    </div>
</section>

<div class="card card-primary">
<div class="card card-header" >
                <h3 class="card-title">Dados do usuário</h3>
</div>
<form name="usuario" id="usuario" method="post"  action="<?=base_url('usuario/salvar')?>" enctype="multipart/form-data" >
<input type="hidden" name="Id" id="Id" value="<?=base64_encode($usuario['Id']) ?>" />
<div class="card-body">

<div class="form-group">
    <label for="NivelAcesso">Nível de acesso:</label>
    <div class="input-group mb-4">
       
    <select name="NivelAcesso" id="NivelAcesso"  class="form-control" required="">

        <option value="">Selecione</option>
        <option value="1" <?php if($usuario['NivelAcesso'] =="1" ):?> selected <?php endif;?>>Administrador</option>
        <option value="2" <?php if($usuario['NivelAcesso'] =="2" ):?> selected <?php endif;?>>Motorista</option>
        <option value="3" <?php if($usuario['NivelAcesso'] =="3" ):?> selected <?php endif;?>>Cliente</option>
    
    </select>
    </div>
</div>

<div class="form-group nomeText" style="display:none;">
    <label for="Nome" class="nomeText">Nome:</label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="<?=$usuario['nome']?>" required autocomplete="off" name="nome" id="nome" placeholder="" required>   
        </div>
</div>

<div class="form-group clienteCmb" style="display:none;">
    <label for="IdCliente" class="clienteCmb">Cliente:</label>
    <div class="input-group mb-4">
           <select class="form-control clienteCmb" name="IdCliente" id="IdCliente">
        <option value=""></option>
        <?php foreach ($clientes as $value): ?>
        <option value="<?=$value['Id']?>" 
          <?php if($value['Id'] == $usuario['IdCliente'] ):?> selected <?php endif; ?>
         >

          <?=$value['Nome']?>
        </option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>

<div class="form-group motoristaCmb" style="display:none;">
    <label for="IdMotorista" class="motoristaCmb">Motorista:</label>
    <div class="input-group mb-4">
       
    <select class="form-control motoristaCmb" name="IdMotorista" id="IdMotorista">
        <option value=""></option>
        <?php foreach ($motoristas as $value): ?>
        <option value="<?=$value['Id']?>" <?php if($value['Id'] == $usuario['IdMotorista'] ):?> selected <?php endif; ?>>
              <?=$value['Nome']?>
            </option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>

<div class="form-group">
    <label for="Email">Email:</label>
    <div class="input-group mb-4">
           
          <input type="email" class="form-control" required autocomplete="off" value="<?=$usuario['Email']?>" name="Email" id="Email" placeholder="">
        </div>
</div>

<div class="form-group">
    <label for="login">Login:</label>
    <div class="input-group mb-4">
           
          <input type="text" readonly class="form-control" value="<?=$usuario['login']?>" autocomplete="off" required="" name="login" id="login" maxlength="200">
    
    </div>
</div>

<div class="form-group">
    <label for="login">Senha:</label>
    <div class="input-group mb-4">
           
    <input type="password" class="form-control" value="" autocomplete="off"  name="Senha" id="Senha" maxlength="200">
    </div>
</div>

<div class="form-group">
    <label for="login">Confirmar senha:</label>
    <div class="input-group mb-4">
    <input type="password" class="form-control" value="" autocomplete="off" name="ConfirmarSenha" id="ConfirmarSenha" maxlength="200">
    </div>
</div>

<div class="form-group">
    <label for="Status">Status:</label>
    <div class="input-group mb-4">
    <select name="Status" id="Status"  class="form-control" required="">
        <option value="">Selecione</option>
        <option value="1" <?php if($usuario['Status'] =="1" ):?> selected <?php endif;?>>Ativado</option>
        <option value="0" <?php if($usuario['Status'] =="0" ):?> selected <?php endif;?>>Desativado</option>
    </select>
    </div>
</div>



<button type="submit" onClick="submit();" name="btnCadastrar" id="btCadastrar" class="btn" value="Salvar" >
<i class="fa fa-plus"></i> Salvar
</button>
<button type="button" name="btnExcluir" data-toggle="modal" data-target="#modal-default" id="btnExcluir" class="btn" id="excluirUsuario">
<i class="fa fa-trash"></i> Excluir
</button>
<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>usuario'" class="btn">
<i class="fa fa-backward"></i> Voltar
</button>
</form>
</div>

</div>
<script language="javascript" type="text/javascript">

window.onload = function() {
  if($("#NivelAcesso").val() == 3)
  {
    $(".clienteCmb").fadeIn('fast');
  }
  else if($("#NivelAcesso").val() == 2)
  {
    $(".motoristaCmb").fadeIn('fast');
  }
  else if($("#NivelAcesso").val() == 1)
  {
    $(".motoristaCmb").fadeOut('fast');
    $(".clienteCmb").fadeOut('fast');
  }
};


function submit()
{
    $("#usuario").submit();
}


function excluirUsuario()
{
    $.ajax({
    url: "<?=site_url('usuario')?>/excluir",
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
                window.location.href="<?=site_url('usuario')?>";

    }).fail(function(jqXHR, textStatus ) {
        $(document).Toasts('create', {
                    title: 'Ocorreu um erro',
                    autohide: true,
                    delay: 750,
                    body: 'Por favor, tente novamente'
                });
                window.location.href="<?=site_url('usuario')?>";

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
              <button type="button" class="btn" onclick="excluirUsuario();" >Sim</button>
              <button type="button" class="btn" data-dismiss="modal">Não</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->