<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Habitat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Artículo en GenbetaDev sobre Bootstrap 2.0">
    <meta name="author" content="Martín">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
	<link href="<?= base_url('assets/css/bootstrap.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/bootstrap-combobox.css')?>" rel="stylesheet" type="text/css" />
   <!-- <link href="<?= base_url('assets/css/pygments.css')?>" type="text/css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/prettify.css')?>" rel="stylesheet" type="text/css" />-->
    <link href="<?= base_url('assets/css/timepicker.css')?>" rel="stylesheet" type="text/css" />
     <link href="<?= base_url('assets/css/mi-estilo.css')?>" rel="stylesheet" type="text/css" />
    
	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js')?>"></script>
   
	<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap-typeahead.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap-combobox.js')?>"></script>
	<!--<script src="<?=base_url('assets/js/prettify/prettify.js')?>"></script>-->
	<script src="<?=base_url('assets/js/bootstrap-timepicker.js')?>"></script>
  
    
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
      	
    <a class="brand" href="#"><img style="width: 60px;" src="<?= base_url('assets/css/img/Logo_transparente.png')?>"></a>
      <div class="nav-collapse">
      <ul class="nav">
      	<li><a ></a></li>
       <li> <?php echo  "<a href='".base_url("index.php/evento/index")."'>Eventos</a>";?></li>
        <!--<li><a <?php echo anchor('index.php/evento/index')?>>Eventos</a></li>-->
        
       <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Métricas <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?php echo  "<a href='".base_url("index.php/metrica/index")."'>Consultar</a>";?></li>
                <li><?php echo  "<a href='".base_url("index.php/metrica/add")."'>Crear</a>";?></li>
              </ul>
            </li>

       <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Colaboradores <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><?php echo  "<a href='".base_url("index.php/colaborador/index")."'>Consultar</a>";?></li>
                  <li><?php echo  "<a href='".base_url("index.php/colaborador/add")."'>Crear</a>";?></li>
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

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span1">
      <!--Sidebar content-->
    </div>
    <div class="span10 hero-unit sombra-form">
      <!--Body content-->
    
 