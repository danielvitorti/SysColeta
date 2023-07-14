<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Relatórios</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Relatórios</a></li>
                <li class="breadcrumb-item active">Relatórios de clientes</li>
            </ol>
            </div>
        </div>
    </div>
</section>


<?php if ($this->session->flashdata('error') == TRUE): ?>
		<div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('success') == TRUE): ?>
  <div class="alert alert-success" style="background-color: #97BD59 !important;"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<h3 class="box-title"></h3>
<div class="card card-primary" >

<div class="card-header with-border">
  Filtros
</div>
<div class="card-body" >
<form name="relatorioCliente" id="relatorioCliente" action="<?=base_url('relatorios/clientes')?>" method="get">

<div class="row">

 <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
   <div class="form-group">
    Início:
    <input type="text" class="form-control data" value="<?=$inicio?>" name="inicio" autocomplete="off" id="inicio" maxlength="200">
   </div>
  </div>

  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
   <div class="form-group">
    Fim:
    <input type="text" class="form-control data" value="<?=$fim?>" name="fim" autocomplete="off" id="fim" maxlength="200">
   </div>
  </div>


  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
  <div class="form-group">
    Rota:
  <select class="form-control select2" name="IdRota" id="IdRota">
        <option value=""></option>
        <?php foreach ($rotas as $value): ?>
            <option value="<?=$value['Id']?>"
              <?php if($IdRota == $value['Id']): ?> selected <?php endif;?>>
              <?=date('d/m/Y',strtotime($value['DataRota']))?>|<?=$value['Nome']?>|<?=$value['Perimetro']?>
            </option>   
        <?php endforeach; ?>
    </select>
  </div>
  </div>



  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
  <div class="form-group">
 
    Cliente:
    <select class="form-control select2" name="IdCliente" id="IdCliente">
        <option value=""></option>
        <?php foreach ($clientes as $value): ?>
            <option value="<?=$value['Id']?>"
              <?php if($IdCliente == $value['Id']): ?> selected <?php endif;?>>
              <?=$value['Nome']?>
            </option>   
        <?php endforeach; ?>
    </select>
   </div>
  </div>
</div>
<div class="row">
<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
  <div class="form-group" >
 
    Forma de pagamento:
    <select class="form-control" name="IdFormaPagamento" id="IdFormaPagamento">
        <option value=""></option>
        <?php foreach ($formasPagamento as $value): ?>
            <option value="<?=$value['Id']?>"
              <?php if($IdFormaPagamento == $value['Id']): ?> selected <?php endif;?>>
              <?=$value['Nome']?>
            </option>   
        <?php endforeach; ?>
    </select>
   </div>
  </div>


<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
  <div class="form-group">
 
    Cidade:
    <select class="form-control" name="Cidade" id="Cidade">
        <option value=""></option>
        <?php foreach ($cidades as $value): ?>
            <option value="<?=$value['Cidade']?>"
              <?php if($Cidade == $value['Cidade']): ?> selected <?php endif;?>>
              <?=$value['Cidade']?>
            </option>   
        <?php endforeach; ?>
    </select>
   </div>
  </div>

</div>


  <div class="col-lg-12">
    <div class="form-group">
        <button class="btn float-left" type="submit" >
            <span class="label label-primary"><i class="fa fa-search"></i></span>
            Buscar
        </button>
		&nbsp;
        &nbsp;
		<button class="btn float-left" type="button" id="btnExcelRelatorioClientes" onclick="relatorioExcel();">
            <span class="label label-primary"><i class="fa fa-fw fa-file-excel"></i></span>
            Excel
        </button>
        <!--&nbsp;
        &nbsp;-->
		<button style="display:none !important;" class="btn float-left" type="button" id="btnPdfRelatorioClientes" onclick="relatorioPdf();">
            <span class="label label-primary"><i class="fa fa-fw fa-file-pdf"></i></span>
            PDF
        </button>
		&nbsp;
        &nbsp;
       
        <a class="btn float-right" href="<?=base_url('relatorios/clientes')?>">			
            <span class="label label-primary"><i class="fa fa-sync-alt"></i></span>
			Limpar
        </a>
       
    </div>  
 
  </div>
