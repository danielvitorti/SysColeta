<!DOCTYPE html>
<html>

<head>
 
   <title>SysColeta - Logística Reversa</title>

 
<meta charset="UTF-8">
<meta name="description" content="SysColeta - Logística Reversa">
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
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/multiselect/bootstrap-multiselect.css'); ?>"> 

<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/multiselect/bootstrap-multiselect.css'); ?>"> 

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">


<link rel="icon" type="image/png" href="<?php echo site_url('assets/AdminLTE-3.0.5/dist/img/logo.jpg')?>">
	
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

.ativo {
    background-color: #00F;
    color: white;
}

.cinza{

  background-color: #C2C2C2;
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
      <img src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/img/logo.jpg')?>"
           alt=""
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SysColeta</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="display:none;" src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/img/logo.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Bem-vindo <?=$usuario ?></a>
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
			<li class="nav-header">Tópicos</li>
              <li class="nav-item">
                <a href="<?php echo site_url('cliente') ?>" class="nav-link mouseCursorPointer">
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
             <li ><hr style="background-color: #FFFFFF"/></li>
            </ul>
          </li>
		
          <li class="nav-item has-treeview">
		  
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Administração
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
			  <li class="nav-header">Tópicos</li>
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
              <i class="nav-icon nav-icon fas fa-copy"></i>
              <p>
                Tipos de pagamentos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('tipoPagamento') ?>/"  class="nav-link">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Consulta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('tipoPagamento') ?>/cadastro" class="nav-link">
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
             
            </ul
			
			<li class="nav-header"><hr style="background-color: #FFFFFF"/></li>
        
          </li>
         
          </li>
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
			<li class="nav-header">Tópicos</li>
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
			<li ><hr style="background-color: #FFFFFF"/></li>
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
			<li class="nav-header">Tópicos</li>
		
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
			  <li ><hr style="background-color: #FFFFFF"/></li>
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
			<li class="nav-header">Tópicos</li>
              <li class="nav-item">
                <a href="<?=site_url('relatorios/clientes')?>" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Relatório de clientes</p>
                </a>
              </li>
			  <li ><hr style="background-color: #FFFFFF"/></li>
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
    <strong>Copyright &copy; 2023 - SysColeta </strong>
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


<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/multiselect/bootstrap-multiselect.js'); ?>"></script> 
<!--
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>

-->

<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>"></script>


<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>


<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>



<script type="text/javascript">


$(".select2").select2().on('select2:select', function(e){
  $selectedElement = $(e.params.data.element);
  $selectedElementOptgroup = $selectedElement.parent("optgroup");
  if ($selectedElementOptgroup.length > 0) {
    $selectedElement.data("select2-originaloptgroup", $selectedElementOptgroup);
  }
  $selectedElement.detach().appendTo($(e.target));
  $(e.target).trigger('change'); //needed so that ui gets updated
});




    
$( "form" ).submit(function( event ) {
  $("#modal-loading").modal();  
});

$(".mouseCursorPointer").click(function(){
  $("#modal-loading").modal();
});

$(".page-change").click(function(){
  $("#modal-loading").modal();
});



$(document).ready(function () {
  
  
  function excluirPagamento(IdCliente)
  {	
	

		$("#tbPagamentos"+IdCliente).on('click', '.excluirPagamento'+IdCliente, function() {
			$(this).closest('tr').remove();
		});
  
   }	
  
  
  
  
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
  }
  
});
	
	


$('.data').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY'));
  });

   $('.data').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
   });

   $('.data').mask('99/99/9999');
   $('.telefone').mask('(99) 99999-9999');
   
   
   $('.dinheiro').maskMoney({showSymbol:false, symbol:"R$", decimal:".", thousands:"", allowZero: true});
  
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

$("#buscarDestinacao").click(function(){
	
		if($("#inicio").val() != "" && $("#fim").val() != ""&& $("#IdCliente").val() != "")
		{
			$("#relatorioDestinacaoFinal").submit();
			setTimeout(function(){$("#modal-loading").modal('hide')},1000);
		}
		else
		{
			
			   $(document).Toasts('create', {
                    title: 'Erro',
                    autohide: true,
                    delay: 750,
                    body: 'Informe todos os dados corretamente!'
                });
      
		}
});	


$("#emitirDeclaracao").click(function(){
	
		if($("#validade").val() != "" && $("#IdCliente").val() != "")
		{
			$("#declaracao").submit();
			setTimeout(function(){$("#modal-loading").modal('hide')},1000);
		}
		else
		{
			
			   $(document).Toasts('create', {
                    title: 'Erro',
                    autohide: true,
                    delay: 750,
                    body: 'Informe todos os dados corretamente!'
                });
      
		}
});	


