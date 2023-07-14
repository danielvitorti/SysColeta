<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Cadastro</h1>
            
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Documento</a></li>
                <li class="breadcrumb-item active">Cadastro</li>
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
<div class="card-body">

<div class="form-group">
    <label for="IdCliente">Cliente:</label>
    <div class="input-group mb-4">
      
    <select class="form-control" name="IdCliente" id="IdCliente" required>
        <option value=""></option>
        <?php foreach ($clientes as $value): ?>
            <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
        <?php endforeach; ?>
    </select>
    </div>
</div>

<div class="form-group">
    <label for="Titulo">Titulo:</label>
    <div class="input-group mb-4">
        
    <input type="Text" class="form-control" value="" required name="Titulo" autocomplete="off" id="Titulo">
    </div>
    <label for="Texto">Descrição:</label>
    <div class="input-group mb-4">
    <input type="Text" class="form-control" value=""  name="Texto" autocomplete="off" id="Texto">
    </div>
    <label for="DataValidade">Data de validade:</label>
    <div class="input-group mb-4">
    <input type="Text" class="form-control data" value="" required  name="DataValidade" autocomplete="off" id="DataValidade">
    </div>
    <label for="Arquivo">Arquivo:</label>
    <div class="input-group mb-4">
    <input type="file" class="form-control" value="" required name="Arquivo" autocomplete="off" id="Arquivo" accept=".pdf">
    </div>
</div>

<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn" value="Salvar" >
<i class="fa fa-plus"></i> Salvar
</button>
<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>documento'" class="btn">
<i class="fa fa-backward"></i> Voltar
</button>

</form>
</div>
</div>