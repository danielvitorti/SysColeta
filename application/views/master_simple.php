<!DOCTYPE html>
<html  >

<head>
 
   <title>Óleo Local | Coleta Seletiva | Sistema de Controle</title>

 
<meta charset="UTF-8">
<meta name="description" content="Óleo Local | Coleta Seletiva | Sistema de Controle">
<meta name="author" content="Daniel Mendes">
<meta name="viewport" content="width=device-width, initial-scale=1">

  
  

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/dist/css/adminlte.min.css'); ?>">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css'); ?>"> 
<link rel="icon" type="image/png" href="http://oleolocal.com.br/wp-content/uploads/2019/02/LEOLOCAL_LOGO_COLETASELETIVA_ICON.png">
  


  
  
</head>
 
<body class="hold-transition">

<?php
        if(isset($content))
        {
            echo $content;
        }
?>

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

<script src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/js/adminlte.min.js'); ?>"></script>

<script src="<?php echo site_url('assets/AdminLTE-3.0.5/dist/js/demo.js'); ?>"></script>

<script src="<?php echo site_url('assets/AdminLTE-3.0.5/plugins/jquery-maskedinput/jquery.maskedinput.js'); ?>"></script>

<script type="text/javascript">
$(document).ready(function () {

  //$("#CnpjCpf").mask('99.999.999/9999-99');

  $("#cep").mask('99999-999');

  /*$("#radCnpj").click(function(){

		$("#CnpjCpf").mask('99.999.999/9999-99');
  });

  $("#radCpf").click(function(){

    $("#CnpjCpf").mask('999.999.999-99');

  }); */


  $.validator.setDefaults({
    submitHandler: function () {

    }
  });
 
  function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $(".endereco").attr("disabled","");
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
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        
                        

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $(".endereco").removeAttr('disabled');
                     
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
</script>
</body>
</html>
