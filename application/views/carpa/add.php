<?php echo validation_errors(); ?>
<?php echo form_open('carpa/add') ?>
<h2><?php echo $titulo;?></h2>
<form id="formAdd" class="form-horizontal">

    <fieldset>
        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre Carpa" required maxlength="50" autofocus/>
        </br>
        </br>
        <button type="submit" class="btn btn-primary">
            <i class="icon-file icon-white"></i> Guardar</button>

        <input type="hidden" name="id_evento" id="id_evento" value="<?=$this->input->post('identifica')?>"></input>
        <input type="hidden" name="identifica" id="identifica" value="<?=$this->input->post('identifica')?>"></input>
    </fieldset>

</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
<script>
    $(document).ready(function() {

        //$('#formAdd').submit();+
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

