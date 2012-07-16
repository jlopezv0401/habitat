<?php echo validation_errors(); ?>
<?php echo form_open('programa/index') ?>

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
  			<li class="active">Programas</li>
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
					                    Agregar Programa
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
                        <th><i class="icon-flag"></i> Descripción</th>
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
                                <button class="btn " name="enviar" type="submit" value="ver">
                                    <i class="icon-list icon-black"></i>
                                    Ver Áreas
                                </button>
                                &nbsp
                                <button class="btn " name="enviar" type="submit" value="editar">
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

           
        <input name="id_programa" type="hidden" id="id_programa"/>
        <input name="id_carpa" type="hidden" value="<?=$this->input->post('id_carpa')?>" id="id_carpa"/>
        <input name="id_evento" type="hidden" value="<?=$this->input->post('id_evento')?>" id="id_evento"/>
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