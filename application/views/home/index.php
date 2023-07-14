<section class="content-header">
      <h2>
        Início
       
      </h2>
    </section>
<div class="row">
      
      <?php if($nivelAcesso == 1): ?>
        <div class="col-lg-3 col-xs-6" style="display:none;">
          <!-- small box -->
          <div class="small-box bg-blue" >
            <div class="inner">
              <h3><?=$totalColeta?></h3>
              <p>Litros de óleo coletados</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?=base_url()?>coleta" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
   
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue" >
            <div class="inner">
              <h3><?=$totalClientes?><sup style="font-size: 20px"></sup></h3>
              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?=base_url()?>cliente" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
     
        <!-- ./col -->
      
	  
	    <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue" >
            <div class="inner">
              <h3><?=$totalClientesComerciais?><sup style="font-size: 20px"></sup></h3>
              <p>Clientes comerciais</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?=base_url()?>cliente?Etiqueta=2" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue" >
            <div class="inner">
              <h3><?=$totalClientesCondominio?><sup style="font-size: 20px"></sup></h3>
              <p>Clientes condomínio</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?=base_url()?>cliente?Etiqueta=5" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
 
 
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue" >
            <div class="inner">
              <h3><?=$totalClientesPontoColeta?><sup style="font-size: 20px"></sup></h3>
              <p>Clientes ponto de coleta</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?=base_url()?>cliente?Etiqueta=15" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
     
        <!-- ./col -->
    
        <div class="col-lg-3 col-xs-6" style="">
          <!-- small box -->
          <div class="small-box bg-blue" >
            <div class="inner">
              <h3><?=$totalRotas?></h3>

              <p>Rotas</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?=base_url()?>rota" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		
		
		
		<div class="col-lg-3 col-xs-6" style="">
          <!-- small box -->
          <div class="small-box bg-blue" >
            <div class="inner">
              <h3><?=$totalRotasEmAberto?></h3>

              <p>Rotas em aberto</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?=base_url()?>rota?Status=1" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6" style="">
          <!-- small box -->
          <div class="small-box bg-blue" >
            <div class="inner">
              <h3><?=$totalRotasEmAndamento?></h3>

              <p>Rotas em andamento</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?=base_url()?>rota?Status=2" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6" style="">
          <!-- small box -->
          <div class="small-box bg-blue" >
            <div class="inner">
              <h3><?=$totalRotasAtendimentoRealizado?></h3>

              <p>Rotas com atendimento realizado</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?=base_url()?>rota?Status=3" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6" style="">
          <!-- small box -->
          <div class="small-box bg-blue" >
            <div class="inner">
              <h3><?=$totalLitrosColetados?></h3>

              <p>Litros coletados</p>
            </div>
            <div class="icon">
              <i class=""></i>
            </div>
            <a href="<?=base_url()?>rota" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
	
        <?php endif; ?> 
        <!-- ./col -->
      </div>