$("#emitirRelatorioTotalMensalPorCidade").click(function(){
	
		if($("#inicio").val() != "" && $("#fim").val() != "" && $("#cidade").val() != "")
		{
			$("#relatorioTotalMensalPorCidade").submit();
			setTimeout(function(){$("#modal-loading").modal('hide')},1000);
		}
		else
		{
			
			   $(document).Toasts('create', {
                    title: 'Erro',
                    autohide: true,
                    delay: 750,
                    body: 'Informe todos os dados corretamente!'
                });
      
		}
});	


  $(document).ready(function() {
	  
	

	function limpa_formulário_cep() {
		// Limpa valores do formulário de cep.
		$("#rua").val("");
		$("#bairro").val("");
		$("#cidade").val("");
		$("#ibge").val("");
	}

	$("#cep").blur(function() {
		var cep = $(this).val().replace(/\D/g, '');
		if (cep != "") {
			var validacep = /^[0-9]{8}$/;
			if(validacep.test(cep)) {
				$("#rua").val("Carregando...");
				$("#bairro").val("Carregando...");
				$("#cidade").val("Carregando...");
				$("#ibge").val("Carregando...");

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
				limpa_formulário_cep();
				alert("Formato de CEP inválido.");
			}
		} 
		else 
		{        
			limpa_formulário_cep();
		}
    });
	
		function excluirPagamento(IdCliente)
		{

		  $("#tbPagamentos"+IdCliente).on('click', '.excluirPagamento'+IdCliente, function() {
			  $(this).closest('tr').remove();
		  });

		}

	
	
  }).on('click','.chkAdicionarFormaPagamentoCliente',function(){
	 
	 var checked = $(this).is(':checked');
	 var IdFormaPagamento = $(this).parent().parent().find('#IdFormaPagamento').val();
	 var IdFormaPagamentoCliente = $(this).parent().parent().find('#IdFormaPagamentoCliente').val();
	 
	 if(checked)
	 {
		var DescricaoFormaPagamento = $(this).parent().parent().find('#DescricaoFormaPagamento').val();
	    var QuantidadeFormaPagamento = $(this).parent().parent().find('#QuantidadeFormaPagamento').val();
	 	salvarFormaPagamentoCliente(IdFormaPagamento,DescricaoFormaPagamento,QuantidadeFormaPagamento);
	 }
	 else
	 {
		excluirFormaPagamentoCliente(IdFormaPagamentoCliente);
		
     }
		  
  }).on('click','.chkAdicionarTipoPagamentoCliente',function(){
	  
	 var checked = $(this).is(':checked');
	 var IdTipoPagamento = $(this).parent().parent().find('#IdTipoPagamento').val();
	 var IdTipoPagamentoCliente = $(this).parent().parent().find('#IdTipoPagamentoCliente').val();
	 
	 if(checked)
	 {
		var DescricaoTipoPagamento = $(this).parent().parent().find('#DescricaoTipoPagamento').val();
		var QuantidadeTipoPagamento = $(this).parent().parent().find('#QuantidadeTipoPagamento').val();
		salvarTipoPagamentoCliente(IdTipoPagamento,DescricaoTipoPagamento,QuantidadeTipoPagamento);
	 }
	 else
	 {
		 excluirTipoPagamentoCliente(IdTipoPagamentoCliente);
		 
	 }
		
  }).on('click','.chkAdicionarRecipiente',function(){
	 
	 var checked = $(this).is(':checked');
	 var IdRecipiente = $(this).parent().parent().find('#IdRecipiente').val();		
	 var IdRecipienteCliente = $(this).parent().parent().find('#IdRecipienteCliente').val();		
	 
	 if(checked)
	 {		 
		var DescricaoRecipiente = $(this).parent().parent().find('#DescricaoRecipiente').val();
		var QuantidadeRecipiente = $(this).parent().parent().find('#QuantidadeRecipiente').val();
		
     	salvarRecipienteCliente(DescricaoRecipiente,QuantidadeRecipiente,IdRecipiente);
	 }
	 else
	 {
		 excluirRecipienteCliente(IdRecipienteCliente);
	 }
		
	  
  }).on('change',".formaPagamento",function(){
	  
     let dados = "IdFormaPagamento="+$(this).val();
	 $.ajax({
			type: 'POST',
			dataType: 'json',
			url: '<?=base_url()?>FormaPagamento/BuscaValorPagamentoPorId',
			data: dados,
			success: function(response) {
				
			}
		});
		
  });

	$(".formaPagamento").each(function() {
		//alert($(this).val());
		 let dados = "IdFormaPagamento="+$(this).val();
		 $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?=base_url()?>FormaPagamento/BuscaValorPagamentoPorId',
                data: dados,
                success: function(response) {
                    //$("#bodyColetas").html(response);
			
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
	
	
    var row = document.getElementById("linhaPagamento"+IdCliente);
    var table = document.getElementById("tbPagamentos"+IdCliente);
    var clone = row.cloneNode(true);
    clone.id = "linhaClonada";
	
	var InputType = clone.getElementsByTagName("input");

	for (var i=0; i<InputType.length; i++){
	 if( InputType[i].type=='checkbox'){
		InputType[i].checked = false;  
	}else{
	   InputType[i].value='';               
		}
	}
	
	var selectTags = clone.getElementsByTagName("select");
	
	for(var i = 0; i < selectTags.length; i++) {
		selectTags[i].selectedIndex =0;
	}  
    table.appendChild(clone);
  }



function adicionarRecipiente(IdCliente){
    var row = document.getElementById("linhaRecipiente"+IdCliente);
    var table = document.getElementById("tbRecipientes"+IdCliente);
    var clone = row.cloneNode(true);
    clone.id = "linhaClonada";
    
    var InputType = clone.getElementsByTagName("input");

	for (var i=0; i<InputType.length; i++){
	 if( InputType[i].type=='checkbox'){
		InputType[i].checked = false;  
	}else{
	   InputType[i].value='';               
		}
	}
	
	var selectTags = clone.getElementsByTagName("select");
	
	for(var i = 0; i < selectTags.length; i++) {
		selectTags[i].selectedIndex =0;
	}  
	
	table.appendChild(clone);
	
}

function adicionarTipoPagamento(IdCliente){
    var row = document.getElementById("linhaTipoPagamento"+IdCliente);
    var table = document.getElementById("tbTipoPagamento"+IdCliente);
    var clone = row.cloneNode(true);
    clone.id = "linhaClonada";
	
	var InputType = clone.getElementsByTagName("input");

	for (var i=0; i<InputType.length; i++){
     
	 if( InputType[i].type=='checkbox'){
		InputType[i].checked = false;  
	}else{
	   InputType[i].value='';               
		}
	}
	var selectTags = clone.getElementsByTagName("select");
	
	for(var i = 0; i < selectTags.length; i++) {
		selectTags[i].selectedIndex =0;
	}  
	
    table.appendChild(clone);
}


function adicionarFormaPagamentoCliente(){

    $("#table-formas-pagamento tbody").html("");
    var buscarFormasPagamento = $("#buscarFormasPagamento").val();
    $.ajax({
    url: "<?=site_url('formaPagamento')?>/BuscarFormasPagamentoCliente",
    type: "POST",
    data: "buscarFormasPagamento="+$("#buscarFormasPagamento").val()+"&IdCliente="+$("#Id").val(),
    dataType: "json"


    }).done(function(resposta) {
      
      var tbody = "";
      var color = "";
      $.each(resposta,function(key,value){
		  var checked = value.Adicionado == true ? 'checked': '';
		  var Descricao = value.Descricao == null ? '' : value.Descricao;
		  var Quantidade = value.Quantidade == null ? '' : value.Quantidade;
          tbody += "<tr>"+
				   "<td><input type='text' value='"+Descricao+"' class='DescricaoFormaPagamento' name='DescricaoFormaPagamento[]' id='DescricaoFormaPagamento' /><input type='hidden' id='IdFormaPagamento' name='IdFormaPagamento[]' value="+value.Id+" />"+
				   "<input type='hidden' id='IdFormaPagamentoCliente' name='IdFormaPagamentoCliente[]' value="+value.IdFormaPagamento+" /></td>"+
				   "<td>"+value.Nome+
				   "</td>"+
				   "<td><input type='text' value='"+Quantidade+"' onkeyup='somenteNumeros(this);' name='QuantidadeFormaPagamento[]' id='QuantidadeFormaPagamento'/></td>"+
                   "<td><input type='checkbox' "+checked+" name='chkAdicionarFormaPagamentoCliente[]' class='chkAdicionarFormaPagamentoCliente' /></td></tr>";
        
         $("#table-formas-pagamento tbody").html(tbody);
      });
      $("#modal-formas-pagamento").modal();  

    }).fail(function(jqXHR, textStatus ) {
      
      
    }).always(function() {
      
      $('#table-formas-pagamento').DataTable({
        "bDestroy": true,
        "paging": true,
        "info": false,
        "searching": true,
        "ordering": false,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Portuguese-Brasil.json"
            },

      }); 

    }); 
}

function salvarFormaPagamentoCliente(IdFormaPagamento,DescricaoFormaPagamento,QuantidadeFormaPagamento)
{

   var data = "IdFormaPagamento="+IdFormaPagamento+"&DescricaoFormaPagamento="+DescricaoFormaPagamento+"&QuantidadeFormaPagamento="+QuantidadeFormaPagamento+"&Id="+$("#Id").val();
   
  $.ajax({
    url: "<?=site_url('formaPagamentoCliente')?>/salvarFormaPagamentoCliente",
    type: "POST",
    data: data,
    dataType: "json"
    }).done(function(resposta) {
       if(resposta == "ok")
       {
		   $(document).Toasts('create', {
                    title: 'Forma de pagamenoto adicionada',
                    autohide: true,
                    delay: 750,
                    body: 'Forma de pagamento adicionada com sucesso'
                });
           //window.location.reload();
       }
       else 
       {
            $(document).Toasts('create', {
                    title: 'Erro',
                    autohide: true,
                    delay: 750,
                    body: 'Ocorreu um erro! Por favor, tente novamente'
            });
       }
    }).fail(function(jqXHR, textStatus ) {
      $(document).Toasts('create', {
                    title: 'Erro',
                    autohide: true,
                    delay: 750,
                    body: 'Ocorreu um erro! Por favor, tente novamente'
                });
      
    }).always(function() {
      
    });
}


function adicionarTipoPagamentoCliente(){

  $("#table-tipos-pagamento tbody").html("");
    var buscarFormasPagamento = $("#buscarFormasPagamento").val();
    $.ajax({
    url: "<?=site_url('tipoPagamento')?>/BuscarTiposPagamentoCliente",
    type: "POST",
    data: "buscarTiposPagamento="+$("#buscarTiposPagamento").val()+"&IdCliente="+$("#Id").val(),
    dataType: "json"

    }).done(function(resposta) {
      
      var tbody = "";
      var color = "";
      $.each(resposta,function(key,value){
		  var checked = value.Adicionado == true ? 'checked': '';
		  var Descricao = value.Descricao == null ? '' : value.Descricao;
		  var Quantidade = value.Quantidade == null ? '' : value.Quantidade;
          tbody += "<tr><td><input type='text' value='"+Descricao+"' name='DescricaoTipoPagamento[]' id='DescricaoTipoPagamento' /></td>"+
                   "<td><input type='hidden' id='IdTipoPagamento' name='IdTipoPagamento[]' value="+value.Id+" /><input type='hidden' id='IdTipoPagamentoCliente' name='IdTipoPagamentoCliente[]' value="+value.IdTipoPagamentoCliente+" />"+value.Nome+"</td><td><input type='text' onkeyup='somenteNumeros(this);' name='QuantidadeTipoPagamento[]' value='"+Quantidade+"' id='QuantidadeTipoPagamento' /></td><td><input type='checkbox' "+checked+" class='chkAdicionarTipoPagamentoCliente' name='chkAdicionarTipoPagamentoCliente[]' /> </td></tr>";
        
         $("#table-tipos-pagamento tbody").html(tbody);
      });
      $("#modal-tipos-pagamento").modal();  

    }).fail(function(jqXHR, textStatus ) {

      $(document).Toasts('create', {
                    title: 'Erro',
                    autohide: true,
                    delay: 750,
                    body: 'Ocorreu um erro! Por favor, tente novamente'
                });
      
    }).always(function() {
      
      $('#table-tipos-pagamento').DataTable({
        "bDestroy": true,
        "paging": true,
        "info": false,
        "searching": true,
        "ordering": false,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Portuguese-Brasil.json"
            },
                                      
      }); 

    }); 
}

