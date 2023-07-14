<!DOCTYPE html>
<html>

<head>
 
   <title>Óleo Local - Sistema de Controle</title>

 
<meta charset="UTF-8">
<meta name="description" content="Óleo Local - Sistema de Controle">
<meta name="author" content="Daniel Mendes">
<meta name="viewport" content="width=device-width, initial-scale=1">

  
  

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/dist/css/adminlte.min.css'); ?>">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css'); ?>"> 
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/pace-progress/themes/silver/pace-theme-flat-top.css'); ?>"> 


<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css'); ?>"> 
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/select2/css/select2.min.css'); ?>"> 
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>"> 
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.css'); ?>"> 
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/summernote/summernote-bs4.css'); ?>"> 


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">


<link rel="icon" type="image/png" href="http://oleolocal.com.br/wp-content/uploads/2019/02/LEOLOCAL_LOGO_COLETASELETIVA_ICON.png">
	
<style>
@media print {
  .notPrint {
    display: none;
  }
  .print {
    display:none;
  }

  .no-print { 
    display:block; 
  }

}

input[type=text]{
  outline: 0;
  border-width: 0 0 1px;
  border-color: gray;
  border-radius: 0px;
}
input[type=text]:focus {
  border-color: black;
}


input[type=email]{
  outline: 0;
  border-width: 0 0 1px;
  border-color: gray;
  border-radius: 0px;
}
input[type=email]:focus {
  border-color: black;
}


input[type=password]{
  outline: 0;
  border-width: 0 0 1px;
  border-color: gray;
  border-radius: 0px;
}
input[type=password]:focus {
  border-color: black;
}
.form-control
{
  outline: 0;
  border-width: 0 0 1px;
  border-color: gray;
  border-radius: 0px;
}

.form-control:focus{
  border-color: black;
}
.mouseCursorPointer
{
  cursor:pointer !important;
}

</style>
</head>
 
<body class="hold-transition sidebar-mini pace-default">
<div class="wrapper">
  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
           
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
        
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/img/user3-128x128.jpg')?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown" style="display:none;">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        
      </li>
      <li class="nav-item" style="display:none;">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="<?=site_url()?>" class="brand-link">
      <img src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/img/oleo_local.png')?>"
           alt=""
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Óleo Local</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="display:none;" src="http://oleolocal.com.br/wp-content/uploads/2019/02/LEOLOCAL_LOGO_COLETASELETIVA_ICON.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Bem-vindo(a) <?=$usuario ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if($nivelAcesso >=1): ?>
          <li class="nav-item has-treeview">
            <a href="<?php echo site_url() ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Início
                <i class="right fas "></i>
              </p>
            </a>
          </li>
          <?php endif; ?>
          
          <?php if($nivelAcesso == 1) : ?>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clientes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('cliente') ?>" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('cliente') ?>/cadastro" class="nav-link">
                  <i class="far fa fa-plus nav-icon"></i>
                  <p>Cadastro</p>
                </a>
              </li>
             
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Empresa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Veículos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('veiculo') ?>/"  class="nav-link">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('veiculo') ?>/cadastro" class="nav-link">
                <i class="far fa fa-plus nav-icon"></i>
                  <p>Cadastro</p>
                </a>
              </li>
            </ul>
            <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                Formas de pagamento
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('formaPagamento') ?>/"  class="nav-link">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('formaPagamento') ?>/cadastro" class="nav-link">
                <i class="far fa fa-plus nav-icon"></i>
                  <p>Cadastro</p>
                </a>
              </li>
            </ul>
            </li>
            <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-flask"></i>
              <p>
                Recipientes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('recipiente') ?>/"  class="nav-link">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('recipiente') ?>/cadastro" class="nav-link">
                <i class="far fa fa-plus nav-icon"></i>
                  <p>Cadastro</p>
                </a>
              </li>
            </ul>
            </li>
            <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Etiquetas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('etiqueta') ?>/"  class="nav-link">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('etiqueta') ?>/cadastro" class="nav-link">
                <i class="far fa fa-plus nav-icon"></i>
                  <p>Cadastro</p>
                </a>
              </li>

            

              
            </ul>
            </li>

            <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Periodicidades
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('periodicidade') ?>/"  class="nav-link">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('periodicidade') ?>/cadastro" class="nav-link">
                <i class="far fa fa-plus nav-icon"></i>
                  <p>Cadastro</p>
                </a>
              </li>

            

              
            </ul>
            </li>

            <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Turnos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('turno') ?>/"  class="nav-link">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('turno') ?>/cadastro" class="nav-link">
                <i class="far fa fa-plus nav-icon"></i>
                  <p>Cadastro</p>
                </a>
              </li>

            

              
            </ul>
            </li>


          </li>
          </li>
          </ul>

          
          </li>



            


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Motoristas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('motorista') ?>" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('motorista') ?>/cadastro" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Cadastro</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuários
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('usuario') ?>" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('usuario') ?>/cadastro" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Cadastro</p>
                </a>
              </li>
             
            </ul>
          </li>
          <?php endif; ?>
          
          <?php if($nivelAcesso >= 1 && $nivelAcesso <=2) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Rotas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if($nivelAcesso == 1 ) { ?>
              <li class="nav-item">
                <a href="<?php echo site_url('rota') ?>/index" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('rota') ?>/cadastro" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Cadastrar rota</p>
                </a>
              </li>
            <?php } else if($nivelAcesso == 2){ ?>
              <li class="nav-item">
                <a href="<?php echo site_url('rota') ?>/index" class="nav-link">
                  <i class="far fa-circle fa-map"></i>
                  <p>Consulta</p>
                </a>
              </li>
            <?php } ?>
            </ul>
          </li>
          <?php } ?>
          <?php if($nivelAcesso >= 1 && $nivelAcesso <=2) { ?>
          <li class="nav-item has-treeview" style="display:none !important">
            <a href="#" class="nav-link">
              <i class="nav-icon fas  fa-recycle"></i>
              <p>
                Coleta
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if($nivelAcesso == 1 || $nivelAcesso == 2  ) { ?>
              <li class="nav-item">
                <a href="<?php echo site_url('coleta') ?>/index" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item" style="display:none;">
                <a href="<?php echo site_url('coleta') ?>/cadastro" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Efetuar coleta</p>
                </a>
              </li>
            <?php } ?>
            </ul>
          </li>
          <?php } ?>
          <?php if($nivelAcesso == 1 || $nivelAcesso == 3) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Documentos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if($nivelAcesso == 1) { ?>
              <li class="nav-item">
                <a href="<?php echo site_url('documento') ?>/index" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?php echo site_url('documento') ?>/cadastro" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Cadastro</p>
                </a>
              </li>
              <?php } else if($nivelAcesso == 3) {?>
                <li class="nav-item">
                <a href="<?php echo site_url('documento') ?>/index" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>

              <?php } ?>
            </ul>
          </li>
          <?php } ?>
          <?php if($nivelAcesso == 1) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Relatórios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('relatorios/clientes')?>" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Relatório de clientes</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <li class="nav-item has-treeview">
            <a href="<?php echo site_url('login') ?>/sair" class="nav-link">
              <i class="nav-icon fa fa-ban"></i>
              <p>
                Sair
                <i class="right fas "></i>
              </p>
            </a>
            
          </li>
          
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <section class="content">
      <div class="container-fluid">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <?php
        if(isset($content))
        {
            echo $content;
        }
    ?>
    
    <!-- /.content -->
  </div>
  </div>
      </section>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Versão</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 - Oleo Local - Sistema de Controle.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- jquery-validation -->
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/jquery-validation/jquery.validate.min.js')?>"></script>
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/jquery-validation/additional-methods.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/js/demo.js')?>"></script>

