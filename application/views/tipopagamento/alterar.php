<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Tipos de Pagamentos</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tipos de Pagamentos</a></li>
                <li class="breadcrumb-item active">Alterar</li>
            </ol>
            </div>
        </div>
    </div>
</section>

<div class="card card-primary">
<div class="card card-header">
                <h3 class="card-title">Tipo de Pagamento</h3>
</div>
<form name="tipoPagamento" id="tipoPagamento" method="post"  action="<?=base_url('tipoPagamento/salvar')?>" enctype="multipart/form-data" >
<input type="hidden" name="Id" id="Id" value="<?=base64_encode($tipopagamento['Id']) ?>" />
<div class="card-body">
<div class="form-group">
<label>Nome </label>
    <div class="input-group mb-4">
    
        <input type="text" class="form-control" value="<?=$tipopagamento['Nome'] ?>"  required autocomplete="off" name="Nome" id="Nome" placeholder="" required>   
    </div>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" name="btnCadastrar" id="btCadastrar" class="btn" value="Salvar" >
<i class="fa fa-plus"></i> Salvar
</button>
<button type="button" name="btnExcluir" data-toggle="modal" data-target="#modal-excluir-tipo-pagamento" id="btnExcluir" class="btn" id="excluirTipoPagamento">
    <i class="fa fa-trash"></i> Excluir
</button>
<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>tipoPagamento'" class="btn">
<i class="fa fa-backward"></i> Voltar
</button>
<br />
<br />
</form>
</div>


<script>
function excluirTipoPagamentoFormulario()
{
    $.ajax({
    url: "<?=site_url('TipoPagamento')?>/excluir",
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
                window.location.href="<?=site_url('TipoPagamento')?>";

    }).fail(function(jqXHR, textStatus ) {
        $(document).Toasts('create', {
                    title: 'Ocorreu um erro',
                    autohide: true,
                    delay: 750,
                    body: 'Por favor, tente novamente'
                });
                window.location.href="<?=site_url('TipoPagamento')?>";

    }).always(function() {
        console.log("end");
    });
        
}
</script>


<div class="modal fade" id="modal-excluir-tipo-pagamento">
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
              <button type="button" class="btn" onclick="excluirTipoPagamentoFormulario();" >Sim</button>
              <button type="button" class="btn" data-dismiss="modal">Não</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->
