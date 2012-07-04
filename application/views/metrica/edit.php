<?php echo validation_errors(); ?>
<?php echo form_open('metrica/edit') ?>
<h2><?php echo $titulo?></h2>
<form id="formAdd" class="form-horizontal">
    <fieldset>
        <?php foreach ($metricas as $metrica):?>

        <h5>Nombre</h5>
        <input type="input" name="nombre" class="input-large" placeholder="Nombre" required maxlength="50" value="<?=$metrica['nombre']?>" autofocus />

        <h5>Valor a Medir</h5>
        <input type="input" name="valor_medir" class="input-large" placeholder="Valor a Medir" required maxlength="50" value="<?=$metrica['valor_medir']?>" />

        <h5>Rango Inicio</h5>
        <input type="input" name="rango_inicio" class="input-large" placeholder="Rango Inicial" required maxlength="50" value="<?=$metrica['rango_inicio']?>" />

        <h5>Rango Final</h5>
        <input type="input" name="rango_fin" class="input-large" placeholder="Rango Final" required maxlength="50" value="<?=$metrica['rango_fin']?>" />

        <h5>Intervalo</h5>
        <input type="input" name="no_intervalo" class="input-large" placeholder="Intervalo" required maxlength="50" value="<?=$metrica['no_intervalo']?>" />

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
    <input name="id_metrica" type="hidden" id="id_metrica" value="<?php echo($this->input->post('id_metrica'))?>"/>
</form>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap-button.js')?>"></script>

<script>
    $(document).ready(function() {
        $('#alert').hide();
    });
</script>