function salvarTipoPagamentoCliente(IdTipoPagamento,DescricaoTipoPagamento,QuantidadeTipoPagamento)
{

  var data = "IdTipoPagamento="+IdTipoPagamento+"&DescricaoTipoPagamento="+DescricaoTipoPagamento+"&QuantidadeTipoPagamento="+QuantidadeTipoPagamento+"&Id="+$("#Id").val();
  $.ajax({
		url: "<?=site_url('tipoPagamentoCliente')?>/salvarTipoPagamentoCliente",
		type: "POST",
		data: data,
		dataType: "json"

    }).done(function(resposta) {
      
       if(resposta == "ok")
       {
          $(document).Toasts('create', {
                    title: 'Tipo de pagamento adicionado',
                    autohide: true,
                    delay: 750,
                    body: 'Tipo de pagamento adicionado com sucesso!'
                });
       }
       else 
       {
          $(document).Toasts('create', {
                    title: 'Erro',
                    autohide: true,
                    delay: 750,
                    body: 'Ocorreu um erro! Por favor, tente novamente'
                });
       } 

    }).fail(function(jqXHR, textStatus ) {
      $(document).Toasts('create', {
                    title: 'Erro',
                    autohide: true,
                    delay: 750,
                    body: 'Ocorreu um erro! Por favor, tente novamente'
                });
      
    }).always(function() {
      
    });
	
}



