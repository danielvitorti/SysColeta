<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Cadastro</h1>
            
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Usuário</a></li>
                <li class="breadcrumb-item active">Cadastro</li>
            </ol>
            </div>
        </div>
    </div>
</section>
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
<div class="card card-header" >
                <h3 class="card-title">Dados do usuário</h3>
</div>
<form name="usuario" id="usuario" method="post" action="<?=base_url('usuario/salvar')?>" enctype="multipart/form-data" >


<div class="card-body">

<div class="form-group">
    <label for="NivelAcesso">Nível de acesso:</label>
    <div class="input-group mb-4">
      
    <select name="NivelAcesso" id="NivelAcesso"  class="form-control" required="">

        <option value="">Selecione</option>
        <option value="1">Administrador</option>
        <option value="2">Motorista</option>
        <option value="3">Cliente</option>
    
    </select>
    </div>
</div>

<div class="form-group clienteCmb" style="display:none;">
    <label for="IdCliente" class="clienteCmb">Cliente:</label>
    <div class="input-group mb-4">
      
    <select class="form-control clienteCmb" name="IdCliente" id="IdCliente">
        <option value=""></option>
        <?php foreach ($clientes as $value): ?>
            <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>

<div class="form-group nomeText">
    <label for="Nome" class="nomeText">Nome:</label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" required autocomplete="off" name="nome" id="nome" placeholder="" required>   
        </div>
</div>

<div class="form-group motoristaCmb" style="display:none;">
    <label for="IdMotorista" class="motoristaCmb">Motorista:</label>
    <div class="input-group mb-4">
      
    <select class="form-control motoristaCmb" name="IdMotorista" id="IdMotorista">
        <option value=""></option>
        <?php foreach ($motoristas as $value): ?>
            <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>

<div class="form-group">
    <label for="Email">Email:</label>
    <div class="input-group mb-4">
          <input type="email" class="form-control" autocomplete="off" name="Email" id="Email" placeholder="">
        </div>
</div>

<div class="form-group">
    <label for="login">Login:</label>
    <div class="input-group mb-4">
          <input type="text" class="form-control" value="" autocomplete="off" required="" name="login" id="login" maxlength="200">
    
    </div>
</div>

<div class="form-group">
    <label for="login">Senha:</label>
    <div class="input-group mb-4">
           
    <input type="password" class="form-control" value="" autocomplete="off" required="" name="Senha" id="Senha" maxlength="200">
    </div>
</div>

<div class="form-group">
    <label for="login">Confirmar senha:</label>
    <div class="input-group mb-4">
           
    <input type="password" class="form-control" value="" autocomplete="off" required="" name="ConfirmarSenha" id="ConfirmarSenha" maxlength="200">
    </div>
</div>

<div class="form-group">
    <label for="Status">Status:</label>
    <div class="input-group mb-4">
       
    <select name="Status" id="Status"  class="form-control" required="">
        <option value="">Selecione</option>
        <option value="1">Ativado</option>
        <option value="0">Desativado</option>
    </select>
    </div>
</div>



<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn" value="Salvar" >
<i class="fa fa-plus"></i> Salvar
</button>
<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>usuario'" class="btn">
<i class="fa fa-backward"></i> Voltar
</button>
</form>
</div>
</div>

