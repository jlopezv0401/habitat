<?php echo validation_errors(); ?>
<?php echo form_open('evento/index') ?>
<h2><?php echo $titulo; ?></h2>
<form id="formIndex" method="post">
    <fieldset>
        <div class="row">
            <div class="span9">
                <table class="table table-striped table-bordered tablesorter" id="tableEventos">
                    <thead>
                    <tr>
                        <th><i class="icon-tags"></i> ID</th>
                        <th><i class="icon-user"></i> Nombre</th>
                        <th><i class="icon-flag"></i> Ubicacion</th>
                        <th><i class="icon-chevron-right"></i> Inicio</th>
                        <th><i class="icon-chevron-left"></i> Fin</th>
                        <th><i class="icon-road"></i> Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach($eventos as $evento): ?>
                    <tr>
                        <td><?=$evento['id']?></td>
                        <td><?=$evento['nombre']?></td>
                        <td><?=$evento['ubicacion']?></td>
                        <td><?=$evento['fecha_inicio']?></td>
                        <td><?=$evento['fecha_inicio']?></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary" name="enviar" type="submit" value="ver">
                                    <i class="icon-list icon-white"></i>
                                    Ver Carpas
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
                    <? endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <input name="identifica" type="hidden" id="identifica"/>
        <input name="nombre" type="hidden" id="nombre"/>
        <input name="ubicacion" type="hidden" id="ubicacion"/>
        <input name="fecha_inicio" type="hidden" id="fecha_inicio"/>
        <input name="fecha_fin" type="hidden" id="fecha_fin"/>
    </fieldset>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
<script>

    $(document).ready(function() {
        $('td').click(function (){
            var valor = $(this).parent().children().html();
            $('#identifica').val(valor);
            $('#nombre').val(valor);

            alert($(this).parent().children().html());
            //$('#ver').click(function() {
            //    alert('que te parece ' + valor);
            //});
        });
    });
</script>