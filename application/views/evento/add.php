<?php echo validation_errors(); ?>
<?php echo form_open('evento/add') ?>
    <h2><?php echo $titulo;?></h2>
    <form class="form-horizontal">
        <fieldset>
        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" autofocus/>
    
        <h5>Ubicacion</h5>
        <input type="input" name="ubicacion" class="input-large" placeholder="Ubicacion" required maxlength="50"/>
            
        <h5>Fecha de inicio</h5>
        <input type="input" name="fecha_inicio" class="input-large" placeholder="Fecha Inicio" required maxlength="50"/>
            
        <h5>Fecha de termino</h5>
        <input type="input" name="fecha_fin" class="input-large" placeholder="Fecha Termino" required maxlength="50"/><br />
        </br>
        
        <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
            <input class="span2" size="16" type="text" value="12-02-2012">
            <span class="add-on"><i class="icon-th"></i></span>
        </div>

        <button type="submit" class="btn btn-primary" data-loading-text="Enviando...">
                <i class="icon-file icon-white"></i> Guardar</button>
        </fieldset>
    </form>

    <script src="<?=base_url('assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
    <script>
        $('.datepicker').datepicker();
    </script>