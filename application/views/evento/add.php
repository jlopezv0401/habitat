<?php echo validation_errors(); ?>
<?php echo form_open('evento/add') ?>
    <h2><?php echo $titulo;?></h2>
    <h5>Nombre</h5>
    <input type="input" name="nombre" size="50"/>

    <h5>Ubicacion</h5>
    <textarea name="ubicacion" style="width:300px"></textarea>
        
    <h5>Fecha de inicio</h5>
    <input type="input" name="fecha_inicio" size="50"/>
        
    <h5>Fecha de termino</h5>
    <input type="input" name="fecha_fin" size="50"/><br />
    </br>
	
    <div><input class="btn" type="submit" name="submit" value="Guardar" /></div>