function adicionarRecipienteCliente(){

$("#table-recipientes-cliente tbody").html("");
var buscarRecipientes = $("#buscarRecipientes").val();
$.ajax({
url: "<?=site_url('recipiente')?>/BuscarRecipientesCliente",
type: "POST",
data: "buscarRecipientes="+$("#buscarRecipientes").val()+"&IdCliente="+$("#Id").val(),
dataType: "json"

}).done(function(resposta) {
  
  var tbody = "";
  var color = "";
  $.each(resposta,function(key,value){
	  
	  var checked = value.Adicionado == true ? 'checked': '';
	  var Descricao = value.Descricao == null ? '' : value.Descricao;
	  var Quantidade = value.Quantidade == null ? '' : value.Quantidade;
		  
      tbody += "<tr><td><input type='text' value='"+Descricao+"' name='DescricaoRecipiente[]' id='DescricaoRecipiente' /></td>"+
               "<td><input type='hidden' name='IdRecipiente[]' id='IdRecipiente' value="+value.Id+" /><input type='hidden' name='IdRecipienteCliente[]' id='IdRecipienteCliente' value="+value.IdRecipienteCliente+" />"+value.Nome+"</td><td>"+value.Capacidade+"</td>"+			   
               "<td><input type='text' onkeyup='somenteNumeros(this);' value='"+Quantidade+"' name='QuantidadeRecipiente[]' id='QuantidadeRecipiente' /></td>"+
               "<td><input type='checkbox' "+checked+" name='chkAdicionarRecipiente[]' class='chkAdicionarRecipiente' /></td></tr>";
    
     $("#table-recipientes-cliente tbody").html(tbody);
  });
  $("#modal-recipientes").modal();  

}).fail(function(jqXHR, textStatus ) {
  
}).always(function() {
  
  $('#table-recipientes-cliente').DataTable({
    "bDestroy": true,
    "paging": true,
    "info": false,
    "searching": true,
    "ordering": false,
    "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Portuguese-Brasil.json"
        },
                                  
  }); 

}); 

}


