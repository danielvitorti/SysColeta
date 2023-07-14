  

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Rotas</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Rotas</a></li>
                <li class="breadcrumb-item active">Listagem</li>
            </ol>
            </div>
        </div>
    </div>
</section>

<?php if ($this->session->flashdata('success') == TRUE): ?>
    <div class="alert alert-success alert-dismissible" style="background-color: #97BD59 !important;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fas fa-check"></i> Sucesso!</h4>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error') == TRUE): ?>
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fas fa-ban"></i> Erro!</h4>
            <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('warning') == TRUE): ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h4>
        <?php echo $this->session->flashdata('warning'); ?>
    </div>
<?php endif; ?>
 
<div class="card card-primary" >

<div class="card-header with-border">
  Filtros
</div>
<div class="card-body" >
<form name="buscarRota" id="buscarRota" action="<?=base_url('rota')?>" method="get">
 
 <div class="row">
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="form-group">
    Nome:<input type="text" class="form-control" value="<?=$nome?>" name="busca" autocomplete="off" id="busca" maxlength="200">
   </div>
  </div>
  </div>

<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
  <div class="form-group">
   Data da rota
    <input type="text" class="form-control data" value="<?=$dataRotaInicial?>" name="dataRotaInicial" autocomplete="off" id="busca" maxlength="200">   
  </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
  <div class="form-group">
    a
	<input type="text" class="form-control data" value="<?=$dataRotaFinal?>" name="dataRotaFinal" autocomplete="off" id="busca"  maxlength="200">
  </div>  
  </div>
  
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
  <div class="form-group">
    Situação
    <div class="input-group mb-3">
        <select name="Status" id="Status" class="form-control">

          <option value="">Selecione...</option>
          <option value="1" <?php if($status == 1): ?> selected <?php endif; ?>>Aberta</option>
          <option value="2" <?php if($status == 2):  ?> selected <?php endif; ?>>Em andamento</option>
          <option value="3" <?php if($status == 3):  ?> selected <?php endif; ?>>Atendimento realizado</option>
          <option value="4" <?php if($status == 4): ?> selected <?php endif; ?>>Finalizada</option>
     </select>
    </div>
</div>
  </div>
</div>
  <div class="col-lg-12">
    <div class="form-group">
        <button class="btn float-left" type="submit" >
            <span class="label label-primary"><i class="fa fa-search"></i></span>
            Buscar
        </button>
        <a class="btn float-right" href="<?=base_url('rota')?>">
            <span class="label label-primary"><i class="fa fa-sync-alt"></i></span>
            Limpar
        </a>
       
    </div>  
 
  </div>
</form>
</div>
</div>
<div class="card card-primary">
<div class="card-body table-responsive" >
<section class="content">
      <div class="row">
        <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if($nivelAcesso == 1): ?>
              <a href="<?=site_url('rota')?>/cadastro" class="btn" >
                <i class="fa fa-plus-circle"></i>Cadastrar
              </a>
              <br/> 
              <br/> 
            <?php endif; ?>
            <table id="data-table-cliente" class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th>Situação</th>
                  <th>Clientes</th>
                  <th>Nome</th>
                  <th>Data</th>
                  <th>Motorista</th>
                  <th>Cidade</th>
                  <th>Observação</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($rotas)):
                        foreach ($rotas as $key => $value):
                    ?>

                    <tr>
                       <td>
                            <?php if((int)$value['Status']==1 ): ?>
                                <span class="float-left badge bg-default">Aberta</span> 
						    <?php elseif((int)$value['Status'] == 2): ?>
								<span class="float-left badge bg-primary">Em andamento</span>
                            <?php elseif((int)$value['Status'] == 3): ?>
								<span class="float-left badge bg-info">Atendimento realizado</span>
                            <?php elseif((int)$value['Status'] == 4): ?>
                                <span class="float-left badge bg-success">Finalizada</span>								
                            <?php endif; ?> 
                        </td>
                        <td>
                            <span class="float-left badge bg-info"><?=$value['QuantidadeClientes']?></span>
                        </td>
                 
                        <td><?php echo  $value['Nome'];?></td>
                        <td><?php echo  date("d/m/Y",strtotime($value['DataRota']));?></td>
                        <td><?php echo  $value['Motorista'];?></td>
                        <td><?php echo  $value['Perimetro'];?></td>
                        <td><?php echo  $value['Observacao'];?></td>
                        <td>
                        <?php if($nivelAcesso == 1): ?>

                          <a title="Baixar Guia de Rota" href="<?=base_url('rota/guiaRota')?>/<?=$value["Id"]?>" class="btn">
                            <span class="label label-primary"><i class="fa fa-file-pdf"></i></span>
                          </a>
                          <a title="Baixar Lista de Coletas Efetuadas - PDF" href="<?=base_url('rota/pdfRota')?>/<?=$value["Id"]?>" class="btn">
                            <span class="label label-primary"><i class="fas fa-list"></i></span>
                          </a>
                          <a title="Baixar Lista de Coletas Efetuadas - Excel" href="<?=base_url('rota/excelRota')?>/<?=$value["Id"]?>" class="btn">
                            <span class="label label-primary"><i class="fa fa-fw fa-file-excel"></i></span>
                          </a>
                        <?php endif ; ?>
                          <a title="Realizar atendimento" href="<?=base_url('rota/visualizar')?>/<?=$value["Id"]?>" class="btn">
                            <span class="label label-primary mouseCursorPointer"><i class="fas fa-edit"></i></span>
                          </a>
                     
                          <?php if($nivelAcesso ==1) :?>
                          
                            <a title="Visualizar Rota" href="<?=base_url('rota/alterar')?>/<?=$value["Id"]?>" class="btn">
                              <span class="label label-primary mouseCursorPointer"><i class="fa fa-search"></i></span>
                            </a>
                          <?php endif; ?>
                          <?php if($value['Status'] == "1") : ?>
                        
                          <a style="display:none;" title="Finalizar rota" href="<?=base_url('rota/finalizar')?>/<?=$value["Id"]?>" class="btn">
                            <span class="label label-primary"><i class="fa fa-check-circle"></i></span>
                          </a>
                          <?php endif; ?>
                        </td>
                        
                    </tr>
                  <?php
                    endforeach;
                    endif;
                  ?>
                </tbody>
              </table>

              <div class="pull-right">
                  <?php
                      if(isset($pagination)):
                        echo $pagination;
                      endif;
                  ?>
                </div>
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