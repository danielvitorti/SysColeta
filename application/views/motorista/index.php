  <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Motoristas</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Motorista</a></li>
                <li class="breadcrumb-item active">Listagem</li>
            </ol>
            </div>
        </div>
    </div>
</section>


<?php if ($this->session->flashdata('success') == TRUE): ?>
    <div class="alert alert-success alert-dismissible" >
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


<h3 class="box-title"></h3>
<div class="card card-primary" >

<div class="card-header with-border"  >
  Filtros
</div>
<div class="card-body" >
<form name="buscaMotorista" id="buscaMotorista" action="<?=base_url('motorista')?>" method="get">
 
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="form-group">
   
    Buscar:<input type="text" class="form-control" value="" name="busca" autocomplete="off" id="busca" maxlength="200">
   </div>
  </div>

  <div class="col-lg-12">
    <div class="form-group">
        <button class="btn float-left" type="submit" >
            <span class="label label-primary"><i class="fa fa-search"></i></span>
            Buscar
        </button>
        <a class="btn float-right" href="<?=base_url('motorista')?>">
            <span class="label label-primary"><i class="fas fa-sync-alt"></i></span>
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
            <a href="<?=site_url('motorista')?>/cadastro" class="btn" >
              <i class="fa fa-plus-circle"></i>Cadastrar
            </a>
            <br />
            <br />
              <table id="data-table-motorista" class="table table-striped table-valign-middle">
                <thead>
                <tr>
                 
                  <th>Nome</th>
                                 </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($motoristas)):
                      foreach ($motoristas as $key => $value):
                  ?>
                    <tr class="mouseCursorPointer" onclick="window.location.href='<?=base_url('motorista/alterar')?>/<?=$value["Id"]?>'">    <td><?php echo  $value['Nome'];?></td>
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
    $("#buscaMotorista").attr('action','<?=base_url('motorista')?>/index');
    $("#buscaMotorista").submit();
  }

</script>
