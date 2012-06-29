<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Habitat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Artículo en GenbetaDev sobre Bootstrap 2.0">
    <meta name="author" content="Martín">
    
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
	<link href="<?= base_url('assets/css/bootstrap.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/bootstrap-combobox.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/timepicker.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/prettify.css')?>" rel="stylesheet" type="text/css" />
    
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src='<?php base_url();?>js/bootstrap.js' > </script>-->
  
    
  </head>
  
<body>
	<header>
    <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
    	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      	</a>
      	
    <a class="brand" href="#"><img style="width: 60px;" src='<?php base_url();?>images/Logo_transparente.png'></a>
      <div class="nav-collapse">
      <ul class="nav">
      	<li><a ></a></li>
        <li> <?php echo  "<a href='".base_url("evento/index")."'>Eventos</a>";?></li>
        
       <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Metricas <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Consultar</a></li>
                <li><a href="#">Crear</a></li>  
              </ul>
            </li>
        <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cuestionario <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Consultar</a></li>
                <li><a href="#">Crear</a></li>  
              </ul>
            </li>
            
      </ul>
      </div>
      <ul class="nav">
      	
</ul>
      
    </div>
  </div>
</div>



</header>