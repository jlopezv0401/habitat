<?php echo validation_errors(); ?>
<?php
echo form_open('colaborador/edit') ?>
<h2><?php echo $titulo;?></h2>
<form id="formAdd" class="form-horizontal">
    <fieldset>
        <?php foreach ($colaboradores as $colaborador):?>

        <h5>Nombre</h5>
        <?php echo form_error('nombre');?>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" value="<?=$colaborador['nombre']?>" required maxlength="30" autofocus/>

        <h5>Apellido Paterno</h5>
        <?php echo form_error('apaterno');?>
        <input type="input" name="apaterno" class="input-large" placeholder="A. Paterno" value="<?=$colaborador['apaterno']?>" required maxlength="25"/>

        <h5>Apellido Materno</h5>
        <?php echo form_error('amaterno');?>
        <input type="input" name="amaterno" class="input-large" placeholder="A. Materno" value="<?=$colaborador['amaterno']?>" required maxlength="25"/>

        <h5>Sexo</h5>
        <? $sexo = $colaborador['sexo']?>
        <?php echo form_error('sexo');?>
        <input type="radio" name="sexo" class="inline" value="H" checked="<? if ($sexo=='H') echo 'true';?>"/>Hombre &nbsp;
        <input type="radio" name="sexo" class="inline" value="M" checked="<? if ($sexo=='M') echo 'true';?>"/>Mujer
        </br>
        </br>

        <h5>Edad</h5>
        <?php echo form_error('edad');?>
        <input type="input" name="edad" class="input-large" placeholder="Edad" value="<?=$colaborador['edad']?>" required maxlength="10"/>

        <h5>Dirección</h5>
        <?php echo form_error('direccion');?>
        <input type="input" name="direccion" class="input-large" placeholder="Dirección" value="<?=$colaborador['direccion']?>" required maxlength="50"/>

        <h5>Teléfono</h5>
        <?php echo form_error('telefono');?>
        <input type="input" name="telefono" class="input-large" placeholder="Teléfono" value="<?=$colaborador['telefono']?>" required maxlength="15"/>

        <h5>Correo Electrónico</h5>
        <?php echo form_error('correo');?>
        <input type="input" name="correo" class="input-large" placeholder="Correo" value="<?=$colaborador['correo']?>" required maxlength="40"/>

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

