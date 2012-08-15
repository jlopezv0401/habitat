<?php echo validation_errors(); ?>
<?php echo form_open('dinamica/index') ?>

<form id="formIndex" method="post">
    <fieldset>
         <div style="z-index: 873; position:relative; top:-30px;">     
		<ul class="breadcrumb">
 			 <li>
   				 <?php echo  "<a href='".base_url("index.php/evento/index")."'>Eventos</a> ";?> <span class="divider">/</span>
  			</li>
  			<li>
   				 <?php echo  "<a href='".base_url("index.php/carpa/index")."'>Carpas</a> ";?> <span class="divider">/</span>
  			</li>
  			<li>
   				<?php echo  "<a href='".base_url("index.php/programa/index")."'>Programas</a> ";?> <span class="divider">/</span>
  			</li>
  			<li>
   				 <?php echo  "<a href='".base_url("index.php/area/index")."'>Áreas</a> ";?> <span class="divider">/</span>
  			</li>
  			<li class="active">Dinámicas</li>
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
					                    Agregar Dinámica
					      </button>
					    </div>
					  </div>
					</div>
                
                <hr/>
                <table class="table table-striped table-bordered tablesorter" id="tableCarpa">
                    <thead>
                    <tr>
                        <th><i class="icon-tags"></i> ID</th>
                        <th><i class="icon-user"></i> Nombre</th>
                        <th><i class="icon-flag"></i> Inicio</th>
                        <th><i class="icon-flag"></i> Fin</th>
                        <th><i class="icon-road"></i> Descripción</th>
                        <th><i class="icon-road"></i> Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    <? foreach($dinamicas as $dinamica): ?>
                    <tr>
                        <td><?=$dinamica['id']?></td>
                        <td><?=$dinamica['nombre']?></td>
                        <td><?=$dinamica['hora_inicio']?></td>
                        <td><?=$dinamica['hora_fin']?></td>
                        <td><?=$dinamica['descripcion']?></td>
                        <td>
                            <div class="btn-group">
                                &nbsp
                                <button class="btn" name="enviar" type="submit" value="colaborador">
                                    <i class="icon-list icon-black"></i>
                                    Colaboradores
                                </button>
                                <button class="btn" name="enviar" type="submit" value="paquete">
                                    <i class="icon-list icon-black"></i>
                                    Materiales
                                </button>
                                <button class="btn" name="enviar" type="submit" value="editar">
                                    <i class="icon-edit icon-black"></i>
                                </button>
                                <button class="btn btn-danger" name="enviar" type="submit" value="borrar">
                                    <i class="icon-remove icon-white"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                        <? endforeach ?>
                    </tbody>
                </table>

           
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

        $("#formBuscar").submit( function (event){
            event.preventDefault();
            $.post('producto.php', $('#formBuscar').serialize(), function(data){
                $('#resultado').html(data);
            });
        });
    });
</script>