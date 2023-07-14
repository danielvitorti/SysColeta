<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Alterar</h1>

      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Cliente</a></li>
          <li class="breadcrumb-item active">Visualizar</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="card card-primary">
  <div class="card card-header">
    <h3 class="card-title">Dados do cliente</h3>
  </div>

  <!-- /.login-logo -->
  <!-- /.login-logo -->

  <div class="card-body">

    <?php if ($this->session->flashdata('error') == TRUE) : ?>
      <div class="alert alert-warning" align="center"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('success') == TRUE) : ?>
      <div class="alert alert-success" align="center"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('warning') == TRUE) : ?>
      <div class="alert alert-warning" align="center"><?php echo $this->session->flashdata('warning'); ?></div>
    <?php endif; ?>

<form action="<?=site_url("cliente/salvar") ?>" name="frmClienteAlterar" id="frmClienteAlterar" method="post" enctype="multipart/form-data">
      <input type="hidden" name="Id" id="Id" value="<?= base64_encode($cliente['Id']) ?>" />
      <input type="hidden" name="buscarFormasPagamento" id="buscarFormasPagamento" value="<?=base64_encode("buscarFormasPagamentoCliente")?>" />
      <input type="hidden" name="buscarRecipientes" id="buscarRecipientes" value="<?=base64_encode("buscarRecipientesCliente")?>" />
      <input type="hidden" name="buscarTiposPagamento" id="buscarTiposPagamento" value="<?=base64_encode("buscarTiposPagamentoCliente")?>" />
      
      
      <label>Nome do estabelecimento </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="<?= $cliente['Nome'] ?>" required autocomplete="off" name="Nome" placeholder="" required>
        </div>
        <label>
          CNPJ
          <input type="radio" id="radCnpjCpf" name="radCnpjCpf" value="cnpj" <?php if ($cliente['TipoDocumento'] == "cnpj") : ?> checked <?php endif; ?> />
          CPF
          <input type="radio" id="radCnpjCpf" name="radCnpjCpf" value="cpf" <?php if ($cliente['TipoDocumento'] == "cpf") : ?> checked <?php endif; ?> />
        </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="<?= $cliente['CnpjCpf'] ?>" required autocomplete="off" maxlength="30" id="CnpjCpf" name="CnpjCpf" placeholder="" value="" />
        </div>
        <label>Nome do responsável </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="<?= $cliente['NomeResponsavel'] ?>" autocomplete="off" name="NomeResponsavel" id="NomeResponsavel" placeholder="" />
        </div>
        <label>Email </label>
        <div class="input-group mb-4">
          <input type="email" class="form-control" value="<?= $cliente['Email'] ?>" required autocomplete="off" name="Email" id="Email" placeholder="">
        </div>
        <label>Telefone com whastapp </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control " value="<?= $cliente['Telefone'] ?>" autocomplete="off" name="Telefone" id="Telefone" placeholder="">
        </div>
        <label>Telefone fixo </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control " value="<?= $cliente['TelefoneFixo'] ?>" autocomplete="off" name="TelefoneFixo" id="TelefoneFixo" placeholder="">
        </div>
        <label>Cep </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="<?= $cliente['Cep'] ?>" required autocomplete="off" name="Cep" id="cep" placeholder="">
        </div>
        <label>Rua </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" required value="<?= $cliente['Rua'] ?>" autocomplete="off" name="Rua" id="rua" placeholder="">
        </div>
        <label>Número </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="<?= $cliente['Numero'] ?>" autocomplete="off" name="Numero" id="Numero" placeholder="">
        </div>
        <label>Bairro </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="<?= $cliente['Bairro'] ?>" required autocomplete="off" name="Bairro" id="bairro" placeholder="">
        </div>
        <label>Cidade </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" required value="<?= $cliente['Cidade'] ?>" autocomplete="off" name="Cidade" id="cidade" placeholder="">
        </div>
        <label>Horário de coleta </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="<?= $cliente['HorarioColeta'] ?>" autocomplete="off" name="HorarioColeta" id="HorarioColeta" placeholder="">
        </div>

      <label>Status </label>
        <div class="input-group mb-4">
          <select class="form-control" name="Status" id="Status" required>
            <option value=""></option>
            <option value="1" <?php if ($cliente['IdStatus'] == "1") : ?> selected<?php endif; ?>>Novo</option>
            <option value="2" <?php if ($cliente['IdStatus'] == "2") : ?> selected<?php endif; ?>>Recorrente</option>
            <option value="3" <?php if ($cliente['IdStatus'] == "3") : ?> selected<?php endif; ?>>Avulso</option>
            <option value="4" <?php if ($cliente['IdStatus'] == "4") : ?> selected<?php endif; ?>>Concorrente</option>
          </select>
        </div>
      <label>Periodicidade </label>
        <div class="input-group mb-4">
          <select class="form-control" name="PeriodicidadeColeta" id="PeriodicidadeColeta">
            <option value=""></option>
            <?php foreach ($periodicidades as $value) : ?>
              <option value="<?= $value['Id'] ?>" <?php if ($cliente['PeriodicidadeColeta'] == $value['Id']) : ?> selected<?php endif; ?>><?= $value['Nome'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      <label>Instagram </label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" value="<?= $cliente['Instagram'] ?>" required autocomplete="off" name="Instagram" id="Instagram" placeholder="">
        </div>

      <label>Etiqueta </label>
        <div class="input-group mb-4">
          <select class="form-control select2" name="Etiqueta[]" multiple="multiple" id="Etiqueta">
            <?php foreach ($etiquetas as $value) : ?>
              <option value="<?= $value['Id'] ?>" <?php foreach ($etiquetasCliente as $etiquetaCliente) : ?> <?php if ($etiquetaCliente['IdEtiqueta'] == $value['Id']) : ?> selected <?php endif; ?> <?php endforeach; ?>><?= $value['Descricao'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
  </div>
</div>
<div class="card card-primary">
  <div class="card card-header">
    <h3 class="card-title">Formas de pagamento</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table" id="tbFormaPagamentoCliente">
        <tbody>
            <?php foreach ($formasPagamentoCliente as $valueFormasPagamento) : ?>
              <tr id="linhaFormaPagamento">
                <td>
                  <label>Descrição:</label><?=$valueFormasPagamento["Descricao"] ?>       
                  <input type="hidden" value="<?= $valueFormasPagamento["IdFormaPagamento"]?>" name="IdFormaPagamento[]" />
                </td>
                <td>
                  <label>Forma:</label>
                  <?php 
                    $this->FormaPagamento_model->Id =  $valueFormasPagamento["IdFormaPagamento"];
                    $formasPagamento = $this->FormaPagamento_model->buscarPorId()->row_array();
                  ?>
                  <?=$formasPagamento['Nome']?>
                </td>
                <td>
                  <label>Quantidade:</label><?= $valueFormasPagamento["Quantidade"]?></label>                  
                </td>
                <td>                  
                  <a class="btn excluirFormaPagamentoCliente" onclick="excluirFormaPagamentoCliente(<?=$valueFormasPagamento['Id']?>);">
                    <i class="fa fa-trash"></i> Remover
                  </a>
                </td>
              </tr>              
            <?php endforeach; ?>          
        </tbody>
        <div class="float-left">
          <button type="button" class="btn" onclick="adicionarFormaPagamentoCliente();" id="novaFormaPagamentoCliente"> <i class="fa fa-plus"></i> Nova forma de pagamento</button>
        </div>
      </table>
    </div>
  </div>
</div>


<div class="card card-primary">
  <div class="card card-header">
    <h3 class="card-title">Tipos de pagamento</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table" id="tbTipoPagamentoCliente">
        <tbody>
       
            <?php foreach ($tiposPagamentoCliente as $valueTiposPagamento) : ?>
              <tr id="linhaTipoPagamento">
                
                <td>
                  <label>Descrição:</label><?=$valueTiposPagamento["Descricao"] ?>                
                </td>
                <td>
                  <input type="hidden" name="IdTipoPagamento[]" value="<?=$valueTiposPagamento["IdTipoPagamento"]?>" />
                  <label>Tipo:</label>
                  <?php 
                    $this->TipoPagamento_model->Id =  $valueTiposPagamento["IdTipoPagamento"];
                    $tipoPagamento = array();
                    $tipoPagamento = $this->TipoPagamento_model->buscarPorId()->row_array();
                  ?>
                  <?php if(!empty($tipoPagamento)): ?>
                    <?=$tipoPagamento['Nome']?>
                  <?php endif; ?>
                </td>
                <td>
                  <label>Quantidade:</label><?= $valueTiposPagamento["Quantidade"]?></label>                  
                </td>
                <td>                  
                  <a class="btn excluirTipoPagamentoCliente" onclick="excluirTipoPagamentoCliente(<?=$valueTiposPagamento["Id"]?>);">
                    <i class="fa fa-trash"></i>Remover
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
        <div class="float-left">
          <button type="button" class="btn" onclick="adicionarTipoPagamentoCliente();" id="novoTipoPagamentoCliente"> <i class="fa fa-plus"></i> Novo tipo de pagamento</button>
        </div>
      </table>

    </div>
  </div>
</div>


<div class="card card-primary">
  <div class="card card-header">
    <h3 class="card-title">Recipientes</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table" id="tbRecipienteCliente">
        <tbody>
            <?php foreach ($recipientesCliente as $valueRecipientes) : ?>
              <tr id="linhaRecipiente">
                <td>
                  <label>Descrição</label>
                  <?=$valueRecipientes["Descricao"] ?>
                </td>
                <td>
                <label>Recipiente</label>
                <?php 
                    $this->Recipiente_model->Id =  $valueRecipientes["IdRecipiente"];
                    $recipiente = array();
                    $recipiente = $this->Recipiente_model->buscarPorId()->row_array();
                  ?>
                  <?php if(!empty($recipiente)): ?>
                  <?=$recipiente['Nome']?>
                  <?php endif; ?>
                </td>
                <td>
                  <label>Quantidade</label>
                  <?= $valueRecipientes["Quantidade"] ?>
                </td>
                <td>
                  <a class="btn excluirRecipienteCliente" onclick="excluirRecipienteCliente(<?=$valueRecipientes["Id"]?>);">
                    <i class="fa fa-trash"></i>Remover
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
        <div class="float-left">
          <button type="button" class="btn" onclick="adicionarRecipienteCliente();" id="novoRecipienteCliente"> <i class="fa fa-plus"></i> Novo recipiente</button>
        </div>
      </table>
    </div>
  </div>
</div>

<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn" value="Salvar">
  <i class="fa fa-plus"></i> Salvar
</button>

<button type="button" name="btnExcluir" data-toggle="modal" data-target="#modal-default" id="btnExcluir" class="btn" id="excluirCliente">
  <i class="fa fa-trash"></i> Excluir
</button>

<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?= base_url() ?>cliente'" class="btn">
  <i class="fa fa-backward"></i> Voltar
</button>




</form>

<script>
  function excluirCliente() {
    $.ajax({
      url: "<?= site_url('cliente') ?>/excluir",
      type: "POST",
      data: "Id=" + $("#Id").val(),
      dataType: "html"

    }).done(function(resposta) {
      $(document).Toasts('create', {
        title: 'Exclusão',
        autohide: true,
        delay: 750,
        body: 'Exclusão realizada com sucesso'
      });
      window.location.href = "<?= site_url('cliente') ?>";

    }).fail(function(jqXHR, textStatus) {
      $(document).Toasts('create', {
        title: 'Ocorreu um erro',
        autohide: true,
        delay: 750,
        body: 'Por favor, tente novamente'
      });
      window.location.href = "<?= site_url('cliente') ?>";

    }).always(function() {
      console.log("end");
    });

  }

  function salvarDadosCliente() {


    $.ajax({
      url: "<?= site_url('cliente') ?>/salvar",
      type: "POST",
      data: $("#frmClienteAlterar").serialize(),
      dataType: "html"

    }).done(function(resposta) {
      /*$(document).Toasts('create', {
                  title: 'Exclusão',
                  autohide: true,
                  delay: 750,
                  body: 'Exclusão realizada com sucesso'
              });
              window.location.href="<?= site_url('cliente') ?>"; */
      console.log(resposta);
    }).fail(function(jqXHR, textStatus) {
      /*$(document).Toasts('create', {
                  title: 'Ocorreu um erro',
                  autohide: true,
                  delay: 750,
                  body: 'Por favor, tente novamente'
              });
              window.location.href="<?= site_url('cliente') ?>"; */
      console.log("Fail");
    }).always(function() {

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
        <button type="button" class="btn" onclick="excluirCliente();">Sim</button>
        <button type="button" class="btn" data-dismiss="modal">Não</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->