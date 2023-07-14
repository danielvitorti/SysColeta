<!DOCTYPE html>
<html  >

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
<link rel="icon" type="image/png" href="<?php echo site_url('assets/AdminLTE-3.0.5/dist/img/logo.jpg')?>">
  


  
  
</head>
 
<body class="hold-transition login-page">

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
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
