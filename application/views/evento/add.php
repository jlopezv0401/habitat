<?php echo validation_errors(); ?>
<?php echo form_open('evento/add') ?>
    <h2><?php echo $titulo;?></h2>

    <h5>Nombre</h5>
    <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" autofocus/>

    <h5>Ubicacion</h5>
    <input type="input" name="ubicacion" class="input-large" placeholder="Ubicacion" required maxlength="50"/>
        
    <h5>Fecha de inicio</h5>
    <input type="input" name="fecha_inicio" class="input-large" placeholder="Fecha Inicio" required maxlength="50"/>
        
    <h5>Fecha de termino</h5>
    <input type="input" name="fecha_fin" class="input-large" placeholder="Fecha Termino" required maxlength="50"/><br />
    </br>
	
    <div><input class="btn" type="submit" name="submit" value="Guardar" /></div>
