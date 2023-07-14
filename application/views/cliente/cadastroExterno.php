<div class="">

  <!-- /.login-logo -->
  <!-- /.login-logo -->
  <div class="card" >
  <div class="login-logo" style="background-color:#97BD59;">
   
   <img src="http://oleolocal.com.br/wp-content/uploads/2013/12/LEO-LOCAL_logo-horizontal_textobranco-e1550092567592.png"
     class=""
   />
   
 </div>

 
 

 <div class="col-lg-12">
    <div class="card-body " >
    <div class="login-logo">
  
  </div>
      <p class="login-box-msg">Para iniciar o cadastro, precisamos dos seguintes dados</p>

    
      <?php if ($this->session->flashdata('error') == TRUE): ?>
         <div class="alert alert-warning" align="center"><?php echo $this->session->flashdata('error'); ?></div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('success') == TRUE): ?>
        <div class="alert alert-success" align="center"><?php echo $this->session->flashdata('success'); ?></div>
      <?php endif; ?>
      
      <?php if ($this->session->flashdata('warning') == TRUE): ?>
        <div class="alert alert-warning" align="center"><?php echo $this->session->flashdata('warning'); ?></div>
      <?php endif; ?>

      <form action="<?=site_url("cliente/salvar")?>" name="frmCliente" id="frmCliente" method="post">
       <label>Nome do estabelecimento </label>
        <div class="input-group mb-4">
        <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-building"></span>
            </div>
          </div>
          <input type="text" class="form-control" required autocomplete="off" name="Nome" placeholder="" required>   
        </div>
        <label> 
          CNPJ
          <input type="radio" id="radCnpj" name="radCnpjCpf" value="cnpj" checked/>
          CPF
          <input type="radio" id="radCpf" name="radCnpjCpf" value="cpf" />
        </label>
        <div class="input-group mb-4">
        <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-list-alt"></span>
            </div>
          </div>
          <input type="text" class="form-control" required  autocomplete="off" maxlength="30" id="CnpjCpf" name="CnpjCpf" placeholder="" value="">
        </div>
        <label>Nome do responsável </label>
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input type="text" class="form-control"  autocomplete="off" name="NomeResponsavel" id="NomeResponsavel" placeholder="">
        </div>
        <label>Email </label>
        <div class="input-group mb-4">
           <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input type="email" class="form-control" required autocomplete="off" name="Email" id="Email" placeholder="">
        </div>
        <label>Cep </label>
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-list"></span>
            </div>
          </div>
          <input type="text" class="form-control" required autocomplete="off" name="Cep" id="cep" placeholder="">
          
        </div>
        <label>Rua </label>
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-list"></span>
            </div>
          </div>
          <input type="text" disabled class="form-control endereco" required autocomplete="off" name="Rua" id="rua" placeholder="">
          
        </div>
        <label>Número </label>
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-list"></span>
            </div>
          </div>
          <input type="text" class="form-control endereco" required autocomplete="off" name="Numero" id="Numero" placeholder="">
          
        </div>
        <label>Bairro </label>
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-list"></span>
            </div>
          </div>
          <input disabled type="text" class="form-control endereco" required autocomplete="off" name="Bairro" id="bairro" placeholder="">
          
        </div>
        <label>Cidade </label>
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-list"></span>
            </div>
          </div>
          <input disabled type="text" class="form-control endereco" required autocomplete="off" name="Cidade" id="cidade" placeholder="">
          
        </div>
        <label>Horário de coleta </label>
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
          <input type="text" class="form-control" autocomplete="off" name="HorarioColeta" id="HorarioColeta" placeholder="">
          
        </div>

        
        <label>Instagram </label>
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas ion-social-instagram"></span>
            </div>
          </div>
          <input type="text" class="form-control" autocomplete="off" name="Instagram" id="Instagram" placeholder="">
          
        </div>
        <div class="row">
        
          <!-- /.col -->
          <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12">
            <button type="submit" class="btn btn-primary btn-block">Enviar dados</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->  
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</div>
