<?php

$this->VwRotaMotorista_model->Id = $this->uri->segment(3);
$dadosRota = array();

$dadosRota = $this->VwRotaMotorista_model->buscarPorId()->row_array();


$rotaFinalizada = ((int)$dadosRota['Status'] < 4) ? false : true;

?>
<style>
    .print {
        display: block;
    }

    .no-print {
        display: none;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Realizar atendimento</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Rota</a></li>
                    <li class="breadcrumb-item active">Realizar atendimento</li>
                </ol>
            </div>
        </div>
    </div>
</section>


<?php if ($this->session->flashdata('success') == TRUE) : ?>
    <div class="alert alert-success alert-dismissible" style="background-color: #97BD59 !important;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fas fa-check"></i> Sucesso!</h4>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error') == TRUE) : ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fas fa-ban"></i> Erro!</h4>
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('warning') == TRUE) : ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h4>
        <?php echo $this->session->flashdata('warning'); ?>
    </div>
<?php endif; ?>


<div class="card card-primary">
    <div class="card-body">
        <h2 class="page-header">
            Rota <?= $dadosRota['Id'] ?> - <?= $dadosRota['Nome'] ?> ,
            <small class="pull-right">Data: <?= date('d/m/Y', strtotime($dadosRota['DataRota'])) ?></small>
        </h2>
        <div class="col-sm-4 invoice-col">

            <address>
                <br />
                <strong>Motorista:&nbsp;</strong><?= $dadosRota['Motorista'] ?><br>
                <strong>Turno: &nbsp;</strong><?php
                                                echo $turnos;
                                                ?><br>
                <strong>Observação:&nbsp;</strong><?= $dadosRota['Observacao'] ?><br>
            </address>
        </div>


        <button type="button" name="btnImprimir" id="btnImprimir" onclick="window.print();" class="btn notPrint ">
            <i class="fa fa-print"></i> Imprimir
        </button>

    </div>

</div>

<form name="frmAtendimento" id="frmAtendimento" method="post" action="<?= base_url('rota/salvarAtendimento') ?>" enctype="multipart/form-data">

 <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
            <div class="card card-primary">
                <div class="card card-header">
                    <h3 class="card-title">STATUS DO ATENDIMENTO</h3>
                </div>
                <div class="card-body">
                    <div class="row">
					    <div class="input-group mb-3">
						 <select name="Status" id="Status" class="form-control" onchange="alterarStatusAtendimento();">
							  <option value="">Selecione...</option>
							  <option value="1" <?php if($dadosRota['Status'] == 1): ?> selected <?php endif;?>>Aberto</option>
							  <option value="2" <?php if($dadosRota['Status'] == 2): ?> selected <?php endif;?>>Em andamento</option>
							  <option value="3" <?php if($dadosRota['Status'] == 3): ?> selected <?php endif;?>>Atendimento realizado</option>
							  <option value="4" <?php if($dadosRota['Status'] == 4): ?> selected <?php endif;?>>Finalizada</option>
						 </select>
						</div>    
					</div>
				</div>
			</div>
		</div>
</div>

