<?php echo validation_errors(); ?>
<?php echo form_open('evento/add') ?>
    <h2><?php echo $titulo;?></h2>
    <form id="formAdd" class="form-horizontal">
        <fieldset>
        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" autofocus/>
    
        <h5>Ubicacion</h5>
        <input type="input" name="ubicacion" class="input-large" placeholder="Ubicacion" required maxlength="50"/>
        
        <?php $hoy=date("Y-m-d");?>
        
        <h5>Fecha de inicio</h5>
        <input type="text" class="span2" value="<?php echo $hoy;?>" data-date-format="yyyy-mm-dd" id="dp1" name="fecha_inicio">
        
        <h5>Fecha de termino</h5>
        <input type="text" class="span2" value="<?php echo $hoy;?>" data-date-format="yyyy-mm-dd" id="dp2" name="fecha_fin" required maxlength="20"><br />
        </br>

        <button type="submit" class="btn btn-primary" data-loading-text="Enviando...">
                <i class="icon-file icon-white"></i> Guardar</button>
        </fieldset>
    </form>

    <script src="<?=base_url('assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
    <script>
    $(document).ready(function() {
        //$('#formAdd').submit();
        $('#dp1').datepicker();
        $('#dp2').datepicker();
    });
    </script>

