<?php echo validation_errors(); ?>
<?php echo form_open('paquete/add') ?>
<h2><?php echo $titulo;?></h2>
<br>
<form id="formAdd" class="form-horizontal">

    <fieldset>
        <h5>Nombre</h5>
        <?php echo form_error('nombre');?>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" autofocus/>

        <table class="table table-striped table-bordered tablesorter" id="tableMateriales">
            <thead>
            <tr>
                <th><i class="icon-tags"></i> ID</th>
                <th><i class="icon-user"></i> Nombre</th>
                <th><i class="icon-flag"></i> Cantidad</th>
                <th><i class="icon-chevron-right"></i> Descripcion</th>
                <th><i class="icon-road"></i> Acciones</th>
            </tr>
            </thead>
            <tbody>
            <? foreach($materiales as $material): ?>
            <tr>
                <td align="center"><?=$material['id']?></td>
                <td><?=$material['nombre']?></td>
                <td><?=$material['cantidad']?></td>
                <td><?=$material['descripcion']?></td>
                <td>
                    <div class="btn-group">
                        <button align="center" class="btn" name="enviar" type="submit" value="ver">
                            <i class="icon-list icon-black"></i>
                            Agregar a Paquete
                        </button>
                        <button align="center" class="btn" name="enviar" type="submit" value="editar">
                            <i class="icon-edit icon-black"></i>
                        </button>
                        <button align="center" class="btn btn-danger" name="enviar" type="submit" value="borrar">
                            <i class="icon-remove icon-white"></i>
                        </button>
                    </div>
                </td>
            </tr>
                <? endforeach;?>
            </tbody>
        </table>


        </br>
        <button type="submit" class="btn btn-primary">
            <i class="icon-file icon-white"></i> Guardar
        </button>

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