function salvarRecipienteCliente(DescricaoRecipiente,QuantidadeRecipiente,IdRecipiente)
{
	var data = "DescricaoRecipiente="+DescricaoRecipiente+"&QuantidadeRecipiente="+QuantidadeRecipiente+"&IdRecipiente="+IdRecipiente+"&Id="+$("#Id").val();
	$.ajax({
		url: "<?=site_url('recipienteCliente')?>/salvarRecipienteCliente",
		type: "POST",
		data: data,
		dataType: "json"

    }).done(function(resposta) {
      
       if(resposta == "ok")
       {
          $(document).Toasts('create', {
                    title: 'Recipiente adicionado',
                    autohide: true,
                    delay: 750,
                    body: 'Recipiente adicionado com sucesso'
          });
       }
       else 
       {
          $(document).Toasts('create', {
                    title: 'Erro',
                    autohide: true,
                    delay: 750,
                    body: 'Ocorreu um erro! Por favor, tente novamente'
          });
       } 

    }).fail(function(jqXHR, textStatus ) {
      $(document).Toasts('create', {
                    title: 'Erro',
                    autohide: true,
                    delay: 750,
                    body: 'Ocorreu um erro! Por favor, tente novamente'
                });
      
    }).always(function() {
      
    });
	
}


function excluirTipoPagamentoCliente(IdTipoPagamento)
{
  //$("#tbTipoPagamentoCliente").on('click', function() {
		
		$.ajax({
		url: "<?=site_url('tipoPagamentoCliente')?>/excluirTipoPagamentoCliente",
		type: "POST",
		data: "IdTipoPagamento="+IdTipoPagamento,
		dataType: "json"

			}).done(function(resposta) {
			 
			   if(resposta == "ok")
			   {
				  
				  $(document).Toasts('create', {
							title: 'Tipo de pagamento excluído',
							autohide: true,
							delay: 750,
							body: 'Tipo de pagamento excluído com sucesso!'
				  });				  
				  
				  window.location.reload();
			   }
			   else 
			   {
				  $(document).Toasts('create', {
							title: 'Erro',
							autohide: true,
							delay: 750,
							body: 'Ocorreu um erro! Por favor, tente novamente'
				  });
			   } 

			}).fail(function(jqXHR, textStatus ) {
			  $(document).Toasts('create', {
							title: 'Erro',
							autohide: true,
							delay: 750,
							body: 'Ocorreu um erro! Por favor, tente novamente'
						});
			  
			}).always(function() {
			  
		});
		
   //}); 
}


