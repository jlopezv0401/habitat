<?php echo validation_errors(); ?>
<?php echo form_open('metrica/add') ?>
<h2><?php echo $titulo;?></h2>
<form id="formAdd" class="form-horizontal">

    <fieldset>
        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" autofocus/>

        <h5>Valor a Medir</h5>
        <input type="input" name="valor_medir" class="input-large" placeholder="Valor a Medir" required maxlength="50"/>

        <h5>Rango Inicio</h5>
        <input type="input" name="rango_inicio" class="input-large" placeholder="Rango Inicial" required maxlength="50"/>

        <h5>Rango Final</h5>
        <input type="input" name="rango_fin" class="input-large" placeholder="Rango Final" required maxlength="50"/>

        <h5>Intervalo</h5>
        <input type="input" name="no_intervalo" class="input-large" placeholder="Intervalo" required maxlength="50"/>

        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>
        </br>

        <button type="submit" class="btn btn-primary">
            <i class="icon-file icon-white"></i> Guardar</button>
    </fieldset>

</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
<script>
    $(document).ready(function() {

        //$('#formAdd').submit();
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

