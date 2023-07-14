
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Coleta</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Coleta</a></li>
                <li class="breadcrumb-item active">Efetuar coleta</li>
            </ol>
            </div>
        </div>
    </div>
</section>

<div class="card card-primary">
<div class="card card-header" style="background-color: #97BD59 !important;">
                <h3 class="card-title">Dados da coleta</h3>
</div>
<div class="card-body">
<form name="coleta" id="coleta" method="post"  action="<?=base_url('coleta/salvar')?>" enctype="multipart/form-data" >

<div class="form-group">
    <label for="IdMotorista">Motorista:</label>
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas  fa-user"></span>
            </div>
          </div>
    <select class="form-control" name="IdMotorista" id="IdMotorista" required>
        <option value=""></option>
        <?php foreach ($motoristas as $value): ?>
            <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>


<div class="form-group">
    <label for="IdCliente">Cliente:</label>
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas  fa-users"></span>
            </div>
          </div>
    <select class="form-control" name="IdCliente" id="IdCliente" required>
        <option value=""></option>
        <?php foreach ($clientes as $value): ?>
            <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>


<div class="form-group">
    <label for="Recipiente">Recipiente:</label>
    
    <div class="input-group mb-4">
           <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas  fa-flask"></span>
            </div>
          </div>
    <select class="form-control select2" multiple="multiple" name="IdRecipiente[]" id="IdRecipiente" required>
        <option value=""></option>
        <?php foreach ($recipientes as $value): ?>
            <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
	
	</div>
</div>

<div class="form-group">
    <label for="Periodo">Quantidade (litros):</label>
    <div class="input-group mb-4">
           <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas  fa-server"></span>
            </div>
          </div>
    <input type="text" class="form-control dinheiro" value="" autocomplete="off" name="Quantidade" id="Quantidade" maxlength="200">
</div>
</div>


<div class="form-group">
    <label for="IdFormaPagamento">Forma de pagamento:</label>
    <div class="input-group mb-4">
           <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-list-alt"></span>
            </div>
          </div>
          <select class="form-control" name="IdFormaPagamento" id="IdFormaPagamento" required>
        <option value=""></option>
        <?php foreach ($formasPagamento as $value): ?>
            <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>



<div class="form-group">
    <label for="Periodo">Pagamento:</label>
    <div class="input-group mb-4">
           <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-money-bill-alt"></span>
            </div>
          </div>
    <input type="text" class="form-control dinheiro" value="" autocomplete="off" name="Pagamento" id="Pagamento" maxlength="200">
    </div>
</div>



<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn btn-default" value="Salvar" >
<i class="fa fa-plus"></i> Salvar
</button>
<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>coleta'" class="btn btn-default">
<i class="fa fa-backward"></i> Voltar
</button>

</form>
</div>
</div>