<div style="margin-top: 17%; text-align: center;" class="span12 center-text" >
    <img src="<?= base_url('assets/css/img/Logo.png')?>"  />
</div>

<div class="modal hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h2>Iniciar Sesión</h2>
  </div>
  <div class="modal-body" style="text-align: right;">
<?php

$atributos=array(
	
	'id'=>'frm_login'
);
echo form_open('login/validar',$atributos);

$userr = array(
	'type'=>'text',
	'name' => 'username',
	'id' => 'username',
	'class' => 'input-myxlarge',
	'placeholder'=>'Usuario...',
	'value' => ''
	);
	
	$passs = array(
	'type'=>'password',
	'name' => 'password',
	'id' => 'password',
	'class' => 'input-myxlarge',
	'placeholder'=>'Contraseña...',
	'value' => ''
	);
	
	echo form_input($userr);
	echo form_input($passs);
?>
  
    <a href="#" class="btn btn-large" data-dismiss="modal">Cerrar</a>
    <button href="#" class="btn btn-primary btn-large">Entrar</a>
    
    <?php echo form_close(); ?>
  </div>
</div>



