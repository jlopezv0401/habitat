<?php echo validation_errors(); ?>
<?php echo form_open('programa/edit') ?>
<h2><?php echo $titulo?></h2>
<form id="formAdd" class="form-horizontal">
    <fieldset>
        <?php foreach ($programas as $programa):?>

        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" value="<?=$programa['nombre']?>" autofocus />

        <h5>Descripcion</h5>
        <input type="input" name="descripcion" class="input-large" placeholder="descripcion" required maxlength="50" value="<?=$programa['descripcion']?>"/>

        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>
        </br>
        <input name="id_carpa" type="hidden" id="id_carpa" value="<?=$programa['id_carpa']?>"/>
        <? endforeach;?>

        <button type="submit" class="btn btn-primary">
            <i class="icon-pencil icon-white"></i> Guardar</button>
    </fieldset>
    <input name="id_programa" type="hidden" id="id_programa" value="<?php echo($this->input->post('id_programa'))?>"/>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>

<script>
    $(document).ready(function() {
        $('#alert').hide();
    });
</script>

