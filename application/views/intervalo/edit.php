<?php echo validation_errors(); ?>
<?php echo form_open('intervalo/edit') ?>
<h2><?php echo $titulo?></h2>
<form id="formAdd" class="form-horizontal">
    <fieldset>
        <?php foreach ($intervalos as $intervalo):?>

        <h5>Intervalo</h5>
        <input type="input" name="intervalo" class="input-large" placeholder="Intervalo" required maxlength="50" value="<?=$intervalo['intervalo']?>" autofocus />

        <h5>Descripción</h5>
        <input type="input" name="descripcion" class="input-large" placeholder="Descripcion" required maxlength="50" value="<?=$intervalo['descripcion']?>"/>

        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>
        </br>

        <input name="id_metrica" type="hidden" id="id_metrica" value="<?=$intervalo['id_metrica']?>"/>
        <? endforeach;?>

        <button type="submit" class="btn btn-primary">
            <i class="icon-pencil icon-white"></i> Guardar</button>
    </fieldset>
    <input name="id_intervalo" type="hidden" id="id_intervalo" value="<?php echo($this->input->post('id_intervalo'))?>"/>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>

<script>
    $(document).ready(function() {
        $('#alert').hide();
    });
</script>