function excluirRecipienteCliente(IdRecipienteCliente)
{
  //$("#tbRecipienteCliente").on('click', function() {
	 
	 	$.ajax({
		url: "<?=site_url('recipienteCliente')?>/excluirRecipienteCliente",
		type: "POST",
		data: "IdRecipienteCliente="+IdRecipienteCliente,
		dataType: "json"

			}).done(function(resposta) {
			 
			   if(resposta == "ok")
			   {
				  
				  $(document).Toasts('create', {
							title: 'Recipiente excluído',
							autohide: true,
							delay: 750,
							body: 'Recipiente excluído com sucesso!'
				  });				  
				  
				  window.location.reload();		  
			   }
			   else 
			   {
				  $(document).Toasts('create', {
							title: 'Erro',
							autohide: true,
							delay: 750,
							body: 'Ocorreu um erro! Por favor, tente novamente'
				  });
			   } 
			   
			}).fail(function(jqXHR, textStatus ) {
			  $(document).Toasts('create', {
							title: 'Erro',
							autohide: true,
							delay: 750,
							body: 'Ocorreu um erro! Por favor, tente novamente'
						});
			  
			}).always(function() {
			  
		});
	 
   //}); 
}


function excluirFormaPagamentoCliente(IdForma)
{
  //$("#tbFormaPagamentoCliente").on('click',function() {
	  	$.ajax({
		url: "<?=site_url('formaPagamentoCliente')?>/excluirFormaPagamentoCliente",
		type: "POST",
		data: "IdForma="+IdForma,
		dataType: "json"
		
			}).done(function(resposta) {
			 
			   if(resposta == "ok")
			   {
				  $(document).Toasts('create', {
							title: 'Forma de pagamento excluída',
							autohide: true,
							delay: 750,
							body: 'Forma de pagamento excluída com sucesso!'
				  });				  	
				  window.location.reload();
			   }
			   else 
			   {
				  $(document).Toasts('create', {
							title: 'Erro',
							autohide: true,
							delay: 750,
							body: 'Ocorreu um erro! Por favor, tente novamente'
				  });
			   } 
			   
			}).fail(function(jqXHR, textStatus ) {
			  $(document).Toasts('create', {
							title: 'Erro',
							autohide: true,
							delay: 750,
							body: 'Ocorreu um erro! Por favor, tente novamente'
						});
			  
			}).always(function() {
			  
		});
	 
   //}); 
}

function excluirRecipiente(IdCliente)
{
	

   $("#tbRecipientes"+IdCliente).on('click', '.excluirRecipiente'+IdCliente, function() {
     $(this).closest('tr').remove();
   }); 
   
   
   
} 






function excluirTipoPagamento(IdCliente)
{

  $("#tbTipoPagamento"+IdCliente).on('click', '.excluirTipoPagamento'+IdCliente, function() {
      $(this).closest('tr').remove();
  });

}


function adicionarTipoPagamento2(){
    var row = document.getElementById("linhaTipoPagamento");
    var table = document.getElementById("tbTipoPagamentoCliente");
    var clone = row.cloneNode(true);
    //clone.id = "linhaClonada";
	clone.id= "linhaTipoPagamento";
	var InputType = clone.getElementsByTagName("input");

	for (var i=0; i<InputType.length; i++){
	 if( InputType[i].type=='checkbox'){
		InputType[i].checked = false;  
	}else{
	   InputType[i].value='';               
		}
	}
	
	var selectTags = clone.getElementsByTagName("select");
	
	for(var i = 0; i < selectTags.length; i++) {
		selectTags[i].selectedIndex =0;
	}  
    table.appendChild(clone);
}


function adicionarFormaPagamentoCliente2(){

  var row = document.getElementById("linhaFormaPagamento");
    var table = document.getElementById("tbFormaPagamentoCliente");
    var clone = row.cloneNode(true);
    //clone.id = "linhaClonada";
	clone.id = "linhaFormaPagamento";
	
	var InputType = clone.getElementsByTagName("input");

	for (var i=0; i<InputType.length; i++){
	 if( InputType[i].type=='checkbox'){
		InputType[i].checked = false;  
	}else{
	   InputType[i].value='';               
		}
	}
	
	var selectTags = clone.getElementsByTagName("select");
	
	for(var i = 0; i < selectTags.length; i++) {
		selectTags[i].selectedIndex =0;
	}  
	
    table.appendChild(clone);
  
}

function adicionarRecipienteCliente2()
{

  var row = document.getElementById("linhaRecipiente");
    var table = document.getElementById("tbRecipienteCliente");
    var clone = row.cloneNode(true);
    //clone.id = "linhaClonada";
	clone.id = "linhaRecipiente";
	
	var InputType = clone.getElementsByTagName("input");

	for (var i=0; i<InputType.length; i++){
	 if( InputType[i].type=='checkbox'){
		InputType[i].checked = false;  
	}else{
	   InputType[i].value='';               
		}
	}
	
	var selectTags = clone.getElementsByTagName("select");
	
	for(var i = 0; i < selectTags.length; i++) {
		selectTags[i].selectedIndex =0;
	}  
	
    table.appendChild(clone);
}


