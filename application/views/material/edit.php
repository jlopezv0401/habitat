<<<<<<< HEAD
<?php echo validation_errors(); ?>
<?php
echo form_open('material/edit') ?>
<h2><?php echo $titulo;?></h2>
<form id="formAdd" class="form-horizontal">
    <fieldset>
        <?php foreach ($materiales as $material):?>

        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" value="<?=$material['nombre']?>" autofocus />

        <h5>Cantidad</h5>
        <input type="input" name="cantidad" class="input-large" placeholder="Cantidad" required maxlength="10" value="<?=$material['cantidad']?>"/>

        <h5>Descripcion</h5>
        <input type="input" name="descripcion" class="input-large" placeholder="Descripcion" required maxlength="50" value="<?=$material['descripcion']?>"/>
        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>
        </br>
        <? endforeach;?>

        <button type="submit" class="btn btn-primary">
            <i class="icon-pencil icon-white"></i> Guardar</button>
    </fieldset>
    <input name="id_material" type="hidden" id="id_material" value="<?php echo($this->input->post('id_material'))?>"/>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
<script>
    $(document).ready(function() {

        //$('#formAdd').submit();
        $('#dp1').datepicker();
        $('#dp2').datepicker();
        $('#alert').hide();
    });
</script>

=======
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jesuslinux
 * Date: 8/2/12
 * Time: 11:43 PM
 * To change this template use File | Settings | File Templates.
 */
>>>>>>> 9dea9e748bf6fff9c6de75c1582cb67bbe572253
