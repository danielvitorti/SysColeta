  

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Coleta</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Coleta</a></li>
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
 
<div class="card card-primary">

<div class="card-header with-border" style="background-color: #97BD59 !important;">
  Filtros
</div>
<div class="card-body" >
<form name="buscaColeta" id="buscaColeta" action="<?=base_url('coleta')?>" method="get">
 
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="form-group">
   
    Buscar:<input type="text" class="form-control" value="" name="busca" autocomplete="off" id="busca" required="" maxlength="200">
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
        
        <a class="btn float-right" href="<?=base_url('coleta')?>">
            <span class="label label-primary"><i class="fa fa-refresh"></i></span>
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
            <!-- <a href="<?=site_url('coleta')?>/cadastro" class="btn btn-default" >
              <i class="fa fa-plus-circle"></i>Efetuar coleta
            </a> -->
            
            <br/> 
            <br/> 
            <table id="data-table-cliente" class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th>Rota</th>
                  <th>Data da rota</th>
                  <th>Motorista</th>
                  <th>Veículo</th>
                  <th>Quantidade coletada (L)</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($coletas)):
                        foreach ($coletas as $key => $value):
                    ?>
                    <tr class="mouseCursorPointer" onclick="window.location.href='<?=base_url('coleta/alterar')?>/<?=$value["Id"]?>'">    <td><?php echo  $value['Nome'];?></td>
                        <td><?php echo  date("d/m/Y",strtotime($value['DataRota']));?></td>
                        <td><?php echo  $value['Motorista'];?></td>
                        <td><?php echo  $value['Veiculo'];?></td>
                        <td>
                          <span class="badge badge-info right">
                            <?php echo  $value['QuantidadeColetada'];?> <small><i class="nav-icon fas fa-flask"></i></small>
                          </span>
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

<script>
  
  function buscar()
  {
    $("#buscaColeta").attr('action','<?=base_url('coleta')?>/index');
    $("#buscaColeta").submit();
  }
  
</script>