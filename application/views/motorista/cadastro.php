<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Cadastro</h1>
            
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Motorista</a></li>
                <li class="breadcrumb-item active">Cadastro</li>
            </ol>
            </div>
        </div>
    </div>
</section>

<div class="card card-primary">
<div class="card card-header" >
    <h3 class="card-title">Dados do motorista</h3>
</div>
<form name="motorista" id="motorista" method="post"  action="<?=base_url('motorista/salvar')?>" enctype="multipart/form-data" >

<div class="card-body">
<div class="form-group">
<label>Nome </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" required autocomplete="off" name="Nome" id="Nome" placeholder="" required>   
        </div>
</div>

<div class="form-group">
    <label for="Habilitacao">Habilitação:</label>
    <div class="input-group mb-4">

    <select name="Habilitacao" id="Habilitacao"  class="form-control" required="">

        <option value="">Selecione</option>
        <option value="ACC">ACC</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="A/B">A/B</option>
        <option value="A/C">A/C</option>
        <option value="A/D">A/D</option>
        <option value="A/E">A/E</option>
        <option value="ACC/B">ACC/B</option>
        <option value="ACC/C">ACC/C</option>
        <option value="ACC/D">ACC/D</option>
        <option value="ACC/E">ACC/E</option>
    
    </select>
    </div>
</div>
<div class="form-group">
<label>Telefone </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control telefone" required autocomplete="off" name="Telefone" id="Telefone" placeholder="" required>   
        </div>
</div>


<div class="form-group">
<label>Observação </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" autocomplete="off" name="Observacao" id="Observacao" placeholder="" required>   
        </div>
</div>
</div>
 &nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn" value="Salvar" >
<i class="fa fa-plus"></i> Salvar
</button>
<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>motorista'" class="btn">
<i class="fa fa-backward"></i> Voltar
</button>
<br />
<br />
</form>
</div>

