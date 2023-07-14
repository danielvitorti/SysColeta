<!DOCTYPE html>
<html  >

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
  


  <script src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/js/adminlte.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/js/demo.js'); ?>"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
 
    <body>
     
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
<!--                         <li> <img src="./assets/images/ce.png" alt="CE" class="tlogo"> </li>-->
                        <li class="active"><a href="<?php echo site_url(); ?>">Home</a></li>
                    </ul>

                </div>
            </div>
        </nav>


<div class="container " > 
    <div class="row content">
<?php
if(isset($content)){
    echo $content;
}


?>
    
     </div>
       

 
    
</div>


        

<footer class="container-fluid text-center">
  <p>@Codeenable.com</p>
</footer>
    
  
</body>
</html>