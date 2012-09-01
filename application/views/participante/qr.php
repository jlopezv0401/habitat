<?php echo validation_errors(); ?>
<?php

//$attributes = array('class' => 'well');
echo form_open('participante/add') ?>
<h2><?php echo $titulo;?></h2>
<br>
<form id="formAdd" class="form-horizontal">

    <fieldset>
        <div class="span12 well">

            <h2 id='nombre'> Habitat Bla Bla</h2>
            </br>
            <div class="span2" id="qr">
            </div>
            <div class="span6 offset4">
                <h2>Aqui va el nombre completo</h2>
                <h3>Este es un dato</h3>
                <h3>Este es otro dato</h3>
                <h3>Este es otro dato</h3>
            </div>
            <div class="span3 offset10">
                Una foto aqui
            </div>

        </div>

        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>
        <input name="id_participante" type="hidden" value="<?=$this->input->post('id_participante')?>" id="id_participante"/>
        <button type="submit" class="btn btn-primary">
            <i class="icon-file icon-white"></i> Imprimir</button>
    </fieldset>

</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
<script src="<?=base_url('assets/js/jquery.qrcode.js')?>"></script>
<script src="<?=base_url('assets/js/qrcode.js')?>"></script>
<script>
    $(document).ready(function() {

        //$('#formAdd').submit();
        $('#alert').hide();
        jQuery('#qr').qrcode({
            width: 128,
            height: 128,
            text	: "Hey oh let's go!!"
        });


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

