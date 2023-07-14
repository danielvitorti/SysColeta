
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Cadastro</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Rota</a></li>
                <li class="breadcrumb-item active">Cadastro</li>
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


<div class="form-group">
    <label for="IdStatusRota">Status:</label>
    <div class="input-group mb-3">
        <select name="Status" id="Status" class="form-control">

          <option value="">Selecione...</option>
          <option value="1">Aberta</option>
          <option value="2">Em andamento</option>
          <option value="3">Atendimento realizado</option>
          
     </select>
    </div>
</div>
<div class="checkbox">
                    <label>
                      <input type="checkbox" name="rotaLiberada" id="rotaLiberada">
                      Liberar rota
                    </label>
    </div>

<div class="form-group">
    <label for="Perimetro">Nome:</label>
    <div class="input-group mb-4">
      
    <input type="text" class="form-control" value="" autocomplete="off" name="Nome" id="Nome" maxlength="200">
    </div>
</div>

<div class="form-group">
    <label for="IdCliente">Cliente:</label>
    <div class="input-group mb-4">
       
    <select class="form-control select2" multiple="multiple" name="IdCliente[]" id="IdCliente" required>
        <option value=""></option>
        <?php foreach ($clientes as $value): ?>
            <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
</div>
</div>

<div class="form-group">
    <label for="IdMotorista">Motorista:</label>
    <div class="input-group mb-4">
       
    <select class="form-control" name="IdMotorista" id="IdMotorista" required>
        <option value=""></option>
        <?php foreach ($motoristas as $value): ?>
            <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>

<div class="form-group">
    <label for="IdVeiculo">Veículo:</label>
    <div class="input-group mb-4">
       
    <select class="form-control" name="IdVeiculo" id="IdVeiculo">
        <option value=""></option>
        <?php foreach ($veiculos as $value): ?>
            <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>

<div class="form-group">

    <label for="Periodo">Data:</label>
    <div class="input-group mb-4">
    <input type="text" class="form-control data" value="" autocomplete="off" name="DataRota" id="DataRota" maxlength="200">
    </div>
</div>

<div class="form-group">
    <label for="Turno">Turno:</label>
    <div class="input-group mb-4">
        
    <select name="Turno[]" id="Turno" class="form-control select2" multiple="multiple" autocomplete="off" required>
        
        <?php foreach($turnos as $value): ?>
        <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>
        <?php endforeach; ?>
    </select>
</div>
</div>


<div class="form-group">
    <label for="Perimetro">Cidade:</label>
    <div class="input-group mb-4">
        
    <input type="text" class="form-control" value="" autocomplete="off" name="Perimetro" id="Perimetro" maxlength="200">
    </div>
</div>

<div class="form-group">
    <label for="Observacao">Observação:</label>
    <div class="input-group mb-4">
      
    <input type="text" class="form-control" value="" autocomplete="off" name="Observacao" id="Observacao" maxlength="200">
    </div>
</div>

<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn float-left">
<i class="fa fa-plus"></i> Salvar
</button>


<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>rota'" class="btn ">
<i class="fa fa-backward"></i> Voltar
</button>
</form>
</div>
</div>