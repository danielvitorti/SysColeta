<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Cadastro</h1>
            
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Cliente</a></li>
                <li class="breadcrumb-item active">Cadastro</li>
            </ol>
            </div>
        </div>
    </div>
</section>

<form action="<?=site_url("cliente/salvar")?>" name="frmClienteCadastrar" id="frmClienteCadastrar" method="post"  enctype="multipart/form-data">
    
<div class="card card-primary">
<div class="card card-header">
      <h3 class="card-title">Dados do cliente</h3>
</div>

    <div class="card-body" >
     <label>Nome do estabelecimento </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="" required autocomplete="off" name="Nome" placeholder="" required>   
        </div>
        <label> 
          CNPJ
      <input type="radio" id="radCnpjCpf" name="radCnpjCpf" value="cnpj"  />
          CPF
          <input type="radio" id="radCnpjCpf" name="radCnpjCpf" value="cpf" />
        </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control"  required  autocomplete="off" maxlength="30" id="CnpjCpf" name="CnpjCpf" placeholder="" value="">
        </div>
        <label>Nome do responsável </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" autocomplete="off" name="NomeResponsavel" id="NomeResponsavel" placeholder="">
        </div>
        <label>Email </label>
        <div class="input-group mb-4">
          <input type="email" class="form-control" required autocomplete="off" name="Email" id="Email" placeholder="">
        </div>
        <label>Telefone com whastapp </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value=""  autocomplete="off" name="Telefone" id="Telefone" placeholder="">
        </div>
        <label>Telefone fixo </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value=""  autocomplete="off" name="TelefoneFixo" id="TelefoneFixo" placeholder="">
        </div>
       
       
        <label>Cep </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" required autocomplete="off" name="Cep" id="cep" placeholder="">
        </div>
        <label>Rua </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" autocomplete="off" name="Rua" id="rua" placeholder="">
        </div>
        <label>Número </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control"  autocomplete="off" name="Numero" id="Numero" placeholder="">
        </div>
        <label>Bairro </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" required autocomplete="off" name="Bairro" id="bairro" placeholder="">
        </div>
        <label>Cidade </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" required  autocomplete="off" name="Cidade" id="cidade" placeholder="">
        </div>
      
        <label>Horário de coleta </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" autocomplete="off" name="HorarioColeta" id="HorarioColeta" placeholder="">
        </div>
        <label>Status </label>
        <div class="input-group mb-4">
          <select class="form-control" name="Status" id="Status" required>
              <option value=""></option>
              <option value="1">Novo</option>
              <option value="2">Recorrente</option>
              <option value="3">Avulso</option>
              <option value="4">Concorrente</option>
          </select>
        </div>
        <label>Periodicidade </label>
        <div class="input-group mb-4">
          <select class="form-control" name="PeriodicidadeColeta" id="PeriodicidadeColeta">
              <option value=""></option>
              <?php foreach ($periodicidades as $value): ?>
                  <option value="<?=$value['Id']?>" ><?=$value['Nome']?></option>   
              <?php endforeach; ?>
          </select>
        </div>
        <label>Instagram </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value=""  autocomplete="off" name="Instagram" id="Instagram" placeholder="">
        </div>
        <label>Etiqueta </label>
        <div class="input-group mb-4">
          <select class="form-control select2" name="Etiqueta[]" multiple="multiple" id="Etiqueta">
              <?php foreach ($etiquetas as $value): ?>
                  <option value="<?=$value['Id']?>"><?=$value['Descricao']?></option>   
              <?php endforeach; ?>
          </select>
        </div>
     

</div>
</div>
<div class="card card-primary">
  <div class="card card-header" >
      <h3 class="card-title">Formas de pagamento</h3>
  </div>

<div class="card-body">

