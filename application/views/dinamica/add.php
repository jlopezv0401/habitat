<?php echo validation_errors(); ?>
<?php echo form_open('evento/add') ?>
<h2><?php echo $titulo;?></h2>
<hr/>
<form id="formAdd" class="form-horizontal">

    <fieldset>
        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" autofocus/>

        <h5>Ubicacion</h5>
        <input type="input" name="ubicacion" class="input-large" placeholder="Ubicacion" required maxlength="50"/>

        <h5>Hora de inicio</h5>
        <input class="dropdown-timepicker input-large" type="text" name="hora_termino" id="hora_termino"/>

        <h5>Hora de termino</h5>
        <input class="dropdown-timepicker input-large" type="text" name="hora_termino" id="hora_termino"/>

        <h5>Métrica</h5>
        <select class="combobox input-large">
            <option></option>
            <option value="PA">Pennsylvania</option>
            <option value="CT">Connecticut</option>
            <option value="NY">New York</option>
            <option value="MD">Maryland</option>
            <option value="VA">Virginia</option>
        </select>

        <input type="hidden" name="id_dinamica" id="id_dinamica" value="<?=$this->input->post('id_dinamica')?>"></input>
        <input type="hidden" name="id_area" id="id_programa" value="<?=$this->input->post('id_area')?>"></input>

        </br>

        <button type="submit" class="btn btn-primary">
            <i class="icon-file icon-white"></i> Guardar</button>
    </fieldset>

</form>

<!--	<link href="<?= base_url('assets/css/pygments.css')?>" type="text/css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/prettify.css')?>" type="text/css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/timepicker.css')?>" type="text/css" rel="stylesheet" /> -->

<script type="text/javascript">
    $(document).ready(function() {

        //$('#formAdd').submit();
        //$('#alert').hide();
        
        $('.dropdown-timepicker').timepicker({
            defaultTime: 'current',
            minuteStep: 15,
            disableFocus: true,
            template: 'dropdown'
        });
        
        $('.combobox').combobox();

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

