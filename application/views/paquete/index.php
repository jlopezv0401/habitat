<?php echo validation_errors(); ?>
<?php echo form_open('paquete/index') ?>

<form id="formIndex" method="post">
    <fieldset>

        <div style="z-index: 873; position:relative; top:-30px;">
            <ul class="breadcrumb">
                <li class="active">Paquetes</li>
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
                        Agregar Paquete
                    </button>
                </div>
            </div>
        </div>
        <hr/>

        <table class="table table-striped table-bordered tablesorter" id="tablePaquetes">
            <thead>
            <tr>
                <th><i class="icon-tags"></i> ID</th>
                <th><i class="icon-user"></i> Nombre</th>
                <th><i class="icon-th-list"></i> Cantidad</th>
                <th><i class="icon-info-sign"></i> Descripcion</th>
                <th><i class="icon-road"></i> Acciones</th>
            </tr>
            </thead>
            <tbody>
            <? foreach($paquetes as $paquete): ?>
            <tr>
                <td align="center"><?=$paquete['id']?></td>
                <td><?=$paquete['nombre']?></td>
                <td><?=$paquete['cantidad']?></td>
                <td><?=$paquete['descripcion']?></td>
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


        <input name="id_paquete" type="hidden" id="id_paquete"/>
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

            $('#id_paquete').val(valor);
            //alert($(this).parent().index());
            //alert($(this).parent(row).html());
            //$('#ver').click(function() {
            //    alert('que te parece ' + valor);
            //});
        });
    });
</script>