<script src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/js/demo.js'); ?>"></script>


<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/moment/moment.min.js'); ?>"></script>

<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/moment/locales.min.js'); ?>"></script>


<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js'); ?>"></script>

<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/jquery-maskMoney/jquery.maskMoney.min.js'); ?>"></script>


<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/jquery-maskedinput/jquery.maskedinput.js'); ?>"></script>

<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/select2/js/select2.full.min.js'); ?>"></script>

<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.js'); ?>"></script>


<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/inputmask/min/jquery.inputmask.bundle.min.js'); ?>"></script>

<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/pace-progress/pace.min.js') ?>"></script>
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/summernote/summernote-bs4.min.js') ?>"></script>

<!--
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>

-->

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>



<script type="text/javascript">

$( "form" ).submit(function( event ) {
  $("#modal-loading").modal();
  /*if ( $( "input" ).first().val() === "correct" ) {
    $( "span" ).text( "Validated..." ).show();
    return;
  }
 
  $( "span" ).text( "Not valid!" ).show().fadeOut( 1000 );
  event.preventDefault(); */
});

$(".mouseCursorPointer").click(function(){
  $("#modal-loading").modal();
});

$(".page-change").click(function(){
  $("#modal-loading").modal();
});



$(document).ready(function () {
  
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });

  moment.locale('pt-br');
  

   $('.data').daterangepicker({
    "singleDatePicker":true,
    "autoUpdateInput": false,
    "locale": {
    "format": "DD/MM/YYYY",
    "separator": " - ",
    "applyLabel": "Aplicar",
    "cancelLabel": "Cancelar",
    "fromLabel": "De",
    "toLabel": "Até",
    "customRangeLabel": "Custom",
    "daysOfWeek": [
        "Dom",
        "Seg",
        "Ter",
        "Qua",
        "Qui",
        "Sex",
        "Sáb"
    ],
    "monthNames": [
        "Janeiro",
        "Fevereiro",
        "Março",
        "Abril",
        "Maio",
        "Junho",
        "Julho",
        "Agosto",
        "Setembro",
        "Outubro",
        "Novembro",
        "Dezembro"
    ],
    "firstDay": 0
}});