<div class="table-responsive">
<table class="table" id="tbFormaPagamentoCliente">
    <tbody>
        <tr id="linhaFormaPagamento">
            <td>   
              Descrição<input type="text" class="form-control" autocomplete="off" name="DescricaoFormaPagamento[]" id="DescricaoFormaPagamento" placeholder="" />   
            </td>
            
            <td>
                Pagamento
                    
                <select class="form-control" name="IdFormaPagamento[]" id="IdFormaPagamento">
                        <option value=""></option>
                        <?php foreach ($formasPagamento as $value): ?>
                            <option value="<?=$value['Id']?>">
                                <?=$value['Nome']?>
                            </option>   
                        <?php endforeach; ?>
                </select>
                
            </td>
            <td>
                Quantidade
                <input type="text" onkeyup="somenteNumeros(this);" class="form-control" name="QuantidadeFormaPagamento[]" id="QuantidadeFormaPagamento" />
            </td>
            <td>
            <br />
                <a class="btn excluirFormaPagamentoCliente" onclick="excluirFormaPagamentoCliente2();">
                 <i class="fa fa-trash"></i> Remover
                </a>
            
            </td>
        </tr>                          

    </tbody>
    <div class="float-right">
        <button type="button" class="btn" onclick="adicionarFormaPagamentoCliente2();" id="novaFormaPagamentoCliente"> <i class="fa fa-plus"></i> Nova forma de pagamento</button>
    </div>
           
</table>
</div>    
</div>
</div>


<div class="card card-primary">
  <div class="card card-header" >
      <h3 class="card-title">Tipos de pagamento</h3>
  </div>

<div class="card-body">

<label>Tipo de pagamento </label>
        <div class="input-group mb-4">
       
        </div>
<div class="table-responsive">
<table class="table" id="tbTipoPagamentoCliente">
    <tbody>
        <tr id="linhaTipoPagamento">
            <td>   
              Descrição<input type="text" class="form-control" autocomplete="off" name="DescricaoTipoPagamento[]" id="DescricaoTipoPagamento" placeholder="" />   
            </td>
            
            <td>
                Tipo
                <select class="form-control" name="IdTipoPagamento[]" id="IdTipoPagamento">
                        <option value=""></option>
                        <?php foreach ($tiposPagamento as $value): ?>
                            <option value="<?=$value['Id']?>">
                                <?=$value['Nome']?>
                            </option>   
                        <?php endforeach; ?>
                </select>
                
            </td>
            <td>
                Quantidade
                <input type="text" onkeyup="somenteNumeros(this);" class="form-control" name="QuantidadeTipoPagamento[]" id="QuantidadeTipoPagamento" />
            </td>
            <td>
            <br />
                <a class="btn excluirTipoPagamentoCliente" onclick="excluirTipoPagamento2();">
                 <i class="fa fa-trash"></i> Remover
                </a>
            
            </td>
        </tr>                          

    </tbody>
    <div class="float-right">
        <button type="button" class="btn" onclick="adicionarTipoPagamento2();" id="novoTipoPagamentoCliente"> <i class="fa fa-plus"></i> Novo tipo de pagamento</button>
    </div>
           
</table>
</div>    
</div>
</div>



<div class="card card-primary">
  <div class="card card-header" >
      <h3 class="card-title">Recipientes</h3>
  </div>

<div class="card-body">

<div class="table-responsive">
<table class="table" id="tbRecipienteCliente">
    <tbody>
        <tr id="linhaRecipiente">
            <td>
                Descrição
                <input type="text" class="form-control" autocomplete="off" name="DescricaoRecipiente[]" id="DescricaoRecipiente" placeholder="">   
        
            </td>
            <td>
                Recipiente
                    
                <select class="form-control" name="IdRecipiente[]" id="IdRecipiente">
                  <option value=""></option>
                  <?php foreach ($recipientes as $value): ?>
                      <option value="<?=$value['Id']?>"><?=$value['Nome']?></option>   
                  <?php endforeach; ?>
                 </select>
                
            </td>
            <td>
                Quantidade
                <input type="text" onkeyup="somenteNumeros(this);" class="form-control" name="QuantidadeRecipiente[]" id="QuantidadeRecipiente" />
            </td>
            <td>
            <br />
                <a class="btn excluirRecipienteCliente" onclick="excluirRecipienteCliente2();">
                 <i class="fa fa-trash"></i> Remover
                </a>
            
            </td>
        </tr>                          

    </tbody>
    <div class="float-right">
        <button type="button" class="btn" onclick="adicionarRecipienteCliente2();" id="novoRecipienteCliente"> <i class="fa fa-plus"></i> Novo recipiente</button>
    </div>
           
</table>
</div>    
</div>
</div>

<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn" value="Salvar" >
        <i class="fa fa-plus"></i> Salvar
        </button>
        <button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>cliente'" class="btn">
        <i class="fa fa-backward"></i> Voltar
        </button>

</form>