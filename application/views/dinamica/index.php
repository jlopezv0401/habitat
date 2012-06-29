<?php echo validation_errors(); ?>
<?php echo form_open('dinamica/index') ?>
<h2><?php echo $titulo; ?></h2>
<form id="formIndex" method="post">
    <fieldset>
        <div class="row">
            <div class="span9">

                <button class="btn btn-primary" name="enviar" type="submit" value="agregar">
                    <i class="icon-plus-sign icon-white"></i>
                    Agregar Dinámica
                </button>
                </br>
                </br>
                <table class="table table-striped table-bordered tablesorter" id="tableCarpa">
                    <thead>
                    <tr>
                        <th><i class="icon-tags"></i> ID</th>
                        <th><i class="icon-user"></i> Nombre</th>
                        <th><i class="icon-flag"></i> Inicio</th>
                        <th><i class="icon-flag"></i> Fin</th>
                        <th><i class="icon-road"></i> Descripción</th>

                    </tr>
                    </thead>
                    <tbody>
                    <? foreach($dinamicas as $dinamica): ?>
                    <tr>
                        <td><?=$dinamica['id']?></td>
                        <td><?=$dinamica['nombre']?></td>
                        <td><?=$dinamica['inicio']?></td>
                        <td><?=$dinamica['fin']?></td>
                        <td><?=$dinaramica['descripcion']?></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary" name="enviar" type="submit" value="ver">
                                    <i class="icon-list icon-white"></i>
                                    Ver Áreas
                                </button>
                                <button class="btn btn-primary" name="enviar" type="submit" value="editar">
                                    <i class="icon-edit icon-white"></i>
                                    Editar
                                </button>
                                <button class="btn btn-primary" name="enviar" type="submit" value="borrar">
                                    <i class="icon-remove icon-white"></i>
                                    Borrar
                                </button>
                            </div>
                        </td>
                    </tr>
                        <? endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
        <input name="id_dinamica" type="hidden" id="id_dinamica"/>
        <input name="id_area" type="hidden" value="<?=$this->input->post('id_area')?>" id="id_area"/>
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

            $('#id_dinamica').val(valor);
            //alert($(this).parent().index());
            //alert($(this).parent(row).html());
            //$('#ver').click(function() {
            //    alert('que te parece ' + valor);
            //});
        });
    });
</script>