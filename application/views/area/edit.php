<?php echo validation_errors(); ?>
<?php echo form_open('area/edit') ?>
<h2><?php echo $titulo?></h2>
<form id="formAdd" class="form-horizontal">
    <fieldset>
        <?php foreach ($areas as $area):?>

        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" value="<?=$area['nombre']?>" autofocus />

        <h5>Descripción</h5>
        <input type="input" name="descripcion" class="input-large" placeholder="descripcion" required maxlength="50" value="<?=$area['descripcion']?>"/>

        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>
        </br>
        <input name="id_programa" type="hidden" id="id_programa" value="<?=$area['id_programa']?>"/>
        <? endforeach;?>

        <button type="submit" class="btn btn-primary">
            <i class="icon-pencil icon-white"></i> Guardar</button>
    </fieldset>
    <input name="id_area" type="hidden" id="id_area" value="<?php echo($this->input->post('id_area'))?>"/>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>

<script>
    $(document).ready(function() {
        $('#alert').hide();
    });
</script>

