<?php echo validation_errors(); ?>
<?php echo form_open('evento/show') ?>
<h2><?php echo $titulo; ?></h2>
    <form id="formShow" method="post">
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
                                       <button class="btn btn-primary" name="enviar" type="submit" value="ver"> Ver Carpa</button>
                                       <button class="btn btn-primary" name="enviar" type="submit" value="editar"> Editar</button>
                                       <button class="btn btn-primary" name="enviar" type="submit" value="borrar"> Borrar</button>
                                    </div>
                                </td>
                            </tr>
                        <? endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>        
            <input name="identifica" type="hidden" id="identifica"/>

        </fieldset>
    </form>

    <script src="<?=base_url('assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
    <script>
        
        $(document).ready(function() {
            $('td').click(function (){
                var valor = $(this).parent().children().html();
                $('#identifica').val(valor);                
                //$('#ver').click(function() {
                //    alert('que te parece ' + valor);
                //});
            });
        });

            //$('#formShow').submit(function() {  
            //    //$('td').click(function (){
            //    //    var valor = $(this).parent().children().html();
            //    //    $('#id').val(valor);
            //    //});
            //});
            //$('#ver').click(function(){
            //    .ajax({
            //        type: 'POST',
            //        url: evento/remove,
            //        data:
            //        });
            //});
            
    </script>
