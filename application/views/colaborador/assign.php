<?php echo validation_errors(); ?>
<?php
echo form_open('colaborador/assign') ?>
<h2><?php echo $titulo;?></h2>
<form id="formAdd" class="form-horizontal">
    <fieldset>
        <?php foreach ($colaboradores as $colaborador):?>

        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" value="<?=$colaborador['nombre']?>" required maxlength="30" disabled="true" autofocus/>

        <h5>Dinámica</h5>
        <select name="id_dinamica" id="id_dinamica" class="combobox input-large">
            <option></option>
            <?php foreach ($dinamicas as $dinamica):?>
            <option value="<?php echo $dinamica['id'] ?>"> <?php echo $dinamica ['nombre'] ?></option>
            <? endforeach;?>
        </select>

        <div id="success" class="row">
            <div class="span4">
                <div class="alert alert-error" id="alert">
                    <strong>Oh snap!</strong>
                </div>
            </div>
        </div>

        <? endforeach;?>

        <button type="submit" class="btn btn-primary">
            <i class="icon-pencil icon-white"></i> Guardar</button>
    </fieldset>

    <input name="id_colaborador" type="hidden" id="id_colaborador" value="<?php echo($this->input->post('id_colaborador'))?>"/>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
<script>
    $(document).ready(function() {

        //$('#formAdd').submit();
        $('#alert').hide();
    });
</script>