</form>
</div>
</div>
<div class="card card-primary" >

<div class="card-body table-responsive" >
<section class="content">
      <div class="row">
        <div class="col-xs-12 col-lg-12 col-lg-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        
              <table id="data-table-cliente" class="table-striped table-valign-middle">
                <thead>
                <tr>
                  
                  <th>Cliente</th>
                  <th>Data do atendimento</th>
                  <th>Quantidade coletada</th>
                  <th>Forma de pagamento</th>
                  <th>Tipo de pagamento</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($relatorioCliente)):
                      foreach ($relatorioCliente as $key => $value):
                  ?>


                   <?php

                     $this->AtendimentoFormaPagamento_model->IdAtendimento = $value['IdAtendimento'];
                     $dadosAtendimentoFormaPagamento = $this->AtendimentoFormaPagamento_model->buscarPorAtendimento()->result_array();
                     
                     $formaPagamento = "";
                     $quantidade = "";
                     foreach($dadosAtendimentoFormaPagamento as $val)
                     {
                       $this->FormaPagamento_model->Id = $val['IdFormaPagamento'];
                       $dadosFormaPagamento = $this->FormaPagamento_model->buscarPorId()->row_array();
                    
                       if($dadosFormaPagamento){
                        if($dadosFormaPagamento['Nome'] !="")
                            $formaPagamento .= $dadosFormaPagamento['Nome']." - Quantidade: ".$val['Quantidade']."/";
                        else
                            $formaPagamento = "";
                       }
                     }
                     
                     $formaPagamento = substr($formaPagamento,0,-1);

                     $this->AtendimentoTipoPagamento_model->IdAtendimento = $value['IdAtendimento'];
                     $dadosAtendimentoTipoPagamento = array();
                     $dadosAtendimentoTipoPagamento = ($this->AtendimentoTipoPagamento_model->buscarPorAtendimento()->result_array()) ? $this->AtendimentoTipoPagamento_model->buscarPorAtendimento()->result_array() : array() ;

                     $tipoPagamento = "";

                     if(count($dadosAtendimentoTipoPagamento) > 0)
                     {
                          foreach($dadosAtendimentoTipoPagamento as $v)
                          {
                              $this->TipoPagamento_model->Id = $v['IdTipoPagamento'];
                              $dadosTipoPagamento = $this->TipoPagamento_model->buscarPorId()->row_array();
                              if(is_array($dadosTipoPagamento)){
                                $tipoPagamento .= $dadosTipoPagamento['Nome']."/";
                              }    
                          }
                     }
                     $tipoPagamento = substr($tipoPagamento,0,-1);
                     
                   ?>
                    <tr class="mouseCursorPointer" onclick="window.location.href='<?=base_url('relatorios/detalhes')?>/<?=$value["IdAtendimento"]?>/<?=$value["IdCliente"]?>'">
                        <td><?php echo  $value['Nome'];?> </td>
                        <td><?php echo  date('d/m/Y',strtotime($value['DataAtendimento']));?></td>
                        <td><?php echo  $value['QuantidadeColetada'];?></td>
                        <td><?php echo  $formaPagamento?></td>
                        <td><?php echo  $tipoPagamento?></td>
                    </tr>
                  <?php
                    endforeach;
                    endif;
                  ?>
                </tbody>
              </table>

             
            </div>
            <div class="row">
                  <?php
                      if(isset($pagination)):
                        echo $pagination;
                      endif;
                  ?>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
</div>
<script>
  
  function buscar()
  {
    $("#relatorioCliente").attr('action','<?=base_url('relatorios')?>/clientes');
    $("#relatorioCliente").submit();
  }
  
  function relatorioExcel()
  {
	var data = $("#relatorioCliente").serialize();	
	window.location.href='<?=base_url('relatorios')?>/clientesExcel?'+data;
  }
  
  function relatorioPdf()
  {
	var data = $("#relatorioCliente").serialize();	
	window.location.href='<?=base_url('relatorios')?>/clientesPdf?'+data;  
  }
  
  
</script>