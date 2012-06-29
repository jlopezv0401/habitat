<?php echo validation_errors(); ?>
<?php echo form_open('dinamica/edit') ?>
<h2><?php echo $titulo?></h2>
<form id="formAdd" class="form-horizontal">
    <fieldset>
        <?php foreach ($dinamicas as $dinamica):?>

        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" value="<?=$dinamica['nombre']?>" autofocus />

        <h5>Descripción</h5>
        <input type="input" name="descripcion" class="input-large" placeholder="Descripción" required maxlength="50" value="<?=$dinamica['descripcion']?>"/>

        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>
        </br>
        <input name="id_area" type="hidden" id="id_area" value="<?=$dinamica['id_area']?>"/>
        <? endforeach;?>

        <button type="submit" class="btn btn-primary">
            <i class="icon-pencil icon-white"></i> Guardar</button>
    </fieldset>
    <input name="id_dinamica" type="hidden" id="id_dinamica" value="<?php echo($this->input->post('id_dinamica'))?>"/>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>

<script>
    $(document).ready(function() {
        $('#alert').hide();
    });
</script>