$('.data').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY'));
  });

   $('.data').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
   });

   $('.data').mask('99/99/9999');
   $('.telefone').mask('(99) 99999-9999');
   //$('.dinheiro').mask('9?9?9?9.99');

   
   
   $('.dinheiro').maskMoney({showSymbol:false, symbol:"R$", decimal:".", thousands:""});
   $('.select2').select2();
   $("#cep").mask('99999-999');



    $(function () {
    // Summernote
    $('.textarea').summernote()
  });

   $("#NivelAcesso").change(function(){

      if(this.value =="")
      {
          $(".nomeText").fadeOut('fast');
          $(".motoristaCmb").fadeOut('fast');
          $(".clienteCmb").fadeOut('fast');

          $("#IdMotorista").val("");
          $("#IdCliente").val("");
          $("#nome").val("");
      }
      else if(this.value == 1)
      {
          
          $(".motoristaCmb").fadeOut('fast');
          $("#IdMotorista").val("");
          $(".clienteCmb").fadeOut('fast');
          $("#IdCliente").val("");
      }
      else if(this.value == 2)
      {
          
          $("#nome").val("");
          $(".motoristaCmb").fadeIn('fast');
          $(".clienteCmb").fadeOut('fast');
          $("#IdMotorista").val("");
      }
      else if(this.value == 3)
      {
          
          $("#nome").val("");
          $(".motoristaCmb").fadeOut('fast');
          $("#IdMotorista").val("");
          $(".clienteCmb").fadeIn('fast');
      }

   });

   $("#IdMotorista").change(function(){
      $("#nome").val($('#IdMotorista :selected').text());
   });
  
  $("#IdCliente").change(function(){
    $("#nome").val($('#IdCliente :selected').text());
  });



  $(document).ready(function() {

function limpa_formulário_cep() {
    // Limpa valores do formulário de cep.
    $("#rua").val("");
    $("#bairro").val("");
    $("#cidade").val("");
    $("#ibge").val("");
}

//Quando o campo cep perde o foco.
$("#cep").blur(function() {

    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $("#rua").val("Carregando...");
            $("#bairro").val("Carregando...");
            $("#cidade").val("Carregando...");
            $("#ibge").val("Carregando...");

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#rua").val(dados.logradouro);
                    $("#bairro").val(dados.bairro);
                    $("#cidade").val(dados.localidade);
              
                    $("#ibge").val(dados.ibge);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            });
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
});
});



  
  
});

function cliente(IdCliente,NomeCliente)
{
    $("#NomeCliente").html(NomeCliente);
    $("#IdCliente").val(IdCliente);

}
function visualizarColetas(IdCliente)
{
    var dados = "IdCliente="+IdCliente;
    $("#bodyColetas").html("");
    $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?=base_url()?>coleta/coletasTableBody',
                data: dados,
                success: function(response) {
                    $("#bodyColetas").html(response);
                }
            });
}

function adicionarPagamento(IdCliente){
    var row = document.getElementById("linhaPagamento");
    var table = document.getElementById("tbPagamentos"+IdCliente);
    var clone = row.cloneNode(true);
    clone.id = "linhaClonada";
    table.appendChild(clone);
  }



function adicionarRecipiente(IdCliente){
    var row = document.getElementById("linhaRecipiente");
    var table = document.getElementById("tbRecipientes"+IdCliente);
    var clone = row.cloneNode(true);
    clone.id = "linhaClonada";
    table.appendChild(clone);
  }



/*function excluirRecipiente(IdCliente)
{

   $("#tbRecipientes"+IdCliente).on('click', '.excluirRecipiente'+IdCliente, function() {
     $(this).closest('tr').remove();
   }); 
   
} */

function excluirPagamento(IdCliente)
{

  $("#tbPagamentos"+IdCliente).on('click', '.excluirPagamento'+IdCliente, function() {
      $(this).closest('tr').remove();
  });

}
//.dataTable
var table = $('.table').DataTable({
           "paging": false,
           "info": false,
            "searching": false,
            "ordering": false,
            "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Portuguese-Brasil.json"
                },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-fw fa-file-excel"></i>Excel',
                    autoFilter: true,
                    sheetName: 'Relatorio'/*,
                    action: function (e, dt, node, config)
                    {
                        //This will send the page to the location specified
                        //window.location.href = './AjaxHandler.php';
                        
                    } */

                },

                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf"></i> PDF'
                },
                {
                    extend: 'copy',
                    text: '<i class="fa fa-copy"></i> Copiar'
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Imprimir'
                }

            ]
          
        });


        table.on('buttons-action', function (e, buttonApi, dataTable, node, config) {
            if (buttonApi.text().includes("Imprimir")) {
                $.ajax({
                    type: 'POST',
                    url: '/ltf2/Report/LogPrintRequest',
                    data: { printedPage: "Relatório Técnico" }
                });
            }
    });


    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }


</script>


<div class="modal fade" id="modal-loading" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Carregando</h4>
            </div>
            <div class="modal-body">
              <p>Aguarde...</p>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

</body>
</html>
