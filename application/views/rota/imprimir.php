
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Imprimir</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Rota</a></li>
                <li class="breadcrumb-item active">Imprimir</li>
            </ol>
            </div>
        </div>
    </div>
</section>

<div class="card card-primary">
<section class="invoice">
<div class="card-body">
<h2 class="page-header">
            Rota <?=$dadosRota['Id']?>,
            <small class="pull-right">Data: <?=date('d/m/Y',strtotime($dadosRota['DataRota']))?></small>
          </h2>
<br/>
<div class="col-sm-12 invoice-col">

          <address>
            <br />
            <strong>Motorista:</strong>&nbsp;<?=$dadosRota['Motorista']?><br>
            <strong>Turno:</strong><?php 
                if($dadosRota['Turno']==1){
                echo "Manhã";
                }
                elseif ($dadosRota['Turno']==2) {
                    echo "Tarde";
                }
                elseif ($dadosRota['Turno']==3) {
                    echo "Noite";
                }
            ?><br>
            <strong>Observação:</strong>&nbsp;<?=$dadosRota['Observacao']?><br>

          </address>
        </div>
<hr />
<table id="data-table" class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  
                  <th>Cliente</th>
                  <th>Cnpj/Cpf</th>
                  <th>Endereço</th>
                  <th>E-mail</th>
                  <th>Responsável</th>
                  <th>Horário de coleta</th>
                                     
                </tr>
                </thead>
                <tbody>
                <?php foreach($clientesRota as $value): ?>
                    <tr>
                        <td><?=$value['Cliente']?></td>
                        <td><?=$value['CnpjCpf']?></td>
                        <td><?=$value['EnderecoColeta']?></td>
                        <td><?=$value['Email']?></td>
                        <td><?=$value['NomeResponsavel']?></td>
                        <td><?=$value['HorarioColeta']?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
</table>
<br />

<button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?=base_url()?>rota'" class="btn btn-default ">
<i class="fa fa-backward"></i> Voltar
</button>
</div>

</section>


<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h3>Efetuar coleta</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                <p>
                    
                    <div class="form-group">
                        <label for="IdMotorista">Motorista:</label>&nbsp;<?=$dadosRota['Motorista']?>
                        <div class="input-group mb-4">
                        <input type="hidden" name="IdMotorista" id="IdMotorista" value="<?=$dadosRota['IdMotorista']?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="IdCliente">Cliente:</label><span name="NomeCliente" id="NomeCliente"></span>
                        <div class="input-group mb-4">
                            <input type="hidden" name="IdCliente" id="IdCliente" />
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
                        <select class="form-control" name="IdRecipiente" id="IdRecipiente" required>
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
                
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                <button type="submit" name="btnCadastrar" id="btCadastrar" class="btn btn-default" value="Salvar" >
                    <i class="fa fa-plus"></i> Salvar
                    </button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<script>
$(document).ready(function(){

    window.print();

});
</script>