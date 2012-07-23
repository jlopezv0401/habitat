<?php echo validation_errors(); ?>
<?php

//$attributes = array('class' => 'well');
echo form_open('colaborador/add') ?>
<h2><?php echo $titulo;?></h2>
<br>
<form id="formAdd" class="form-horizontal">

    <fieldset>
        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="30" autofocus/>

        <h5>Apellido Paterno</h5>
        <input type="input" name="apaterno" class="input-large" placeholder="A. Paterno" required maxlength="25"/>

        <h5>Apellido Materno</h5>
        <input type="input" name="amaterno" class="input-large" placeholder="A. Materno" required maxlength="25"/>

        <h5>Sexo</h5>
        <input type="radio" name="sexo" class="inline" value="H" required/>Hombre &nbsp;
        <input type="radio" name="sexo" class="inline" value="M" required/>Mujer
        </br>
        </br>

        <input type="hidden" name="estatus" class="inline" value="true" required/>

        <h5>Edad</h5>
        <input type="input" name="edad" class="input-large" placeholder="Edad" required maxlength="10"/>

        <h5>Dirección</h5>
        <input type="input" name="direccion" class="input-large" placeholder="Dirección" required maxlength="50"/>

        <h5>Teléfono</h5>
        <input type="input" name="telefono" class="input-large" placeholder="Teléfono" required maxlength="15"/>

        <h5>Correo Electrónico</h5>
        <input type="input" name="correo" class="input-large" placeholder="Correo" required maxlength="40"/>

        <!--<h5>Dinámica</h5>
        <select name="id_dinamica" id="id_dinamica" class="combobox input-large">
            <option></option>
            <?php foreach ($dinamicas as $dinamica):?>
            <option value="<?php echo $dinamica['id'] ?>"> <?php echo $dinamica ['nombre'] ?></option>

            <? endforeach;?>
        </select> -->

        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="icon-file icon-white"></i> Guardar</button>
    </fieldset>

</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
<script>
    $(document).ready(function() {

        //$('#formAdd').submit();persona
        $('#alert').hide();
        $('#dp1').datepicker();
        $('#dp2').datepicker();

        /*        var startDate = new Date($('#dp1').val());
    var endDate = new Date($('#dp2').val());
    $('#dp1').datepicker()
    .on('changeDate', function(ev){
        if (ev.date.valueOf() > endDate.valueOf()){
            $('#alert').show().find('strong').text('La Fecha de Inicio no puede ser mayor que la de fin');
        } else {
            $('#alert').hide();
            startDate = new Date(ev.date);
            $('#startDate').text($('#dp1').data('date'));
        }
        $('#dp1').datepicker('hide');
        });

    $('#dp2').datepicker()
    .on('changeDate', function(ev){
        if (ev.date.valueOf() < startDate.valueOf()){
                $('#alert').show().find('strong').text('La Fecha de Fin no puede ser menor que la de inicio');
            } else {
                $('#alert').hide();
                endDate = new Date(ev.date);
                $('#endDate').text($('#dp2').data('date'));
            }
            $('#dp2').datepicker('hide');
        });*/
    });
</script>

