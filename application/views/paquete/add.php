<?php echo validation_errors(); ?>
<?php echo form_open('paquete/add') ?>
<h2><?php echo $titulo;?></h2>
<br>
<form id="formAdd" class="form-horizontal">

    <fieldset>
        <h5>Nombre</h5>
        <?php echo form_error('nombre');?>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" autofocus/>
        </br>
        <a href="#modalMateriales" role="button" class="btn" data-toggle="modal"><i class="icon-plus-sign"></i>Agregar Materiales</a>
        </br>
        <table class="table table-striped table-bordered tablesorter" id="tableMateriales">
            <thead>
            <tr>
                <th><i class="icon-user"></i> Nombre</th>
                <th><i class="icon-flag"></i> Cantidad</th>
                <th><i class="icon-chevron-right"></i> Descripcion</th>
                <th><i class="icon-road"></i> Acciones</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        </br>
        <button type="submit" class="btn btn-primary">
            <i class="icon-file icon-white"></i> Guardar
        </button>
    </fieldset>

    <div class="modal hide fade" id="modalMateriales">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Materiales Disponibles</h3>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-bordered tablesorter" id="tableMaterialesDisp">
                <thead>
                <tr>
                    <th><i class="icon-user"></i> Nombre</th>
                    <th><i class="icon-info-sign"></i> Descripcion</th>
                    <th><i class="icon-th-list"></i> Cantidad</th>
                    <th><i class="icon-plus-sign"></i> Agregar</th>
                </tr>
                </thead>
                <tbody>
                    <? foreach($materiales as $i => $material): ?>
                        <tr>
                            <td><?=$material['nombre']?></td>
                            <td><?=$material['descripcion']?></td>
                            <td>
                                <input type="input" id="<?=$i?>" class="input-mini" placeholder="Cantidad" required maxlength="6" autofocus/>
                            </td>
                            <td>
                                <button class="btn" type="button" id="<?=$i?>">
                                    <i class="icon-plus-sign"></i> Agregar
                                </button>
                            </td>
                        </tr>
                    <? endforeach;?>
                </tbody>
            </table>

        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</a>
        </div>
    </div>

</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-modal.js')?>"></script>
<script>
    $(document).ready(function() {

        $('#alert').hide();
        $('#modalMateriales').modal('hide');

        $('#tableMaterialesDisp tr .btn').click(function(){
            var cantidad = $('input[id="' + $(this).attr('id') + '"]').val();
            var nombre = $(this).parent().siblings().eq(0).html();
            var descripcion = $(this).parent().siblings().eq(1).html();

            $('#tableMateriales').append('' +
                '<tr>' +
                '<td>'+ nombre +'</td>' +
                '<td>'+ cantidad +'</td>' +
                '<td>'+ descripcion +'</td>' +
                '<td>' +
                '<button align="center" class="btn btn-danger" type="button">' +
                '<i class="icon-remove icon-white"></i>Quitar </button>'+
                '</td>' +
                '</tr>');

            $(this).parent().parent().remove();

        });


        $('#tableMateriales tr .btn').click(function(){
            $(this).parent().parent().remove();
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

