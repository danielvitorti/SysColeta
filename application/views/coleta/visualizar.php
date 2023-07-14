
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Coleta</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Coleta</a></li>
                <li class="breadcrumb-item active">Cadastro</li>
            </ol>
            </div>
        </div>
    </div>
</section>

<div class="card card-primary">
<div class="card card-header">
                <h3 class="card-title">Dados da coleta</h3>
</div>
<div class="card-body">
<form name="coleta"  id="coleta" method="post"  action="<?=base_url('coleta/salvar')?>" enctype="multipart/form-data" >

<input type="hidden" name="Id" id="Id" value="<?=$coleta['Id'] ?>" />



<div class="form-group">
    <label for="IdCliente">Rota:</label>
  
    <select class="form-control select2" name="IdRota" id="IdRota" required>
        <option value=""></option>
        <?php foreach ($coletas as $value): ?>
            <option value="<?=$value['Id']?>" <?php if($coleta['IdRota'] == $value['Id']): ?> selected <?php endif; ?>><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
</div>


<div class="form-group">
    <label for="Recipiente">Recipiente:</label>
    <input type="text" id="Recipiente" name="Recipiente" value="<?=$coleta['Recipiente'] ?>" class="form-control data"  maxlength="200">
      
</div>

<div class="form-group">
    <label for="Periodo">Quantidade:</label>
    <input type="text" class="form-control" value="" value="<?=$coleta['Quantidade'] ?>" autocomplete="off" name="Quantidade" id="Quantidade" maxlength="200">
</div>


<div class="form-group">
    <label for="Periodo">Pagamento:</label>
    <input type="text" class="form-control" value="" value="<?=$coleta['Pagamento'] ?>" autocomplete="off" name="Pagamento" id="Pagamento" maxlength="200">
</div>




<input type="submit" name="btnCadastrar" id="btCadastrar" class="btn btn-primary float-left" value="Cadastrar"/>
<input type="button" name="btnCancelar" id="btnCancelar" class="btn btn-default float-right" value="Voltar" onclick="window.location.href='<?=base_url()?>coleta'"/>
</form>
</div>
</div>