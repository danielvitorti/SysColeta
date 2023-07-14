<div class="login-box">

  <!-- /.login-logo -->
  <!-- /.login-logo -->
  <div class="card" >
  <div class="login-logo" >
   
   <img src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/img/logo.jpg')?>"
     class="img img-responsive"
   />
   
 </div>
    <div class="card-body login-card-body" >
    <div class="login-logo">
  
  </div>

      <?php if ($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('warning') == TRUE): ?>
        <div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('success') == TRUE): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
      <?php endif; ?>
      
      <p class="login-box-msg"><b>SysColeta - Informe suas credenciais</b></p>

      <form action="<?=site_url("login/entrar")?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" required autocomplete="off" name="login" placeholder="Login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required autocomplete="off" name="senha" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
        
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Acessar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

  
    </div>
    <!-- /.login-card-body -->
  </div>
</div>