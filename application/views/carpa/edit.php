<?php echo validation_errors(); ?>
<?php echo form_open('carpa/edit') ?>
<h2><?php echo $titulo;?></h2>
<form id="formAdd" class="form-horizontal">
    <fieldset>
        <?php foreach ($carpas as $carpa):?>

        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" value="<?=$carpa['nombre']?>" autofocus />

        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>
        </br>
        <input name="id_evento" type="hidden" id="id_evento" value="<?=$carpa['id_evento']?>"/>
        <? endforeach;?>

        <button type="submit" class="btn btn-primary">
            <i class="icon-pencil icon-white"></i> Guardar</button>
    </fieldset>
    <input name="id_carpa" type="hidden" id="id_carpa" value="<?php echo($this->input->post('id_carpa'))?>"/>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>

<script>
    $(document).ready(function() {
        $('#alert').hide();
    });
</script>

