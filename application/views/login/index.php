<div style="margin-top: 12%; text-align: center;" class="span12 center-text" >
    <img src="<?= base_url('assets/css/img/Logo.png')?>"  />
</div>
<div style="margin-top: 5%; text-align: center;" class="span12 center-text" >
	<form class="form-horizontal" action="<?php echo base_url();?>index.php/login/process" method="post" name="process">
		<fieldset>
	      	<input type="text" name='usuario' id='usuario' placeholder="Usuario">
	      	<input type="password" name="password" id='password' placeholder="Contraseña">
	      	<input type="submit" value ="Acceder"class="btn btn-primary"></br>
    	</fieldset>
    	<?php echo $msg?>
    </form>
</div>
  </div>
</div>