function excluirRecipienteCliente2()
{
  $("#tbRecipienteCliente").on('click', '.excluirRecipienteCliente', function() {
	 if($('#tbRecipienteCliente tr').length > 1){
		$(this).closest('tr').remove();
	 }
   }); 
}


function excluirFormaPagamentoCliente2()
{
  $("#tbFormaPagamentoCliente").on('click', '.excluirFormaPagamentoCliente', function() {
      if($('#tbFormaPagamentoCliente tr').length > 1){
		$(this).closest('tr').remove();
	  }
   }); 
}

function excluirPagamento(IdCliente)
{

  $("#tbPagamentos"+IdCliente).on('click', '.excluirPagamento'+IdCliente, function() {
	  $(this).closest('tr').remove();
  });

}

function excluirTipoPagamento2()
{
	$("#tbTipoPagamentoCliente").on('click', '.excluirTipoPagamentoCliente', function() {
	  if($('#tbTipoPagamentoCliente tr').length > 1){	
		$(this).closest('tr').remove();
	  }
    }); 
}

function excluirRecipiente2(IdCliente)
{

   $("#tbRecipientes"+IdCliente).on('click', '.excluirRecipiente'+IdCliente, function() {
     $(this).closest('tr').remove();
   }); 
   
} 



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
                    sheetName: 'Relatorio'

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
		
		
var table = $('#data-table-cliente').DataTable({
           "paging": false,
           "info": false,
            "searching": false,
            "ordering": false,
            "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Portuguese-Brasil.json"
                },
			"bDestroy": true,
            dom: 'Bfrtip',
            buttons: [
			    /*{
					text: 'Gerar excel',
					action: function ( e, dt, node, config ) {
						
						//this.disable(); // disable button
						window.location.href='<?=base_url("cliente")?>/excel';
					}
				}, */
			
                /*{
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-fw fa-file-excel"></i>Excel',
                    autoFilter: true,
                    sheetName: 'Relatorio'

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
                }*/

            ]
          
        });		

function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
}

$("#btnPesquisarClientes").click(function(){

  
  //$('#table-clientes').DataTable().destroy();
  $("#table-clientes tbody").html("<tr><td coslpan='2'>Carregando...</td></tr>");
  $.ajax({
    url: "<?=site_url('rota')?>/buscarClientesPorRota",
    type: "POST",
	dataType: "json",
    data: "IdRota="+$("#Id").val(),
	success: function (response) {
		
      var tbody = "<tr><td>Cod</td><td>Nome</td></tr>";
      var color = "";
	  
      $.each(response,function(key,value){
          
          $.each(response['clientes'], function(k,v){
              color = "";
              $.each(response['rotaClientes'],function(k1,v1){

                  if(v1.IdCliente == v.Id){
                    color='background-color: #C2C2C2;';
                  }
              });

              var nome = "\""+v.Nome+"\"";
              tbody += "<tr id='trCliente"+v.Id+"' onclick='addCliente("+v.Id+","+nome+");' style='cursor:pointer; "+color+" '><td>"+v.Id+"</td><td>"+v.Nome+"</td></tr>";
          });
          $("#table-clientes tbody").html(tbody);
		  
		   $('#table-clientes').DataTable({        
				"paging": true,
				"info": false,
				"searching": true,
				"ordering": false,
				"language": {
						"url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Portuguese-Brasil.json"
					},
				"bDestroy": true
								  
		    });
      });
     
    
	}	
    }).done(function(resposta) {

        

    }).fail(function(jqXHR, textStatus ) {
      
      
    }).always(function() {
      
      
      
    });
  
  $("#modal-clientes").modal();

});

$("#btnAlterarRota").click(function(){
    $("#rota").submit();
});


