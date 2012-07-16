<?php echo validation_errors(); ?>
    <?php echo form_open('persona/index') ?>

<form id="formIndex" method="post">
    <fieldset>

        <div style="z-index: 873; position:relative; top:-30px;">
            <ul class="breadcrumb">

                <li class="active">Personas</li>
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
                        Agregar Persona
                    </button>

                </div>
            </div>
        </div>

        <hr/>



        <table class="table table-striped table-bordered tablesorter" id="tablePersonas">
            <thead>
            <tr>
                <th><i class="icon-tags"></i> ID</th>
                <th><i class="icon-user"></i> Nombre</th>
                <th><i class="icon-flag"></i> Edad</th>
                <th><i class="icon-chevron-right"></i> Teléfono</th>
                <th><i class="icon-chevron-left"></i> Correo</th>
                <th><i class="icon-road"></i> Acciones</th>
            </tr>
            </thead>
            <tbody>
            <? foreach($personas as $persona): ?>
            <tr>
                <td><?=$persona['id']?></td>
                <td><?=$persona['nombre']?></td>
                <td><?=$persona['edad']?></td>
                <td><?=$persona['telefono']?></td>
                <td><?=$persona['correo']?></td>
                <td>
                    <div class="btn-group">
                        <button class="btn" name="enviar" type="submit" value="ver">
                            <i class="icon-list icon-black"></i>
                            Ver Person
                        </button>
                        &nbsp
                        <button class="btn" name="enviar" type="submit" value="editar">
                            <i class="icon-edit icon-black"></i>

                        </button>
                        <button class="btn btn-danger" name="enviar" type="submit" value="borrar">
                            <i class="icon-remove icon-white"></i>

                        </button>
                    </div>
                </td>
            </tr>
                <? endforeach;?>
            </tbody>
        </table>


        <input name="id_persona" type="hidden" id="id_persona"/>
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

            $('#id_persona').val(valor);
            //alert($(this).parent().index());
            //alert($(this).parent(row).html());
            //$('#ver').click(function() {
            //    alert('que te parece ' + valor);
            //});
        });
    });
</script>