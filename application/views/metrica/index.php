<?php echo validation_errors(); ?>
<?php echo form_open('metrica/index') ?>
<h2><?php echo $titulo; ?></h2>
<form id="formIndex" method="post">
    <fieldset>
        <div class="row">
            <div class="span9">

                <button class="btn btn-primary" name="enviar" type="submit" value="agregar">
                    <i class="icon-plus-sign icon-white"></i>
                    Agregar Métrica
                </button>
                </br>
                </br>
                <table class="table table-striped table-bordered tablesorter" id="tableEventos">
                    <thead>
                    <tr>
                        <th><i class="icon-tags"></i> ID</th>
                        <th><i class="icon-user"></i> Nombre</th>
                        <th><i class="icon-flag"></i> Valor a Medir</th>
                        <th><i class="icon-chevron-right"></i> Rango Inicio</th>
                        <th><i class="icon-chevron-left"></i> Rango Fin</th>
                        <th><i class="icon-road"></i> Intervalo</th>
                        <th><i class="icon-road"></i> Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach($metricas as $metrica): ?>
                    <tr>
                        <td><?=$metrica['id']?></td>
                        <td><?=$metrica['nombre']?></td>
                        <td><?=$metrica['valor_medir']?></td>
                        <td><?=$metrica['rango_inicio']?></td>
                        <td><?=$metrica['rango_fin']?></td>
                        <td><?=$metrica['no_intervalo']?></td>
                        <td>
                            <div class="btn-group">
<!--                                <button class="btn btn-primary" name="enviar" type="submit" value="ver">
                                    <i class="icon-list icon-white"></i>
                                    Ver Métricas
                                </button>-->
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
                        <? endforeach;?>
                    </tbody>
                </table>

            </div>
        </div>
        <input name="id_metrica" type="hidden" id="id_metrica"/>
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

            $('#id_metrica').val(valor);
            //alert($(this).parent().index());
            //alert($(this).parent(row).html());
            //$('#ver').click(function() {
            //    alert('que te parece ' + valor);
            //});
        });
    });
</script>