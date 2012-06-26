<?php echo validation_errors(); ?>
<?php echo form_open('evento/edit') ?>
<h2><?php echo $titulo;?></h2>
<form id="formAdd" class="form-horizontal">
    <fieldset>
        <?php foreach ($eventos as $evento):?>

        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" value="<?=$evento['nombre']?>" autofocus />

        <h5>Ubicacion</h5>
        <input type="input" name="ubicacion" class="input-large" placeholder="Ubicacion" required maxlength="50" value="<?=$evento['ubicacion']?>"/>

        <?php $hoy=date("Y-m-d");?>

        <h5>Fecha de inicio</h5>
        <input type="text" class="span2" data-date-format="yyyy-mm-dd" id="dp1" name="fecha_inicio" value="<?=$evento['fecha_inicio']?>">

        <h5>Fecha de termino</h5>
        <input type="text" class="span2" data-date-format="yyyy-mm-dd" id="dp2" name="fecha_fin" value="<?=$evento['fecha_fin']?>"><br />
        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>
        </br>
        <? endforeach;?>

        <button type="submit" class="btn btn-primary">
            <i class="icon-pencil icon-white"></i> Guardar</button>
    </fieldset>
    <input name="id_evento" type="hidden" id="id_evento" value="<?php echo($this->input->post('id_evento'))?>"/>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
<script>
    $(document).ready(function() {

        //$('#formAdd').submit();
        $('#dp1').datepicker();
        $('#dp2').datepicker();
        $('#alert').hide();
    });
</script>