<?php $indCliente = 0; ?>
<?php foreach ($clientesRota as $value) : ?>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
            <div class="card card-primary">
                <div class="card card-header">
                    <h3 class="card-title"><?= $value['Cliente'] ?></h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        Endereço:<?php echo $value['Rua'] . "&nbsp;Número:" . $value['Numero'] . "&nbsp;" . $value['Cidade'] . "&nbsp;Cep:" . $value['Cep']; ?>
                    </div>
                    <br />
                    <div class="row">
                        <label>Coleta</label>
                    </div>

                        <input type="hidden" id="IdRota[]" name="IdRota" value="<?= base64_encode($IdRota) ?>" />
                        <input type="hidden" id="IdCliente[]" name="IdCliente[]" value="<?= $value['IdCliente'] ?>" />
						<input type="hidden" id="IdStatus[]" name="IdStatus" value="" />
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="card">
                                                    <div class="card-body">
                                                        Coletado
                                                        <input required type="text" onkeyup="somenteNumeros(this);" <?php if ($rotaFinalizada) : ?> disabled <?php endif; ?> name="QuantidadeColetada[<?= $indCliente ?>]" value="<?= $value["QuantidadeColetada"] ?>" id="QuantidadeColetada" class="form-control" />
                                                        <small><i>Litros</i></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="card">
                                                    <div class="card-body">
                                                        Observação
                                                        <input <?php if ($rotaFinalizada) : ?> disabled <?php endif; ?> type="text" name="Observacao[<?= $indCliente ?>]" value="<?= $value["ObservacaoColeta"] ?>" id="Observacao" class="form-control" />
                                                        <small>&nbsp;</small>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <label>Recipientes &nbsp; <i class="fas fa-flask"></i></label>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table" id="tbRecipientes<?= $indCliente ?>">
                                    <tbody>
                                        <?php
                                        $this->Atendimento_model->IdRota = $IdRota;
                                        $this->Atendimento_model->IdCliente = $value['IdCliente'];
                                        $data['dadosAtendimento'] = $this->Atendimento_model->buscarPorRotaCliente()->result_array();
                                        $data['atendimentoRecipientes'] = array();
                                        $data['atendimentoFormasPagamento'] = array();
                                        $data['atendimentoTiposPagamento'] = array();

                                        foreach ($data['dadosAtendimento'] as $value) {
                                            $this->AtendimentoRecipiente_model->IdAtendimento = $value['Id'];
                                            $this->AtendimentoFormaPagamento_model->IdAtendimento = $value['Id'];
                                            $this->AtendimentoTipoPagamento_model->IdAtendimento = $value['Id'];
                                            $data['atendimentoRecipientes'] = $this->AtendimentoRecipiente_model->buscarPorAtendimento()->result_array();
                                            $data['atendimentoFormasPagamento'] = $this->AtendimentoFormaPagamento_model->buscarPorAtendimento()->result_array();
											$data['atendimentoTiposPagamento'] = $this->AtendimentoTipoPagamento_model->buscarPorAtendimento()->result_array();
                                        }
                                        ?>
                                        <?php if (count($data['atendimentoRecipientes']) > 0) : ?>
                                            <?php foreach ($data['atendimentoRecipientes'] as $valueAtendimentoRecipientes) : ?>
                                                <tr id="linhaRecipiente<?=$indCliente?>">
                                                    <td>
                                                        Recipiente
                                                        <select <?php if ($rotaFinalizada) : ?> disabled <?php endif; ?> class="form-control" name="IdRecipiente[<?= $indCliente ?>][]" id="IdRecipiente">
                                                            <option value=""></option>
                                                            <?php foreach ($recipientes as $value) : ?>
                                                                <option value="<?= $value['Id'] ?>" <?php if ($valueAtendimentoRecipientes['IdRecipiente'] == $value['Id']) : ?> selected <?php endif; ?>><?= $value['Nome'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                    </td>
                                                    <td>
                                                        Quantidade
                                                        <input <?php if ($rotaFinalizada) : ?> disabled <?php endif; ?> type="text" onkeyup="somenteNumeros(this);" class="form-control" value="<?= $valueAtendimentoRecipientes["Quantidade"] ?>" name="QuantidadeRecipiente[<?= $indCliente ?>][]" id="QuantidadeRecipiente" />
                                                    </td>
                                                    <td>
                                                        <br />
                                                        <?php if (!$rotaFinalizada) : ?>
                                                            <a class="btn excluirRecipiente<?= $indCliente ?>" onclick="excluirRecipiente(<?= $indCliente ?>)">
                                                                <i class="fa fa-trash"></i> Remover
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr id="linhaRecipiente<?=$indCliente?>">
                                                <td>
                                                    Recipiente
                                                    <select class="form-control" name="IdRecipiente[<?= $indCliente ?>][]" id="IdRecipiente">
                                                        <option value=""></option>
                                                        <?php foreach ($recipientes as $value) : ?>
                                                            <option value="<?= $value['Id'] ?>">
                                                                <?= $value['Nome'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    Quantidade
                                                    <input <?php if ($rotaFinalizada) : ?> disabled <?php endif; ?> type="text" onkeyup="somenteNumeros(this);" class="form-control" value="" name="QuantidadeRecipiente[<?= $indCliente ?>][]" id="QuantidadeRecipiente" />
                                                </td>
                                                <td>
                                                    <br />
                                                    <a class="btn excluirRecipiente<?= $indCliente ?>" onclick="excluirRecipiente(<?= $indCliente ?>)">
                                                        <i class="fa fa-trash"></i> Remover
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php endif; ?>
                                    </tbody>
                                    <?php if (!$rotaFinalizada) : ?>
                                        <div class="float-right">
                                            <button type="button" class="btn" onclick="adicionarRecipiente(<?= $indCliente ?>);" id="novoRecipiente"> <i class="fa fa-plus"></i> Novo recipiente</button>
                                        </div>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <label>Pagamentos&nbsp; <i class="fas fa-money-bill-alt"></i></label>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table" id="tbPagamentos<?= $indCliente ?>">
                                    <tbody>
                                        <?php if (count($data['atendimentoFormasPagamento']) > 0) : ?>
                                            <?php foreach ($data['atendimentoFormasPagamento'] as $valueAtendimentoFormaPagamento) : ?>
                                                <tr id="linhaPagamento<?=$indCliente?>">
                                                    <td>
                                                        Pagamento
                                                        <select onchange="BuscaValorPagamentoPorId();" <?php if ($rotaFinalizada) : ?> disabled <?php endif; ?> class="form-control formaPagamento" name="IdFormaPagamento[<?= $indCliente ?>][]" id="IdFormaPagamento">
                                                            <option value=""></option>
                                                            <?php foreach ($formasPagamento as $value) : ?>
                                                                <option value="<?= $value['Id'] ?>" <?php if ($value['Id'] == $valueAtendimentoFormaPagamento["IdFormaPagamento"]) : ?> selected <?php endif; ?>><?= $value['Nome'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        Quantidade
                                                        <input <?php if ($rotaFinalizada) : ?> disabled <?php endif; ?> type="text" onkeyup="somenteNumeros(this);" class="form-control" value="<?= $valueAtendimentoFormaPagamento["Quantidade"] ?>" name="Quantidade[<?= $indCliente ?>][]" id="Quantidade" />
                                                    </td>
													<td>
                                                        Valor
                                                        <input <?php if ($rotaFinalizada) : ?> disabled <?php endif; ?> type="text" onkeyup="somenteNumeros(this);" class="form-control" value="<?= $valueAtendimentoFormaPagamento["ValorPagamento"] ?>" name="ValorPagamento[<?= $indCliente ?>][]" id="ValorPagamento" />
                                                    </td>
                                                    <td>
                                                        <br />
                                                        <?php if (!$rotaFinalizada) : ?>
                                                            <a class="btn excluirPagamento<?= $indCliente ?>" onclick="excluirPagamento(<?= $indCliente ?>)">
                                                                <i class="fa fa-trash"></i> Remover
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>											
											<?php endforeach; ?>
                                        <?php else : ?>
                                            <tr id="linhaPagamento<?=$indCliente?>">
                                                <td>
                                                    Pagamento
                                                    <select class="form-control formaPagamento" name="IdFormaPagamento[<?= $indCliente ?>][]" id="IdFormaPagamento">
                                                        <option value=""></option>
                                                        <?php foreach ($formasPagamento as $value) : ?>
                                                            <option value="<?= $value['Id'] ?>">
                                                                <?= $value['Nome'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </td>
                                                <td>
                                                    Quantidade
                                                    <input type="text" onkeyup="somenteNumeros(this);" class="form-control" name="Quantidade[<?= $indCliente ?>][]" id="Quantidade" />
                                                </td>
												<td>
													Valor
													<input type="text" onkeyup="somenteNumeros(this);" class="form-control" value="" name="ValorPagamento[<?= $indCliente ?>][]" id="ValorPagamento" />
												</td>
                                                   
                                                <td>
                                                    <br />
                                                    <a class="btn excluirPagamento<?= $indCliente ?>" onclick="excluirPagamento(<?= $indCliente ?>)">
                                                        <i class="fa fa-trash"></i> Remover
                                                    </a>

                                                </td>
                                            </tr>

                                        <?php endif; ?>
                                    </tbody>
                                    <?php if (!$rotaFinalizada) : ?>
                                        <div class="float-right">
                                            <button type="button" class="btn" onclick="adicionarPagamento(<?= $indCliente ?>);" id="novoPagamento"> <i class="fa fa-plus"></i> Novo pagamento</button>
                                        </div>
                                    <?php endif; ?>

                                </table>

                            </div>
                        </div>
                        <div class="row">
                            <label>Tipos de pagamentos&nbsp; <i class="fas fa-copy"></i></label>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table" id="tbTipoPagamento<?= $indCliente ?>">
                                    <tbody>
                                        <?php if (count($data['atendimentoTiposPagamento']) > 0) : ?>
                                            <?php foreach ($data['atendimentoTiposPagamento'] as $valueAtendimentoTipoPagamento) : ?>
                                                <tr id="linhaTipoPagamento<?=$indCliente?>">
                                                    <td>
                                                        Tipo
                                                        <select <?php if ($rotaFinalizada) : ?> disabled <?php endif; ?> class="form-control" name="IdTipoPagamento[<?= $indCliente ?>][]" id="IdTipoPagamento">
                                                            <option value=""></option>
                                                            <?php foreach ($tiposPagamento as $value) : ?>
                                                                <option value="<?= $value['Id'] ?>" <?php if ($value['Id'] == $valueAtendimentoTipoPagamento["IdTipoPagamento"]) : ?> selected <?php endif; ?>><?= $value['Nome'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <br />
                                                        <?php if (!$rotaFinalizada) : ?>
                                                            <a class="btn excluirTipoPagamento<?= $indCliente ?>" onclick="excluirTipoPagamento(<?= $indCliente ?>)">
                                                                <i class="fa fa-trash"></i> Remover
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr id="linhaTipoPagamento<?=$indCliente?>">
                                                <td>
                                                    Tipo
                                                    <select class="form-control" name="IdTipoPagamento[<?= $indCliente ?>][]" id="IdTipoPagamento">
                                                        <option value=""></option>
                                                        <?php foreach ($tiposPagamento as $value) : ?>
                                                            <option value="<?= $value['Id'] ?>">
                                                                <?= $value['Nome'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <br />
                                                    <a class="btn excluirTipoPagamento<?= $indCliente ?>" onclick="excluirTipoPagamento(<?= $indCliente ?>)">
                                                        <i class="fa fa-trash"></i> Remover
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    <?php if (!$rotaFinalizada) : ?>
                                        <div class="float-right">
                                            <button type="button" class="btn" onclick="adicionarTipoPagamento(<?= $indCliente ?>);" id="novoTipoPagamento"> <i class="fa fa-plus"></i> Novo tipo de pagamento</button>
                                        </div>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <?php $indCliente++; ?>
        <?php endforeach; ?>

        <?php #if (!$rotaFinalizada) : ?>
            <button type="submit" name="btnCadastrar" id="btCadastrar" class="btn float-left">
                <i class="fa fa-plus"></i> Salvar
            </button>
        <?php #endif; ?>

        <button type="button" name="btnCancelar" id="btnCancelar" onclick="window.location.href='<?= base_url() ?>rota'" class="btn ">
            <i class="fa fa-backward"></i> Voltar
        </button>

        </form>
        </div>


    </div>

    <script>
        function excluirRota() {

            if (confirm("Deseja realmente realizar esta exclusão?")) {
                document.getElementById("rota").submit();
            }
        }



        function somenteNumeros(num) {
            var er = /[^0-9.]/;
            er.lastIndex = 0;
            var campo = num;
            if (er.test(campo.value)) {
                campo.value = "";
            }
        }
    </script>