function addCliente(Id,Nome)
{
 

  if($("#trCliente"+Id).hasClass("cinza"))
  {
    $("#trCliente"+Id).css("background-color", "white");
    $("#trCliente"+Id).removeClass("cinza");
    removeCliente(Id);
    $(document).Toasts('create', {
                    title: 'Cliente removido',
                    autohide: true,
                    delay: 750,
                    body: 'Cliente removido com sucesso!'
                });
  
  }
  else{
    
    $.ajax({
        url: "<?=site_url('rota')?>/adicionarClientesPorRota",
        type: "POST",
        data: "IdCliente="+Id+"&IdRota="+$("#Id").val(),
        dataType: "json"

    }).done(function(resposta) {

        if(resposta == "ok"){


          $("#trCliente"+Id).css("background-color", "#C2C2C2");
          $("#trCliente"+Id).addClass("cinza");

          var html ="";
          html += "<span id='cliente"+Id+"'><label>"+Nome+"</label>";
          html += "<input type='hidden' name='IdCliente[]' id='IdCliente' value='"+Id+"' />&nbsp;";
          html += "<i class='fa fa-trash' style='cursor: pointer;' onclick='removeCliente("+Id+");'></i></span><br />";
          $("#spanClientes").append(html);

          
          $(document).Toasts('create', {
                    title: 'Cliente adicionado',
                    autohide: true,
                    delay: 750,
                    body: 'Cliente adicionado com sucesso!'
                });
        }
        else if(resposta == "existe")
        {
          $(document).Toasts('create', {
                    title: 'Cliente já cadastrado',
                    autohide: true,
                    delay: 750,
                    body: 'Cliente previamente cadastrado!'
                });
        }
        else if(resposta == "erro"){
          $(document).Toasts('create', {
                    title: 'Ocorreu um erro',
                    autohide: true,
                    delay: 750,
                    body: 'Por favor, tente novamente'
                });
        }

    }).fail(function(jqXHR, textStatus ) {
      
      $(document).Toasts('create', {
                    title: 'Ocorreu um erro',
                    autohide: true,
                    delay: 750,
                    body: 'Por favor, tente novamente'
                });
    }).always(function() {
      
    });
  
  
  }
  
  
}

function removeCliente(Id){

   $("#cliente"+Id).html("");
   
   $.ajax({
    url: "<?=site_url('rota')?>/excluirPorRotaCliente",
    type: "POST",
    data: "IdCliente="+Id+"&IdRota="+$("#Id").val(),
    dataType: "json"

    }).done(function(resposta) {

      if(resposta =="ok")
      {
        $(document).Toasts('create', {
                      title: 'Cliente excluido',
                      autohide: true,
                      delay: 750,
                      body: 'Cliente excluido com sucesso!'
                  });
      }
      else if(resposta == "erro"){
        $(document).Toasts('create', {
                      title: 'Ocorreu um erro',
                      autohide: true,
                      delay: 750,
                      body: 'Por favor, tente novamente.'
                  });
      }

    }).fail(function(jqXHR, textStatus ) {

      $(document).Toasts('create', {
                      title: 'Ocorreu um erro',
                      autohide: true,
                      delay: 750,
                      body: 'Por favor, tente novamente.'
                  });
      
    }).always(function() {
      
     
    });

}

function alterarStatusAtendimento()
{
	var status = $("#Status").val();
	
	$("#IdStatus").val(status);
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



<div class="modal fade" id="modal-clientes" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Clientes</h4>
   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
       <table id="table-clientes" class="table">
          <thead>
              <tr>
                <th>Cód.</th>
                <th>Nome</th>
              </tr>
          </thead>
          <tbody>
            
          </tbody>
       </table>
       </div>
       </div>
      </div>

      <div class="modal-footer">
   
      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-tipos-pagamento" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tipos de pagamento</h4>
        <button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
       <form name="frmTiposPagamento" id="frmTiposPagamento">
          <table id="table-tipos-pagamento" class="table">
              <thead>
                  <tr>
                    <th>Descrição</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Adicionar</th>
                  </tr>
              </thead>
              <tbody>
                
              </tbody>
          </table>
          
       </form>
       </div>
       </div>
      </div>

      <div class="modal-footer">
          <input type="button" onclick="window.location.reload();"  name="btnCadastrarTipoPagamentoCliente" id="btnCadastrarTipoPagamentoCliente" value="Fechar" class="btn btn-primary"/>
      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="modal-formas-pagamento" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Formas de pagamento</h4>
        <button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
       <form id="frmFormasPagamentoCliente" name="frmFormasPagamentoCliente">
        <table id="table-formas-pagamento" class="table">
            <thead>
                <tr>
                  <th>Descrição</th>
                  <th>Nome</th>
                  <th>Quantidade</th>
                  <th>Adicionar</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
       </form>
       </div>
       </div>
      </div>

      <div class="modal-footer">
          <input type="button" class="btn btn-primary" onclick="window.location.reload();" id="btnSalvarFormaPagamentoCliente" name="btnSalvarFormaPagamentoCliente" value="Fechar" />
      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="modal-recipientes" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Recipientes</h4>
   
        <button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
       <form id="frmRecipientesCliente" name="frmRecipientesCliente">
        <table id="table-recipientes-cliente" class="table">
            <thead>
                <tr>
                  <th>Descrição</th>
                  <th>Nome</th>
                  <th>Capacidade</th>
                  <th>Quantidade</th>
                  <th>Adicionar</th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
       </form>
       </div>
       </div>
      </div>

      <div class="modal-footer">
      <input type="button" class="btn btn-primary" onclick="window.location.reload();" id="btnSalvarRecipienteCliente" name="btnSalvarRecipienteCliente" value="Fechar" />
      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



</body>
</html>
