<?php echo validation_errors(); ?>
<?php echo form_open('programa/index') ?>
<h2><?php echo $titulo; ?></h2>
<form id="formIndex" method="post">
    <fieldset>
        <div class="row">
            <div class="span9">

                <button class="btn btn-primary" name="enviar" type="submit" value="agregar">
                    <i class="icon-plus-sign icon-white"></i>
                    Agregar Programa
                </button>
                </br>
                </br>
                <table class="table table-striped table-bordered tablesorter" id="tableCarpa">
                    <thead>
                    <tr>
                        <th><i class="icon-tags"></i> ID</th>
                        <th><i class="icon-user"></i> Nombre</th>
                        <th><i class="icon-flag"></i> Descripcion</th>
                        <th><i class="icon-road"></i> ID Carpa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach($programas as $programa): ?>
                    <tr>
                        <td><?=$programa['id']?></td>
                        <td><?=$programa['nombre']?></td>
                        <td><?=$programa['descripcion']?></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary" name="enviar" type="submit" value="ver">
                                    <i class="icon-list icon-white"></i>
                                    Ver Areas
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
        <input name="id_programa" type="hidden" id="id_programa"/>
        <input name="id_carpa" type="hidden" value="<?=$this->input->post('id_carpa')?>" id="id_carpa"/>
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

            $('#id_programa').val(valor);
            //alert($(this).parent().index());
            //alert($(this).parent(row).html());
            //$('#ver').click(function() {
            //    alert('que te parece ' + valor);
            //});
        });
    });
</script>