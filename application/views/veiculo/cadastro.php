<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Cadastro</h1>            
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Veiculo</a></li>
                <li class="breadcrumb-item active">Cadastro</li>
            </ol>
            </div>
        </div>
    </div>
</section>

<div class="card card-primary">
<div class="card card-header" >
        <h3 class="card-title">Dados do veiculo</h3>
</div>
<form name="veiculo" id="veiculo" method="post"  action="<?=base_url('veiculo/salvar')?>" enctype="multipart/form-data" >

<div class="card-body">
<div class="form-group">
<label>Nome </label>
        <div class="input-group mb-4">
        <div class="input-group-prepend"> 
         </div>
         
          <input type="text" class="form-control" required autocomplete="off" name="Nome" id="Nome" placeholder="" required>   
        </div>
</div>
<div class="form-group">
<label>Placa </label>
        <div class="input-group mb-4">
        <div class="input-group-prepend">
          </div>
          <input type="text" class="form-control" required autocomplete="off" name="Placa" id="Placa" placeholder="" required>   
        </div>
</div>
<div class="form-group">
<label>Capacidade </label>
        <div class="input-group mb-4">
    
          <input type="text" class="form-control" required autocomplete="off" name="Capacidade" id="Capacidade" placeholder="" required>   
        </div>
</div>
 &nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn" value="Salvar" >
    <i class="fa fa-plus"></i> Salvar
</button>
<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>veiculo'" class="btn">
    <i class="fa fa-backward"></i> Voltar
</button>
<br />
<br />
</form>
</div>

