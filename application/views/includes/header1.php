<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Habitat - <?php echo $titulo; ?></title>
<meta name="description" content="administracion del carpas para habitat">
<meta name="author" content="habitat">
<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<!-- Le styles -->
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
<!--<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
-->
	<link href="<?= base_url('assets/css/bootstrap.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/bootstrap-combobox.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/timepicker.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/prettify.css')?>" rel="stylesheet" type="text/css" />
  <!--  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?php site_url('assets/js/bootstrap.js')?>" type="text/javascript"> </script>-->
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
			      <!--<li> <?php echo  "<a href='".base_url("evento/uno")."'>Eventos</a>";?></li>-->
			      <!--<li> <?php echo  "<a href='".site_url("metrica/index")."'>Metricas</a>";?></li>-->
			      <!--<li><a href="#Cuestionario">Cuestionario</a></li>-->
			      <li><a href="<?php echo site_url();?>/evento">Eventos</a></li>
			      <li><a href="#Cuestionario">Cuestionario</a></li>
			      <li><a href="#Metrica">Cuestionario</a></li>
			</ul>
		  </div>
		  <ul class="nav">
		
		  </ul>
	      
	    </div>
      </div>
      </div>
</header>
      