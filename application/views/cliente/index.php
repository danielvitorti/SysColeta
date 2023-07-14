<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Clientes</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=base_url('cliente')?>">Cliente</a></li>
                <li class="breadcrumb-item active">Listagem</li>
            </ol>
            </div>
        </div>
    </div>
</section>


<?php if ($this->session->flashdata('error') == TRUE): ?>
		<div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('success') == TRUE): ?>
  <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<h3 class="box-title"></h3>
<div class="card card-primary" >

<div class="card-header with-border">
  Filtros
</div>
<div class="card-body" >
<form name="buscaCliente" id="buscaCliente" action="<?=base_url('cliente')?>" method="get">
<div class="row"> 
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="form-group">
   
    Nome<input type="text" class="form-control" value="<?=$nome?>" name="nome" autocomplete="off" id="nome"  maxlength="200">
   </div>
  </div>

</div>
<div class="row">
<!--
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
  
  <div class="form-group">   
    Data de cadastro inicial<input type="text" class="form-control data" value="<?=$dataInicial?>" name="dataInicial" autocomplete="off" id="dataInicial"  maxlength="200">
   </div>
  
  </div>
-->
<!--
  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
  <div class="form-group">
   
    Até<input type="text" class="form-control data" value="<?=$dataFinal?>" name="dataFinal" autocomplete="off" id="dataFinal"  maxlength="200">
   </div>
  </div>
-->
  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
  <div class="form-group">
   
    Status

    <select class="form-control" name="Status" id="Status">
              <option value=""></option>
              <option value="1" <?php if($status == "1"):?>selected <?php endif; ?>>Novo</option>
              <option value="2" <?php if($status == "2"):?>selected <?php endif; ?>>Recorrente</option>
              <option value="3" <?php if($status == "3"):?>selected <?php endif; ?>>Avulso</option>
              <option value="4" <?php if($status == "4"):?>selected <?php endif; ?>>Concorrente</option>
          </select>
  </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
  <div class="form-group">
    Etiqueta   
    <select class="form-control" name="Etiqueta" id="Etiqueta">
              <option value=""></option>
              <?php  foreach ($etiquetas as $value): ?>
                    <option value="<?=$value['Id']?>" <?php if($etiqueta == $value['Id']):?>selected <?php endif; ?>><?=$value['Descricao']?></option>
              <?php endforeach; ?>                
    </select>

   </div>
   </div>
  </div>



  <div class="col-lg-12">
    <div class="form-group">
        <button class="btn float-left" type="button" onclick="buscar();" >
            <span class="label label-primary"><i class="fa fa-search"></i></span>
            Buscar
        </button>
        &nbsp;
        &nbsp;
        <button class="btn float-left" type="button" onclick="buscarExcel();" >
            <span class="label label-primary"><i class="fa fa-file-excel"></i></span>
            Excel
        </button>
		<button class="btn float-left" type="button" onclick="buscarPdf();" >
            <span class="label label-primary"><i class="fa fa-file-pdf"></i></span>
            Pdf
        </button>
        <a class="btn float-right" href="<?=base_url('cliente')?>/">
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
            <a href="<?=site_url('cliente')?>/cadastro" class="btn" >
              <i class="fa fa-plus-circle"></i>Cadastrar
            </a>  
           
            <br />
            <br />
              <table id="data-table-cliente" class="dataTable table-striped table-valign-middle">
                <thead>
                <tr>
                 
                  <th>CNPJ/CPF</th>
                  <th>Nome</th>
                  <th>Responsável</th>
                  <th>Email</th>
				  <th></th>
                
                </tr>
                </thead>
                <tbody>
                  <?php

                  $hasEtiqueta = false;
                  
                  if(array_key_exists("Etiqueta",$_GET) && $_GET["Etiqueta"] != "" ):
                    $hasEtiqueta = true; 
                  else:
                    $hasEtiqueta = false;
                  endif;
                  if(isset($clientes)):
                      foreach ($clientes as $key => $value):
                        $Id = $hasEtiqueta ? $value["IdCliente"] : $value["Id"];
                        
                  ?>
                    <tr>
                         <td>
							<?php echo  $value['CnpjCpf'];?>
						 </td>
                         <td>
							<?php echo $value['Nome'];?>
						 </td>
                         <td>
							<?php echo $value['NomeResponsavel'];?>
						 </td>
                         <td>
							<?php echo $value['Email'];?>
						 </td>
						  <td>
							<a style="display:none;" title="Gerar arquivo excel" href="<?=base_url('cliente/excel')?>/<?=$Id?>" class="btn">
								<span class="label label-primary"><i class="fa fa-file-excel"></i></span>
                            </a>
							<a style="display:none;" title="Gerar arquivo pdf" href="<?=base_url('cliente/pdf')?>/<?=$Id?>" class="btn">
								<span class="label label-primary"><i class="fa fa-file-pdf"></i></span>
                            </a>
							<a title="Alterar cliente" href="<?=base_url('cliente/alterar')?>/<?=$Id?>" class="btn">
								<span class="label label-primary mouseCursorPointer"><i class="fa fa-list"></i></span>
							</a>
						  </td>                        
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
    $("#buscaCliente").attr('action','<?=base_url('cliente')?>/index');
    $("#buscaCliente").submit();
  }
  
  function buscarExcel()
  {
	$("#buscaCliente").attr('action','<?=base_url('cliente')?>/excel');
    $("#buscaCliente").submit();
	setTimeout(function(){
		
		$("#modal-loading").modal('hide');
		
	},1000);
	
  }
  
  function buscarPdf()
  {
	$("#buscaCliente").attr('action','<?=base_url('cliente')?>/pdf');
    $("#buscaCliente").submit();
	setTimeout(function(){
		
		$("#modal-loading").modal('hide');
		
	},1000);
	
  }
  
</script>