<?php echo validation_errors(); ?>
<?php echo form_open('material/index') ?>

<form id="formIndex" method="post">
    <fieldset>

        <div style="z-index: 873; position:relative; top:-30px;">
            <ul class="breadcrumb">
                <li class="active">Materiales</li>
            </ul>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span9">
                    <!--Sidebar content-->
                    <h2><?php echo $titulo; ?></h2>

                </div>
                <div class="span3">
                    <!--Body content-->
                    <button class="btn btn-primary" name="enviar" type="submit" value="agregar">
                        <i class="icon-plus-sign icon-white"></i>
                        Agregar Material
                    </button>

                </div>
            </div>
        </div>

        <hr/>

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
                            Ver Carpas
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


        <input name="id_material" type="hidden" id="id_material"/>
    </fieldset>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
<script>

    $(document).ready(function() {
        $('td').click(function (){

            var valor = $(this).parent().children().html();
            var col = $(this).parent().children().index($(this));
            var row = $(this).parent().parent().children().index($(this).parent());

            $('#id_material').val(valor);
            //alert($(this).parent().index());
            //alert($(this).parent(row).html());
            //$('#ver').click(function() {
            //    alert('que te parece ' + valor);
            //});
        });
    });
</script>